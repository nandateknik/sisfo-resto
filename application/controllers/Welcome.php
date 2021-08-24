<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$this->load->model('welcome_model');
		$this->load->library('cart');
		$this->load->library('form_validation');
	}

	public function pembayaran()
	{
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


	public function addCart()
	{
		$post = $this->input->post();
		$data = array(
			array(
				'id'      => $post['id'],
				'qty'     => 1,
				'price'   => $post['harga'],
				'name'    => $post['nama']
			)
		);
		$this->cart->insert($data);
	}

	public function index()
	{

		$data['makanan'] = $this->welcome_model->getMakanan();
		$this->load->view('welcome_message', $data);
	}

	public function login()
	{
		$this->load->view('auth');
	}

	public function cekLogin()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run()) {
			$this->welcome_model->cekLogin();

			if ($this->session->userdata('login')) {
				$this->success('Berhasil !', 'Berhasil login');
				redirect(base_url('dashboard'));
			} else {
				$this->danger('Gagal !', 'Coba periksa kembali username dan password kamu');
				redirect(base_url('welcome/login'));
			}
		}
	}

	public function logout()
	{
		session_destroy();
		redirect(base_url('welcome/login'));
	}

	public function minCart()
	{
		$post = $this->input->post();
		$qty  = $post['qty'] - 1;
		$data = array(
			'rowid' => $post['rowid'],
			'qty'   => $qty
		);
		$this->cart->update($data);
	}

	public function plsCart()
	{
		$post = $this->input->post();
		$qty  = $post['qty'] + 1;
		$data = array(
			'rowid' => $post['rowid'],
			'qty'   => $qty
		);
		$this->cart->update($data);
	}

	public function deleteCartRow($id)
	{
		$this->cart->remove($id);
		redirect(base_url('welcome/checkout'));
	}


	public function checkout()
	{
		$this->load->view('checkout');
	}

	public function pesan()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nomeja', 'No Meja', 'required');

		if ($this->form_validation->run()) {
			$this->welcome_model->saveCart();
			$this->success('Berhasil', 'Kamu berhasil melakukan pemesanan dan silahkan melakukan pembayaran dikasir');
		}

		redirect(base_url());
	}
}
