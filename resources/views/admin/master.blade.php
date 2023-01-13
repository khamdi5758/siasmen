<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | @yield('title')</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('tmplt/css/bootstrap.css') }}" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="{{asset('tmplt/css/font-awesome.css')}}" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="{{asset('tmplt/css/custom.css')}}" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <!-- TABLE STYLES-->
   <!-- @yield('tablestyle') -->
   <link href="{{asset('tmplt/js/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet" />
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
                <a class="navbar-brand" href="index.html">Admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="{{asset('tmplt/img/find_user.png')}}" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a class="@yield('ondashboard')-menu" href="{{ url('admin') }}"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <!-- <li>
                        <a  href="ui.html"><i class="fa fa-desktop fa-3x"></i> UI Elements</a>
                    </li> -->
                    <!-- <li>
                        <a  href="tab-panel.html"><i class="fa fa-qrcode fa-3x"></i> Tabs & Panels</a>
                    </li> -->
					<!-- <li>
                        <a  href="chart.html"><i class="fa fa-bar-chart-o fa-3x"></i> Morris Charts</a>
                    </li>	 -->
                    <!-- <li>
                        <a  href="table.html"><i class="fa fa-table fa-3x"></i> Table Examples</a>
                    </li> -->
                    <!-- <li>
                        <a  href="form.html"><i class="fa fa-edit fa-3x"></i> Forms </a>
                    </li>-->
					
					                   
                    <li class="@yield('onactivemhs')">
                        <a href="{{ url('admin/dftrmhs') }}"><i class="fa fa-sitemap fa-3x"></i> MAHASISWA <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="@yield('ondftrmhs')-menu" href="{{ url('admin/dftrmhs') }}">Daftar Mahasiswa</a>
                            </li>
                            <li>
                                <a class="@yield('ontamhs')-menu" href="{{ url('admin/tamhs') }}">Tugas Akhir Mahasiswa</a>
                            </li>
                        </ul>
                    </li>
                    <li class="@yield('onactivedos')">
                        <a href="{{ url('admin/dftrdos') }}"><i class="fa fa-sitemap fa-3x"></i> Dosen <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="@yield('ondftrdos')-menu" href="{{ url('admin/dftrdos') }}">Daftar Dosen</a>
                            </li>
                            <li>
                                <a class="@yield('onpnltdos')-menu" href="{{ url('admin/pnltdos') }}">Penelitian</a>
                            </li>
                        </ul>
                    </li>  
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
</body>
</html>
