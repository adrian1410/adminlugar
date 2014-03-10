<link href="<?php echo base_url();?>assets/css/layout.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/jquery/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
<script type="text/javascript"  src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js"></script>

<form id="form_add" name="form_add" action="<?php echo $form_action?>" enctype="multipart/form-data" method="post">
    <h2> Tambah Kategori </h2>
    <table border="0">
        <tr>
            <td>Kategori</td>
            <td>:</td>
            <td>
                <input type="text" name="kategori" size="20" value="<?php echo set_value('kategori', isset($kategori)?$kategori:'');?>">
            </td>
        </tr>
        <tr>
            <td>Parent</td>
            <td>:</td>
            <td> <?php echo set_value('parent', isset($parent)?$parent:'-');?>
                <input type="hidden" name="id" value="<?php echo $up_id; ?>"</td>
        </tr>
    </table>
    <br>
     <input class="alt_btn" type="submit" value="Save" style="margin-left: 75px; margin-bottom: 0px;">
    <?php
//        $submit['name'] = 'submit';
//        $submit['id'] = 'submit';
//        $submit['type'] = 'submit';
//        $submit['content'] = 'Save';
//        $submit['class'] ='push_button';
//        echo form_button($submit);
    ?>
    <!--<input type="submit" name="submit" id="submit" value=" Save " />-->
   
</form>
 <div id="dialog-message"></div> 
<script type="text/javascript">
    $('#form_add').submit(function()
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
                            window.opener.rilot();
                            window.close();
                        }
                    }
                });
                $('#submit').val('Save');
                $('#submit').removeAttr("disabled");
            }
        });
        return false;
   });
</script>
