
$(window).scroll(function(){

	var wScroll =$(this).scrollTop(); // thi will find the position of scroll
	// console.log(wScroll);
	$('.map').css({
		'transform' : 'translate(0px, '+wScroll/5 +'%)'
	 });
	$('.flag').css({
		'transform' : 'translate(0px, '+wScroll/5 +'%)'
	 });
	$('.chandra').css({
		'transform' : 'translate(0px, '+wScroll/10 +'%)'
	});
	$('.surya').css({
		'transform' : 'translate(0px, '+wScroll/10 +'%)'
	});
});
	

	$('.top-heading-back').mouseenter(function(){
		$('.top-heading').addClass('top-heading-hover');
		$('.top-para').addClass('top-para-hover');
	});
	$('.top-heading-back').mouseleave(function(){
		$('.top-heading').removeClass('top-heading-hover');
		$('.top-para').removeClass('top-para-hover');
	});





	$('.info-round-1').mouseenter(function(){
		$('.info-round-1').addClass('info-round-shadow');
		$('.info-icon-1').addClass('info-icon-hover');
		$('.info-heading-1').addClass('info-heading-hover');

	});
	$('.info-round-1').mouseleave(function(){
		$('.info-round-1').removeClass('info-round-shadow');
		$('.info-icon-1').removeClass('info-icon-hover');
		$('.info-heading-1').removeClass('.info-heading-hover');
		$('.info-heading-1').removeClass('info-heading-hover');
	});
	$('.info-round-2').mouseenter(function(){
		$('.info-round-2').addClass('info-round-shadow');
		$('.info-icon-2').addClass('info-icon-hover');
		$('.info-heading-2').addClass('info-heading-hover');

	});
	$('.info-round-2').mouseleave(function(){
		$('.info-round-2').removeClass('info-round-shadow');
		$('.info-icon-2').removeClass('info-icon-hover');
		$('.info-heading-2').removeClass('.info-heading-hover');
		$('.info-heading-2').removeClass('info-heading-hover');
	});
	$('.info-round-3').mouseenter(function(){
		$('.info-round-3').addClass('info-round-shadow');
		$('.info-icon-3').addClass('info-icon-hover');
		$('.info-heading-3').addClass('info-heading-hover');

	});
	$('.info-round-3').mouseleave(function(){
		$('.info-round-3').removeClass('info-round-shadow');
		$('.info-icon-3').removeClass('info-icon-hover');
		$('.info-heading-3').removeClass('.info-heading-hover');
		$('.info-heading-3').removeClass('info-heading-hover');
	});
	$('.info-round-4').mouseenter(function(){
		$('.info-round-4').addClass('info-round-shadow');
		$('.info-icon-4').addClass('info-icon-hover');
		$('.info-heading-4').addClass('info-heading-hover');

	});
	$('.info-round-4').mouseleave(function(){
		$('.info-round-4').removeClass('info-round-shadow');
		$('.info-icon-4').removeClass('info-icon-hover');
		$('.info-heading-4').removeClass('.info-heading-hover');
		$('.info-heading-4').removeClass('info-heading-hover');
	});

	$('.info-total h3').mouseenter(function(){
		$('.info-total').addClass('info-total-hover h3');


	});
	$('.info-total h3').mouseleave(function(){
		$('.info-total').removeClass('info-total-hover h3');
		
	});
	$('.total-count').mouseenter(function(){
		$('.total-count').addClass('info-total-hover h4');
		

	});
	$('.total-count').mouseleave(function(){
		$('.total-count').removeClass('info-total-hover h4');
		
	});
$(window).ready(function(){
	$('.topic-info').hide();
	$('.topic-back').click(function(){
		$('.topic-info').hide(200);
		$('.topic-info',this).toggle(200);

	});
});




// this is of list page

$(window).ready(function(){
	$('.sub').hide();
	$('.db-list-links').hide();
	$('.show').show();
	$('.link-list-head').click(function(){
		$('.db-list-links').hide(200);
		$('.add').show();
		$('.sub').hide();
		$('.sub',this).show();
		$('.add',this).hide();
		$('.db-list-links',this).toggle(200);
	});
});

