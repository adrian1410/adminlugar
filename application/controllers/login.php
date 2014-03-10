<?php

class Login extends CI_Controller {

	function login()
	{
		parent::__construct();
                $this->load->model('login_model');
	}
	
	function index()
	{   
        $this->load->view('login/login_view');
	}
        
        function proses(){
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('pwd', 'Password', 'required');

            if ($this->form_validation->run() == TRUE)
            {
                $pengguna['username'] = $this->input->post('username');
                $pengguna['password'] = $this->input->post('pwd');
                if ($this->login_model->check_user($pengguna) == TRUE)
                {
                    $user   = $this->login_model->cari($pengguna);
                    foreach ($user->result() as $row);
                    $data = array (
                        'author' => 'Adrian Rizkal Pratama',
                        'author_email' => 'adrian.rizkal@gmail.com',
                        'product_name'  => 'Official Web Lugar',
                        'username' => $row->uname,
                        'nama' => $row->unama,
                        'utype' => $row->utype,
                        'login' => TRUE
                    );
                    $this->session->set_userdata($data);
                    redirect ('admin');

                }else{
//                    echo "No-Peringatan-Password atau Username Anda Salah!!";
                    $this->session->set_flashdata('message', 'Maaf, username atau password Anda salah.');
                    redirect('login');
                }
            }
            else
            {
//                echo "No-Peringatan-Password dan Username Harus Di Isi !!";
                $this->session->set_flashdata('message', 'Username dan Password harus di isi !!');
                redirect('login');
            }
        }
        
        function logout(){
            if ($this->session->userdata('login')== TRUE){
                $this->session->sess_destroy();
            }
            redirect ('login','refresh');
        }

}