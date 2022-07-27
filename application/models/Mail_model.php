 <?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mail_model extends CI_Model
{
    private $_table = "inbox";
    
    public function getDefaultValues()
    {
        return [
            'id_mail'    => '',
            'name'  => '',
            'email'  => '',
            'message'  => '',
            'date'  => '',
            'status'  => '1'    
        ];
    }

     public function getValidationRules()
    {
        $validationRules =  [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'message',
            'label' => 'Message',
            'rules' => 'required']
            
            
        ];
    
    return $validationRules;
    }

    public function edits()
    {
        return [
            ['field' => 'status',
            'label' => 'Status',
            'rules' => 'required']

          
        ];
    }


     
    public function save($data)
    {
        $data = array(
            "name" => $this->input->post('name'),
            "email" => $this->input->post('email'),
            "message" => $this->input->post('message'),
            "date" => $this->input->post('date'),
            "status" => $this->input->post('status'),
            "id_user" => $this->input->post('id_user')
            
        );
        return $this->db->insert($this->_table, $data);
    }

    public function getAll($id)
    {
        return $this->db->get_where($this->_table,["id_user" => $id])->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_mail" => $id])->row();
    }
 

    public function saves()
    {
        $post = $this->input->post();
        
        $this->name = $post["name"];
        $this->email = $post["email"];
        $this->message = $post["message"];
        $this->status = $post["status"];
        return $this->db->insert($this->_table, $this);
    }

      public function update()
    {
        $data = array(
            "status" => $this->input->post('status'),
            
        );
        return $this->db->update($this->_table, $data, array('id_mail' => $this->input->post('id_mail')));
    }

     public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_mail" => $id));
    }



}
