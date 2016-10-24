@extends('layouts.app')

@section('title')
    Photoshop wedstrijd
@endsection

@section('content')
<div class="container col-md-10 col-md-offset-1">
    <div class="row">
        <div class="wedstrijd-content">
            <h1>Winnaars van vorige week</h1>
                <div class="img-holder">
                    <h2>Lambo</h2>
                    <img src="img/contests/winner-4-week-1.jpg" class="img-responsive img-winners">
                    <!--  <p>Author name</p>
                    <p>Number of votes</p> -->
                </div>
                <div class="img-holder">
                    <h2>ESPN2</h2>
                    <img src="img/contests/winner-2-week-1.jpg" class="img-responsive img-winners">
                    <!--  <p>Author name</p>
                    <p>Number of votes</p> -->
                </div>
                <div class="img-holder">
                    <h2>Supersheep</h2>
                    <img src="img/contests/winner-3-week-1.jpg" class="img-responsive img-winners">
                   <!--  <p>Author name</p>
                    <p>Number of votes</p> -->
                </div>
        </div>
    </div>
</div>
@endsection