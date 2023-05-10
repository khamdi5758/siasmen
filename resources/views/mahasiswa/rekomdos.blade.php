@extends('mahasiswa.master')
@section('title', 'daftar mahasiswa')
@section('onatamhs','active')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Form Element Examples
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Basic Form Examples</h3>
                            <form role="form">
                                <div class="form-group">
                                    <label>judul</label>
                                    <input class="form-control" value="{{$input['judul']}}" disabled/>
                                </div>
                                <div class="form-group">
                                    <label>abstrak</label>
                                    <textarea class="form-control" rows="3" disabled>{{$input['abstrak']}}</textarea>
                                    
                                </div>
                                    <!-- <a href="#tabel" class="btn btn-primary" data-toggle="collapse">Klik Disini</a> -->
                                    <!-- <button type="submit" class="btn btn-default">Submit Button</button> -->
                                    <!-- <button type="submit" class="btn btn-default" data-toggle="collapse" data-target="#tabel" >Submit Button</button>
                                    <button type="reset" class="btn btn-primary">Reset Button</button> -->
                            </form>
                            <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <br>

<div id="tabel">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>nip</th>
                                            <th>nama</th>
                                            <th>foto</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                                <td>{{$loop->iteration}}</td>
                                        @foreach ($row as $item)
                                                <td>{{$item['nip']}}</td>
                                                <td>{{$item['nama']}}</td>
                                                <td>{{$item['foto']}}</td>
                                                <td>
                                                    <form method="POST" action="{{ route('mhstamhs.store') }}">
                                                        @csrf
                                                        <!-- <input type="hidden" name="iddos" value="{{$item['id']}}"> -->
                                                        <input type="hidden" name="mahasiswas_id" value="{{auth()->user()->tampiliduser(auth()->user()->username,auth()->user()->type)->id}}">
                                                        <input type="hidden" name="judul" value="{{$input['judul']}}">
                                                        <input type="hidden" name="deskjudul" value="{{$input['abstrak']}}">
                                                        <input type="hidden" name="dosens_id" value="{{$item['id']}}">
                                                        
                                                        <!-- <input type="hidden" name="konfdospil" value="0">
                                                        <input type="hidden" name="konfadmin" value="0"> -->

                                                        
                                                        <button type="submit" class="btn btn-primary btn-sm"> Pilih </button>
                                                    </form>
                                                </td>
                                            
                                        @endforeach
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
        </div>
    </div>
</div>

    
</div>

@endsection
