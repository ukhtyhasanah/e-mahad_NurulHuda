<?php include("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Ma'had Nurul Huda</title>
	<link href="img/1.png" rel="icon">
	
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	</head>
<body>

	<?php include("includes/navbar.php"); ?>
	
	<div class="container body">
		<?php
		$id = $_GET['id'];
		$query = $koneksi->query("SELECT * FROM galeri WHERE id='$id'") or die($koneksi->error);
		if($query->num_rows){
			$row = $query->fetch_assoc();
			echo '
			<h1>Informasi foto</h1>
			<div class="row">
				<div class="col-md-8">
					<img src="gallery/'.$row['nama'].'" class="img-responsive">
				</div>
				<div class="col-md-4">
					<table class="table">
						<tr>
							<th width="120">Nama File</th>
							<td>'.$row['nama'].'</td>
						</tr>
						<tr>
							<th>Ukuran File</th>
							<td>';
							$size = filesize("gallery/".$row['nama']);
							$size = $size / 1024 / 1024;
							echo number_format($size, 2).' MB';
							echo '</td>
						</tr>
						<tr>
							<th>Ekstensi File</th>
							<td>'; echo pathinfo($row['nama'], PATHINFO_EXTENSION); echo '</td>
						</tr>
						<tr>
							<th>Dimensi File</th>
							<td>'; 
							list($width, $height) = getimagesize("gallery/".$row['nama']); 
							echo $width . "x" . $height;
							echo '</td>
						</tr>
						<tr>
							<td colspan="2"><a href="gallery/'.$row['nama'].'" class="btn btn-primary btn-block">View</a></td>
							<td colspan="2"><a href="includes/delete.php?id_del='.$row['id'].'" class="btn btn-primary btn-block">Delete</a></td>
						</tr>
					</table>
				</div>
			</div>
			';
		}else{
			echo '404 Not Found!';
		}
		?>
	</div>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</body>
</html>