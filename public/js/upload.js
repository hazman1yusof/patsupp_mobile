$(document).ready(function () {

    function formatDate_mom(date,format,returnformat = 'DD-MM-YYYY'){
        let mom = moment(date, format);
        return mom.format(returnformat);
    }

    var DataTable_preview = $('#tablePreview').DataTable({
    
        responsive: true,
        scrollY: 450,
        paging: false,
        order: [[ 0, "desc" ]],
        columns: [
            { data: 'auditno', width: "5%"},
            { data: 'trxdate', width: "10%"},
            { data: 'filename', width: "15%"},
            { data: 'preview', width: "35%"},
            { data: 'mrn' , width: "5%"},
            { data: 'adduser', width: "10%"},
            { data: 'adddate', width: "10%"},
            { data: 'download', width: "10%"},
            { data: 'type', visible: false},
        ],
        drawCallback: function( settings ) {
        },
        initComplete: function( settings, json ) {
        }

    });

    preview_load_data();

    function preview_load_data(){
        DataTable_preview.clear().draw();
        let mrn = $("#mrn").val();

        var urlParam={
            action:'preview value',
            url:'preview/data',
            mrn:parseInt(mrn)
        }

        $.get( urlParam.url+"?"+$.param(urlParam), function( data ) {
                    
        },'json').done(function(data) {
            if(!$.isEmptyObject(data.rows)){
                data.rows.forEach(function(obj,i){
                    obj.auditno = obj.auditno; 
                    obj.trxdate = formatDate_mom(obj.trxdate,'YYYY-MM-DD HH:mm:ss');
                    obj.filename = obj.resulttext;
                    obj.preview = make_preview_image(i,obj.attachmentfile,obj.type);
                    obj.mrn = obj.mrn;
                    obj.type = obj.type;
                    obj.adduser = obj.adduser;
                    obj.adddate = formatDate_mom(obj.adddate,'YYYY-MM-DD HH:mm:ss');
                    obj.download = make_download_butt(i,obj.attachmentfile,obj.type,obj.resulttext);
                });

                DataTable_preview.rows.add(data.rows).draw();
                DataTable_preview.columns.adjust().draw();
            }
        });
    }

    function make_preview_image(i,filepath,type){
        let app_url = $('#app_url').val();
        let filetype = type.split('/')[0];
        let fileextension = type.split('/')[1];
        let return_value='';

        if(filetype=='image'){
            return_value = `
                <div class="imgcontainer">
                    <img src="`+app_url+`thumbnail/`+filepath+`" >
                      <a class="small circular orange ui icon button btn" target="_blank" href="`+app_url+`uploads/`+filepath+`">
                          <i class='search icon' ></i>
                      </a>
                </div>`;

        }else if(filetype=='application'){
            switch(fileextension){
                case 'pdf': return_value =  `
                                    <div class="imgcontainer">
                                        <img src="`+app_url+`thumbnail/application/pdf">
                                          <a class="small circular orange ui icon button btn" target="_blank" href="`+app_url+`uploads/`+filepath+`" >
                                              <i class='search icon' ></i>
                                          </a>
                                    </div>`; 

                            break;

                default: return_value = app_url+'thumbnail/application/pdf';

            }

        }else if(filetype=='video'){
            return_value = app_url+'thumbnail/video';

        }else{
            return_value = 'download';

        }

        return return_value;

    }

    function make_download_butt(i,filepath,type,filename){
        let filetype = type.split('/')[0];
        let fileextension = type.split('/')[1];

        return `<a class='small circular orange basic ui icon button' href="/download/`+filepath+`?filename=`+filename+`" data-index="`+i+`"><i class="download icon"></i></a>`
        
    }

    $("#click").on("click",function(){
        $("#file").click();
    });

    $('#file').on("change", function(){
        let filename = $(this).val();

        $("#cancel").show();
        $("#submit").show();
        $("#label").text(filename);
    });

    $("#cancel").on("click", function(){
        $("#cancel").hide();
        $("#submit").hide();

        $("#label").text("");
        $("#formdata").trigger('reset');
    });

    $('#biodob').text(formatDate_mom($('#biodob').text(),'YYYY-MM-DD'));

    $('#bio_reg_date').text(formatDate_mom($('#bio_reg_date').text(),'YYYY-MM-DD'));

    $("#bioage").html(getAge($('#biodob').text()));

    function getAge(dateString) {
        var datedob = moment(dateString,"DD-MM-YYYY");
        var today = moment();
        var age = today.diff(datedob, 'years');
        return age;
    }

});
