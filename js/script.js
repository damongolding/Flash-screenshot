/* 	----script------ */


	var check = $(this).attr('checked');

	$(document).ready(function(){
		
	$(":checkbox").on("click", function(){
	
		var n = $("input:checked").length;
		var e = $(this).attr('checked');
		console.log(e);
		
		if(e === "checked"){
		$(this).parent().css("backgroundColor","#b5b5b5");
	}
	else{
		$(this).parent().css("backgroundColor","#f6f6f6");
	}
	
	  $(".number").text(n + " selected");
	  
	  if(n < 1){
		  $(".selected").animate({bottom:"-150px"},"slow");
	  }
	  else{
		  $(".selected").animate({bottom:"-30px"},"slow");		  
	  }

	})
/* clicked delete one button */		

	$(".delete").on("click",function(){
	
		var r=confirm("Are you sure you want to delete this file?");
		if (r==true)
		{
			var r = $(this).parent().parent();
			var w = r.find("span").text();
					
			$.ajax( "images/delete.php?delete=" + w )
			.done(function() {
					r.animate({opacity:"0"},"slow",function(){
						r.contents().remove();
 						r.animate({width:"0px",margin:"0",padding:"0"},"slow",function(){
 							r.remove();
 						});
					});
				});
  
		}
		else{}
			
	});
	
/* clicked delete all button */
	
	$(".deleteAll").on("click",function(){
		var r=confirm("Are you sure? this will delete ALL files?");
		if (r==true)
		{
		$.ajax("deleteAll.php")
			.done(function(){
				$("li").fadeOut("slow",function(){$(this).remove();})
		})
		}
		else{};
	});
	
/* 	clicked download all button */

	$(".downloadAll").on("click",function(){
		
		$.ajax({
		type: "POST",
		url: "downloadall.php",
		})
		
		.done(function(){
		
		alert("down")
		});
	});
	
/* 	If the image title is too long make the font smaller */
	var letters;
	
	$(".thumb_title").each(function(){
		
		letters = $(this).text();
		
		var len = letters.length;
		if(len >= 50){
			$(this).css("fontSize","13px");
		}
	
	});
	

/* 	wait till all Image are loaded then set the -margin top so they are verticaly aligned */

	$(document).waitForImages(function(){
		
		$(".v_image").each(function(){
		
		var thisHeight = - $(this).height() / 2 - 3 +'px';
	
		
		$(this).css("marginTop", thisHeight).css("opacity","1");
		
		
	});
	
});
		
		
	
/* 	fancybox */

$(".fancyboxthumb").fancybox({
		prevEffect	: 'fade',
		nextEffect	: 'fade',
		openEffect	: 'fade',
		closeEffect	: 'fade',
		helpers	: {
			title	: {
				type: 'outside'
			},
			buttons : {
				position :'bottom'
			}
		},
	});
	
/* waypoint for header */

	$(".way").waypoint(function(event, direction) {
	
		if (direction === 'down') {
			$("header").addClass("shadow");
			$(".title").animate({opacity:"0"},"fast");
			
			$("hr").animate({opacity:"0"},"fast");
			$(".downloadAll").animate({top:"8px"},"fast");
			$(".deleteAll").animate({top:"8px"},"fast");
			
			}
			else {
				$("header").removeClass("shadow");
				$(".title").animate({opacity:"1"},"fast");
			
				$("hr").animate({opacity:"1"},"slow");
				$(".downloadAll").animate({top:"20px"},"fast");
				$(".deleteAll").animate({top:"20px"},"fast");
			}
		});

	
	

/* 	$(document).ready end	 */
});


	
	


