@extends('lapharian.master')

@section('content')

<div class="card">
	<div class="card-header">Edit laporan</div>
	<div class="card-body">
		<form method="post" action="{{ route('lapharian.update', $lapharian->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">tanggal</label>
				<div class="col-sm-10">
					<input type="date" name="tanggal" class="form-control" value="{{ $lapharian->tanggal }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">deskripsi kegiatan</label>
				<div class="col-sm-10">
					<input type="text" name="deskripsi_kegiatan" class="form-control" value="{{ $lapharian->deskripsi_kegiatan }}" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Dokumentasi kegiatan</label>
				<div class="col-sm-10">
					<input type="file" name="dokumentasi_kegiatan" />
					<br />
					<img src="{{ asset('images/' . $lapharian->dokumentasi_kegiatan) }}" width="100" class="img-thumbnail" />
					<input type="hidden" name="hidden_dokumentasi_kegiatan" value="{{ $lapharian->dokumentasi_kegiatan }}" />
				</div>
			</div>
			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $lapharian->id }}" />
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>	
		</form>
	</div>
</div>

@endsection('content')