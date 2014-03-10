<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 	
<html lang="en"> <!--<![endif]-->
<head>

	<!-- General Metas -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	<!-- Force Latest IE rendering engine -->
	<title>Login Form</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png" />
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login_base.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login_skeleton.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login_layout.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js"></script>
	
</head>
<body>

	<!-- Primary Page Layout -->

	<div class="container">
                                
		<div class="form-bg">
                    
                     <?php
                        echo form_open('login/proses', 'id="login_form"');
//                        $message = $this->session->flashdata('message');
//                        echo $message == '' ? '' : '<div id="error" class="error-message" >' . $message . '</div>';
                     ?>
				<h2>Administrator of Lugar Inc.</h2>
                                
                                <label> Username : </label>
                                <p> <?php
                                        $data['name'] = $data['id'] = 'username';
                                        $data['class'] = 'text';
                                        $data['title'] = 'Username harus diisi';
                                        $data['value']  = set_value('Username');
                                        echo form_input($data);
                                  ?>
                                </p>
				<!--<p><input id="username" placeholder="Username" name="username" size="20" type="text"></p>-->
                                <label>Password :</label>
				<p> <?php
                                        $pass['name'] = $pass['id'] = 'pwd';
                                        $pass['title'] = "Password harus diisi";
                                        $data['placeholder'] = 'Password';
                                        echo form_password($pass);
                                    ?>
                                </p>
				<button type="submit"></button>
                    </form>
                                <?php 
                                $message = $this->session->flashdata('message');
                                echo $message == '' ? '' : '<div id="error" class="error-message" >' . $message . '</div>';
                                ?>
		</div>
                
	
		<!--<p class="forgot">Forgot your password? <a href="">Click here to reset it.</a></p>-->


	</div><!-- container -->

	<!-- JS  -->
	<script>window.jQuery || document.write("<script src='assets/js/jquery-1.9.1.js'>\x3C/script>")</script>
	<script src="<?php echo base_url(); ?>assets/js/app.js"></script>
	
<!-- End Document -->
</body>
</html>