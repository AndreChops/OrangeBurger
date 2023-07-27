<?php 
	require 'database.php';
	include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Website : Restoran UTS IF430 - Orange Burger Admin Edition</title>

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/aos.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  </head>
<body>
	<!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky" style="background:#555">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">Orange <em> Burger</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="admin.php" class="active">Home</a></li>
                            <?php echo '<li><a href="../logout.php">Sign Out</a></li>'; ?>
						</ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
	<br><br>
	<?php
		$query = "SELECT * FROM menu";
		$result = $db->query($query);
	?>
	<div class="container">
		<div class="text-right" style="padding-bottom:8px">
			<a href="addmenu.php" class="btn btn-primary">Add Menu</a>
		</div>
		<table id="tableUser" class="table table-striped table-bordered">
			<thead>
				<th>Gambar Menu</th>
				<th>Nama Menu</th>
				<th>Kategori</th>
				<th>Deskripsi Menu</th>
				<th>Harga Menu</th>
				<th>Action</th>
			</thead>
			<tbody>
			<?php
				foreach($result as $eachResult){
			?>
				<tr>
					<td><?= $eachResult['gambar']?></td>
					<td><?= $eachResult['nama']?></td>
					<td><?= $eachResult['kategori']?></td>
					<td><?= $eachResult['deskripsi']?></td>
					<td>Rp<?= $eachResult['harga']?></td>
					<td>
                        <div class="col-12">
                        <a href="deletemenu.php?nama=<?= $eachResult['nama']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        <a href="updatemenu.php?nama=<?= $eachResult['nama']?>" class="btn btn-success" style="padding-right:8px"> <i class="fa fa-pencil-square-o"></i></a>
                        </div>
                    </td>
				</tr>
			<?php
				};
			?>
			</tbody>
		</table>
	</div>
</body>
</html>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script>
	$('#tableUser').dataTable();
</script>
