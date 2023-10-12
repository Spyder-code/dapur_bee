<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use App\Repositories\CartService;
use App\Repositories\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }


    public function index()
    {
        $data = $this->cartService->all();
        return view('admin.cart.index', compact('data'));
    }


    public function create()
    {
        return view('admin.cart.create');
    }


    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        if($request->qty>$product->stock){
            return back()->with('danger','Jumlah melebihi stock!');
        }
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $this->cartService->store($data);
        return redirect()->route('page.carts')->with('success','Cart has success created');
    }


    public function show(Cart $cart)
    {
        return view('admin.cart.show', compact('cart'));
    }


    public function edit(Cart $cart)
    {
        return view('admin.cart.edit', compact('cart'));
    }


    public function update(Request $request, Cart $cart)
    {
        $this->cartService->update($request->all(),$cart->id);
        return redirect()->route('cart.index')->with('success','Cart has success updated');
    }


    public function destroy(Cart $cart)
    {
        $this->cartService->destroy($cart->id);
        return back()->with('success','Cart has success deleted');
    }

    public function dataTable()
    {
        return $this->cartService->dataTable();
    }

    public function add()
    {
        $data = Cart::where('user_id',request('user_id'))->where('product_id',request('product_id'))->first();
        if(!$data){
            $data = Cart::create([
                'user_id' => request('user_id'),
                'product_id' => request('product_id'),
            ]);
        }
        return response($data);
    }
}
