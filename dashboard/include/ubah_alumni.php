<?php  

$query 		=	"SELECT * FROM alumni where nis = $nis";

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

	if ($nama_alumni == "") {
		$valid = false;
	}

	if ($alamat_alumni == "") {
		$valid = false;
	}

	if ($no_hp == "") {
		$valid = false;
	}

	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	}else{
		$query		=	"UPDATE alumni 
						SET nama_alumni = '$nama_alumni', alamat_alumni = '$alamat_alumni', no_hp = '$no_hp' 
						WHERE nis=$nis";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil ubah data alumni";
			echo '<script>window.location = "index.php?page=28"</script>';
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
                <h4 class="title">Ubah data Alumni</h4>
                <p class="category">Masukan data Alumni dengan benar</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=31" class="btn btn-success btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
				
				<form action="" method="post">
					<div class="form-group">
						<label for="nis">NIS</label>
						<input type="text" class="form-control" readonly="readonly" name="nis" value="<?php echo $data['nis']?>">
					</div>

					<div class="form-group floating-label">
						<label for="nama_alumni">Nama Alumni</label>
						<input type="text" class="form-control" name="nama_alumni" value="<?php echo $data['nama_alumni'] ?>">
					</div>
					<div class="form-group floating-label">
						<label for="nama_alumni">Email</label>
						<input type="text" class="form-control" name="email_alumni" value="<?php echo $data['email_alumni'] ?>">
					</div>
					<div class="form-group floating-label">
						<label for="nama_alumni">Tahun Lulus</label>
						<input type="text" class="form-control" name="tahun" value="<?php echo $data['tahun'] ?>">
					</div>

					<div class="form-group floating-label">
						<label for="alamat_alumni">Alamat</label>
						<textarea name="alamat_alumni" cols="20" rows="4" class="form-control"><?php echo $data['alamat_alumni']?></textarea>
					</div>

					<div class="form-group floating-label">
						<label for="no_hp">No Tlv/Hp</label>
						<input type="text" class="form-control" name="no_hp" value="<?php echo $data['no_hp'] ?>">
					</div>
					

					<button type="submit" name="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
				</form>

            </div>
        </div>
    </div>
</div>
