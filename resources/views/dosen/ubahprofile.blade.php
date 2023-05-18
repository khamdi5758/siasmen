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

<form name="frm_edit" id="editform" class="form-horizontal" action="{{ route('dosubahprofile.update', $datauser->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">NIP</label>
                    <div class="col-lg-10">
                        <input type="hidden" name="hidid" id = "idedit" placeholder="id" class="form-control" value="{{$datauser->id}}">
                        <input type="text" name="nip" id = "nip" placeholder="nip" class="form-control" value="{{$datauser->nip}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">nama</label>
                    <div class="col-lg-10">
                        <input type="text" name="nama" id="nama" placeholder="nama" class="form-control" value="{{$datauser->nama}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">jenkel</label>
                    <div class="col-lg-10">
                    <div class="radio">

                        <label>
                            <input type="radio" name="jenkel"  id="jkl" value="Laki-Laki" <?php echo ($datauser->jenkel == "Laki-Laki") ? "checked" : "" ?> />Laki-Laki
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="jenkel" id="jkp" value="Perempuan" <?php echo ($datauser->jenkel == "Perempuan") ? "checked" : "" ?> />Perempuan
                        </label>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">status</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="status" id="status">
                            <option value="aktif" <?php echo $datauser->status == 'aktif' ? 'selected' : ''; ?> >aktif</option>
                            <option value="tidak aktif" <?php echo $datauser->status == 'tidak aktif' ? 'selected' : ''; ?> >tidak aktif</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">pendidikan terakhir</label>
                    <div class="col-lg-10">
                        <input type="text" name="pendidikan_terakhir" placeholder="perguruan tinggi" id="pendidikan_terakhir" class="form-control" value="{{$datauser->pendidikan_terakhir}}">
                    </div>
                </div>              
                <div class="form-group">
                    <label class="col-lg-2 control-label">pangkat</label>
                    <div class="col-lg-10">
                        <input type="text" name="pangkat" placeholder="pangkat" id="pangkat" class="form-control" value="{{$datauser->pangkat}}">
                    </div>
                </div>              
                <div class="form-group">
                    <label class="col-lg-2 control-label">foto</label>
                    <div class="col-lg-10">
                        <input type="file" name="foto" id=foto/>
                        <img width="100" src="{{ asset('images') }}/{{$datauser->foto}}" id="img" />
                        <input type="hidden" name="img" id="foto2" value="{{$datauser->foto}}">
                    </div>
			    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
</form>

@endsection
