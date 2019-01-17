@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-md-center">
                	Tambah Jadwal Kalibrasi Alat
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/kalibrasi/publish') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">
                                {{ __('Pengujian') }}
                            </label>

                            <div class="col-md-8">

                                <select id="pengujian" type="text" class="form-control{{ $errors->has('pengujian') ? ' is-invalid' : '' }}" name="pengujian" required autofocus>
                                    @foreach ($bidang as $bd)
                                        <option value="{{ $bd->idbidang }}">
                                            {{ $bd->judul }}
                                        </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('pengujian'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pengujian') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">
                                {{ __('Nama Standar / Alat Ukur') }}
                            </label>

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
                            <label for="name" class="col-md-4 col-form-label text-md-left">
                                {{ __('Tipe / Spesifkasi / No.Seri') }}
                            </label>

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
                            <label for="name" class="col-md-4 col-form-label text-md-left">
                                {{ __('Rentang Ukur') }}
                            </label>

                            <div class="col-md-8">
                                <input id="rentang_ukur" type="text" class="form-control{{ $errors->has('rentang_ukur') ? ' is-invalid' : '' }}" name="rentang_ukur" value="{{ old('rentang_ukur') }}" required>

                                @if ($errors->has('rentang_ukur'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rentang_ukur') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">
                                {{ __('Interval pengecekan antara') }}
                            </label>

                            <div class="col-md-8">
                                <input id="interval_pengecekan" type="number" class="form-control{{ $errors->has('interval_pengecekan') ? ' is-invalid' : '' }}" name="interval_pengecekan" value="{{ old('interval_pengecekan') }}" required>

                                @if ($errors->has('interval_pengecekan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('interval_pengecekan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">
                                {{ __('Interval Kalibrasi') }}
                            </label>

                            <div class="col-md-8">
                                <input id="interval_kalibrasi" type="number" class="form-control{{ $errors->has('interval_kalibrasi') ? ' is-invalid' : '' }}" name="interval_kalibrasi" value="{{ old('interval_kalibrasi') }}" required autofocus>

                                @if ($errors->has('interval_kalibrasi'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('interval_kalibrasi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">
                                {{ __('Lembaga yang mengkalibrasi') }}
                            </label>

                            <div class="col-md-8">
                                <input id="lembaga_kalibrasi" type="text" class="form-control{{ $errors->has('lembaga_kalibrasi') ? ' is-invalid' : '' }}" name="lembaga_kalibrasi" value="{{ old('lembaga_kalibrasi') }}" required>

                                @if ($errors->has('lembaga_kalibrasi'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lembaga_kalibrasi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">
                                {{ __('Keberterimaan hasil kalibrasi') }}
                            </label>

                            <div class="col-md-8">
                                <select id="hasil_kalibrasi" type="text" class="form-control{{ $errors->has('hasil_kalibrasi') ? ' is-invalid' : '' }}" name="hasil_kalibrasi" required>
                                    <option value="x">
                                        X
                                    </option>
                                    <option value="ok">
                                        OK
                                    </option>
                                </select>

                                @if ($errors->has('hasil_kalibrasi'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hasil_kalibrasi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">
                                {{ __('Jadwal perawatan rutin') }}
                            </label>

                            <div class="col-md-8">
                                <input id="jadwal_perawatan_rutin" type="text" class="form-control{{ $errors->has('jadwal_perawatan_rutin') ? ' is-invalid' : '' }}" name="jadwal_perawatan_rutin" value="{{ old('jadwal_perawatan_rutin') }}" required>

                                @if ($errors->has('jadwal_perawatan_rutin'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jadwal_perawatan_rutin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">
                                {{ __('Terakhir perawatan') }}
                            </label>

                            <div class="col-md-8">
                                <input id="terakhir_perawatan" type="date" class="form-control{{ $errors->has('terakhir_perawatan') ? ' is-invalid' : '' }}" name="terakhir_perawatan" value="{{ old('terakhir_perawatan') }}" required autofocus>

                                @if ($errors->has('terakhir_perawatan'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('terakhir_perawatan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">
                                {{ __('PIC') }}
                            </label>

                            <div class="col-md-8">
                                <input id="pic" type="text" class="form-control{{ $errors->has('pic') ? ' is-invalid' : '' }}" name="pic" value="{{ old('pic') }}" required>

                                @if ($errors->has('pic'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pic') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">
                                {{ __('Status') }}
                            </label>

                            <div class="col-md-8">
                                <select id="status" type="text" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" required>
                                    <option value="1">
                                        Terkalibrasi
                                    </option>
                                    <option value="0">
                                        Tidak Terkalibrasi
                                    </option>
                                </select>

                                @if ($errors->has('status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">
                                {{ __('Deskripsi / Catatan') }}
                            </label>

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