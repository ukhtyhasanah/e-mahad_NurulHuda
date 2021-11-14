<?php  

include '../auth.php';
include '../koneksi/koneksi.php';

$role = "";

$id 	= $_SESSION['auth'];


if ($_SESSION['role_user'] == 0) {
	$role = "Admin";
    $query      = "SELECT * FROM akun WHERE id = $id";

    $exec       = mysqli_query($conn, $query);

    if ($exec) {
    
        while ($user = mysqli_fetch_array($exec)) {
            foreach ($user as $key=>$val) {
                ${$key} = $val;
            }       
        }
    }

}else if ($_SESSION['role_user'] == 1) {
	$role = "User";
    $query      = "SELECT a.*,b.* FROM pendaftaran a, akun b WHERE a.id = $id AND b.id_user=$id";

    $exec       = mysqli_query($conn, $query);


    if ($exec) {
        while ($user = mysqli_fetch_array($exec)) {
            foreach ($user as $key=>$val) {
                ${$key} = $val;
            }       
        }
    }
}else{
    $role = "Guru";
    $query      = "SELECT * FROM guru WHERE NIP = $id";

    $exec       = mysqli_query($conn, $query);


    if ($exec) {
        while ($user = mysqli_fetch_array($exec)) {
            foreach ($user as $key=>$val) {
                ${$key} = $val;
            }       
        }
    }
}





$getPage = $_GET['page'];

