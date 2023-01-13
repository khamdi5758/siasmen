@extends('admin.master')
@section('title', 'daftar mahasiswa')
@section('onactivemhs','active')
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
                                            <th>id_tam</th>
                                            <th>nim</th>
                                            <th>judul</th>
                                            <th>abstrak</th>
                                            <th>dosen pembimbing</th>
                                            <th>action<th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->nim}}</td>
                                            <td>{{$item->judul}}</td>
                                            <td>{{$item->abstrak}}</td>
                                            <td>{{$item->dosen_pembimbing}}</td>
                                            <td>
                                            <form action="{{ route('admtuam.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('admtuam.edit', $item->id) }}"
                                                        class="btn btn-sm btn-outline-success">
                                                        Edit
                                                    </a> |
                                                    <a href="{{ route('admtuam.show', $item->id) }}"
                                                        class="btn btn-sm btn-outline-warning">
                                                        Show
                                                    </a> |
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Apakah Anda Yakin?')">Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>

@endsection
