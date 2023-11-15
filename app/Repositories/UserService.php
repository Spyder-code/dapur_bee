<?php

namespace App\Repositories;

use App\Models\User;
use Yajra\DataTables\DataTables;

class UserService extends Repository
{

    public function __construct()
    {
        $this->model = new User;
    }

    public function dataTable()
    {
        $data = $this->model->all();
        if(request('role_id')){
            $data = $this->model->where('role_id',request('role_id'))->get();
        }
        return DataTables::of($data)
            ->addColumn('role_id', function($data){
                return $data->role->name;
            })
            ->addColumn('action', function ($data) {
                return '<a href="' . route('user.edit', $data->id) . '" class="btn btn-info btn-sm"><i class="fas fa-pen-alt"></i></a>
                        <form action="' . route('user.destroy', $data->id) . '" method="POST" class="d-inline">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="' . csrf_token() . '">
                            <button class="btn btn-danger btn-sm" onclick="return confirm(\'are you sure?\')"><i class="fas fa-trash-alt"></i></button>
                        </form>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
