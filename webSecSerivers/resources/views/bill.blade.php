@extends('layouts.master')
@section('title', 'Supermarket Bill')
@section('content')

<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-header bg-primary text-white text-center">
            <h2><i class="fas fa-shopping-cart"></i> Supermarket Bill</h2>
        </div>
        
        <div class="card-body">
            <div class="mb-3">
                <p><strong><i class="fas fa-user"></i> Customer Name:</strong> {{ $customer_name }}</p>
            </div>

            <table class="table table-bordered table-striped table-hover text-center">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th>#</th>
                        <th><i class="fas fa-box"></i> Item Name</th>
                        <th><i class="fas fa-sort-numeric-up"></i> Quantity</th>
                        <th><i class="fas fa-dollar-sign"></i> Price</th>
                        <th><i class="fas fa-money-bill-wave"></i> Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $index => $item)
                        <tr>
                            <td class="font-weight-bold">{{ $index + 1 }}</td>
                            <td>{{ ucfirst($item['name']) }}</td> 
                            <td>{{ $item['quantity'] }}</td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td class="font-weight-bold text-success">${{ number_format($item['quantity'] * $item['price'], 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <h4 class="text-right bg-light p-3 rounded font-weight-bold">
                <i class="fas fa-coins"></i> Total: 
                <span class="text-primary">${{ number_format($total_amount, 2) }}</span>
            </h4>
        </div>
    </div>
</div>

@endsection


