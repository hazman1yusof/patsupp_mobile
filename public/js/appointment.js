$(document).ready(function() {

	var d = new Date();
	var oper = 'add';

	var event_apptbook = {
		id: 'apptbook',
		url: "appointment/getEvent",
		type: 'GET',
		data: {
			type: 'apptbook',
			drrsc: $("input[name='resourcecode']").val()
		}
	}

	var event_appt_leave = {
		id: 'appt_leave',
		url: "appointment/getEvent",
		type: 'GET',
		data: {
			type: 'appt_leave',
			drrsc: $("input[name='resourcecode']").val()
		},
		color: $('#ALCOLOR').val(),
    	rendering: 'background'
	}

	$('#calendar').fullCalendar( 'removeEventSource', 'apptbook');
	$('#calendar').fullCalendar( 'removeEventSource', 'appt_leave');
	$('#calendar').fullCalendar( 'addEventSource', event_apptbook);
	$('#calendar').fullCalendar( 'addEventSource', event_appt_leave);

	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today myCustomButton',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		customButtons: {
	        myCustomButton: {
	            text: 'Make Appointment',
	            click: function() {
	            	oper='add';

            	}
        	}
    	},
		defaultDate: d,
		navLinks: false,
  		viewRender: function(view, element) {
  			let start = view.start;
  			if(view.name == 'agendaDay'){
  				$(".fc-myCustomButton-button").data( "start", start );
  				var events = $('#calendar').fullCalendar('clientEvents');
				$(".fc-myCustomButton-button").show();
				events.forEach(function(elem,id){
					if(elem.allDay){
						let elem_end = (elem.end==null)?elem.start:elem.end;
						if(start.isBetween(elem.start,elem_end, null, '[)')){
							$(".fc-myCustomButton-button").hide();
						}
					}
				});
				if(!start.isSameOrAfter(moment().subtract(1, 'days'))){
					$(".fc-myCustomButton-button").hide();
				}
  			}
  		},
		editable: true,
		eventLimit: true, // allow "more" link when too many events
		selectable: true,
		selectHelper: true,
		timezone: 'local',
		select: function(start, end, jsEvent, view, resource) {
			alert('asd')
			$('#calendar').fullCalendar( 'gotoDate', start )
			$(".fc-myCustomButton-button").data( "start", start );
			var events = $('#calendar').fullCalendar( 'clientEvents');
			$(".fc-myCustomButton-button").show();
			events.forEach(function(elem,id){
				if(elem.allDay){
					let elem_end = (elem.end==null)?elem.start:elem.end;
					if(start.isBetween(elem.start,elem_end, null, '[)')){
						$(".fc-myCustomButton-button").hide();
					}
				}
			});
			if(!start.isSameOrAfter(moment().subtract(1, 'days'))){
				$(".fc-myCustomButton-button").hide();
			}

		},
		eventRender: function(event, element) {
			if(event.source.id == "apptbook"){
				element.bind('dblclick', function() {
					oper = 'edit';
					$('#doctor').val(event.loccode);
					$('#mrn').val(event.mrn);
					$('#patname').val(event.pat_name);
					$('#apptdatefr_day').val(event.start.format('YYYY-MM-DD'));
					$('#start_time').val(event.start.format('HH:mm:ss'));
					$('#end_time').val(event.end.format('HH:mm:ss'));
					$('#telno').val(event.telno);
					$('#telhp').val(event.telhp);
					$('#case').val(event.case_code);
					$('#remarks').val(event.remarks);
					$('#status').val(event.apptstatus);
					$('#idno').val(event.idno);
					$('#lastuser').val(event.lastuser);
					$('#lastupdate').val(event.lastupdate);

					$('#delete_but').show();

					$("#dialogForm").dialog('open');
				});

				element.on('click', function() {
					$('td.fc-event-container a').removeClass('selected');
					$(this).addClass('selected');

					if(event.mrn == null){
						$('#biodata_but_apptrsc').data('oper','add');
					}else{
						$('#biodata_but_apptrsc').data('oper','edit');
					}

					// $('#biodata_but_apptrsc').data('bio_from_calander',event);
					// $('#episode_but_apptrsc').data('bio_from_calander',event);

				});
			}
			if(event.source.rendering == 'background'){
				element.append(event.title);
			}
		},
		timeFormat: 'h(:mm)a',
		eventDrop: function(event, delta, revertFunc) {
			var param={
				'event_drop':'event_drop',
				'idno':event.idno,
				'start':event.start.format("YYYY-MM-DD HH:mm:SS"),
				'end':event.start.clone().add(session_field.interval, 'minutes').format("YYYY-MM-DD HH:mm:SS"),
				'_token': $('#csrf_token').val()
			};

			$.post("apptrsc/editEvent",param, function (data) {

			}).fail(function (data) {
				//////////////////errorText(dialog,data.responseText);
			}).done(function (data) {
				
			});
		},
		eventResize: function(event,dayDelta,minuteDelta,revertFunc) {
			var param={
				'event_drop':'event_drop',
				'idno':event.idno,
				'start':event.start.format("YYYY-MM-DD HH:mm:SS"),
				'end':event.start.clone().add(session_field.interval, 'minutes').format("YYYY-MM-DD HH:mm:SS"),
				'_token': $('#csrf_token').val()
			};

			$.post("apptrsc/editEvent",param, function (data) {

			}).fail(function (data) {
				//////////////////errorText(dialog,data.responseText);
			}).done(function (data) {
				
			});
		},
		displayEventTime:true,
		selectConstraint : "businessHours",
		eventSources: [
			{	
				id:'apptbook'
			},
			{	
				id:'appt_ph',
				url:'appointment/getEvent',
				type:'GET',
				data:{
					type:'appt_ph'
				}, 
            	textColor: 'black',
            	rendering: 'background'
			},
			{	
				id:'appt_leave'
			}
	    ]
	});

});