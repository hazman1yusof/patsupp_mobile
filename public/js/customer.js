$(document).ready(function() {

    var table = $('#example').DataTable({
        "columns": [
            { "name": "id" },
            { "name": "username" },
            { "name": "contact" },
            { "name": "status" },
            { "name": "type" },
            { "name": "email" },
            { "name": "agent_id", "visible": false },
            { "name": "company" },
            { "name": "address", "visible": false },
            { "name": "postcode", "visible": false },
            { "name": "city", "visible": false },
            { "name": "province", "visible": false },
            { "name": "mobile_nm", "visible": false },
            { "name": "note", "visible": false }
        ],
    	"select": 'single', 
        "order": [[ 0, 'desc' ]],
    	"createdRow": function( row, data, dataIndex){
            if( data[2] ==  'Inactive'){
                $(row).addClass('negative');
            }
        },
        "initComplete": function(settings, json) {
            $('body').show();
        } 
    });

    table.on( 'select', function ( e, dt, type, indexes ) {
	    if ( type === 'row' ) {
	        var data = table.rows( indexes ).data()
	        var status = data[0][2];
	        if(status == 'Inactive'){
	        	$('#delete').text("Activate");
	        }else{
	        	$('#delete').text("Deactivate");
	        }
	    }
	});

    $('#cb_password').checkbox({
        onChecked: function() {
            $("#form_edit input[name='password']").prop( "disabled", false );
        },
        onUnchecked: function() {
            $("#form_edit input[name='password']").val( "" );
            $("#form_edit input[name='password']").prop( "disabled", true );
        }
    });

    $('.ui.modal').modal();

    $('#add').click(function(){
    	$('#add_modal').modal('setting', 'closable', false).modal('show');
    });

    $('#edit').click(function(){
        if(table.rows( '.selected' ).any()){

            $('#edit_modal').modal('setting', 'closable', false).modal('show');
            let tabledata = table.rows( { selected: true } ).data()[0];

            $("#form_edit input[name='username']").val(tabledata[1]);
            $("#form_edit input[name='contact']").val(tabledata[2]);
            $("#form_edit input[name='email']").val(tabledata[5]);
            $('#for_agent_id').dropdown('set selected', tabledata[6])
            $("#form_edit input[name='company']").val(tabledata[7]);
            $("#form_edit textarea[name='address']").val(tabledata[8]);
            $("#form_edit input[name='postcode']").val(tabledata[9]);
            $("#form_edit input[name='city']").val(tabledata[10]);
            $("#form_edit select[name='province']").dropdown('set selected', tabledata[11])
            $("#form_edit input[name='mobile_nm']").val(tabledata[12]);
            $("#form_edit textarea[name='note']").val(tabledata[13]);

            $("#form_edit").attr('action',"/customer/"+tabledata[0]);

        }else{
            alert('please select row');
        }
    });

    $('#delete').click(function(){

    	if(table.rows( '.selected' ).any()){
	    	let tabledata = table.rows( { selected: true } ).data()[0];
	    	$("#form_delete").attr('action',"/customer/"+tabledata[0]);
	    	$("#form_delete").submit();

    	}else{
    		alert('please select row');
    	}
    });

	$('#form').form({
      fields: {
        username: {
            identifier : 'username',
            rules: [{type   : 'minLength[5]'}]
        },
        password: {
            identifier : 'password',
            rules: [{type   : 'minLength[5]'}]
        },
        email: {
            identifier : 'email',
            rules: [{type   : 'email'}]
        },
        agent_id: {
            identifier : 'agent_id',
            rules: [{type   : 'empty'}]
        },
        postcode: {
            identifier : 'postcode',
            optional: true,
            rules: [{type   : 'integer'}]
        },
        mobile_nm: {
            identifier : 'mobile_nm',
            optional: true,
            rules: [{type   : 'integer'}]
        },
        agent_id: {
            identifier : 'agent_id',
            rules: [{type   : 'empty'}]
        }
      }
    });

    $('#form_edit').form({
      fields: {
        username   : ['minLength[5]', 'empty'],
        email   : ['email', 'empty']
      }
    });

    $("input[name='password']").popup();

    $("#form input[name='username']").blur(function(){
    	$("input[name='password']").val($(this).val());
    });
} );