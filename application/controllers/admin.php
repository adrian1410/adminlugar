<?php
class Admin extends CI_Controller {

	function admin()
	{
		parent::__construct();
	}
	
	function index(){    
            
            if (($this->session->userdata('login') == TRUE)&& $this->session->userdata('utype') == 999)
            {
                $this->main();
            }
            else
            {
                if ($this->session->userdata('login') == TRUE){
                    $this->session->sess_destroy();
                    $this->session->set_flashdata('message', 'User anda tidak aktif sebagai Admin.');
                }
                
                redirect('login');
            }
            
	}
        
        function main(){
            $data['main_view'] = 'home/graphic';
            $data['nama_user'] = $this->session->userdata('nama');
            $this->load->view('template',$data);
            
        }
        


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
}
?>
