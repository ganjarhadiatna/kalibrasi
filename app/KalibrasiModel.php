<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KalibrasiModel extends Model
{
    protected $table = 'kalibrasi';

    //create
    function scopeInsert($query, $data)
    {
    	return DB::table($this->table)
    	->insert($data);
    }
    //update
    function scopeEdit($query, $data, $id)
    {
    	return DB::table($this->table)
    	->where('idkalibrasi', $id)
    	->update($data);
    }
    //delete
    function scopeRemove($query, $id)
    {
    	return DB::table($this->table)
    	->where('idkalibrasi', $id)
    	->delete();
    }

    //read
    function scopeGetVal($query, $id, $val)
    {
        return DB::table($this->table)
        ->where('idkalibrasi', $id)
        ->value($val);
    }
    function scopeGetAll($query, $limit, $order = 'asc')
    {
    	return DB::table($this->table)
    	->select(
            'kalibrasi.idkalibrasi',
            'kalibrasi.nama_alat',
            'kalibrasi.no_seri',
            'kalibrasi.rentang_ukur',
            'kalibrasi.interval_pengecekan',
            'kalibrasi.interval_kalibrasi',
            'kalibrasi.lembaga_kalibrasi',
            'kalibrasi.hasil_kalibrasi',
            'kalibrasi.jadwal_perawatan_rutin',
            'kalibrasi.terakhir_perawatan',
            'kalibrasi.pic',
            'kalibrasi.status',
            'kalibrasi.keterangan',
            'kalibrasi.id',
            'kalibrasi.idbidang',
	    	'bidang.judul'
    	)
    	->join('bidang', 'bidang.idbidang', '=', 'kalibrasi.idbidang')
    	->orderBy('bidang.judul', $order)
    	->paginate($limit);
    }

    function scopeGetById($query, $id)
    {
    	return DB::table($this->table)
    	->select(
    		'kalibrasi.idkalibrasi',
            'kalibrasi.nama_alat',
            'kalibrasi.no_seri',
            'kalibrasi.rentang_ukur',
            'kalibrasi.interval_pengecekan',
            'kalibrasi.interval_kalibrasi',
            'kalibrasi.lembaga_kalibrasi',
            'kalibrasi.hasil_kalibrasi',
            'kalibrasi.jadwal_perawatan_rutin',
            'kalibrasi.terakhir_perawatan',
            'kalibrasi.pic',
            'kalibrasi.status',
            'kalibrasi.keterangan',
            'kalibrasi.id',
            'kalibrasi.idbidang',
            'bidang.judul'
    	)
    	->join('bidang', 'bidang.idbidang', '=', 'kalibrasi.idbidang')
    	->where('idkalibrasi', $id)
    	->limit(1)
    	->get();
    }

    function scopeGetByBidang($query, $idbidang, $limit, $order = 'asc')
    {
    	return DB::table($this->table)
    	->select(
    		'kalibrasi.idkalibrasi',
            'kalibrasi.nama_alat',
            'kalibrasi.no_seri',
            'kalibrasi.rentang_ukur',
            'kalibrasi.interval_pengecekan',
            'kalibrasi.interval_kalibrasi',
            'kalibrasi.lembaga_kalibrasi',
            'kalibrasi.hasil_kalibrasi',
            'kalibrasi.jadwal_perawatan_rutin',
            'kalibrasi.terakhir_perawatan',
            'kalibrasi.pic',
            'kalibrasi.status',
            'kalibrasi.keterangan',
            'kalibrasi.id',
            'kalibrasi.idbidang',
            'bidang.judul'
    	)
    	->join('bidang', 'bidang.idbidang', '=', 'kalibrasi.idbidang')
    	->where('kalibrasi.idbidang', $idbidang)
    	->orderBy('bidang.judul', $order)
    	->paginate($limit);
    }
}
