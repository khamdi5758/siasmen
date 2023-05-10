@extends('mahasiswa.master')
@section('title', 'daftar mahasiswa')
@section('onactivepengaturanakun','active')
@section('onubahpassword','active')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif
<!-- {{$datauser->id}} -->
<form name="frm_edit" id="editform" class="form-horizontal" action="{{ route('dosubahpassword.update', $datauser->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">password</label>
                    <div class="col-lg-10">
                        <input type="password" name="password" id="password" placeholder="password" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="id">
                <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>

@endsection
