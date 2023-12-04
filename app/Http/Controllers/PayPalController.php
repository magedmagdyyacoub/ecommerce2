<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
   
class PayPalController extends Controller
{

    protected $provider;
    public function __construct()
    {
        $this->provider = new ExpressCheckout();
    }
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    /*public function payment()
    {
      
        $data = [];
        $data['items'] = [
            [
                'name' => 'ItSolutionStuff.com',
                'price' => 100,
                'desc'  => 'Description for ItSolutionStuff.com',
                'qty' => 1
            ]
        ];
        
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = 100;
        
        $provider = new ExpressCheckout();
        
        $response = $provider->setExpressCheckout($data);
  
        //$response = $provider->setExpressCheckout($data, true);
        
        return redirect($response['paypal_link']);
        //dd(1);
    }*/
    public function payment()
    {
      $data = [];
        $data['items'] = [
            [
                'name' => 'ItSolutionStuff.com',
                'price' => 100,
                'desc'  => 'Description for ItSolutionStuff.com',
                'qty' => 1
            ]
        ];
  
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = 100;

        $provider = new ExpressCheckout();
        //dd($provider);
        $response = $provider->setExpressCheckout($data);
        
        $response = $provider->setExpressCheckout($data, true);
        dd($response);
        return redirect($response['paypal_link']);
        dd($response);
  }   
   
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
      return response()->json(['message' => 'Your payment is canceled. You can create a cancel page here.']);
    }
  
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
    {
      $provider = new ExpressCheckout(); // Add this line to create a new instance of ExpressCheckout

        $response = $provider->getExpressCheckoutDetails($request->token);
  
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
          return response()->json(['message' => 'Your payment was successful. You can create a success page here.']);
        }
  
        return response()->json(['message' => 'Something is wrong.']);
    }
}







