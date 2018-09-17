<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

use App\KalibrasiModel;
use App\BidangModel;

class KalibrasiController extends Controller
{
	//get
    function index()
    {
    	$kalibrasi = KalibrasiModel::GetAll(10, 'asc');
    	return view('kalibrasi.index', [
    		'kalibrasi' => $kalibrasi
    	]);
    }
    function tambah()
    {
    	$bidang = BidangModel::GetAll(100, 'asc');
    	return view('kalibrasi.tambah', [
    		'bidang' => $bidang
    	]);
    }
    function ubah($id)
    {
    	$kalibrasi = KalibrasiModel::GetById($id);
    	$bidang = BidangModel::GetAll(100, 'asc');
    	return view('kalibrasi.ubah', [
    		'kalibrasi' => $kalibrasi,
    		'bidang' => $bidang
    	]);
    }

    //post
    function publish(Request $req)
    {
        $req->validate([
            'nomor_seri' => 'required|string|max:250',
            'nama_alat' => 'required|string|max:250',
            'terakhir_kalibrasi' => 'required|date',
            'durasi' => 'required|integer',
            'deskripsi' => 'string|max:250',
            'bidang_kalibrasi' => 'required|integer'
        ]);

        $data = [
            'no_seri' => $req['nomor_seri'],
            'nama_alat' => $req['nama_alat'],
            'terakhir_kalibrasi' => $req['terakhir_kalibrasi'],
            'durasi' => $req['durasi'],
            'keterangan' => $req['deskripsi'],
            'id' => Auth::id(),
            'idbidang' => $req['bidang_kalibrasi']
        ];

        $publish = KalibrasiModel::Insert($data);

        return redirect()->route('kalibrasi', $publish);
    }
    function put(Request $req)
    {
        $req->validate([
            'idkalibrasi' => 'required|integer',
            'nomor_seri' => 'required|string|max:250',
            'nama_alat' => 'required|string|max:250',
            'terakhir_kalibrasi' => 'required|date',
            'durasi' => 'required|integer',
            'deskripsi' => 'string|max:250',
            'bidang_kalibrasi' => 'required|integer'
        ]);

        $data = [
            'no_seri' => $req['nomor_seri'],
            'nama_alat' => $req['nama_alat'],
            'terakhir_kalibrasi' => $req['terakhir_kalibrasi'],
            'durasi' => $req['durasi'],
            'keterangan' => $req['deskripsi'],
            'id' => Auth::id(),
            'idbidang' => $req['bidang_kalibrasi']
        ];

        $idkalibrasi = $req['idkalibrasi'];
        $put = KalibrasiModel::Edit($data, $idkalibrasi);
        
        return redirect()->route('kalibrasi', $put);
    }
    function remove(Request $req)
    {
        $req->validate([
            'idkalibrasi' => 'required|integer'
        ]);

        $idkalibrasi = $req['idkalibrasi'];
        /*$remove = KalibrasiModel::Remove($idkalibrasi);

        return redirect()->route('kalibrasi', $remove);*/
        echo $idkalibrasi;

    }
}
