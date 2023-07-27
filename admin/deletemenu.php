<?php
	include 'database.php';

	if(!empty($_GET)){
		$nama = $_GET['nama'];

		$query = "DELETE FROM menu WHERE nama = '$nama'";
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