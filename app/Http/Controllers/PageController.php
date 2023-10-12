<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        $products = Product::where('stock','>',0)->inRandomOrder()->get();
        return view('user.home', compact('products'));
    }

    public function productDetail($slug)
    {
        $product = Product::where('stock','>',0)->where('slug',$slug)->first();
        if(!$product){ return abort(404);}
        $products = Product::where('stock','>',0)->inRandomOrder()->get();
        $previous = Product::where('stock','>',0)->where('id', '<', $product->id)->max('id');
        $next = Product::where('stock','>',0)->where('id', '>', $product->id)->min('id');
        $left = Product::find($previous);
        $right = Product::find($next);
        return view('user.product_detail', compact('product','products','left','right'));
    }

    public function shop()
    {
        $product_categories = ProductCategory::all();
        if(request('product_category')){
            $category = request('product_category');
            $products = Product::where('stock','>',0)->whereHas('productCategory', function($q) use($category){
                $q->where('slug',$category);
            })->inRandomOrder()->get();
        }else{
            $products = Product::where('stock','>',0)->inRandomOrder()->get();
        }
        return view('user.shop', compact('product_categories','products'));
    }

    public function cart()
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        return view('user.cart', compact('carts'));
    }

    public function whatsapp(Product $product, Cart $cart = null)
    {
        $phone = env('PHONE');
        if($cart){
            $line1 = urlencode('Saya pesan '.$product->name).'%0A%0A';
            $line2 = urlencode('Nama: '.Auth::user()->name).'%0A';
            $line3 = urlencode('Alamat: '.Auth::user()->address).'%0A';
            $line4 = urlencode('Catatan: '.$cart->note).'%0A';
            $res= $line1.$line2.$line3.$line4;
            return redirect('https://wa.me/'.$phone.'?text='.$res.'%0A'.route('page.product.detail',$product->slug));
        }else{
            $url = 'Saya mau pesan '.$product->name;
            $res = urlencode($url);
            return redirect('https://wa.me/'.$phone.'?text='.$res.'%0A'.route('page.product.detail',$product->slug));
        }
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function instagram()
    {
        return view('user.instagram');
    }

    public function order()
    {
        $customer = Customer::where('ip_address',request()->ip())->first();
        return view('user.order', compact('customer'));
    }

    public function pesanan()
    {
        $transactions = Transaction::where('user_id',Auth::id())->get();
        return view('user.pesanan', compact('transactions'));
    }

    public function profile()
    {
        $transactions = Transaction::where('user_id',Auth::id())->get();
        return view('user.profile', compact('transactions'));
    }

    public function checkout()
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        if($carts->count()==0){
            return back()->with('danger','Anda harus menambahkan produk ke keranjang terlebih dahulu!');
        }
        $setting = Setting::find(1);

        $initialDate = new DateTime();
        $newDate = $initialDate->modify('+1 day');
        $minDay = $newDate->format('Y-m-d\TH:i');

        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart->qty * $cart->product->price;
        }
        return view('user.checkout', compact('carts','setting','minDay','total'));
    }

    public function invoice()
    {
        if(request('invoice')){
            $transaction = Transaction::where('invoice',request('invoice'))->first();
            if(!$transaction){
                return abort(404);
            }
        }else{
            return abort(404);
        }
        $setting = Setting::find(1);
        return view('user.invoice', compact('transaction','setting'));
    }

    public function updateUser(User $user, Request $request)
    {
        $data = $request->all();
        if($request->avatar){
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $path = 'users/';
            $file->storeAs('public/'.$path,$filename);
            $data['avatar'] = 'storage/'.$path.$filename;
        }
        $user->update($data);
        return back()->with('success','Update Successfully!');
    }
}
