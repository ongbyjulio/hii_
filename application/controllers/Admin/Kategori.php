 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Kategori_model");
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
       
        $data["title"] = 'Kategori Post';
        $data["breadcrumb"] = 'Kategori'; 
        $data["kat"] = $this->Kategori_model->getAll();
        $this->load->view('admin/kategori/index',$data);
    }

       public function update(){
                $id_kategori = $this->input->post('id_kategori');
                $ket = $this->input->post('keterangan');
                $path = './upload/kategori/';
                $kondisi = array('id_kategori' => $id_kategori);

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
                            'keterangan'=>$ket,
                            'gambar'=>$gambar['file_name']
                        );

                        if ($data['gambar']->gambar == '') {
                            // code...
                             @unlink($path.$this->input->post('filelama'));
                           
                        }else{
                            @link($path.$this->input->post('gambar'));
                        }

                         if ($this->Kategori_model->update($data,$kondisi)) {   // Update data
                            $this->session->set_flashdata('success', 'Data berhasil diubah');
                        } else {
                            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
                        }
                        redirect(base_url('admin/kategori'));
                    }
                }else{

          
          $data   = array(
                            'keterangan'=>$ket,
                            
                            
                        );
          
    if ( $this->Kategori_model->update($data,$kondisi)) {   // Update data
        $this->session->set_flashdata('success', 'Data berhasil diubah');
    } else {
        $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
    }

         redirect(base_url('admin/kategori'));  
    }

              }
}
