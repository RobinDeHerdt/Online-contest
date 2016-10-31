(function() {
	var elem = document.querySelector('.grid');
	var msnry = new Masonry( elem, {
  	itemSelector: '.grid-item',
  	columnWidth: 200
	});
});

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