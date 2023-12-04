<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[HomeController::class,'index']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class,'redirect']);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);


Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');  

Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/cashondelivry', [CheckoutController::class, 'cash_order'])->name('cashondelivery');
Route::get('/success', [CheckoutController::class, 'success'])->name('success');


// Routes for the OrderController with OrderDetail
/*Route::get('/orders', 'OrderController@index')->name('orders.index');
Route::get('/orders/{id}', 'OrderController@show')->name('orders.show');
Route::post('/orders', 'OrderController@store')->name('orders.store');
Route::put('/orders/{id}', 'OrderController.updateStatus')->name('orders.updateStatus');

// Routes for the PaymentController
Route::get('/payments/create/{orderId}', 'PaymentController@create')->name('payments.create');
Route::post('/payments/store/{orderId}', 'PaymentController@store')->name('payments.store');
Route::get('/payments/show/{orderId}', 'PaymentController@show')->name('payments.show');*/


Route::get('paypal', [PayPalController::class, 'payment'])->name('payment');
Route::get('cancel', [PayPalController::class, 'cancel'])->name('payment.cancel');
Route::get('payment/success', [PayPalController::class, 'success'])->name('payment.success');

/*Route::get('paypal', 'App\Http\Controllers\PayPalPaymentController@payment')->name('payment');
Route::get('cancel', 'App\Http\Controllers\PayPalPaymentController@cancel')->name('payment.cancel');
Route::get('payment/success', 'App\Http\Controllers\PayPalPaymentController@success')->name('payment.success');*/
// store payment on cash
Route::get('/payments/create/{orderId}', 'PaymentController@create')->name('payments.create');
Route::get('/payments/store/{orderId}', 'PaymentController@store')->name('payments.store');
Route::get('/order',[OrderController::class,'order']);
Route::get('/delivered/{id}',[OrderController::class,'delivered']);
Route::get('/generate-pdf/{id}', [PDFController::class, 'generatePDF']);
