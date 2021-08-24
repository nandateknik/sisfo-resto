<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    public function getPesanan()
    {
        $this->db->where('status !=', 'lunas');
        return $this->db->get('pesanan')->result();
    }

    public function getPesananById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('pesanan')->row();
    }

    public function getListpesanan($id)
    {
        $query = $this->db->select('menu.nama,menu.harga,listpesanan.jumlah,(menu.harga*listpesanan.jumlah) as total')
            ->from('listpesanan')
            ->join('menu', 'menu.id = listpesanan.id_menu')
            ->where('listpesanan.id_pesanan', $id)
            ->get();
        return $query->result();
    }

    public function insertPembayaran()
    {
        $post = $this->input->post();
        $id = $this->session->userdata('id');

        $data = array(
            'id_pesanan' => $post['id'],
            'total' => $post['total'],
            'dibayar' => $post['dibayar'],
            'kembalian' => $post['kembalian'],
            'id_user' => $id,
            'waktu' => date("Y/m/d")
        );

        $this->db->insert('pembayaran', $data);
        $this->db->where('id', $post['id']);
        $this->db->update('pesanan', ['status' => 'lunas']);

        return true;
    }

    public function countPembayaran()
    {
        $query = $this->db->select('SUM(total) as total')
            ->from('pembayaran')
            ->where('waktu', date('Y/m/d'))
            ->get();

        return $query->row();
    }
}
    
    /* End of file Dashboard_model.php */
