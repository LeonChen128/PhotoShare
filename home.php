<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (!isset($_SESSION['user'])) {
  echo wrongInput('通訊錯誤', 'index.php');
} 

if (!isset($_GET['id'])) {
  header('location:home.php?id=' . $_SESSION['user']['id']);
}

if (!checkId($_GET['id'])) {
  header('location:home.php?id=' . $_SESSION['user']['id']);
}

?>







<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <?php
      echo '<title>照片小站-' . getNameById($_GET['id']) . '的相簿</title>'
    ?>
  </head>
  <body class="backgroundColor">
    <script src="js/home.js"></script>
    <div class="header">
      <?php
        echo '<a href="home.php?id=' . $_SESSION['user']['id'] . '">';
        echo '<img src="img/home.jpg" class="home_pic"></a>';
      ?>
      <a href="logout.php" class="header_word" id="_logout" onmouseover="overHeader('_logout')" onmouseout="outHeader('_logout')">登出</a>
    </div> 
    <div class="main_photo_edge">
      <img src="img/alien.jpg" class="main_photo">
    </div>
    <p class="main_photo_name"><?php echo getNameById($_GET['id']);?></p>
    <div class="album_edge">
      <div class="text"></div>
      <div class="text2"></div>
      <div class="text3"></div>
      <div class="text4"></div>
      <div class="new_photo">
        <a href="editalbum.php" class="edit_album" id="_edit_album" onmouseover="overEdit('_edit_album')" onmouseout="outEdit('_edit_album')">+ 建立相簿</a>
      </div>
      

    </div>
  </body>  
</html>


