<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

use App\BidangModel;

class BidangController extends Controller
{
	//get
    function index()
    {
    	$bidang = BidangModel::GetAll(10, 'desc');
    	return view('bidang.index', [
    		'bidang' => $bidang
    	]);
    }
    function tambah()
    {
    	return view('bidang.tambah');
    }
    function ubah($id)
    {
    	$bidang = BidangModel::GetById($id);
    	return view('bidang.ubah', [
    		'bidang' => $bidang
    	]);
    }

    //post
    function publish(Request $req)
    {
        $req->validate([
            'judul' => 'required|string|unique:bidang|max:50',
            'deskripsi' => 'required|string|max:250'
        ]);

        $data = [
            'judul' => $req['judul'],
            'deskripsi' => $req['deskripsi'],
            'id' => Auth::id()
        ];

        $publish = BidangModel::Insert($data);

        return redirect()->route('bidang', $publish);
    	/*$id = Auth::id();
    	if (!empty($id)) 
    	{
    		$judul = $req['judul'];
	    	$deskripsi = $req['deskripsi'];

	    	$data = [
	    		'judul' => $judul,
	    		'deskripsi' => $deskripsi,
	    		'id' => $id
	    	];

	    	$sql = BidangModel::Insert($data);
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
            'idbidang' => 'required|integer',
            'judul' => 'required|string|unique:bidang|max:50',
            'deskripsi' => 'string|max:250'
        ]);

        $idbidang = $req['idbidang'];
        $data = [
            'judul' => $req['judul'],
            'deskripsi' => $req['deskripsi'],
            'id' => Auth::id()
        ];

        $put = BidangModel::Edit($data, $idbidang);

        return redirect()->route('bidang', $put);

    	/*$id = Auth::id();
    	if (!empty($id)) 
    	{
    		$idbidang = $req['idbidang'];
    		$judul = $req['judul'];
	    	$deskripsi = $req['deskripsi'];

	    	$data = [
	    		'judul' => $judul,
	    		'deskripsi' => $deskripsi,
	    		'id' => $id
	    	];

	    	$sql = BidangModel::Edit($data, $idbidang);
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
            'idbidang' => 'required|integer'
        ]);

        $idbidang = $req['idbidang'];
        $remove = BidangModel::Remove($idbidang);

        return redirect()->route('bidang', $remove);

    	/*$id = Auth::id();
    	if (!empty($id)) 
    	{
    		$idbidang = $req['idbidang'];

	    	$sql = BidangModel::Remove($idbidang);
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
