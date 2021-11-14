<?php  
$guru = $_GET['guru'];
session_start();
include '../../koneksi/koneksi.php';

if (isset($_GET['nis'])) {
	
	$id 		= 	$_GET['nis'];

	$query		= 	"DELETE FROM kehadiran WHERE id_siswa = $id";

	$exec 		= 	mysqli_query($conn, $query);

	if ($exec) {
		$_SESSION['message'] 	= 	"Hapus data kehadiran";
		echo '<script>window.location="../index.php?page=38&guru='.$guru.'"</script>';
	}
}
?>