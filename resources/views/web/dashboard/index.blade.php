@extends('web.layouts.layout-03')

@section('title', 'Dashboard')

@section('meta')
  <meta name="description" content="Ajak 3 Teman Anda untuk Pasang Iklan di OLX. Dapatkan Voucher Belanja Rp50.000">
  <meta name="keywords" content="olx, ajak, teman">
  <meta name="author" content="ajakteman.olx.co.id">

  <!-- facebook -->
  <meta property="og:url"           content="{{ url()->full() }}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Dashboard - {{ config('app.name', 'OLX Ajak Teman') }}" />
  <meta property="og:description"   content="Ajak 3 Teman Anda untuk Pasang Iklan di OLX. Dapatkan Voucher Belanja Rp50.000" />
  <meta property="og:image"         content="{{ asset('images/ajakteman.jpg') }}" />

  <!-- twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="{{ url()->full() }}">
  <meta name="twitter:title" content="Dashboard - {{ config('app.name', 'OLX Ajak Teman') }}">
  <meta name="twitter:description" content="Ajak 3 Teman Anda untuk Pasang Iklan di OLX. Dapatkan Voucher Belanja Rp50.000">
  <meta name="twitter:image" content="{{ asset('images/ajakteman.jpg') }}">
@endsection

@section('content')

<!-- FORM AJAK TEMAN -->
<div class="container" id="section-ajakteman">
  <form class="form-ajakteman form-ajax" id="form-ajakteman" method="POST" action="{{ url('dashboard/invite') }}" redirect="modal">
    {{ csrf_field() }}
    <div class="title">Undangan Ajak Teman</div>
    <div class="notification">Ajak {{ \Auth::user()->count_remaining(Auth::user()->olx_id) }} teman lagi untuk menukarkan voucher</div>
    <div class="form-ajakteman-rows">
      <div class="row">
        <div class="col-sm-4">
          <label class="required">Nama Teman Anda</label>
          <input type="text" name="name[1]" class="form-control" placeholder="">
          <p class="help-block text-danger form-message" id="name.1"></p>
        </div>
        <div class="col-sm-4">
          <label class="required">Email Teman Anda</label>
          <input type="text" name="email[1]" class="form-control" placeholder="">
          <p class="help-block text-danger form-message" id="email.1"></p>
        </div>
        <div class="col-sm-3">
          <label class="required">Telepon Teman Anda</label>
          <input type="text" name="phone[1]" class="form-control" placeholder="">
          <p class="help-block text-danger form-message" id="phone.1"></p>
        </div>
        <div class="col-sm-1"></div>
      </div>
    </div>
    <div class="add-friend"><a id="add-friend">Tambah Teman <i class="fa fa-plus-square"></i></a></div>
    <div class="btn-area row">
      <button type="submit" class="btn btn" id="button-submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> TUNGGU">AJAK SEKARANG</button>
      <p class="help-block form-message" id="message"></p>
    </div>
  </form>
</div>
<!-- END OF FORM AJAK TEMAN -->

<div class="intro intro-howto-perujuk">
  <div class="container">
    <h1>Cara Ajak Teman</h1>
    <p>Terimakasih telah menggunakan OLX, ajak teman Anda untuk pakai OLX juga. Semakin banyak orang yang berhasil Anda ajak, makin banyak hadiah yang bisa Anda dapatkan.</p>
    <div class="col-sm-4 intro-item"><img src="{{ asset('images/howto1.jpg') }}"><br>Kirimkan undangan Ajak Teman</div>
    <div class="col-sm-4 intro-item"><img src="{{ asset('images/howto2.jpg') }}"><br>Pastikan 3 teman Anda mendaftar dan pasang iklan</div>
    <div class="col-sm-4 intro-item"><img src="{{ asset('images/howto3.jpg') }}"><br>Tukarkan voucher belanja Rp15.000.
    @if($count_voucher > 0)
      <br><a href="#tukar-voucher">Tukarkan voucher</a>
    @endif
    </div>
  </div>
</div>

<!-- TABEL TERUJUK -->
<div id="table-referral-ajax">
<div class="container" id="table-referral">
  <div class="point-title">RINGKASAN RUJUKAN ANDA</div>

  <div class="table-summary table-title">
    <div class="col-sm-3 table-column hidden-xs">Email</div>
    <div class="col-sm-3 table-column hidden-xs">Tanggal</div>
    <div class="col-sm-3 table-column hidden-xs">Status</div>
    <div class="col-sm-3 table-column hidden-xs">Tindak Lanjut</div>
  </div>

