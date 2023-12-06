<header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-12 col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Homepage</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Peserta MSIB 5</li>
                                </ol>
                            </nav>

                            <h2 class="text-white" align="center">
							<?php
    							$id = $_REQUEST['id'];
    								$obj_peserta = new Peserta();

    								if (!empty($id)) {
        								$rs = $obj_peserta->filter($id);
        									if (!empty($rs)) {
            									$mentorId = $rs[0]['mentor_id']; // Mengambil ID mentor dari data peserta
           										$obj_mentor = new Mentor();
            									$mentorData = $obj_mentor->getMentor($mentorId);
            									$mentorNama = $mentorData['nama'];
            									echo 'Kelompok ' .$mentorNama;
        										} 
    								} else {
        								echo 'Peserta MSIB 5';
    								}
    						?>
							</h2>
                        </div>

                    </div>
                </div>
</header>

               


<div class="p-5">
<?php
//buat arr scalar judul kolom 
$ar_judul = ['#','NO','NIM','NAMA','Jenis Kelamin','EMAIL','MENTOR','UNIVERSITAS','AGAMA','ACTION'];
//ciptakan obj dari class produk
$obj_peserta = new Peserta();
//panggil fungsionalitas terkait
$rs = $obj_peserta->index();

//----------proses filter-----------
//tangkap id
$id = $_REQUEST ['id'];

$keyword = $_GET['keyword']; // tangkap request pencarian berdasarkan keywordnya
if(!empty($keyword)){
	$rs = $obj_peserta->cari($keyword); //jika ada pencarian
}
else if (!empty($id)){
	$rs = $obj_peserta->filter($id); //jika ada pencarian
}
else{
	$rs = $obj_peserta->index(); //jika tidak ada pencarian
}
//print_r($rs); die();
?>


<?php
if($_SESSION['MEMBER']['role'] == 'admin'){
?>
<a href="index.php?hal=peserta_form" class="icon-link">
 <i class="bi-plus-square-fill icon"></i>
</a>
<?php } ?>


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
		foreach($rs as $person){
           
            ?>
			
			<tr>
				<td>
				<form method="POST" action="peserta_controller.php">
				<!-- View -->
				<a href="index.php?hal=peserta_detail&id=<?= $person['id'] ?>" 
					   title="Detail Peserta" >
						<i class="bi bi-eye-fill" style="font-size: 15px;"></i>
				</a>
				</form>
				</td>
				<td><?= $no ?></td>
				<td><?= $person['kode'] ?></td>
				<td><?= $person['nama'] ?></td>
				<td><?= $person['gender'] ?></td>
				<td><?= $person['email'] ?></td>
                <td><?= $person['namamentor'] ?></td>
				<td><?= $person['universitas'] ?></td>
				<td><?= $person['namaagama'] ?></td>
                <td>
				<form method="POST" action="peserta_controller.php">
				<?php
if(isset($_SESSION['MEMBER'])){
?>
				<!-- Ubah -->
				<a href="index.php?hal=peserta_form&id=<?= $person['id'] ?>" 
					   title="Ubah Produk"  >
					   <i class="bi bi-pencil-square" style="font-size: 15px;"></i>
				</a>

			
				<?php
                if($_SESSION['MEMBER']['role'] == 'admin'){
                ?>
				<button type="submit" title="Hapus Produk" class="btn"
					    name="proses" value="hapus" onclick="return confirm('Anda Yakin diHapus?')">
						<i class="bi bi-trash3" ></i>
				</button>
					<input type="hidden" name="id" value="<?= $person['id'] ?>" />
					<?php } ?>
<?php } ?>
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