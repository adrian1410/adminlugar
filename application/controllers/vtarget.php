<?php
class Vtarget extends CI_Controller {

	function vtarget(){
            
		parent::__construct();
                $this->load->model('users_model');
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
            $data['main_view'] = 'users/target_view';
            $data['message'] = "Venue target markers!!";
            $data['title'] = "Data Users";
            $data['nama_user'] = $this->session->userdata('nama');
            $this->load->view('template',$data);
        }
        function cari($un=''){
            $data['username'] = $un;
            $hasil = $this->users_model->check_user($data);
            if ($hasil->num_rows > 0){
                foreach($hasil->result() as $row){
                    echo $this->users_model->show_markers($row->uid);
                }
            }else{
                    echo "Tidak ditemukan";
            }
        }

}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
