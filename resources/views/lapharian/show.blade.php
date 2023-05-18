@extends('lapharian.master')

@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>laporan detail</b></div>
			<div class="col col-md-6">
				<a href="{{ route('lapharian.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>tanggal</b></label>
			<div class="col-sm-10">
				{{ $lapharian->tanggal }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>deskripsi kegiatan</b></label>
			<div class="col-sm-10">
				{{ $lapharian->deskripsi_kegiatan }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>dokumentasi kegiatan</b></label>
			<div class="col-sm-10">
				<img src="{{ asset('images/' .  $lapharian->dokumentasi_kegiatan) }}" width="200" class="img-thumbnail" />
			</div>
		</div>
	</div>
</div>

@endsection('content')
