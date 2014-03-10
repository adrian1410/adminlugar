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
 <header><h2>&nbsp;&nbsp;<u><?php echo $title?></u></h2></header>
<form id="form_add" name="form_add" action="<?php echo base_url();?>users/add_proses" enctype="multipart/form-data" method="post">
    <table class='tablesorter' cellspacing='0'>
        <tr>
            <td width="70px">Nama User</td><td>:</td>
                <td><input type="text" size="30" name="nama_user"></td>
        </tr>
        <tr>
            <td width="10px">Username</td><td>:</td>
                <td><input type="text" size="30" name="username"></td>
        </tr>
        <tr>
            <td width="10px">Password</td><td>:</td>
                <td><input type="password" size="30" name="pass"></td>
        </tr>
        <tr>
            <td width="100px">Type User</td><td>:</td>
                <td><select style="width:30%;" name="utype">
                        <option value="999">Administrator</option>
                        <option value="99" selected>Marker</option>
                        <option value="1">User</option>
                    </select></td>
        </tr>

    </table>
    <input class="alt_btn" type="submit" value="Save" style="margin-left:213px; margin-bottom: 8px;">
    <input class="ads" type="reset" value="Reset">
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