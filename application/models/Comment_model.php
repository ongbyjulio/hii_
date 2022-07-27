 <?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model
{
    private $_table = "comment";
    
    public function getDefaultValues()
    {
        return [
            'id_comment'    => '',
            'id_post'  => '',
            'email'  => '',
            'name'  => '',
            'comment'  => '',
           
            'waktu' => ''    
        ];
    }

    public function save($data)
    {
        $data = array(
            "id_post" => $this->input->post('id_post'),
            "name" => $this->input->post('name'),
            "email" => $this->input->post('email'),
            "comment" => $this->input->post('comment'),
       
            "waktu" => $this->input->post('waktu')     
        );
        return $this->db->insert($this->_table, $data);
    }

    public function comment($data){
        $this->db->from($this->_table);
        $this->db->where('id_post',$data);
        $query = $this->db->get(); 
        return $query->result();
    }
}
