@extends('layouts.app')

@section('title')
    Administratorgedeelte
@endsection

@section('content')
	<div class="container col-md-8 col-md-offset-2">
		<div class="wedstrijden-header">
            <img src="img/pointing_hand_left.jpg">
            <span>Deelnemerslijst</span>
            <img src="img/pointing_hand_right.jpg">
        </div>
        @if (!$creations->count())
			<h1>Er zijn geen deelnemers</h1>
        @else
		<table class="table table-hover">
			<tr>
				<th>Voornaam</th>
				<th>Achternaam</th>
				<th>Email</th>
				<th>Geboortedatum</th>
				<th>IP-adres</th> 
				<th>Creatie</th>
				<th>Stemmen</th>
				<th>Instuurdatum</th>
				<th>Soft delete</th>
			</tr>
			@foreach ($creations as $creation)
			<tr>
				<td>{{ $creation->user->first_name }}</td>
				<td>{{ $creation->user->last_name }}</td>
				<td>{{ $creation->user->email }}</td>
				<td>{{ $creation->user->date_of_birth }}</td>
				<td>{{ $creation->user->ip_adress }}</td>
				<td><a href="{{ $creation->image_url }}">{{ $creation->image_url }}</a></td>
				<td>{{ $creation->votes->count() }}</td>
				<td>{{ $creation->created_at }}</td>
				<td>
					<form action="/administrator/destroy/{{$creation->id}}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="submit" value="Delete">
					</form>
				</td>
			</tr>
			@endforeach
		</table>
		@endif

		<div class="wedstrijden-header">
            <img src="img/pointing_hand_left.jpg">
            <span>Gediskwalificeerden</span>
            <img src="img/pointing_hand_right.jpg">
        </div>
        @if (!$softDeletedCreations->count())
			<h1>Er zijn geen gediskwalificeerden.</h1>
        @else
		<table class="table table-hover">
			<tr>
				<th>Voornaam</th>
				<th>Achternaam</th>
				<th>Email</th>
				<th>Geboortedatum</th>
				<th>IP-adres</th> 
				<th>Creatie</th>
				<th>Stemmen</th>
				<th>Instuurdatum</th>
				<th>Terugzetten</th>
			</tr>
			@foreach ($softDeletedCreations as $creation)
			<tr>
				<td>{{ $creation->user->first_name }}</td>
				<td>{{ $creation->user->last_name }}</td>
				<td>{{ $creation->user->email }}</td>
				<td>{{ $creation->user->date_of_birth }}</td>
				<td>{{ $creation->user->ip_adress }}</td>
				<td><a href="{{ $creation->image_url }}">{{ $creation->image_url }}</a></td>
				<td>{{ $creation->votes->count() }}</td>
				<td>{{ $creation->created_at }}</td>
				<td>
					<form action="/administrator/restore/{{$creation->id}}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="submit" value="Restore">
					</form>
				</td>
			</tr>
			@endforeach
		</table>
		@endif
	</div>
@endsection