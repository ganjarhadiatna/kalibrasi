@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-md-center">
                	Ubah Jadwal Kalibrasi
                </div>

                @foreach ($kalibrasi as $kl)
                    <div class="card-body">
                        <form method="POST" action="{{ url('/kalibrasi/put') }}" aria-label="{{ __('edit') }}">
                            @csrf

                            <input type="hidden" name="idkalibrasi" value="{{ $kl->idkalibrasi }}">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-left">
                                    {{ __('Pengujian') }}
                                </label>

                                <div class="col-md-8">

                                    <select id="pengujian" type="text" class="form-control{{ $errors->has('pengujian') ? ' is-invalid' : '' }}" name="pengujian" required autofocus>
                                        @foreach ($bidang as $bd)
                                            @if ($bd->judul == $kl->judul)
                                                <option value="{{ $bd->idbidang }}" selected="selected">
                                                    {{ $bd->judul }}
                                                </option>
                                            @else
                                                <option value="{{ $bd->idbidang }}">
                                                    {{ $bd->judul }}
                                                </option>
                                            @endif
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
                                    <input id="nama_alat" type="text" class="form-control{{ $errors->has('nama_alat') ? ' is-invalid' : '' }}" name="nama_alat" value="{{ $kl->nama_alat }}" required autofocus>

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
                                    <input id="nomor_seri" type="text" class="form-control{{ $errors->has('nomor_seri') ? ' is-invalid' : '' }}" name="nomor_seri" value="{{ $kl->no_seri }}" required>

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
                                    <input id="rentang_ukur" type="text" class="form-control{{ $errors->has('rentang_ukur') ? ' is-invalid' : '' }}" name="rentang_ukur" value="{{ $kl->rentang_ukur }}" required>

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
                                    <input id="interval_pengecekan" type="number" class="form-control{{ $errors->has('interval_pengecekan') ? ' is-invalid' : '' }}" name="interval_pengecekan" value="{{ $kl->interval_pengecekan }}" required>

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
                                    <input id="interval_kalibrasi" type="number" class="form-control{{ $errors->has('interval_kalibrasi') ? ' is-invalid' : '' }}" name="interval_kalibrasi" value="{{ $kl->interval_kalibrasi }}" required>

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
                                    <input id="lembaga_kalibrasi" type="text" class="form-control{{ $errors->has('lembaga_kalibrasi') ? ' is-invalid' : '' }}" name="lembaga_kalibrasi" value="{{ $kl->lembaga_kalibrasi }}" required>

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
                                        @if ($kl->hasil_kalibrasi == 'x')
                                            <option value="x" selected>
                                                X
                                            </option>
                                            <option value="ok">
                                                OK
                                            </option>
                                        @else
                                            <option value="x">
                                                X
                                            </option>
                                            <option value="ok" selected>
                                                OK
                                            </option>
                                        @endif
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
                                    <input id="jadwal_perawatan_rutin" type="text" class="form-control{{ $errors->has('jadwal_perawatan_rutin') ? ' is-invalid' : '' }}" name="jadwal_perawatan_rutin" value="{{ $kl->jadwal_perawatan_rutin }}" required>

                                    @if ($errors->has('jadwal_perawatan_rutin'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('jadwal_perawatan_rutin') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-left">
                                    {{ __('Terakhir Perawatan') }}
                                </label>

                                <div class="col-md-8">
                                    <input id="terakhir_perawatan" type="date" class="form-control{{ $errors->has('terakhir_perawatan') ? ' is-invalid' : '' }}" name="terakhir_perawatan" value="{{ $kl->terakhir_perawatan }}" required>

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
                                    <input id="pic" type="text" class="form-control{{ $errors->has('pic') ? ' is-invalid' : '' }}" name="pic" value="{{ $kl->pic }}" required>

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
                                        @if ($kl->status == 'baik')
                                            <option value="baik" selected>
                                                Baik
                                            </option>
                                            <option value="tidak baik">
                                                Tidak Baik
                                            </option>
                                        @else
                                            <option value="baik">
                                                Baik
                                            </option>
                                            <option value="tidak baik" selected>
                                                Tidak Baik
                                            </option>
                                        @endif
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
                                        class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}">{{ $kl->keterangan }}</textarea>

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
                                        Ubah
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>

                @endforeach
                
            </div>
        </div>
    </div>
</div>
@endsection