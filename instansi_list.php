<header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-12 col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Homepage</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Input Instansi</li>
                                </ol>
                            </nav>

                            <h2 class="text-white" align="center">Daftar Universitas MSIB 5</h2>
                        </div>

                    </div>
                </div>
</header>

               


<div class="p-5">
<?php
//buat arr scalar judul kolom 
$ar_judul = ['NO','NAMA','ACTION'];
//ciptakan obj dari class produk
$obj_instansi = new Instansi();
//panggil fungsionalitas terkait
$rs = $obj_instansi->index();
?>


<a href="index.php?hal=instansi_form" class="icon-link">
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
		foreach($rs as $instansi){
           
            ?>
			
			<tr>
				
				<td><?= $no ?></td>
				<td><?= $instansi['nama'] ?></td>
                <td>
				<form method="POST" action="instansi_controller.php">
				<!-- Ubah -->
				<a href="index.php?hal=instansi_form&id=<?= $instansi['id'] ?>" 
					   title="Ubah Produk"  >
					   <i class="bi bi-pencil-square" style="font-size: 15px;"></i>
				</a>

			
				<button type="submit" title="Hapus Produk" class="btn"
					    name="proses" value="hapus" onclick="return confirm('Anda Yakin diHapus?')">
						<i class="bi bi-trash3" ></i>
				</button>
					<input type="hidden" name="id" value="<?= $instansi['id'] ?>" />
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