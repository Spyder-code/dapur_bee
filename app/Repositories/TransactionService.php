<?php

namespace App\Repositories;

use App\Models\Transaction;
use Yajra\DataTables\DataTables;

class TransactionService extends Repository
{

    public function __construct()
    {
        $this->model = new Transaction;
    }

    public function dataTable($data)
    {
        $query = Transaction::query();
        if($data['status']!='all'){
            $query->where('status',$data['status']);
        }
        if($data['from'] && $data['to']){
            $query->whereBetween('created_at',[$data['from'],$data['to']]);
        }
        return DataTables::of($query->get())
            ->addColumn('expedition_price', function($data){
                return number_format($data->expedition_price);
            })
            ->addColumn('amount', function($data){
                return number_format($data->amount);
            })
            ->addColumn('total', function($data){
                return number_format($data->total);
            })
            ->addColumn('user_id', function($data){
                return $data->user->name ?? '-';
            })
            ->addColumn('is_paid', function($data){
                return $data->is_paid==1 ? 'Dibayar' : 'Belum Bayar';
            })
            ->addColumn('created_by', function($data){
                return $data->createdBy->name ?? '-';
            })
            ->addColumn('updated_by', function($data){
                return $data->updatedBy->name ?? '-';
            })
            ->addColumn('created_at', function($data){
                return date('d/m/y', strtotime($data->created_at));
            })
            ->addColumn('to_date', function($data){
                return $data->to_date ? date('d/m/y H:i', strtotime($data->to_date)) : '-';
            })
            ->addColumn('note', function($data){
                return explode(',',json_encode($data->transaction_details()->pluck('note')));
            })
            ->addColumn('action', function ($data) {
                return '<a href="' . route('transaction.edit', $data->id) . '" class="btn btn-info btn-sm"><i class="fas fa-pen-alt"></i></a>
                        <form action="' . route('transaction.destroy', $data->id) . '" method="POST" class="d-inline">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="' . csrf_token() . '">
                            <button class="btn btn-danger btn-sm" onclick="return confirm(\'are you sure?\')"><i class="fas fa-trash-alt"></i></button>
                        </form>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
