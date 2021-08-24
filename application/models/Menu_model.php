<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    public function insertMakanan()
    {
        $post = $this->input->post();

        $config['upload_path']          = './assets/foto/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = 'makanan' . uniqid();
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $foto = $this->upload->data("file_name");
        } else {
            $foto = 'no-image.jpg';
        }

        $data = array(
            'nama' => $post['nama'],
            'harga' => $post['harga'],
            'foto' => $foto,
            'status' => 'tersedia',
        );
        $this->db->insert('menu', $data);
    }

    public function getMakanan()
    {
        return $this->db->get('menu')->result();
    }

    public function getMakananById($id)
    {
        return $this->db->get_where('menu', ['id' => $id])->row();
    }

    public function updateMakanan()
    {
        $post = $this->input->post();

        $data = array(
            'nama' => $post['nama'],
            'harga' => $post['harga']
        );
        $this->db->where('id', $post['id']);
        $this->db->update('menu', $data);
        return true;
    }

    public function updateimage()
    {
        $post = $this->input->post();
        $oldfoto = $post['oldfoto'];
        array_map('unlink', glob(FCPATH . "./assets/foto/$oldfoto"));

        $config['upload_path']          = './assets/foto/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = uniqid();
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $foto = $this->upload->data("file_name");
            $this->db->where('id', $post['id']);
            $this->db->update('menu', ['foto' => $foto]);
            return true;
        } else {
            return false;
        }
    }
} 
    
    /* End of file Menu_model.php */
