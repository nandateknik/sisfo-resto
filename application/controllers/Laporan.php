<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('laporan_model');
    }


    public function index()
    {
        $this->form_validation->set_rules('dari', 'Dari Tanggal', 'required');

        if ($this->form_validation->run()) {
            $data['laporan'] = $this->laporan_model->getLaporan();
            $this->load->view('laporan', $data);
        } else {
            $this->load->view('laporan');
        }
    }
}
    
    /* End of file Laporan.php */
