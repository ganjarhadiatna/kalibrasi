<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalibrasiController extends Controller
{
    function index()
    {
    	return view('kalibrasi.index');
    }
}
