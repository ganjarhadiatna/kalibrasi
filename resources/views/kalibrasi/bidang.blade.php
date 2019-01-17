<?php
	use App\RiwayatModel;
?>

@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
	    <div class="col">
	    	<h2>Jadwal Kalibrasi Alat</h2>
	    </div>
			<div class="col-md-4" style="text-align: right;">
				@if (Auth::user()->type == 'admin')
					<a class="btn btn-primary" href="{{ url('/kalibrasi/tambah') }}" role="button">
						<i class="fa fa-lg fa-plus-circle"></i>
						Tambah Jadwal Kalibrasi Alat
					</a>
				@endif
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
				<th scope="col">Nama Bidang</th>
	      <th scope="col">Nama Alat</th>
	      <th scope="col">Tanggal Kalibrasi Terakhir</th>
	      <th width="380"></th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $i = 1; ?>
	  	<?php $jdl = ''; ?>
	  	@foreach ($kalibrasi as $kl)
		    <tr>
					<th scope="row">{{ $i }}</th>
					<td>{{ $kl->judul }}</td>
		      <td>{{ $kl->nama_alat }}</td>
		      <td>
						@if (is_string(RiwayatModel::GetLastRiwayat($kl->idkalibrasi)))
							{{ RiwayatModel::GetLastRiwayat($kl->idkalibrasi) }}
						@else
							{{ $kl->terakhir_perawatan }}
						@endif
					</td>
		      <td style="text-align: center;">
		      	<a 
		      		class="btn btn-info" 
		      		href="{{ url('/kalibrasi/detail/'.$kl->idkalibrasi) }}" 
		      		role="button">
		      		Detail
						</a>
						<a 
		      		class="btn btn-primary" 
		      		href="{{ url('/kalibrasi/riwayat/'.$kl->idkalibrasi) }}" 
		      		role="button">
		      		Riwayat Kalibrasi
						</a>
						@if (Auth::user()->type == 'admin')
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
								<input type="hidden" name="idkalibrasi" value="{{ $kl->idkalibrasi }}" required>
							</form>
						@endif
		      </td>
		    </tr>
		    <?php $jdl = $kl->judul; ?>
		    <?php $i++; ?>
		@endforeach
	  </tbody>
	</table>
</div>
@endsection