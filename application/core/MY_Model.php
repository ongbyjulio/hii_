<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    protected $table = '';
    protected $perPage = 5; // Banyak data tiap halaman

    public function __construct()
    {
        parent::__construct();

        
    }
  public function validate()
    {
        $this->load->library('form_validation');

        // Pesan error
        $this->form_validation->set_error_delimiters(
            '<small class="form-text text-danger">',
            '</small>'
        );

        // Panggil rules
        // getValidationRules() diletakkan di file-file model turunan nanti karena tiap model punya validationnya sendiri
        $validationRules = $this->getValidationRules();

        $this->form_validation->set_rules($validationRules);    // Set rules dari model2 nanti

        return $this->form_validation->run();  // Jalankan validasi
    }
  
}