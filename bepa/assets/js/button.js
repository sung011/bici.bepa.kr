// button.css
$(function(){
	var burger = $('.menu-trigger');
	
	burger.each(function(index){
		var $this = $(this);
		
		$this.on('click', function(){
			e.preventDefault();
			$(this).toggleClass('active-' + (index+1));
		})
	});
	
	$('#line-wrapper').click(function(){
	  $('#line-top').toggleClass('line-top');
	  $('#line-mid').toggleClass('line-mid');
	  $('#line-bot').toggleClass('line-bot');
	});
});