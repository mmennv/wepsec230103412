@extends('layouts.master')
@section('title', 'Users')
@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2>Users</h2>
        </div>
        @if(auth()->user()->hasPermissionTo('admin_users'))
        <div class="col text-end">
            <a href="{{ route('users.register-employee') }}" class="btn btn-primary">
                <i class="fas fa-user-plus"></i> Register New Employee
            </a>
        </div>
        @endif
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge bg-primary">{{ $role->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('profile', $user) }}" class="btn btn-info btn-sm">View</a>
                        @if(auth()->user()->hasPermissionTo('edit_users') || auth()->id() == $user->id)
                            <a href="{{ route('users_edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>
                        @endif
                        @if(auth()->user()->hasPermissionTo('delete_users') && auth()->id() != $user->id)
                            <a href="{{ route('users_delete', $user) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
