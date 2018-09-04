@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-md-center">
                	Tambah Kalibrasi
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/kalibrasi/publish') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Bidang Kalibrasi') }}</label>

                            <div class="col-md-8">

                                <select id="bidang_kalibrasi" type="text" class="form-control{{ $errors->has('bidang_kalibrasi') ? ' is-invalid' : '' }}" name="bidang_kalibrasi" required autofocus>
                                    @foreach ($bidang as $bd)
                                        <option value="{{ $bd->idbidang }}">
                                            {{ $bd->judul }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('nomor_seri'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nomor_seri') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Nomor Seri') }}</label>

                            <div class="col-md-8">
                                <input id="nomor_seri" type="text" class="form-control{{ $errors->has('nomor_seri') ? ' is-invalid' : '' }}" name="nomor_seri" value="{{ old('nomor_seri') }}" required>

                                @if ($errors->has('nomor_seri'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nomor_seri') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Nama Alat') }}</label>

                            <div class="col-md-8">
                                <input id="nama_alat" type="text" class="form-control{{ $errors->has('nama_alat') ? ' is-invalid' : '' }}" name="nama_alat" value="{{ old('nama_alat') }}" required autofocus>

                                @if ($errors->has('nama_alat'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_alat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Terakhir Kalibrasi') }}</label>

                            <div class="col-md-8">
                                <input id="terakhir_kalibrasi" type="date" class="form-control{{ $errors->has('terakhir_kalibrasi') ? ' is-invalid' : '' }}" name="terakhir_kalibrasi" value="{{ old('terakhir_kalibrasi') }}" required autofocus>

                                @if ($errors->has('terakhir_kalibrasi'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('terakhir_kalibrasi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Terakhir Kalibrasi Ulang') }}</label>

                            <div class="col-md-8">
                                <input id="terakhir_kalibrasi_ulang" type="date" class="form-control{{ $errors->has('terakhir_kalibrasi_ulang') ? ' is-invalid' : '' }}" name="terakhir_kalibrasi_ulang" value="{{ old('terakhir_kalibrasi_ulang') }}" required autofocus>

                                @if ($errors->has('terakhir_kalibrasi_ulang'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('terakhir_kalibrasi_ulang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Deskripsi Kalibrasi') }}</label>

                            <div class="col-md-8">
                                <textarea 
                                	name="deskripsi"
                                	id="deskripsi"
                                	class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}"></textarea>

                                @if ($errors->has('deskripsi'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 text-md-right">
                            	<a class="btn btn-light" href="{{ url('/kalibrasi') }}" role="button">
						    		Batalkan
						    	</a>
                                <button type="submit" class="btn btn-primary">
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection