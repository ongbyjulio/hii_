<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

   
     public function __construct()
    {
        parent::__construct();
        $this->load->model("Kategori_model");
        $this->load->model("Mail_model");
        $this->load->model("User_model");

        $this->load->library('form_validation');
        if(!$this->session->userdata('username')){
            $this->session->set_flashdata('message', '<div class="alert alert-warning text-center alert-dismissible fade show" role="alert">
                Anda Belum Login. 
                </div>');
            redirect(base_url("login"));}
    }

    public function index()
    {
        $data["title"] = 'Dashboard Admin'; 
        $data["breadcrumb"] = 'Dashboard';
        $data["post"] = $this->User_model->getPost();
        $data['bahari'] = $this->Kategori_model->getBahari();
        
        $data['kuliner'] = $this->Kategori_model->getKuliner();
        $this->load->view('admin/index',$data);
    }
}
