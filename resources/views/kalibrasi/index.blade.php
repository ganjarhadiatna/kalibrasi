@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
	    <div class="col">
	    	<h2>Pengelolaan Kalibrasi</h2>
	    </div>
	    <div class="col-md-4" style="text-align: right;">
	    	<a class="btn btn-primary" href="{{ url('/kalibrasi/tambah') }}" role="button">
	    		Tambah Kalibrasi
	    	</a>
	    </div>
	</div>
	
	<br>

	<div class="row">
	    <div class="col">
	    	@if ($errors->any())
			    <div class="alert alert-danger">
			    	@foreach ($errors->all() as $error)
			    		<div>{{ $error }}</div>
			    	@endforeach
			    </div>
			@endif
	    </div>
	</div>

	<table class="table table-striped table-light">
	  <thead class="thead-light">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nomor Seri</th>
	      <th scope="col">Nama Alat</th>
	      <th scope="col">Durasi</th>
	      <th scope="col">Terakhir Kalibrasi</th>
	      <th scope="col">Terakhir Kalibrasi Ulang</th>
	      <th scope="col">Keterangan</th>
	      <th scope="col">Bidang</th>
	      <th width="180"></th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $i = 1; ?>
	  	<?php $jdl = ''; ?>
	  	@foreach ($kalibrasi as $kl)
		    <tr>
		      <th scope="row">{{ $i }}</th>
		      <td>{{ $kl->no_seri }}</td>
		      <td>{{ $kl->nama_alat }}</td>
		      <td>{{ $kl->durasi }}</td>
		      <td>{{ $kl->terakhir_kalibrasi }}</td>
		      <td>{{ date( "Y-m-d", strtotime( "$kl->terakhir_kalibrasi +$kl->durasi year" )) }}</td>
		      <td>{{ $kl->keterangan }}</td>
		      <td>{{ $kl->judul }}</td>
		      <td style="text-align: center;">
		      	<a 
		      		class="btn btn-warning" 
		      		href="{{ url('/kalibrasi/ubah/'.$kl->idkalibrasi) }}" 
		      		role="button">
		      		Ubah
		      	</a>
		      	<a 
		      		class="btn btn-danger" 
		      		href="{{ url('/kalibrasi/remove') }}" 
		      		role="button"
		      		onclick="
		      			event.preventDefault();
		      			document
		      			.getElementById('delete-kalibrasi')
		      			.submit();">
		      		Hapus
		      	</a>
		      	<form id="delete-kalibrasi" action="{{ url('/kalibrasi/remove') }}" method="POST" style="display: none;">
		      		@csrf
                    <input type="hidden" name="idkalibrasi" value="{{ $kl->idbidang }}d" required>
                </form>
		      </td>
		    </tr>
		    <?php $jdl = $kl->judul; ?>
		    <?php $i++; ?>
		@endforeach
	  </tbody>
	</table>
</div>
@endsection