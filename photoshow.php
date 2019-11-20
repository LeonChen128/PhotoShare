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

foreach (getUserByName($album['author']) as $user) {
}

$photos=[];

foreach (getPhotoById($album['id']) as $row) {
  $photos[] = $row['id'];
}

for ($i = 0; $i < count($photos); $i++) {
  if ($photos[$i] == $_GET['id']) {
    $nowId = $i;
  }
}

$countPhotos = count($photos);

?>








<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/photoshow.css">
    <?php
      echo '<title>照片小站-' . $album['author'] . '的相片</title>'
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
    echo '<p class="title">' . '<a href="home.php?id=' . $user['id'] . '" class="home_word">' . $album['author'] . '</a>';
    echo '/' . '<a href="photo.php?id=' . $album['id'] . '" class="album_word">' . $album['title'] . '</a>' . '/' . $photo['title'] . '</p>';
    ?>
    <div class="return_album">
      <?php
      echo '<a href="photo.php?id=' . $album['id'] . '" class="return_album_word"><spanl class="return_album_word_color">回相簿</spanl></a>';
      ?>
    </div>
    <div class="back">
      <?php
      if (isset($photos[$nowId-1])) {
        echo '<a href="photoshow.php?id=' . $photos[$nowId-1] . '" class="back_word"><div class="back_frame">';       
      } else {
        echo '<a href="photoshow.php?id=' . $photos[$countPhotos-1] . '" class="back_word"><div class="back_frame">';
      }
      echo '上一張';
      echo '</div></a>';
      ?>
    </div>
    <div class="next">
      <?php
      if (isset($photos[$nowId+1])) {
        echo '<a href="photoshow.php?id=' . $photos[$nowId+1] . '" class="next_word"><div class="next_frame">';       
      } else {
        echo '<a href="photoshow.php?id=' . $photos[0] . '" class="next_word"><div class="next_frame">';
      }
      echo '下一張';
      echo '</div></a>';
      ?>
    </div> 
    <div class="update">
      <?php
      if ($album['author'] == $_SESSION['user']['name']) {
        echo '<a href="updatephoto.php?id=' . $_GET['id'] . '" class="update_word">';
        echo '<div class="word_frame">編輯照片</div>';
        echo '</a>';
      }
      ?>
    </div>
    <div class="imgframe">
      <?php
      if (isset($photos[$nowId+1])) {
        echo '<a href="photoshow.php?id=' . $photos[$nowId+1] . '">';       
      } else {
        echo '<a href="photoshow.php?id=' . $photos[0] . '">';
      }
      echo '<img src="' . $photo['path'] . '" class="img">';
      echo '</a>';
      ?>
    </div>
  </body>  
</html>



