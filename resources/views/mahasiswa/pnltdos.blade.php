@extends('mahasiswa.master')
@section('title', 'penelitian dosen')
@section('onactivedos','active')
@section('onpnltdos','active')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="row">
    <div class="col-md-12">
    <h2>Halaman Penelitian Dosen</h2>   
    <!-- <h5>Welcome Jhon Deo , Love to see you back. </h5> -->
    </div>
</div>
<hr>

<div class="panel panel-default">
                        <div class="panel-heading">
                             Daftar Penelitian Dosen
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>no</th>
                                            <th>nip</th>
                                            <th>nama</th>
                                            <th>judul</th>
                                            <th>abstrak</th>
                                            <th>tahun</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                    <tr class="gradeU">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->dosens->nip}}</td>
                                        <td>{{$item->dosens->nama}}</td>
                                        <td>
                                            <!-- {{$item->judul}} -->
                                            <?php
                                                $judul_singkat = substr($item->judul, 0, 150) . '...';
                                                echo $judul_singkat;
                                            ?>
                                        </td>
                                        <td>
                                            <!-- {{$item->abstrak}} -->
                                            <?php
                                                $abstrak_singkat = substr($item->abstrak, 0, 150) . '...';
                                                echo $abstrak_singkat;
                                            ?>
                                        </td>
                                        <td>{{$item->tahun}}</td>

                                        <td>
                                            <a href="{{ route('mhspnltdos.show', $item->id) }}" class="btn btn-primary btn-sm"> Show </a> 
                                            &nbsp;
                                        <!-- <form action="{{ route('admpnltdosen.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="#" data-id="{{ $item->id }}" data-toggle="modal" data-target="#modal-edit" class="btn btn-warning btn-sm edit"> Edit </a>
                                                &nbsp;
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Delete</button>
                                            </form> -->
                                        </td>
                                    </tr>
                                @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>

@endsection
