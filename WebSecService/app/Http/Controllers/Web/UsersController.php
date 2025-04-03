<?php
namespace App\Http\Controllers\Web;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Artisan;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\CreditTransaction;

class UsersController extends Controller {

	use ValidatesRequests;

    public function list(Request $request) {
        if(!auth()->user()->hasPermissionTo('show_users'))abort(401);
        $query = User::select('*');
        $query->when($request->keywords, 
        fn($q)=> $q->where("name", "like", "%$request->keywords%"));
        $users = $query->get();
        return view('users.list', compact('users'));
    }

	public function register(Request $request) {
        return view('users.register');
    }

    public function doRegister(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $user->assignRole('Customer');

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function registerEmployee()
    {
        if (!auth()->user()->hasPermissionTo('admin_users')) {
            abort(403, 'Unauthorized action.');
        }
        return view('users.register-employee');
    }

    public function doRegisterEmployee(Request $request)
    {
        if (!auth()->user()->hasPermissionTo('admin_users')) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $user->assignRole('Employee');

        return redirect()->route('users')->with('success', 'Employee registered successfully.');
    }

    public function login(Request $request) {
        return view('users.login');
    }

    public function doLogin(Request $request) {
    	
    	if(!Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            return redirect()->back()->withInput($request->input())->withErrors('Invalid login information.');

        $user = User::where('email', $request->email)->first();
        Auth::setUser($user);

        return redirect('/');
    }

    public function doLogout(Request $request) {
    	
    	Auth::logout();

        return redirect('/');
    }

    public function profile(Request $request, User $user = null) {

        $user = $user??auth()->user();
        if(auth()->id()!=$user->id) {
            if(!auth()->user()->hasPermissionTo('show_users')) abort(401);
        }

        $permissions = [];
        foreach($user->permissions as $permission) {
            $permissions[] = $permission;
        }
        foreach($user->roles as $role) {
            foreach($role->permissions as $permission) {
                $permissions[] = $permission;
            }
        }

        return view('users.profile', compact('user', 'permissions'));
    }

    public function edit(Request $request, User $user = null) {
   
        $user = $user??auth()->user();
        if(auth()->id()!=$user?->id) {
            if(!auth()->user()->hasPermissionTo('edit_users')) abort(401);
        }
    
        $roles = [];
        foreach(Role::all() as $role) {
            $role->taken = ($user->hasRole($role->name));
            $roles[] = $role;
        }

        $permissions = [];
        $directPermissionsIds = $user->permissions()->pluck('id')->toArray();
        foreach(Permission::all() as $permission) {
            $permission->taken = in_array($permission->id, $directPermissionsIds);
            $permissions[] = $permission;
        }      

        return view('users.edit', compact('user', 'roles', 'permissions'));
    }

    public function save(Request $request, User $user) {

        if(auth()->id()!=$user->id) {
            if(!auth()->user()->hasPermissionTo('show_users')) abort(401);
        }

        $user->name = $request->name;
        $user->save();

        if(auth()->user()->hasPermissionTo('admin_users')) {

            $user->syncRoles($request->roles);
            $user->syncPermissions($request->permissions);

            Artisan::call('cache:clear');
        }

        //$user->syncRoles([1]);
        //Artisan::call('cache:clear');

        return redirect(route('profile', ['user'=>$user->id]));
    }

    public function delete(Request $request, User $user) {

        if(!auth()->user()->hasPermissionTo('delete_users')) abort(401);

        //$user->delete();

        return redirect()->route('users');
    }

    public function editPassword(Request $request, User $user = null) {

        $user = $user??auth()->user();
        if(auth()->id()!=$user?->id) {
            if(!auth()->user()->hasPermissionTo('edit_users')) abort(401);
        }

        return view('users.edit_password', compact('user'));
    }

    public function savePassword(Request $request, User $user) {

        if(auth()->id()==$user?->id) {
            
            $this->validate($request, [
                'password' => ['required', 'confirmed', Password::min(8)->numbers()->letters()->mixedCase()->symbols()],
            ]);

            if(!Auth::attempt(['email' => $user->email, 'password' => $request->old_password])) {
                
                Auth::logout();
                return redirect('/');
            }
        }
        else if(!auth()->user()->hasPermissionTo('edit_users')) {

            abort(401);
        }

        $user->password = bcrypt($request->password); //Secure
        $user->save();

        return redirect(route('profile', ['user'=>$user->id]));
    }

    public function listCustomers()
    {
        if (!auth()->user()->hasPermissionTo('view_customers')) {
            abort(403, 'Unauthorized action.');
        }

        $customers = User::role('Customer')->get();
        return view('users.customers', compact('customers'));
    }

    public function addCreditForm(User $customer)
    {
        if(!auth()->user()->hasPermissionTo('manage_credit')) {
            abort(403, 'Unauthorized action.');
        }

        if(!$customer->hasRole('Customer')) {
            abort(403, 'Only customer accounts can have credit added.');
        }

        return view('users.add-credit', compact('customer'));
    }

    public function addCredit(Request $request, User $customer)
    {
        if(!auth()->user()->hasPermissionTo('manage_credit')) {
            abort(403, 'Unauthorized action.');
        }

        if(!$customer->hasRole('Customer')) {
            abort(403, 'Only customer accounts can have credit added.');
        }

        $request->validate([
            'amount' => [
                'required',
                'numeric',
                'min:0.01',
                'max:10000',
                function ($attribute, $value, $fail) {
                    if (!is_numeric($value) || floor($value * 100) != $value * 100) {
                        $fail('The amount cannot have more than 2 decimal places.');
                    }
                },
            ],
            'reason' => 'required|string|max:255|not_regex:/[<>]/'
        ], [
            'amount.min' => 'The minimum credit amount is $0.01.',
            'amount.max' => 'The maximum credit amount is $10,000.',
            'reason.not_regex' => 'The reason field cannot contain HTML tags.'
        ]);

        try {
            DB::beginTransaction();

            // Log the old balance
            $oldBalance = $customer->credit;
            
            $customer->credit += $request->amount;
            
            // Check for overflow
            if ($customer->credit < $oldBalance) {
                throw new \Exception('Credit amount would cause overflow.');
            }
            
            $customer->save();

            CreditTransaction::create([
                'user_id' => $customer->id,
                'amount' => $request->amount,
                'type' => 'credit',
                'reason' => strip_tags($request->reason),
                'admin_id' => auth()->id()
            ]);

            DB::commit();

            return redirect()
                ->route('users.credit-transactions', $customer)
                ->with('success', 'Credit added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Credit addition failed: ' . $e->getMessage());
            return redirect()
                ->back()
                ->with('error', 'Failed to add credit. Please try again.')
                ->withInput();
        }
    }

    public function creditTransactions(User $customer)
    {
        if(!auth()->user()->hasPermissionTo('manage_credit')) {
            abort(403, 'Unauthorized action.');
        }

        if(!$customer->hasRole('Customer')) {
            abort(403, 'Only customer accounts can have credit transactions.');
        }

        $transactions = $customer->creditTransactions()
            ->with('admin')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('users.credit-transactions', compact('customer', 'transactions'));
    }
} 