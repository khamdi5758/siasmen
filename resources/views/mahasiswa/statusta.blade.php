@extends('mahasiswa.master')
@section('title', 'status pengajuan tugas akhir')
@section('onatamhs','active')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

    <br>

<div id="tabel">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
                        <div class="panel-heading">
                             Status Pengajuan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    @foreach($data as $item)
                                        <!-- <tr>
                                            <th>no</th><td>{{$loop->iteration}}</td>
                                        </tr> -->
                                        <tr>
                                            <th>nim mahasiswa</th> <td>{{$item->mahasiswas->nim}}</td>
                                        </tr>
                                        <tr>
                                            <th>nama mahasiswa</th> <td>{{$item->mahasiswas->nama}}</td>
                                        </tr>
                                        <tr>
                                            <th>judul</th><td>{{$item['judul']}}</td>
                                        </tr>
                                        <tr>
                                            <th>desk judul</th><td>{{$item['deskjudul']}}</td>
                                        </tr>
                                        <tr>
                                            <th>dosen pembimbing</th><td>{{$item->dosens->nama}}</td>
                                        </tr>
                                        <tr>
                                            <th>status</th>
                                            <td>
                                                <?php
                                                    $konfdos = $item['konfdospil'];
                                                    $konfadmin = $item['konfadmin'];
                                                    // echo $konfdos . $konfadmin;
                                                    // if ($konfdos === 0) {
                                                    //     echo "ditolak";
                                                    // }else if ($konfdos === null) {
                                                    //     echo "belum divalidasi dosen";
                                                    // }

                                                    if ($konfdos === null and $konfadmin === null){
                                                        echo "pending (proses validasi dosen)";
                                                    } else if ($konfdos !== null and $konfadmin === null) {
                                                        echo "pending (proses validasi admin)";
                                                    } else if ($konfdos === null and $konfadmin !== null) {
                                                        echo "pending";
                                                    }else {
                                                        echo "diterima";
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            
                        </div>
        </div>
    </div>
</div>

    
</div>

@endsection
