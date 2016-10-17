@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Photoshop contest</div>

                <div class="panel-body">
                    <p>Welcome to photoshopbattles!</p>
 
                    <p>The goal: photoshop given picture in the most creative way possible. You can add elements of other pictures, just make sure the original picture is in there somewhere.</p>

                    <p>The 3 creations with the most votes from the community will win 1 year of creative cloud membership!</p>

                    <span>Contest ends: </span> 
                    <br>
                    <br>
                    <a href="/photoshopbattle"><button type="button" class="btn btn-primary">Participate now!</button></a>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Last photoshopbattles' winners:</div>

                <div class="panel-body">
                    <p>The competition has just started! No winners yet.</p>
                    <span>3 images here</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
