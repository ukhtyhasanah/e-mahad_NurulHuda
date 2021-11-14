<?php  

session_start();

include 'koneksi/koneksi.php';

if (isset($_POST['submit'])) {
	
	foreach ($_POST as $key => $val) {
		${$key} = $val;
	}

	$query	=	"SELECT a.password,a.role_user as role,a.id as id_akun, b.id as id_daftar from akun a, pendaftaran b 
				WHERE email='$email' 
				AND b.id = a.id_user";

	$exec 	= mysqli_query($conn, $query);

	if ($exec) {

		if (mysqli_num_rows($exec) > 0) {
			while ($rows = mysqli_fetch_array($exec)) {
			    
			    if (password_verify($password,$rows['password'])) {
			    	$_SESSION['role_user'] 	= $rows['role'];
			    	$_SESSION['auth']		= $rows['id_daftar'];

			    	
			    	echo'<script> window.location="dashboard/index.php"; </script> ';

			    }else{
			    	echo 'Password Salah!';
			    }

			}
		}
        else{

			$query	=	"SELECT password,role_user,id from akun 
				WHERE email='$email'";

			$exec 	= mysqli_query($conn, $query);

			if ($exec) {
				if (mysqli_num_rows($exec) > 0) {
					while ($rows = mysqli_fetch_array($exec)) {
					    
					    if (password_verify($password,$rows['password'])) {
					    	$_SESSION['role_user'] 	= $rows['role_user'];
					    	$_SESSION['auth']		= $rows['id'];

					    	echo'<script> window.location="dashboard/index.php"; </script> ';

					    }else{
					    	echo 'Password Salah!';
					    }

					}
				}
                else{
                    $query  =   "SELECT * FROM `guru` WHERE NIP='$email'";

                    $exec   = mysqli_query($conn, $query);

                    if ($exec) {
                        if (mysqli_num_rows($exec) > 0) {
                            while ($rows = mysqli_fetch_array($exec)) {
                                // var_dump($rows['password']);
                                
                                if ($password == $rows['password']) {
                                    $_SESSION['auth']       = $rows['NIP'];
                                    $_SESSION['role_user']  = 2;

                                    // echo "coba dulu";

                                    echo'<script> window.location="dashboard/index.php"; </script> ';

                                }else{
                                    echo 'Password Salah!';
                                }

                            }
                        }else{
                            echo 'Guru Tidak Terdaftar';
                        }
                    }
                    else{
                        echo 'User Tidak Terdaftar';
                    }
                }
			}
            else{
				
				$exec 	= mysqli_query($conn, $query);

				
			}
		}
        
	}
    else{
        echo mysqli_error($conn);
	}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/h.png" />
    <link rel="icon" type="image/png" href="../assets/img/h.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Penerimaan Santri Baru</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="assets/css/main.css">
	<style>
	/* 
Form Login style
 */
.form-signin
 {
     max-width: 330px;
     padding: 15px;
     margin: 0 auto;
 }
 .form-signin .form-signin-heading, .form-signin .checkbox
 {
     margin-bottom: 10px;
 }
 .form-signin .checkbox
 {
     font-weight: normal;
 }
 .form-signin .form-control
 {
     position: relative;
     font-size: 16px;
     height: auto;
     padding: 10px;
     -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
     box-sizing: border-box;
 }
 .form-signin .form-control:focus
 {
     z-index: 2;
 }
 .form-signin input[type="text"]
 {
     margin-bottom: -1px;
     border-bottom-left-radius: 0;
     border-bottom-right-radius: 0;
 }
 .form-signin input[type="password"]
 {
     margin-bottom: 10px;
     border-top-left-radius: 0;
     border-top-right-radius: 0;
 }
 .account-wall
 {
     margin-top: 10px;
     padding: 40px 0px 20px 0px;
     background-color: #f7f7f7;
     -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
     -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
     box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
 }
 .login-title
 {
     color: #555;
     font-size: 20px;
     font-weight: 400;
     display: block;
	 margin: auto;
	 
 }
 .profile-img
 {
     width: 96px;
     height: 96px;
     margin: 0 auto 10px;
     display: block;
     -moz-border-radius: 50%;
     -webkit-border-radius: 50%;
     border-radius: 50%;
 }
 .need-help
 {
     margin-top: 10px;
 }
 .new-account
 {
     display: block;
     margin-top: 20px;
	 margin-bottom: 10px;
 }
 
 /* 
 END FORM LOGIN STYLE
  */
 
 
 /* 
 Index.php Style
  */
 .card-background{
     background-color: #fff;
     width: 100%;
     height: auto;
     overflow: hidden;
     margin-top: 90px;
     box-shadow: 2px 2px #888;
     border-radius: 10px;
     padding-top: 50px;
 }
 
 .student , .note{
     margin: 30px;
 }
 /* End Index.php Style */
 
 
 /* FIELDSET */
 
 .the-legend {
     border-style: none;
     border-width: 0;
     font-size: 14px;
     line-height: 20px;
     margin-bottom: 0;
 }
 .the-fieldset {
     border: 2px groove threedface #000;
     -webkit-box-shadow:  0px 0px 0px 0px #000;
             box-shadow:  0px 0px 0px 0px #000;
 }
 
 /* END FIELDSET */
	</style>
</head>
<body>
	<div class="container">
	    <div class="row">
	        <div class="col-sm-6 col-md-4 col-md-offset-4">
			<div class="card-background m-auto">
	            <h1 class="text-center login-title">Selamat Datang Santri Ma'had Nurul Huda</h1>
	            <div class="account-wall">
	                <img class="profile-img" src=assets/img/login.png
	                    alt="">
	                <form class="form-signin" method="post" action="">
		                <input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
		                <input type="password" class="form-control" name="password" placeholder="Password" required>
		                <button class="btn btn-lg btn-success btn-block" type="submit" name="submit">
		                    Sign in</button>
							
							
	                </form>
					</div>
	            <a href="indek.php" class="text-center new-account">Kembali </a>
	        </div>
	    </div>
	</div>
</body>
</html>