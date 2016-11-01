@extends('layouts.app')

@section('title')
    Humo: The Wild Site
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="wedstrijden-header">
                <img src="img/pointing_hand_left.jpg">
                <span>Wedstrijden</span>
                <img src="img/pointing_hand_right.jpg">
            </div>
            <div class="content">
                <img src="{{ $contestimage->image_url }}" alt="" class="img-responsive">
                <h3>Win een jaarabonnement op humo!</h3>   
                <p>Bewerk de gegeven foto op een creatieve manier. Je mag elementen van andere afbeeldingen gebruiken, zo lang een deel van de originele foto er maar in te vinden is.</p>
                <p>De creatie met het meeste stemmen van de humo-lezers wint een jaarabonnement op Humo!</p>
                <br>
                <a href="/wedstrijd"><button type="button" class="btn-custom">Doe mee</button></a>
            </div>
            @if ($isThereAWinner)
            <div class="wedstrijden-header">
                <img src="img/pointing_hand_left.jpg">
                <span>Winnaars</span>
                <img src="img/pointing_hand_right.jpg">
            </div>
            <div class="content">
                <img src="{{ $winningcreation->image_url }}" class="img-responsive" style="width:100%">
                <h3>Winnaar week {{ $winner->id}}</h3>
                <strong>{{ $winninguser->first_name . " " . $winninguser->last_name . " met " . "'" .$winningcreation->description . "'"}}</strong>
                <br>
                <br>
                <h4>Alle winnaars van de voorbije weken:</h4>
                @foreach ($allwinners as $winner)
                   {{ "Week " . $winner->id . ":  " . $winner->creation->user->first_name . " " . $winner->creation->user->last_name}} 
                   <br>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
