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
    <h2>Halaman Daftar Dosen</h2>   
    <!-- <h5>Welcome Jhon Deo , Love to see you back. </h5> -->
    </div>
</div>
<hr>

<div class="ibox-tools">
    <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-adddftrdos"><i class="fa fa-plus"></i>Tambah</button>
</div>
<br><br>
<div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Dosen Pembimbing
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="overflow-x: auto;">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>nip</th>
                                            <th>nama</th>
                                            <th>jenkel</th>
                                            <th>status</th>
                                            <th>pendidikan terakhir</th>
                                            <th>pangkat</th>
                                            <th>keahlian</th>
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
                                            <td>{{$item->keahlian}}</td>
                                            <td><img src="/images/{{ $item->foto }}" width="75" alt="$item->foto"></td>
                                            <td>
                                                <div class="ibox-tools">
                                                    <a data-id="{{ $item->id }}" class="btn btn-warning edit" data-toggle="modal" data-target="#modal-editdftrdos" style="color: white;"><i class="bi bi-pencil-square"></i>edit</a>
                                                </div>
                                                <div class="ibox-tools">
                                                    <a href="{{ url('admin/halubahpassdos/'. $item->id)}}" class="btn btn-primary ubahpsswddos" style="color: white;"><i class="bi bi-pencil-square"></i>ubah password</a>
                                                </div>
                                                <!-- <div class="ibox-tools">
                                                    <a href="{{ url('admin/halshowprofdos/'. $item->id)}}" class="btn btn-primary ubahpsswddos" style="color: white;"><i class="bi bi-pencil-square"></i>show profile</a>
                                                </div> -->

                                                <div class="ibox-tools">
                                                <form onsubmit="return confirm('Jika dihapus maka data yang berkaitan akan ikut terhapus. Apakah Anda Yakin ?');" action="{{ route('admdosen.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')


                                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
</div>



<!-- modal add data-->
<div class="modal inmodal fade" id="modal-adddftrdos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <form name="frm_add" id="frm_add" class="form-horizontal" action="{{ route('admdosen.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Tambah Data Dosen</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">NIP<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="nip" placeholder="nip" class="form-control @error('nip') is-invalid @enderror" value="{{old('nip')}}">
                        @error('nip')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">nama<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="nama" placeholder="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">jenkel<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="jenkel" id="jenkel" value="Laki-Laki" class=" @error('jenkel') is-invalid @enderror" {{ old('jenkel') == 'Laki-Laki' ? 'checked' : '' }}  />Laki-Laki
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="jenkel" id="jenkel" value="Perempuan" class=" @error('jenkel') is-invalid @enderror" {{ old('jenkel') == "Perempuan" ? 'checked' : '' }} />Perempuan
                        </label>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">status<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <select class="form-control @error('status') is-invalid @enderror" name="status">
                            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>aktif</option>
                            <option value="tidak aktif" {{ old('status') == 'tidak aktif' ? 'selected' : '' }}>tidak aktif</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">pendidikan terakhir<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="pendidikan_terakhir" placeholder="pendidikan terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" value="{{old('pendidikan_terakhir')}}">
                        @error('pendidikan_terakhir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">pangkat<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="pangkat" placeholder="pangkat" class="form-control @error('pangkat') is-invalid @enderror" value="{{old('pangkat')}}">
                        @error('pangkat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">keahlian<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="keahlian" placeholder="keahlian" class="form-control @error('keahlian') is-invalid @enderror" value="{{old('keahlian')}}">
                        @error('keahlian')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">foto<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" />
                        @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
<div class="modal fade" id="modal-editdftrdos" tabindex="-1" aria-labelledby="titleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Edit Data Dosen</h4>
            </div>
            <form name="frm_edit" id="editform" class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">NIP</label>
                    <div class="col-lg-10">
                        <input type="hidden" name="hidid" id = "idedit" placeholder="id" class="form-control">
                        <input type="hidden" name="nip" id = "nip" placeholder="nip" class="form-control" >
                        <input type="text" placeholder="nip" id="nipp" class="form-control" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">nama<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="nama" id="nama" placeholder="nama" class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">jenkel<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                    <div class="radio">

                        <label>
                            <input type="radio" name="jenkel"  id="jkl" value="Laki-Laki" class="@error('jenkel') is-invalid @enderror" />Laki-Laki
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="jenkel" id="jkp" value="Perempuan"class="@error('jenkel') is-invalid @enderror" />Perempuan
                        </label>
                    </div>
                        @error('jenkel')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">status<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                            <option value="aktif">aktif</option>
                            <option value="tidak aktif">tidak aktif</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">pendidikan terakhir<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="pendidikan_terakhir" placeholder="perguruan tinggi" id="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror">
                        @error('pendidikan_terakhir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>              
                <div class="form-group">
                    <label class="col-lg-2 control-label">pangkat<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="pangkat" placeholder="pangkat" id="pangkat" class="form-control @error('pangkat') is-invalid @enderror">
                        @error('pangkat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>              
                <div class="form-group">
                    <label class="col-lg-2 control-label">keahlian<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="keahlian" placeholder="keahlian" id="keahlian" class="form-control @error('keahlian') is-invalid @enderror">
                        @error('keahlian')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>              
                <div class="form-group">
                    <label class="col-lg-2 control-label">foto</label>
                    <div class="col-lg-10">
                        <input type="file" name="foto" id=foto class="form-control @error('foto') is-invalid @enderror"/>
                        <img width="100" src="#" id="img" />
                        <input type="hidden" name="img" id="foto2">
                        @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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


<div class="modal fade" id="modal-ubahpasswddos" tabindex="-1" aria-labelledby="titleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Ubah Password</h4>
            </div>
            <form name="frmubahpass" id="formubahpassdos" class="form-horizontal {{ $errors->has('ubahpassdos') ? 'has-error' : '' }}" action="{{ route('admin.ubahpassdos') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <!-- <label class="col-lg-2 control-label">NIP</label> -->
                    <div class="col-lg-10">
                        <input type="hidden" name="hidid" id = "idnip" placeholder="id" class="form-control">
                        <!-- <input type="hidden" name="nip" id = "nip" placeholder="nip" class="form-control" > -->
                        <!-- <input type="text" placeholder="nip" id="nipp" class="form-control" disabled> -->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">password baru</label>
                    <div class="col-lg-10">
                        <input type="text" name="password" id="password" placeholder="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
            $('#dataTables-example').on('click','.edit', function() {
            // $('.edit').on('click', function() {
                let id = $(this).data('id');
                let idedit ;
                console.log(id);
                $.ajax({
                    data: {id : id},
                    url : "{{route('admdosen.edit',"+data.id+")}}",
                    type: 'get',
                    dataType: 'json',
                    success: function(data)
                    {
                        $('#idedit').val(data.id);
                        $('#nip').val(data.nip);
                        $('#nipp').val(data.nip);
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

            $('#dataTables-example').on('click','.ubahpsswddos', function() {
            // $('.edit').on('click', function() {
                let idnip = $(this).data('id');
                // let idedit ;
                $('#idnip').val(idnip);
                console.log(idnip);
                
            });
            
    });
    
</script>


@endsection
