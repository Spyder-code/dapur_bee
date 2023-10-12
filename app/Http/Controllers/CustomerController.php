<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Repositories\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }


    public function index()
    {
        $data = $this->customerService->all();
        return view('admin.customer.index', compact('data'));
    }


    public function create()
    {
        return view('admin.customer.create');
    }


    public function store(Request $request)
    {
        $this->customerService->store($request->all());
        return back()->with('success','Customer has success created');
    }


    public function show(Customer $customer)
    {
        return view('admin.customer.show', compact('customer'));
    }


    public function edit(Customer $customer)
    {
        return view('admin.customer.edit', compact('customer'));
    }


    public function update(Request $request, Customer $customer)
    {
        $this->customerService->update($request->all(),$customer->id);
        return redirect()->route('customer.index')->with('success','Customer has success updated');
    }


    public function destroy(Customer $customer)
    {
        $this->customerService->destroy($customer->id);
        return redirect()->route('customer.index')->with('success','Customer has success deleted');
    }

    public function dataTable()
    {
        return $this->customerService->dataTable();
    }
}
