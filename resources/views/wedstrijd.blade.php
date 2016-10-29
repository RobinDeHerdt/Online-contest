@extends('layouts.app')

@section('title')
    Photoshop wedstrijd
@endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.js"></script>
<script>
	(function() {
		var elem = document.querySelector('.grid');
		var msnry = new Masonry( elem, {
	  	itemSelector: '.grid-item',
	  	columnWidth: 200
		});
	});
</script>
<script>
	$(document).ready(function() {

		$.ajax({
			type: "GET",
	    	url: "/getuservotes",
	    	success: function(data){
	    		if(data.status == "nologin")
	    		{
	    			console.log("not logged in");
	    		}
	    		else 
	    		{
	    			for (var i = 0; i < data.length; i++)
		    		{
		    			$("#" + data[i].creation_id).attr("src","img/upvote-3.png");
		    		}
	    		}
	    	}
		});

    	$( ".thumbsup" ).click(function(event) {
    		var id = event.target.id;
  			$.ajax({
  				type: "POST",
		    	url: "/wedstrijd",
		    	data: {
		    		creation_id : id
		    	},
		    	success: function(data){
					if(data.status == "success")
		      		{
		      			var count = $("#votecount_id_" + id).text();
		      			count++;
		      			$("#votecount_id_" + id).text(count);
		      			$("#" + id).attr("src","img/upvote-3.png");
		      		}
		      		else if (data.status == "failed_nologin")
		      		{
		      			window.location = "http://server.local/login"
		      		}
		    	}
			});
		});
	});
</script>
<div class="container col-md-10 col-md-offset-1">
    <div class="row">
        <div class="wedstrijd-content">
        @if(Session::has('status'))
        <div class="alert alert-success">
	            {{Session::get('status')}}	   
		</div>
		@endif

	        
            <div class="wedstrijden-header">
                <img src="img/pointing_hand_left.jpg">
                <span>Wedstrijdpagina</span>
                <img src="img/pointing_hand_right.jpg">
            </div>
			<div class="original">
	            <div class="original-container">
	            <!-- HARD CODED, VERGEET NIET TE VERANDEREN -->
	            	<img src="img/contests/week-1.jpg" alt="">
	            </div>
	            <div class="original-uitleg">
            		<p>Bewerk de foto hiernaast op een creatieve manier. Je mag elementen van andere afbeeldingen gebruiken, zo lang de originele foto er maar in te vinden is.</p>
                <p>De creatie met het meeste stemmen van de humo-lezers wint een jaarabonnement op Humo!</p>
  				<form action="/download" method="post">
  					<input type="hidden" name="_token" value="{{ csrf_token() }}">
  					<input type="hidden" value="/img/contests/week-1.jpg" name="file_url">
  					<input type="submit" value="Download foto">
  				</form>
                <p>Inspiratie nodig? <a href="/winnaars">Bekijk hier de winnaars van vorige weken.</a></p>
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
							<img src="{{$creation->image_url}}" alt="{{$creation->description}}">
							<div class="votecontainer">
								
								<div class="votecount-container">
									<p class="votecount" id="votecount_id_{{$creation->id}}">{{ $creation->votes()->count()}}</p>
								</div>
								<img src="img/upvote-2.png" id="{{$creation->id}}" class="thumbsup">
							</div>
						</div>
				@endforeach
			@else
				<h3>Er zijn nog geen inzendingen.</h3>
			@endif
			</div>
        </div>
    </div>
</div>
@endsection