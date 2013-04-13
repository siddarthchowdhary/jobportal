$(document).ready(function(){				
		$.ajax({								// function to load ads
	   			 type : "POST",
	    		 url  : 'indexMain.php?controller=HomePageAds&function=showAds',

	    		success : function(response)
	    		{
	    	
	        	$('.fadein_admin ').append(response);
	        
	    		}
			});
			
			
		$.ajax({								// function to load tip of the day
	   			 type : "POST",
	    		 url  : 'indexMain.php?controller=HomePageAds&function=showTipOfDay',

	    		success : function(response)
	    		{
	    	
	        	$('.tipofday').html(response);
	        
	    		}
			});
	});
	
