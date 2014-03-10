<?php
class Users_model extends CI_Model{
    
    function kategori_model()
    {
        parent::__construct();
        $this->load->helper('date');
    }
    
    var $tbl = "userlgr";
    var $tbl2 = "markers";
    var $tbl3 = "category";
    var $off = 0;
    
    function getUsers(){
        $this->db->select('uid');
        $this->db->select('uname');
        $this->db->select('unama');
        $this->db->select('utype');
        $this->db->select('uauth');
        $this->db->select('upassword');
        $this->db->from($this->tbl);
        return $this->db->get();
    }
    
    function show_users(){
        $atts = array(
              'width'      => '600',
              'height'     => '400',
              'scrollbars' => 'no',
              'status'     => 'yes',
              'resizable'  => 'no',
              'screenx'    => '300',
              'screeny'    => '100'
            );
       $off=0;
       $table="";
       $hasil = $this->getUsers();
       if ($hasil->num_rows()>0){
           $table.="<table class='tablesorter' cellspacing='0'> 
			<thead> 
				<tr> 
                                <th align='center'>No</th> 
    				<th align='center'>Username</th> 
                                <th align='center'>Nama User</th>
    				<th align='center'>Type</th> 
    				<th align='center'>Actions</th> 
				</tr> 
			</thead>
                        <tbody> 
               ";
           foreach ($hasil->result() as $row){
            $off++;
            $table.="
                        <tr>
                                <td align='center'>$off</td>
                                <td align='center'>$row->uname</td>
                                <td align='center'>$row->unama</td>";
                                if ($row->utype == 999){
                                   $table .= "<td align='center'>Administrator</td>";
                                };
                                if ($row->utype == 99){
                                   $table .= "<td align='center'>Marker</td>";
                                };
                                if ($row->utype == 1){
                                   $table .= "<td align='center'>User</td>";
                                };
                                $table .="<td align='center'>";
                                $atts['class']='update';
                                $atts['title']='Update';
                                $table .= anchor_popup('users/up/'.$row->uid, '&nbsp', $atts);
                                $table.="<a class='aktif' onclick='return reseter($row->uid)' style='cursor:pointer' title='Reset Password'> &nbsp </a></td>
                        </tr>
                        </tbody>";
           }
           $table .= "</table>";
           
        
    }else{
        $table = "Data tidak ditemukan";
    }
//            $atts['class']  = 'ads';                 
//            $table .= anchor_popup('users/add', 'Add Users', $atts);
              $atts['class']='ads';
              $atts['title']='Tambah User';
              $table .= anchor_popup('users/add', 'Add User', $atts);
//              $table.="<a class='ads' onclick='return tambah()' style='cursor:pointer' title='Tambah User'> Add User </a></td>";
    return $table;
    }
    
    
    function insert_proc($data){
        $ins = array (
            'unama' => $data['nama'],
            'uname' => $data['username'],
            'upassword' => md5($data['pass']),
            'utype' => $data['type'],
            'uauth' => 1
        );
        $this->db->insert($this->tbl,$ins);
    }
    
    function data_for_update($id){
        $this->db->select('uid');
        $this->db->select('uname');
        $this->db->select('unama');
        $this->db->select('utype');
        $this->db->select('uauth');
        $this->db->select('upassword');
        $this->db->from($this->tbl);
        $this->db->where('uid',$id);
        return $this->db->get();
    }
    function update_user($id,$data){
        $insert = array (
            'unama' => $data['unama'],
            'utype' => $data ['utype'],
        );
        $this->db->where('uid', $id);
	$this->db->update($this->tbl,$data);
    }
    
    function respass($id,$uname){
        $data['upassword'] = $uname;
        $this->db->where('uid',$id);
        $this->db->update($this->tbl,$data);
    }
    
    function check_user($uname){
        $this->db->from($this->tbl);
        $this->db->where('uname',$uname['username']);
        return $this->db->get();
    }

    function getMarkers($id){
        $this->db->select("b.uid,b.unama, a.name,a.address,c.category_name,a.tmstmp");
        $this->db->from("markers a");
        $this->db->join("userlgr b","b.uid=a.insertuid");
        $this->db->join("category c","c.id=a.cat_id");
        $this->db->where('insertuid',$id);
        $this->db->where('status',1);
        $this->db->order_by("tmstmp","desc");
        return $this->db->get();
    }
    function count_venue($id){
       $this->db->select('id');
       $this->db->from('markers');
       $this->db->where('insertuid',$id);
       $this->db->where('status',1);
       $query = $this->db->get();
       return $query->num_rows();
    }
    function show_markers($id){
        $off = 0;
        $table = "";
        $hasil = $this->getMarkers($id);
        $hitung= $this->count_venue($id);
        if ($hasil->num_rows() > 0){
            $table .= "<p>Total venue : $hitung</p>";
            $table .=" <div class='module width_3_quarter'>
                        <table class='tablesorter' cellspacing='0' sytle='margin-top=-15px;'> 
			<thead> 
				<tr> 
                                <th align='center'>No</th> 
    				<th align='center'>Nama Venue</th> 
                                <th align='center'>Alamat</th>
    				<th align='center'>Kategori</th> 
    				<th align='center'>Tgl Insert</th> 
				</tr> 
			</thead>
                        <tbody> 
               ";
            foreach($hasil->result() as $row){
                $off++;
                $table .="<tr>
                            <td align='center'>$off</td>
                            <td align='center'>$row->name</td>
                            <td align='center'>$row->address</td>
                            <td align='center'>$row->category_name</td>
                            <td align='center'>$row->tmstmp</td>
                          </tr>
                        ";
            }
            $table .= "<tr>
                           <td align='center' colspan='3'><b>Total</b></td>
                           <td align='center'><b>$hitung Venue</b></td>
                        </tr>
                        </tbody>
                        </table>
                    </div>";
        }else{
            $table .="tidak ada data";
        }
        return $table;
    }
    
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
