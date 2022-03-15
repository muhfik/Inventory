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
        $this->form_validation->set_rules('barang_id', 'Barang', 'required');
        $this->form_validation->set_rules('barang_keluar_id', 'Barang Keluar', 'required');
        $this->form_validation->set_rules('user_id', 'User', 'required');
    }


    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Data Perakitan";
            $data['barang'] = $this->admin->get('barang');
            $data['barangkeluar'] = $this->admin->get('barang_keluar');
            $data['users'] = $this->admin->get('user');

            $kode_terakhir = $this->admin->getMax('perakitan', 'id_perakitan');
            $kode_tambah = substr($kode_terakhir, -3, 3);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 3, '0', STR_PAD_LEFT);
            $data['id_perakitan'] = 'P' . $number;

            $this->template->load('templates/dashboard', 'perakitan/add', $data);
        }      
    }

    function simpan_perakitan()
    {
        $id_perakitan = $this->input->post('id_perakitan');
        $nama_lift = $this->input->post('nama_lift');
        $komponen = $this->input->post('komponen');
        $result=implode("<br />", $komponen);
        $barang_keluar_id = $this->input->post('barang_keluar_id');
        $user_id = $this->input->post('user_id');
        $desain = $this->uploadfoto();
        $data = array(
            'id_perakitan' => $id_perakitan,
            'nama_lift' => $nama_lift,
            'komponen' => $result,
            'barang_keluar_id' => $barang_keluar_id,
            'user_id' => $user_id,
            'desain' => $desain
            );
        set_pesan('Data berhasil disimpan');
        $this->admin->input_data($data,'perakitan');
            redirect('perakitan');
        }
    
    public function uploadfoto()
    {
        $config['upload_path']          = 'upload';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['overwrite']            = false;
        $config['max_size']             = 2048; // 1MB

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
            if ($this->upload->do_upload('desain')) 
            {
                return $this->upload->data("file_name");
            }
            $error = $this->upload->display_errors();
            echo $error;
            exit;
            // return "default.jpg";
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
