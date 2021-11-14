<?php
$query 		=	"SELECT * FROM ekskul where id_ekskul = '$id_ekskul'";

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

	if ($id_ekskul== "") {
		$valid = false;
	}

	if ($nama_ekskul == "") {
		$valid = false;
	}

	
	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	}else{
		$query		=	"UPDATE ekskul 
						SET nama_ekskul = '$nama_ekskul' 
						WHERE id_ekskul='$id_ekskul'";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil ubah data Ekstrakulikuler";
			echo '<script>window.location = "index.php?page=41"</script>';
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
                <h4 class="title">Ubah data ekstrakulikuler</h4>
                <p class="category">Masukan data ekstrakulikuler dengan benar</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=41" class="btn btn-success btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                <h3 style="overflow: hidden;"><b></b></h3>
				
				<form action="" method="post">
					<div class="form-group">
						<label for="id_ekskul">Kode Ekstrakulikuler</label>
						<input type="text" class="form-control" readonly="readonly" name="id_ekskul" value="<?php echo $data['id_ekskul']?>">
					</div>

					<div class="form-group floating-label">
						<label for="nama_ekskul">Nama Ekstrakulikuler</label>
						<input type="text" class="form-control" name="nama_ekskul" value="<?php echo $data['nama_ekskul'] ?>">
					</div>

					

					<button type="submit" name="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
				</form>

            </div>
        </div>
    </div>
</div>
