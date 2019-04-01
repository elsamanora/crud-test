<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("Barang_model"); //you have called the model here
        $this->load->library('form_validation');
    }

    public function tampil()
    {
        // $this->load->model('Barang_model'); //and you don't need to call the model here 
        $data['barang'] = $this->Barang_model->ambildata()->result(); //barang itu bukan db melainkan array 
        $this->load->view('admin/barang/daftar_barang', $data); //this is wrong ////this located in admin folders
    }

    public function tambah()
    {
        $this->load->view('admin/barang/tambah_barang');
    }
    public function tambahData()
    {
        $this->form_validation->set_rules('val_kd_barang', "Kode Barang", "trim|required|is_unique[barang.kode_barang]", ['required' => 'Kode Barang Tidak Boleh Kosong!!', 'is_unique' => 'Kode barang sudah digunakan']);

        $this->form_validation->set_rules('val_nama_barang', "Nama Barang", "trim|required", ['required' => 'Nama Barang tidak boleh kosong!!']); //isi pesan required apa

        $this->form_validation->set_rules('val_deskripsi_barang', "Deskripsi", "trim|required", ['required' => 'Deskripsi Barang tidak boleh kosong!!']); //trim untuk hilangkan spasi di depan inputan

        $this->form_validation->set_rules('val_stok_barang', "stok Barang", "trim|required|numeric", ['required' => 'Stok Barang Tidak Boleh Kosong !!', 'numeric' => 'Stok hanya boleh di isi dengan angka !!!']);

        $this->form_validation->set_rules('val_harga_barang', "harga Barang", "trim|required|numeric", ['required' => 'Harga Barang Tidak Boleh Kosong !!', 'numeric' => 'Harga hanya boleh di isi dengan angka !!!']);


        //if nya belum diganti 
        if ($this->form_validation->run() == false) {
            $this->tambah();
            return false;
        } else {
            $post = [
                'kd_barang' => $this->input->post('val_kd_barang', true), //kd_barang itu sembarang kah ? trus val_kd_barang itu ada di value view/tambah_barang
                'nama' => $this->input->post('val_nama_barang', true),
                'deskripsi' => $this->input->post('val_deskripsi_barang', true),
                'stok' => $this->input->post('val_stok_barang', true),
                'harga' => $this->input->post('val_harga_barang', true),
            ];
            $this->barang_model->insertDataproduk($post);
            $this->session->set_flashdata('success', '<div class="alert alert-success" style="margin-bottom:0px" role="alert">Data berhasil ditambahkan :)</div>');
            redirect('barang');
            return false;
        }
    }

    /*public function tambah()
    {
        $this->form_validation->set_rules('kode', 'Kode', 'requied');
        $this->form_validation->set_rules('nama', 'Nama', 'required'); //membuat form validation('name', 'pesan eror', 'aturan harus diisi')
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('harga', 'Stok', 'required');
        if ($this->form_validation->run() == false) { //kondisi apabila dijalankan salah
            $this->load->view('admin/barang/tambah_barang');
        } else {
            $this->Barang_model->tambahDataBarang();

            redirect('barang');
        }
    }

    /*public function tambah()
    {
        $this->load->view('admin/barang/tambah_barang'); //sempat error karena manggilnya langsung tambah_barang(admin/barangnya ga ada ehehehe :v) 
    }
    public function tambah_aksi()
    {
        $kode_barang = $this->input->post('kode_barang');
        $nama_barang = $this->input->post('nama_barang');
        $deskripsi = $this->input->post('deskripsi_barang');
        $stok = $this->input->post('stok_barang');
        $harga = $this->input->post('harga_barang');

        $data = array(
            'kode_barang' => $kode_barang,
            'nama_barang' => $nama_barang,
            'deskripsi_barang' => $deskripsi,
            'stok_barang' => $stok,
            'harga_barang' => $harga
        );
        $this->barang_model->input_data($data, 'barang');
        redirect('admin/barang/tampil');
    }

    /*function hapus($kode_barang)
    {
        $where = array('kode_barang' => $kode_barang);
        $this->barang_model-- > hapus_data($where, 'barang');
        redirect('barang/tampil');
    }

    public function tambah() // tambah pak dika
    {
        $data['judul'] = 'Form Tambah Data Barang';
        $this->form_validation->set_rules('nama', 'Nama', 'required'); //membuat form validation('name', 'pesan eror', 'aturan harus diisi')
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('harga', 'Stok', 'required');
        if ($this->form_validation->run() == false) { //kondisi apabila dijalankan salah
            $this->load->view('admin/__partial/header', $data);
            $this->load->view('admin/barang/tambah_barang');
        } else {
            $this->Barang_model->tambahDataBarang();

            redirect('barang');
        }
    }
     public function tambah ()
    {
        $this->form_validation->set_rules('nama','Nama','required');//membuat form validation('name', 'pesan eror', 'aturan harus diisi')
        $this->form_validation->set_rules('deskripsi','deskripsi','required');
        $this->form_validation->set_rules('stok','stok','required');
        $this->form_validation->set_rules('harga','harga','required');
        if( $this->form_validation->run() == FALSE){ //kondisi apabila dijalankan
        }   
        else {
            $this->Barang_model->tambahDataBarang();
            
            redirect('barang'); // barang itu apa ?
           
        } 


    public function tambah() // gatau tambah siapa
    {
        $barang = $this->Barang_model;// itu untuk manggil fungsi yang ada di barang_model
        $validation = $this->form_validation;
        $validation->set_rules($barang->rules());
        
        if ($validation->run()) { //di cek apakah valid atau tidak
            $barang->save(); // kalau valid nanti $barang disimpan ke dalam database
            $this->session->set_flashdata('Berhasil disimpan');
        }
        $this->load->view("admin/barang/tambah_barang"); // kalau sudah berhasil valiadasi maka munculkan form tambah 
    } 

    public function edit($kode_barang = null) // alurnya ?
    {
        if (!isset($kode_barang)) redirect('admin/barang'); //dikembalikan ke method index di barang yaitu list
       
        $barang = $this->Barang_model; // itu untuk manggil fungsi yang ada di barang_model, boleh berbeda
        $validation = $this->form_validation; //objek validasi
        $validation->set_rules($barang->rules());//menerapkan rules

        if ($validation->run()) {
            $barang->edit();//menyimpan data
            $this->session->set_flashdata('Berhasil disimpan!');
        }

        $data["barang"] = $barang->getById($kode_barang); 
        if (!$data["barang"]) show_404();
        
        $this->load->view("admin/barang/edit_barang", $data);
    }

    public function delete($kode_barang=null)
    {
        if (!isset($kode_barang)) show_404();
        
        if ($this->barang_model->delete($kode_barang)) {
            redirect(site_url('admin/barang'));
        }
    }*/
}
