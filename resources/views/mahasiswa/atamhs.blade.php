@extends('mahasiswa.master')
@section('title', 'pengajuan tugas akhir')
@section('onactivetuakmhs','active')
@section('onatamhs','active')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Form Element Examples
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Basic Form Examples</h3>
                            <form role="form" action="{{ url('mahasiswa/rekomdos') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label>judul</label>
                                    <input class="form-control" name="judul" />
                                </div>
                                <div class="form-group">
                                    <label>deskripsi judul</label>
                                    <textarea class="form-control" name="abstrak" rows="3"></textarea>
                                </div>
                                    <!-- <a href="#tabel" class="btn btn-primary" data-toggle="collapse">Klik Disini</a> -->
                                    <!-- <button type="submit" class="btn btn-default">Submit Button</button> -->
                                    <button type="submit" class="btn btn-default" data-toggle="collapse" data-target="#tabel" >Submit Button</button>
                                    <button type="reset" class="btn btn-primary">Reset Button</button>
                            </form>
                            <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <br>

<!-- <div id="tabel">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>nip</th>
                                            <th>nama</th>
                                            <th>jenkel</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
        </div>
    </div>
</div>

    
</div> -->

@endsection
