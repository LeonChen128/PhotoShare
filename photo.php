<?php

include 'lib/define.php';
include 'lib/funcs.php';

?>


<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/photo.css">
    <?php
      echo '<title>照片小站-' . getNameById($_GET['id']) . '的相簿</title>'
    ?>
  </head>
  <body class="backgroundColor">
    <div class="header">
      <?php
        echo '<a href="home.php?id=' . $_SESSION['user']['id'] . '">';
        echo '<img src="img/home.jpg" class="home_pic"></a>';
      ?>
      <a href="logout.php" class="header_word">登出</a>
    </div> 
    
  </body>  
</html>



