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
    <button class="btn btn-primary btn-sm btn-flat tambahdata" data-toggle="modal" data-target="#formmodaldftrdos"><i class="fa fa-plus"></i>Tambah</button>
</div>
<br><br>
<div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Dosen Pembimbing
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
                                                <div class="ibox-tools">
                                                    <a data-id="{{ $item->id }}" class="btn btn-warning edit" data-toggle="modal" data-target="#formmodaldftrdos" style="color: white;"><i class="bi bi-pencil-square"></i>edit</a>
                                                </div>
                                                <div class="ibox-tools">
                                                    <a href="{{ url('admin/halubahpassdos/'. $item->id)}}" class="btn btn-primary ubahpsswddos" style="color: white;"><i class="bi bi-pencil-square"></i>ubah password</a>
                                                </div>

                                                <div class="ibox-tools">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admdosen.destroy', $item->id) }}" method="post">
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
<div class="modal inmodal fade" id="formmodaldftrdos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <form name="frm" id="frmdftrdos" class="form-horizontal" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Form Data Dosen</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">NIP</label>
                    <div class="col-lg-10">
                        <input type="hidden" name="hidid" id = "idedit" placeholder="id" class="form-control">
                        <input type="hidden" name="_method" id = "method">
                        <input type="text" name="nip" id = "nip" placeholder="nip" class="form-control @error('nip') is-invalid @enderror" value="{{old('nip')}}">
                        @error('nip')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">nama</label>
                    <div class="col-lg-10">
                        <input type="text" name="nama" placeholder="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama')}}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">jenkel</label>
                    <div class="col-lg-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="jenkel" id="jkl" value="Laki-Laki" class=" @error('jenkel') is-invalid @enderror" {{ old('jenkel') == 'Laki-Laki' ? 'checked' : '' }}  />Laki-Laki
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="jenkel" id="jkp" value="Perempuan" class=" @error('jenkel') is-invalid @enderror" {{ old('jenkel') == "Perempuan" ? 'checked' : '' }} />Perempuan
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
                    <label class="col-lg-2 control-label">status</label>
                    <div class="col-lg-10">
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>aktif</option>
                            <option value="tidak aktif" {{ old('status') == 'tidak aktif' ? 'selected' : '' }}>tidak aktif</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">pendidikan terakhir</label>
                    <div class="col-lg-10">
                        <input type="text" name="pendidikan_terakhir" placeholder="pendidikan terakhir" id="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" value="{{old('pendidikan_terakhir')}}">
                        @error('pendidikan_terakhir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">pangkat</label>
                    <div class="col-lg-10">
                        <input type="text" name="pangkat" placeholder="pangkat" id="pangkat" class="form-control @error('pangkat') is-invalid @enderror" value="{{old('pangkat')}}">
                        @error('pangkat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">foto</label>
                    <div class="col-lg-10">
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" />
                        <div id="imageContainer">
                            <img width="100" src="#" id="img" />
                        </div>
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
            </div>
        </form>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(function() {
        let form = $('#frmdftrdos');
        let hasErrors = {{ count($errors) > 0 ? 'true' : 'false' }};
        let formidd;
        
        

            $('.tambahdata').on('click', function() {
                $('.modal-title').html('tambah data dosen');
                $('.modal-footer button[type=submit]').html('tambah data');
                $('.modal-footer button[type=submit]').attr('id','btntambahdata');
                $('#idedit').val('');
                $('#nip').val('');
                $('#nipp').val('');
                $('#nama').val('');
                // $('#jenkel').val(data.jenkel);
                // $('#jkl').val('');
                // $('#jkp').val('');
                $('#status').val('');
                $('#pendidikan_terakhir').val('');
                $('#pangkat').val('');
                $('#method').val('POST');
                $('#foto').val('');
                $('#frmdftrdos').attr("action", "{{ route('admdosen.store') }}");
                $('#img').hide();
                $('form').attr('id', 'tmbhdatdos');
                // document.getElementById("img").src="#";
            });

            // edit ajax request
            $('#dataTables-example').on('click','.edit', function() {
            // $('.edit').on('click', function() {
                let id = $(this).data('id');
                $('.modal-title').html('ubah data dosen');
                $('.modal-footer button[type=submit]').html('ubah data');
                // $('#frmdftrdos').attr("action", "{{ route('admdosen.store') }}");
                $('#frmdftrdos').attr("action", "{{ url('admdosen')}}/"+id);
                $('#method').val('PUT');
                
                // let idedit ;
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
                        $('#nipp').val(data.nip);
                        $('#nama').val(data.nama);
                        // $('#jenkel').val(data.jenkel);
                        $('#status').val(data.status);
                        $('#pendidikan_terakhir').val(data.pendidikan_terakhir);
                        $('#pangkat').val(data.pangkat);
                        $('#foto2').val(data.foto);
                        $('#img').show();
                                                                      
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
                        
                        
                        // document.getElementById("frmdftrdos").action="{{ url('admdosen') }}/"+idedit;
                        document.getElementById('idedit').value;
                    }
                });
            });

            // $('#dataTables-example').on('click','.ubahpsswddos', function() {
            // // $('.edit').on('click', function() {
            //     let idnip = $(this).data('id');
            //     // let idedit ;
            //     $('#idnip').val(idnip);
            //     console.log(idnip);
                
            // });

            // $("form").submit(function (e) {
            //     // e.preventDefault();
            //     let formId = this.id;
            //     // if (hasErrors) {
            //         //         $('#formmodaldftrdos').modal('show');
                    
            //         // }
            //     console.log(e);
            // });
            
        
            
    });
    
</script>




@endsection
