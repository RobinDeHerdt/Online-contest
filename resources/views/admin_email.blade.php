@extends('layouts.app')

@section('title')
    Administrator
@endsection

@section('content')
	<div class="col-md-8 col-md-offset-2 padding-bottom admin-tabel">
		<a href="/administrator" class="back-link">Terug naar administratorpaneel</a>
		@if(Session::has('status'))
        <div class="alert alert-success">
	            {{Session::get('status')}}	   
		</div>
		@endif
		<br>
		<div class="wedstrijden-header">
            <img src="/img/pointing_hand_left.jpg">
            <span>Administrator email</span>
            <img src="/img/pointing_hand_right.jpg">
        </div>
        <div class="centertext">
	        <p>Stel hier het mailadres van de wedstrijdverantwoordelijke in.</p>
			<p>Huidige emailadres: <strong>{{$admin_email->email }}</strong></p>
		</div>
		<br>
		@if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<br>
		<form action="/administrator/email" method="POST" class="form-horizontal">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<label for="email" class="control-label col-sm-2">Email</label>
				<div class="col-sm-10">
					<input type="text" name="email" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<input type="submit" value="Bevestig" class="btn btn-default">
				</div>
			</div>
		</form>
	</div>
@endsection