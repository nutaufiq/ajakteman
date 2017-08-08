@extends('web.layouts.layout-01')

@section('title', 'Home')

@section('meta')
  <meta name="description" content="Ajak 3 Teman Anda untuk Pasang Iklan di OLX. Dapatkan Voucher Belanja Rp50.000">
  <meta name="keywords" content="olx, ajak, teman">
  <meta name="author" content="ajakteman.olx.co.id">

  <!-- facebook -->
  <meta property="og:url"           content="{{ url()->full() }}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Home - {{ config('app.name', 'OLX Ajak Teman') }}" />
  <meta property="og:description"   content="Ajak 3 Teman Anda untuk Pasang Iklan di OLX. Dapatkan Voucher Belanja Rp50.000" />
  <meta property="og:image"         content="{{ asset('images/ajakteman.jpg') }}" />

  <!-- twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="{{ url()->full() }}">
  <meta name="twitter:title" content="Home - {{ config('app.name', 'OLX Ajak Teman') }}">
  <meta name="twitter:description" content="Ajak 3 Teman Anda untuk Pasang Iklan di OLX. Dapatkan Voucher Belanja Rp50.000">
  <meta name="twitter:image" content="{{ asset('images/ajakteman.jpg') }}">
@endsection

@section('content')
<div class="login-wrapper login-perujuk">
  <div class="col-sm-7 col-xs-12 col-img-login">
    
  </div>
  <div class="col-sm-5 col-xs-12 col-login">
    <div class="content-login">
    <div class="logo-login"><center><a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}"></a></center></div>
    <h2>Dapatkan voucher MAP Rp 100.000 untuk 3 teman yang Anda ajak pasang iklan di OLX</h2>
    <p>Terima kasih telah menggunakan OLX. Ajak teman Anda untuk pasang iklan dan menikmati manfaat OLX.</p>
    <center><button class="btn btn-start-login" id="btn-start-login">SAYA MAU IKUTAN</button></center>
    <form id="form-login" class="form-ajax" method="POST" action="{{ url('login') }}" redirect="{{ url('dashboard') }}">
      {{ csrf_field() }}
      <input type="hidden" name="login_from" value="perujuk">
      <b>Gunakan akun OLX kamu untuk mulai mengajak teman</b>
      <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Email di OLX">
        <p class="help-block text-danger form-message" id="email"></p>
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <p class="help-block text-danger form-message" id="password"></p>
      </div>
      <button type="submit" class="btn btn-block btn-log" id="button-submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> TUNGGU">MASUK</button>
      <p class="help-block form-message" id="message"></p>
      <div class="forgot-pass">
        <a href="https://ssl.olx.co.id/masuk/password/" target="_blank">Lupa Password?</a>
      </div>
      <!-- <div class="social-login">
        <div class="col-sm-6 col-social">
          <div class="input-group">
            <span class="input-group-addon log-fb" id="sizing-addon1"><i class="fa fa-facebook"></i></span>              
            <button class="btn social-login-button log-fb btn-block">Masuk dengan akun Facebook</button>
          </div>          
        </div>
        <div class="col-sm-6 col-social">
          <div class="input-group">
            <span class="input-group-addon log-goo" id="sizing-addon1"><i class="fa fa-google-plus"></i></span>              
            <button class="btn social-login-button log-goo btn-block">Masuk dengan akun Google</button>
          </div>          
        </div>
      </div> -->
      <div class="login-tnc">Saya setuju dengan <a href="http://help.olx.co.id/hc/id/categories/200862056-Syarat-Ketentuan" target="_blank">syarat dan ketentuan</a></div> 
    </form>
    </div>
  </div>
</div>
@endsection