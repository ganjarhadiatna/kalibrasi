<?php
	use App\RiwayatModel;
?>

@extends('layouts.app')
@section('content')
@foreach ($kalibrasi as $kl)
	<div class="container">
		<div class="row">
		    <div class="col">
		    	<h2>Detail Jadwal Kalibrasi</h2>
            </div>
            <div class="col-md-8" style="text-align: right;">
                <a 
                    class="btn btn-info" 
                    href="{{ url('/kalibrasi/done/'.$kl->idkalibrasi) }}" 
                    role="button">
                    <i class="fa fa-lg fa-cog"></i>
                    Kalibrasi
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
                @endif
            </div>
		</div>
		<br>
		<div class="row justify-content-center">
	        <div class="col">
	            <div class="card">
	                <div class="card-header text-md-center">
	                	Detail {{ $kl->nama_alat }}
	                </div>

                    <div class="card-body">
                        <div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-left">
                                    {{ __('Pengujian') }}
                                </label>

                                <div class="col-md-8">
                                	<label for="name" class="col col-form-label text-md-left">
                                		: {{ $kl->judul }}
	                                </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-left">
                                    {{ __('Nama Standar / Alat Ukur') }}
                                </label>

                                <div class="col-md-8">
                                	<label for="name" class="col col-form-label text-md-left">
                                		: {{ $kl->nama_alat }}
	                                </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-left">
                                    {{ __('Tipe / Spesifkasi / No.Seri') }}
                                </label>

                                <div class="col-md-8">
                                    <label for="name" class="col col-form-label text-md-left">
                                		: {{ $kl->no_seri }}
	                                </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-left">
                                    {{ __('Rentang Ukur') }}
                                </label>

                                <div class="col-md-8">
                                    <label for="name" class="col col-form-label text-md-left">
                                		: {{ $kl->rentang_ukur }}
	                                </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-left">
                                    {{ __('Interval pengecekan antara') }}
                                </label>

                                <div class="col-md-8">
                                	<label for="name" class="col col-form-label text-md-left">
                                		: {{ $kl->interval_pengecekan }}
	                                </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-left">
                                    {{ __('Interval Kalibrasi') }}
                                </label>

                                <div class="col-md-8">
                                    <label for="name" class="col col-form-label text-md-left">
                                		: {{ $kl->interval_kalibrasi }} Tahun
	                                </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-left">
                                    {{ __('Lembaga yang mengkalibrasi') }}
                                </label>

                                <div class="col-md-8">
                                    <label for="name" class="col col-form-label text-md-left">
                                		: {{ $kl->lembaga_kalibrasi }}
	                                </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-left">
                                    {{ __('Keberterimaan hasil kalibrasi') }}
                                </label>

                                <div class="col-md-8">
                                    <label for="name" class="col col-form-label text-md-left" style="text-transform: uppercase;">
                                		: {{ $kl->hasil_kalibrasi }}
	                                </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-left">
                                    {{ __('Jadwal perawatan rutin') }}
                                </label>

                                <div class="col-md-8">
                                    <label for="name" class="col col-form-label text-md-left">
                                		: {{ $kl->jadwal_perawatan_rutin }}
	                                </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-left">
                                    {{ __('Terakhir Perawatan') }}
                                </label>

                                <div class="col-md-8">
                                    <label for="name" class="col col-form-label text-md-left">
                                		: {{ $kl->terakhir_perawatan }}
	                                </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-left">
                                    {{ __('Kalibrasi Selanjutnya') }}
                                </label>

                                <div class="col-md-8">
                                    <label for="name" class="col col-form-label text-md-left">
                                        @if (is_string(RiwayatModel::GetLastRiwayat($kl->idkalibrasi)))
                                            : {{ RiwayatModel::GetLastRiwayat($kl->idkalibrasi) }}
                                        @else
                                            : {{ $kl->terakhir_perawatan }}
                                        @endif
	                                </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-left">
                                    {{ __('PIC') }}
                                </label>

                                <div class="col-md-8">
                                    <label for="name" class="col col-form-label text-md-left">
                                		: {{ $kl->pic }}
	                                </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-left">
                                    {{ __('Status') }}
                                </label>

                                <div class="col-md-8">
                                    <label for="name" class="col col-form-label text-md-left" style="text-transform: uppercase;">
                                        @if ($kl->status == '1')
                                            : Terkalibrasi
                                        @else
                                            : Tidak Terkalibrasi
                                        @endif
	                                </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-left">
                                    {{ __('Deskripsi / Catatan') }}
                                </label>

                                <div class="col-md-8">
                                    <label for="name" class="col col-form-label text-md-left">
                                		: {{ $kl->keterangan }}
	                                </label>
                                </div>
                            </div>

                        </div>
                    </div>
	            </div>
	        </div>
	    </div>
	</div>
@endforeach
@endsection