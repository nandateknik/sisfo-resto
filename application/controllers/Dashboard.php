<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
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
        $data['counttotal']  = $this->dashboard_model->countPembayaran();

        $data['pesanan'] = $this->dashboard_model->getPesanan();
        $this->load->view('dashboard', $data);
    }

    public function pembayaran($id)
    {
        $data['pesanan'] = $this->dashboard_model->getPesananById($id);
        $data['listpesanan'] = $this->dashboard_model->getListpesanan($id);
        $this->load->view('pembayaran', $data);
    }

    public function insertPembayaran()
    {
        if ($this->dashboard_model->insertPembayaran()) {
            $this->success('berhasil !', 'Kamu sudah melakukan pembayaran');
        } else {
            $this->danger('Gagal !', 'Kamu gagal melakukan pembayaran');
        }

        redirect(base_url('dashboard'));
    }
}
    
    /* End of file Dashboard.php */
