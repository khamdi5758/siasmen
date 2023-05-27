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
                                            <th>nip</th>
                                            <th>nama</th>
                                            <th>jenkel</th>
                                            <th>status</th>
                                            <th>pendidikan terakhir</th>
                                            <th>pangkat</th>
                                            <th>foto</th>
                                            <th>action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $item)
                                        <tr class="gradeU">
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{$item->nip}}</td>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->jenkel}}</td>
                                            <td>{{$item->status}}</td>
                                            <td>{{$item->pendidikan_terakhir}}</td>
                                            <td>{{$item->pangkat}}</td>
                                            <td><img src="/images/{{ $item->foto }}" width="75" alt="$item->foto"></td>
                                            <td>

                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admdosen.destroy', $item->id) }}" method="post">
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
        <form name="frm_add" id="frm_add" class="form-horizontal" action="{{ route('admdosen.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">NIP</label>
                    <div class="col-lg-10">
                        <input type="text" name="nip" placeholder="nip" class="form-control">
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
                    <label class="col-lg-2 control-label">status</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="status">
                            <option value="aktif">aktif</option>
                            <option value="tidak aktif">tidak aktif</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">pendidikan terakhir</label>
                    <div class="col-lg-10">
                        <input type="text" name="pendidikan_terakhir" placeholder="pendidikan terakhir" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">pangkat</label>
                    <div class="col-lg-10">
                        <input type="text" name="pangkat" placeholder="pangkat" class="form-control">
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
                    <label class="col-lg-2 control-label">NIP</label>
                    <div class="col-lg-10">
                        <input type="hidden" name="hidid" id = "idedit" placeholder="id" class="form-control">
                        <input type="text" name="nip" id = "nip" placeholder="nip" class="form-control">
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
                    <label class="col-lg-2 control-label">status</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="status" id="status">
                            <option value="aktif">aktif</option>
                            <option value="tidak aktif">tidak aktif</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">pendidikan terakhir</label>
                    <div class="col-lg-10">
                        <input type="text" name="pendidikan_terakhir" placeholder="perguruan tinggi" id="pendidikan_terakhir" class="form-control">
                    </div>
                </div>              
                <div class="form-group">
                    <label class="col-lg-2 control-label">pangkat</label>
                    <div class="col-lg-10">
                        <input type="text" name="pangkat" placeholder="pangkat" id="pangkat" class="form-control">
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
            $('.edit').on('click', function() {
                let id = $(this).data('id');
                let idedit ;
                // console.log(id);
                $.ajax({
                    data: {id : id},
                    url : "{{route('admdosen.edit',"+data.id+")}}",
                    type: 'get',
                    dataType: 'json',
                    success: function(data)
                    {
                        $('#idedit').val(data.id);
                        $('#nip').val(data.nip);
                        $('#nama').val(data.nama);
                        // $('#jenkel').val(data.jenkel);
                        $('#status').val(data.status);
                        $('#pendidikan_terakhir').val(data.pendidikan_terakhir);
                        $('#pangkat').val(data.pangkat);
                        $('#foto2').val(data.foto);
                                                                      
                        if (data.jenkel == "Laki-Laki") {
                            document.getElementById("jkl").checked = true;
                        }else if(data.jenkel == "Perempuan"){
                            document.getElementById("jkp").checked = true;
                        }
                        
                        console.log(data);
                        let foto = document.getElementById('foto2').value;
                        document.getElementById("img").src="{{ asset('images') }}/"+foto;
                        
                        idedit = data.id;                      
                        console.log(idedit);
                        document.getElementById("editform").action="{{ url('admdosen') }}/"+idedit;
                        document.getElementById('idedit').value;
                    }
                });
            });
            
    });
    
</script>


@endsection
