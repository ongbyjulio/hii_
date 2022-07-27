  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  date_default_timezone_set('Asia/Jakarta');

  class Home extends CI_Controller {
 
   public function __construct()
   {
    parent::__construct();
    $this->load->model("Kategori_model");
    $this->load->model("Post_model");
    $this->load->model("Mail_model");
    $this->load->model("About_model");
     $this->load->model("Comment_model");
    $this->load->database();
    $this->load->helper(array('url'));
    $this->load->library('form_validation');
} 

public function index()
{
    $data["title"] = 'Welcome To Wiskul Kabupaten Lahat';
    $this->load->view('user/index',$data);
}

public function detail($id = null)
{
    if (!isset($id)) redirect('user/home/bahari');
    $data['title'] ='Detail Blog';
    $data['recent'] = $this->Post_model->recent();
    $data['comment'] = $this->Comment_model->comment($id);
    $post = $this->Post_model;
    $data["post"] = $post->getById($id);
    if (!$data["post"]) show_404(); 
    
    
    $this->load->view("user/blog_detail", $data);
}


public function about()
{
    $data["title"] = 'About';
    $data["bahari"] = $this->Kategori_model->getBahari();
    $data["about"] = $this->About_model->getAll();
    $data["kuliner"] = $this->Kategori_model->getKuliner();
    $this->load->view('user/about',$data);
}

public function blog()
{
 /* if ($kat == 'all') {*/
    $data["title"] = 'Blog';
    $data["page"] = 'All Post';
    $jumlah_data = $this->Post_model->getAll_Content();
    $this->load->library('pagination');
    $config['base_url'] = base_url().'User/home/blog';
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 4;
    $config['first_link']       = 'First';
    $config['last_link']        = 'Last';
    $config['next_link']        = 'Next';
    $config['prev_link']        = 'Prev';
    $config['full_tag_open']    = '<div class="blog-pagination"><nav><ul class="justify-content-center">';
    $config['full_tag_close']   = '</ul></nav></div>';
    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']    = '</span></li>';
    $config['cur_tag_open']     = '<li class="page-item active"><a class="page-link">';
    $config['cur_tag_close']    = '<span class="sr-only"></span></a></li>';
    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']  = '</span>Next</li>';
    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']  = '</span></li>';
    $from = $this->uri->segment(4);
    $this->pagination->initialize($config);
    $data['recent'] = $this->Post_model->recent();
    $data['post'] = $this->Post_model->GetAll_Page($config['per_page'],$from);
    $this->load->view('user/blog',$data);
}

public function bahari(){
   $data["title"] = 'Blog Wisata';
   $data["page"] = 'Wisata Bahari';
   $data['recent'] = $this->Post_model->recent();
   $jumlah_data = $this->Post_model->totalWisata();
   $this->load->library('pagination');
   $config['base_url'] = base_url().'User/home/bahari';
   $config['total_rows'] = $jumlah_data;
   $config['per_page'] = 4;
   $config['first_link']       = 'First';
   $config['last_link']        = 'Last';
   $config['next_link']        = 'Next';
   $config['prev_link']        = 'Prev';
   $config['full_tag_open']    = '<div class="blog-pagination"><nav><ul class="justify-content-center">';
   $config['full_tag_close']   = '</ul></nav></div>';
   $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
   $config['num_tag_close']    = '</span></li>';
   $config['cur_tag_open']     = '<li class="page-item active"><a class="page-link">';
   $config['cur_tag_close']    = '<span class="sr-only"></span></a></li>';
   $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
   $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
   $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
   $config['prev_tagl_close']  = '</span>Next</li>';
   $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
   $config['first_tagl_close'] = '</span></li>';
   $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
   $config['last_tagl_close']  = '</span></li>';
   $from = $this->uri->segment(4);
   $this->pagination->initialize($config);
   $data['post'] = $this->Post_model->GetAll_Wisata($config['per_page'],$from);
   $this->load->view('user/blog',$data);
}

public function kuliner(){
    $data["title"] = 'Blog Kuliner';
    $data['recent'] = $this->Post_model->recent();
    $data["page"] = 'Kuliner';
    $jumlah_data = $this->Post_model->totalKuliner();
    $this->load->library('pagination');
    $config['base_url'] = base_url().'User/home/kuliner';
    $config['total_rows'] = $jumlah_data;
    $config['per_page'] = 4;
    $config['first_link']       = 'First';
    $config['last_link']        = 'Last';
    $config['next_link']        = 'Next';
    $config['prev_link']        = 'Prev';
    $config['full_tag_open']    = '<div class="blog-pagination"><nav><ul class="justify-content-center">';
    $config['full_tag_close']   = '</ul></nav></div>';
    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']    = '</span></li>';
    $config['cur_tag_open']     = '<li class="page-item active"><a class="page-link">';
    $config['cur_tag_close']    = '<span class="sr-only"></span></a></li>';
    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']  = '</span>Next</li>';
    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']  = '</span></li>';
    $from = $this->uri->segment(4);
    $this->pagination->initialize($config);
    $data['post'] = $this->Post_model->GetAll_Kuliner($config['per_page'],$from);
    $this->load->view('user/blog',$data);
}





    public function contact_us()
    {
        $data['title'] ='Contact US';
        $data['page'] ='Contact US';
        $this->load->view("user/contact_us");

    }

    public function proses()
    {
        if(isset($_POST['submit'])) {
            $inbox = $this->input->post(null, TRUE);
            $this->Mail_model->save($inbox);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Your message has been sent.</strong>  Thank you!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        } 
        redirect('user/home/contact_us');
    }

    public function comment($id)
    {

        if(isset($_POST['submit'])) {
            $comment = $this->input->post(null, TRUE);
            $this->Comment_model->save($comment);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Your Comment has been sent.</strong>  Thank you!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        } 
        redirect('user/home/detail/'.$id);
    }


}
