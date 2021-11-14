

<center><img src="../assets/img/lg.jpg" alt="Login"></center>
<center><h4><b>Rincian Pembayaran Pendaftaran Ma'had Nurul Huda</b></h4></center>
<center>Jalan. Soekarno Hatta Nomor.255 Telepon./FAX.(03355)421842</center>
<center> Website : www.man2kotaprobolinggo.sch.id Email : man_koprob_02@yahoo.co.id</center>

<center>______________________________________________________________________________________________</center>

<?php  

if (isset($_GET['metode_pembayaran'])) {
	$metode_pembayaran	=	$_GET['metode_pembayaran'];
}

$m 	= "";

if ($metode_pembayaran == 0) {
	$m = "L";
}else{
	$m = "C";
}

$queryUpdate 	=	"UPDATE detail_pendaftaran 
					SET metode_pembayaran_pendaftaran='$m'
					WHERE id_user=$id";

$execUpdate 	=	mysqli_query($conn, $queryUpdate);

if ($execUpdate) {
	echo '<script>alert("Berhasil pilih metode pendaftaran, silahkan lakukan pembayaran")</script>';
}else{
	echo mysqli_error($conn);
}


$queryx     =   "SELECT * FROM detail_pendaftaran WHERE id_user = $id";
$execx      =   mysqli_query($conn, $queryx);
if($execx){
    $daftar = mysqli_fetch_array($execx);

}else{
    echo 'gagal';
}	

?>


