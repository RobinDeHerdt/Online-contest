@extends('layouts.app')

@section('title')
    Wedstrijd
@endsection

@section('content')
<link href="/css/lightbox.min.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.js"></script>
<script src="/js/lightbox.min.js"></script>
<script src="/js/main.js"></script>

<div class="container col-md-10 col-md-offset-1 padding-bottom">
    <div class="row">
        <div class="wedstrijd-content">
        @if(Session::has('status'))
        <div class="alert alert-success">
	            {{Session::get('status')}}	   
		</div>
		@endif
		@if(Session::has('failedstatus'))
        <div class="alert alert-danger">
	            {{Session::get('failedstatus')}}	   
		</div>
		@endif
            <div class="wedstrijden-header">
                <img src="img/pointing_hand_left.jpg">
                <span>Wedstrijdpagina</span>
                <img src="img/pointing_hand_right.jpg">
            </div>
			<div class="original">
	            <div class="original-container">
	            	<img src="{{ $contestimage->image_url }}" alt="">
	            </div>
	            <div class="original-uitleg">
                <h3>Werkwijze: </h3>
                <ol>
                	<li>
                		Download de originele foto hier: 
	                	<form action="/download" method="post">
	  						<input type="hidden" name="_token" value="{{ csrf_token() }}">
	  						<input type="hidden" value="/{{ $contestimage->image_url }}" name="file_url">
	  						<input type="submit" value="Download" id="btn-download">
	  					</form>
  					</li>
  					<li>Bewerk de foto op een creatieve manier. Je mag elementen van andere afbeeldingen gebruiken, zo lang een deel van de originele foto er maar in te vinden is.</li>
  					<li>Upload de foto door op de rode knop hieronder te klikken.</li>
                </ol>
                <br>
                <p>Let op! Je kan maar één keer deelnemen per week.</p>
                <a href="/deelnemen"><button type="button" class="btn-custom btn-custom-wedstrijd">Stuur hier jouw creatie in!</button></a>
                <p id="stemoproep">Of stem hieronder op je favoriete creaties!</p>
            	</div>
            </div>
           <div class="wedstrijden-header">
                <img src="img/pointing_hand_left.jpg">
                <span>Inzendingen</span>
                <img src="img/pointing_hand_right.jpg">
            </div>
			<div class="grid creation-container">
			@if(!$creations->isEmpty())
				@foreach ($creations as $creation)
						<div class="grid-item">
							<a href="{{$creation->image_url}}" data-lightbox="images" data-title="'{{$creation->description}}' door {{ $creation->user->first_name . ' ' . $creation->user->last_name}}"><img src="{{$creation->image_url}}" alt=""></a>
							<div class="votecontainer">
								<div class="votecount-container">
									<p class="votecount" id="votecount_id_{{$creation->id}}">{{ $creation->votes()->count()}}</p>
								</div>
								<img src="img/upvote-2.png" id="{{$creation->id}}" class="thumbsup">
							</div>
						</div>
				@endforeach
			@else
				<h3 class="centertext">Er zijn nog geen inzendingen</h3>
			@endif
			</div>
			{{ $creations->links() }}
        </div>
    </div>
</div>
@endsection