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
<article class="module width_full">
    <header><h3><?php echo $title?></h3></header>
    <div class="module_content">
        <?php echo $table?>
        <div class="clear"></div>
    </div>
    
</article>

<script>
    function show_child(parent){
        $('#child_'+parent).toggle("slow");
        $('#bobot_child_'+parent).load('<?php echo base_url();?>kategori/child_show/'+parent);
    } 
    
    function delet(id,parent)
    {
        var answer = confirm("Anda yakin akan menghapus data ini?")
        if (answer){
            $.ajax({
                url:'<?php echo base_url() ?>kategori/delete/'+id+'/'+parent,
                type: 'POST',
                success:function(data){
                    window.location.reload();
                }
                
            });
        }
    }
    
    function aktif(id,parent)
    {
        var answer = confirm("Anda yakin akan mengaktifkan kembali data ini?")
        if (answer){
            $.ajax({
                url:'<?php echo base_url() ?>kategori/aktif/'+id+'/'+parent,
                type: 'POST',
                success:function(data){
                    window.location.reload();
                }
                
            });
        }
    }
</script>