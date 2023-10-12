<?php

namespace App\Repositories;

use App\Models\Cart;
use Yajra\DataTables\DataTables;

class CartService extends Repository
{

    public function __construct()
    {
        $this->model = new Cart;
    }

    public function dataTable()
    {
        $data = Cart::join('products','products.id','=','carts.product_id')
                ->join('users','users.id','=','carts.user_id')
                ->select('carts.id','carts.status','carts.note','users.name','users.phone','users.address','products.name as product');
        return DataTables::of($data)
            // ->addColumn('action', function ($data) {
            //     return '<a href="' . route('cart.edit', $data->id) . '" class="btn btn-primary btn-sm"><i class="fas fa-pen-alt"></i></a>
            //             <form action="' . route('cart.destroy', $data->id) . '" method="POST" class="d-inline">
            //                 <input type="hidden" name="_method" value="DELETE">
            //                 <input type="hidden" name="_token" value="' . csrf_token() . '">
            //                 <button class="btn btn-danger btn-sm" onclick="return confirm(\'are you sure?\')"><i class="fas fa-trash-alt"></i></button>
            //             </form>';
            // })
            // ->rawColumns(['action'])
            ->make(true);
    }
}
