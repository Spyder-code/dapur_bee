<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Repositories\CustomerService;
use App\Repositories\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }


    public function index()
    {
        $data = $this->orderService->all();
        return view('admin.order.index', compact('data'));
    }


    public function create()
    {
        return view('admin.order.create');
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['status'] = 0;
        $this->orderService->store($data);
        return back()->with('success','Order has success created');
    }


    public function show(Order $order)
    {
        return view('admin.order.show', compact('order'));
    }


    public function edit(Order $order)
    {
        return view('admin.order.edit', compact('order'));
    }


    public function update(Request $request, Order $order)
    {
        $this->orderService->update($request->all(),$order->id);
        return redirect()->route('order.index')->with('success','Order has success updated');
    }


    public function destroy(Order $order)
    {
        $this->orderService->destroy($order->id);
        return redirect()->route('order.index')->with('success','Order has success deleted');
    }

    public function dataTable()
    {
        return $this->orderService->dataTable();
    }
}
