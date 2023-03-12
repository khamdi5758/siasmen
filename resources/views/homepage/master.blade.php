<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>homepage</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('tmplthome/css/bootstrap.css') }}" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="{{asset('tmplthome/css/font-awesome.css')}}" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="{{asset('tmplthome/css/custom.css')}}" rel="stylesheet" />
</head>
<body>

    <!-- membuat menu navigasi -->
	<nav class="navbar navbar-default">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">SIREDOSI</a>
			</div>
			
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="#">HOME <span class="sr-only">(current)</span></a></li>
					<li><a href="#">PANDUAN</a></li>
					<!-- <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tutorial <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">HTML</a></li>
							<li><a href="#">CSS</a></li>
							<li><a href="#">Javascript</a></li>							
							<li><a href="#">JQuery</a></li>							
							<li><a href="#">CodeIgniter</a></li>
						</ul>
					</li> -->
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" data-toggle="modal" data-target="#modallogin">Login</a></li>					
					<!-- <li><button type="button" class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#myModal">Daftar</button></li> -->
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
<div class="modal fade" id="modallogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">login</h4>
      </div>
      <div class="modal-body">
            <form>
				<div class="form-group">
					<label>username</label>
					<input type="text" class="form-control">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control">
				</div>						
		    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">login</button>
      </div>
    </div>
  </div>
</div>

    @yield('content')
    
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="{{asset('tmplthome/js/jquery-3.6.3.min.js')}}"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{asset('tmplthome/js/bootstrap.min.js')}}"></script>
   
</body>
</html>
