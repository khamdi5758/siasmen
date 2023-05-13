@extends('dosen.master')
@section('title', 'daftar mahasiswa')
@section('onmhsbim','active')

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
                                    @foreach($data as $item)
                                    <tr>
                                        <th>no</th>
                                        <td>{{$loop->iteration}}</td>
                                    </tr>
                                    <tr>
                                        <th>nim</th>
                                        <td>{{$item->mahasiswas->nim}}</td>
                                    </tr>
                                    <tr>
                                        <th>nama</th>   
                                        <td>{{$item->mahasiswas->nama}}</td>
                                    </tr>
                                    <tr>
                                        <th>judul</th>   
                                        <td>{{$item->judul}}</td>
                                    </tr>
                                    <tr>
                                        <th>deskripsi judul</th>   
                                        <td>{{$item->deskjudul}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                                            <div class="modal-footer">
                                                <!-- <input type="hidden" name="id" id="id"> -->
                                                <!-- <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button> -->
                                                <a href="{{route('dosen.dosmhsbim')}}" class="btn btn-danger">Kembali</a>
                                                
                                            </div>
                                    
                            </div>
                                        
                        </div>
</div>


@endsection
