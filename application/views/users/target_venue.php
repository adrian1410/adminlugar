<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>jQuery UI Autocomplete - Default functionality</title>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery/smoothness/jquery-ui.css">
<script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
    <script>
    $(function() {
    var availableTags = [<?php if ($table->num_rows() > 0){
                         foreach ($table->result() as $row){
                             echo "'".$row->unama."',";
                         }
                        }
            ?>];
    $( "#tags" ).autocomplete({
    source: availableTags
    });
    });
    </script>

<h4 class="alert_info"><?php echo $message?></h4>
</head>
<body>
<div class="ui-widget">
<label for="tags">Tags: </label>
<input id="tags" name="nama">
</div>
</body>
</html>
