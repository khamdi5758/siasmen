@extends('mahasiswa.master')
@section('title', 'daftar dosen')
@section('ondospem','active')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif
<div class="row">
    <div class="col-md-12">
    <h2>Halaman Daftar Dosen Pembimbing</h2>   
    <!-- <h5>Welcome Jhon Deo , Love to see you back. </h5> -->
    </div>
</div>
<hr>

<div class="panel panel-default">
    <div class="panel-heading">
        Dosen Pembimbing
    </div>
    <div class="panel-body">
        @foreach($data as $item)
        <div class="card">
            <img src="/images/{{$item->foto}}" alt="Avatar" style="width:100%">
        <div class="containercard">
            <center>
            <h4><b>{{$item->nama}}</b></h4> 
            </center>
        </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
