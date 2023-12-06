<?php
class Mentor{
    //memberi var 1
    private $koneksi;

    //memberi var 2
    public function __construct (){
        global $dbh; //globalkan instance obj di file koneksi.php
        $this-> koneksi = $dbh;
    }
    //member 3 fungsionalitas
    public function index(){
        $sql = "SELECT * FROM mentor
        ORDER BY mentor.id ASC";

        //$rs = $this->koneksi->query($sql);
        $ps = $this->koneksi->prepare($sql);
        $ps -> execute();
        $rs = $ps -> fetchAll();
        return $rs;
    }

    // Simpab data
    public function simpan($data){
        $sql = "INSERT INTO mentor (nama,email) 
        VALUES (?,?)";
        //$rs = $this->koneksi->query($sql);
        $ps = $this->koneksi->prepare($sql);
        $ps -> execute($data);
    }

    public function getMentor($id){
        $sql = "SELECT * FROM mentor 
        WHERE mentor.id = ?";
        //PDO prepare statement
		$ps = $this->koneksi->prepare($sql);
		$ps->execute([$id]);
		$rs = $ps->fetch();
		return $rs;
    }

     // ubah data
     public function ubah($data){
        $sql = "UPDATE mentor SET nama=?, email=? 
        WHERE id=?";
        //$rs = $this->koneksi->query($sql);
        $ps = $this->koneksi->prepare($sql);
        $ps -> execute($data);
    }

    // Hapus data
    public function hapus($id){
        $sql = "DELETE FROM mentor WHERE id=?"; 

        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
    }

}