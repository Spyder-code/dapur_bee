<?php

namespace App\Repositories;

use App\Models\Order;
use Yajra\DataTables\DataTables;

class OrderService extends Repository
{

    public function __construct()
    {
        $this->model = new Order;
    }

    public function dataTable()
    {
        $data = Order::join('users','users.id','=','orders.user_id')
                ->select('orders.id','orders.message','users.name','users.phone','users.address');
        return DataTables::of($data)
            ->make(true);
    }
}
