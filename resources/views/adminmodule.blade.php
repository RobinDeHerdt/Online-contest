@extends('layouts.app')

@section('title')
    Administrator
@endsection

@section('content')
	<div class="col-md-12 padding-bottom admin-tabel">
	<a href="/administrator/wedstrijdfotos" class="back-link">Wedstrijdfoto's</a>
		<div class="wedstrijden-header">
            <img src="img/pointing_hand_left.jpg">
            <span>Deelnemerslijst</span>
            <img src="img/pointing_hand_right.jpg">
        </div>
        @if (!$creations->count())
			<h3 class="centertext">Er zijn geen deelnemers</h3>
        @else
		<table class="table table-hover">
			<tr>
				<th>Voornaam</th>
				<th>Achternaam</th>
				<th>Email</th>
				<th>Geboortedatum</th>
				<th>Adres</th>
				<th>IP-adres</th> 
				<th>Creatie</th>
				<th>Stemmen</th>
				<th>Diskwalificeren</th>
			</tr>
			@foreach ($creations->sortBy('votes')->reverse() as $creation)
			<tr class="{{ $winners->where('creation_id', $creation->id)->count()  ? 'success' : '' }}">
				<td>{{ $creation->user->first_name }}</td>
				<td>{{ $creation->user->last_name }}</td>
				<td>{{ $creation->user->email }}</td>
				<td>{{ $creation->user->date_of_birth }}</td>
				<td>{{ $creation->user->street_number . ", " . $creation->user->postalcode . "  " . $creation->user->city }}</td>
				<td>{{ $creation->user->ip_adress }}</td>
				<td><a href="{{ $creation->image_url }}">Link</a></td>
				<td>{{ $creation->votes->count() }}</td>
				<td>
					<form action="/administrator/destroy/{{$creation->id}}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="submit" value="Diskwalificeer">
					</form>
				</td>
			</tr>
			@endforeach
		</table>
		{{ $creations->links() }}
		@endif

		<div class="wedstrijden-header">
            <img src="img/pointing_hand_left.jpg">
            <span>Gediskwalificeerden</span>
            <img src="img/pointing_hand_right.jpg">
        </div>
        @if (!$softDeletedCreations->count())
			<h3 class="centertext">Er zijn geen diskwalificaties</h3>
        @else
		<table class="table table-hover">
			<tr>
				<th>Voornaam</th>
				<th>Achternaam</th>
				<th>Email</th>
				<th>Geboortedatum</th>
				<th>Adres</th>
				<th>IP-adres</th> 
				<th>Creatie</th>
				<th>Stemmen</th>
				<th>Terugzetten</th>
			</tr>
			@foreach ($softDeletedCreations as $creation)
			<tr>
				<td>{{ $creation->user->first_name }}</td>
				<td>{{ $creation->user->last_name }}</td>
				<td>{{ $creation->user->email }}</td>
				<td>{{ $creation->user->date_of_birth }}</td>
				<td>{{ $creation->user->street_number . ", " . $creation->user->postalcode . " " . $creation->user->city }}</td>
				<td>{{ $creation->user->ip_adress }}</td>
				<td><a href="{{ $creation->image_url }}">Link</a></td>
				<td>{{ $creation->votes->count() }}</td>
				<td>
					<form action="/administrator/restore/{{$creation->id}}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="submit" value="Terugzetten">
					</form>
				</td>
			</tr>
			@endforeach
		</table>
		@endif
	</div>
@endsection