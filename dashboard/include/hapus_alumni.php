<?php  

session_start();
include '../../koneksi/koneksi.php';

if (isset($_GET['nis'])) {
	
	$nis 		= 	$_GET['nis'];

	$query		= 	"DELETE FROM alumni WHERE nis = '$nis'";

	$exec 		= 	mysqli_query($conn, $query);

	if ($exec) {
		$_SESSION['message'] 	= 	"Hapus data alumni";
		echo '<script>window.location="../index.php?page=28"</script>';
	}
}
?>