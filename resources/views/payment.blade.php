@extends('layouts.app')

@section('content')
    <h1>Payment Form</h1>
    <form method="POST" action="{{ route('paypal.payment') }}">
        @csrf
        <!-- Add your payment form fields here -->
        <input type="text" name="amount" placeholder="Enter Amount">
        <button type="submit">Pay with PayPal</button>
    </form>
@endsection