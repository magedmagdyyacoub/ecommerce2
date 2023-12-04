<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderDetail;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($orderId)
    {
      $orderDetails = OrderDetail::where('order_id', $orderId)
      ->with('product', 'order.user') // Assuming relationships are defined in models
      ->get();

        $pdf = PDF::loadView('admin.pdf',compact('orderDetails'));
        return $pdf->download('Invoice.pdf');
    }
}
