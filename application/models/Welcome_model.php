<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome_model extends CI_Model
{

    public function cekLogin()
    {
        $post = $this->input->post();
        $user = $this->db->get_where('user', ['username' => $post['username']])->row();

        if (!empty($user)) {
            if ($user->password == $post['password']) {
                $data = array(
                    'id' => $user->id,
                    'nama' => $user->nama,
                    'login' => true
                );
                $this->session->set_userdata($data);
            }
        }
    }

    public function getMakanan()
    {
        return $this->db->get('menu')->result();
    }

    public function saveCart()
    {
        $post = $this->input->post();

        $data = array(
            'tanggal' => date('Y/m/d'),
            'nama' => $post['nama'],
            'no_meja' => $post['nomeja'],
            'status' => 'Belum di bayar'
        );

        $this->db->insert('pesanan', $data);
        $id_user = $this->db->insert_id();



        foreach ($this->cart->contents() as $key) {
            $cart = array(
                'id_pesanan' => $id_user,
                'id_menu' => $key['id'],
                'jumlah' => $key['qty'],
            );

            $this->db->insert('listpesanan', $cart);
        }
        $this->cart->destroy();
    }

    public function getPesanan()
    {
        $this->db->where('status !=', 'lunas');
        return $this->db->get('pesanan')->result();
    }
}
    
    /* End of file Welcome_model.php */
