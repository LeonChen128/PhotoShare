<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (!isset($_SESSION['user'])) {
  echo wrongInput('通訊錯誤', 'index.php');
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  header('Location: home.php?id=' . $_SESSION['user']['id']);
  exit();
}

foreach (getPhotoByPhotoId($_GET['id']) as $photo) {
}

foreach (getAlbumById($photo['album_id']) as $album) {
}

if ($album['author'] != $_SESSION['user']['name']) {
  header('Location: home.php?id=' . $_SESSION['user']['id']);
  exit();
}


?>





<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/updatephoto.css">
    <title>照片小站-相簿編輯</title>
  </head>
  <body class="backgroundColor">
    <div class="header">
      <?php
        echo '<a href="home.php?id=' . $_SESSION['user']['id'] . '">';
        echo '<img src="img/home.jpg" class="home_pic"></a>';
      ?>
      <a href="logout.php" class="header_word">登出</a>
      <a href="others.php" class="header_word">看看其他人</a>
      <?php
      echo '<a href="home.php?id=' . $_SESSION['user']['id'] .'" class="header_word">我的首頁</a>'
      ?>
    </div> 
    <div class="update_frame">
      <form action="updatephoto2.php" method="post">
        <?php
        echo '<input type="hidden" name="id" value="' . $photo['id']. '">';
        echo '<input type="text" name="title" value="' . $photo['title'] . '" class="input_title">';
        ?>
        <button type="submit" class="button_update"><spanl class="update_word">修改</spanl></button>
      </form>
      <form action="updatephoto2.php" method="post">
        <?php
        echo '<input type="hidden" name="id" value="' . $photo['id']. '">';
        ?>
        <button type="submit" class="button_delete"><spanl class="delete_word">刪除照片</spanl></button>
      </form>          
    </div>     
  </body>  
</html>

