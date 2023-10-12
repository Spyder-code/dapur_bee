<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Repositories\TransactionDetailService;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    private $transactiondetailService;

    public function __construct(TransactionDetailService $transactiondetailService)
    {
        $this->transactiondetailService = $transactiondetailService;
    }


    public function index()
    {
        $data = $this->transactiondetailService->all();
        return view('admin.transactiondetail.index', compact('data'));
    }


    public function create()
    {
        return view('admin.transactiondetail.create');
    }


    public function store(Request $request)
    {
        $this->transactiondetailService->store($request->all());
        return redirect()->route('transactiondetail.index')->with('success','TransactionDetail has success created');
    }


    public function show(TransactionDetail $transactiondetail)
    {
        return view('admin.transactiondetail.show', compact('transactiondetail'));
    }


    public function edit(TransactionDetail $transactiondetail)
    {
        return view('admin.transactiondetail.edit', compact('transactiondetail'));
    }


    public function update(Request $request, TransactionDetail $transactiondetail)
    {
        $this->transactiondetailService->update($request->all(),$transactiondetail->id);
        return redirect()->route('transactiondetail.index')->with('success','TransactionDetail has success updated');
    }


    public function destroy(TransactionDetail $transactiondetail)
    {
        $this->transactiondetailService->destroy($transactiondetail->id);
        return redirect()->route('transactiondetail.index')->with('success','TransactionDetail has success deleted');
    }

    public function dataTable()
    {
        return $this->transactiondetailService->dataTable();
    }
}