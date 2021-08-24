<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{

    public function getLaporan()
    {
        $post = $this->input->post();
        $query = $this->db->select('*')
            ->from('pembayaran')
            ->where('waktu >=', $post['dari'])
            ->where('waktu <=', $post['hingga'])
            ->get();
        return $query->result();
    }
}
    
    /* End of file Laporan_model.php */
