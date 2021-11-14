<style>
	h5{
		margin-left: 30px;
	}
</style>
<?php  
if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-success alert-dismissable'>
      <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Berhasil!</strong> ".$_SESSION['message']."
    </div>";
}
?>
<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Data Kehadiran</h4>
               
            </div>
            <div class="card-content">
                <a href="index.php?page=48&guru=<?php echo ($_GET['guru'])?>" class="btn btn-success btn-md pull-right"><i class="fa fa-plus"></i>Tambah Data</a>
        <table class="table table-hover">
          <thead>
            <tr>
              <td><b>NIS</b></td>
              <td><b>Nama</b></td>
              <td><b>Kelas</b></td>
              <td><b>Alpa</b></td>
              <td><b>Izin</b></td>
              <td><b>Sakit</b></td>
              <td><b>Aksi</b></td>
            </tr>
          </thead>
            <tbody>
              
              <?php  

                $query = "SELECT siswa.nis, siswa.nama,siswa.kelas, kehadiran.alpa, kehadiran.izin, kehadiran.sakit FROM siswa INNER JOIN kehadiran ON siswa.nis = kehadiran.id_siswa ";

                $exec  = mysqli_query($conn,$query);

                if ($exec) {
                  $count = mysqli_num_rows($exec);
                  if ($count > 0) {
                    $no = 0;
                    while ($rows = mysqli_fetch_array($exec)) {
                        
                    
              ?>
                      <tr>
                      <td><?php echo $rows['nis'] ?></td>
                      <td><?php echo $rows['nama'] ?></td>
                      <td><?php echo $rows['kelas'] ?></td>
                      <td><?php echo $rows['alpa'] ?></td>
                      <td><?php echo $rows['izin'] ?></td>
                      <td><?php echo $rows['sakit'] ?></td>
                      <td>
                        <a href="index.php?page=39&nis=<?php echo $rows['nis'] ?>&guru=<?php echo ($_GET['guru'])?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                        <a href="include/hapus_kehadiran.php?nis=<?php echo $rows['nis'] ?>&guru=<?php echo ($_GET['guru'])?>" class="btn btn-info btn-sm"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
              <?php
                    }
                  }else{
              ?>
                  <tr>
                  <td colspan="6" align="center"><h4><b>Kosong</b></h4></td>
                </tr>
              <?php
                  }
                }else{
                  echo mysqli_error($conn);
                }

              ?>

            
            </tbody>
        </table>

            </div>
        </div>
    </div>
</div>

<?php  

unset($_SESSION['message']);

?>