<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (!isset($_SESSION['user'])) {
  echo wrongInput('通訊錯誤', 'index.php');
} 

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  header('Location: home.php?id='. $_SESSION['user']['id']);
  exit();
}

if (!getPhotoByPhotoId($_GET['id'])) {
  header('Location: home.php?id='. $_SESSION['user']['id']);
  exit();
}

foreach (getPhotoByPhotoId($_GET['id']) as $photo) {
}

foreach (getAlbumById ($photo['album_id']) as $album) { 
}

$photos=[];

foreach (getPhotoById($album['id']) as $row) {
  $photos[] = $row['id'];
}

for ($i = 0; $i < count($photos); $i++) {
  if ($photos[$i] == $_GET['id']) {
    $b = $i;
  }
}



?>








<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/photoshow.css">
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
      <a href="others.php" class="header_word">看看其他人</a>
      <?php
      echo '<a href="home.php?id=' . $_SESSION['user']['id'] .'" class="header_word">我的首頁</a>'
      ?>
    </div> 
    <?php
    echo '<p class="title">' . $album['author'] . '/' . $album['title'] . '/' . $photo['title'] . '</p>';
    ?>
    <div class="imgframe">
      <?php
      if (isset($photos[$b+1])) {
        echo '<a href="photoshow.php?id=' . $photos[$b+1] . '">';       
      } else {
        echo '<a href="photoshow.php?id=' . $photos[0] . '">';
      }
      echo '<img src="' . $photo['path'] . '" class="img">';
      echo '</a>';
      ?>
    </div>
  </body>  
</html>



