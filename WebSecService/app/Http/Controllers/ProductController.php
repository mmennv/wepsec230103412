<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function purchase(Request $request, Product $product)
    {
        // Validate quantity
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $quantity = $request->input('quantity', 1);
        $totalPrice = $product->price * $quantity;

        // Start database transaction
        DB::beginTransaction();

        try {
            // Check stock availability
            if (!$product->hasEnoughStock($quantity)) {
                return redirect()->back()->with('error', 'Insufficient stock available.');
            }

            $user = Auth::user();
            
            // Check credit availability
            if ($user->credit < $totalPrice) {
                return redirect()->back()->with('error', 'Insufficient credit to purchase this product.');
            }

            // Check if user already purchased this product
            if ($user->purchasedProducts()->where('product_id', $product->id)->exists()) {
                return redirect()->back()->with('error', 'You have already purchased this product.');
            }

            // Update user's credit
            $user->credit -= $totalPrice;
            $user->save();

            // Update product stock
            $product->stock -= $quantity;
            $product->save();

            // Create purchase record
            $user->purchasedProducts()->attach($product->id, [
                'quantity' => $quantity,
                'purchase_date' => now()
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Product purchased successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while processing your purchase.');
        }
    }

    public function purchaseHistory()
    {
        $user = Auth::user();
        $purchases = $user->purchasedProducts()
            ->withPivot('quantity', 'purchase_date')
            ->orderBy('pivot_purchase_date', 'desc')
            ->get();

        return view('products.purchase-history', compact('purchases'));
    }
}
