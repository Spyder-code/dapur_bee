<?php

namespace App\Repositories;

use App\Models\TransactionDetail;
use Yajra\DataTables\DataTables;

class TransactionDetailService extends Repository
{

    public function __construct()
    {
        $this->model = new TransactionDetail;
    }

    public function dataTable()
    {
        return DataTables::of($this->model->all())
            ->addColumn('action', function ($data) {
                return '<a href="' . route('transactiondetail.edit', $data->id) . '" class="btn btn-info btn-sm"><i class="fas fa-pen-alt"></i></a>
                        <form action="' . route('transactiondetail.destroy', $data->id) . '" method="POST" class="d-inline">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="' . csrf_token() . '">
                            <button class="btn btn-danger btn-sm" onclick="return confirm(\'are you sure?\')"><i class="fas fa-trash-alt"></i></button>
                        </form>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
