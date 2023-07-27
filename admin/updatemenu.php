<?php
	include 'header.php';
	include 'database.php';

	if(!empty($_GET)){
		$nama = $_GET['nama'];

		$query = "SELECT * FROM menu WHERE nama = '$nama'";
		$result = $db->query($query);

		$result = mysqli_fetch_array($result);
	}
?>
<div class="container">
	<form action="update.php" method="POST" enctype="multipart/form-data" id="">
		<!-- <div class="form-group">
			<label>gambar</label>
			<input type="file" name="gambar" class="form-control" >
		</div> -->
		<div class="form-group">
			<label>Nama</label>
			<input type="text" name="nama" value="<?= $result['nama']?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Kategori</label>
			<input type="text" name="kategori" value="<?= $result['kategori']?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Deskripsi</label>
			<input type="text" name="deskripsi" value="<?= $result['deskripsi']?>" class="form-control">
		</div>
		<div class="form-group">
			<label>harga</label>
			<input type="number" name="harga" value="<?= $result['harga']?>" class="form-control">
		</div>
		<div class="form-group text-right">
			<button class="btn btn-primary">Update Anggota</button>
		</div>
	</form>
</div>