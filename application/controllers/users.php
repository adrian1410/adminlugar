<?php
class Users extends CI_Controller {

	function users(){
            
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
            $data['main_view'] = 'users/main';
            $data['message'] = "Manage lugar users here!!";
            $data['title'] = "Data Users";
            $data['table'] = $this->users_model->show_users();
            $data['nama_user'] = $this->session->userdata('nama');
            $this->load->view('template',$data);
        }
        
        function add(){
            $data['title'] = "Add User";
            $this->load->view('users/add',$data);
        }
        
        function add_proses(){
            $data['nama'] = $this->input->post('nama_user');
            $data['username'] = $this->input->post('username');
            $data['pass'] = $this->input->post('pass');
            $data['type'] = $this->input->post('utype');
            if ($this->users_model->check_user($data)->num_rows > 0){
                echo "No Ok-Penyimpanan Gagal-Username sudah terdaftar!";
            }else{
                $this->users_model->insert_proc($data);
                echo "Ok-Penyimpanan Berhasil- Data user berhasil di tambahkan!";
            }
            redirect('users');
        }
        
        function up($id=''){
            $hasil = $this->users_model->data_for_update($id);
            foreach ($hasil->result() as $row){
                $data['user_name'] = $row->uname;
                $data['nama_user'] = $row->unama;
                $data['type'] = $row->utype;
            }
            $data['up_id'] = $id;
            $data['form_action']= site_url('users/up_proc');
            $this->load->view('users/edit',$data);
        }
        
        function up_proc($id=''){
             $data = array (
                'unama' => $this->input->post('nama_user'),
                'utype' => $this->input->post('utype')
            );
            $up_id = $this->input->post('id');
            $this->users_model->update_user($up_id,$data);
            echo "ok-Penyimpanan Berhasil!-Data Berhasil di Update!";
        }
        
        function respass($id){
            $data['sukses'] = $id;
            $this->load->view('sukses',$data);
//            if ($this->users_model->respass($id,$uname)){
//                echo "ok-Penyimpanan Berhasil!-Data Berhasil di Update!";
//            }else{
//                echo "ok-Penyimpanan Gagal!-Data Gagal di Update!";
//            }
            
        }
        
        
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
