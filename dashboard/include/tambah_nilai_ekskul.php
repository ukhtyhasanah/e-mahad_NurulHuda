<?php  

    $query="select * from nilai order by nilai desc limit 1";
    $baris=mysqli_query($conn,$query);
    if($baris){
      if(mysqli_num_rows($baris)>0){
        $auto=mysqli_fetch_array($baris);
        $kode=$auto['kode_mapel_kegiatan'];
        $baru=substr($kode,2,4);
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

        $kode2 ="P".$nol2.$nol;
        
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

	if ($nis == "") {
		array_push($err, "nis tidak boleh kosong");
		$valid = false;
	}
	if ($ekskul == "") {
		array_push($err, "ekskul tidak boleh kosong");
		$valid = false;
	}

	if ($nilai == "") {
		array_push($err, "nilai tidak boleh kosong");
		$valid = false;
	}
	
	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	}
	else{
		$guru = $_GET['guru'];
		$queryGuru		=	"SELECT * FROM `guru` WHERE nama_guru = '$guru'";
		$execGuru 		=	mysqli_query($conn, $queryGuru);
		$rows = mysqli_fetch_array($execGuru);
		$nip = $rows['NIP'];

		// var_dump($nilaiTotal);
		$predikat = "Kosong";
		$deskripsi = "Kosong";

		if($nilai>=85)
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
		}

		$query		=	"INSERT INTO `nilai_ekskul` (`id`, `id_ekskul`, `nis`, `nilai`, `predikat`, `deskripsi`) VALUES (NULL, '$ekskul', $nis, $nilai, '$predikat', '$deskripsi')";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil tambah nilai ekskul";
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
                <h4 class="title">Tambah nilai</h4>
                <p class="category">Masukan nilai dengan benar</p>
            </div>

            <div class="card-content">
                <a href="index.php?page=46&guru=<?php echo($_GET['guru'])?>" class="btn btn-success btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                <h3 style="overflow: hidden;"><b></b></h3>
				
				<form action="" method="post">
					<div class="form-group">
					<label for="ekskul">Nama Ekstrakulikuler</label>
						
						<select class="form-control" name="ekskul" id="ekskul">
						<option value="" selected disabled>-- Pilih Ekstrakulikuler --</option>
							<?php
							$a="SELECT * FROM ekskul";
							$sql=mysqli_query($conn, $a);
							while($data=mysqli_fetch_array($sql)){
								var_dump($data);
							?>
								<option value="<?php echo $data['id_ekskul']?>"><?php echo $data['nama_ekskul']?> </option>
								<?php } ?>
                                                
                                            </select>
                                        </div>
					<div class="form-group">
					<label for="nis">NIS</label>
						
						<select class="form-control" name="nis" id="nis">
						<option value="" selected disabled>-- Pilih NIS Siswa --</option>
							<?php
							$a="SELECT * FROM siswa";
							$sql=mysqli_query($conn, $a);
							while($data=mysqli_fetch_array($sql)){
								var_dump($data);
							?>
								<option value="<?php echo $data['nis']?>"><?php echo $data['nis']?> </option>
								<?php } ?>
                                                
                                            </select>
                                        </div>
				
					<div class="form-group floating-label">
						<label for="nilai">Nilai</label>
						<input type="text" class="form-control" name="nilai" value="<?php isset($_SESSION['nilai'])  ?  print($_SESSION['nilai']) : ""; ?>">
					</div>
					
					<button type="submit" name="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-info pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>
