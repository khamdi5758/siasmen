@extends('mahasiswa.master')
@section('title', 'ubah profile')
@section('onactivepengaturanakun','active')
@section('onubahprofile','active')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="row">
    <div class="col-md-12">
    <h2>Halaman Ubah Profile</h2>   
    <!-- <h5>Welcome Jhon Deo , Love to see you back. </h5> -->
    </div>
</div>
<hr>

<form name="frm_edit" id="editform" class="form-horizontal" action="{{ route('mhsubahprofile.update', $datauser->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">NIM</label>
                    <div class="col-lg-10">
                        <input type="hidden" name="hidid" id = "idedit" placeholder="id" class="form-control" value="{{$datauser->id}}">
                        <input type="hidden" name="nim" id = "nim" placeholder="nim" class="form-control" value="{{$datauser->nim}}">

                        <input type="text" id = "nim" placeholder="nim" class="form-control" value="{{$datauser->nim}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">nama<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="nama" id="nama" placeholder="nama" class="form-control @error('nama') is-invalid @enderror" value="{{$datauser->nama}}">
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
                            <input type="radio" name="jenkel"  id="jkl" value="Laki-Laki" <?php echo ($datauser->jenkel == "Laki-Laki") ? "checked" : "" ?> class="@error('jenkel') is-invalid @enderror"/>Laki-Laki
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="jenkel" id="jkp" value="Perempuan" <?php echo ($datauser->jenkel == "Perempuan") ? "checked" : "" ?> class="@error('jenkel') is-invalid @enderror"/>Perempuan
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
                    <label class="col-lg-2 control-label">perguruan tinggi<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="perguruan_tinggi" placeholder="perguruan tinggi" id="perguruan_tinggi" class="form-control @error('perguruan_tinggi') is-invalid @enderror" value="{{$datauser->perguruan_tinggi}}">
                        @error('perguruan_tinggi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">program studi<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="program_studi" placeholder="program studi" id="program_studi" class="form-control @error('program_studi') is-invalid @enderror" value="{{$datauser->program_studi}}">
                        @error('program_studi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">jenjang<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="jenjang" placeholder="Jenjang" id="jenjang" class="form-control @error('jenjang') is-invalid @enderror" value="{{$datauser->jenjang}}" >
                        @error('jenjang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">status<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="belum lulus" <?php echo $datauser->status == 'belum lulus' ? 'selected' : ''; ?> >belum lulus</option>
                            <option value="lulus" <?php echo $datauser->status == 'lulus' ? 'selected' : ''; ?> >lulus</option>
                        </select>
                        @error('status')
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
                        <img width="100" src="/images/{{$datauser->foto}}" id="img" />
                        <input type="hidden" name="img" id="foto2" value="{{$datauser->foto}}">
                        @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
			    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="id">
                <!-- <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button> -->
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>

@endsection
