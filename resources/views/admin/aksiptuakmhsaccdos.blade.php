@extends('admin.master')
@section('title', 'konfirmasi pengajuan')
@section('onactivemhs','active')
@section('onptuakmhs','active')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="row">
    <div class="col-md-12">
    <h2>Halaman Konfirmasi Pengajuan Tugas Akhir Mahasiswa</h2>   
    <!-- <h5>Welcome Jhon Deo , Love to see you back. </h5> -->
    </div>
</div>
<hr>
<div class="panel panel-default">
                        <div class="panel-heading">
                            Konfirmasi Pengajuan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    @foreach($data as $item)
                                    <tr>
                                        <th>no</th>
                                        <td>{{$loop->iteration}}</td>
                                    </tr>
                                    <tr>
                                        <th>nim</th>
                                        <td>{{$item->mahasiswas->nim}}</td>
                                    </tr>
                                    <tr>
                                        <th>nama</th>   
                                        <td>{{$item->mahasiswas->nama}}</td>
                                    </tr>
                                    <tr>
                                        <th>judul</th>   
                                        <td>{{$item->judul}}</td>
                                    </tr>
                                    <tr>
                                        <th>deskripsi judul</th>   
                                        <td>{{$item->deskjudul}}</td>
                                    </tr>
                                    <tr>
                                        <th>dosen pilihan</th>
                                        <td>{{$item->dosens->nama}} 
                                            &nbsp;
                                            <?php
                                                $status = $item->konfdospil;
                                                if ($status == 1) {
                                                    echo "(diterima)";
                                                }elseif ($status == 0) {
                                                    echo "(ditolak)";
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>konfirmasi admin</th>
                                        <td>
                                        <form name="frm_edit" id="editform" class="form-horizontal" action="{{ route('admptuakmhs.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                            <div class="form-group">
                                                <div class="col-lg-2">
                                                    <input type="hidden" name="idptuakmhs"  value="{{$item->id}}">
                                                    <input type="hidden" name="dosens_id"  value="{{$item->dosens_id}}">
                                                    <input type="hidden" id="dosens_id" name="dosens_id" value="{{$item->dosens_id}}">
                                                    <input type="checkbox" id="konfadmin" name="konfadmin" value="1">
                                                    <label for="konfadmin">diterima</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                            <div class="modal-footer">
                                                <!-- <input type="hidden" name="id" id="id"> -->
                                                <!-- <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button> -->
                                                <a href="{{route('admin.ptuakmhs')}}" class="btn btn-danger">Kembali</a>
                                                <button id ="submit-btn" type="submit" class="btn btn-primary" onclick="checkbtn()">Simpan</button>
                                            </div>
                                        </form>
                                        </div>
                                        
                                    </div>
                                </div>

<script>
    let checkbox = document.getElementById("konfadmin");
    let btnsubmit = document.getElementById("submit-btn");
    
    function checkbtn() {
        if (!checkbox.checked) {
            alert("silahkan klik konfirmasi admin ");
            document.getElementById("submit-btn").disabled = true;
        }else{
            document.getElementById("submit-btn").disabled = false;
        }
    }

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            btnsubmit.removeAttribute('disabled');
        } else {
            btnsubmit.setAttribute('disabled', '');
        }
    });
</script>

@endsection

