<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Services\MidtransService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function reset_token(Transaction $transaction)
    {
        $service_midtrans = new MidtransService();
        $transaction = $service_midtrans->pay($transaction);
        return redirect()->route('payment.pay',['invoice'=>$transaction->invoice])->with('success','Transaction has success created');
    }

    public function pay()
    {
        if(request('invoice')){
            $transaction = Transaction::where('invoice',request('invoice'))->first();
            if(!$transaction){
                return abort(404);
            }
        }else{
            return abort(404);
        }
        return view('user.payment', compact('transaction'));
    }

    public function notificationHandling()
    {
        $midtransService = new MidtransService();
        return $midtransService->notification();
    }
}
