<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>Lugar Inc. | Admin Panel</title>
	
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/layout.css" type="text/css" media="screen" />
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/hideshow.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript">
//	$(document).ready(function() 
//    	{ 
//      	  $(".tablesorter").tablesorter(); 
//   	 } 
//	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
</head>


<body>

	<header id="header">
		<hgroup>
                        <h1 class="site_title">
                            <img src="<?php echo base_url();?>assets/images/logo_admin.png" width="150px" height="51px" style="margin-bottom: -2px;margin-left: 35px;"></img>
                            <!--<a href="<?php echo base_url();?>admin">Website Admin</a>-->
                        </h1>
			
                        <h2 class="section_title">Lugar Inc. Dashboard</h2>
		</hgroup>
	</header> <!-- end of header bar -->
       