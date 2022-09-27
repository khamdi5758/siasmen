@extends('lapharian.master')

@section('content')

@if($errors->any())

<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

	@endforeach
	</ul>
</div>

@endif

<div class="card">
	<div class="card-header">Add logbook</div>
	<div class="card-body">
		<form method="post" action="{{ route('lapharian.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">tanggal</label>
				<div class="col-sm-10">
					<input type="date" name="tanggal" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">deskripsi kegiatan</label>
				<div class="col-sm-10">
					<input type="text" name="deskripsi_kegiatan" class="form-control" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">dokumentasi kegiatan</label>
				<div class="col-sm-10">
					<input type="file" name="dokumentasi_kegiatan" />
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Add" />
			</div>	
		</form>
	</div>
</div>

@endsection('content')