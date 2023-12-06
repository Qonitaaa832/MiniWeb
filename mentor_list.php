<header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-12 col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Homepage</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Input Mentor</li>
                                </ol>
                            </nav>

                            <h2 class="text-white" align="center">Daftar Mentor MSIB 5 AFWD</h2>

                            <!-- content -->
                            
                            
                        </div>

                    </div>
                </div>
</header>

 <!-- content -->

 <div class="p-5">
<?php
//buat arr scalar judul kolom 
$ar_judul = ['KELOMPOK','NAMA MENTOR','ACTION'];
//ciptakan obj dari class produk
$obj_mentor = new Mentor();
//panggil fungsionalitas terkait
$rs = $obj_mentor->index();
?>


<a href="index.php?hal=mentor_form" class="icon-link">
 <i class="bi-plus-square-fill icon"></i>
</a>


<table  id="example" class="table table-striped" style="width:100%" >
	<thead style="width: 100%; font-size: 13px; font-weight: bold;">
		<tr>
			<?php

				foreach($ar_judul as $jdl){
					echo '<th>'.$jdl.'</th>';
				}
			?>
		</tr>
	</thead>
	<tbody class="ukuran-tulisan">
		<?php
		$no = 1;
		foreach($rs as $mentor){
           
            ?>
			
			<tr>
				
				<td>Mentor <?= $no ?></td>
				<td><?= $mentor['nama'] ?></td>
                <td>
				<form method="POST" action="mentor_controller.php">
				<!-- Ubah -->
				<a href="index.php?hal=mentor_form&id=<?= $mentor['id'] ?>" 
					   title="Ubah Mentor"  >
					   <i class="bi bi-pencil-square" style="font-size: 15px;"></i>
				</a>

        <!-- Hapus -->
				<button type="submit" title="Hapus Mentor" class="btn"
					    name="proses" value="hapus" onclick="return confirm('Anda Yakin diHapus?')">
						<i class="bi bi-trash3" style="font-size: 15px;"></i>
        </button>
        <input type="hidden" name="id" value="<?= $mentor['id'] ?>" />
          <!-- View -->
          <a href="index.php?hal=mentor_detail&id=<?= $mentor['id'] ?>" 
					   title="Detail Peserta" >
						<i class="bi bi-eye-fill" style="font-size: 15px;padding-left: 10px"></i>
				</a>
				</form>
				</td>
			</tr>
        <?php    
		$no++;
		}	
		?>
	</tbody>
</table>

    </div>


