@extends('dosen.master')
@section('title', 'daftar mahasiswa')
@section('onmhsbim','active')

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
                            <th>judul</th>
                            <th>abstrak</th>
                            <th>dosen pembimbing</th>
                            <!-- <th>action<th> -->
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr class="gradeU">
                            <td>{{ $loop->iteration}}</td>
                            <td>{{$item->nim}}</td>
                            <td>{{$item->judul}}</td>
                            <td>{{$item->abstrak}}</td>
                            <td>{{$item->dosen_pembimbing}}</td>
                            <!-- <td>
                            <form action="{{ route('admtuam.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="#" data-id="{{ $item->id }}" data-toggle="modal" data-target="#modal-edit" class="btn btn-warning btn-sm edittamhs"> Edit </a>
                                    &nbsp;
                                    <a href="{{ route('admtuam.show', $item->id) }}" class="btn btn-primary btn-sm"> Show </a> 
                                    &nbsp;
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Delete</button>
                                </form>
                            </td> -->
                        </tr>
                    @endforeach
                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>

@endsection
