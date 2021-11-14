<?php  
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

	if ($nama_alumni == "") {
		array_push($err, "nama tidak boleh kosong");
		$valid = false;
	}

	if ($alamat_alumni == "") {
		array_push($err, "alamat tidak boleh kosong");
		$valid = false;
	}

	if ($no_hp == "") {
		array_push($err, "telp tidak boleh kosong");
		$valid = false;
	}

	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	}else{
		$query		=	"INSERT INTO alumni VALUES('$nis', '$nama_alumni','$email_alumni','$tahun','$institut_perusahaan', '$alamat_alumni','$agama', '$no_hp')";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil tambah Alumni";
			echo '<script>window.location = "index.php?page=28"</script>';
		}else{
			echo mysqli_error($conn);
		}
	}
}else{
	unset($_SESSION['nis']);
	unset($_SESSION['nama_alumni']);
	unset($_SESSION['email_alumni']);
	unset($_SESSION['tahun']);
	unset($_SESSION['institut_perusahaan']);
	unset($_SESSION['alamat_alumni']);
	unset($_SESSION['no_hp']);
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Tambah Alumni</h4>
                <p class="category">Masukan data Alumni dengan benar</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=31" class="btn btn-success btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
				
				<form action="" method="post">
					<div class="form-group">
						<label for="nis">NIS</label>
						<input type="text" class="form-control" name="nis">
					</div>

					<div class="form-group floating-label">
						<label for="nama_alumni">Nama Alumni</label>
						<input type="text" class="form-control" name="nama_alumni">
					</div>

					<div class="form-group floating-label">
						<label for="email">Email</label>
						<input type="text" class="form-control" name="email_alumni">
					</div>

					<div class="form-group floating-label">
						<label for="status">Tahun Lulus</label>
						<input type="text" class="form-control" name="tahun">
					</div>

					<div class="form-group floating-label">
						<label for="institut_perusahaan">Institut/Perusahaan</label>
						<input type="text" class="form-control" name="institut_perusahaan">
					</div>

					<div class="form-group floating-label">
						<label for="alamat_alumni">Alamat</label>
						<textarea name="alamat_alumni" cols="20" rows="4" class="form-control"></textarea>
					</div>

					<div class="form-group floating-label">
						<label for="agama">Agama</label>
						<input type="text" class="form-control" name="agama">
					</div>

					<div class="form-group floating-label">
						<label for="no_hp">No Tlv/Hp</label>
						<input type="text" class="form-control" name="no_hp">
					</div>
					

					<button type="submit" name="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-info pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>
