@extends('layouts.app')

@section('title')
    Administrator
@endsection

@section('content')
	<div class="container col-md-8 col-md-offset-2 padding-bottom">
		<a href="/administrator">Terug naar administratorpaneel</a>
		<a href="/administrator/wedstrijdfotos/create">Upload een foto</a>
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
				<td><a href="/{{ $contestimage->image_url }}">Link</a></td>
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