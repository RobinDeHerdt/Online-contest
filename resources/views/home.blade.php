@extends('layouts.app')

@section('title')
    Humo: The Wild Site
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">           
            @if(Session::has('failedstatus'))
            <div class="alert alert-danger">
                    {{Session::get('failedstatus')}}       
            </div>
            @endif
            <div class="wedstrijden-header">
                <img src="img/pointing_hand_left.jpg">
                <span>Wedstrijden</span>
                <img src="img/pointing_hand_right.jpg">
            </div>
            @if ($contestIsLive)
            <div class="content">
                <img src="{{ $contestImage->image_url }}" class="img-responsive">
                <h3>Win een jaarabonnement op humo!</h3>   
                <p>Bewerk de gegeven foto op een creatieve manier. Je mag elementen van andere afbeeldingen gebruiken, zo lang een deel van de originele foto er maar in te vinden is.</p>
                <p>De creatie met het meeste stemmen van de humo-lezers wint een jaarabonnement op Humo!</p>
                <p>Deze wedstrijd loopt af om 12.00u op woensdag {{ $next_wednesday }}.</p>
                <br>
                <a href="/wedstrijd"><button type="button" class="btn-custom">Doe mee</button></a>
            </div>
            @else
            <div class="content">
                <h3 class="centertext">Er zijn geen wedstrijden op dit moment.</h3> 
            </div>
            @endif
            <div class="wedstrijden-header">
                <img src="img/pointing_hand_left.jpg">
                <span>Winnaars</span>
                <img src="img/pointing_hand_right.jpg">
            </div>
            @if ($isThereAWinner)
                @foreach ($allWinners as $winner)
                <div class="content">
                    <img src="{{ $winner->creation->image_url }}" class="img-responsive" style="width:100%">
                    <h3>Winnaar week {{ $winner->id}}</h3>
                    <strong>{{ $winner->creation->user->first_name . " " . $winner->creation->user->last_name . " met " . "'" . $winner->creation->description . "'"}}</strong>
                </div>
                @endforeach
            @else
            <div class="content">
                <h3 class="centertext">Er zijn (nog) geen winnaars.</h3> 
            </div>    
            @endif
        </div>
    </div>
</div>
@endsection
