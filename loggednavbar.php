<?php
  $isActive = $_SESSION['currentpg'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>navigation bar on logged</title>
  <link rel="stylesheet" type="text/css" href="assets/css/navbar.css">
  <link rel="stylesheet" type="text/css" href="assets/css/navbarlogged.css">
</head>

<body>

  <header class="header">
    <img class="header__logo" src="assets/images/1.png" alt="1">
    <nav class="nav">
      <ul class="nav__wrapper">
        <li class="nav__item"><a href="index.php" <?php if($isActive === "home") echo 'class="nav__link active"'; else echo 'class="nav__link"'; ?>>MA'HAD NURUL HUDA</a></li>

          <li class="nav__item"><a href="logout_chat.php" class="nav__link">Log out</a></li>
        <li id="timeofday" class="nav__item__logged"></li>
      </ul>
  </header>

  <script>
    // client side clock
    var time = new Date();
    var hour = time.getHours();
    console.log("Your actual hour is: " + hour);
    var jsusername = '<?php echo $_SESSION['username']; ?>';
    var getRank = '<?php echo $_SESSION['rank'];?>';
    var user_rank = "[ERROR]";
    var createspan = document.createElement('span');
    var createspan2 = document.createElement('span');
    createspan.className = "myusername";
    createspan.innerHTML = jsusername;
    if(getRank == 1) {
      user_rank = "[USER]";
      createspan2.className = "userrank";
    }
    else {
       user_rank = "[ADMIN]";
       createspan2.className = "admrank";
     }
    createspan2.innerHTML = user_rank;

    var message = "ERROR 3: ";
    if((hour >= 23 && hour <= 24) || (hour >= 0 && hour <= 6) )
      message = "Good night, ";
    if(hour >= 7 && hour <= 12)
      message = "Good morning, ";
    if(hour >= 13 && hour <= 18)
      message = "Good afternoon, ";
    if(hour >= 19 && hour <= 22)
      message = "Good evening, ";

    document.getElementById('timeofday').innerHTML = message;
    document.getElementById('timeofday').appendChild(createspan);
    document.getElementById('timeofday').appendChild(createspan2);

  </script>

</body>

</html>
