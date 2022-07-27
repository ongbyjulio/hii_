   <?php

function getKat() 
{
    $CI =& get_instance();
    return $CI->db->get('kategori')->result();
} 

function getKatId($id_kategori)
{
    $CI =& get_instance();
     $CI->db->where('id_kategori', $id_kategori);
    return $CI->db->get('kategori')->row()->nama;
} 

function getWisata()
{
    $CI =& get_instance();
    
    return $CI->db->get('about')->row()->about_daerah;
} 


function getAuthor($id_user)
{
    $CI =& get_instance();
     $CI->db->where('id_user', $id_user);
    return $CI->db->get('user')->row()->nama;
} 

function getTotalPost($id_user)
{
    $CI =& get_instance();
     $CI->db->where('id_user',$id_user);
    return $CI->db->get('post')->num_rows();
} 




function getUser()
{
    $CI =& get_instance();
    return $CI->db->get('user')->result();
} 


function getKeteranganBahari()
{
    $CI =& get_instance();
    $CI->db->where('id_kategori',1);
    return $CI->db->get('kategori')->row()->keterangan;
} 

function getTotalALL($user)
{
    $CI =& get_instance();
    $CI->db->where('id_user',$user);
    return $CI->db->get('post')->num_rows();
}

function getComment($id)
{
    $CI =& get_instance();
    $CI->db->where('id_post',$id);
    return $CI->db->get('comment')->num_rows();
}


function getTotalBlog()
{
    $CI =& get_instance();
    return $CI->db->get('post')->num_rows();
}


function getTotalWB()
{
    $CI =& get_instance();
    return $CI->db->where('id_kategori','1')
    ->get('post')->num_rows();
}

function getTotalWK()
{
    $CI =& get_instance();
    return $CI->db->where('id_kategori','2')
    ->get('post')->num_rows();
}

function getInboxNew()
{
    $CI =& get_instance();
    return $CI->db->where('status','1')
    ->get('inbox')->num_rows();
}

?>