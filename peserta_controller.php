<?php
session_start();
include_once 'koneksi.php';
include_once 'model/Peserta.php';
//1. tangkap request form (dari name2 element form)
$kode = $_POST['kode']; 
$nama = $_POST['nama']; 
$gender = $_POST['jenisKelamin'];
$tmpt_lhr = $_POST['tmpt_lhr']; 
$tgl_lhr = $_POST['tgl_lhr'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email']; 
$mentor = $_POST['mentor']; 
$instansi = $_POST['instansi']; 
$agama = $_POST['agama']; 
$tombol = $_POST['proses']; // untuk keperluan eksekusi sebuah tombol di form
//2. simpan ke sebuah array
$data = [
    $kode, // ? 1
    $nama, // ? 2
    $gender,
    $tmpt_lhr,
    $tgl_lhr,
    $alamat,
    $no_hp, // ? 3
    $email, // ? 3
    $mentor, // ? 4
    $instansi, // ? 5
    $agama, // ? 6
];
//3. eksekusi tombol
$obj_peserta = new Peserta();
switch ($tombol) {
    case 'simpan':
        $obj_peserta -> simpan($data);
        break;

    case 'ubah':
        $data[] = $_POST['idx']; ;
        $obj_peserta -> ubah($data);
        break;
    
    case 'hapus': $obj_peserta->hapus($_POST['id']); break; //$_POST['id'] dari hidden field di tombol hapus
    
    
    default:
    header('location:index.php?hal=peserta_msib5');
        break;
}

//4. setelah selesai diarahakan kehalaman view
header('location:index.php?hal=peserta_msib5');
