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

	if ($mapel == "") {
		array_push($err, "mapel tidak boleh kosong");
		$valid = false;
	}
	if ($semester == "") {
		array_push($err, "semester tidak boleh kosong");
		$valid = false;
	}
	if ($nh == "") {
		array_push($err, "nh tidak boleh kosong");
		$valid = false;
	}

	if ($nh2 == "") {
		array_push($err, "nh2 tidak boleh kosong");
		$valid = false;
	}
	if ($nh3 == "") {
		array_push($err, "nh3 tidak boleh kosong");
		$valid = false;
	}

	if ($nh4 == "") {
		array_push($err, "nh4 tidak boleh kosong");
		$valid = false;
	}
	if ($nh5 == "") {
		array_push($err, "nh5 tidak boleh kosong");
		$valid = false;
	}
	if ($uts== "") {
		array_push($err, "utstidak boleh kosong");
		$valid = false;
	}

	if ($uas == "") {
		array_push($err, "uas tidak boleh kosong");
		$valid = false;
	}
	
	if ($valid == false) {
		echo '<script>alert("tidak boleh ada field yang kosong")</script>';
	}else{
		$guru = $_GET['guru'];
		$queryGuru		=	"SELECT * FROM `guru` WHERE nama_guru = '$guru'";
		$execGuru 		=	mysqli_query($conn, $queryGuru);
		$rows = mysqli_fetch_array($execGuru);
		$nip = $rows['NIP'];

		$nilaiTugas = ($nh+$nh2+$nh3+$nh4+$nh5)/5;
		$nilaiTotal = $nilaiTugas*30/100 + $uts*30/100 + $uas*40/100;
		// var_dump($nilaiTotal);
		$predikat = "Kosong";
		$deskripsi = "Kosong";

		if($nilaiTotal>=85)
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
		// var_dump($mapel);
		// 		var_dump($deskripsi);

		$query		=	"INSERT INTO `nilai` (`id`, `id_mapel`, `id_guru`, `id_siswa`, `semester`, `kkm`, `tugas1`, `tugas2`, `tugas3`, `tugas4`, `tugas5`, `uts`, `uas`, `nilai`, `predikat`, `deskripsi`) VALUES (NULL, '$mapel', '$nip', '$nis','$semester', '70', $nh, $nh2, $nh3, $nh4, $nh5, $uts, $uas, $nilaiTotal, '$predikat', '$deskripsi')";
		$exec 		=	mysqli_query($conn, $query);

		// var_dump($exec);

		if ($exec) {
			$_SESSION['message'] = "Berhasil tambah nilai";
			echo '<script>window.location = "index.php?page=40&guru='.$guru.'"</script>';
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
                <a href="index.php?page=40&guru=<?php echo($_GET['guru'])?>" class="btn btn-success btn-md pull-right"><i class="fa fa-arrow-left"></i> Kembali</a>
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
								// var_dump($data);
                            ?>
                                <option value="<?php echo $data['nis']?>"><?php echo $data['nis']?> </option>
                                <?php } ?>
                            
                        </select>
                    </div>
                    <div class="form-group">
						
						<label for="mapel">Mapel</label>
						
                        <select class="form-control" name="mapel" id="mapel">
						<option value="" selected disabled>-- Pilih Mata Pelajaran --</option>
                            <?php
                            $a="SELECT * FROM `mapel`";
                            $sql=mysqli_query($conn, $a);
                            while($data=mysqli_fetch_array($sql)){
								var_dump($data);
                            ?>
                                <option value="<?php echo $data['kode_mapel_kegiatan']?>"><?php echo $data['nama_mapel_kegiatan']?> </option>
                                <?php } ?>
                            
                        </select>
                    </div>		
                    <div class="form-group">
						
						<label for="semester">Semester</label>
						
                        <select class="form-control" name="semester" id="semester">
							<option value="" selected disabled>-- Pilih Semester --</option>
	                        <?php
	                        $data = 1;
	                        while($data < 7){
	                        ?>
		                        <option value="Semester <?php echo $data?>">Semester <?php echo $data?></option>
		                        <?php 
		                        $data++;
	                        } 
	                        ?>
                            
                        </select>
                    </div>	
					<div class="form-group floating-label">
						<label for="nh">Nilai Harian</label>
						<input type="text" class="form-control" name="nh" value="<?php isset($_SESSION['nh'])  ?  print($_SESSION['nh']) : ""; ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nh2">Nilai Harian 2</label>
						<input type="text" class="form-control" name="nh2" value="<?php isset($_SESSION['nh2'])  ?  print($_SESSION['nh2']) : ""; ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nh3">Nilai Harian 3</label>
						<input type="text" class="form-control" name="nh3" value="<?php isset($_SESSION['nh3'])  ?  print($_SESSION['nh3']) : ""; ?>">
					</div>

					<div class="form-group floating-label">
						<label for="nh4">Nilai Harian 4</label>
						<input type="text" class="form-control" name="nh4" value="<?php isset($_SESSION['nh4'])  ?  print($_SESSION['nh4']) : ""; ?>">
					</div>
					<div class="form-group floating-label">
						<label for="nh5">Nilai Harian 5</label>
						<input type="text" class="form-control" name="nh5" value="<?php isset($_SESSION['nh5'])  ?  print($_SESSION['nh5']) : ""; ?>">
					</div>

					<div class="form-group floating-label">
						<label for="uts">Nilai UTS</label>
						<input type="text" class="form-control" name="uts" value="<?php isset($_SESSION['uts'])  ?  print($_SESSION['uts']) : ""; ?>">
					</div>

					<div class="form-group floating-label">
						<label for="uas">Nilai UAS</label>
						<input type="text" class="form-control" name="uas" value="<?php isset($_SESSION['uas'])  ?  print($_SESSION['uas']) : ""; ?>">
					</div>


					
	
					<button type="submit" name="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> &nbsp;Simpan</button>
					<button type="reset" class="btn btn-info pull-right"><i class="fa fa-eraser"></i> Bersihkan</button>
				</form>

            </div>
        </div>
    </div>
</div>
