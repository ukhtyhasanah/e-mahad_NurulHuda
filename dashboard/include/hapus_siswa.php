<?php  

session_start();
include '../../koneksi/koneksi.php';

if (isset($_GET['nis'])) {
	
	$nis 		= 	$_GET['nis'];

	$query		= 	"DELETE FROM siswa WHERE nis= '$nis'";

	$exec 		= 	mysqli_query($conn, $query);

	if ($exec) {
		$_SESSION['message'] 	= 	"Hapus data siswa";
		echo '<script>window.location="../index.php?page=34"</script>';
	}
}
?>