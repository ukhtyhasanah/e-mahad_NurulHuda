
<?php  

    $query="select * from ekskul order by id_ekskul desc limit 1";
    $baris=mysqli_query($conn,$query);
    if($baris){
      if(mysqli_num_rows($baris)>0){
        $auto=mysqli_fetch_array($baris);
        $kode=$auto['id_ekskul'];
        $baru=substr($kode,2,4);
          //$nilai=$baru+1;
          $nol=(int)$baru;
      } 
      else{
        $nol=0;
        }
      $nol=$nol+1;
      $nol2="";
      $nilai=3-strlen($nol);
      for ($i=1;$i<=$nilai;$i++){
        $nol2= $nol2."0";
        }

        $kode2 ="E".$nol2.$nol;
        
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

	if ($id_ekskul == "") {
		array_push($err, "id_ekskul tidak boleh kosong");
		$valid = false;
	}

	if ($nama_ekskul == "") {
		array_push($err, "nama tidak boleh kosong");
		$valid = false;
	}

	
	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	}else{
		$query		=	"INSERT INTO ekskul VALUES('$id_ekskul', '$nama_ekskul')";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil tambah ekstrakulikuler";
			echo '<script>window.location = "index.php?page=41"</script>';
		}else{
			echo mysqli_error($conn);
		}
	}
}else{
	unset($_SESSION['id_ekskul']);
	unset($_SESSION['nama_ekskul']);
}
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Tambah Ekstrakulikuler</h4>
                <p class="category">Masukan data ekstrakulikuler dengan benar</p>
            </div>
            <div class="card-content">
                <a href="index.php?page=41" class="btn btn-success btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                <h3 style="overflow: hidden;"><b></b></h3>
				
				<form action="" method="post">
					<div class="form-group">
						<label for="id_ekskul">Kode Ekstrakulikuler</label>
						<input type="text" class="form-control" readonly="readonly" name="id_ekskul" value="<?php echo $kode2 ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nama_ekskul">Nama Ekstrakulikuler</label>
						<input type="text" class="form-control" name="nama_ekskul" value="<?php isset($_SESSION['nama_ekskul'])  ?  print($_SESSION['nama_ekskul']) : ""; ?>">
					</div>

					
	
					<button type="submit" name="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-info pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>
