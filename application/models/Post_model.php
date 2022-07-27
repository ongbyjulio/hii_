     <!-- https://www.petanikode.com/codeigniter-database/
https://www.petanikode.com/codeigniter-upload/ -->

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends MY_Model
{

 
    private $_table = "post";

    
    public function getDefaultValues()
    {
        return [
            'id_post'    => '',
            'judul'  => '',
            'tgl_post'  => '',
            'isi'  => '',
            'id_user'  => '',
            'id_kategori'  => 'default.jpg',
            'gambar'  => '',
            'latitude'  => '',
            'langtitude'  => '',
            'deskripsi_tempat'  => ''
           
            
           
        ];
    }



    public function getValidationRules()
    {
        $validationRules =  [
            ['field' => 'judul',
            'label' => 'Judul',
            'rules' => 'required'],

            ['field' => 'isi',
            'label' => 'Isi',
            'rules' => 'required'],

             ['field' => 'deskripsi_tempat',
            'label' => 'Dt',
            'rules' => 'required']
        ];
    
    return $validationRules;
    }



    public function getAll($id)
    {
        return $this->db->get_where($this->_table,["id_user" => $id] )->result();
    } 

      public function getAllBahari($id)
    {
        return $this->db->get_where($this->_table, ["id_kategori" => 1,"id_user" => $id ])->result();
    } 

     public function getAllKuliner($id)
    {
        return $this->db->get_where($this->_table, ["id_kategori" => 2,"id_user" => $id])->result();
    } 




    /*GET ALL POST*/
    public function getAll_Content()
    { 
        return $this->db->get($this->_table)->num_rows('groupby');
    }

    function GetAll_Page($number,$offset)
    {
        return $this->db->get($this->_table,$number,$offset)->result();       
    }

    /*END GET ALL POST*/


 /*Get Bahari*/
      public function totalWisata()
    {
       return $this->db->get_where($this->_table, ["id_kategori" => 1])->num_rows('groupby');
    }
 

     function GetAll_Wisata($number,$offset){
        return $this->db->get_where($this->_table,["id_kategori" => 1],$number,$offset)->result();       
    }
      /*END Bahari*/

       /*Get Kuliner*/
      public function totalKuliner()
    {
       return $this->db->get_where($this->_table, ["id_kategori" => 2])->num_rows('groupby');
    }
 

     function GetAll_Kuliner($number,$offset){
        return $this->db->get_where($this->_table,["id_kategori" => 2],$number,$offset)->result();       
    }
      /*END Kuliner*/

      function recent(){
        /*$query = $this->db->get($this->_table, 2,'desc')->result();
        return $query;*/
        $this->db->from($this->_table);
        $this->db->order_by("tgl_post", "desc");
        $this->db->limit(2);
        $query = $this->db->get(); 
        return $query->result();
      }


    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_post" => $id])->row();
    }



    public function insert($data)
    {
      $this->db->insert('post',$data);
      return TRUE;
    }
    
     public function update($data,$kondisi)
  {
      $this->db->update($this->_table,$data,$kondisi);
      return TRUE;
  }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_post" => $id));
    }

}