<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		
		.bordertablog{
			border: 1px solid black; 
			border-collapse: collapse;
		}
		td.bordertablog{
			text-align: center;
		}
	</style>
    <title>Laravel 9 CRUD Application</title>
</head>
<body>
    <div class="container mt-5">

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<!-- <div class="card"> -->
	<header>
	<!-- <div class="card-header">
			<div class="col col-md-20">
				<center>LOGBOOK KEGIATAN <br>
					BEASISWA PEMUDA TANGGUH PEMERINTAH KOTA SURABAYA <br>
					DINAS KEBUDAYAAN, KEPEMUDAAN DAN OLAHRAGA SERTA PARIWISATA KOTA SURABAYA
				</center>
			</div>
	</div> -->
	<table align="center" width="100%">
		<tr>
			<td>
				<center>
				<font size="4">LOGBOOK KEGIATAN</font><br>
				<font size="4">BEASISWA PEMUDA TANGGUH PEMERINTAH KOTA SURABAYA</font><br>
				<font size="4">DINAS KEBUDAYAAN, KEPEMUDAAN DAN OLAHRAGA SERTA PARIWISATA KOTA SURABAYA</font>
				</center>
			</td>
		</tr>
		<tr>
			<td><hr></td>
		</tr>
	</table>
	</header>
	<br>
	<!-- <div class="card-body"> -->
		<table>
			<tr>
				<th>nama</th>
				<td>:</td>
				<td>m khamdi fadli</td>
			</tr>
			<tr>
				<th>nim</th>
				<td>:</td>
				<td>190631100106</td>
			</tr>
			<tr>
				<th>Perguruan Tinggi</th>
				<td>:</td>
				<td>Universitas Trunojoyo Madura</td>
			</tr>
			<tr>
				<th>Fakultas</th>
				<td>:</td>
				<td>Pendidikan</td>
			</tr>
			<tr>
				<th>Prodi</th>
				<td>:</td>
				<td>Pendidikan Informatika</td>
			</tr>
			<tr>
				<th>Semester</th>
				<td>:</td>
				<td>7</td>
			</tr>
			<tr>
				<th>rentang waktu</th>
				<td>:</td>
				<td>7 - 8</td>
			</tr>
		</table>
		<br>
		<table class="bordertablog" width="100%">
			<tr class="bordertablog">
				<th class="bordertablog">No</th>
				<th class="bordertablog">tanggal</th>
				<th class="bordertablog">deskripsi kegiatan</th>
				<th class="bordertablog">dokumentasi kegiatan</th>
			</tr>
			@if(count($data) > 0)
				@foreach($data as $row) 

				<tr class="bordertablog">
						<td class="bordertablog" >{{ $loop->iteration }}</td>
						<td class="bordertablog">{{ $row->tanggal }}</td>
						<td class="bordertablog">{{ $row->deskripsi_kegiatan }}</td>
						<td class="bordertablog"><img src="{{ asset('images/' . $row->dokumentasi_kegiatan) }}" width="170" height="160"/></td>
					</tr>
				@endforeach

			@else
				<tr>
					<td colspan="5" class="text-center">No Data Found</td>
				</tr>
			@endif
		</table>
		{!! $data->links() !!}
			
	<!-- </div> -->
<!-- </div> -->

<script type="text/javascript">
	//window.print();
</script>

</div>
    
</body>
</html>
