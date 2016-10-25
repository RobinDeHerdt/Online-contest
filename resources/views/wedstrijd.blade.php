@extends('layouts.app')

@section('title')
    Photoshop wedstrijd
@endsection

@section('content')
<div class="container col-md-10 col-md-offset-1">
    <div class="row">
        
        <div class="wedstrijd-content">
        <a href="/deelnemen">Deelnemen</a>
        <br>
        <a href="/winnaars">Bekijk hier de winnaars van vorige weken</a>
           <h1>Wedstrijdpagina</h1>

			@foreach ($creations as $creation)
				<h3>{{$creation->title}}</h3>
				<img src="{{$creation->image_url}}" alt="{{$creation->title}}">
			@endforeach

        </div>
    </div>
</div>
@endsection