@extends('layouts.master')
@section('title', 'Prime Numbers')
@section('content')
    <h1>Edit a Product</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>


        @endif
    </div>
    <form method="post" action="{{route('product.update', ['product' => $product])}}">
        @csrf 
        @method('put')
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{$product->name}}" />
        </div>
        <div>
            <label>Qty</label>
            <input type="text" name="qty" placeholder="Qty" value="{{$product->qty}}" />
        </div>
        <div>
            <label>Price</label>
            <input type="text" name="price" placeholder="Price" value="{{$product->price}}" />
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" placeholder="Description" value="{{$product->description}}" />
        </div>
        <div>
            <input type="submit" value="Update" />
        </div>
    </form>
    @endsection