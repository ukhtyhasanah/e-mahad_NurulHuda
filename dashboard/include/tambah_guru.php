

<?php  

    $query="select * from guru order by NIP desc limit 1";
    $baris=mysqli_query($conn,$query);
    if($baris){
      if(mysqli_num_rows($baris)>0){
        $auto=mysqli_fetch_array($baris);
        $kode=$auto['NIP'];
        $baru=substr($kode,3,7);
          //$nilai=$baru+1;
          $nol=(int)$baru;
      } 
      else{
        $nol=0;
        }
      $nol=$nol+1;
      $nol2="";
      $nilai=4-strlen($nol);
      for ($i=1;$i<=$nilai;$i++){
        $nol2= $nol2."0";
        }

        $kode2 ="117".$nol2.$nol;
        
    }
    else{
    echo mysqli_error();
    }
 

if (isset($_POST['submit'])) {
	
	$_SESSION['message'] = "";

	$valid = true;
	$err   = array();

	foreach ($_POST as $key=>$val) {
		${$key} = $val;
		$_SESSION[''.$key.''] = $val;
	}

	if ($NIP == "") {
		array_push($err, "nip tidak boleh kosong");
		$valid = false;
	}

	if ($nama_guru == "") {
		array_push($err, "nama_guru tidak boleh kosong");
		$valid = false;
	}

	if ($alamat == "") {
		array_push($err, "alamat tidak boleh kosong");
		$valid = false;
	}

	if ($telp == "") {
		array_push($err, "telp tidak boleh kosong");
		$valid = false;
	}
	if ($kode_mapel_kegiatan == "") {
		array_push($err, "telp tidak boleh kosong");
		$valid = false;
	}

	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	}else{
		$query		=	"INSERT INTO guru VALUES('$NIP', '$nama_guru', '$password', '$alamat', '$telp', '$kode_mapel_kegiatan')";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil tambah data";
			echo '<script>window.location = "index.php?page=10"</script>';
		}else{
			echo mysqli_error($conn);
		}
	}
}else{
	unset($_SESSION['NIP']);
	unset($_SESSION['nama_guru']);
	unset($_SESSION['password']);
	unset($_SESSION['alamat']);
	unset($_SESSION['telp']);
	unset($_SESSION['kode_mapel_kegiatan']);
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Tambah Data</h4>
                <p class="category">Masukan data pengasuh & pembina dengan benar</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=10" class="btn btn-success btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                <h3 style="overflow: hidden;"><b>Data Pengasuh & Pembina</b></h3>
				
				<form action="" method="post">
				<div class="form-group floating-label">
						<label for="nama">NIP</label>
						<input type="text" class="form-control" name="NIP" value="<?php isset($_SESSION['NIP'])  ?  print($_SESSION['NIP']) : ""; ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nama">Nama Pengasuh & Pembina</label>
						<input type="text" class="form-control" name="nama_guru" value="<?php isset($_SESSION['nama_guru'])  ?  print($_SESSION['nama_guru']) : ""; ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nama">Password</label>
						<input type="text" class="form-control" name="password" value="<?php isset($_SESSION['password'])  ?  print($_SESSION['password']) : ""; ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nama">Alamat</label>
						<textarea name="alamat" cols="20" rows="4" class="form-control"><?php isset($_SESSION['alamat'])  ?  print($_SESSION['alamat']) : ""; ?></textarea>
					</div>

					<div class="form-group floating-label">
						<label for="telp">No Telp/Hp</label>
						<input type="text" class="form-control" name="telp" value="<?php isset($_SESSION['telp'])  ?  print($_SESSION['telp']) : ""; ?>">
					</div>
					
					<div class="form-group floating-label">
						<label for="nama">Kode Mapel</label>
						<input type="text" class="form-control" name="kode_mapel_kegiatan" value="<?php isset($_SESSION['kode_mapel_kegiatan'])  ?  print($_SESSION['kode_mapel_kegiatan']) : ""; ?>">
					</div>

					<button type="submit" name="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-info pull-right"><i class="fa fa-eraser"></i>Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>
