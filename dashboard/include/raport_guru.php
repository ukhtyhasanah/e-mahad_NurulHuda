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
                <h4 class="title">Nilai Rapor Siswa Ma'had Nurul Huda</h4>
               
            </div>
            <div class="card-content">
			<a href="index.php?page=36&guru=<?php echo($_GET['guru']) ?>" class="btn btn-success btn-md pull-right"><i class="fa fa-plus"></i> Tambah Nilai</a>
				<table class="table table-hover">
					<thead>
						<tr>
			<td><b>No</b></td>
			<td><b>NIS</b></td>
			<td><b>Nama</b></td>
			<td><b>Kelas</b></td>
			<td><b>Pelajaran</b></td>
            <td><b>KKM</b></td>
			<td><b>Tugas</b></td>
            <td><b>Tugas</b></td>
            <td><b>Tugas</b></td>
            <td><b>Tugas</b></td>
            <td><b>Tugas</b></td>
            <td><b>UTS</b></td>
            <td><b>UAS</b></td>
            <td><b>Rapor</b></td>
            <td><b>Aksi</b></td>
						</tr>
					</thead>
				    <tbody>
				    	
				    	<?php  
				    		$namaGuru = $_GET['guru'];
				    		$queryGuru = "SELECT * FROM guru WHERE nama_guru='$namaGuru'";

				    		$execGuru  = mysqli_query($conn,$queryGuru);

				    		$rows =mysqli_fetch_array($execGuru);
				    		$nip = $rows['NIP'];
				    		// var_dump($nip);

				    		$query = "SELECT * FROM nilai INNER JOIN siswa ON nilai.id_siswa=siswa.nis INNER JOIN mapel ON nilai.id_mapel=mapel.kode_mapel_kegiatan INNER JOIN guru ON nilai.id_guru=guru.NIP WHERE nilai.id_guru=2";

				    		$exec  = mysqli_query($conn,$query);

				    		if ($exec) {
				    			$count = mysqli_num_rows($exec);
				    			if ($count > 0) {
				    				$no = 0;
				    				while ($rows = mysqli_fetch_array($exec)) {
				    				    
				    				
				    	?>
						<tr>
					  <td><?php echo ++$no; ?></td>
					  <td><?php echo $rows['id_siswa'] ?></td>
					  <td><?php echo $rows['nama'] ?></td>
				      <td><?php echo $rows['kelas'] ?></td>
					  <td><?php echo $rows['nama_mapel_kegiatan'] ?></td>
                      <td><?php echo $rows['kkm'] ?></td>
                      <td><?php echo $rows['tugas1'] ?></td>
                      <td><?php echo $rows['tugas2'] ?></td>
                      <td><?php echo $rows['tugas3'] ?></td>
                      <td><?php echo $rows['tugas4'] ?></td>
                      <td><?php echo $rows['tugas5'] ?></td>
                      <td><?php echo $rows['uts'] ?></td>
                      <td><?php echo $rows['uas'] ?></td>
                      <td><?php echo $rows['nilai'] ?></td>
					<td>
						<a href="index.php?page=32&id=<?php echo $rows['id'] ?>&guru=<?php echo $namaGuru ?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
						<a href="include/hapus_nilai.php?id=<?php echo $rows['id'] ?>&guru=<?php echo $namaGuru ?>" class="btn btn-info btn-sm"><i class="fa fa-trash"></i></a>
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

<?php  
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Berhasil!</strong> ".$_SESSION['message']."
    </div>";
}
unset($_SESSION['message']);

?>