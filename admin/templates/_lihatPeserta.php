<?php 

if (!isset($_GET['lihat'])) {
	header('Location: http://localhost/project_blk/v.1.0.3/admin/peserta');
}

$lihat = getCurrentPeserta($_GET['lihat']);

?>
<div class="row">
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<a href="<?= $url ?>admin/peserta"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
<hr>

	<table class="table table-hover table-responsive">
	<?php foreach ($lihat as $peserta) { ?>
		
		<h3><?= $peserta['nama']; ?></h3>
		
		<?php 
			$status = $peserta['status_peserta'];
			if (checkUser($_GET['lihat']) != 'exists') { ?>
		<tr>
			<th>GENERATE USERS</th>
			<td>:
			<?php if($status != 0) { ?>
				<a href="<?= $url ?>admin/config/generateUsersProses.php?user=<?= $peserta['id_peserta'] ?>" class="btn btn-sm btn-primary">Generate User to <?= $peserta['nama'] ?></a>
			<?php }else{ ?>
				<span class="badge" style="background-color: yellow;color:black;">
					Cek Status Peserta untuk membuat username dan password otomatis dengan generator.
				</span>
			<?php } ?>
			</td>
		</tr>
		
		<?php } ?> 
		<tr>
			<th>NIK</th>
			<td>: <?= $peserta['nik']; ?></td>
		</tr>

		<tr>
			<th>Alamat</th>
			<td>: <?= $peserta['alamat']; ?></td>
		</tr>

		<tr>
			<th>Tempat, Tanggal Lahir</th>
			<td>: <?= $peserta['ttl']; ?></td>
		</tr>

		<tr>
			<th>Telepon / HP</th>
			<td>: <?= $peserta['telp']; ?></td>
		</tr>

		<tr>
			<th>Status Kawin</th>
			<td>: <?= $peserta['skawin']; ?></td>
		</tr>

		<tr>
			<th>Gender</th>
			<td>: <?= $peserta['jk']; ?></td>
		</tr>

		<tr>
			<th>Kejuruan</th>
			<td>: <?= getKejuruan($peserta['id_kejuruan']); ?></td>
		</tr>

		<tr>
			<th>Pendidikan</th>
			<td>: <?= getPendidikan($peserta['id_pendidikan']); ?></td>
		</tr>

		<tr>
			<th>Agama</th>
			<td>: <?= getAgama($peserta['id_agama']); ?></td>
		</tr>

		<tr>
			<th>Pegalaman Kursus</th>
			<td>:  
			<?php 
				$lenght = strlen($peserta['p_kursus']); 
				if ($lenght == 0) {
					echo "Tidak Ada";
				}else{
					echo $peserta['p_kursus'];
				}
			?></td>
		</tr>

		<tr>
			<th>Pengalaman Kerja</th>
			<td>: 
			<?php 
			$lenght = strlen($peserta['p_kerja']); 
				if ($lenght == 0) {
					echo "Tidak Ada";
				}else{
					echo $peserta['p_kerja'];
				}
			?>
			</td>
		</tr>

		<tr>
			<th>Nama Orangtua</th>
			<td>: <?= $peserta['nama_ortu']; ?></td>
		</tr>

		<tr>
			<th>Pekerjaan Orangtua</th>
			<td>: <?= $peserta['pk_ortu']; ?></td>
		</tr>

		<tr>
			<th>Alamat Orangtua</th>
			<td>: <?= $peserta['alamat_ortu']; ?></td>
		</tr>

		<tr>
			<th>Tanggal Daftar</th>
			<td>: <?= $peserta['tanggalDaftar']; ?></td>
		</tr>

		<tr>
			<th>Status Peserta</th>
			<td>: 
			<?php  
				$status = $peserta['status_peserta'];

				if ($status == 0) {
					echo "Belum Diterima";
				}else{
					echo "Diterima";
				}

			?>	
			</td>
		</tr>

		<tr>
			<th>File Ijazah &amp; KTP</th>
			<td>: <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modalIjazah">
			  <i class="glyphicon glyphicon-picture"></i> Ijazah
			</button> &nbsp; <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalKtp">
			  <i class="glyphicon glyphicon-picture"></i> KTP
			</button></td>
		</tr>

	<?php } ?>
	</table>

</div>
</div>


<div class="modal fade" id="modalIjazah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ijazah <?= $peserta['nama'] ?></h4>
      </div>
      <div class="modal-body">
        <img src="<?= $peserta['ijazah'] ?>" alt="" class="img-responsive">
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalKtp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">KTP <?= $peserta['nama'] ?></h4>
      </div>
      <div class="modal-body">
        <img src="<?= $peserta['ktp'] ?>" alt="" class="img-responsive">
      </div>
    </div>
  </div>
</div>