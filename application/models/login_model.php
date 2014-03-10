<?php
class Login_model extends CI_Model{
    
    function login_model(){
        parent::__construct();
    }
    
    var $t_user = 'userlgr';
    
    function cari($user){
        $this->db->select('uid');
        $this->db->select('uname');
        $this->db->select('unama');
        $this->db->select('utype');
        $this->db->select('uauth');
        $this->db->from($this->t_user);
        $this->db->where('uname',$user['username']);
        $this->db->where('upassword',md5($user['password']));
        return $this->db->get();
    }
    function check_user($pengguna){
        $user = array(
            'username' => $pengguna['username'],
            'password' => $pengguna['password']
        );
        $query =  $this->cari($user);
        if ($query->num_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    
    function get_user($username){
        $this->db->select('klienid');
        $this->db->select('nama');
        $this->db->select('alamat');
        $this->db->select('kota');
        $this->db->select('provinsi');
        $this->db->from($this->t_user);
        $this->db->where('klienid',$username);
    }
}
?>