<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-10 col-lg-offset-1">
        <div class="card" style="margin-top: 50px">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Biaya yang harus dibayarkan</h4>
                <p class="category"></p>
            </div>
            <div class="card-content">
            


            <h4><b><?php echo $nama; ?></b>, Anda masuk kedalam siswa <?php echo "<b>".$daftar['kelas']."</b>"; ?> dengan metode pembayaran 
            	<?php $metode_pembayaran == 0 ? print("<b><i>LUNAS</i></b>") : print("<b><i>CICILAN</i></b>"); ?>:</h4>
			
			<?php  

			if ($daftar['kelas'] == 'Baru') {
			?>
			
				
				<?php 

				if ($metode_pembayaran == 0) {
				?>

				<ol>
				<li><b>Siswa Baru : </b></li>
				<table class="table table-responsive table-hove">
					<thead>
						<tr>
							<th>Jenis Pengeluaran</th>
							<th align="right">Biaya</th>
						</tr>
					</thead>
					<tbody>
					<tr>
							<td>Ma'had Bulan (Januari, Februari, Maret)</td>
							<td align="right">150.000</td>
						</tr>
						<tr>
							<td>Ma'had Bulan (April, Mei, Juni)</td>
							<td align="right">150.000</td>
						</tr>
						<tr>
							<td>Ma'had Bulan (Juli, Agustus, September)</td>
							<td align="right">150.000</td>
						</tr>
						<tr>
							<td>Ma'had Bulan (Oktober, November, Desember) </td>
							<td align="right">150.000</td>
						</tr>
						<tr>
							<td align="center"><b>Total</b></td>
							<td align="right"><b>Rp.600.000</b></td>
						</tr>
					</tbody>
				</table>
				<?php
				}else{
				?>

				<ol>
				<li><b>Siswa Baru CICILAN 1 : </b></li>
				<table class="table table-responsive table-hove">
					<thead>
						<tr>
							<th>Jenis Pengeluaran</th>
							<th align="right">Biaya</th>
						</tr>
					</thead>
					<tbody>
					<tr>
							<td>Ma'had Bulan (Januari, Februari, Maret)</td>
							<td align="right">150.000</td>
						</tr>
						<tr>
							<td>Ma'had Bulan (April, Mei, Juni)</td>
							<td align="right">150.000</td>
						</tr>
						<tr>
							<td>Ma'had Bulan (Juli, Agustus, September)</td>
							<td align="right">150.000</td>
						</tr>
						<tr>
							<td>Ma'had Bulan (Oktober, November, Desember) </td>
							<td align="right">150.000</td>
						</tr>
						<tr>
							<td align="center"><b>Total</b></td>
							<td align="right"><b>Rp.600.000</b></td>
						</tr>
					</tbody>
				</table>
				<?php
				}
				?>

				
			
			<?php
			}else{
			?>

				<?php 

				if ($metode_pembayaran == 0) {
				?>

				<ol>
				<li><b>Siswa Baru : </b></li>
				<table class="table table-responsive table-hove">
					<thead>
						<tr>
							<th>Jenis Pengeluaran</th>
							<th align="right">Biaya</th>
						</tr>
					</thead>
					<tbody>
					<tr>
							<td>Ma'had Bulan (Januari, Februari, Maret)</td>
							<td align="right">150.000</td>
						</tr>
						<tr>
							<td>Ma'had Bulan (April, Mei, Juni)</td>
							<td align="right">150.000</td>
						</tr>
						<tr>
							<td>Ma'had Bulan (Juli, Agustus, September)</td>
							<td align="right">150.000</td>
						</tr>
						<tr>
							<td>Ma'had Bulan (Oktober, November, Desember)</td>
							<td align="right">150.000</td>
						</tr>
						<tr>
							<td align="center"><b>Total</b></td>
							<td align="right"><b>Rp.600.000</b></td>
						</tr>
					</tbody>
				</table>
				<?php
				}else{
				?>

				<ol>
				<li><b>Siswa Baru CICILAN 1 : </b></li>
				<table class="table table-responsive table-hove">
					<thead>
						<tr>
							<th>Jenis Pengeluaran</th>
							<th align="right">Biaya</th>
						</tr>
					</thead>
					<tbody>
					<tr>
							<td>Ma'had Bulan (Januari, Februari, Maret)</td>
							<td align="right">150.000</td>
						</tr>
						<tr>
							<td>Ma'had Bulan (April, Mei, Juni)</td>
							<td align="right">150.000</td>
						</tr>
						<tr>
							<td>Ma'had Bulan (Juli, Agustus, September)</td>
							<td align="right">150.000</td>
						</tr>
						<tr>
							<td>Ma'had Bulan (Oktober, November, Desember)</td>
							<td align="right">150.000</td>
						</tr>
						<tr>
							<td align="center"><b>Total</b></td>
							<td align="right"><b>Rp.600.000</b></td>
						</tr>
						<tr>
							<td align="center"><b>Total</b></td>
							<td align="right"><b>Rp.600.000</b></td>
						</tr>
					</tbody>
				</table>
				<?php
				}
				?>
				
			<?php
			}

			?>

				
				
			</ol>
			
			<p>Lakukan pembayaran ke rekening XXX a.n XXX</p>

			<b>Lakukan konfirmasi dihalaman konfirmasi pendaftaran</b>
			<br>
			<?php  

			// if ($daftar['status_pendaftaran'] == 1) {
    
			//     // echo '<a href="../assets/uploads/kwitansi-pembayaran.jpeg" class="btn btn-primary btn-md pull-left" download><i class="fa fa-print"></i> Cetak biaya yang harus dibayar untuk pendaftaran</a>';

			//     echo '<a href="#" class="btn btn-primary btn-md pull-left" download data-toggle="modal" data-target="#myModal"><i class="fa fa-print"></i> Cetak biaya yang harus dibayar untuk pendaftaran</a>';

			//     echo '<br><br>';
			// }else{
			//     echo "<div class='alert alert-warning alert-dismissable'>
			//       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			//       <strong>Pendaftaran anda belum dikonfirmasi oleh Admin.</strong> Tunggu konfirmasi admin untuk tahap selanjutnya.
			//     </div>";
			// }

			?>
            
            <h5 align="right">Tanggal Cetak	:	<b><?php echo date("Y-m-d"); ?></b></h5>
			
			<button class="btn btn-primary btn-md pull-right" id="cetak"><i class="fa fa-print"></i>&nbsp; Cetak</button>	

            </div>
        </div>
    </div>
</div>



