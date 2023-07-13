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

@php
    $currentYear = date('Y');
    $startYear = 2000;
@endphp
<div class="row">
    <div class="col-md-12">
    <h2>Halaman Penelitian Dosen</h2>   
    <!-- <h5>Welcome Jhon Deo , Love to see you back. </h5> -->
    </div>
</div>
<hr>

<div class="ibox-tools">
        <button class="btn btn-primary btn-sm btn-flat add" data-toggle="modal" data-target="#modal-addpnltdos"><i class="fa fa-plus"></i>Tambah</button>
</div>
<br>
<div class="panel panel-default">
                        <div class="panel-heading">
                             Daftar Penelitian Dosen
                        </div>
                        <div class="panel-body">
                            <!-- <input type="search" class="searchform-control light-table-filter" data-table="table-hover" placeholder="Mencari..." /> -->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <!-- <table class="table table-striped table-bordered table-hover"> -->
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>nip</th>
                                        <th>nama</th>
                                        <th>judul</th>
                                        <th>abstrak</th>
                                        <th>tahun</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $item)
                                    <tr class="gradeU">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->dosens->nip}}</td>
                                        <td>{{$item->dosens->nama}}</td>
                                        <td>
                                            <?php
                                                $judul_singkat = substr($item->judul, 0, 150) . '...';
                                                // echo $judul_singkat;
                                                echo $item->judul;
                                            ?>

                                        </td>
                                        <td>
                                            <?php
                                                $abstrak_singkat = substr($item->abstrak, 0, 150) . '...';
                                                // echo $abstrak_singkat;
                                                echo $item->abstrak;
                                            ?>
                                        </td>
                                        <td>{{$item->tahun}}</td>

                                        <td>
                                        <form action="{{ route('admpnltdosen.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="#" data-id="{{ $item->id }}" data-toggle="modal" data-target="#modal-edit" class="btn btn-warning btn-sm edit"> Edit </a>
                                                &nbsp;
                                                <a href="{{ route('admpnltdosen.show', $item->id) }}" class="btn btn-primary btn-sm"> Show </a> 
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
<div class="modal inmodal fade" id="modal-addpnltdos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <form name="frm_add" id="frm_add" class="form-horizontal" action="{{ route('admpnltdosen.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Tambah Data Penelitian</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Nama<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <!-- <input type="text" name="nip" placeholder="nip" class="form-control"> -->
                        <select name="dosens_id" class="form-control @error('dosens_id') is-invalid @enderror">
                            <!-- <option>pilih</option> -->
                        @foreach($dosen as $dos)
                            <option value="{{$dos->id}}">{{$dos->nip}}-{{$dos->nama}}</option> 
                        @endforeach
                        </select> 
                        @error('dosens_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">judul<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <!-- <input type="text" name="judul" placeholder="judul" class="form-control"> -->
                        <textarea name="judul" rows="3" cols="56%" placeholder="judul" class="form-control @error('judul') is-invalid @enderror">{{old('judul')}}</textarea>
                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">abstrak<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <!-- <input type="text" name="abstrak" placeholder="abstrak" class="form-control"> -->
                        <textarea name="abstrak" rows="10" cols="56%" placeholder="abstrak" class="form-control @error('abstrak') is-invalid @enderror">{{old('abstrak')}}</textarea>
                        @error('abstrak')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">tahun<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <select name="tahun" class="form-control @error('tahun') is-invalid @enderror">
                            <!-- <option>------</option> -->
                        @for($year = $currentYear; $year >= $startYear; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                        </select>
                        @error('tahun')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <!-- <input type="text" name="tahun" placeholder="tahun" > -->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">link<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" placeholder="link">
                        @error('link')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <!-- <input type="text" name="tahun" placeholder="tahun" class="form-control"> -->
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
                <h4 class="modal-title">Edit Data Penelitian</h4>
            </div>
            <form name="frm_edit" id="editform" class="form-horizontal" action="#" method="POST" >
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">nama<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="hidden" name="hidid" id="idedit" class="form-control">
                        <input type="hidden" name="dosens_id" placeholder="dosensid" id="dosens_id" class="form-control">
                        <!-- <input type="text"  placeholder="nip" id="nip" class="form-control"> -->
                        <!-- <input type="text"  placeholder="nama" id="nama" class="form-control">     -->
                        <select id="dosens_idd" class="form-control @error('dosens_id') is-invalid @enderror" disabled>
                            <!-- <option>pilih</option> -->
                        @foreach($dosen as $dos)
                            <option value="{{$dos->id}}">{{$dos->nip}}-{{$dos->nama}}</option> 
                        @endforeach
                        </select> 
                        @error('dosens_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">judul<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <!-- <input type="text" name="judul" placeholder="judul" class="form-control"> -->
                        <textarea name="judul" rows="3" cols="56%" id="judul" placeholder="judul" class="form-control @error('judul') is-invalid @enderror"></textarea>
                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">abstrak<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <!-- <input type="text" name="abstrak" placeholder="abstrak" class="form-control"> -->
                        <textarea name="abstrak" rows="10" cols="56%" id="abstrak" placeholder="abstrak" class="form-control @error('abstrak') is-invalid @enderror"></textarea>
                        @error('abstrak')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">tahun<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <!-- <input type="text" name="tahun" id="tahun" placeholder="tahun" class="form-control"> -->
                        <select name="tahun" id="tahun" class="form-control @error('tahun') is-invalid @enderror">
                            <!-- <option>------</option> -->
                        @for($year = $currentYear; $year >= $startYear; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                        </select>
                        @error('tahun')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">link<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="link" id="link" class="form-control @error('link') is-invalid @enderror" placeholder="link">
                        @error('link')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <!-- <input type="text" name="tahun" placeholder="tahun" class="form-control"> -->
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
            // $('.edit').on('click', function() {
            $('#dataTables-example').on('click','.edit', function() {
                // $('#dataTables-example').dataTable();
                let id = $(this).data('id');
                console.log(id);
                $.ajax({
                    // data: {id : id},
                    data:{"_token":"{{ csrf_token() }}"},
                    // url : "{{route('admpnltdosen.edit',"+data.id+")}}",
                    url : `{{ url('admpnltdosen')}}/${id}/edit`,
                    type: 'get',
                    dataType: 'json',
                    success: function([data,datadosen])
                    {
                        console.log(data);
                        $('#idedit').val(data.id);
                        $('#dosens_id').val(data.dosens_id);
                        $('#dosens_idd').val(data.dosens_id);
                        $('#nama').val(datadosen.nama);
                        $('#judul').val(data.judul);
                        $('#abstrak').val(data.abstrak);
                        $('#tahun').val(data.tahun);
                        $('#table').dataTable();
                        $('#link').val(data.link);
                        let idedit = data.id; 
                        document.getElementById("editform").action="{{ url('admpnltdosen') }}/"+idedit;
                                               
                    }
                });
                
            });

           
            
    });
    
</script>





@endsection
