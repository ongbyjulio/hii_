  <?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Post extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); 
        
        $this->load->model("Post_model");
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

        $id = $this->session->userdata('id_user');
        $data['title'] ='List Post';
        $data['breadcrumb'] ='List Post';
        
        $data['post'] = $this->Post_model->getAll($id);
        $this->load->view("admin/post/list_post", $data);
    }

       public function bahari()
    {
        $id = $this->session->userdata('id_user');
        $data['title'] ='List Post';
        $data['breadcrumb'] ='List Post Bahari';
       
        $data['post'] = $this->Post_model->getAllBahari($id);
        $this->load->view("admin/post/list_post", $data);
    }

   public function kuliner()
    {
        $id = $this->session->userdata('id_user');
        $data['title'] ='List Post';
        $data['breadcrumb'] ='List Post Kuliner';
       
        $data['post'] = $this->Post_model->getAllKuliner($id);
        $this->load->view("admin/post/list_post", $data);
    }



 

    public function add()
              {
                /*if ($this->session->userdata('role') != 'admin') { 
                  $this->session->set_flashdata('warning', 'Anda tidak memiliki akses');
                  redirect(base_url('home'));
                  return;  
                }
*/
                if (!$_POST) {
                  $input = (object) $this->Post_model->getDefaultValues();
                } else {
                  $input = (object) $this->input->post(null, true);

                }
 
                if (!$this->Post_model->validate()) {

                  $data['input'] = $input;
                  $data['title'] ='List Post';
                  $data['breadcrumb'] ='New Post';
             
                  $this->load->view("admin/post/new_post", $data);
                }
                // Input data
              }


             public function save()
                 {
               
                $id_post   = $this->input->post('id_post');
                $judul = $this->input->post('judul');
                $tgl_post   = $this->input->post('tgl_post');
                $isi   = $this->input->post('isi');
                $id_user   = $this->input->post('id_user');
                $id_kategori   = $this->input->post('id_kategori');
                $latitude   = $this->input->post('latitude');
                $dt   = $this->input->post('dt');
                $langtitude   = $this->input->post('langtitude');

                $config['upload_path'] = './upload/';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['max_size'] = '2048';  //2MB max
                $config['max_width'] = '4480'; // pixel
                $config['max_height'] = '4480'; // pixel
                $config['encrypt_name'] = TRUE;
                $config['file_name'] = $_FILES['gambar']['name'];

                $this->upload->initialize($config);

                if (!empty($_FILES['gambar']['name'])) {
                  if ( $this->upload->do_upload('gambar') ) {
                    $gambar = $this->upload->data();
                    $data = array(
                      'judul'       => $judul,
                      'tgl_post'    => $tgl_post,
                      'isi'         => $isi,
                      'id_user'     => $id_user,
                      'id_kategori' => $id_kategori,
                      'latitude'    => $latitude,
                      'langtitude'  => $langtitude,
                      'deskripsi_tempat'  => $dt,
                      'gambar'      => $gambar['file_name']
                 
                    );
                    $this->Post_model->insert($data);
                    $this->session->set_flashdata('success', 'Berhasil ditambahkan');
                    redirect(base_url('admin/post/index'));
                  }
                  else {

                    die("gagal upload");
                  
                  }

                }
                else {
                  $name_img = 'default.png';
                  $data = array(
                   'judul'       => $judul,
                   'tgl_post'    => $tgl_post,
                   'isi'         => $isi,
                   'id_user'     => $id_user,
                   'id_kategori' => $id_kategori,
                   'latitude'    => $latitude,
                   'langtitude'  => $langtitude,
                   'deskripsi_tempat'  => $dt,
                   'gambar'       => $name_img );
                  $this->Post_model->insert($data);
                  $this->session->set_flashdata('success', 'Berhasil ditambahkan');
                  redirect(base_url('admin/post/index'));
                }
                
              }

              public function update(){
                $id_post = $this->input->post('id_p');
                $judul = $this->input->post('judul');
                $isi = $this->input->post('isi');
                $id_kategori = $this->input->post('id_k');
                $latitude = $this->input->post('latitude');
                $langtitude = $this->input->post('langtitude');
                $dt = $this->input->post('dt');
                $path = './upload/';

                $kondisi = array('id_post' => $id_post);

                $config['upload_path'] = './upload/';
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
                        $data   = array(
                            'judul'=>$judul,
                            'isi'=>$isi,
                            'id_kategori'=>$id_kategori,
                            'latitude'=>$latitude,
                            'langtitude'=>$langtitude,
                            'deskripsi_tempat'=>$dt,
                            'gambar'=>$gambar['file_name']
                        );

                        if ($data['gambar']->gambar == '') {
                            // code...
                             @unlink($path.$this->input->post('filelama'));
                           
                        }else{
                            @link($path.$this->input->post('gambar'));
                        }

                         if ($this->Post_model->update($data,$kondisi)) {   // Update data
                            $this->session->set_flashdata('success', 'Data berhasil diubah');
                        } else {
                            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
                        }
                        redirect(base_url('admin/post'));
                    }
                }else{

          
          $data   = array('judul'=>$judul,'isi'=>$isi,'id_kategori'=>$id_kategori,'latitude'=>$latitude,'langtitude'=>$langtitude,'deskripsi_tempat'=>$dt);
          
    if ( $this->Post_model->update($data,$kondisi)) {   // Update data
        $this->session->set_flashdata('success', 'Data berhasil diubah');
    } else {
        $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
    }

         redirect(base_url('admin/post'));  
    }

              }




    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/post');
        $data['title'] ='Edit Post';
      
        $data['breadcrumb'] ='Edit Post';
        $post = $this->Post_model;
        $validation = $this->form_validation;
        $validation->set_rules($post->validate());

        if ($validation->run()) {
            $post->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["post"] = $post->getById($id);
        if (!$data["post"]) show_404();
        
        $this->load->view("admin/post/edit_post", $data);
    }

     public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->Post_model->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Postingan berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
         redirect("admin/post");
        
    }

}