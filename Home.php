<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FoodEngine - Food Order App</title>
     <link rel="shortcut icon" type="image/x-icon" href="image/background/Fast-Food-icon.ico">
    <link rel="stylesheet" href="Food.css">
     <link rel="stylesheet" href="responsive.css">
</head>
<body class="bodyfirst">

  <?php
    require_once('header.php');
    ?>

  <section>
      <div class="container">
     <?php

          require_once('login.php')

          ?>

      <div class="middle">
        <hr class="verticalline">
      </div>

     <?php
        require_once('signup.php');

     ?>

<div style="position:absolute;left:930px; color:white">Cant Sign Up Food Engine Account? Need <a href="help.php">Help</a></div>
      </div>
  </section>



</body>

</html> 

















