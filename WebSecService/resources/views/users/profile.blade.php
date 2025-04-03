@extends('layouts.master')
@section('title', 'User Profile')
@section('content')
<div class="row">
    <div class="m-4 col-sm-6">
        <table class="table table-striped">
            <tr>
                <th>Name</th><td>{{$user->name}}</td>
            </tr>
            <tr>
                <th>Email</th><td>{{$user->email}}</td>
            </tr>
            <tr>
                <th>Credit Balance</th>
                <td>${{number_format($user->credit, 2)}}</td>
            </tr>
            <tr>
                <th>Roles</th>
                <td>
                    @foreach($user->roles as $role)
                        <span class="badge bg-primary">{{$role->name}}</span>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Permissions</th>
                <td>
                    @foreach($permissions as $permission)
                        <span class="badge bg-success">{{$permission->display_name}}</span>
                    @endforeach
                </td>
            </tr>
        </table>

        @if($user->purchasedProducts->count() > 0)
        <h4>Purchased Products</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Purchase Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->purchasedProducts as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>${{number_format($product->price, 2)}}</td>
                    <td>{{$product->pivot->purchase_date->format('Y-m-d H:i:s')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        <div class="row">
            <div class="col col-6">
            </div>
            @if(auth()->user()->hasPermissionTo('admin_users')||auth()->id()==$user->id)
            <div class="col col-4">
                <a class="btn btn-primary" href='{{route('edit_password', $user->id)}}'>Change Password</a>
            </div>
            @else
            <div class="col col-4">
            </div>
            @endif
            @if(auth()->user()->hasPermissionTo('edit_users')||auth()->id()==$user->id)
            <div class="col col-2">
                <a href="{{route('users_edit', $user->id)}}" class="btn btn-success form-control">Edit</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
