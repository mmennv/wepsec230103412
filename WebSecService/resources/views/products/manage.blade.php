@extends('layouts.master')
@section('title', 'Manage Products')
@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2>Manage Products</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Product
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>
                            @if($product->photo)
                                <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" style="max-width: 50px;">
                            @else
                                <img src="{{ asset('images/no-image.png') }}" alt="No image" style="max-width: 50px;">
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->model }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>
                            <span class="badge {{ $product->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                                {{ $product->stock }} in stock
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 