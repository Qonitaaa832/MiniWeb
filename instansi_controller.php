<?php
session_start();
include_once 'koneksi.php';
include_once 'model/Instansi.php';
//1. tangkap request form (dari name2 element form)

$nama = $_POST['nama']; 
$tombol = $_POST['proses']; // untuk keperluan eksekusi sebuah tombol di form
//2. simpan ke sebuah array
$data = [

    $nama, // ? 2

];
//3. eksekusi tombol
$obj_instansi = new Instansi();
switch ($tombol) {
    case 'simpan':
        $obj_instansi -> simpan($data);
        break;

    case 'ubah':
        $data[] = $_POST['idx']; ;
        $obj_instansi -> ubah($data);
        break;
    
    case 'hapus': $obj_instansi->hapus($_POST['id']); break; //$_POST['id'] dari hidden field di tombol hapus
    
    default:
    header('location:index.php?hal=instansi_list');
        break;
}

//4. setelah selesai diarahakan kehalaman view
header('location:index.php?hal=instansi_list');
