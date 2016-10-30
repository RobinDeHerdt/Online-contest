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
		<table class="table table-hover">
			<tr>
				<th>Voornaam</th>
				<th>Achternaam</th>
				<th>Email</th>
				<th>Geboortedatum</th>
				<th>IP-adres</th> 
				<th>Creatie_url</th>
				<th>Aantal stemmen</th>
			</tr>
			<tr>
				<td>Bobby</td>
				<td>Tables</td>
				<td>bobby@tabl.es</td>
				<td>31.12.1999</td>
				<td>127.0.0.1</td>
				<td>img/creaties/table.jpg</td>
				<td>666</td>
			</tr>
		</table>
	</div>
@endsection