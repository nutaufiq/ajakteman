@extends('web.layouts.layout-03')

@section('title', 'Dashboard - Pasang Iklan')

@section('meta')
  <meta name="description" content="Ajak 3 Teman Anda untuk Pasang Iklan di OLX. Dapatkan Voucher Belanja Rp50.000">
  <meta name="keywords" content="olx, ajak, teman">
  <meta name="author" content="ajakteman.olx.co.id">

  <!-- facebook -->
  <meta property="og:url"           content="{{ url()->full() }}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Dashboard - Pasang Iklan - {{ config('app.name', 'OLX Ajak Teman') }}" />
  <meta property="og:description"   content="Pasang iklan pertamamu di OLX dan dapatkan Saldo OLX" />
  <meta property="og:image"         content="{{ asset('images/ajakteman.jpg') }}" />

  <!-- twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="{{ url()->full() }}">
  <meta name="twitter:title" content="Dashboard - Pasang Iklan - {{ config('app.name', 'OLX Ajak Teman') }}">
  <meta name="twitter:description" content="Pasang iklan pertamamu di OLX dan dapatkan Saldo OLX">
  <meta name="twitter:image" content="{{ asset('images/ajakteman.jpg') }}">
@endsection

@section('content')
<div class="login-wrapper register-terujuk">
  <div class="banner">
      <div class="col-sm-6 col-xs-12 howto-terujuk">
        <center><h3>Pasang iklan pertamamu di OLX dan dapatkan Saldo OLX Rp 15.000</h3></center>
<!--        <center><img src="{{ asset('images/howto.png') }}" class="img-responsive img-howto-terujuk"></center>-->
            <div class="row">
                @if($ads == null)
                @if($terujuk)
                <center><a href="{{ url('dashboard/pasang-iklan/form') }}">PASANG IKLAN SEKARANG</a></center>
                @else
                <center><a href="" data-toggle="modal" data-target="#advertModal">PASANG IKLAN SEKARANG</a></center>
                @endif
                @endif
              <div class=" col-sm-offset-2 col-sm-4"><img src="{{ asset('images/about-olx.png') }}" class="img-responsive"></div>
              <div class="col-sm-6 info-notes">
              <div class="title">Tentang OLX & Saldo OLX</div>
              <p>OLX adalah situs iklan baris online terbesar di Indonesia. Ada jutaan calon pembeli yang menginginkan barang bekas milikmu. Ngiklan di OLX, lakunya cepat!</p>
              <p>Saldo OLX dapat digunakan untuk membuat iklan Anda dilihat lebih banyak calon pembeli dan laku lebih cepat. </p>
              </div>
            </div>
<!--
        @if($ads == null)
        @if($terujuk)
        <center><a href="{{ url('dashboard/pasang-iklan/form') }}">PASANG IKLAN SEKARANG</a></center>
        @else
        <center><a href="" data-toggle="modal" data-target="#advertModal">PASANG IKLAN SEKARANG</a></center>
        @endif
        @endif
-->
      </div>
      <div class="col-sm-6 hidden-xs person-terujuk">
        <center><img src="{{ asset('images/person-terujuk.png') }}" class="img-responsive img-person-terujuk"></center>
      </div>
  </div>
</div>

<!-- SECTION ADS STATUS -->

<div class="container" id="ads-status">
  <div class="ads-status">
    <div class="ads-status-title">STATUS IKLAN ANDA</div>
    <div class="row bs-wizard" style="border-bottom:0;">
      
      <!-- disabled active complete -->

      @if($ads == null)
      <div class="col-xs-4 bs-wizard-step disabled">
      @else
        @if($ads->is_active == 0)
      <div class="col-xs-4 bs-wizard-step active">
        @else
      <div class="col-xs-4 bs-wizard-step complete">
        @endif
      @endif
        <div class="text-center bs-wizard-stepnum">&nbsp;</div>
        <div class="progress"><div class="progress-bar"></div></div>
        <a class="bs-wizard-dot"><i class="fa fa-thumb-tack"></i></a>
        <div class="bs-wizard-info text-center">
        @if($ads == null)
          Anda belum pasang iklan<br>
          @if($terujuk)
          <a href="{{ url('dashboard/pasang-iklan/form') }}">PASANG IKLAN</a>
          @else
          <a href="" data-toggle="modal" data-target="#advertModal">PASANG IKLAN</a>
          @endif
        @else
          @if($ads->status == 0)
          Anda sudah pasang iklan
          @endif
        @endif
        </div>

      </div>

      @if($ads == null)
      <div class="col-xs-4 bs-wizard-step disabled">
      @else
        @if($ads->is_active == 1 && $ads->is_verified == 0)
      <div class="col-xs-4 bs-wizard-step active">
        @elseif($ads->is_active == 1 && $ads->is_verified == 1)
      <div class="col-xs-4 bs-wizard-step complete">
        @else
      <div class="col-xs-4 bs-wizard-step disabled">
        @endif
      @endif
        <div class="text-center bs-wizard-stepnum">&nbsp;</div>
        <div class="progress"><div class="progress-bar"></div></div>
        <a class="bs-wizard-dot">
        @if($ads != null)
          @if($ads->is_active == 1)
          <i class="fa fa-check-square-o"></i>
          @else
          <i class="fa fa-window-close-o"></i>
          @endif
        @else
        <i class="fa fa-window-close-o"></i>
        @endif
        </a>
        <div class="bs-wizard-info text-center">
        @if($ads != null)
          @if($ads->is_active == 1)
            Iklan Anda sudah aktif
          @else
            Iklan Anda belum aktif
          @endif
        @else
          Iklan Anda belum aktif
        @endif
        </div>
      </div>
      
      @if($ads == null)
      <div class="col-xs-4 bs-wizard-step disabled">
      @else
        @if($ads->is_active == 1 && $ads->is_verified == 0)
      <div class="col-xs-4 bs-wizard-step disabled">
        @elseif($ads->is_active == 1 && $ads->is_verified == 1)
      <div class="col-xs-4 bs-wizard-step complete">
        @else
      <div class="col-xs-4 bs-wizard-step disabled">
        @endif
      @endif
        <div class="text-center bs-wizard-stepnum">&nbsp;</div>
        <div class="progress"><div class="progress-bar"></div></div>
        <a class="bs-wizard-dot"><i class="fa fa-shopping-bag"></i></a>
        <div class="bs-wizard-info text-center">
        @if($ads != null)
          @if($ads->is_verified == 1)
            Saldo OLX Anda bertambah Rp 15.000<br>
            <a href="http://olx.co.id/iklanku/" target="_blank">LIHAT PROFIL</a>
          @else
            @if($ads->is_active == 1)
              Menunggu verifikasi
            @else
              Proses selesai
            @endif
          @endif
        @else
          Proses selesai
        @endif
        </div>
      </div>
        
    </div>      
  </div>
</div>
<!-- EO SECTION ADS STATUS -->

<div class="intro">
  <div class="container">
    <h1>Anda bisa juga mendapatkan voucher belanja bila Anda berhasil mengajak 3 teman untuk pasang iklan di OLX.</h1>
    <a href="{{ url('dashboard#section-ajakteman') }}">AJAK TEMAN SEKARANG</a>
  </div>
</div>
@endsection