<?php  
$NIP	= $_GET['NIP'];
$query 		=	"SELECT * FROM guru where NIP = $NIP";

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

	if ($NIP == "") {
		$valid = false;
	}

	if ($nama_guru == "") {
		$valid = false;
	}

	if ($password == "") {
		$valid = false;
	}

	if ($alamat == "") {
		$valid = false;
	}
	if ($telp == "") {
		$valid = false;
	}
	if ($kode_mapel_kegiatan == "") {
		$valid = false;
	}

	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	}else{
		$query		=	"UPDATE `guru` SET 
		`NIP`=$NIP,
		`nama_guru`='$nama_guru',
		`password`='$password',
		`alamat`='$alamat',
		`telp`='$telp',
		`kode_mapel_kegiatan`='$kode_mapel_kegiatan'
						WHERE NIP=$NIP";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil ubah data";
			echo '<script>window.location = "index.php?page=10"</script>';
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
                <h4 class="title">Ubah data Guru</h4>
                <p class="category">Masukan data Guru dengan benar</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=10" class="btn btn-success btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                <h3 style="overflow: hidden;"><b></b></h3>
				
				<form action="" method="post">
					<div class="form-group floating-label">
						<label for="nis">NIP</label>
						<input type="text" class="form-control" readonly="readonly" name="NIP" value="<?php echo $data['NIP'] ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nama_guru">Nama Guru</label>
						<input type="text" class="form-control" name="nama_guru" value="<?php echo $data['nama_guru'] ?>">
					</div>

					<div class="form-group floating-label">
						<label for="password">Password Guru</label>
						<input type="text" class="form-control" name="password" value="<?php echo $data['password'] ?>">
					</div>

					<div class="form-group floating-label">
						<label for="alamat">Alamat</label>
						<input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat'] ?>">
					</div>
					
					<div class="form-group floating-label">
						<label for="telp">No Telp</label>
						<input type="text" class="form-control" name="telp" value="<?php echo $data['telp'] ?>">
					</div>

					<div class="form-group floating-label">
						<label for="kode_mapel_kegiatan">Kode Mapel</label>
						<input type="text" class="form-control" name="kode_mapel_kegiatan" value="<?php echo $data['kode_mapel_kegiatan'] ?>">
					</div>

					<button type="submit" name="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-info pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>
