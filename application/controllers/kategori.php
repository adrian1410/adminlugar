<?php
class Kategori extends CI_Controller {

	function kategori(){
            
		parent::__construct();
                $this->load->model('kategori_model');
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
            $data['main_view'] = 'kategori/main';
            $data['message'] = "This is an venue category master data panel";
            $data['title'] = "Venue Category Master Data";
            $data['nama_user'] = $this->session->userdata('nama');
            $data['table'] = $this->kategori_model->show_parent();
            $this->load->view('template',$data);
        }
        
        function child_show($parent){
             echo $this->kategori_model->show_child($parent);
         }
        
         function delete($id,$parent)
        {
            $this->kategori_model->hupus($id,$parent);
        }
        
        function aktif($id,$parent)
        {
            $this->kategori_model->aktif($id,$parent);
        }
        
        function update()
        {
            $data = array (
                'kategori' => $this->input->post('kategori'),
            );
            $up_id = $this->input->post('id');
            $this->kategori_model->update_kategori($up_id,$data);
            echo "ok-Penyimpanan Berhasil!-Data Berhasil di Update!";
        }
        
        function upctgry($id,$parent)
        {
            $hasil = $this->kategori_model->get_data_for_update($id,$parent);
            foreach ($hasil->result() as $row){
                $data['kategori'] = $row->category_name;
                $data['parent'] = $row->parent;
            }
            $data['up_id'] = $id;
            $data['form_action']=   site_url('kategori/update');
            $this->load->view('kategori/form_edit',$data);
        }
        
        function form_kategori($aidi=''){
             $bila = '';
             if (empty($aidi)){
                 $bila= 'parent_id';
                 $aidi = NULL;
             }else{
                 $bila= 'id';
             }
//             $hasil = $this->kategori_model->get_data_parent($aidi,$bila)->result();
               $hasil = $this->kategori_model->get_parent_for_child($aidi,$bila)->result();
         foreach ($hasil as $row){
             $data['options_parent'][$row->id] = $row->category_name;
             $data['level'] = $row->level;
         }
             $this->load->view('kategori/form_add',$data);
         }
        
        function add()
        {   
             $data['kategori'] = $this->input->post('kategori');
             $data['level'] = $this->input->post('level');
             $data['parent'] = $this->input->post('parent_id');
//             $this->load->view('test',$data);
             if($data['parent']=='NULL'){
                 $this->kategori_model->simpan_kategori_noparent($data);
             }else{
                 $this->kategori_model->simpan_kategori($data);
             }
             
             echo "no-Penyimpanan Berhasil!-Data Berhasil di Simpan!";
        }
        
        
        
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
