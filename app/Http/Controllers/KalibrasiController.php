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
            'terakhir_kalibrasi_ulang' => 'required|date',
            'deskripsi' => 'string|max:250',
            'bidang_kalibrasi' => 'required|integer'
        ]);

        $data = [
            'no_seri' => $req['nomor_seri'],
            'nama_alat' => $req['nama_alat'],
            'terakhir_kalibrasi' => $req['terakhir_kalibrasi'],
            'terakhir_kalibrasi_ulang' => $req['terakhir_kalibrasi_ulang'],
            'keterangan' => $req['deskripsi'],
            'id' => Auth::id(),
            'idbidang' => $req['bidang_kalibrasi']
        ];

        $publish = KalibrasiModel::Insert($data);

        return redirect()->route('kalibrasi', $publish);

        /*Auth::id();
    	if (!empty($id)) 
    	{
    		$bidang_kalibrasi = $req['bidang_kalibrasi'];
    		$nomor_seri = $req['nomor_seri'];
    		$nama_alat = $req['nama_alat'];
    		$terakhir_kalibrasi = $req['terakhir_kalibrasi'];
    		$terakhir_kalibrasi_ulang = $req['terakhir_kalibrasi_ulang'];
	    	$deskripsi = $req['deskripsi'];

	    	$data = [
	    		'no_seri' => $nomor_seri,
	    		'nama_alat' => $nama_alat,
	    		'terakhir_kalibrasi' => $terakhir_kalibrasi,
	    		'terakhir_kalibrasi_ulang' => $terakhir_kalibrasi_ulang,
		    	'keterangan' => $deskripsi,
	    		'id' => $id,
	    		'idbidang' => $bidang_kalibrasi
	    	];

	    	$sql = KalibrasiModel::Insert($data);
	    	if ($sql) 
	    	{
	    		return json_encode([
	    			'status' => 'success',
	    			'message' => 'Data saved'
	    		]);
	    	} 
	    	else 
	    	{
	    		return json_encode([
	    			'status' => 'error',
	    			'message' => 'Failed to save'
	    		]);
	    	}
	    	
    	} 
    	else 
    	{
    		return json_encode([
    			'status' => 'error',
    			'message' => 'Access denied'
    		]);
    	}*/
    }
    function put(Request $req)
    {
        $req->validate([
            'idkalibrasi' => 'required|integer',
            'nomor_seri' => 'required|string|max:250',
            'nama_alat' => 'required|string|max:250',
            'terakhir_kalibrasi' => 'required|date',
            'terakhir_kalibrasi_ulang' => 'required|date',
            'deskripsi' => 'string|max:250',
            'bidang_kalibrasi' => 'required|integer'
        ]);

        $data = [
            'no_seri' => $req['nomor_seri'],
            'nama_alat' => $req['nama_alat'],
            'terakhir_kalibrasi' => $req['terakhir_kalibrasi'],
            'terakhir_kalibrasi_ulang' => $req['terakhir_kalibrasi_ulang'],
            'keterangan' => $req['deskripsi'],
            'id' => Auth::id(),
            'idbidang' => $req['bidang_kalibrasi']
        ];

        $idkalibrasi = $req['idkalibrasi'];
        $put = KalibrasiModel::Edit($data, $idkalibrasi);
        
        return redirect()->route('kalibrasi', $put);

    	/*$id = Auth::id();
    	if (!empty($id)) 
    	{
    		$idkalibrasi = $req['idkalibrasi'];
    		$bidang_kalibrasi = $req['bidang_kalibrasi'];
    		$nomor_seri = $req['nomor_seri'];
    		$nama_alat = $req['nama_alat'];
    		$terakhir_kalibrasi = $req['terakhir_kalibrasi'];
    		$terakhir_kalibrasi_ulang = $req['terakhir_kalibrasi_ulang'];
	    	$deskripsi = $req['deskripsi'];

	    	$data = [
	    		'no_seri' => $nomor_seri,
	    		'nama_alat' => $nama_alat,
	    		'terakhir_kalibrasi' => $terakhir_kalibrasi,
	    		'terakhir_kalibrasi_ulang' => $terakhir_kalibrasi_ulang,
		    	'keterangan' => $deskripsi,
	    		'id' => $id,
	    		'idbidang' => $bidang_kalibrasi
	    	];

	    	$sql = KalibrasiModel::Edit($data, $idkalibrasi);
	    	if ($sql) 
	    	{
	    		return json_encode([
	    			'status' => 'success',
	    			'message' => 'Data edited'
	    		]);
	    	} 
	    	else 
	    	{
	    		return json_encode([
	    			'status' => 'error',
	    			'message' => 'Failed to edit'
	    		]);
	    	}
	    	
    	} 
    	else 
    	{
    		return json_encode([
    			'status' => 'error',
    			'message' => 'Access denied'
    		]);
    	}*/
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

    	/*$id = Auth::id();
    	if (!empty($id)) 
    	{
    		$idkalibrasi = $req['idkalibrasi'];

	    	$sql = KalibrasiModel::Remove($idkalibrasi);
	    	if ($sql) 
	    	{
	    		return json_encode([
	    			'status' => 'success',
	    			'message' => 'Data deleted'
	    		]);
	    	} 
	    	else 
	    	{
	    		return json_encode([
	    			'status' => 'error',
	    			'message' => 'Failed to delete'
	    		]);
	    	}
	    	
    	} 
    	else 
    	{
    		return json_encode([
    			'status' => 'error',
    			'message' => 'Access denied'
    		]);
    	}*/
    }
}
