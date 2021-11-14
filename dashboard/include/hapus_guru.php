<?php  

session_start();
include '../../koneksi/koneksi.php';

if (isset($_GET['NIP'])) {
	
	$NIP 		= 	$_GET['NIP'];

	$query		= 	"DELETE FROM guru WHERE NIP = '$NIP'";

	$exec 		= 	mysqli_query($conn, $query);

	if ($exec) {
		$_SESSION['message'] 	= 	"Hapus data guru";
		echo '<script>window.location="../index.php?page=10"</script>';
	}
}
?>