$(document).ready(function() {
	$('#summernote').summernote({
		placeholder: 'Type Message Here..',
		tabsize: 2,
		height: 100
	});

	if(location.search.substr(1) != ""){
		var params = parseParams(location.search.substr(1));
		console.log(params.priority);
		$('#for_status').dropdown('set selected',params.status.split(","));
		$('#for_priority').dropdown('set selected',params.priority.split(","));
		$('#for_category').dropdown('set selected',params.category.split(","));
		$('#for_assignto').dropdown('set selected',params.assign_to.split(","));
		$('#for_reportby').dropdown('set selected',params.report_by.split(","));
		$('#for_paginate').dropdown({});
	}else{
		$('#for_status, #for_priority, #for_category, #for_assignto, #for_reportby, #for_paginate').dropdown({});
	}

	$("#reset").click(function(){
		$("#filterForm input").val(" ");
		$('#for_status, #for_priority, #for_category, #for_assignto, #for_reportby').dropdown('clear')
	});

	$('#toggleFilter').click(function(){
		$('#filterForm').transition('fade');
		set_filter_toggle_flag();
	});

	get_filter_toggle_flag();
    function get_filter_toggle_flag(){
    	let filter_flag = localStorage.getItem("my_filter_flag");
    	if(filter_flag == null){
    		set_filter_toggle_flag('off');
    	}else if(filter_flag == "off"){
			$('#filterForm').hide();
    	}
    }

    function set_filter_toggle_flag(flag = 'toggle'){
    	if(flag == "toggle"){
    		let filter_flag_new = (localStorage.getItem("my_filter_flag") == "on")?"off":"on";
    		localStorage.setItem("my_filter_flag",filter_flag_new);
    	}else{
			localStorage.setItem("my_filter_flag",flag);
    	}
    }

    $('#edit_form_segment').hide();
    $('#edit_form_toggle').click(function(){
		$('#edit_form_segment').transition('fade');
	});

});