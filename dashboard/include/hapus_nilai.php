<?php  
$guru = $_GET['guru'];
session_start();
include '../../koneksi/koneksi.php';

if (isset($_GET['id'])) {
	
	$id 		= 	$_GET['id'];

	$query		= 	"DELETE FROM nilai WHERE id = $id";

	$exec 		= 	mysqli_query($conn, $query);

	if ($exec) {
		$_SESSION['message'] 	= 	"Hapus nilai siswa";
		echo '<script>window.location="../index.php?page=40&guru='.$guru.'"</script>';
	}
}
?>