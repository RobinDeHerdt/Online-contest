@extends('layouts.app')

@section('title')
    Winnaars
@endsection

@section('content')
	<div class="container col-md-8 col-md-offset-2 padding-bottom">
	<div class="wedstrijden-header">
        <img src="/img/pointing_hand_left.jpg">
        <span>Wedstrijdfoto uploaden</span>
        <img src="/img/pointing_hand_right.jpg">
    </div>
	{!! Form::open(array('class' => 'form-horizontal', 'files' => true))  !!}
		{{ csrf_field() }}
		 <div class="form-group">
			{{ Form::label('image', 'Upload creatie', ['class' => 'control-label col-sm-2']) }}
			<div class="col-sm-10">
				{{ Form::file('image', ['class' => 'form-control']) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{{Form::submit('Verstuur', ['class' => 'btn btn-default'])}}
			</div>
		</div>
	{!! Form::close() !!}
	</div>
@endsection