switch ($getPage) {
	case 1:
		$page 				= "include/home.php";
		$_SESSION['active']	= "1";
		break;
	case 2:
		$page 				= "include/profile.php";
		$_SESSION['active']	= "2";
		break;
	case 3:
		$page 				= "include/edit_profile.php";
		$_SESSION['active']	= "2";
		break;
	case 4:
		$page 				= "include/syarat_pendaftaran.php";
		$_SESSION['active'] = "3";
		break;
	case 5:
		$page 				= "include/upload_akte.php";
		$_SESSION['active'] = "3";
		break;
	case 6:
		$page 				= "include/upload_foto2r.php";
		$_SESSION['active'] = "3";
		break;
	case 7:
		$page 				= "include/konfirmasi_pendaftaran.php";
		$_SESSION['active']	= "4";
		break;
    case 8:
        $page               = "include/detail_pendaftaran.php";
        $ida                = $_GET['ida'];
        $idd                = $_GET['idd'];
        $_SESSION['active'] = "4"; 
        break;
    case 9:
        $page               = "include/pembayaran.php";
        $_SESSION['active'] = "5";
        break;
    case 10:
        $page               = "include/guru.php";
        $_SESSION['active'] = "6";
        break;
    case 11:
        $page               = "include/tambah_guru.php";
        $_SESSION['active'] = "6";
        break;
    case 12:
        $page               = "include/ubah_guru.php";
        $_SESSION['active'] = "6";
        $NIP                = $_GET['NIP'];
        break;
    case 13:
        $page               = "include/review_pembayaran_pendaftaran.php";
        $_SESSION['active'] = '5';
        break;
    case 14:
        $page               =  "include/konfirmasi_pembayaran_user.php";
        $_SESSION['active'] = '7';
        break;
    case 15:
        $page               =  "include/konfirmasi_pembayaran_pendaftaran.php";
        $_SESSION['active'] = '7';
        break;
    case 16:
        $page               = "include/konfirmasi_pembayaran_spp.php";
        $_SESSION['active'] = '7';
        break;
    case 17:
        $page               = "include/konfirmasi_pembayaran_pendaftaran_admin.php";
        $_SESSION['active'] = '8';
        break;
    case 18:
        $page               = "include/laporan.php";
        $_SESSION['active'] = "9";
        break;
    case 19:
        $page               = "include/mapel.php";
        $_SESSION['active'] = "10";
        break;
    case 20:
        $page               = "include/tambah_mapel.php";
        $_SESSION['active'] = "10";
        break;
    case 21:
        $page               = "include/ubah_mapel.php";
        $_SESSION['active'] = "10";
        $id                 = $_GET['id'];
        break;
    case 22:
        $page               = "include/jadwal.php";
        $_SESSION['active'] = "11";
        break;
    case 23:
        $page               = "include/tambah_jadwal.php";
        $_SESSION['active'] = "11";
        $kelas              = $_GET['kelas'];
        break;
    case 24:
        $page               = "include/jadwal_user.php";
        $_SESSION['active'] = "12";        
        break;
    case 25:
        $page               = "include/konfirmasi_pembayaran_spp_admin.php";
        $_SESSION['active'] = "13";
        break;
    case 26:
        $page               = "include/konfirmasi_pembayaran_kegiatan_admin.php";
        $_SESSION['active'] = "14";
        break;
    case 27:
        $page               = "include/konfirmasi_pembayaran_kegiatan.php";
        $_SESSION['active'] = "7";
        break;
    case 28:
            $page               = "include/alumni.php";
            $_SESSION['active'] = "15";
            break;
    case 29:
            $page               = "include/tambah_alumni.php";
            $_SESSION['active'] = "15";
            break;
    case 30:
            $page               = "include/ubah_alumni.php";
            $_SESSION['active'] = "16";
            $nis                = $_GET['nis'];
            break;
    case 31:
            $page               = "include/alumni_admin.php";
            $_SESSION['active'] = "15";
            break;
    case 32:
            $page               ='include/edit_nilai.php';
            $_SESSION['active'] ='17';
            $nis                = $_GET['nis'];
            break;
    case 33:
            $page               ='include/raport.php';
            $_SESSION['active'] ='18';
            break;
    case 34:
            $page               ='include/siswa.php';
            $_SESSION['active'] ='19';
            break;
    case 35:
            $page               ='include/ubah_siswa.php';
            $_SESSION['active'] ='20';
            $nis                = $_GET['nis'];
            break;
    case 36:
            $page               ='include/tambah_nilai.php';
            $_SESSION['active'] ='21';
            break;
    case 37:
            $page               ='include/raport_admin.php';
            $_SESSION['active'] ='22';
            break;
    case 38:
            $page               ='include/ketidakhadiran.php';
            $_SESSION['active'] ='23';
            break;
    case 39:
            $page               ='include/edit_kehadiran.php';
            $_SESSION['active'] ='24';
            $nis                = $_GET['nis'];
            break;
    case 40:
            $page               ='include/raport_guru.php';
            $_SESSION['active'] ='25';
            break;
    case 41:
            $page               ='include/ekskul.php';
            $_SESSION['active'] ='26';
            break;
    case 42:
            $page               ='include/tambah_ekskul.php';
            $_SESSION['active'] ='27';
            break;
    case 43:
            $page               ='include/edit_ekskul.php';
            $_SESSION['active'] ='28';
            $id_ekskul          = $_GET['id_ekskul'];
            break;
    case 44:
            $page               ='include/tambah_nilai_ekskul.php';
            $_SESSION['active'] ='29';
            break;
    case 45:
            $page               ='include/cetak_rapor.php';
            $_SESSION['active'] ='30';
            break;
    case 46:
            $page               ='include/ekskul_guru.php';
            $_SESSION['active'] ='31';
            break;
    case 47:
            $page               ='include/edit_nilai_ekskul.php';
            $_SESSION['active'] ='32';
            $id_ekskul          = $_GET['id_ekskul'];
            break;
    case 48:
            $page               ='include/tambah_kehadiran.php';
            $_SESSION['active'] ='33';
            break;
    default:
		$page 	= "include/home.php";
		$_SESSION['active']	= "1";
		break;
}

?>

<!doctype html>
<html lang="en">
	
