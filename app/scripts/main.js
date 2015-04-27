$(document).ready(function() {
	$('[data-main]').each(function(index,item){
		require($(item).data('main'));
	})
})