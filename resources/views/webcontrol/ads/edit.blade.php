@extends('webcontrol.template.template')

@section('title', 'Ads - Edit - Webcontrol')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <h1 class="page-title">Ads <a href="{{ url('webcontrol/ads') }}" class="btn btn-primary btn-xs btn-back" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></h1>
    </div>
  </div>

  @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
  @endif

  <form role="form" method="POST" action="{{ url('webcontrol/ads/'.$ads->id.'/edit') }}" id="form-login">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-md-9">

        <div class="form-group">
          <label>Ads ID</label>
          <input type="text" class="form-control" value="{{ $ads->ads_olx_id }}" readonly="readonly">
        </div>

        <div class="form-group">
          <label>OLX ID</label>
          <input type="text" class="form-control" value="{{ $ads->user_olx_id }}" readonly="readonly">
        </div>

        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" value="{{ $ads->user->name }}" readonly="readonly">
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" value="{{ $ads->user->email }}" readonly="readonly">
        </div>

        <div class="form-group">
          <label>Phone</label>
          <input type="text" class="form-control" value="{{ $ads->user->phone }}" readonly="readonly">
        </div>

        <div class="form-group">
          <label>Date</label>
          <input type="text" class="form-control" value="{{ $ads->created_at->format('d F Y') }}" readonly="readonly">
        </div>

      </div>

      <div class="col-md-3 box">

        <div class="form-group">
          <label for="radio">Active</label>
          <div class="radio">
            <label>
              <input type="radio" name="is_active" id="radio" value="1" {{ old('is_active', $ads->is_active) == 1 ? 'checked="checked"' : '' }}>
              Yes
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="is_active" id="radio" value="0" {{ old('is_active', $ads->is_active) == 0 ? 'checked="checked"' : '' }}>
              No
            </label>
          </div>
          @if ($errors->has('is_active')) <p class="text-danger">{{ $errors->first('is_active') }}</p> @endif
        </div>
      
        <div class="form-group">
          <label for="radio">Verified</label>
          <div class="radio">
            <label>
              <input type="radio" name="is_verified" id="radio" value="1" {{ old('is_verified', $ads->is_verified) == 1 ? 'checked="checked"' : '' }}>
              Yes
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="is_verified" id="radio" value="0" {{ old('is_verified', $ads->is_verified) == 0 ? 'checked="checked"' : '' }}>
              No
            </label>
          </div>
          @if ($errors->has('is_verified')) <p class="text-danger">{{ $errors->first('is_verified') }}</p> @endif
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </form>
@endsection