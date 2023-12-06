<?php
class Peserta{
    //memberi var 1
    private $koneksi;

    //memberi var 2
    public function __construct (){
        global $dbh; //globalkan instance obj di file koneksi.php
        $this-> koneksi = $dbh;
    }
    //member 3 fungsionalitas
    public function index(){
        $sql = "SELECT person.*, mentor.nama AS namamentor, instansi.nama AS universitas, agama.nama AS namaagama
                FROM person 
                INNER JOIN mentor ON mentor.id = person.mentor_id 
                INNER JOIN instansi ON instansi.id = person.instansi_id
                INNER JOIN agama ON agama.id = person.agama_id
                ORDER BY person.id ASC";

        //$rs = $this->koneksi->query($sql);
        $ps = $this->koneksi->prepare($sql);
        $ps -> execute();
        $rs = $ps -> fetchAll();
        return $rs;
    }

    // Simpab data
    public function simpan($data){
        $sql = "INSERT INTO person (kode, nama, gender, tmpt_lhr, tgl_lhr, alamat, no_hp, email, mentor_id, instansi_id, agama_id) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        //$rs = $this->koneksi->query($sql);
        $ps = $this->koneksi->prepare($sql);
        $ps -> execute($data);
    }

    // View data
    public function getPeserta($id){
        $sql = "SELECT person.*, mentor.nama AS namamentor, instansi.nama AS universitas, agama.nama AS namaagama
                FROM person
                INNER JOIN mentor ON mentor.id = person.mentor_id  
                INNER JOIN instansi ON instansi.id = person.instansi_id
                INNER JOIN agama ON agama.id = person.agama_id
                WHERE person.id = ?";
                
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute([$id]);
		$rs = $ps->fetch();
		return $rs;
    }

    // ubah data
    public function ubah($data){
        $sql = "UPDATE person SET kode=?, nama=?, gender=?, tmpt_lhr=?, tgl_lhr=?, alamat=?, no_hp=?, email=?, mentor_id=?, instansi_id=?, agama_id=? 
        WHERE id=?";
        //$rs = $this->koneksi->query($sql);
        $ps = $this->koneksi->prepare($sql);
        $ps -> execute($data);
    }

    // Hapus data
    public function hapus($id){
        $sql = "DELETE FROM person WHERE id=?"; 

        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
    }

    //member 3 fungsionalitas
    public function filter($mentor){
        $sql = "SELECT person.*, mentor.nama AS namamentor, instansi.nama AS universitas, agama.nama AS namaagama
                FROM person 
                INNER JOIN mentor ON mentor.id = person.mentor_id 
                INNER JOIN instansi ON instansi.id = person.instansi_id
                INNER JOIN agama ON agama.id = person.agama_id
                WHERE mentor.id = ?
                ORDER BY person.id ASC";

        //$rs = $this->koneksi->query($sql);
        $ps = $this->koneksi->prepare($sql);
        $ps -> execute([$mentor]);
        $rs = $ps -> fetchAll();
        return $rs;
    }



}