@foreach($invites as $invite)
  <div class="table-summary table-item">
    <div class="col-sm-3 table-column col-email">{{ $invite->email }}</div>
    <div class="col-sm-3 table-column">
    @if($invite->tracks->count() == 0)
      {{ $invite->created_at->format('d F Y') }}
    @else
      {{ $invite->tracks->last()->created_at->format('d F Y') }}
    @endif
    </div>
    <div class="col-sm-3 table-column">
    @if($invite->tracks->count() == 0)
      Undangan terkirim
    @else
      @if($invite->tracks->last()->status == 1)
        Membuka link pendaftaran
      @elseif($invite->tracks->last()->status == 2)
        Mendaftar
      @elseif($invite->tracks->last()->status == 3)
        Pasang Iklan
      @elseif($invite->tracks->last()->status == 4)
        Iklan sudah aktif
      @elseif($invite->tracks->last()->status == 5)
        Iklan sudah diverifikasi
      @else
        Not Found
      @endif
    @endif
    </div>
    <div class="col-sm-3 table-column">
    @if($invite->tracks->count() == 0)
      <a href="#" class="reminder" data-action="register" data-id="{{ $invite->id }}"><i class="fa fa-envelope-o"></i> Ingatkan </a>
    @else
      @if($invite->tracks->last()->status == 1)
        <a href="#" class="reminder" data-action="register" data-id="{{ $invite->id }}"><i class="fa fa-envelope-o"></i> Ingatkan </a>
      @elseif($invite->tracks->last()->status == 2)
        <a href="#" class="reminder" data-action="postads" data-id="{{ $invite->id }}"><i class="fa fa-envelope-o"></i> Ingatkan </a>
      @elseif($invite->tracks->last()->status == 3)
        Menunggu Iklan Aktif
      @elseif($invite->tracks->last()->status == 4)
        Menunggu Verifikasi
      @elseif($invite->tracks->last()->status == 5)
        Selesai
      @else
        Not Found
      @endif
    @endif
    </div>
  </div>
@endforeach

{{ $invites->links() }}

</div>
</div>
<!-- END OF TABEL TERUJUK -->

<!-- PEROLEHAN POIN -->
<div class="container" id="point-area">
<div class="row title">
    <div class="col-sm-6"><div class="point-title">JUMLAH TEMAN ANDA</div></div>
    <div class="col-sm-6 hidden-xs"><div class="point-title">HADIAH</div></div>
</div>
<div class="point-summary">
  <div class="row-eq-height">
    <div class="col-sm-3 col-xs-12 summary-item"><div><span class="point-score">{{ $count_invites }}</span><br>Jumlah teman yang diundang</div></div>
    <div class="col-sm-3 summary-item"><div><span class="point-score">{{ $count_ads_success }}</span><br>Jumlah teman yang pasang iklan</div></div>
    <div class="row hidden-sm visible-xs"><div class="point-title">HADIAH</div></div>
    <div class="col-sm-3 col-xs-12 summary-item"><div><span class="point-score">{{ $count_voucher }}</span><br>Voucher yang bisa Anda tukar</div></div>
    <div class="col-sm-3 summary-item"><div><span class="point-score">{{ $count_remaining }}</span><br>Tambahan teman untuk penukaran voucher selanjutnya</div></div>
  </div>
</div>
</div>
<!-- END OF PEROLEHAN POIN -->


<!-- REDEEM POINT -->
<div class="container" id="tukar-voucher">
  <form class="redeem-point form-ajax-file" method="POST" action="{{ url('dashboard/redeem') }}" redirect="modal" enctype="multipart/from-data">
    {{ csrf_field() }}
    <div class="title">Tukar voucher Anda sekarang</div>
    <div class="row">
    <div class="col-sm-3">
      <label>Nama</label>
      <input type="text" name="name" class="form-control" placeholder="">
      <p class="help-block text-danger form-message-file" id="name"></p>
    </div>
    <div class="col-sm-3">
      <label>Alamat pengiriman voucher</label>
      <input type="text" name="address" class="form-control" placeholder="">
      <p class="help-block text-danger form-message-file" id="address"></p>
    </div>
    <div class="col-sm-3">
      <label>No telepon</label>
      <input type="text" name="phone" class="form-control" placeholder="">
      <p class="help-block text-danger form-message-file" id="phone"></p>
    </div>
    <div class="col-sm-3">
      <label>KTP (unggah gambar)</label>
      <label class="btn btn-upload-img" for="upload-img">Unggah Foto</label>
      <input id="upload-img" name="image" type="file" placeholder="" accept="image/*">
      <p class="help-block text-danger form-message-file" id="image"></p>
    </div>
    </div>
    <div class="redeem-disclaimer">* Kerahasiaan data pribadi Anda dijamin oleh OLX dan tidak akan digunakan oleh pihak lain.</div>
    <div class="btn-area row">
        <button type="submit" class="btn btn" id="button-submit-file" data-loading-text="<i class='fa fa-spinner fa-spin '></i> TUNGGU">TUKAR SEKARANG</button>
        <p class="help-block form-message" id="message-file"></p>
    </div>

  </form>
</div>
<!-- END OF REDEEM POINT -->


@endsection