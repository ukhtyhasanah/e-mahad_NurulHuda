<?php  

$nis = $_GET['nis'];
// var_dump($nis);
$query = "SELECT * FROM `kehadiran` WHERE id_siswa = $nis";

$exec  = mysqli_query($conn,$query);
$rows = mysqli_fetch_array($exec);

// var_dump($rows);
                        

?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Edit ketidakhadiran</h4>
                <p class="category">Masukan data dengan benar</p>
            </div>

            <div class="card-content">
                <a href="index.php?page=38&guru=<?php echo ($_GET['guru'])?>" class="btn btn-success btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                <h3 style="overflow: hidden;"><b></b></h3>
				
				<form action="" method="post">
					<div class="form-group floating-label">
						<label for="nis">Nis</label>
						<input type="text" class="form-control" readonly="readonly" name="nis" value="<?php echo($rows['id_siswa']); ?>">
					</div>
					<div class="form-group floating-label">
						<label for="alfa">Alfa</label>
						<input type="text" class="form-control" name="alfa" value="<?php echo($rows['alpa']); ?>">
					</div>

					<div class="form-group floating-label">
						<label for="izin">Izin</label>
						<input type="text" class="form-control" name="izin" value="<?php echo($rows['izin']); ?>">
					</div>

					<div class="form-group floating-label">
						<label for="sakit">Sakit</label>
						<input type="text" class="form-control" name="sakit" value="<?php echo($rows['sakit']); ?>">
					</div>

					
	
					<button type="submit" name="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-info pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>
