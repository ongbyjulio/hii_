 <?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "user";

    public $id_user;
    public $nama;
    public $password;
    public $username;
    public $status;
    public $gambar = "default.svg";
    public $akses;
   
 

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
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
    }


   
    public function save($data)
    {
        $data = array(
            "nama" => $this->input->post('nama'),
            "username" => $this->input->post('username'),
            "password" => md5($this->input->post('password')),
            "status" => 'non-aktif',
            "akses" => 'admin',
            "gambar" => 'default.svg',
            "tgl_dibuat" => $this->input->post('date')
            
        );
        return $this->db->insert($this->_table, $data);
    }

    public function update()
    {
        $data = array(
            "status" => $this->input->post('status'),
            
        );
        return $this->db->update($this->_table, $data, array('id_user' => $this->input->post('id_user')));
    }
    
  public function updates($data,$kondisi)
  {
      $this->db->update($this->_table,$data,$kondisi);
      return TRUE;
  }

     public function getPost()
    {
        return $this->db->get($this->_table)->result();
    }


    
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_user" => $id));
    }

}
