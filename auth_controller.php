<?php
session_start();
include_once 'koneksi.php';
include_once 'model/Member.php';
//1. tangkap request form (dari name2 element form)
$usename = $_POST['usename']; 
$password = $_POST['password']; 
//2. simpan ke sebuah array
$data = [
    $usename, // ? 1
    $password, // ? 2
];
//3. eksekusi tombol
$obj_member = new Member();
$rs = $obj_member->auth($data);
if(!empty($rs)){ //----------sukses login-----------
    //setelah sukses login diarahkan ke hal produk
    $_SESSION['MEMBER'] = $rs; //data user dikenal oleh session
    header('location:index.php?hal=header');
}
else{  //----------gagal login-----------
    echo '<script>alert("Username/Password Anda Salah!!!");history.go(-1);</script>';
}

