$(document).ready(function(){
	$('#showPassword').click(function(){
		if ($('#password').attr('type') == 'password')
		{
			$('#password').attr('type', 'text');
			$('#text-info').html('Hide Password');
		} else {
			$('#password').attr('type', 'password');
			$('#text-info').html('Show Password');
		}

	});


	// $('#keyword').on('keyup', function(){
	// 	$.get('cari/?cari=' + $('#keyword').val(), function(data){
	// 		$('#result-search').html(data);
	// 	});
	// });

	$('.btn-show').hide();

	$('.btn-search').click(function(){
		$('.input-search').css({'transform' : 'scaleX(1)'});
		$(this).hide();
		$('.btn-show').show();
	});
	$('.btn-show').click(function(){
		$('.input-search').css({'transform' : 'scaleX(0)'});
		$(this).hide();
		$('.btn-search').show();

	});
});