<?php
if(isset($_SESSION['MEMBER'])){
?>
<header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-12 col-12">
                            

                            <h2 class="text-white" align="center">Form Peserta</h2>
                        </div>

                    </div>
                </div>
</header>

<?php
$obj_agama = new Agama(); //ciptakan object dari class Jenis
$rs_agama = $obj_agama->index(); //panggil fungsi index untuk mendapatkan data jenis produk

$obj_mentor = new Mentor(); //ciptakan object dari class Jenis
$rs_mentor = $obj_mentor->index();

$obj_instansi = new Instansi(); //ciptakan object dari class Jenis
$rs_instansi = $obj_instansi->index();

$ar_gender = ['L','P']; //buat array kondisi produk

//------------proses edit data----------------
$id = $_REQUEST['id']; //tangkap request id di url
$obj_peserta = new Peserta(); //ciptakan object dari class Peserta
if(!empty($id)){
    // panggil fungsi untuk menampilkan data lama yg ingin diubah di form
    $row = $obj_peserta->getPeserta($id); // mode edit data, form terisi data lama yg akan diedit
}
else {
    $row = []; // mode input data baru, form tetap dalam keadaan kosong
}
?>

<div class="container px-5 my-5">
    <form id="contactForm" method="POST" action="peserta_controller.php">
        <div class="form-floating mb-3">
            <input class="form-control" name="kode" value="<?= $row['kode']?>" id="kode" type="text" placeholder="ID" data-sb-validations="required" />
            <label for="id">NIM</label>
            <div class="invalid-feedback" data-sb-feedback="kode:required">ID is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="nama" id="nama" value="<?= $row['nama']?>" type="text" placeholder="Nama" data-sb-validations="required" />
            <label for="nama">Nama</label>
            <div class="invalid-feedback" data-sb-feedback="nama:required">Nama is required.</div>
        </div>
       
        <div class="mb-3">
            <label class="form-label d-block">Jenis Kelamin</label>
            <?php
            foreach($ar_gender as $gender){
            //--------proses edit kondisi produk-------
            $cek = ($gender == $row['gender']) ? "checked" : "" ;
            ?>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="<?= $gender ?>" type="radio" name="jenisKelamin" value="<?=$gender ?>" data-sb-validations="" <?= $cek ?>/>
                <label class="form-check-label" for="<?= $gender ?>"><?= $gender ?></label>
            </div>
            <?php } ?>
            <div class="invalid-feedback" data-sb-feedback="jenisKelamin:required">One option is required.</div>
        </div>
        
        <div class="form-floating mb-3">
            <input class="form-control" name="tmpt_lhr"  value="<?= $row['tmpt_lhr']?>" id="tempatLahir" type="text" placeholder="Tempat Lahir" data-sb-validations="required" />
            <label for="tempatLahir">Tempat Lahir</label>
            <div class="invalid-feedback" data-sb-feedback="tempatLahir:required">Tempat Lahir is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="tgl_lhr"  value="<?= $row['tgl_lhr']?>" id="tanggalLahir" type="date" placeholder="Tanggal Lahir" data-sb-validations="required" />
            <label for="tanggalLahir">Tanggal Lahir</label>
            <div class="invalid-feedback" data-sb-feedback="tanggalLahir:required">Tanggal Lahir is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="alamat" id="alamat"  value="<?= $row['alamat']?>" type="text" placeholder="alamat" data-sb-validations="required" />
            <label for="alamat">alamat</label>
            <div class="invalid-feedback" data-sb-feedback="alamat:required">alamat is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="no_hp"  value="<?= $row['no_hp']?>" id="nomorHp" type="text" placeholder="Nomor HP" data-sb-validations="required" />
            <label for="nomorHp">Nomor HP</label>
            <div class="invalid-feedback" data-sb-feedback="nomorHp:required">Nomor HP is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="email" value="<?= $row['email']?>" id="email" type="text" placeholder="Email" data-sb-validations="required" />
            <label for="email">Email</label>
            <div class="invalid-feedback" data-sb-feedback="email:required">Email is required.</div>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" name="mentor" id="mentor" aria-label="Mentor">
                <option value="-- pilih --" disabled selected>----- pilih Mentor -----</option>
                <?php
                foreach($rs_mentor as $mentor){
                    //--------proses edit mentor-------
                    $sel = ($mentor['id'] == $row['mentor_id']) ? "selected" : "" ;
                ?>    
                    <option value="<?= $mentor['id'] ?>" <?= $sel ?>><?= $mentor['nama'] ?></option>
                <?php } ?>   
            </select>
            <label for="mentor">Mentor</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" name="instansi" id="universitas" aria-label="Universitas">
                <option value="-- pilih --" disabled selected>----- pilih Universitas -----</option>
                <?php
                foreach($rs_instansi as $instansi){
                    //--------proses edit agama-------
                    $sel = ($instansi['id'] == $row['instansi_id']) ? "selected" : "" ;
                ?>    
                    <option value="<?= $instansi['id'] ?>" <?= $sel ?>><?= $instansi['nama'] ?></option>
                <?php } ?>
                
            </select>
            <label for="universitas">Universitas</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" name="agama" id="agama" aria-label="Agama">
                <option value="-- Pilih --" disabled selected>----- Pilih Agama-----</option>
                <?php
                foreach($rs_agama as $agama){
                    //--------proses edit agama-------
                    $sel = ($agama['id'] == $row['agama_id']) ? "selected" : "" ;
                ?>    
                    <option value="<?= $agama['id'] ?>" <?= $sel ?>><?= $agama['nama'] ?></option>
                <?php } ?>
            </select>
            <label for="agama">Agama</label>
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
            <a href="index.php?hal=peserta_msib5" class="btn btn-info" name="unproses">Kembali</a>
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