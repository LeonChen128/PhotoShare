<?php

include 'lib/define.php';
include 'lib/funcs.php';


if (!isset($_SESSION['user'])) {
  echo wrongInput('通訊錯誤', 'index.php');
} 

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  header('Location: home.php?id='. $_SESSION['user']['id']);
}

if (!getAlbumById($_GET['id'])) {
  header('Location: home.php?id='. $_SESSION['user']['id']);
}

foreach (getAlbumById($_GET['id']) as $album) {
}

foreach (getUserByName($album['author']) as $user) { 
}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/photo.css">
    <?php
      echo '<title>照片小站-' . $album['author'] . '的相簿</title>'
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
    echo '/' . $album['title'] . '</p>';
    if ($_SESSION['user']['id'] == $user['id']) {
      echo '<div class="update_album_fram">';
      echo '<a href="updatealbum.php?id=' . $album['id'] . '" class="update_album_word">';
      echo '編輯相簿</a>';
      echo '</div>';
    }   
    ?>
    <div class="photo_frame">
      <?php
      foreach (getPhotoById($_GET['id']) as $photos) {
        echo '<div class="img_edge">';
        echo '<a href="photoshow.php?id=' . $photos['id'] . '">';
        echo '<img src="' . $photos['path'] . '" class="img">';
        echo '</a>';
        echo '</div>';
      }

      if ($album['author'] == $_SESSION['user']['name']) {
        echo '<div class="new_photo">';
        echo '<a href="editphoto.php?id=' . $album['id'] . '" class="new_word">+ 新增照片</a>';
        echo '</div>';
      }
      ?>

    </div>     
  </body>  
</html>



