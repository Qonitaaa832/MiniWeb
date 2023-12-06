<?php
session_start();
include_once 'koneksi.php';
include_once 'model/Mentor.php';
//1. tangkap request form (dari name2 element form)

$nama = $_POST['nama']; 
$email = $_POST['email']; 
$tombol = $_POST['proses']; // untuk keperluan eksekusi sebuah tombol di form
//2. simpan ke sebuah array
$data = [

    $nama, // ? 2
    $email, // ? 2

];
//3. eksekusi tombol
$obj_mentor = new Mentor();
switch ($tombol) {
    case 'simpan':
        $obj_mentor -> simpan($data);
        break;

    case 'ubah':
        $data[] = $_POST['idx']; ;
        $obj_mentor -> ubah($data);
        break;
    
    case 'hapus': 
        $obj_mentor->hapus($_POST['id']); 
        break; //$_POST['id'] dari hidden field di tombol hapus
    
    default:
    header('location:index.php?hal=mentor_list');
        break;
}

//4. setelah selesai diarahakan kehalaman view
header('location:index.php?hal=mentor_list');
