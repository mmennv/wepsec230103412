@extends('layouts.master')

@section('title', 'Add Credit')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2>Add Credit</h2>
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
            <form action="{{ route('users.add-credit', $customer) }}" method="POST" id="creditForm">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" class="form-control @error('amount') is-invalid @enderror" 
                            id="amount" name="amount" step="0.01" min="0.01" max="10000" required
                            value="{{ old('amount') }}">
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="reason" class="form-label">Reason</label>
                    <textarea class="form-control @error('reason') is-invalid @enderror" 
                        id="reason" name="reason" rows="3" required>{{ old('reason') }}</textarea>
                    @error('reason')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to add this credit?');">
                        <i class="fas fa-plus"></i> Add Credit
                    </button>
                    <a href="{{ route('customers.list') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
document.getElementById('creditForm').addEventListener('submit', function(e) {
    const amount = parseFloat(document.getElementById('amount').value);
    if (amount > 10000) {
        e.preventDefault();
        alert('Credit amount cannot exceed $10,000');
    }
});
</script>
@endsection 