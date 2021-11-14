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
		<div class="gal">
			<?php
			$query = $koneksi->query("SELECT * FROM galeri ORDER BY id DESC") or die($koneksi->error);
			if($query->num_rows){
				while($row = $query->fetch_assoc()){
					echo '<a href="foto.php?id='.$row['id'].'"><img src="gallery/'.$row['nama'].'" alt=""></a>';
				}
			}
			?>

		</div>
	</div>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</body>
</html>