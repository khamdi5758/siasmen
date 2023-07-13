@extends('admin.master')
@section('title', 'penelitian dosen')
@section('onactivedos','active')
@section('onpnltdos','active')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>
@endif
<div class="row">
    <div class="col-md-12">
    <h2>Halaman Detail Penelitian Dosen</h2>   
    <!-- <h5>Welcome Jhon Deo , Love to see you back. </h5> -->
    </div>
</div>
<hr>

<div class="panel panel-default">
                        <div class="panel-heading">
                             Detail Penelitian
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
                                    <tr>
                                        <th>link</th>  
                                        <td><a href="{{$data->link}}" target="__blank">klik disini</a></td> 
                                    </tr>
                                </table>
                                <div class="modal-footer">
                                    <a href="{{route('admpnltdosen.index')}}" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                                        
                        </div>
</div>

@endsection
