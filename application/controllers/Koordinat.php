<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Koordinat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Data Koordinat Barang";
        $data['koordinat'] = $this->admin->get('koordinat');
        $this->template->load('templates/dashboard', 'koordinat/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('koordinat', 'Koordinat', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Data Koordinat Barang";
            $this->template->load('templates/dashboard', 'koordinat/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('koordinat', $input);
            if ($insert) {
                set_pesan('Data berhasil disimpan');
                redirect('koordinat');
            } else {
                set_pesan('Data gagal disimpan', false);
                redirect('koordinat/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Data Koordinat Barang";
            $data['koordinat'] = $this->admin->get('koordinat', ['id_koordinat' => $id]);
            $this->template->load('templates/dashboard', 'koordinat/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('koordinat', 'id_koordinat', $id, $input);
            if ($update) {
                set_pesan('Data berhasil disimpan');
                redirect('koordinat');
            } else {
                set_pesan('Data gagal disimpan', false);
                redirect('koordinat/add');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('koordinat', 'id_koordinat', $id)) {
            set_pesan('Data berhasil dihapus');
        } else {
            set_pesan('Data gagal dihapus', false);
        }
        redirect('koordinat');
    }
}
