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
    <h2>Halaman Pengajuan Tugas Akhir Mahasiswa</h2>   
    <!-- <h5>Welcome Jhon Deo , Love to see you back. </h5> -->
    </div>
</div>
<hr>
<div class="panel panel-default">
                        <div class="panel-heading">
                             Belum dikonfirmasi admin
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>nim</th>
                                        <th>nama</th>
                                        <th>judul</th>
                                        <th>desk judul</th>
                                        <!-- <th></th> -->
                                        <!-- <th>dosen pembimbing</th> -->
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $item)
                                    <tr class="gradeU">
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{$item->mahasiswas->nim}}</td>
                                        <td>{{$item->mahasiswas->nama}}</td>
                                        <td>
                                            <?php
                                                $judul_singkat = substr($item->judul, 0, 150) . '...';
                                                echo $judul_singkat;
                                                // echo $item->judul;
                                            ?>

                                        </td>
                                        <td>
                                            <?php
                                                $abstrak_singkat = substr($item->deskjudul, 0, 150) . '...';
                                                echo $abstrak_singkat;
                                                // echo $item->deskjudul;
                                            ?>
                                        </td>
                                        <!-- <td>{{$item->abstrak}}</td> -->
                                        <!-- <td>{{$item->dosens->nama}}</td> -->
                                        <td>
                                                <!-- <a href="#" data-id="{{ $item->id }}" data-toggle="modal" data-target="#modal-edit" class="btn btn-warning btn-sm edittamhs"> Edit </a> -->
                                                &nbsp;
                                                <a href="{{ route('admptuakmhs.show', $item->id) }}" class="btn btn-primary btn-sm"> Show </a> 
                                                &nbsp;
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                </table>
                            </div>
                            
                        </div>
</div>
<div class="panel panel-default">
                        <div class="panel-heading">
                            Sudah dikonfirmasi admin
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>nim</th>
                                        <th>nama</th>
                                        <th>judul</th>
                                        <th>deskjudul</th>
                                        <th>dosen pembimbing</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($ptuakmhs as $item)
                                    <tr class="gradeU">
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{$item->mahasiswas->nim}}</td>
                                        <td>{{$item->mahasiswas->nama}}</td>
                                        
                                        <td>
                                            <?php
                                                $judul_singkat = substr($item->judul, 0, 150) . '...';
                                                echo $judul_singkat;
                                            ?>

                                        </td>
                                        <td>
                                            <?php
                                                $abstrak_singkat = substr($item->deskjudul, 0, 150) . '...';
                                                echo $abstrak_singkat;
                                            ?>
                                        </td>
                                        <td>{{$item->dosens->nama}}</td>
                                        <!-- <td>{{$item->abstrak}}</td> -->
                                        <!-- <td>{{$item->dosens->nama}}</td> -->
                                    </tr>
                                @endforeach
                                </tbody>
                                </table>
                            </div>
                            
                        </div>
</div>
@endsection
