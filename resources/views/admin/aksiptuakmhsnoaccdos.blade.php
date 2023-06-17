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
    <h2>Halaman Konfirmasi Tugas Akhir Mahasiswa</h2>   
    <!-- <h5>Welcome Jhon Deo , Love to see you back. </h5> -->
    </div>
</div>
<hr>
<div class="panel panel-default">
                        <div class="panel-heading">
                            Konfirmasi pengajuan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    @foreach($data as $item)
                                    <form name="frm_edit" id="editform" class="form-horizontal" action="{{ route('admptuakmhs.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
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
                                        <th>pilih dosen pembimbing</th>
                                        <td>
                                            <div class="form-group">
                                                <div class="col-lg-2">
                                                <select id="pildosadm" class="form-control" name="dosens_id">
                                                    @foreach($dosens as $dos)
                                                    <?php
                                                        $selected = '';
                                                        if ($item->dosens_id == $dos->id ) {
                                                        $selected = 'selected';
                                                        }
                                                    ?>
                                                    <option value="{{$dos->id}}" {{$selected}}>{{$dos->nama}}-{{$dos->nip}}</option> 
                                                    @endforeach
                                                </select> 
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>konfirmasi admin</th>
                                        <td>
                                            <div class="form-group">
                                                <div class="col-lg-2">
                                                    <input type="hidden" name="idptuakmhs"  value="{{$item->id}}">
                                                    <input type="hidden" id="dosenpil" name="dosenspil"  value="{{$item->dosens_id}}">
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
                                                <button type="submit" id="submit-btn" class="btn btn-primary" onclick="checkbtn()" disabled>Simpan</button>
                                            </div>
                                        </form>
                                        </div>
                                        
                                    </div>
                                </div>

<script>
    let prevdosen = document.getElementById("dosenpil").value; // mendapatkan value dosen sebelumnya dari controller
    let submitBtn = document.getElementById("submit-btn");
    let nextdosen = document.getElementById("pildosadm");
    let checkbox = document.getElementById("konfadmin");
    let btnsubmit = document.getElementById("submit-btn");
    
    function checkbtn() {
        if (nextdosen.value == prevdosen) {
            alert("Anda belum melakukan perubahan pada pilihan dosen");
            document.getElementById("submit-btn").disabled = true;
        } else {
            document.getElementById("submit-btn").disabled = false;
        }

        if (!checkbox.checked) {
            alert("silahkan klik konfirmasi admin ");
            document.getElementById("submit-btn").disabled = true;
        }else{
            document.getElementById("submit-btn").disabled = false;
        }
    }

    nextdosen.addEventListener("change", function() {
        if (this.value == prevdosen) {
            document.getElementById("submit-btn").disabled = true;
        }else{
            document.getElementById("submit-btn").disabled = false;
        }
    });

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            btnsubmit.removeAttribute('disabled');
        } else {
            btnsubmit.setAttribute('disabled', '');
        }
    });
</script>
@endsection
