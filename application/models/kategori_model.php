<?php
class Kategori_model extends CI_Model{
    
    function kategori_model()
    {
        parent::__construct();
    }
    
    var $t_port = "category";
    var $off = 0;
    
    function get_data_parent(){
        $this->db->select('id');
        $this->db->select('parent_id');
        $this->db->select('category_name');
        $this->db->select('level');
        $this->db->select('aktif');
        $this->db->from($this->t_port);
        $this->db->where('parent_id',NULL);
        $this->db->order_by('category_name','asc');
        return $this->db->get();
    }
    
    function show_parent(){
       $atts = array(
              'width'      => '380',
              'height'     => '400',
              'scrollbars' => 'no',
              'status'     => 'yes',
              'resizable'  => 'no',
              'screenx'    => '300',
              'screeny'    => '100'
            );
       $off=0;
       $table="";
       $hasil = $this->get_data_parent();
       if ($hasil->num_rows() > 0){
           $table.="<table class='tablesorter' cellspacing='0'> 
			<thead> 
				<tr> 
    				<th align='center'>No</th> 
    				<th align='center'>Category</th> 
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
                                <td style='cursor:pointer' align='center' OnClick='return show_child({$row->id});'>$row->category_name</td>
                                <td align='center'>";
                                 $atts['class']  = 'update';
                                 $table .=anchor_popup('kategori/upctgry/'.$row->id.'/0', '&nbsp', $atts);
//                       $table .= "<input type='image' src='".base_url()."assets/images/icn_edit.png' title='Edit'>
//                                <input type='image' src='".base_url()."assets/images/icn_trash.png' title='Trash'></td>
                         if ($row->aktif == 1){
                                    $table.="<a class='delete' onclick='return delet($row->id,0)' style='cursor:pointer'> &nbsp </a></td>
                                            </tr>
                                                <tr style='display:none' id='child_$row->id'>
                                                <td class='f_child' colspan='5'>";
                               }else{
                                   $table.="<a class='aktif' onclick='return aktif($row->id,0)' style='cursor:pointer'> &nbsp </a></td>
                                            </tr>
                                                <tr style='display:none' id='child_$row->id'>
                                                <td class='f_child' colspan='5'>";
                         }

            $table .= "         <span id='bobot_child_$row->id' class='tablechild'> </span>";
            }
            $table .= "
                                 </td>
                         </tr>
                        </tbody>
                  </table>";
            
       }
            $atts['class']  = 'ads';                 
            $table .= anchor_popup('kategori/form_kategori', 'Add Category', $atts);
            return $table;
    }
    
    function get_data_child($parent){
         $this->db->select('id');
        $this->db->select('parent_id');
        $this->db->select('category_name');
        $this->db->select('level');
        $this->db->select('aktif');
        $this->db->from($this->t_port);
        $this->db->where('parent_id',$parent);
        $this->db->order_by('category_name','asc');
        return $this->db->get();
    }
    
    
     function show_child($parent){
        $atts = array(
              'width'      => '380',
              'height'     => '400',
              'scrollbars' => 'no',
              'status'     => 'yes',
              'resizable'  => 'no',
              'screenx'    => '300',
              'screeny'    => '100'
            );
       $off=0;
       $table="";
       $hasil = $this->get_data_child($parent);
       if ($hasil->num_rows() > 0){
           $table.=" 
                    <table class='tablechild' cellspacing='0'>
                    <thead>
                        <tr>
                            <th width='50px' align='center'>No</th>
                            <th width='265px' align='center'>Category</th>
                            <th width='100px' align='center'>Act</th>
                        </tr>
                    </thead>
                    <tbody>
               ";
            foreach ($hasil->result() as $row){
            $off++;
            $table.="
                        <tr>
                                <td align='center'>$off</td>
                                <td style='cursor:pointer' align='center' OnClick='return show_child({$row->id});'>$row->category_name</td>
                                <td align='center'>";
                                $atts['class']  = 'update';
                                $table .= anchor_popup('kategori/upctgry/'.$row->id.'/'.$row->parent_id, '&nbsp', $atts);
                               if ($row->aktif == 1){
                                    $table.="<a class='delete' onclick='return delet($row->id,0)' style='cursor:pointer'> &nbsp </a></td>
                                    </tr>
                                            <tr style='display:none' id='child_$row->id'>
                                            <td class='f_child' colspan='5'>";
                               }else{
                                   $table.="<a class='aktif' onclick='return aktif($row->id,0)' style='cursor:pointer'> &nbsp </a></td>
                                    </tr>
                                           <tr style='display:none' id='child_$row->id'>
                                           <td class='f_child' colspan='5'>";
                               }
                                $table .= "<span id='bobot_child_$row->id' class='tablechild'> </span>";
            }
            $table .= "
                                 </td>
                         </tr>
                        </tbody>
                  </table>";
       } 
            $atts['class']  = 'ads';                 
            $table .= anchor_popup('kategori/form_kategori/'.$parent, 'Add Category Inside Here', $atts);
         
       return $table;
     }
     
     function get_parent_for_child($id,$bila){
        $this->db->select('id');
        $this->db->select('parent_id');
        $this->db->select('category_name');
        $this->db->select('level');
        $this->db->select('aktif');
        $this->db->from($this->t_port);
        $this->db->where($bila,$id);
        $this->db->order_by('category_name','asc');
        return $this->db->get();
     }
    
    function hupus($id,$parent)
    {
       $delet['aktif'] = 0;
       $this->db->where('id',$id);
       $this->db->update($this->t_port,$delet);
        
    }
    
    function aktif($id,$parent)
    {
       $delet['aktif'] = 1;
       $this->db->where('id',$id);
       $this->db->update($this->t_port,$delet);
        
    }
    
    function get_data_for_update($id,$parent){
        $this->db->select('id');
        $this->db->select('category_name');
        $this->db->select('level');
        $this->db->select('aktif');
        $this->db->select("(Select category_name From $this->t_port Where id=".$parent.") AS parent");
        $this->db->from($this->t_port);
        $this->db->where('id',$id);
        return $this->db->get();
    }
    
    function simpan_kategori($data){
        $insert = array (
            'category_name' => $data['kategori'],
            'level' => $data ['level'],
            'parent_id' => $data ['parent']
        );
        $this->db->insert($this->t_port,$insert);
    }
    function simpan_kategori_noparent($data){
        $insert = array (
            'category_name' => $data['kategori'],
            'level' => $data ['level']
        );
        $this->db->insert($this->t_port,$insert);
    }
    
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
