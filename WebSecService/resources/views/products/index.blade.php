@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    @if($product->photo)
                                        <img src="{{ asset('storage/' . $product->photo) }}" class="card-img-top" alt="{{ $product->name }}">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">{{ $product->description }}</p>
                                        <p class="card-text"><strong>Model:</strong> {{ $product->model }}</p>
                                        <p class="card-text"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                                        <p class="card-text"><strong>Stock:</strong> {{ $product->stock }}</p>
                                        
                                        @if($product->isInStock())
                                            <form action="{{ route('products.purchase', $product) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Purchase</button>
                                            </form>
                                        @else
                                            <button class="btn btn-secondary" disabled>Out of Stock</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 