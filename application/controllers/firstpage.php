<?php
class Firstpage extends CI_Controller {

	function firstpage()
	{
		parent::__construct();
	}
	
	function index(){    
            $this->load->view('firstpage');
	}
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
