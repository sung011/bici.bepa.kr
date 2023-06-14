$(function () {


	var local_menu = jQuery(location).attr('pathname'); 
	var lo_menu_array = local_menu.split('/');
	//alert(lo_menu_array[1]);	
	// 상단 헤더 변경
	$('.main_nav li').removeClass('active');
	$('#header_'+lo_menu_array[1]).addClass('active');
	//사이드 메뉴 변경
	$('.has-sub ul li a[href="' + local_menu + '"]').addClass('liactive');
	var element = $('.has-sub ul li a[href="' + local_menu + '"]').parent().parent().parent('li');
	//var element = $("#company_menu05").parent('li');
	element.addClass('open');
	element.children('ul').slideDown();
	element.siblings('li').children('ul').slideUp();
	element.siblings('li').removeClass('open');
	element.siblings('li').find('li').removeClass('open');
	element.siblings('li').find('ul').slideUp();

});

$( document ).ready(function() {

	$('#cssmenu li.has-sub>a').on('click', function(){
			$(this).removeAttr('href');
			var element = $(this).parent('li');
			if (element.hasClass('open')) {
				element.removeClass('open');
				element.find('li').removeClass('open');
				element.find('ul').slideUp();
			}
			else {
				element.addClass('open');
				element.children('ul').slideDown();
				element.siblings('li').children('ul').slideUp();
				element.siblings('li').removeClass('open');
				element.siblings('li').find('li').removeClass('open');
				element.siblings('li').find('ul').slideUp();
			}
		});

	$('#cssmenu>ul>li.active').append('<span class="holder"></span>');

	$('#cssmenu li.active>span.holder').on('click', function(){
			$(this).removeAttr('href');
			var element = $(this).parent('li');
			if (element.hasClass('open')) {
				element.removeClass('open');
				element.siblings('li').children('ul').slideDown();
			}
			else {
				element.addClass('open');
				element.siblings('li').children('ul').slideUp();		
			}
	});

	$('.menu_mm1>a').on('click', function(){
			$(this).removeAttr('href');		
			var element = $(this).parent('li');
			if (element.hasClass('sideopen')) {
				element.removeClass('sideopen');

				if(element.find('i.first').hasClass('fa-minus-circle')){

					element.find('i.first').removeClass('fa-minus-circle');
					element.find('i.first').addClass('fa-plus-circle');	
				}
				
				element.find('li').removeClass('sideopen');
				element.find('ul').slideUp();
			}
			else {
				element.addClass('sideopen');
				if(element.siblings('li').find('i.first').hasClass('fa-minus-circle')){
					element.siblings('li').find('i.first').removeClass('fa-minus-circle');
					element.siblings('li').find('i.first').addClass('fa-plus-circle');	
				}
				if(element.find('i').hasClass('fa-plus-circle')){
				
					element.find('i.first').removeClass('fa-plus-circle');
					element.find('i.first').addClass('fa-minus-circle');
				}
				
				
				element.children('ul').slideDown();
				element.siblings('li').children('ul').slideUp();
				element.siblings('li').removeClass('sideopen');
				element.siblings('li').find('li').removeClass('sideopen');
				element.siblings('li').find('ul').slideUp();
			}
		
	});

	//(function getColor() {
	//	var r, g, b;
	//	var textColor = $('#cssmenu').css('color');
	//	textColor = textColor.slice(4);
	//	r = textColor.slice(0, textColor.indexOf(','));
	//	textColor = textColor.slice(textColor.indexOf(' ') + 1);
	//	g = textColor.slice(0, textColor.indexOf(','));
	//	textColor = textColor.slice(textColor.indexOf(' ') + 1);
	//	b = textColor.slice(0, textColor.indexOf(')'));
	//	var l = rgbToHsl(r, g, b);
	//	if (l > 0.7) {
	//		$('#cssmenu>ul>li>a').css('text-shadow', '0 1px 1px rgba(0, 0, 0, .35)');
	//		$('#cssmenu>ul>li>a>span').css('border-color', 'rgba(0, 0, 0, .35)');
	//	}
	//	else
	//	{
	//		$('#cssmenu>ul>li>a').css('text-shadow', '0 1px 0 rgba(255, 255, 255, .35)');
	//		$('#cssmenu>ul>li>a>span').css('border-color', 'rgba(255, 255, 255, .35)');
	//	}
	//})
	//();

	function rgbToHsl(r, g, b) {
	    r /= 255, g /= 255, b /= 255;
	    var max = Math.max(r, g, b), min = Math.min(r, g, b);
	    var h, s, l = (max + min) / 2;

	    if(max == min){
	        h = s = 0;
	    }
	    else {
	        var d = max - min;
	        s = l > 0.5 ? d / (2 - max - min) : d / (max + min);
	        switch(max){
	            case r: h = (g - b) / d + (g < b ? 6 : 0); break;
	            case g: h = (b - r) / d + 2; break;
	            case b: h = (r - g) / d + 4; break;
	        }
	        h /= 6;
	    }
	    return l;
	}
});