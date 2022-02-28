<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\DataObat;
use App\DataSigna;


class MasterDataController extends Controller {
    //Data Obat
    public function listDataObat() {
        $dataObat = DataObat::get();
        return view('dataobat.list', compact('dataObat'));
    }

    //Data Signa 

    public function listDataSigna() {
        $dataSigna = DataSigna::get();
        return view('datasigna.list', compact('dataSigna'));
    }

    public static function getCountDataObat(){
        $data = DataObat::get()->count();
        return $data;
    }

    public static function getCountDataSigna(){
        $data = DataSigna::get()->count();
        return $data;
    }
}