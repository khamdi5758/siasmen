@extends('admin.master')
@section('title', 'dashboard')
@section('ondashboard','active')
@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif
<div class="row">
    <div class="col-md-12">
    <h2>Admin Dashboard</h2>   
    <!-- <h5>Welcome Jhon Deo , Love to see you back. </h5> -->
    </div>
</div>              
                 <!-- /. ROW  -->
    <hr />
<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-4">           
			<div class="panel noti-box" style="background-color: #ed6900;">
                <span class="icon-box">
                        <img src="{{asset('tmplt/icon/icon_dosen.png')}}" width="80px" height="80px">
                </span>
                <p class="main-text">{{$dosen}} dosen</p>
                <div class="text-box" >
                </div>
            </div>
	</div>

    <div class="col-md-4 col-sm-4 col-xs-4">           
			<div class="panel noti-box" style="background-color: #ed6900;">
                <span class="icon-box set-icon">
                    <i class="fa">
                        <img src="{{asset('tmplt/icon/icon_mhs.png')}}" width="80px" height="80px">
                    </i>
                </span>
                <p class="main-text">{{$mahasiswa}} mahasiswa</p>
                <!-- <div class="text-box" > -->
                    <!-- <p class="text-muted">Remaining</p> -->
                <!-- </div> -->
            </div>
	</div>
    <div class="col-md-4 col-sm-4 col-xs-4">           
			<div class="panel noti-box" style="background-color: #ed6900;">
                <span class="icon-box set-icon">
                    <i class="fa">
                    <img src="{{asset('tmplt/icon/icon_peneliti.png')}}" width="80px" height="80px">
                    </i>
                </span>
                <div class="text-box" >
                    <p class="main-text">{{$pnltdos}} penelitian dosen</p>
                    <!-- <p class="text-muted">Notifications</p> -->
                </div>
            </div>
	</div>
    <div class="col-md-4 col-sm-4 col-xs-4">           
			<div class="panel noti-box" style="background-color: #ed6900;">
                <span class="icon-box set-icon">
                    <i class="fa">
                    <img src="{{asset('tmplt/icon/icon_tuakmhs.png')}}" width="80px" height="80px">
                    </i>
                </span>
                <div class="text-box" >
                    <p class="main-text">{{$tuam}} tugas akhir mahasiswa</p>
                    <!-- <p class="text-muted">Pending</p> -->
                </div>
            </div>
	</div>
    <div class="col-md-4 col-sm-4 col-xs-4">           
			<div class="panel noti-box" style="background-color: #ed6900;">
                <span class="icon-box set-icon">
                    <i class="fa">
                    <img src="{{asset('tmplt/icon/icon_tuakmhs.png')}}" width="80px" height="80px">
                    </i>
                </span>
                <div class="text-box" >
                    <p class="main-text">{{$ptuakmhs}} pengajuan tugas akhir</p>
                    <!-- <p class="text-muted">Pending</p> -->
                </div>
            </div>
	</div>
</div>
@endsection