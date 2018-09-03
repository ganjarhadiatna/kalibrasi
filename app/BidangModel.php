<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BidangModel extends Model
{
    protected $table = 'bidang';

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
    	->where('idbidang', $id)
    	->update($data);
    }
    //delete
    function scopeRemove($query, $id)
    {
    	return DB::table($this->table)
    	->where('idbidang', $id)
    	->delete();
    }

    //read
    function scopeGetAll($query, $limit, $order = 'asc')
    {
    	return DB::table($this->table)
    	->select(
    		'idbidang',
    		'judul',
    		'deskripsi',
    		'created'
    	)
    	->orderBy('id', $order)
    	->paginate($limit);
    }

    function scopeGetById($query, $id)
    {
    	return DB::table($this->table)
    	->select(
    		'idbidang',
    		'judul',
    		'deskripsi',
    		'created'
    	)
    	->where('idbidang', $id)
    	->limit(1)
    	->get();
    }
}
