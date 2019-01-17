@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
	    <div class="col">
	    	<h2>Daftar Bidang Pengujian</h2>
	    </div>
			<div class="col-4" style="text-align: right;">
				@if (Auth::user()->type == 'admin')
					<a class="btn btn-primary" href="{{ url('/bidang/tambah') }}" role="button">
						<i class="fa fa-lg fa-plus-circle"></i>
						Tambah Bidang Pengujian
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
	      <th scope="col">Deskripsi</th>
				<th scope="col">Tanggal</th>
				@if (Auth::user()->type == 'admin')
					<th width="230"></th>
				@endif
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $i = 1; ?>
	  	@foreach ($bidang as $bd)
		    <tr>
		      <th scope="row">{{ $i }}</th>
		      <td>{{ $bd->judul }}</td>
		      <td>{{ $bd->deskripsi }}</td>
					<td>{{ $bd->created }}</td>
					@if (Auth::user()->type == 'admin')
						<td style="text-align: center;">
							<a 
								class="btn btn-info" 
								href="{{ url('/bidang/alat/'.$bd->idbidang) }}" 
								role="button">
								Alat
							</a>
							<a 
								class="btn btn-warning" 
								href="{{ url('/bidang/ubah/'.$bd->idbidang) }}" 
								role="button">
								Ubah
							</a>
							<a 
								class="btn btn-danger" 
								href="{{ url('/bidang/remove') }}" 
								role="button"
								onclick="
									event.preventDefault();
									document
									.getElementById('delete-bidang')
									.submit();">
								Hapus
							</a>
							<form id="delete-bidang" action="{{ url('/bidang/remove') }}" method="POST" style="display: none;">
								@csrf
								<input type="hidden" name="idbidang" value="{{ $bd->idbidang }}">
							</form>
						</td>
					@endif
		    </tr>
		    <?php $i++; ?>
		@endforeach
	  </tbody>
	</table>
</div>
@endsection