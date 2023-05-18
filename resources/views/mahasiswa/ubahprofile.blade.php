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

<form name="frm_edit" id="editform" class="form-horizontal" action="{{ route('mhsubahprofile.update', $datauser->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-2 control-label">NIM</label>
                    <div class="col-lg-10">
                        <input type="hidden" name="hidid" id = "idedit" placeholder="id" class="form-control" value="{{$datauser->id}}">
                        <input type="text" name="nim" id = "nim" placeholder="nim" class="form-control" value="{{$datauser->nim}}">
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
                            <input type="radio" name="jenkel" id="jkp" value="Perempuan" <?php echo ($datauser->jenkel == "Perempuan") ? "checked" : "" ?>/>Perempuan
                        </label>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">perguruan tinggi</label>
                    <div class="col-lg-10">
                        <input type="text" name="perguruan_tinggi" placeholder="perguruan tinggi" id="perguruan_tinggi" class="form-control" value="{{$datauser->perguruan_tinggi}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">program studi</label>
                    <div class="col-lg-10">
                        <input type="text" name="program_studi" placeholder="program studi" id="program_studi" class="form-control" value="{{$datauser->program_studi}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">jenjang</label>
                    <div class="col-lg-10">
                        <input type="text" name="jenjang" placeholder="Jenjang" id="jenjang" class="form-control" value="{{$datauser->jenjang}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">status</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="status" id="status">
                            <option value="belum lulus" <?php echo $datauser->status == 'belum lulus' ? 'selected' : ''; ?> >belum lulus</option>
                            <option value="lulus" <?php echo $datauser->status == 'lulus' ? 'selected' : ''; ?> >lulus</option>
                        </select>
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
                <input type="hidden" name="id" id="id">
                <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>

@endsection
