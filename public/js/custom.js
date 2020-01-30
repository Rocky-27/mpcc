$('body').on('click', '[order-target]', function(){
	var target = $(this).attr('order-target');

	$('[order-id]').hide();
	$('[order-id='+target+']').fadeIn();
});