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
	if ($alpa == "") {
		array_push($err, "alpa tidak boleh kosong");
		$valid = false;
	}

	if ($izin == "") {
		array_push($err, "izin tidak boleh kosong");
		$valid = false;
	}
	if ($sakit == "") {
		array_push($err, "sakit tidak boleh kosong");
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
		}

		$query		=	"INSERT INTO `kehadiran`(`id_siswa`, `alpa`, `izin`, `sakit`) VALUES ($nis, $alpa, $izin, $sakit)";
		$exec 		=	mysqli_query($conn, $query);

		if ($exec) {
			$_SESSION['message'] = "Berhasil tambah kehadiran";
			echo '<script>window.location = "index.php?page=38&guru='.$guru.'"</script>';
		}else{
			echo mysqli_error($conn);
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
                <h4 class="title">Tambah Kehadiran</h4>
                <p class="category">Masukan keterangan dengan benar</p>
            </div>

            <div class="card-content">
                <a href="index.php?page=46&guru=<?php echo($_GET['guru'])?>" class="btn btn-success btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                <h3 style="overflow: hidden;"><b></b></h3>
				
				<form action="" method="post">
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
						<label for="alpa">Alpa</label>
						<input type="text" class="form-control" name="alpa" value="<?php isset($_SESSION['alpa'])  ?  print($_SESSION['alpa']) : ""; ?>">
					</div>
					<div class="form-group floating-label">
						<label for="izin">Izin</label>
						<input type="text" class="form-control" name="izin" value="<?php isset($_SESSION['izin'])  ?  print($_SESSION['izin']) : ""; ?>">
					</div>
					<div class="form-group floating-label">
						<label for="sakit">Sakit</label>
						<input type="text" class="form-control" name="sakit" value="<?php isset($_SESSION['sakit'])  ?  print($_SESSION['sakit']) : ""; ?>">
					</div>
					
					<button type="submit" name="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-info pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>
