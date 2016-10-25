@extends('layouts.app')

@section('title')
    Photoshop wedstrijd
@endsection

@section('content')
<div class="container col-md-10 col-md-offset-1">
    <div class="row">
        <div class="wedstrijd-content">
            <a href="/wedstrijd">Terug naar de wedstrijdpagina</a>
            <div class="wedstrijden-header">
                <img src="img/pointing_hand_left.jpg">
                <span>Winnaars</span>
                <img src="img/pointing_hand_right.jpg">
            </div>
                <div class="winnaar-container">
                    <div class="img-holder">
                        <h2>1. Lambo</h2>
                        <img src="img/contests/winner-4-week-1.jpg" class="img-responsive img-winners">
                        <!--  <p>Author name</p>
                        <p>Number of votes</p> -->
                    </div>
                    <div class="img-holder">
                        <h2>2. ESPN2</h2>
                        <img src="img/contests/winner-2-week-1.jpg" class="img-responsive img-winners">
                        <!--  <p>Author name</p>
                        <p>Number of votes</p> -->
                    </div>
                    <div class="img-holder">
                        <h2>3. Supersheep</h2>
                        <img src="img/contests/winner-3-week-1.jpg" class="img-responsive img-winners">
                       <!--  <p>Author name</p>
                        <p>Number of votes</p> -->
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection