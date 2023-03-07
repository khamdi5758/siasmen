@extends('admin.master')
@section('title', 'daftar mahasiswa')
@section('onactivemhs','active')
@section('ontamhs','active')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="panel panel-default">
    <div class="ibox-tools">
        <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i>Tambah</button>
    </div>
    <div class="panel-heading">
        Advanced Tables
    </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>nim</th>
                            <th>judul</th>
                            <th>abstrak</th>
                            <th>dosen pembimbing</th>
                            <th>action<th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr class="gradeU">
                            <td>{{ $loop->iteration}}</td>
                            <td>{{$item->nim}}</td>
                            <td>{{$item->judul}}</td>
                            <td>{{$item->abstrak}}</td>
                            <td>{{$item->dosen_pembimbing}}</td>
                            <td>
                            <form action="{{ route('admtuam.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="#" data-id="{{ $item->id }}" data-toggle="modal" data-target="#modal-edit" class="btn btn-warning btn-sm edittamhs"> Edit </a>
                                    &nbsp;
                                    <a href="{{ route('admtuam.show', $item->id) }}" class="btn btn-primary btn-sm"> Show </a> 
                                    &nbsp;
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>           
        </div>
</div>

<!-- modal add data-->
<div class="modal inmodal fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <form name="frm_add" id="frm_add" class="form-horizontal" action="{{ route('admtuam.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Nama</label>
                    <div class="col-lg-10">
                        <!-- <input type="text" name="nim" placeholder="nim" class="form-control"> -->
                        <select class="form-control" name="nip">
                            <option>pilih</option>
                        @foreach($mhs as $mhs)
                            <option value="{{$mhs->nim}}">{{$mhs->nama}}</option>
                        @endforeach
                        </select> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">judul</label>
                    <div class="col-lg-10">
                        <!-- <input type="text" name="judul" placeholder="judul" class="form-control"> -->
                        <textarea name="judul" rows="3" cols="60" placeholder="judul"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">abstrak</label>
                    <div class="col-lg-10">
                        <!-- <input type="text" name="abstrak" placeholder="abstrak" class="form-control"> -->
                        <textarea name="abstrak" rows="10" cols="60" placeholder="abstrak"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">dosen pembimbing</label>
                    <div class="col-lg-10">
                        <input type="text" name="dosen_pembimbing" placeholder="dosen_pembimbing" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </div>
        </form>
    </div>
</div>

<!-- modal edit data-->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="titleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Edit Data</h4>
            </div>
            <form name="frm_edit" id="editform" class="form-horizontal" action="#" method="POST" >
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">NIM</label>
                    <div class="col-lg-10">
                        <input type="hidden" name="hidid" id="idedit" class="form-control">
                        <input type="text" name="nim" placeholder="nim" id="nim" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">judul</label>
                    <div class="col-lg-10">
                        <!-- <input type="text" name="judul" placeholder="judul" class="form-control"> -->
                        <textarea name="judul" rows="3" cols="60" id="judul" placeholder="judul"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">abstrak</label>
                    <div class="col-lg-10">
                        <!-- <input type="text" name="abstrak" placeholder="abstrak" class="form-control"> -->
                        <textarea name="abstrak" rows="10" cols="60" id="abstrak" placeholder="abstrak"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">dosen pembimbing</label>
                    <div class="col-lg-10">
                        <input type="text" name="dosen_pembimbing" id="dosen_pembimbing" placeholder="dosen_pembimbing" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(function() {
            // edit ajax request
            $('.edittamhs').on('click', function() {
                let id = $(this).data('id');
                $.ajax({
                    data: {id : id},
                    url : "{{route('admtuam.edit',"+data.id+")}}",
                    type: 'get',
                    dataType: 'json',
                    success: function(data)
                    {
                        $('#idedit').val(data.id);
                        $('#nim').val(data.nim);
                        $('#judul').val(data.judul);
                        $('#abstrak').val(data.abstrak);
                        $('#dosen_pembimbing').val(data.dosen_pembimbing);
                        let idedit = data.id; 
                        document.getElementById("editform").action="{{ url('admtuam') }}/"+idedit;
                    }
                });
                
            });
            
    });
    
</script>
@endsection
