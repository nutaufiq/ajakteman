@extends('web.layouts.layout-02')

@section('title', 'Login')

@section('meta')
  <meta name="description" content="Ajak 3 Teman Anda untuk Pasang Iklan di OLX. Dapatkan Voucher Belanja Rp50.000">
  <meta name="keywords" content="olx, ajak, teman">
  <meta name="author" content="ajakteman.olx.co.id">

  <!-- facebook -->
  <meta property="og:url"           content="{{ url()->full() }}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Login - {{ config('app.name', 'OLX Ajak Teman') }}" />
  <meta property="og:description"   content="Pasang iklan pertamamu di OLX dan dapatkan Saldo OLX" />
  <meta property="og:image"         content="{{ asset('images/ajakteman.jpg') }}" />

  <!-- twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="{{ url()->full() }}">
  <meta name="twitter:title" content="Login - {{ config('app.name', 'OLX Ajak Teman') }}">
  <meta name="twitter:description" content="Pasang iklan pertamamu di OLX dan dapatkan Saldo OLX">
  <meta name="twitter:image" content="{{ asset('images/ajakteman.jpg') }}">
@endsection

@section('content')
<div class="login-terujuk">
  <div class="logo-area">
    <center><img src="{{ asset('images/logo.png') }}"></center>
  </div>
  <h1 class="intro">Daftar dulu, pasang iklan, dan dapatkan Saldo OLX</h1>

  <div class="container container-terujuk">
    <form class="form-ajax" method="POST" action="{{ url('login') }}" redirect="{{ url('dashboard/pasang-iklan') }}">
      {{ csrf_field() }}
      <input type="hidden" name="login_from" value="terujuk">
      <div class="col-sm-12 input-email">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <p class="help-block text-danger form-message" id="email"></p>
      </div>
      <div class="col-sm-12">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <p class="help-block text-danger form-message" id="password"></p>
      </div>
      <div class="col-sm-12 btn-area">
        <button type="submit" class="btn btn-block btn-log" id="button-submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> TUNGGU">MASUK</button>
        <p class="help-block form-message" id="message"></p>
      </div>
    </form>
    <div class="forgot-pass">
      <a href="https://ssl.olx.co.id/masuk/password/" target="_blank">Lupa Password</a>
    </div>
    
    <div class="row login-notes">
      <div class="col-sm-4"><img src="{{ asset('images/about-olx.png') }}" class="img-responsive"></div>
      <div class="col-sm-8 info-notes">
      <div class="title">Tentang OLX & Saldo OLX</div>
      <p>OLX adalah situs iklan baris online terbesar di Indonesia. Ada jutaan calon pembeli yang menginginkan barang bekas milikmu. Ngiklan di OLX, lakunya cepat!</p>
      <p>Saldo OLX dapat digunakan untuk membuat iklan Anda dilihat lebih banyak calon pembeli dan laku lebih cepat. </p>
      </div>
    </div>
  </div>

</div>
@endsection