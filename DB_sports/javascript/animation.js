// JavaScript Document
$(document).ready(function(e) {
	
	$('.icon').mouseenter(function(e) {
			$('.icon').animate({opacity:"1"}, 100);			
			$('.iconText').html('Logout');
        });
		$('.icon').mouseleave(function(e) {
			$('.icon').animate({opacity:".6"}, 500);
			$('.iconText').html('');
		});
		
	$('.icon2').mouseenter(function(e) {
			$('.icon2').animate({opacity:"1"}, 100);			
			$('.iconText').html('Edit Account');
        });
		$('.icon2').mouseleave(function(e) {
			$('.icon2').animate({opacity:".6"}, 500);
			$('.iconText').html('');
		});
		
	$('.icon3').mouseenter(function(e) {
			$('.icon3').animate({opacity:"1"}, 100);			
			$('.iconText').html('Shopping Cart');
        });
		$('.icon3').mouseleave(function(e) {
			$('.icon3').animate({opacity:".6"}, 500);
			$('.iconText').html('');
		});
		
	$('.icon4').mouseenter(function(e) {
			$('.icon4').animate({opacity:"1"}, 100);			
			$('.iconText').html('Home');
        });
		$('.icon4').mouseleave(function(e) {
			$('.icon4').animate({opacity:".6"}, 500);
			$('.iconText').html('');
		});
		
	$('.search').mouseenter(function(e) {
			$('.search').animate({opacity:"1"}, 100);			
		
        });
		$('.search').mouseleave(function(e) {
			$('.search').animate({opacity:".6"}, 500);
		
		});
		
	//----------------------------
	
		
});