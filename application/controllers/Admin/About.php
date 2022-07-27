<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("About_model");
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->library('upload');
        if(!$this->session->userdata('username')){
            $this->session->set_flashdata('message', '<div class="alert alert-warning text-center alert-dismissible fade show" role="alert">
                Anda Belum Login. 
                </div>');
            redirect(base_url("login"));}
    
    }

    public function index() 
    {
        
        $data["title"] = 'About';
        $data["breadcrumb"] = 'About'; 
        $data["about"] = $this->About_model->getAll();
        $data["k"] = $this->About_model->getAlledit();
        $this->load->view('admin/about/index',$data);
    }

     public function update(){
                $about_id = $this->input->post('about_id');
                $a = $this->input->post('ndw');
                $b = $this->input->post('kd');
                $c = $this->input->post('ntw');
                $d = $this->input->post('emailw');
                $e = $this->input->post('al');
                $path = './upload/kategori/';
                $kondisi = array('about_id' => $about_id);

                $config['upload_path'] = './upload/kategori/';
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
                            'nm_daerah'=>$a,
                            'no_telp'=>$c,
                            'email'=>$d,
                            'alamat'=>$e,
                            'about_daerah'=>$b,
                            'gambar'=>$gambar['file_name']
                        );

                        if ($data['gambar']->gambar == '') {
                            // code...
                             @unlink($path.$this->input->post('filelama'));
                           
                        }else{
                            @link($path.$this->input->post('gambar'));
                        }

                         if ($this->About_model->update($data,$kondisi)) {   // Update data
                            $this->session->set_flashdata('success', 'Data berhasil diubah');
                        } else {
                            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
                        }
                        redirect(base_url('admin/about'));
                    }
                }else{

          
          $data   = array(
                            'nm_daerah'=>$a,
                            'no_telp'=>$c,
                            'email'=>$d,
                            'alamat'=>$e,
                            'about_daerah'=>$b
                            
                        );
          
    if ( $this->About_model->update($data,$kondisi)) {   // Update data
        $this->session->set_flashdata('success', 'Data berhasil diubah');
    } else {
        $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
    }

         redirect(base_url('admin/about'));  
    }

              }

             

}