<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perakitan extends CI_Controller
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
        $data['title'] = "Data Perakitan";
        $data['perakitan'] = $this->admin->getPerakitan();
        $this->template->load('templates/dashboard', 'perakitan/data', $data);
        
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_lift', 'Nama Lift', 'required');
        $this->form_validation->set_rules('barang_keluar_id', 'Barang Keluar', 'required');
        $this->form_validation->set_rules('user_id', 'User', 'required');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Data Perakitan";
            $data['barangkeluar'] = $this->admin->get('barang_keluar');
            $data['users'] = $this->admin->get('user');

            $kode_terakhir = $this->admin->getMax('perakitan', 'id_perakitan');
            $kode_tambah = substr($kode_terakhir, -3, 3);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 3, '0', STR_PAD_LEFT);
            $data['id_perakitan'] = 'P' . $number;

            $this->template->load('templates/dashboard', 'perakitan/add', $data);

        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('perakitan', $input);

            if ($insert) {
                set_pesan('Data berhasil disimpan');
                redirect('perakitan');
            } else {
                set_pesan('Data gagal ditambah');
                redirect('perakitan/add');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('perakitan', 'id_perakitan', $id)) {
            set_pesan('Data berhasil dihapus');
        } else {
            set_pesan('Data gagal dihapus', false);
        }
        redirect('perakitan');
    }
}
