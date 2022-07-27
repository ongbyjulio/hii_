<?php defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model
{
    private $_table = "about";

    public $nm_daerah;
    public $no_telp;
    public $email;
    public $alamat;
    public $about_daerah;
    public $gambar = "default.jpg";
   
 

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],
            
            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required']
        ];
    }

     public function edits()
    {
        return [
            ['field' => 'status',
            'label' => 'Status',
            'rules' => 'required']

          
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
      public function getAllEdit()
    {
        return $this->db->get($this->_table)->row();
    }
    

   public function update($data,$kondisi)
  {
      $this->db->update($this->_table,$data,$kondisi);
      return TRUE;
  }


}
