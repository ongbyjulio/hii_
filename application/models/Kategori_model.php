  
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    private $_table = "kategori";

    public $id_kategori;
    public $nama;
    public $keterangan;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'keterangan',
            'label' => 'Keterangan',
            'rules' => 'required']
        ];
    }

     public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getBahari()
    {
        return $this->db->get_where($this->_table, ["id_kategori" => 1])->result();
    }

     public function getKuliner()
    {
        return $this->db->get_where($this->_table, ["id_kategori" => 2])->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_post" => $id])->row();
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