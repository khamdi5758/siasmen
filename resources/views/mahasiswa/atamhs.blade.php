@extends('mahasiswa.master')
@section('title', 'daftar mahasiswa')
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
                            <form role="form">
                                <div class="form-group">
                                    <label>Text Input</label>
                                    <input class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Text area</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                                    <a href="#tabel" class="btn btn-primary" data-toggle="collapse">Klik Disini</a>
                                    <button type="submit" class="btn btn-default" data-toggle="collapse" data-target="#tabel" >Submit Button</button>
                                    <button type="reset" class="btn btn-primary">Reset Button</button>
                            </form>
                            <br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <br>

<div id="tabel" class="collapse">
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
                                            <th>Rendering engine</th>
                                            <th>Browser</th>
                                            <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>CSS grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="gradeX">
                                            <td>Misc</td>
                                            <td>Links</td>
                                            <td>Text only</td>
                                            <td class="center">-</td>
                                            <td class="center">X</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
        </div>
    </div>
</div>

    
</div>

@endsection
