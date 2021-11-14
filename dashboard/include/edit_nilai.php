<?php  
$id	= $_GET['id'];
$guru = $_GET['guru'];
$query 		=	"SELECT * FROM nilai where id = $id";
// var_dump($id);

$exec  	= 	mysqli_query($conn, $query);
$data 	= mysqli_fetch_array($exec);

if (isset($_POST['submit'])) {
	
	$_SESSION['message'] = "";

	$valid = true;
	$err   = array();

	foreach ($_POST as $key=>$val) {
		${$key} = $val;
		$_SESSION[''.$key.''] = $val;
	}

	if ($nis == "") {
		array_push($err, "nis tidak boleh kosong");
		$valid = false;
	}

	if ($mapel == "") {
		$mapel = $data['id_mapel'];
	}
	if ($semester == "") {
		$semester = $data['semester'];
	}
	if ($nh == "") {
		array_push($err, "nh tidak boleh kosong");
		$valid = false;
	}

	if ($nh2 == "") {
		array_push($err, "nh2 tidak boleh kosong");
		$valid = false;
	}
	if ($nh3 == "") {
		array_push($err, "nh3 tidak boleh kosong");
		$valid = false;
	}

	if ($nh4 == "") {
		array_push($err, "nh4 tidak boleh kosong");
		$valid = false;
	}
	if ($nh5 == "") {
		array_push($err, "nh5 tidak boleh kosong");
		$valid = false;
	}
	if ($uts== "") {
		array_push($err, "utstidak boleh kosong");
		$valid = false;
	}

	if ($uas == "") {
		array_push($err, "uas tidak boleh kosong");
		$valid = false;
	}
	
	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	}else{

		$nilaiTugas = ($nh+$nh2+$nh3+$nh4+$nh5)/5;
		$nilaiTotal = $nilaiTugas*30/100 + $uts*30/100 + $uas*40/100;
		// var_dump($nilaiTotal);
		$predikat = "Kosong";
		$deskripsi = "Kosong";

		if($nilaiTotal>=85)
		{
			$predikat = "A";
			$deskripsi = "Baik Sekali";
		} 
		else if($nilaiTotal < 85 && $nilaiTotal >=75)
		{
			$predikat = "B";
			$deskripsi = "Baik";
		}
		else if($nilaiTotal < 75 && $nilaiTotal >=65)
		{
			$predikat = "C";
			$deskripsi = "Cukup";
		}
		else if($nilaiTotal <65)
		{
			$predikat = "D";
			$deskripsi = "Kurang";
		}else{
			$predikat = "Kosong";
			$deskripsi = "Kosong";
		}

		$query		=	"UPDATE `nilai` SET 
		`id_mapel`='$mapel',
		`semester`='$semester',
		`tugas1`=$nh,
		`tugas2`=$nh2,
		`tugas3`=$nh3,
		`tugas4`=$nh4,
		`tugas5`=$nh5,
		`uts`=$uts,
		`uas`=$uas,
		`nilai`=$nilaiTotal,
		`predikat`='$predikat',
		`deskripsi`='$deskripsi' 
		WHERE id='$id'";
		$exec 		=	mysqli_query($conn, $query);

		// var_dump($exec);

		if ($exec) {
			$_SESSION['message'] = "Berhasil edit nilai";
			echo '<script>window.location = "index.php?page=40&guru='.$guru.'"</script>';
		}else{
			echo mysqli_error($conn);
		}
	}
}else{
	unset($_SESSION['nilai']);
	unset($_SESSION['nama']);
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Edit Nilai</h4>
                <p class="category">Masukan nilai dengan benar</p>
            </div>

            <div class="card-content">
                <a href="index.php?page=40&guru=<?php echo($_GET['guru'])?>" class="btn btn-success btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                <h3 style="overflow: hidden;"><b></b></h3>
				
				<form action="" method="post">
					<div class="form-group floating-label">
						<label for="nis">NIS</label>
						<input type="text" class="form-control" readonly="readonly" name="nis" value="<?php echo $data['id_siswa'] ?>">
					</div>
                    <div class="form-group">
						
						<label for="mapel">Mapel</label>
						<?php 
					$kode_mapel_kegiatan = $data['id_mapel'];
					// var_dump($id_ekskul);
					$queryMapel = "SELECT * FROM `mapel` WHERE `kode_mapel_kegiatan`='$kode_mapel_kegiatan'";
					$sqlMapel = mysqli_query($conn, $queryMapel);
					$dataMapel = mysqli_fetch_array($sqlMapel);
					$nama_mapel = $dataMapel['nama_mapel_kegiatan'];
					?>
                        <select class="form-control" name="mapel" id="mapel">
						<option value="<?php echo $kode_mapel_kegiatan ?>" selected disabled><?php echo $nama_mapel?></option>
                            <?php
                            $a="SELECT * FROM `mapel`";
                            $sql=mysqli_query($conn, $a);
                            while($data1=mysqli_fetch_array($sql)){
								// var_dump($data);
                            ?>
                                <option value="<?php echo $data1['kode_mapel_kegiatan']?>"><?php echo $data1['nama_mapel_kegiatan']?> </option>
                                <?php } ?>
                            
                        </select>
                    </div>		
                    <div class="form-group">
						
						<label for="semester">Semester</label>
						
                        <select class="form-control" name="semester" id="semester">
							<option value="<?php echo $data['semester']?>" selected disabled><?php  echo $data['semester']?></option>
	                        <?php
	                        $data2 = 1;
	                        while($data2 < 7){
	                        ?>
		                        <option value="Semester <?php echo $data2?>">Semester <?php echo $data2?></option>
		                        <?php 
		                        $data2++;
	                        } 
	                        ?>
                            
                        </select>
                    </div>	
					<div class="form-group floating-label">
						<label for="nh">Nilai Harian</label>
						<input type="text" class="form-control" name="nh" value="<?php echo $data['tugas1'] ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nh2">Nilai Harian 2</label>
						<input type="text" class="form-control" name="nh2" value="<?php echo $data['tugas2'] ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nh3">Nilai Harian 3</label>
						<input type="text" class="form-control" name="nh3" value="<?php echo $data['tugas3'] ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nh4">Nilai Harian 4</label>
						<input type="text" class="form-control" name="nh4" value="<?php echo $data['tugas4'] ?>">
					</div>
					<div class="form-group floating-label">
						<label for="nh5">Nilai Harian 5</label>
						<input type="text" class="form-control" name="nh5" value="<?php echo $data['tugas5'] ?>">
					</div>

					<div class="form-group floating-label">
						<label for="uts">Nilai UTS</label>
						<input type="text" class="form-control" name="uts" value="<?php echo $data['uts'] ?>">
					</div>

					<div class="form-group floating-label">
						<label for="uas">Nilai UAS</label>
						<input type="text" class="form-control" name="uas" value="<?php echo $data['uas'] ?>">
					</div>			
	
					<button type="submit" name="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-info pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>
