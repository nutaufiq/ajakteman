@extends('web.layouts.layout-04')

@section('title', 'Dashboard - Pasang Iklan - Formulir')

@section('meta')
  <meta name="description" content="Pasang iklan pertamamu di OLX dan dapatkan Saldo OLX">
  <meta name="keywords" content="olx, ajak, teman">
  <meta name="author" content="ajakteman.olx.co.id">

  <!-- facebook -->
  <meta property="og:url"           content="{{ url()->full() }}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Dashboard - Pasang Iklan - Formulir - {{ config('app.name', 'OLX Ajak Teman') }}" />
  <meta property="og:description"   content="Pasang iklan pertamamu di OLX dan dapatkan Saldo OLX" />
  <meta property="og:image"         content="{{ asset('images/ajakteman.jpg') }}" />

  <!-- twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:url" content="{{ url()->full() }}">
  <meta name="twitter:title" content="Dashboard - Pasang Iklan - Formulir - {{ config('app.name', 'OLX Ajak Teman') }}">
  <meta name="twitter:description" content="Pasang iklan pertamamu di OLX dan dapatkan Saldo OLX">
  <meta name="twitter:image" content="{{ asset('images/ajakteman.jpg') }}">
@endsection

@section('content')
<div class="pasang-iklan">
  <div class="page-title"><div class="container">Pasang Iklan</div></div>
  <div class="container iklan-wrapper">

    <form action="{{ url('dashboard/pasang-iklan/upload') }}" method="POST" id="form-upload" enctype="multipart/from-data">
      {{ csrf_field() }}
      <input id="upload-image" data-count="1" class="upload-image hidden" type="file" accept="image/*" name="image" value="" />
      <input type="hidden" name="temporary_key" value="" id="temporary_key">
    </form>


    <form action="{{ url('dashboard/pasang-iklan/form') }}" method="POST" class="form-ajax-ads" redirect="modal">
    {{ csrf_field() }}
    <div class="section">
      <div class="section-title">Upload Foto</div>
      <div class="section-images">

        <div class="image-uploader">
          <div class="images-container" id="image-preview-1" data-slot="0">
            <label for="upload-image"><i class="fa fa-plus"></i></label>
          </div>
        </div>

      </div>

      <div class="message text-danger" id="image"></div>

      <div class="text-danger form-message" id="photos_group_key"></div>

      <p>Menampilkan lebih dari satu foto barang akan menambah kepercayaan calon pembeli dan meningkatkan kesempatan barang terjual</p>

      <input type="hidden" id="data[photos_group_key]" name="data[photos_group_key]" value="">

    </div>

    <div class="section">

        <div class="form-group">
          <label>Judul</label>
          <input type="text" class="form-control count-input" id="data[title]" name="data[title]">
          <div class="counter"><span>0</span> / 70</div>
          <div class="text-danger form-message" id="title"></div>
        </div>

        <div class="form-group">
          <label>Cari Lokasi</label>
          <input type="text" id="getlocation" class="form-control" placeholder="Lokasi Saat Ini" data-loading-text="Loading...">

          <input type="hidden" id="data[coordinates][latitude]" name="data[coordinates][latitude]" value="">
          <input type="hidden" id="data[coordinates][longitude]" name="data[coordinates][longitude]" value="">

          <input type="hidden" id="location" name="data[location]" value="">

          <div class="text-danger form-message" id="location"></div>
        </div>

        <div class="form-group">
          <label>Kategori</label>
          <input type="text" class="form-control" id="choose-category" readonly="readonly">
          <input type="hidden" name="data[category_id]" id="category_id" data-parent="0">

          <div class="text-danger form-message" id="category_id"></div>
        </div>

        <div id="additional-form-required"></div>
        
    </div>

    <div class="section">
      <div class="section-title" id="add-info">Info Tambahan (Opsional) <span><i class="fa fa-chevron-down"></i></span></div>
      <div class="add-info">
        <div class="form-group">
          <label>Deskripsikan barang Anda</label>
          <textarea class="form-control" placeholder="Deskripsi" name="data[description]"></textarea>
          <div class="text-danger form-message" id="description"></div>
        </div>

        <div id="additional-form-optional"></div>

      </div>
    </div>

    <button type="submit" class="submit-iklan" id="button-submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> TUNGGU">PASANG IKLAN</button>

    <p class="text-danger" id="message"></div>

    </form>

  </div>
</div>
@endsection