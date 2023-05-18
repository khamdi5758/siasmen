<!DOCTYPE html>
<html>
<head>
	<title>Membuat Menu Responsive Dengan CSS Dan JQuery | www.malasngoding.com</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('tmplthalawal/css/bootstrap.css')}}">	
	<script type="text/javascript" src="{{ asset('tmplthalawal/js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{ asset('tmplthalawal/js/bootstrap.js')}}"></script>
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
				<a class="navbar-brand" href="https://www.malasngoding.com">Malas Ngoding</a>
			</div>
			
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="#">Profil <span class="sr-only">(current)</span></a></li>
					<li><a href="#">Portofolio</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tutorial <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">HTML</a></li>
							<li><a href="#">CSS</a></li>
							<li><a href="#">Javascript</a></li>							
							<li><a href="#">JQuery</a></li>							
							<li><a href="#">CodeIgniter</a></li>
						</ul>
					</li>
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#" data-toggle="modal" data-target="#modal-login">Login</a></li>					
					<li><button type="button" class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#modal-daftar">Daftar</button></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>	
 
	<!-- Modal -->
	<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Modal Login</h4>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control">
						</div>						
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="button" class="btn btn-primary">Login</button>
				</div>
			</div>
		</div>
	</div>
 
	<div class="modal fade" id="modal-daftar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Modal Daftar</h4>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control">
						</div>						
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="button" class="btn btn-primary">Daftar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- akhir modal -->
 
	<!-- akhir menu navigasi -->
 
	<div class="container">			
		<!-- membuat jumbotron -->
		<div class="jumbotron">
			<center>			
				<h2>Selamat datang di www.malasngoding.com!</h2>
				<p>Tutorial pemrograman bahasa indonesia terlengkap di muka bumi..</p><br/><br/>
				<p><button class="btn btn-primary btn-lg" href="#" role="button" data-toggle="modal" data-target="#myModal">Mulai Belajar !</button></p>
			</center>
		</div>
		<!-- akhir jumbotron -->
		<div class="col-sm-6 col-md-3">
			<div class="thumbnail">
				<img src="gambar/jquery.png" alt="...">
				<div class="caption">
					<h3>Tutorial JQuery</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris</p>
					<p><a href="https://www.malasngoding.com/" class="btn btn-primary" role="button">Lihat</a></p>
				</div>
			</div>
		</div>
 
		<div class="col-sm-6 col-md-3">
			<div class="thumbnail">
				<img src="gambar/ionic.png" alt="...">
				<div class="caption">
					<h3>Tutorial Ionic</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris</p>
					<p><a href="https://www.malasngoding.com/" class="btn btn-primary" role="button">Lihat</a></p>
				</div>
			</div>
		</div>
 
		<div class="col-sm-6 col-md-3">
			<div class="thumbnail">
				<img src="gambar/codeigniter.png" alt="...">
				<div class="caption">
					<h3>Tutorial CodeIgniter</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris</p>
					<p><a href="https://www.malasngoding.com/" class="btn btn-primary" role="button">Lihat</a></p>
				</div>
			</div>
		</div>
 
		<div class="col-sm-6 col-md-3">
			<div class="thumbnail">
				<img src="gambar/bootstrap.png" alt="...">
				<div class="caption">
					<h3>Tutorial Bootstrap</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris</p>
					<p><a href="https://www.malasngoding.com/" class="btn btn-primary" role="button">Lihat</a></p>
				</div>
			</div>
		</div>
 
	</div>
	<br/>
	
	
	<div class="clearfix"></div>
		
	<nav class="navbar navbar-default" style="bottom: 0;margin: 0">
		<div class="container">	
			<center>
				
			<ul class="nav navbar-nav">
				<li><a href="#">Copyright @ 2015 Malas Ngoding. All rights reserved.</a></li>				
			</ul>
 
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Develop by www.malasngoding.com</a></li>									
			</ul>
			</center>		
		</div>
	</nav>
	


  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Modal title Here</h4>
                                        </div>
                                        <div class="modal-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
</body>
</html>