$(document).ready(function(){
    $(".kuda_zebra>tbody>tr:odd").addClass("zebra");
    
    $( ".dtp" ).datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'dd-mm-yy'
    });
    
    var dates = $( "#range_tgl_1, #range_tgl_2" ).datepicker({
        defaultDate: "+1w",
        //numberOfMonths: 3,
        changeMonth: true,
        changeYear: true,
        //showButtonPanel: true,
        dateFormat: 'dd-mm-yy',
        onSelect: function( selectedDate ) {
            var option = this.id == "range_tgl_1" ? "minDate" : "maxDate",
                instance = $( this ).data( "datepicker" ),
                date = $.datepicker.parseDate(
                    instance.settings.dateFormat ||
                    $.datepicker._defaults.dateFormat,
                    selectedDate, instance.settings );
            dates.not( this ).datepicker( "option", option, date );
        }
    });
});

$(function() 
{        
	$('#input_form').submit(function()
    {
        $('#submit').val('Saving..');
        $('#submit').attr('disabled','disabled');
        $.ajax({
            url:$(this).attr('action'),
            type: 'POST',
            data:$(this).serialize(),
            success:function(data)
            {
                //$(location).attr('href',data);
                window.location.href = data;
                window.location.reload();
            }
        });
        return false;
    }); 
	
	$('#input_form_noreload').submit(function()
    {
        $('#submit').val('Saving..');
        $('#submit').attr('disabled','disabled');
        $.ajax({
            url:$(this).attr('action'),
            type: 'POST',
            data:$(this).serialize(),
            success:function(data)
            {
                //$(location).attr('href',data);
                window.location.href = data;
                //window.location.reload();
            }
        });
        return false;
    }); 
    
	$('#no_ajax').submit(function()
    {
        $('#submit').val('Saving..');
        $('#submit').attr('disabled','disabled');
    }); 
    
	$('#ajax_form').submit(function()
    {
        $('#submit').val('Saving..');
        $('#submit').attr('disabled','disabled');
        
        $.ajax({
            url:$(this).attr('action'),
            type: 'POST',
            data:$(this).serialize(),
            success:function(data){
                res_data = data.split("-");
                $( "#dialog:ui-dialog" ).dialog( "destroy" );
                $('.ui-dialog-title').html(res_data[1]);
                $('#dialog-message').removeAttr('title');
                $('#dialog-message').attr('title',res_data[1]);
                $('#dialog-message').html(res_data[2]);
                
                $( "#dialog-message" ).dialog({
                    modal: true,
                    buttons: {
                        Ok: function() {
                            $( this ).dialog( "close" );
                        }
                    }
                });
                $('#submit').val('Save');
                $('#submit').removeAttr("disabled");
            }
        });
        return false;
    });
    
    $('.adaupload').submit(function()
    {
        var pail=new Array();
        
        $('.qq-upload-success > .qq-upload-file').each(function(index) {
            pail[index]=$(this).html();
        });
        $('.qq-upload-success > .filecek').each(function(index) {
            $(this).val(pail[index]);
        });
        
    });
    
    $('#ajax_form_redirect').submit(function()
    {
        $('#submit').val('Saving..');
        $('#submit').attr('disabled','disabled');
        $.ajax({
            url:$(this).attr('action'),
            type: 'POST',
            data:$(this).serialize(),
            success:function(data){
                res_data = data.split("#-#");
                $( "#dialog:ui-dialog" ).dialog( "destroy" );
                $('.ui-dialog-title').html(res_data[1]);
                $('#dialog-message').removeAttr('title');
                $('#dialog-message').attr('title',res_data[1]);
                $('#dialog-message').html(res_data[2]);
                
                $( "#dialog-message" ).dialog({
                    modal: true,
                    buttons: {
                        Ok: function() {
                            if(res_data[3]!=''){
                                window.location.href = res_data[3];
                            }
                            else{
                                $( this ).dialog( "close" );
                            }
                        }
                    }
                });
                $('#submit').val('Save');
                $('#submit').removeAttr("disabled");
            }
        });
        return false;
    });
    
});
function validasi(clicked)
{
    
    alert("Data posisi masih kosong");
    
    return false;
    
}

function chekin(id)
{
    var $checkbox = $('#chk_'+id);
    $checkbox.attr('checked', !$checkbox.is(':checked'));
}
function selectallcb() 
{ 
    $("input[type=checkbox]").attr("checked",true); 
} 

function deselectallcb() 
{ 
    $("input[type=checkbox]").attr("checked",false); 
}
