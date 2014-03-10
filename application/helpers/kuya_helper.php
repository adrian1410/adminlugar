<?php 
    function switch_tgl($res_date) 
    {
        $duar   = explode('-',$res_date);
        if(is_numeric($duar[0]))
            $date   = $duar[2].'-'.$duar[1].'-'.$duar[0];
        else
            $date   = '-';
        
        return $date;
    }
    
    function rupiah($data)
    {
        return number_format($data,2,',','.');
    }
    
    function rupiah_nc($data)
    {
        return number_format($data,0,',','.');
    }
    
    function titik($data)
    {
        return number_format($data,2,'.','');
    }
    
    function to_rome($res_data)
    {
        $rome   = array(
        1=>'I',2=>'II',3=>'III',4=>'IV',5=>'V',6=>'VI',7=>'VII',8=>'VIII',9=>'IX',10=>'X'
        );
        
        return $rome[$res_data];
    }
    
    function get_opt_sme_thn()
    {
        $data['option_smes']    = array(1=>'I',2=>'II');
        $year   = date('Y');
        $till   = $year-20;
        for($year;$year>=$till;$year--)
        {
            $data['options_year'][$year] = $year;
        }
        
        return $data;
    }
    
    function get_opt_tri_thn()
    {
        $data['option_tri']    = array(1=>'I',2=>'II',3=>'III',4=>'IV');
        $year   = date('Y');
        $till   = $year-20;
        for($year;$year>=$till;$year--)
        {
            $data['options_year'][$year] = $year;
        }
        
        return $data;
    }
    
    function get_posisi($pos)
    {
        $waktu	= explode("-", $pos);
        $b 		= $waktu[0];
        $thn 	= $waktu[1];
        $m 		= array(
                'Jan'=>'1','Feb'=>'2','Mar'=>'3','Apr'=>'4','May'=>'5','Jun'=>'6','Jul'=>'7','Aug'=>'8','Sep'=>'9','Oct'=>'10','Nov'=>'11','Dec'=>'12'
            );
        $bulan	= $m[$b];
        
        $posisi[1]	= $bulan;
        $posisi[2]	= $thn;
        
        return $posisi;
    }
    
    function get_from_til($s,$t)
    {
        $sm = array(
        1 => array(1,6),
        2 => array(7,12)
        );
        
        $data['from']   = $t.'-'.$sm[$s][0].'-1';
        $data['till']   = $t.'-'.$sm[$s][1].'-31';
        
        return $data;
    }
    
    function get_from_til_tri($s,$t)
    {
        $tr = array(
        1 => array(1,3),
        2 => array(4,6),
        3 => array(7,9),
        4 => array(10,12)
        );
        
        $data['from']   = $t.'-'.$tr[$s][0].'-1';
        $data['till']   = $t.'-'.$tr[$s][1].'-31';
        
        return $data;
    }
    
    function alert_style()
    {
        return 'text-decoration:blink;font-weight:bold;';
    }
    
    function ajax_pagination($pagi,$table,$js,$nr='')
    {
        $data   = '';
        $data   .= '<p id="pagination">' . $pagi . '</p>';
        $data   .= $table;
        if($nr!='')
            $data   .= '<span id="num_row">Total Rows: ' . $nr . '</span>';
        $data   .= '<p id="pagination">' . $pagi . '</p>';
        $data   .= '<script type="text/javascript" src="'.$js.'"></script>';
        
        return $data;
    }    
    
    function br2ln($source)
    {
        $data   = str_replace('<br />','',$source);
        return $data;
    }
    
    function enkrip($data,$pass)
    {
        $par    = $this->get_param();
        return openssl_encrypt($data, 'aes128', $pass);
    }
    
    function dekrip($data,$pass)
    {
        return openssl_decrypt($data, 'aes128', $pass);
    }
    
    function create_link_print($off,$ajax="")
    {
        $uri =uri_string();
        if($off == 0)
        {
            if(($ajax!="")&&($ajax == 'ajax'))
            {
                $uri = $uri.'/1/'.$off;
            }
            else{
                $uri = $uri.'/'.$off;
            }
        }
        $link = '<div align="right"><a href='.$uri.'/1 class="preview noPrint" target="blank">Cetak</a></div>';
        
        return $link;
    }
    
    function do_print($data)
    {
        require('mpdf_helper.php');
        echo to_pdf($data['table'],$data['header'],$data['title']);
    }