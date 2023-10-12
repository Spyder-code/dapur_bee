<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Repositories\TransactionService;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    private $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }


    public function index()
    {
        $data = $this->transactionService->all();
        $status = request('status') ?? 'all';
        return view('admin.transaction.index', compact('data','status'));
    }


    public function create()
    {
        return view('admin.transaction.create');
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $data['expedition_price'] = preg_replace('/[^0-9]/', '', $data['expedition_price']);
        $data['user_id'] = Auth::id();
        $data['expedition_type'] = 'Ongkir Rp. '.number_format($data['expedition_price']);
        if(!preg_match("/[^+0-9]/",trim($data['phone']))){
            if(substr(trim($data['phone']), 0, 2)=="62"){
                $data['phone'] = trim($data['phone']);
            }
            else if(substr(trim($data['phone']), 0, 1)=="0"){
                $data['phone'] = "62".substr(trim($data['phone']), 1);
            }
        }
        $date = date('Ymd');
        $no = Transaction::where('user_id',$data['user_id'])->count() + 1;
        $data['invoice'] = 'INV/'.$date.'/'.$data['user_id'].sprintf('%02d',$no);
        $trx = Transaction::create($data);

        $carts = Cart::where('user_id',Auth::id())->get();
        foreach ($carts as $cart) {
            TransactionDetail::create([
                'transaction_id' => $trx->id,
                'user_id' => $data['user_id'],
                'product_id' => $cart->product_id,
                'qty' => $cart->qty,
                'note' => $data['message']
            ]);
        }
        $carts->delete();
        // $service_midtrans = new MidtransService();
        // $transaction = $service_midtrans->pay($trx);
        return redirect()->route('payment.pay',['invoice'=>$trx->invoice])->with('success','Transaction has success created');
    }


    public function show(Transaction $transaction)
    {
        return view('admin.transaction.show', compact('transaction'));
    }


    public function edit(Transaction $transaction)
    {
        return view('admin.transaction.edit', compact('transaction'));
    }


    public function update(Request $request, Transaction $transaction)
    {
        if($request->customer){
            $data = $request->all();
            if($file = $request->file('payment_file')){
                $filename = $file->getClientOriginalName();
                $path = 'transactions/';
                $file->storeAs('public/'.$path,$filename);
                $data['payment_file'] = 'storage/'.$path.$filename;
            }

            $transaction->update($data);
            return back()->with('success','Transaction has success updated');
        }else{
            $this->transactionService->update($request->all(),$transaction->id);
            return redirect()->route('transaction.index')->with('success','Transaction has success updated');
        }
    }


    public function destroy(Transaction $transaction)
    {
        $this->transactionService->destroy($transaction->id);
        return back()->with('success','Transaction has success canceled');
    }

    public function dataTable()
    {
        $data = request()->all();
        return $this->transactionService->dataTable($data);
    }
}