<head>
    
    <title>Dashboard E-Ma'had <?php echo $role; ?></title>
	

    <?php  
    	include "include/libs.php";
    ?>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
            <!--
                Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

                Tip 2: you can also add an image using data-image tag
            -->
            <div class="logo">
                <a class="simple-text">
                    <?php 
                    $role == "Admin" ? print($nama_admin) : print($nama); 
                    $role == "Guru" ?  print($nama_guru) : print("");
                    ?>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="<?php $_SESSION['active'] == 1 ? print("active") : print("") ?>">
                        <a href="index.php?page=1">
                            <i class="material-icons">dashboard</i>
                            <p>Home</p>
                        </a>
                    </li>

                    <?php  
                    if ($role == "Guru") {
                    ?>
                    <li class="<?php $_SESSION['active'] == 23 ? print("active") : print("") ?>">
                        <a href="index.php?page=38&guru=<?php print($nama_guru)?>">
                            <i class="material-icons">content_paste</i>
                            <p>Kehadiran</p>
                        </a>
                    </li>
                     <li class="<?php $_SESSION['active'] == 25 ? print("active") : print("") ?>">
                        <a href="index.php?page=40&guru=<?php print($nama_guru)?>">
                            <i class="material-icons">library_books</i>
                            <p>Rapor</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 31 ? print("active") : print("") ?>">
                        <a href="index.php?page=46&guru=<?php print($nama_guru)?>">
                            <i class="material-icons">library_books</i>
                            <p>Ekstrakulikuler</p>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
					
					<?php  
					if ($role == "User") {
					?>
					<li class="<?php $_SESSION['active'] == 2 ? print("active") : print("") ?>">
                        <a href="index.php?page=2">
                            <i class="material-icons">person</i>
                            <p>User Profile </p>
                        </a>
                    </li>
					<?php
					}
					?>
                    
                    <?php  
					if ($role == "Admin") {
					?>
					<li class="<?php $_SESSION['active'] == 4 ? print("active") : print("") ?>">
                        <a href="index.php?page=7">
                            <i class="material-icons">content_paste</i>
                            <p>Konfirmasi Pendaftaran </p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 6 ? print("active") : print("") ?>">
                        <a href="index.php?page=10">
                            <i class="material-icons">person</i>
                            <p>Data Pembina</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 19 ? print("active") : print("") ?>">
                        <a href="index.php?page=34">
                            <i class="material-icons">person</i>
                            <p>Data Siswa</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 9 ? print("active") : print("") ?>">
                        <a href="index.php?page=18">
                            <i class="material-icons">subject</i>
                            <p>Laporan</p>
                        </a>
                    </li>
                     <li class="<?php $_SESSION['active'] == 22 ? print("active") : print("") ?>">
                        <a href="index.php?page=37">
                            <i class="material-icons">book</i>
                            <p>Raport</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 8 ? print("active") : print("") ?>">
                        <a href="index.php?page=17">
                            <i class="material-icons">money</i>
                            <p>Pembayaran Pendaftaran</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 13 ? print("active") : print("") ?>">
                        <a href="index.php?page=25">
                            <i class="material-icons">money</i>
                            <p>Pembayaran SPP</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 14 ? print("active") : print("") ?>">
                        <a href="index.php?page=26">
                            <i class="material-icons">money</i>
                            <p>Pembayaran Kegiatan</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 10 ? print("active") : print("") ?>">
                        <a href="index.php?page=19">
                            <i class="material-icons">content_paste</i>
                            <p>Mata Pelajaran</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 11 ? print("active") : print("") ?>">
                        <a href="index.php?page=22">
                            <i class="material-icons">content_paste</i>
                            <p>Jadwal</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 26 ? print("active") : print("") ?>">
                        <a href="index.php?page=41">
                            <i class="material-icons">subject</i>
                            <p>Ekstakulikuler</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 15 ? print("active") : print("") ?>">
                        <a href="index.php?page=31">
                            <i class="material-icons">book</i>
                            <p>Alumni</p>
                        </a>
                    </li>
					<?php
					}
					?>
                    
                    <?php  
                    if ($role == "User") {
                    ?>
                    <li class="<?php $_SESSION['active'] == 3 ? print("active") : print("") ?>">
                        <a href="index.php?page=4">
                            <i class="material-icons">content_paste</i>
                            <p>Syarat Pendaftaran</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 5 ? print("active") : print("") ?>">
                        <a href="index.php?page=9">
                            <i class="material-icons">money</i>
                            <p>Pembayaran</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 7 ? print("active") : print("") ?>">
                        <a href="index.php?page=14">
                            <i class="material-icons">money</i>
                            <p>Konfirmasi Pembayaran</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 12 ? print("active") : print("") ?>">
                        <a href="index.php?page=24">
                            <i class="material-icons">content_paste</i>
                            <p>Jadwal</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 15 ? print("active") : print("") ?>">
                        <a href="index.php?page=28">
                            <i class="material-icons">book</i>
                            <p>Alumni</p>
                        </a>
                    </li>
                    <li class="<?php $_SESSION['active'] == 18 ? print("active") : print("") ?>">
                        <a href="index.php?page=33&nama=<?php print($nama_panggilan)?>">
                            <i class="material-icons">book</i>
                            <p>Rapor</p>
                        </a>
                    </li>

                    <?php
                    }
                    ?>
                    
                
                    <li>
                        <a href="../logout.php">
                            <i class="material-icons text-gray">notifications</i>
                            <p>Logout</p>
                        </a>
                    </li>
                   
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                   
                   <?php  

                   include $page;

                   ?>
                        
                </div>
            </div>
        </div>
    </div>
</body>

<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="../assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

<script>
    $(document).ready(function(){
        $("#cetak").click(function(){
            window.print();
        });
    });
</script>

</html>