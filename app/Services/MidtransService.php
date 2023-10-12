<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\Setting;
use Exception;

class MidtransService
{

    public function __construct()
    {
        $setting = Setting::find(1);
        \Midtrans\Config::$serverKey = $setting->midtrans_server_key;
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }

    public function pay(Transaction $transaction)
    {
        $customer = $transaction->user;
        $date = date('ymdHis');
        $item_price = $transaction->total;
        $item_details = array();
        $orderId = 'INV/'.$date.'/'.sprintf('%03d',$transaction->id);
        $items = $transaction->transaction_details;
        $customer_details = array(
            'first_name' => $transaction->receiver,
            'email'    => $customer->email,
            'phone'    => $transaction->phone,
        );

        $j = 0;
        foreach ($items as $idx => $item) {
            $item_details[$j] = array(
                'id' => $item->product_id,
                'price' => $item->product->price,
                'quantity' => $item->qty,
                'name' => $item->product->name,
            );
            $j++;
        }
        $item_details[$j] = array(
            'id' => 'ONGKIR',
            'price' => $transaction->expedition_price,
            'quantity' => 1,
            'name' => $transaction->expedition_type,
        );

        $transaction_details = array(
            'order_id' => $orderId,
            'gross_amount' =>$item_price, // no decimal allowed for creditcard
        );

        // Fill SNAP API parameter
        $params = array(
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        );

        try {
            // Get Snap Payment Page URL
            $token = \Midtrans\Snap::getSnapToken($params);
            // Redirect to Snap Payment Page

            $transaction->update([
                'invoice' => $orderId,
                'token' => $token
            ]);

            $trx = Transaction::find($transaction->id);

            return $trx;
        }
        catch (Exception $e) {
            return response($e->getMessage());
        }
    }

    public function test()
    {
        $date = date('ymd');
        $item_details = array();
        $orderId = 'INV/'.$date.'/'.sprintf('%03d',rand(100,999));

        $customer_details = array(
            'first_name' => 'test_midtrans',
            'email'    => 'testmidtrans@gmail.com',
            'phone'    => '123456789',
        );

        for ($i=0; $i < 3; $i++) {
            $item_details[$i] = array(
                'id' => 'BR-00'.$i,
                'price' => 10000,
                'quantity' => 1,
                'name' => 'KTA-'.$i,
            );
        }

        $transaction_details = array(
            'order_id' => $orderId,
            'gross_amount' =>3000, // no decimal allowed for creditcard
        );

        // Fill SNAP API parameter
        $params = array(
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        );

        try {
            // Get Snap Payment Page URL
            $paymentUrl = \Midtrans\Snap::getSnapToken($params);
            // Redirect to Snap Payment Page

            return $paymentUrl;
        }
        catch (Exception $e) {
            return response($e->getMessage());
        }
    }

    public function notification()
    {
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;
        $transaksi = Transaction::where('invoice', $order_id)->first();
        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            $transaksi->update([
                'payment_status_id' => 2,
            ]);
            if ($type == 'credit_card'){
                if($fraud == 'challenge'){
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    $transaksi->update([
                        'payment_status_id' => 11,
                    ]);
                    return response( "Transaction order_id: " . $order_id ." is challenged by FDS");
                }
                else {
                    $transaksi->update([
                        'payment_status_id' => 3,
                        'is_paid' => 1,
                    ]);
                    foreach($transaksi->transaction_details as $item){
                        $item->product->update([
                            'stock' => $item->product->stock - $item->qty
                        ]);
                    }
                    // $this->booked($booking, $transaksi);
                    // TODO set payment status in merchant's database to 'Success'
                    return response( "Transaction order_id: " . $order_id ." successfully captured using " . $type);
                }
            }
        }
        else if ($transaction == 'settlement'){
            $transaksi->update([
                'payment_status_id' => 3,
                'is_paid' => 1,
            ]);

            foreach($transaksi->transaction_details as $item){
                $item->product->update([
                    'stock' => $item->product->stock - $item->qty
                ]);
            }
            // $this->booked($booking, $transaksi);
            // TODO set payment status in merchant's database to 'Settlement'
            return response( "Transaction order_id: " . $order_id ." successfully transfered using " . $type);
        }
        else if($transaction == 'pending'){
            // TODO set payment status in merchant's database to 'Pending'
            $transaksi->update([
                'payment_status_id' => 4,
            ]);
            return response( "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type);
        }
        else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            $transaksi->update([
                'payment_status_id' => 5,
            ]);
            return response( "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.");
        }
        else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $transaksi->update([
                'payment_status_id' => 7,
            ]);

            // $this->newSnapUrl($order_id);
            return response( "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.");
        }
        else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            $transaksi->update([
                'payment_status_id' => 6,
            ]);

            // $this->newSnapUrl($order_id);
            return response( "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.");
        }
    }
}
