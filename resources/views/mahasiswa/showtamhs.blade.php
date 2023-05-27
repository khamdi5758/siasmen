@extends('mahasiswa.master')
@section('title', 'daftar tugas akhir  mahasiswa')
@section('onactivemhs','active')
@section('ontamhs','active')

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
                                        <th>nama</th>   
                                        <td>
                                            <?php
                                                if ($tuam->nama == null) {
                                                    echo $tuam->mahasiswas->nama;
                                                }elseif ($tuam->nama != null) {
                                                    echo $tuam->nama;
                                                }
                                            ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>judul</th>   
                                        <td>{{$tuam->judul}}</td>
                                    </tr>
                                    <tr>
                                        <th>abstrak</th>  
                                        <td>{{$tuam->abstrak}}</td> 
                                    </tr>
                                    <tr>
                                        <th>tahun</th>  
                                        <td>{{$tuam->tahun}}</td> 
                                    </tr>
                                </table>
                                <div class="modal-footer">
                                    <a href="{{route('mhstamhs.index')}}" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                                        
                        </div>
</div>

@endsection
