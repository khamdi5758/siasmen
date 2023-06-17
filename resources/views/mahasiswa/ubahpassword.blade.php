@extends('mahasiswa.master')
@section('title', 'ganti password')
@section('onactivepengaturanakun','active')
@section('onubahpassword','active')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="row">
    <div class="col-md-12">
    <h2>Halaman Ubah Password</h2>   
    <!-- <h5>Welcome Jhon Deo , Love to see you back. </h5> -->
    </div>
</div>
<hr>

<!-- {{$datauser->id}} -->
<form name="frm_edit" id="editform" class="form-horizontal" action="{{ route('mhsubahpassword.update', $datauser->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">password baru </label>
                    <div class="col-lg-10">
                        <input type="password" name="password" id="password" placeholder="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="id">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>

@endsection
