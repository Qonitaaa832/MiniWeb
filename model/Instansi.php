<?php
class Instansi{
    //memberi var 1
    private $koneksi;

    //memberi var 2
    public function __construct (){
        global $dbh; //globalkan instance obj di file koneksi.php
        $this-> koneksi = $dbh;
    }
    //member 3 fungsionalitas
    public function index(){
        $sql = "SELECT * FROM instansi
        ORDER BY instansi.nama ASC";

        //$rs = $this->koneksi->query($sql);
        $ps = $this->koneksi->prepare($sql);
        $ps -> execute();
        $rs = $ps -> fetchAll();
        return $rs;
    }

    // Simpab data
    public function simpan($data){
        $sql = "INSERT INTO instansi (nama) 
        VALUES (?)";
        //$rs = $this->koneksi->query($sql);
        $ps = $this->koneksi->prepare($sql);
        $ps -> execute($data);
    }

    public function getInstansi($id){
        $sql = "SELECT * FROM instansi 
        WHERE instansi.id = ?";
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute([$id]);
		$rs = $ps->fetch();
		return $rs;
    }

     // ubah data
     public function ubah($data){
        $sql = "UPDATE instansi SET nama=? 
        WHERE id=?";
        //$rs = $this->koneksi->query($sql);
        $ps = $this->koneksi->prepare($sql);
        $ps -> execute($data);
    }

    // Hapus data
    public function hapus($id){
        $sql = "DELETE FROM instansi WHERE id=?"; 

        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
    }
}