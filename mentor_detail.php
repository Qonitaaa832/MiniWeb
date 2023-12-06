<?php
$id = $_REQUEST['id']; // tangkap request produk id di URL
$model = new Mentor(); // ciptakan obj dari class Produk
$rs  = $model->getMentor($id); // panggil fungsi u/ mendetailkan produk
?>

<header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-12 col-12">
  

                            <!-- content -->
                            <div class="card ">
                                <h5 class="card-header"><?= $rs['nama'] ?></h5>
                                <div class="card-body">
                                <p class="card-text" style="text-align: left; font-size: 15px; ">
                                Nama Mentor: <?= $rs['nama'] ?> <br/>
                                Email Mentor: <?= $rs['email'] ?> <br/>
                                </p>
                                <a href="index.php?hal=mentor_list" class="btn "><i class="bi bi-arrow-left-short"></i>BACK</a>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
</header>

