@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-md-center">
                	Tambah Bidang Kalibrasi
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/bidang/publish') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Judul Bidang') }}</label>

                            <div class="col-md-8">
                                <input id="judul" type="text" class="form-control{{ $errors->has('judul') ? ' is-invalid' : '' }}" name="judul" value="{{ old('judul') }}" maxlength="50" required autofocus>

                                @if ($errors->has('judul'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Deskripsi Bidang') }}</label>

                            <div class="col-md-8">
                                <textarea 
                                	name="deskripsi"
                                	id="deskripsi"
                                	class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}"
                                    maxlength="250"></textarea>

                                @if ($errors->has('deskripsi'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 text-md-right">
                            	<a class="btn btn-light" href="{{ url('/bidang') }}" role="button">
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