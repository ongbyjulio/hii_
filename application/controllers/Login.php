<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();     
		$this->load->model('M_login');

	}
	public function index()
	{
		$this->load->view('login');
	} 

	  function aksi_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => md5($password),
            'status'   => 'aktif'
            );
        $cek = $this->M_login->cek_login("user",$where);
        if($cek->num_rows() == 1){

        	foreach($cek->result() as $data){
        		$sess_data['id_user']= $data->id_user;
        		$sess_data['nama']= $data->nama;
                $sess_data['akses']= $data->akses;
        		$sess_data['gambar']= $data->gambar;
        		$sess_data['username']= $data->username;
        		$this->session->set_userdata($sess_data);
        	}
            /*$data_session = array(
            	'id_user'  => $id_user,
                'username' => $username,
                'status' => "login"
                );*/
 
           
             $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                Anda Berhasil Login. 
                </div>');
            redirect('admin/home');
 
        }else{

            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                Username/Password Salah atau akun anda belum aktif. 
                </div>');
            redirect("login");
            
        }
    }
 
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

}
