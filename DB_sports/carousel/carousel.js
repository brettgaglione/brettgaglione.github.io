// JavaScript Document

var startingItem = 1;

$(document).ready(function(){
	
	$('.carousel_data .carousel_item').each(function(){
		
		$('#carousel').append($(this).find('.image').html());
	});
	
	createCarousel();
	showCaption();
	
});

function createCarousel(){
	
	$('div#carousel').roundabout({
		
		childSelector: 'img',
		startingChild: window.startingItem,
		tilt: -4,
		minOpacity: .9,
		minScale: .5,
		duration: 1200,
		clickToFocus: true,
		clickToFocusCallback: showCaption
		
		});
		
		createCustomButtons();
		
	}
	
function createCustomButtons(){
	
	$('.nextItem').click(function() {
		hideCaption();
		$('div#carousel').roundabout('animateToNextChild', showCaption);
		
		});
		
	$('.prevItem').click(function() {
		hideCaption();
		$('div#carousel').roundabout('animateToPreviousChild', showCaption);
		
		});
		
	$('div#carousel img').click(function(){
		hideCaption();
		});
	}
	
function showCaption() {
	
	var childInFocus = $('div#carousel').data('roundabout').childInFocus;
	var setCaption = $('.carousel_data .carousel_item .caption:eq('+childInFocus+')').html();
	
	$('#captions').html(setCaption);
	
	var newHeight = $('#captions').height()+'px';
	$('.caption_container').animate({'height':newHeight}, 500, function(){
		
		$('#captions').animate({'opacity':1}, 250);	
		
		});
	}
	
function hideCaption() {

	$('#captions').animate({'opacity':0}, 250);	
}