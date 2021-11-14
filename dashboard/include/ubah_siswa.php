<?php  
$nis	= $_GET['nis'];
$query 		=	"SELECT * FROM siswa where nis = $nis";

$exec  		= 	mysqli_query($conn, $query);

if ($exec) {
	$data 	= mysqli_fetch_array($exec);
}else{
	echo mysqli_error($conn);
}


if (isset($_POST['submit'])) {
	
	$_SESSION['message'] = "";

	$valid = true;

	foreach ($_POST as $key=>$val) {
		${$key} = $val;
	}

	if ($nis == "") {
		$valid = false;
	}

	if ($nama == "") {
		$valid = false;
	}

	if ($kelas == "") {
		$valid = false;
	}

	if ($tempat_lahir == "") {
		$valid = false;
	}
	if ($tanggal_lahir == "") {
		$valid = false;
	}
	if ($jenis_kelamin == "") {
		$valid = false;
	}

	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	}else{
		$query		=	"UPDATE `siswa` SET 
		`nis`=$nis,
		`nama`='$nama',
		`kelas`='$kelas',
		`tempat_lahir`='$tempat_lahir',
		`tanggal_lahir`='$tanggal_lahir',
		`jenis_kelamin`='$jenis_kelamin'
						WHERE nis=$nis";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil ubah data";
			echo '<script>window.location = "index.php?page=34"</script>';
		}else{
			echo mysqli_error($conn);
		}
	}
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Ubah data Siswa</h4>
                <p class="category">Masukan data Siswa dengan benar</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=34" class="btn btn-success btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                <h3 style="overflow: hidden;"><b></b></h3>
				
				<form action="" method="post">
					<div class="form-group floating-label">
						<label for="nis">NIS</label>
						<input type="text" class="form-control" readonly="readonly" name="nis" value="<?php echo $data['nis'] ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nama">Nama Siswa</label>
						<input type="text" class="form-control" name="nama" value="<?php echo $data['nama'] ?>">
					</div>

					<div class="form-group floating-label">
						<label for="kelas">Kelas</label>
						<input type="text" class="form-control" name="kelas" value="<?php echo $data['kelas'] ?>">
					</div>

					<div class="form-group floating-label">
						<label for="tempat_lahir">Tempat Lahir</label>
						<input type="text" class="form-control" name="tempat_lahir" value="<?php echo $data['tempat_lahir'] ?>">
					</div>
					
					<div class="form-group floating-label">
						<label for="tanggal_lahir">Tanggal Lahir</label>
						<input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir'] ?>">
					</div>

					<div class="form-group floating-label">
						<label for="jenis_kelamin">Jenis Kelamin</label>
						<input type="text" class="form-control" name="jenis_kelamin" value="<?php echo $data['jenis_kelamin'] ?>">
					</div>

					<button type="submit" name="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-info pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>
