 $(document).ready(function() {
	$('#for_status, #for_priority, #for_category, #for_assignto, #for_reportby').dropdown({})
	
	

	
    $('#showSidebar').click(function(){
        $('.ui.sidebar').sidebar('toggle');
    });

    $('.ui.left.fixed.vertical.icon.menu a').popup({position:'right center'});

});