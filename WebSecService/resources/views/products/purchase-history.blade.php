@extends('layouts.master')
@section('title', 'Purchase History')
@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2>My Purchase History</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Products</a>
        </div>
    </div>

    @if($purchases->isEmpty())
        <div class="alert alert-info">
            You haven't made any purchases yet.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Model</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Purchase Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchases as $product)
                        <tr>
                            <td>
                                @if($product->photo)
                                    <img src="{{ asset('storage/' . $product->photo) }}" 
                                         alt="{{ $product->name }}" 
                                         class="img-thumbnail" 
                                         style="max-width: 50px">
                                @endif
                                {{ $product->name }}
                            </td>
                            <td>{{ $product->model }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <td>${{ number_format($product->price * $product->pivot->quantity, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($product->pivot->purchase_date)->format('M d, Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-end"><strong>Total Spent:</strong></td>
                        <td colspan="2">
                            <strong>${{ number_format($purchases->sum(function($product) {
                                return $product->price * $product->pivot->quantity;
                            }), 2) }}</strong>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    @endif
</div>
@endsection 