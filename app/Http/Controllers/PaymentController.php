<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    // Show the payment form
    public function create($orderId)
    {
        $order = Order::findOrFail($orderId);

        return view('payments.create', compact('order'));
    }

    // Process a payment
    public function store(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        // Perform the payment processing logic here
        // This is a simplified example; you may integrate with a payment gateway
        // and handle the response accordingly
        $payment = new Payment();
        $payment->order_id = $order->id;
        $payment->payment_amount = $order->calculateTotal(); // You need to implement this method
        $payment->payment_method = $request->input('payment_method'); // e.g., 'Credit Card', 'PayPal'
        $payment->payment_status = 'Successful'; // Set the status based on the payment result
        $payment->save();

        // Update the order status to 'Shipped' or any other appropriate status
        $order->status = 'Shipped'; // You can customize this as needed
        $order->save();

        return redirect()->route('orders.show', $order->id)->with('success', 'Payment successful');
    }

    // Display payment details
    public function show($orderId)
    {
        $order = Order::findOrFail($orderId);
        $payment = $order->payment;

        return view('payments.show', compact('order', 'payment'));
    }
}
