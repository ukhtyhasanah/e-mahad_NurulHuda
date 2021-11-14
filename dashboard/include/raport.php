<style>
	h5{
		margin-left: 30px;
	}
</style>
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
                <h4 class="title">Rapor Semester</h4>
                <p class="category"></p>
            </div>

            <div class="card-content">
				<table class="table table-hover">
					<thead>
						<tr>
							<td><b>NIS</b></td>
							<td><b>Nama</b></td>
							<td><b>Kelas</b></td>
                            <td><b>Aksi</b></td>
						</tr>
					</thead>
                    <tbody>
				    	<?php  
							$nama = $_GET['nama'];
							// var_dump($nama);

				    		$query = "SELECT * FROM `siswa` WHERE nama='$nama'";
					
				    		$exec  = mysqli_query($conn,$query);
							// var_dump($exec);

				    		if ($exec) {
				    			$count = mysqli_num_rows($exec);
								// var_dump($count);
				    			if ($count > 0) {
				    				$no = 0;
				    				while ($rows = mysqli_fetch_array($exec)) {		    				    
				    				
				    	?>
						    			<tr>
											<td><?php echo $rows['nis'] ?></td>
											<td><?php echo $rows['nama'] ?></td>
											<td><?php echo $rows['kelas'] ?></td>
											<td>
												<a href="include/cetak_rapor.php?id=<?php echo $rows['nis'] ?>" class="btn btn-info btn-sm"><i class="fa fa-print"></i></a>
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
</div>

<?php  

unset($_SESSION['message']);

?>