@extends('dosen.master')
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

<form name="frm_edit" id="editform" class="form-horizontal" action="{{ route('dosubahprofile.update', $datauser->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">NIP</label>
                    <div class="col-lg-10">
                        <input type="hidden" name="hidid" id = "idedit" placeholder="id" class="form-control" value="{{$datauser->id}}">
                        <input type="hidden" name="nip" id = "nip" placeholder="nip" class="form-control" value="{{$datauser->nip}}">
                        <input type="text" id = "nip" placeholder="nip" class="form-control" value="{{$datauser->nip}}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">nama<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <input type="text" name="nama" id="nama" placeholder="nama" class="form-control" value="{{$datauser->nama}}" class="form-control @error('nama') is-invalid @enderror">
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
                            <input type="radio" name="jenkel"  id="jkl" value="Laki-Laki" <?php echo ($datauser->jenkel == "Laki-Laki") ? "checked" : "" ?> class=" @error('jenkel') is-invalid @enderror"/>Laki-Laki
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="jenkel" id="jkp" value="Perempuan" <?php echo ($datauser->jenkel == "Perempuan") ? "checked" : "" ?> class=" @error('jenkel') is-invalid @enderror"/>Perempuan
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
                            <option value="aktif" <?php echo $datauser->status == 'aktif' ? 'selected' : ''; ?> >aktif</option>
                            <option value="tidak aktif" <?php echo $datauser->status == 'tidak aktif' ? 'selected' : ''; ?> >tidak aktif</option>
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
                        <input type="text" name="pendidikan_terakhir" placeholder="perguruan tinggi" id="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" value="{{$datauser->pendidikan_terakhir}}">
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
                        <input type="text" name="pangkat" placeholder="pangkat" id="pangkat" class="form-control @error('pangkat') is-invalid @enderror" value="{{$datauser->pangkat}}">
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
                <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
</form>

@endsection
