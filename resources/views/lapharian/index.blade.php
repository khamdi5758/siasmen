@extends('lapharian.master')

@section('content')

<h1 class="text-primary mt-3 mb-4 text-center"><b>Log book harian</b></h1>
@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-2"><b>log book harian</b></div>
			<div class="col col-md-16 float->end">
				<a href="{{ route('lapharian.create') }}" class="btn btn-success btn-sm">Add</a>
				<a href="{{ url('lapharian/cetak') }}" class="btn btn-info btn-sm">cetak</a>
				<!-- <a class="btn btn-info" href="{{url('lapharian/cetak')}}" target="_blank"><i class="fa fa-print"></i> Cetak</a> -->
			</div>
			
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<tr>

				<th>No</th>
				<th>tanggal</th>
				<th>deskripsi kegiatan</th>
				<th>dokumentasi kegiatan</th>
				<th>Action</th>
			</tr>
			@if(count($data) > 0)
				@foreach($data as $row) 

				<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $row->tanggal }}</td>
						<td>{{ $row->deskripsi_kegiatan }}</td>
						<td><img src="{{ asset('images/' . $row->dokumentasi_kegiatan) }}" width="75" /></td>
						<td>
							<form method="post" action="{{ route('lapharian.destroy', $row->id) }}">
								@csrf
								@method('DELETE')
								<a href="{{ route('lapharian.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
								<a href="{{ route('lapharian.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
								<input type="submit" class="btn btn-danger btn-sm" value="Delete" />
							</form>
							
						</td>
					</tr>
				@endforeach

			@else
				<tr>
					<td colspan="5" class="text-center">No Data Found</td>
				</tr>
			@endif
		</table>
		{!! $data->links() !!}
	</div>
</div>

@endsection