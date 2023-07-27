<?php
	include 'header.php';
?>

<div class="container">
	<form action="insertmenu.php" method="POST">
		<!-- <div class="form-group">
			<label>Gambar Menu</label>
			<input type="file" name="gambar" class="form-control">
		</div> -->
		<div class="form-group">
			<label>Nama</label>
			<input type="text" name="nama" class="form-control">
		</div>
		<div class="form-group">
			<label>Kategori Menu</label>
			<input type="text" name="kategori" class="form-control">
		</div>
		<div class="form-group">
			<label>Deskripsi Menu</label>
			<input type="text" name="deskripsi" class="form-control">
		</div>
		<div class="form-group">
			<label>Harga Menu</label>
			<input type="number" name="harga" class="form-control">
		</div>
		<div class="form-group text-right">
			<button class="btn btn-primary">Add Menu</button>
		</div>
	</form>
</div>
