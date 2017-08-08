@extends('webcontrol.template.template')

@section('title', 'User - Add - Webcontrol')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <h1 class="page-title">User <a href="{{ url('webcontrol/user') }}" class="btn btn-primary btn-xs btn-back" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></h1>
    </div>
  </div>

  <form role="form" method="POST" action="{{ url('webcontrol/user/add') }}" id="form-login">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-md-9">

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
          @if ($errors->has('name')) <p class="text-danger">{{ $errors->first('name') }}</p> @endif
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
          @if ($errors->has('email')) <p class="text-danger">{{ $errors->first('email') }}</p> @endif
        </div>

        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ old('phone') }}">
          @if ($errors->has('phone')) <p class="text-danger">{{ $errors->first('phone') }}</p> @endif
        </div>

        <div class="form-group">
          <label for="olx_id">OLX ID</label>
          <input type="text" class="form-control" id="olx_id" name="olx_id" placeholder="OLX ID" value="{{ old('olx_id') }}">
          @if ($errors->has('olx_id')) <p class="text-danger">{{ $errors->first('olx_id') }}</p> @endif
        </div>

        <div class="form-group">
          <label for="referrer_olx_id">Referrer [OLX ID]</label>
          <input type="text" class="form-control" id="referrer_olx_id" name="referrer_olx_id" placeholder="Referrer [OLX ID]" value="{{ old('referrer_olx_id') }}">
          @if ($errors->has('referrer_olx_id')) <p class="text-danger">{{ $errors->first('referrer_olx_id') }}</p> @endif
        </div>

        <div class="form-group">
          <label for="invite_id">Invite ID</label>
          <input type="text" class="form-control" id="invite_id" name="invite_id" placeholder="Referrer [OLX ID]" value="{{ old('invite_id') }}">
          @if ($errors->has('invite_id')) <p class="text-danger">{{ $errors->first('invite_id') }}</p> @endif
        </div>

      </div>

      <div class="col-md-3 box">

        <div class="form-group">
          <label for="radio">Verified</label>
          <div class="radio">
            <label>
              <input type="radio" name="is_verified" id="radio" value="1" {{ old('is_verified') == 1 ? 'checked="checked"' : '' }}>
              Yes
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="is_verified" id="radio" value="0" {{ old('is_verified') == 0 ? 'checked="checked"' : '' }}>
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