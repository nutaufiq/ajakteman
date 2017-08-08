@extends('webcontrol.template.template')

@section('title', 'Admin - Add - Webcontrol')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <h1 class="page-title">Admin <a href="{{ url('webcontrol/admin') }}" class="btn btn-primary btn-xs btn-back" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></h1>
    </div>
  </div>

  <form role="form" method="POST" action="{{ url('webcontrol/admin/add') }}" id="form-login">
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
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
          @if ($errors->has('password')) <p class="text-danger">{{ $errors->first('password') }}</p> @endif
        </div>

        <div class="form-group">
          <label for="password_confirmation">Password Confirmation</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation">
        </div>

      </div>

      <div class="col-md-3 box">

        <div class="form-group">
          <label for="level">Level</label>
          <select class="form-control" name="level" id="level">
            <option value="0"{{ (old('level') == '0') ? ' selected="selected"' : '' }}>Choose:</option>
            <option value="1"{{ (old('level') == '1') ? ' selected="selected"' : '' }}>Viewer</option>
            <option value="2"{{ (old('level') == '2') ? ' selected="selected"' : '' }}>Downloader</option>
            <option value="3"{{ (old('level') == '3') ? ' selected="selected"' : '' }}>Admin</option>
          </select>
          @if ($errors->has('level')) <p class="text-danger">{{ $errors->first('level') }}</p> @endif
        </div>

        <div class="form-group">
          <label for="radio">Active</label>
          <div class="radio">
            <label>
              <input type="radio" name="is_active" id="radio" value="1" {{ old('is_active') == 1 ? 'checked="checked"' : '' }}>
              Yes
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="is_active" id="radio" value="0" {{ old('is_active') == 0 ? 'checked="checked"' : '' }}>
              No
            </label>
          </div>
          @if ($errors->has('is_active')) <p class="text-danger">{{ $errors->first('is_active') }}</p> @endif
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </form>
@endsection