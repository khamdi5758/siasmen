@extends('admin.master')
@section('title', 'daftar mahasiswa')
@section('onactivemhs','active')
@section('ondftrmhs','active')

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
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>nim</th>
                                            <th>nama</th>
                                            <th>perguruan tinggi</th>
                                            <th>program studi</th>
                                            <th>jenjang</th>
                                            <th>status</th>
                                            <th>foto</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $item)
                                        <tr class="gradeU">
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{$item->nim}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->perguruan_tinggi}}</td>
                                            <td>{{$item->program_studi}}</td>
                                            <td>{{$item->jenjang}}</td>
                                            <td>{{$item->status}}</td>
                                            <td><img src="/images/{{$item->foto}}" width="75" alt="$item->foto"></td>
                                            <td>

                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admmahasiswa.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a data-id="{{ $item->id }}" class="btn btn-warning edit" data-toggle="modal" data-target="#modal-edit" style="color: white;"><i class="bi bi-pencil-square"></i>edit</a>

                                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
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
        <form name="frm_add" id="frm_add" class="form-horizontal" action="{{ route('admmahasiswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">NIM</label>
                    <div class="col-lg-10">
                        <input type="text" name="nim" placeholder="nim" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">nama</label>
                    <div class="col-lg-10">
                        <input type="text" name="nama" placeholder="nama" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">jenkel</label>
                    <div class="col-lg-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="jenkel" id="jenkel" value="Laki-Laki" checked />Laki-Laki
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="jenkel" id="jenkel" value="Perempuan"/>Perempuan
                        </label>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">perguruan tinggi</label>
                    <div class="col-lg-10">
                        <input type="text" name="perguruan_tinggi" placeholder="perguruan tinggi" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">program studi</label>
                    <div class="col-lg-10">
                        <input type="text" name="program_studi" placeholder="program studi" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">jenjang</label>
                    <div class="col-lg-10">
                        <input type="text" name="jenjang" placeholder="Jenjang" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">status</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="status">
                            <option value="belum lulus">belum lulus</option>
                            <option value="lulus">lulus</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">foto</label>
                    <div class="col-lg-10">
                        <input type="file" name="foto" />
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
            <form name="frm_edit" id="editform" class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">NIM</label>
                    <div class="col-lg-10">
                        <input type="hidden" name="hidid" id = "idedit" placeholder="id" class="form-control">
                        <input type="text" name="nim" id = "nim" placeholder="nim" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">nama</label>
                    <div class="col-lg-10">
                        <input type="text" name="nama" id="nama" placeholder="nama" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">jenkel</label>
                    <div class="col-lg-10">
                    <div class="radio">

                        <label>
                            <input type="radio" name="jenkel"  id="jkl" value="Laki-Laki"/>Laki-Laki
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="jenkel" id="jkp" value="Perempuan"/>Perempuan
                        </label>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">perguruan tinggi</label>
                    <div class="col-lg-10">
                        <input type="text" name="perguruan_tinggi" placeholder="perguruan tinggi" id="perguruan_tinggi" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">program studi</label>
                    <div class="col-lg-10">
                        <input type="text" name="program_studi" placeholder="program studi" id="program_studi" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">jenjang</label>
                    <div class="col-lg-10">
                        <input type="text" name="jenjang" placeholder="Jenjang" id="jenjang" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">status</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="status" id="status">
                            <option value="belum lulus">belum lulus</option>
                            <option value="lulus">lulus</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">foto</label>
                    <div class="col-lg-10">
                        <input type="file" name="foto" id=foto/>
                        <img width="100" src="#" id="img" />
                        <input type="hidden" name="img" id="foto2">
                    </div>
			    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="id">
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
            // $('.edit').on('click', function() {
            $('#dataTables-example').on('click','.edit', function() {
                let id = $(this).data('id');
                let idedit ;
                console.log(id);
                $.ajax({
                    data: {id : id},
                    url : "{{route('admmahasiswa.edit',"+data.id+")}}",
                    type: 'get',
                    dataType: 'json',
                    success: function(data)
                    {
                        $('#idedit').val(data.id);
                        $('#nim').val(data.nim);
                        $('#nama').val(data.nama);
                        // $('#jenkel').val(data.jenkel);
                        $('#perguruan_tinggi').val(data.perguruan_tinggi);
                        $('#program_studi').val(data.program_studi);
                        $('#jenjang').val(data.jenjang);
                        $('#status').val(data.status);
                        $('#foto2').val(data.foto);
                                                                      
                        if (data.jenkel == "Laki-Laki") {
                            document.getElementById("jkl").checked = true;
                        }else if(data.jenkel == "Perempuan"){
                            document.getElementById("jkp").checked = true;
                        }
                        
                        // console.log(data);
                        let foto = document.getElementById('foto2').value;
                        document.getElementById("img").src="{{ asset('images') }}/"+foto;
                        
                        idedit = data.id;                      
                        console.log(idedit);
                        document.getElementById("editform").action="{{ url('admmahasiswa') }}/"+idedit;
                        document.getElementById('idedit').value;
                    }
                });

            });
            
    });
    
</script>
@endsection
