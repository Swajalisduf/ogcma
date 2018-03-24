$(document).ready(function(){
	$('#disc_change').click(function(){
		$('#pop_topics').toggle( {
			direction: 'left'
		});

		$('#comments').toggle( {
			direction: 'left'
		});
	});
	
	$('#back').click(function(){
		$('#pop_topics').toggle( {
			direction: 'right'
		});

		$('#comments').toggle( {
			direction: 'right'
		});
	});
});