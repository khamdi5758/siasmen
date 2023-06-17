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
    <h2>Halaman Ajukan Tugas Akhir</h2>   
    <!-- <h5>Welcome Jhon Deo , Love to see you back. </h5> -->
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Ajukan Tugas Akhir
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Ajukan Penelitian Anda</h3>
                            <form role="form" action="{{ url('mahasiswa/rekomdos') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label>judul</label>
                                    <input class="form-control @error('judul') is-invalid @enderror" name="judul"  value="{{old('judul')}}"/>
                                    @error('judul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>deskripsi judul</label>
                                    <textarea class="form-control @error('abstrak') is-invalid @enderror" name="abstrak" rows="3">{{old('abstrak')}}</textarea>
                                    @error('abstrak')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                    <!-- <a href="#tabel" class="btn btn-primary" data-toggle="collapse">Klik Disini</a> -->
                                    <!-- <button type="submit" class="btn btn-default">Submit Button</button> -->
                                    <button type="reset" class="btn btn-default">Reset</button>
                                    <button type="submit" class="btn btn-primary" data-toggle="collapse" data-target="#tabel" >Ajukan</button>
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
