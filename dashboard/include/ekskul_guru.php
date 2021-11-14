<?php  
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Berhasil!</strong> ".$_SESSION['message']."
    </div>";
}
?>
<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Nilai Ekstrakulikuler Siswa Ma'had Nurul Huda</h4>
               
            </div>
            <div class="card-content">
			<a href="index.php?page=44&guru=<?php echo($_GET['guru'])?>" class="btn btn-success btn-md pull-right"><i class="fa fa-plus"></i> Tambah Nilai</a>
				<table class="table table-hover">
					<thead>
						<tr>
			<td><b>NIS</b></td>
			<td><b>Nama Kegiatan</b></td>
			<td><b>Kelas</b></td>
			<td><b>Nilai</b></td>
            <td><b>Aksi</b></td>
						</tr>
					</thead>
				    <tbody>
				    	
				    	<?php  

				    		$query = "SELECT nilai_ekskul.id, ekskul.nama_ekskul, siswa.kelas, siswa.nis, nilai_ekskul.nilai FROM( (nilai_ekskul INNER JOIN ekskul ON nilai_ekskul.id_ekskul = ekskul.id_ekskul) INNER JOIN siswa ON siswa.nis = nilai_ekskul.nis)";

				    		$exec  = mysqli_query($conn,$query);

				    		if ($exec) {
				    			$count = mysqli_num_rows($exec);
				    			if ($count > 0) {
				    				$no = 0;
				    				while ($rows = mysqli_fetch_array($exec)) {
				    				    
				    				
				    	?>
						<tr>
					  <td><?php echo $rows['nis'] ?></td>
					  <td><?php echo $rows['nama_ekskul'] ?></td>
				      <td><?php echo $rows['kelas'] ?></td>
				      <td><?php echo $rows['nilai'] ?></td>
                      
					<td>
						<a href="index.php?page=47&id=<?php echo $rows['id'] ?>&guru=<?php echo ($_GET['guru'])?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
						<a href="include/hapus_nilai_ekskul.php?id=<?php echo $rows['id'] ?>&guru=<?php echo ($_GET['guru'])?>" class="btn btn-info btn-sm"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				    	<?php
				    				}
				    			}else{
				    	?>
				    			<tr>
									<td colspan="6" align="center"><h4><b>Kosong</b></h4></td>
								</tr>
				    	<?php
				    			}
				    		}else{
				    			echo mysqli_error($conn);
				    		}

				    	?>

						
				    </tbody>
				</table>

            </div>
        </div>
    </div>
</div>

<?php  

unset($_SESSION['message']);

?>