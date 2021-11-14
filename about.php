<?php
  session_start();
  $_SESSION['currentpg'] = "about";
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forum Chat Ma'had Nurul Huda</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/3.png">
  <link rel="stylesheet" type="text/css" href="assets/css/main-chat.css">
  <link rel="stylesheet" type="text/css" href="assets/css/aboutstyle.css">
</head>

<body>

  <?php
    if($_SESSION['$isUserLogged'])
      include "loggednavbar.php";
    else include "navbar.php";
    include "footer.html";
  ?>

  <main class="about__main">
      <div class="about__mainwindow">
        <h1>Forum Chat Mahad Nurul Huda</h1>
        <ul class="about__text">
          <li>forum chat ini dibuat agar Bpk/Ibu pengasuh Mahad bisa mengontrol Santri/Santriwati</li>
          
        </ul>
        <h2>Chat Commands</h2> <br>
        <h3>REGISTER</h3>
        <ul class="about__text">
          <li>jika tidak mempunyai akun silahkan register terlebih dahulu </li>
          
        </ul>
        <h3>LOGIN</h3>
        <ul class="about__text">
          <li>jika sudah mempunyai akun maka silahkan lanjutkan ke log in</li>
          <li>jika sudah selesai menggunakan form chat maka harus log out agar akun tidak disalahgukan</li>
        </ul>
      </div>
  </main>

</body>
