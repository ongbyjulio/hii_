  <?php

defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Mail_model");
        $this->load->database();
        $this->load->library('upload');
        $this->load->library('form_validation');
        if(!$this->session->userdata('username')){
            $this->session->set_flashdata('message', '<div class="alert alert-warning text-center alert-dismissible fade show" role="alert">
                Anda Belum Login. 
                </div>');
            redirect(base_url("login"));}
    
    }
 
  
     public function index()
    {
        $data['title'] ='List Admin';
        $data['breadcrumb'] ='List Admin';
        $data['user'] = $this->User_model->getAll();
        $this->load->view("admin/user/index", $data);
    }

     public function profile()
    {
        $data['title'] ='Profile';
        $id = $this->session->userdata('id_user');
       
        $data['breadcrumb'] ='My Profile';
        $data['user'] = $this->User_model->getById($id);
        $this->load->view("admin/user/profile", $data);
    }

     public function add_user()
    {
        $data['title'] ='Tambah Admin';
        $data['breadcrumb'] =' List Admin / Add';
       
        $data['page'] ='Add User/Admin';
        $data['user'] = $this->User_model->getAll();
        $this->load->view("admin/user/add_user", $data);
    }


    public function proses()
    {
        if(isset($_POST['submit'])) {
            $add = $this->input->post(null, TRUE);

            $this->User_model->save($add);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil Ditambahkan</strong>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        } 
        redirect('admin/user');
    }

    public function update(){

        
        $pass = $this->input->post('pass');
        $pass_lama = $this->input->post('pass_lama');
        $id_user = $this->input->post('id_user');
        $nm = $this->input->post('nm');
        $username = $this->input->post('username');
       

        $path = './upload/user/';

        $kondisi = array('id_user' => $id_user);
       

        $config['upload_path'] = './upload/user/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '2048';  //2MB max
        $config['max_width'] = '4480'; // pixel
        $config['max_height'] = '4480'; // pixel
        $config['file_name'] = $_FILES['gambar']['name'];
        $this->upload->initialize($config);

                if (!empty($_FILES['gambar']['name'])) {
                    // code...
                    if ($this->upload->do_upload('gambar')) {
                        // code...
                        $gambar = $this->upload->data();
                        
                            
                        if ($pass == '') {
                            // code...
                        
                        $data   = array(
                            'nama'=>$nm,
                            'username'=>$username,
                            
                            'gambar'=>$gambar['file_name']
                        );
                    }else{
                         $data   = array(
                            'nama'=>$nm,
                            'username'=>$username,
                            'password'=>md5($pass),
                            'gambar'=>$gambar['file_name']
                        );

                    }
                        if ($data['gambar']->gambar == '') {
                            // code...
                           @unlink($path.$this->input->post('filelama'));
                           
                           
                       }else{
                        @link($path.$this->input->post('gambar'));
                        
                    }

                         if ($this->User_model->updates($data,$kondisi)) {   // Update data
                            $this->session->set_flashdata('success', 'Data berhasil diubah');
                        } else {
                            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
                        }
                        redirect(base_url('admin/user/profile'));
                    }

                    
                }else{

                  if ($pass == '') {  
                  $data   = array( 'nama'=>$nm,
                            'username'=>$username ); 
              }else{
                $data   = array( 'nama'=>$nm,
                    'username'=>$username,
                    'password'=>md5($pass));

              }

                   
    if ( $this->User_model->updates($data,$kondisi)) {   // Update data
        $this->session->set_flashdata('success', 'Data berhasil diubah');
    } else {
        $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
    }

    redirect(base_url('admin/user/profile'));  

}
} 



   public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/user');

        $user = $this->User_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->edits());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Berhasil mengubah Status Akun.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("admin/user");
        }
        
    }

     public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->User_model->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data User berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
         redirect("admin/user");
        
    }




}