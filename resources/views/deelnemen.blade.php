@extends('layouts.app')

@section('title')
    Deelnemen
@endsection

@section('content')
<div class="container col-md-10 col-md-offset-1">
    <div class="row">
        <div class="wedstrijd-content">
        	<a href="/wedstrijd" class="back-link">Terug naar de wedstrijdpagina</a>
           	<div class="wedstrijden-header">
                <img src="img/pointing_hand_left.jpg">
                <span>Deelnemen</span>
                <img src="img/pointing_hand_right.jpg">
            </div>
			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
           	{!! Form::open(array('class' => 'form-horizontal', 'files' => true))  !!}
				{{ csrf_field() }}
				 <div class="form-group">
					{{ Form::label('title', 'Titel van je creatie', ['class' => 'control-label col-sm-2']) }}
					<div class="col-sm-10">
						{{ Form::text('title', '', ['class' => 'form-control']) }}
					</div>
				</div>
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
    </div>
</div>
@endsection