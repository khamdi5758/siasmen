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
                            Calon Mahasiswa Bimbingan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    @foreach($data as $item)
                                    <form name="frm_edit" id="editform" class="form-horizontal" action="{{ route('dosmhsbim.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
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
                                    
                                    <tr>
                                        <th>terima sebagai pembimbing ?</th>   
                                        <td>
                                        
                                            <div class="form-group">
                                                <div class="col-lg-2">
                                                    <input type="hidden" name="idptuakmhs"  value="{{$item->id}}">
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="">.....</option>
                                                        <option value="1">ya</option>
                                                        <option value="0">tidak</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>catatan</th>   
                                        <td>
                                        
                                            <div class="form-group">
                                                <div class="col-lg-2">
                                                    <textarea name="catatan_dos" rows="10" cols="55%" placeholder="catatan"></textarea>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                            <div class="modal-footer">
                                                <!-- <input type="hidden" name="id" id="id"> -->
                                                <!-- <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button> -->
                                                <a href="{{route('dosen.dosmhsbim')}}" class="btn btn-danger">Kembali</a>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                            </div>
                                        
                        </div>
</div>


@endsection
