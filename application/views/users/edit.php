<link href="<?php echo base_url();?>assets/css/layout.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/jquery/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
<script type="text/javascript"  src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js"></script>
<script type="text/javascript">
    function rilot()
    {
        window.location.reload();
    }
 </script>

<form id="form_add" name="form_add" action="<?php echo $form_action?>" enctype="multipart/form-data" method="post">
    <h2> Tambah Kategori </h2>
    <table class='tablesorter' cellspacing='0'>
        <tr>
            <td>Nama User</td>
            <td>:</td>
            <td>
                <input type="text" name="nama_user" size="20" value="<?php echo set_value('nama_user', isset($nama_user)?$nama_user:'');?>">
            </td>
        </tr>
        <tr>
            <td>Username</td>
            <td>:</td>
            <td> <?php echo set_value('user_name', isset($user_name)?$user_name:'-');?>
            <input type="hidden" name="id" value="<?php echo $up_id; ?>"</td>
        </tr>
        <tr>
            <td width="100px">Type User</td><td>:</td>
            <td><select style="width:30%;" name="utype">
            <?php if ($type == 999) {?>
                <option value="999" selected>Administrator</option>
                <option value="99">Marker</option>
                <option value="1">User</option>
            <?php } ?>
            <?php if ($type == 99) {?>
                <option value="999">Administrator</option>
                <option value="99" selected>Marker</option>
                <option value="1">User</option>
            <?php } ?>
            <?php if ($type == 1) {?>
                <option value="999">Administrator</option>
                <option value="99">Marker</option>
                <option value="1" selected>User</option>
            <?php } ?>
            </select></td>
        </tr>
    </table>
    <br>
     <input class="alt_btn" type="submit" value="Save" style="margin-left: 75px; margin-bottom: 0px;">
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
