<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Location_model");
        $this->load->model("Mail_model");
        $this->load->library('form_validation');

        if(!$this->session->userdata('username')){
            $this->session->set_flashdata('message', '<div class="alert alert-warning text-center alert-dismissible fade show" role="alert">
                Anda Belum Login. 
                </div>');
            redirect(base_url("login"));}
    
    }

    public function index() 
    {
        $data["title"] = 'Halaman Admin';
        $data["breadcrumb"] = 'Location'; 
      
        $data["post"] = $this->Location_model->getMaps();
        $this->load->view('admin/lokasi/index',$data);
    }


    function viewMaps(){
        // get personil
        $id_post = $this->input->post('id_post');
        $this->db->where('id_post', $id);
        $data_pegawai = $this->db->get('pegawai');

        $cek = $data_pegawai->row_array();

        if (!$this->input->is_ajax_request()) {
            show_404();
        }else{
            if ($cek['latitude']!=null){
                $status = 'success';
                $msg = $data_pegawai->result();
            }else{
                $status = 'error';
                $msg = 'alamat tidak ditemukan';
                $data_pegawai = null;
            }
            $this->output->set_content_type('application/json')->set_output(json_encode(array('status'=>$status,'msg'=>$msg,'data_pegawai'=>$data_pegawai)));
        }
    }
}
