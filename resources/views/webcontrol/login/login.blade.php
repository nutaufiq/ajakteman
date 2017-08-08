@extends('webcontrol.template.login')

@section('title', 'Login - Webcontrol')

@section('content')

	<div class="container-fluid">
	   	<div class="row">
	   		<div class="col-md-6 hidden-xs hidden-sm half-full" id="col-img">
	   			<h1><strong>WEB</strong>CONTROL</h1>
	   		</div>
	   		<div class="col-md-6 half-full" id="col-form">

				<div id="form-login-container">
		   			<h1>LOGIN</h1>

		   			<form role="form" method="POST" action="{{ url('webcontrol') }}" id="form-login">
        				{{ csrf_field() }}
						<div class="form-group">
						    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
						    @if ($errors->has('email')) <p class="text-danger">{{ $errors->first('email') }}</p> @endif
						</div>
						<div class="form-group">
						    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
						    @if ($errors->has('password')) <p class="text-danger">{{ $errors->first('password') }}</p> @endif
						</div>
						<button type="submit" class="btn btn-default">Login</button>
						@if (session('message')) <p class="text-danger"> {{ session('message') }}</p>@endif
					</form>
				</div>

	   		</div>
	   	</div>
   	</div>

@endsection