<!DOCTYPE html>
<html>
<head>
	<title>Ma'had Nurul Huda</title>
	<link href="img/1.png" rel="icon">	
	<script type="text/javascript" src="assets/DataTables/media/js/jquery.js"></script>
	<script type="text/javascript" src="assets/DataTables/media/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/DataTables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="assets/DataTables/media/css/dataTables.bootstrap.css">
</head>
<style>
.btn-group .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  float: left;
}

.btn-group .button:hover {
  background-color: #3e8e41;
}
</style>
<?php 
	
    $conn = mysqli_connect('localhost', 'root', '', 'e-ma_had');
?>
<body><br>
<div class="btn-group">
  <a button class="button" href="index.php">Home</a></button></div>
	<center>
		<h1>Data Alumni</h1>
	</center>
	<br/>
	<br/>
	<div class="container">
		<table class="table table-striped table-bordered data">
			<thead style="background-color: green">
				<tr>			
					<th style="color:white">NIS</th>
					<th style="color:white">Nama</th>
					<th style="color:white">Email</th>	
					<th style="color:white">Tahun Lulus</th>
					<th style="color:white">Alamat</th>
					<th style="color:white">Agama</th>
					<th style="color:white">No. HP</th>											
				</tr>
			</thead>
			<tbody>
				<?php					        
					$rev = mysqli_query($conn, "SELECT * from alumni ");
					while ($nem = mysqli_fetch_array($rev)) {?>
						<tr>
							<td>
								<p><?= $nem['nis']; ?></p>
							</td>
							<td>
								<p><?= $nem['nama_alumni']; ?></p>
							</td>
							
							<td>
								<p><?= $nem['email_alumni']; ?></p>
							</td>
							<td>
								<p><?= $nem['tahun']; ?></p>
							</td>
							<td>
								<p><?= $nem['alamat_alumni']; ?></p>
							</td>
							
							<td>
								<p><?= $nem['agama']; ?></p>
							</td>
							<td>
								<p><?= $nem['no_hp']; ?></p>
							</td>
						</tr>
					<?php } ?>
			</tbody>
		</table>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('.data').DataTable();

	});
</script>
</html>