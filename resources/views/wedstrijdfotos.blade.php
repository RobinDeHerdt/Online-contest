@extends('layouts.app')

@section('title')
    Administrator
@endsection

@section('content')
	<div class="container col-md-8 col-md-offset-2 padding-bottom">
		<a href="/administrator" class="back-link">Terug naar administratorpaneel</a>
		<br>
		<a href="/administrator/wedstrijdfotos/create" class="back-link">Upload een foto</a>
		<br>
		<br>
		@if(Session::has('status'))
        <div class="alert alert-success">
	            {{Session::get('status')}}	   
		</div>
		@endif
		<div class="wedstrijden-header">
            <img src="/img/pointing_hand_left.jpg">
            <span>Wedstrijdfoto's</span>
            <img src="/img/pointing_hand_right.jpg">
        </div>
		
		<table class="table table-hover">
			<tr>
				<th>ID</th>
				<th>Foto</th>
				<th>Werd gebruikt</th>
				<th>Verwijderen</th>
			</tr>
			@foreach ($contestimages as $contestimage)
			<tr>
				<td>{{ $contestimage->id }}</td>
				<td><a href="/{{ $contestimage->image_url }}">{{ $contestimage->image_url }}</a></td>
				<td>{{($contestimage->isUsed ? "Ja" : "Nee")}} </td>
				<td>
					<form action="/administrator/wedstrijdfotos/destroy/{{$contestimage->id}}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="submit" value="Delete">
					</form>
				</td>
			</tr>
			@endforeach
		</table>
	</div>
@endsection