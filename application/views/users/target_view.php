<script type="text/javascript"  src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js"></script>
<script type="text/javascript">
    function rilot()
    {
        window.location.reload();
    }
    
    function cekuser(cari){
       $('#target_data').load('<?php echo base_url();?>vtarget/cari/'+cari);
    } 
 </script>
<h4 class="alert_info"><?php echo $message?></h4>
<article id="adding" class="module width_full">
    <header><h3><?php echo $title?></h3></header>
    <div class="module_content">

        <label>Isikan dengan Username Marker : </label><input id="nama" type="text" name="nama" size="20">
        <a class="ads" value="Cari" OnClick="return cekuser(document.getElementById('nama').value)" style='cursor:pointer' title='Cari Username'>Cari</a>
    
        <div class="clear"></div>
    
    </div>
</article>

<br>
<br>
<div id="target_data"></div>
<div id="dialog-message"></div> 
