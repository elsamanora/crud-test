<?php
defined('BASEPATH') or exit('No direct script access allowed');

class barang_model extends CI_Model
{
    //mendefinisikan tabel dan field yang ada 
    /*private $tabel = "barang";
    public $kode_barang;
    public $nama_barang;
    public $deskripsi_barang;
    public $stok_barang;
    public $harga_barang;*/


    //untuk ambil data keseluruhan dari tabel barang 
    /*public function getAllBarang() {
        //mysqli_query("Select * from barang;");
        return $this->db->get($this->_tabel)->result();
    }*/

    // untuk ambil data per baris berdasarkan kode barang 
    public function ambildata()
    {
        // mysqli_query ("select * from barang where kode_barang='.$kode_barang'")
        return $this->db->get('barang');
    }

    public function insertDataProduk($data)
    {
        $input = [
            'kode_barang' => $data['kd_barang'],
            'nama_barang' => $data['nama'],
            'deskripsi_barang' => $data['deskripsi'],
            'stok_barang' => $data['stok'],
            'harga_barang' => $data['harga']
        ];
        $this->db->insert($this->table, $input);
    }
    /*public function tambahDataBarang()
    {
        $data = [
            "kode" => $this->input->post('kode', true),
            "nama" => $this->input->post('nama', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            "stok" => $this->input->post('stok', true),
            "harga" => $this->input->post('harga', true),
        ];

        $this->db->insert('barang', $data);
    }


    /*public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    /*function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    /*untuk menyimpan hasil inputan ke database
    public function save (){
        $post = $this->input->post();
        $this->kode_barang=$post["kodebarang"];
        $this->nama_barang=$post["namabarang"];
        $this->deskripsi_barang=$post["deskripsibarang"];
        $this->stok_barang=$post["stokbarang"];
        $this->harga_barang=$post["hargabarang"];
        $this->db->insert($this->_table, $this);
    }

    //untuk edit data
    public function edit($kode){
        $post = $this->input->post();
        $this->kode_barang=$post["kodebarang"];
        $this->nama_barang=$post["namabarang"];
        $this->deskripsi_barang=$post["deskripsibarang"];
        $this->stok_barang=$post["stokbarang"];
        $this->harga_barang=$post["hargabarang"];
        $this->db->update($this->_table, $this, array('kodebarang' => $post['kodebarang']));
    }

    //untuk hapus data
    public function delete($kode){
        $this->db->delete($this->_table, array("product_id" => $kode));
    }*/
}
