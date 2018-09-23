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
    function detail($id)
    {
        $kalibrasi = KalibrasiModel::GetById($id);
        $bidang = BidangModel::GetAll(100, 'asc');
        return view('kalibrasi.detail', [
            'kalibrasi' => $kalibrasi,
            'bidang' => $bidang
        ]);
    }

    //post
    function publish(Request $req)
    {
        $req->validate([
            'pengujian' => 'required|integer',
            'nama_alat' => 'required|string|max:250',
            'nomor_seri' => 'required|string|max:250',
            'rentang_ukur' => 'required|string|max:250',
            'interval_pengecekan' => 'required|integer',
            'interval_kalibrasi' => 'required|integer',
            'lembaga_kalibrasi' => 'required|string|max:250',
            'hasil_kalibrasi' => 'required|string|max:250',
            'jadwal_perawatan_rutin' => 'required|string|max:250',
            'terakhir_perawatan' => 'required|date',
            'pic' => 'required|string|max:250',
            'status' => 'string|max:250',
            'deskripsi' => 'string|max:250'
        ]);

        $data = [
            'nama_alat' => $req['nama_alat'],
            'no_seri' => $req['nomor_seri'],
            'rentang_ukur' => $req['rentang_ukur'],
            'interval_pengecekan' => $req['interval_pengecekan'],
            'interval_kalibrasi' => $req['interval_kalibrasi'],
            'lembaga_kalibrasi' => $req['lembaga_kalibrasi'],
            'hasil_kalibrasi' => $req['hasil_kalibrasi'],
            'jadwal_perawatan_rutin' => $req['jadwal_perawatan_rutin'],
            'terakhir_perawatan' => $req['terakhir_perawatan'],
            'pic' => $req['pic'],
            'status' => $req['status'],
            'keterangan' => $req['deskripsi'],
            'id' => Auth::id(),
            'idbidang' => $req['pengujian']
        ];

        $publish = KalibrasiModel::Insert($data);

        return redirect()->route('kalibrasi', $publish);
        //return response()->json($data);
    }
    function put(Request $req)
    {
        $req->validate([
            'pengujian' => 'required|integer',
            'nama_alat' => 'required|string|max:250',
            'nomor_seri' => 'required|string|max:250',
            'rentang_ukur' => 'required|string|max:250',
            'interval_pengecekan' => 'required|integer',
            'interval_kalibrasi' => 'required|integer',
            'lembaga_kalibrasi' => 'required|string|max:250',
            'hasil_kalibrasi' => 'required|string|max:250',
            'jadwal_perawatan_rutin' => 'required|string|max:250',
            'terakhir_perawatan' => 'required|date',
            'pic' => 'required|string|max:250',
            'status' => 'string|max:250',
            'deskripsi' => 'string|max:250'
        ]);

        $data = [
            'nama_alat' => $req['nama_alat'],
            'no_seri' => $req['nomor_seri'],
            'rentang_ukur' => $req['rentang_ukur'],
            'interval_pengecekan' => $req['interval_pengecekan'],
            'interval_kalibrasi' => $req['interval_kalibrasi'],
            'lembaga_kalibrasi' => $req['lembaga_kalibrasi'],
            'hasil_kalibrasi' => $req['hasil_kalibrasi'],
            'jadwal_perawatan_rutin' => $req['jadwal_perawatan_rutin'],
            'terakhir_perawatan' => $req['terakhir_perawatan'],
            'pic' => $req['pic'],
            'status' => $req['status'],
            'keterangan' => $req['deskripsi'],
            'id' => Auth::id(),
            'idbidang' => $req['pengujian']
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
        $remove = KalibrasiModel::Remove($idkalibrasi);

        return redirect()->route('kalibrasi', $remove);

    }
}
