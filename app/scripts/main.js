$(document).ready(function() {
	var script_path = 'scripts/';
	$('[data-main]').each(function(index,item){
		require(script_path+$(item).data('main'));
	})
})