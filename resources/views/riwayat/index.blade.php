@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
	    <div class="col">
	    	<h2>Riwayat Kalibrasi</h2>
	    </div>
			<div class="col-md-4" style="text-align: right;">
				{{-- @if (Auth::user()->type == 'admin')
					<a 
						class="btn btn-info" 
						href="{{ url('/kalibrasi/done/'.$idkalibrasi) }}" 
						role="button">
						Kalibrasi
					</a>
				@endif --}}
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
	        <th scope="col">Nama Alat</th>
	        <th scope="col">Riwayat Kalibrasi</th>
	        {{-- <th width="50"></th> --}}
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $i = 1; ?>
	  	<?php $jdl = ''; ?>
	  	@foreach ($riwayat as $kl)
		    <tr>
				<th scope="row">{{ $i }}</th>
		        <td>{{ $kl->nama_alat }}</td>
		        <td>{{ $kl->riwayat }}</td>
		        {{-- <td style="text-align: center;">
					@if (Auth::user()->type == 'admin')
						<a 
							class="btn btn-warning" 
							href="{{ url('/riwayat/ubah/'.$kl->idriwayat) }}" 
							role="button">
							Ubah
						</a>
						<a 
							class="btn btn-danger" 
							href="{{ url('/riwayat/remove') }}" 
							role="button"
							onclick="
								event.preventDefault();
								document
								.getElementById('delete-riwayat')
								.submit();">
							Hapus
						</a>
						<form id="delete-riwayat" action="{{ url('/riwayat/remove') }}" method="POST" style="display: none;">
							@csrf
							<input type="hidden" name="idriwayat" value="{{ $kl->idriwayat }}" required>
						</form>
					@endif
		      </td> --}}
		    </tr>
		    <?php $i++; ?>
		@endforeach
	  </tbody>
	</table>
</div>
@endsection