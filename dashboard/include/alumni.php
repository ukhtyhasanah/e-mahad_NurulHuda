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
                <h4 class="title">Alumni</h4>
                <p class="category">Daftar Alumni</p>
            </div>
            <div class="card-content">
				<table class="table table-hover">
					<thead>
						<tr>
							<td><b>NIS</b></td>
							<td><b>Nama</b></td>
							<td><b>Email</b></td>
							<td><b>Tahun Lulus</b></td>
                            <td><b>Alamat</b></td>
                            <td><b>Agama</b></td>
                            <td><b>No. HP</b></td>
							<!-- <td><b>Aksi</b></td> -->
						</tr>
					</thead>
				    <tbody>
				    	
				    	<?php  

				    		$query = "SELECT * FROM alumni";

				    		$exec  = mysqli_query($conn,$query);

				    		if ($exec) {
				    			$count = mysqli_num_rows($exec);
				    			if ($count > 0) {
				    				while ($rows = mysqli_fetch_array($exec)) {
				    				    
				    				
				    	?>
						    			<tr>
											<td><?php echo $rows['nis'] ?></td>
											<td><?php echo $rows['nama_alumni'] ?></td>
											<td><?php echo $rows['email_alumni'] ?></td>
											<td><?php echo $rows['tahun'] ?></td>
                                            <td><?php echo $rows['alamat_alumni'] ?></td>
                                            <td><?php echo $rows['agama'] ?></td>
                                            <td><?php echo $rows['no_hp'] ?></td>
											<!-- <td>
												<a href="index.php?page=30&nis=<?php echo $rows['nis'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
												<a href="include/hapus_alumni.php?nis=<?php echo $rows['nis'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></a>
											</td> -->
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