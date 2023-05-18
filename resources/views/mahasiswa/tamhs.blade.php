@extends('mahasiswa.master')
@section('title', 'daftar tugas akhir  mahasiswa')
@section('onactivetuakmhs','active')
@section('ontamhs','active')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
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
                            <th>abstrak</th>
                            <th>dosen pembimbing</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr class="gradeU">
                            <td>{{ $loop->iteration}}</td>
                            <td>{{$item->mahasiswas->nim}}</td>
                            <td>{{$item->mahasiswas->nama}}</td>
                            <!-- <td>{{$item->judul}}</td>
                            <td>{{$item->abstrak}}</td> -->
                            <td>
                                <?php
                                    $judul_singkat = substr($item->judul, 0, 150) . '...';
                                    echo $judul_singkat;
                                ?>
                            </td>
                            <td>
                                <?php
                                    $abstrak_singkat = substr($item->abstrak, 0, 150) . '...';
                                    echo $abstrak_singkat;
                                ?>
                            </td>
                            <td>{{$item->dosens->nama}}</td>
                            <td>
                                <a href="{{ route('mhstamhs.show', $item->id) }}" class="btn btn-primary btn-sm"> Show </a> 
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                                </table>
                            </div>
                            
                        </div>
                    </div>

@endsection
