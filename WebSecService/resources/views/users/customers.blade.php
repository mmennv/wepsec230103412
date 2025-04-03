@extends('layouts.master')
@section('title', 'Customer List')
@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2>Customer List</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Credit Balance</th>
                            <th>Total Purchases</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>${{ number_format($customer->credit, 2) }}</td>
                                <td>{{ $customer->purchasedProducts()->count() }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('users.show', $customer) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        @can('manage_credit')
                                        <a href="{{ route('users.add-credit-form', $customer) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-plus"></i> Add Credit
                                        </a>
                                        <a href="{{ route('users.credit-transactions', $customer) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-history"></i> Transactions
                                        </a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No customers found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 