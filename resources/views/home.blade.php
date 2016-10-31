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
            <div class="wedstrijden-header">
                <img src="img/pointing_hand_left.jpg">
                <span>Winnaars</span>
                <img src="img/pointing_hand_right.jpg">
            </div>
            <div class="content">
                <img src="img/contests/winner-2-week-1.png" class="img-responsive" style="width:100%">
                <h3>Winnaar week {1}</h3>
                <p>is {voornaam - achternaam}</p>
            </div>
        </div>
    </div>
</div>
@endsection
