<?php
if($_SESSION['MEMBER']['role'] == 'admin'){
?>

<header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-12 col-12">
                            

                            <h2 class="text-white" align="center">Form Mentor</h2>
                        </div>

                    </div>
                </div>
</header>

<?php

//------------proses edit data----------------
$id = $_REQUEST['id']; //tangkap request id di url
$obj_mentor = new Mentor(); //ciptakan object dari class Peserta
if(!empty($id)){
    // panggil fungsi untuk menampilkan data lama yg ingin diubah di form
    $row = $obj_mentor->getMentor($id); // mode edit data, form terisi data lama yg akan diedit
}
else {
    $row = []; // mode input data baru, form tetap dalam keadaan kosong
}
?>

<div class="container px-5 my-5">
    <form id="contactForm" method="POST" action="mentor_controller.php">
        
    <div class="form-floating mb-3">
            <input class="form-control" name="nama" id="nama" value="<?= $row['nama']?>" type="text" placeholder="Nama" data-sb-validations="required" />
            <label for="nama">Nama</label>
            <div class="invalid-feedback" data-sb-feedback="nama:required">Nama is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="email" value="<?= $row['email']?>" id="email" type="text" placeholder="Email" data-sb-validations="required" />
            <label for="email">Email</label>
            <div class="invalid-feedback" data-sb-feedback="email:required">Email is required.</div>
        </div>
       
        
        
        <div class="text-center">
        <?php
        if(empty($id)){ //-----mode input data baru form kosong & tombol simpan--------
        ?>
            <button class="btn btn-primary" name="proses" type="submit" value="simpan">Simpan</button>
        <?php
        }
        else{ //-----mode edit data lama form terisi data lama & tombol ubah--------
        ?>
            <button class="btn btn-success" name="proses" type="submit" value="ubah">Ubah</button>
            <input type="hidden" name="idx" value="<?= $id ?>" />
        <?php } ?>
            <a href="index.php?hal=mentor_list" class="btn btn-info" name="unproses">Kembali</a>
        </div>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<?php
}
else{
    include_once 'access_denied.php';
}
?>