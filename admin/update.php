<?php
	include 'database.php';

	if(!empty($_POST)){
		// $gambar = $_POST['gambar'];
		$nama = $_POST['nama'];
		$kategori = $_POST['kategori'];
		$deskripsi = $_POST['deskripsi'];
		$harga = $_POST['harga'];

		$query = "DELETE FROM menu WHERE nama = $nama";
		$result = $db->query($query);

		$query = "INSERT INTO menu(, nama, kategori, deskripsi, harga) VALUES('$nama, '$kategori, '$deskripsi', $harga)";
		$result = $db->query($query);

		// Command Notes
		if($result){
			header('Location: admin.php');
		}


	}
?>
@@ -0,0 +1,43 @@
<?php
	include 'database.php';

	if(!empty($_POST)){
		$nama = $_POST['nama'];
		$kategori = $_POST['kategori'];
		$deskripsi = $_POST['deskripsi'];
		$harga = $_POST['harga'];

		$query = "DELETE FROM menu WHERE nama = '$nama'";
		$result = $db->query($query);

		$query = "INSERT INTO menu (nama, kategori, deskripsi, harga) VALUES('$nama', '$kategori', '$deskripsi', $harga)";
		$result = $db->query($query);


		if($result){
			header('Location: admin.php');
		}
		else
		{
			echo "Fail";
		}
	}
?>