<?php  
$guru = $_GET['guru'];
session_start();
include '../../koneksi/koneksi.php';

if (isset($_GET['id'])) {
	
	$id 		= 	$_GET['id'];

	$query		= 	"DELETE FROM nilai_ekskul WHERE id = '$id'";

	$exec 		= 	mysqli_query($conn, $query);

	if ($exec) {
		$_SESSION['message'] 	= 	"Hapus data nilai ekstrakulikuler";
		echo '<script>window.location="../index.php?page=46&guru='.$guru.'"</script>';
	}
}
?>