@extends('webcontrol.template.template')

@section('title', 'Redeem - Edit - Webcontrol')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <h1 class="page-title">Redeem <a href="{{ url('webcontrol/redeem') }}" class="btn btn-primary btn-xs btn-back" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></h1>
    </div>
  </div>

  @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
  @endif

  <form role="form" method="POST" action="{{ url('webcontrol/redeem/'.$redeem->id.'/edit') }}" id="form-login">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-md-9">

        <div class="form-group">
          <label>OLX ID</label>
          <input type="text" class="form-control" value="{{ $redeem->user_olx_id }}" readonly="readonly">
        </div>

        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" value="{{ $redeem->name }}" readonly="readonly">
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" value="{{ $redeem->user->email }}" readonly="readonly">
        </div>

        <div class="form-group">
          <label>Address</label>
          <input type="text" class="form-control" value="{{ $redeem->address }}" readonly="readonly">
        </div>

        <div class="form-group">
          <label>Phone</label>
          <input type="text" class="form-control" value="{{ $redeem->phone }}" readonly="readonly">
        </div>

        <div class="form-group">
          <label>Date</label>
          <input type="text" class="form-control" value="{{ $redeem->created_at->format('d F Y') }}" readonly="readonly">
        </div>

      </div>

      <div class="col-md-3 box">

        <div class="form-group">
          <label for="radio">Status</label>
          <div class="radio">
            <label>
              <input type="radio" name="status" id="radio" value="2" {{ old('status', $redeem->status) == 2 ? 'checked="checked"' : '' }}>
              Rejected
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="status" id="radio" value="1" {{ old('status', $redeem->status) == 1 ? 'checked="checked"' : '' }}>
              Verified
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="status" id="radio" value="0" {{ old('status', $redeem->status) == 0 ? 'checked="checked"' : '' }}>
              Pending
            </label>
          </div>
          @if ($errors->has('status')) <p class="text-danger">{{ $errors->first('status') }}</p> @endif
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </form>
@endsection