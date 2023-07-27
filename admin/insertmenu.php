<?php
	include 'database.php';
		
	if(!empty($_POST)){
		// $gambar= $_FILES['gambar'];
		$nama= $_POST['nama'];
		$kategori= $_POST['kategori'];
		$deskripsi = $_POST['deskripsi'];
		$harga = $_POST['harga'];

		$query = "INSERT INTO menu ( nama, kategori, deskripsi, harga) VALUES ( '$nama' , '$kategori', '$deskripsi', $harga)";
		$result = $db->query($query);
	

		if($result){
			header('location: admin.php');
		}
	}
?>