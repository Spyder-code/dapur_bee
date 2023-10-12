<?php

namespace Database\Seeders;

use App\Models\PaymentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment_statuses = array(
            array('id' => '1','name' => 'Success','description' => 'Admin confirm transaction','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','name' => 'capture','description' => 'Transaction is successful and card balance is captured successfully. If no action is taken by you, the transaction will be successfully settled on the same day or the next day or within your agreed settlement time with your partner bank. Then the transaction status changes to settlement. It is safe to assume a successful payment','created_at' => NULL,'updated_at' => NULL),
            array('id' => '3','name' => 'settlement','description' => 'The transaction is successfully settled. Funds have been credited to your account.','created_at' => NULL,'updated_at' => NULL),
            array('id' => '4','name' => 'pending','description' => 'The transaction is created and is waiting to be paid by the customer at the payment providers like Direct debit, Bank Transfer, E-money, and so on. For card payment method: waiting for customer to complete (and card issuer to validate) 3DS/OTP process.','created_at' => NULL,'updated_at' => NULL),
            array('id' => '5','name' => 'deny','description' => 'The credentials used for payment are rejected by the payment provider or Midtrans Fraud Detection System (FDS). To know the reason and details for the denied transaction, see the status_message in the response.','created_at' => NULL,'updated_at' => NULL),
            array('id' => '6','name' => 'cancel','description' => 'The transaction is canceled. It can be triggered by merchant. You can trigger Cancel status in the following cases: 1. If you cancel the transaction after Capture status. 2. If you deny a transaction after Challenge status. If you fail to respond to a transaction with Challenge status within one day, it is automatically canceled by Midtrans.','created_at' => NULL,'updated_at' => NULL),
            array('id' => '7','name' => 'expire','description' => 'Transaction is not available for processing, because the payment was delayed.','created_at' => NULL,'updated_at' => NULL),
            array('id' => '8','name' => 'refund','description' => 'Transaction is marked to be refunded. Refund status can be triggered by merchant.','created_at' => NULL,'updated_at' => NULL),
            array('id' => '9','name' => 'partial_refund','description' => 'Transaction is marked to be refunded partially (if you choose to refund in amount less than the paid amount). Refund status can be triggered by merchant.','created_at' => NULL,'updated_at' => NULL),
            array('id' => '10','name' => 'authorize','description' => 'Only available specifically only if you are using pre-authorize feature for card transactions (an advanced feature that you will not have by default, so in most cases are safe to ignore). Transaction is successful and card balance is reserved (authorized) successfully. You can later perform API “capture” to change it into capture, or if no action is taken will be auto released. Depending on your business use case, you may assume authorize status as a successful transaction.','created_at' => NULL,'updated_at' => NULL),
            array('id' => '11','name' => 'challenge','description' => 'Transaction is flagged as potential fraud, but cannot be determined precisely. You can Accept or Deny the transaction from MAP account or using Approve Transaction API or Deny Transaction API. If no action is taken, the transaction is denied automatically.','created_at' => NULL,'updated_at' => NULL)
        );

        PaymentStatus::insert($payment_statuses);
    }
}
