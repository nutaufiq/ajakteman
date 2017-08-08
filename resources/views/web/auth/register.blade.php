@extends('web.layouts.layout-01')

@section('title', 'Register')

@section('meta')
  <meta name="description" content="OLX adalah situs iklan baris online terbesar di Indonesia. Ada jutaan calon pembeli yang menginginkan barang bekas milikmu. Ngiklan di OLX, lakunya cepat!">
  <meta name="keywords" content="olx, ajak, teman">
  <meta name="author" content="ajakteman.olx.co.id">

  <!-- facebook -->
  <meta property="og:url"           content="{{ url()->full() }}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Register - {{ config('app.name', 'OLX Ajak Teman') }}" />
  <meta property="og:description"   content="OLX adalah situs iklan baris online terbesar di Indonesia. Ada jutaan calon pembeli yang menginginkan barang bekas milikmu. Ngiklan di OLX, lakunya cepat!" />
  <meta property="og:image"         content="{{ asset('images/ajakteman.jpg') }}" />

  <!-- twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="{{ url()->full() }}">
  <meta name="twitter:title" content="Register - {{ config('app.name', 'OLX Ajak Teman') }}">
  <meta name="twitter:description" content="OLX adalah situs iklan baris online terbesar di Indonesia. Ada jutaan calon pembeli yang menginginkan barang bekas milikmu. Ngiklan di OLX, lakunya cepat!">
  <meta name="twitter:image" content="{{ asset('images/ajakteman.jpg') }}">
@endsection

@section('content')
<div class="login-wrapper register-terujuk">
  <div class="banner">
  <div class="logo-login">
    <a href="{{ url('/') }}">
      <img src="{{ asset('images/logo.png') }}">
    </a>
  </div>
    <div class="col-sm-6 howto-terujuk">
      <h3>Pasang iklan pertamamu di OLX dan dapatkan Saldo OLX</h3>
            <div class="row">
              <div class=" col-sm-offset-2 col-sm-4"><img src="images/about-olx.png" class="img-responsive"></div>
              <div class="col-sm-6 info-notes">
              <div class="title">Tentang OLX</div>
              <p>OLX adalah situs iklan baris online terbesar di Indonesia. Ada jutaan calon pembeli yang menginginkan barang bekas milikmu. Ngiklan di OLX, lakunya cepat!</p>
              <p>Saldo OLX dapat digunakan untuk membuat iklan Anda dilihat lebih banyak calon pembeli dan laku lebih cepat. </p>
              </div>
            </div>
    </div>
    <div class="col-sm-6 person-terujuk">
      <center><img src="{{ asset('images/person-terujuk.png') }}" class="img-responsive img-person-terujuk"></center>
    </div>
    
  </div>

  <div class="container container-terujuk">
    <p>Dengan ikut program Ajak Teman, pasang iklan di OLX sekarang dan dapatkan Saldo OLX gratis.</p>
    <form class="form-ajax" method="POST" action="{{ url('register') }}" redirect="modal">
      {{ csrf_field() }}
      <input type="hidden" name="referrer_olx_id" value="{{ old('referrer_olx_id', app('request')->input('ref')) }}">
      <input type="hidden" name="trackid" value="{{ old('trackid', app('request')->input('trackid')) }}">
      <div class="col-sm-12 input-email">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <p class="help-block text-danger form-message" id="email"></p>
      </div>
      <div class="col-sm-6">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <p class="help-block text-danger form-message" id="password"></p>
      </div>
      <div class="col-sm-6">
        <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
      </div>
      <div class="col-sm-12 btn-area">
        <button type="submit" class="btn btn-block btn-log" id="button-submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> TUNGGU">DAFTAR SEKARANG</button>
        <p class="help-block form-message" id="message"></p>
      </div>
    </form>
    <div class="forgot-pass">
      <a href="https://ssl.olx.co.id/masuk/password/" target="_blank">Lupa Password</a>
    </div>
    <div class="login-tnc">Dengan login, berarti anda menyetujui <a href="http://help.olx.co.id/hc/id/categories/200862056-Syarat-Ketentuan" target="_blank">syarat dan ketentuan</a></div> 
  </div>
</div>
@endsection

@section('modal')
<!-- Modal -->
<div class="modal fade" id="modalNotif-register-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <div class="notif-hello">Pendaftaran Berhasil!</div>
          <div class="notif-message">Silahkan cek email untuk melakukan validasi email.</div>
          <div class="btn-area"><a href="{{ url('login') }}">LOGIN</a></div>
      </div>
    </div>
  </div>
</div>
@endsection