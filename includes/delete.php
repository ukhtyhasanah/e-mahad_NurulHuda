<?php
include "config.php";

$id = $_REQUEST['id_del'];

$query="DELETE FROM galeri WHERE id='".$id."' ";
$j=mysqli_query($koneksi,$query);

header('Location: ../galeri.php');
?>