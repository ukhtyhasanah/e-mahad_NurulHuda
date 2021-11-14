<?php  
$id	= $_GET['id'];
$guru = $_GET['guru'];
$query 		=	"SELECT * FROM nilai_ekskul where id = $id";
$exec  		= 	mysqli_query($conn, $query);
$data 	= mysqli_fetch_array($exec);
// if ($exec) {
// 	$data 	= mysqli_fetch_array($exec);
// }else{
// 	echo mysqli_error($conn);
// }
// var_dump($data);

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
		// $valid = false;
	} 

	if ($ekskul == "") {
		$ekskul = $data['id_ekskul'];
		// array_push($err, "nama ekskul tidak boleh kosong");
		// $valid = false;
	}	
	if ($nilai == "") {
		array_push($err, "nilai tidak boleh kosong");
		$valid = false;
	}
	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	}else{
		$predikat = "Kosong";
		$deskripsi = "Kosong";

		if($nilai>=85)
		{
			$predikat = "A";
			$deskripsi = "Baik Sekali";
		} 
		else if($nilai < 85 && $nilai >=75)
		{
			$predikat = "B";
			$deskripsi = "Baik";
		}
		else if($nilai < 75 && $nilai >=65)
		{
			$predikat = "C";
			$deskripsi = "Cukup";
		}
		else if($nilai < 65 && $nilai>=0)
		{
			$predikat = "D";
			$deskripsi = "Kurang";
		}else {
			$predikat = "Kosong";
			$deskripsi = "Kosong";
		}
		// var_dump($mapel);
				// var_dump($id);

		$query		=	"UPDATE `nilai_ekskul` SET 
		`id_ekskul`='$ekskul',
		`nis`=$nis,
		`nilai`=$nilai,
		`predikat`='$predikat',
		`deskripsi`='$deskripsi' 
		WHERE id = $id";
		$exec 		=	mysqli_query($conn, $query);

		// var_dump($exec);

		if ($exec) {
			$_SESSION['message'] = "Berhasil edit nilai";
			echo '<script>window.location = "index.php?page=46&guru='.$guru.'"</script>';
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
                <a href="index.php?page=46&guru=<?php echo $guru ?>" class="btn btn-success btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                <h3 style="overflow: hidden;"><b></b></h3>
				
				<form action="" method="post">
					<div class="form-group floating-label">
						<label for="nis">NIS</label>
						<input type="text" class="form-control" readonly="readonly" name="nis" value="<?php echo $data['nis'] ?>">
					</div>
					<?php 
					$id_ekskul = $data['id_ekskul'];
					// var_dump($id_ekskul);
					$queryEkskul = "SELECT * FROM `ekskul` WHERE `id_ekskul`='$id_ekskul'";
					$sqlEkskul = mysqli_query($conn, $queryEkskul);
					$dataEkskul = mysqli_fetch_array($sqlEkskul);
					$nama_ekskul = $dataEkskul['nama_ekskul'];
					?>
                    <div class="form-group">
						<label for="ekskul">Ekstrakulikuler</label>
                        <select class="form-control" name="ekskul" id="ekskul">
						<option value="<?php echo $id_ekskul ?>" selected disabled ><?php echo $nama_ekskul?></option>
                            <?php
                            $a="SELECT * FROM `ekskul`";
                            $sql=mysqli_query($conn, $a);
                            while($data1=mysqli_fetch_array($sql)){
								// var_dump($data1);
                            ?>
                                <option value="<?php echo $data1['id_ekskul']?>"><?php echo $data1['nama_ekskul']?> </option>
                                <?php } ?>
                            
                        </select>
                    </div>
					<div class="form-group floating-label">
						<label for="nilai">Nilai</label>
						<input type="text" class="form-control" name="nilai" value="<?php echo $data['nilai'] ?>">
					</div>		


					
	
					<button type="submit" name="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-info pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>
