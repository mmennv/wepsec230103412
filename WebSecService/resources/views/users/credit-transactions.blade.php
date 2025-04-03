@extends('layouts.master')

@section('title', 'Credit Transactions')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2>Credit Transactions</h2>
            <h5 class="text-muted">Customer: {{ $customer->name }}</h5>
            <h5 class="text-muted">Current Balance: ${{ number_format($customer->credit, 2) }}</h5>
        </div>
        <div class="col text-end">
            <a href="{{ route('customers.list') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Customers
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Type</th>
                            <th>Reason</th>
                            <th>Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>${{ number_format($transaction->amount, 2) }}</td>
                                <td>
                                    <span class="badge bg-{{ $transaction->type === 'credit' ? 'success' : 'danger' }}">
                                        {{ ucfirst($transaction->type) }}
                                    </span>
                                </td>
                                <td>{{ $transaction->reason }}</td>
                                <td>{{ $transaction->admin->name }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No transactions found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 