<?php
$id = $_REQUEST['id']; // tangkap request produk id di URL
$model = new Peserta(); // ciptakan obj dari class Produk
$rs  = $model->getPeserta($id); // panggil fungsi u/ mendetailkan produk
?>

<header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-12 col-12">
  

                        <div class="card mb-3" style="max-width: 100%;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                <?php
                                    if(!empty($rs['foto'])){
                                ?>
	                                <img src="images/<?= $rs['foto'] ?>" class="card-img-top" />
                                <?php
                                }
                                else{
                                ?>
                                    <img src="images/nophoto.jpg" class="card-img-top" />
                                <?php } ?>
                                </div>
                                <!-- content -->
                            <div class="col-md-8">
                                <div class="card-body">
                                <div class="card ">
                                <h5 class="card-header"><?= $rs['nama'] ?></h5>
                                <div class="card-body">
                                <p class="card-text" style="text-align: left; font-size: 15px; ">
                                NIM Peserta: <?= $rs['kode'] ?> <br/>
                                Jenis Kelamin Peserta: <?= $rs['gender'] ?> <br/>
                                Tempat Lahir: <?= $rs['tmpt_lhr'] ?> <br/>
                                Tanggal Lahir: <?= $rs['tgl_lhr'] ?> <br/>
                                Alamat: <?= $rs['alamat'] ?> <br/>
                                Nomor HP: <?= $rs['no_hp'] ?> <br/>
                                Email Peserta: <?= $rs['email'] ?> <br/>
                                Mentor Peserta: <?= $rs['namamentor'] ?> <br/>
                                Asal Kampus Peserta: <?= $rs['universitas'] ?> <br/>
                                Agama Peserta: <?= $rs['namaagama'] ?> <br/>
                                </p>
                                <a href="index.php?hal=peserta_msib5" class="btn "><i class="bi bi-arrow-left-short"></i>BACK</a>
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>
                            <!-- content -->
                            
                            
                        </div>

                    </div>
                </div>
</header>

