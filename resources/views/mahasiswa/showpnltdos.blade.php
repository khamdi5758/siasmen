@extends('mahasiswa.master')
@section('title', 'penelitian dosen')
@section('onactivedos','active')
@section('onpnltdos','active')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>
@endif


<div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <tr>
                                        <th>nip</th>
                                        <td>{{$data->dosens->nip}}</td>
                                    </tr>
                                    <tr>
                                        <th>nama</th> 
                                        <td>{{$data->dosens->nama}}</td>  
                                    </tr>
                                    <tr>
                                        <th>judul</th>   
                                        <td>{{$data->judul}}</td> 
                                    </tr>
                                    <tr>
                                        <th>abstrak</th>  
                                        <td>{{$data->abstrak}}</td> 
                                    </tr>
                                    <tr>
                                        <th>tahun</th>  
                                        <td>{{$data->tahun}}</td> 
                                    </tr>
                                </table>
                                <div class="modal-footer">
                                    <a href="{{route('mhspnltdos.index')}}" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                                        
                        </div>
</div>

@endsection
