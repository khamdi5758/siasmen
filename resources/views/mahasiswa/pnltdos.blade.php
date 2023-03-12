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
                                        <td>{{$item->judul}}</td>
                                        <td>{{$item->abstrak}}</td>
                                        <td>{{$item->tahun}}</td>

                                        <td>
                                            <a href="{{ route('admpnltdosen.show', $item->id) }}" class="btn btn-primary btn-sm"> Show </a> 
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
