(function() {
	var elem = document.querySelector('.grid');
	var msnry = new Masonry( elem, {
  	itemSelector: '.grid-item',
  	columnWidth: 200
	});
});

$(document).ready(function() {
		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

		$.ajax({
			type: "GET",
	    	url: "/api/getuservotes",
	    	success: function(data){
	    		if(data.status != "nologin")
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
		      			var count = data.votecount;
		      			$("#votecount_id_" + id).text(count);
		      			$("#" + id).attr("src","img/upvote-3.png");
		      		}
		      		else if (data.status == "failed_nologin")
		      		{
		      			window.location = "/login"
		      		}
		    	}
			});
		});
	});