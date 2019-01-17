<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RiwayatModel extends Model
{
    protected $table = 'riwayat';

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

    //GET
    function scopeGetVal($query, $id, $val)
    {
        return DB::table($this->table)
        ->where('idkalibrasi', $id)
        ->value($val);
    }
    function scopeGetLastRiwayat($query, $id)
    {
        return DB::table($this->table)
        ->where('idkalibrasi', $id)
        ->orderBy('idriwayat', 'desc')
        ->limit(1)
        ->value('riwayat');
    }

    function scopeGetByKalibrasi($query, $idkalibrasi, $limit, $order = 'asc')
    {
    	return DB::table($this->table)
    	->select(
            'riwayat.idriwayat',
            'riwayat.riwayat',
    		'kalibrasi.idkalibrasi',
            'kalibrasi.nama_alat',
            'kalibrasi.interval_kalibrasi'
    	)
    	->join('kalibrasi', 'kalibrasi.idkalibrasi', '=', 'riwayat.idkalibrasi')
    	->where('riwayat.idkalibrasi', $idkalibrasi)
    	->orderBy('riwayat.idriwayat', $order)
    	->paginate($limit);
    }
}
