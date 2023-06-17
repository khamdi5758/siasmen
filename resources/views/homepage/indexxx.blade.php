@extends('homepage.masterrr')
@section('title', 'Homepage')
@section('content')
@if($message = Session::get('success'))
<div class="alert alert-success">
	{{ $message }}
</div>
@endif

<!-- Masthead-->
<header class="masthead bg-primary text-white text-center" style="padding-top:130px;">
            <div class="container d-flex align-items-center flex-column" >
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar mb-4" src="/tmplthomee/assets/img/avataaars.svg" alt="..." />
                <!-- Masthead Heading-->
                <h1 class="mb-0">Selamat datang pada portal tugas akhir</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <!-- <p class="masthead-subheading font-weight-light mb-0">Graphic Artist - Web Designer - Illustrator</p> -->
            </div>
        </header>
        <section class="page-section portfolio" id="information">
            <div class="container">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">information</h2>
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <div class="row">
                    <center>
                    <hr/>
                    <div class="col-lg-4" style="width:fit-content;  height:fit-content;">
                        <h4 class="text-uppercase mb-4">pendaftaran ujian skripsi</h4>
                        <p class="lead mb-0">
                            Telah dibuka pendaftaran untuk ujian skripsi silahkan klik link dibawah ini untuk info selengkapnya.
                        </p>
                    </div>
                    <hr/>
                    </center>
            </div>
        </section>
        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <div class="row">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Lokasi</h4>
                        <p class="lead mb-0">
                            Pendidikan Informatika
                            <br />
                            Fakultas Ilmu Pendidikan
                            <br />
                            Universitas Trunojoyo Madura
                        </p>
                    </div>

                    <div class="col-lg-8">
                        <h4 class="text-uppercase mb-4">Tentang Prodi Pendidikan Informatika UTM </h4>
                        <p class="lead mb-0">
                            prodi pendidikan informatika merupakan program studi dibawah naungan Fakultas Ilmu Pendidikan universitas trunojoyo Madura yang dibentuk pada 2012 yang mana Program Studi Pendidikan Informatika berada di bawah Fakultas Ilmu Sosial dan Budaya (FISIB). Namun, sejak april 2014 hingga saat ini Program Studi Pendidikan Informatika berada di bawah Fakultas Ilmu Pendidikan (FIP).
                        </p>
                    </div>
                </div>
            </div>
        </section>
        @endsection