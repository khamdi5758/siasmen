@extends('admin.master')
@section('title', 'daftar dosen')
@section('onactivedos','active')
@section('ondftrdos','active')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>
@endif
<div class="row">
    <div class="col-md-12">
    <h2>Halaman Tampil Profile Dosen</h2>   
    <!-- <h5>Welcome Jhon Deo , Love to see you back. </h5> -->
    </div>
</div>
<hr>

<div class="panel panel-default">
                        <div class="panel-body">
                            <center>
                                <img width="200" height="200" src="/images/{{$data->foto}}" id="img" />
                            </center>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <tr>
                                        <th>nip</th>
                                        <td>{{$data->nip}}</td>
                                    </tr>
                                    <tr>
                                        <th>nama</th> 
                                        <td>{{$data->nama}}</td>  
                                    </tr>
                                    <tr>
                                        <th>jenis kelamin</th>   
                                        <td>{{$data->jenkel}}</td> 
                                    </tr>
                                    <tr>
                                        <th>status</th>  
                                        <td>{{$data->status}}</td> 
                                    </tr>
                                    <tr>
                                        <th>pendidikan terakhir</th>  
                                        <td>{{$data->pendidikan_terakhir}}</td> 
                                    </tr>
                                    <tr>
                                        <th>pangkat</th>  
                                        <td>{{$data->pangkat}}</td> 
                                    </tr>
                                    <tr>
                                        <th>keahlian</th>  
                                        <td>{{$data->keahlian}}</td> 
                                    </tr>
                                </table>
                                <div class="modal-footer">
                                    <a href="{{route('admpnltdosen.index')}}" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                                        
                        </div>
</div>

@endsection
