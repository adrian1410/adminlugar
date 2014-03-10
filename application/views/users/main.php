<script type="text/javascript"  src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js"></script>
<script type="text/javascript">
    function rilot()
    {
        window.location.reload();
    }
 </script>
<h4 class="alert_info"><?php echo $message?></h4>
<article id="adding" class="module width_full">
    <header><h3><?php echo $title?></h3></header>
    <div class="module_content">
        <?php echo $table?>
        <div class="clear"></div>
    </div>
    
</article>
<div id="dialog-message"></div> 
<script>
    function tambah(){
       $('#adding').load('<?php echo base_url();?>users/add');
    } 
    function reseter(id)
    {
        var answer = confirm("Anda yakin akan mengaktifkan kembali data ini?")
        if (answer){
            $.ajax({
                url:'<?php echo base_url() ?>users/respass/'+id,
                type: 'POST',
                success:function(data){
                    window.location.reload();
                }
                
            });
        }
    }
    
    
</script>