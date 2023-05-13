<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>mahasiswa | @yield('title')</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('tmplt/css/bootstrap.css') }}" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="{{asset('tmplt/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="{{asset('tmplt')}}/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="{{asset('tmplt/css/custom.css')}}" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <!-- TABLE STYLES-->
   <!-- @yield('tablestyle') -->
   <link href="{{asset('tmplt/js/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet" />

   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 20%;
            float: left;
            margin-left: 2%;
            margin-bottom: 30px;
        }

        .cardimg{
            border-radius: 100%;
        }
        /* .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        } */

        .containercard {
            padding: 2px 16px;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Mahasiswa</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> 
@auth
<input type="hidden" id="username" value="{{auth()->user()->username}}">
{{auth()->user()->tampilnmuser(auth()->user()->username,auth()->user()->type)->nama}}
&nbsp;
<a href="/logout" class="btn btn-danger square-btn-adjust">Logout</a> 
@endauth
</div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="{{ asset('images') }}/{{auth()->user()->tampilnmuser(auth()->user()->username,auth()->user()->type)->foto}}"  class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a class="@yield('ondashboard')-menu" href="{{ url('mahasiswa') }}"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <!-- <li>
                        <a class="@yield('ontamhs')-menu" href="{{ url('mahasiswa/tamhs') }}"><i class="fa fa-desktop fa-3x"></i>Tugas Akhir Mahasiswa</a>
                    </li>
                    <li>
                        <a class="@yield('onatamhs')-menu" href="{{ url('mahasiswa/atamhs') }}"><i class="fa fa-desktop fa-3x"></i>Ajukan Tugas Akhir</a>
                    </li> -->
                    <li>
                        <a class="@yield('onpnltdos')-menu" href="{{ url('mahasiswa/mhspnltdos') }}"><i class="fa fa-3x"><img src="{{asset('tmplt/icon/icon_peneliti.png')}}" width="50px" height="50px"></i>penelitian dosen</a>
                    </li>
                    <li>
                        <a class="@yield('ondospem')-menu" href="{{ url('mahasiswa/dospem') }}"><i class="fa fa-3x"><img src="{{asset('tmplt/icon/icon_dosen.png')}}" width="50px" height="50px"></i>Dosen pembimbing</a>
                    </li>	
                    <li class="@yield('onactivetuakmhs')">
                        <a href="#"><i class="fa fa-3x"><img src="{{asset('tmplt/icon/icon_tuakmhs.png')}}" width="50px" height="50px"></i> Tugas Akhir MAHASISWA <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="@yield('ontamhs')-menu" href="{{ url('mahasiswa/tamhs') }}"><i class="fa fa-3x"></i>Daftar Tugas Akhir Mahasiswa</a>
                            </li>
                            <li>
                                <a class="@yield('onatamhs')-menu" href="{{ url('mahasiswa/atamhs') }}"><i class="fa fa-3x"></i>Ajukan Tugas Akhir</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class="@yield('onactivepengaturanakun')">
                        <a href="#"><i class="fa fa-3x"><img src="{{asset('tmplt/icon/icon_user.png')}}" width="50px" height="50px"></i> pengaturan akun <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="@yield('onubahprofile')-menu" href="{{ url('dosen/ubahprofile') }}">ubah profil</a>
                            </li>
                            <li>
                                <a class="@yield('onubahpassword')-menu" href="{{ url('dosen/ubahpassword') }}">ganti password</a>
                            </li>
                        </ul>
                    </li> -->
                    <li class="@yield('onactivepengaturanakun')">
                        <a href="#"><i class="fa  fa-3x"><img src="{{asset('tmplt/icon/icon_user.png')}}" width="50px" height="50px"></i>pengaturan akun <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="@yield('onubahprofile')-menu" href="{{ url('mahasiswa/ubahprofile') }}">ubah profil</a>
                            </li>
                            <li>
                                <a class="@yield('onubahpassword')-menu" href="{{ url('mahasiswa/ubahpassword') }}">ganti password</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li>
                        <a  href="table.html"><i class="fa fa-table fa-3x"></i> Table Examples</a>
                    </li> -->
                    <!-- <li>
                        <a  href="form.html"><i class="fa fa-edit fa-3x"></i> Forms </a>
                    </li>-->
					
					                   
                    <!-- <li class="@yield('onactivemhs')">
                        <a href="{{ url('admin/dftrmhs') }}"><i class="fa fa-sitemap fa-3x"></i> MAHASISWA <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="@yield('ondftrmhs')-menu" href="{{ url('admin/dftrmhs') }}">Daftar Mahasiswa</a>
                            </li>
                            <li>
                                <a class="@yield('ontamhs')-menu" href="{{ url('admin/tamhs') }}">Tugas Akhir Mahasiswa</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li class="@yield('onactivedos')">
                        <a href="{{ url('admin/dftrdos') }}"><i class="fa fa-sitemap fa-3x"></i> Dosen <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="@yield('ondftrdos')-menu" href="{{ url('admin/dftrdos') }}">Daftar Dosen</a>
                            </li>
                            <li>
                                <a class="@yield('onpnltdos')-menu" href="{{ url('admin/pnltdos') }}">Penelitian</a>
                            </li>
                        </ul>
                    </li>   -->
                    <!-- <li>
                        <a class="active-menu"  href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                    </li>	 -->
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                @yield('content')
               
            </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="{{asset('tmplt/js/jquery-1.10.2.js')}}"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{asset('tmplt/js/bootstrap.min.js')}}"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="{{asset('tmplt/js/jquery.metisMenu.js')}}"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="{{asset('tmplt')}}/js/morris/raphael-2.1.0.min.js"></script>
    <script src="{{asset('tmplt')}}/js/morris/morris.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <!-- @yield('Scriptdt') -->
    <script src="{{asset('tmplt/js/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('tmplt/js/dataTables/dataTables.bootstrap.js')}}"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
      <!-- CUSTOM SCRIPTS -->
    <script src="{{asset('tmplt/js/custom.js')}}"></script>
    <script>
        let user;
        user = document.getElementById("username").value;
        console.log(user);
    </script>
</body>
</html>
