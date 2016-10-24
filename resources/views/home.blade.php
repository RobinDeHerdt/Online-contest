@extends('layouts.app')

@section('title')
    Wedstrijden
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
                <img src="img/bg.jpg" alt="" class="img-responsive">
                <h3>Win een jaarabonnement op humo!</h3>   
                <p>Bewerk de gegeven foto op een creatieve manier. Je mag elementen van andere afbeeldingen gebruiken, zo lang de originele foto er maar in te vinden is.</p>
                <p>De creatie met het meeste stemmen van de humo-lezers wint een jaarabonnement op Humo!</p>
                <br>
                <span>Deze wedstrijd loopt af op: 11/11/2016</span> 
                <br>
                <br>
                <a href="/wedstrijd"><button type="button" class="btn-custom">Doe mee</button></a>
            </div>
        </div>
    </div>
</div>
@endsection
