<?php

include 'lib/define.php';
include 'lib/funcs.php';


if (!isset($_SESSION['user'])) {
  echo wrongInput('通訊錯誤', 'index.php');
} elseif (!isset($_GET['id'])) {
  header('Location: home.php?id='. $_SESSION['user']['id']);
}

if (!isset($_GET['id'])) {
  header('Location: home.php?id='. $_SESSION['user']['id']);
}

if (!getAlbumById($_GET['id'])) {
  header('Location: home.php?id='. $_SESSION['user']['id']);
}

foreach (getAlbumById($_GET['id']) as $album) {
}

foreach (getUserById($_GET['id']) as $user) {
}

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
      <?php
      echo '<a href="home.php?id=' . $_SESSION['user']['id'] .'" class="header_word">我的首頁</a>'
      ?>
    </div> 
    <?php
    echo '<p class="title">' . $album['author'] . '.' . $album['title'] . '</p>';
    ?>
    <div class="photo_frame">
      <?php
      foreach (getPhotoById($_GET['id']) as $photos) {
        echo '<div class="img_edge">';
        echo '<img src="' . $photos['path'] . '" class="img">';
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



