<?php  

session_start();
include '../../koneksi/koneksi.php';

if (isset($_GET['id'])) {
	
	$id 		= 	$_GET['id'];

	$query		= 	"DELETE FROM ekskul WHERE id_ekskul = '$id'";

	$exec 		= 	mysqli_query($conn, $query);

	if ($exec) {
		$_SESSION['message'] 	= 	"Hapus data ekstrakulikuler";
		echo '<script>window.location="../index.php?page=41"</script>';
	}
}
?>