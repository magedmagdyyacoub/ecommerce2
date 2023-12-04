<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
  // Display a list of orders
  public function index()
  {
      $orders = Order::where('user_id', Auth::id())->get();
      return view('orders.index', compact('orders'));
  }

  // Display the details of a specific order
  public function show($id)
  {
      $order = Order::findOrFail($id);
      $orderDetails = $order->orderDetails;
      return view('orders.show', compact('order', 'orderDetails'));
  }

  // Create a new order
  public function store(Request $request)
  {
      $order = new Order();
      $order->user_id = Auth::id(); // Associate the order with the currently authenticated customer
      $order->status = 'In Progress'; // Set the initial status
      $order->save();

      // Process order items (products in the cart)
      // You'll need to adapt this part based on your cart management
      // This is just a simplified example
      $cart = $request->input('cart');

      foreach ($cart as $item) {
          $orderDetail = new OrderDetail();
          $orderDetail->order_id = $order->id;
          $orderDetail->product_id = $item['product_id'];
          $orderDetail->quantity = $item['quantity'];
          $orderDetail->save();
      }

      return redirect()->route('orders.show', $order->id)->with('success', 'Order placed successfully');
  }

  // Update the status of an order (e.g., 'Shipped' or 'Delivered')
  public function updateStatus(Request $request, $id)
  {
      $order = Order::findOrFail($id);
      $order->status = $request->input('status');
      $order->save();

      return redirect()->route('orders.show', $order->id)->with('success', 'Order status updated');
  }
  public function order()
  {
    $orders = Order::paginate(10);
    return view('admin.order', compact('orders'));
  }
  public function delivered($id)
  {
    $order = order::find($id);
    $order->status="delivered";
    $order->save();
    return redirect()->back();
  }
}