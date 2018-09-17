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
    function scopeGetAll($query, $limit, $order = 'asc')
    {
    	return DB::table($this->table)
    	->select(
    		'kalibrasi.idkalibrasi',
    		'kalibrasi.no_seri',
	    	'kalibrasi.nama_alat',
	    	'kalibrasi.terakhir_kalibrasi',
	    	'kalibrasi.durasi',
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
    		'kalibrasi.no_seri',
	    	'kalibrasi.nama_alat',
	    	'kalibrasi.terakhir_kalibrasi',
	    	'kalibrasi.durasi',
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
}
