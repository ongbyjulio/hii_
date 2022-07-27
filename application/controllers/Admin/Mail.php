<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
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
        $id = $this->session->userdata('id_user');
        $data["title"] = 'Inbox';
        $data["breadcrumb"] = 'Message'; 
        $data["mail"] = $this->Mail_model->getAll($id);
        $this->load->view('admin/mail/index',$data);
    }

     public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/mail');

        $mail = $this->Mail_model;
        $validation = $this->form_validation;
        $validation->set_rules($mail->edits());
        
        if ($validation->run()) {
            $mail->update();
            
            redirect("admin/mail");
        }
        
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

      public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->Mail_model->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Pesan berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
         redirect("admin/mail");
        
    }
}
