<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RiwayatModel;

class RiwayatController extends Controller
{
    function index($id)
    {
        $riwayat = RiwayatModel::GetByKalibrasi($id, 10, 'asc');
        return view('riwayat.index', [
            'riwayat' => $riwayat,
            'idkalibrasi' => $id
    	]);
    }
}
