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

<div class="row">
    <div class="col-md-12">
    <h2>Halaman Ubah Password Mahasiswa</h2>   
    <!-- <h5>Welcome Jhon Deo , Love to see you back. </h5> -->
    </div>
</div>
<hr>
<form name="frmubahpass" id="formubahpassdos" class="form-horizontal" action="{{ url('admin/ubahpassmhs') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">username anda</label>
                    <div class="col-lg-10">
                        <input type="text"id="username" placeholder="username" class="form-control" value={{$idnim}} disabled>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">password baru</label>
                    <div class="col-lg-10">
                        <input type="hidden" name="username" id="username" placeholder="username" class="form-control" value={{$idnim}} >
                        <input type="password" name="password" id="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" >
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button> -->
                <a href="{{ url('admin/dftrmhs/')}}" class="btn btn-warning">kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>

@endsection
