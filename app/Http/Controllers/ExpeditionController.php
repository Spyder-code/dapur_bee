<?php

namespace App\Http\Controllers;

use App\Services\RajaOngkirService;
use Illuminate\Http\Request;

class ExpeditionController extends Controller
{
    public function getProvinceOngkir()
    {
        $ro = new RajaOngkirService();
        return $ro->getProvince(request('id'));
    }

    public function getCityOngkir()
    {
        $ro = new RajaOngkirService();
        return $ro->getCity(request('province_id'),request('id'));
    }

    public function getOngkir()
    {
        $ro = new RajaOngkirService();
        $data = [
            "origin"=>"23",
            "destination"=>request('destination'),
            "weight"=>request('weight'),
            "courier"=>request('courier')
        ];
        return $ro->getCost($data);
    }
}
