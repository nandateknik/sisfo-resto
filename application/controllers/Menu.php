<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('menu_model');
    }

    public function danger($title, $text)
    {
        $data = '
        <script>
        swal({
            title: "' . $title . '",
            text: "' . $text . '",
            icon: "warning",
            dangerMode: true,
          })          
        </script>';
        $this->session->set_userdata('pesan', $data);
    }

    public function success($title, $text)
    {
        $data = '
        <script>
        swal({
            title: "' . $title . '",
            text: "' . $text . '!",
            icon: "success",
            button: "Confirm",
        });
        </script>';
        $this->session->set_userdata('pesan', $data);
    }

    public function index()
    {
        $data['makanan'] = $this->menu_model->getMakanan();
        $this->load->view('menu/result', $data);
    }

    public function tambah()
    {
        $this->load->view('menu/tambah');
    }

    public function insertMenu()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run()) {
            $this->menu_model->insertMakanan();
            $this->success('Berhasil !', 'Berhasil Menambah Menu Makanan Baru');
        } else {
            $this->danger('Gagal !', 'Gagal Menambah menu makanan baru');
        }

        redirect(base_url('menu/tambah'));
    }

    public function edit($id)
    {
        $data['makanan'] = $this->menu_model->getMakananById($id);
        $this->load->view('menu/edit', $data);
    }

    public function updateMenu()
    {
        if ($this->menu_model->updateMakanan()) {
            $this->success('Berhasil !', 'Kamu berhasil mengganti makanan');
        } else {
            $this->danger('Gagal !', 'Kamu gagal mengganti makanan');
        }
        redirect(base_url('menu'));
    }

    public function updateFoto()
    {
        if ($this->menu_model->updateimage()) {
            $this->success('Berhasil !', 'Kamu berhasil mengganti makanan');
        } else {
            $this->danger('Gagal !', 'Kamu gagal mengganti makanan');
        }
        redirect(base_url('menu'));
    }
}
    
    /* End of file Menu.php */
