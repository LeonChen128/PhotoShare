<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (!isset($_SESSION['user'])) {
  echo wrongInput('通訊錯誤', 'index.php');
} 

if (!isset($_GET['id'])) {
  header('location:home.php?id=' . $_SESSION['user']['id']);
  exit();
}

if (!checkId($_GET['id'])) {
  header('location:home.php?id=' . $_SESSION['user']['id']);
  exit();
}

foreach (getUserById($_GET['id']) as $user) {
}

$userFolder = thisProjectPath() . '/upload/' . $_GET['id'];
if (!file_exists($userFolder)) {
  mkdir($userFolder);
}

$mainPhotoPath = $userFolder . '/mainPhoto.jpg';




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
    <div class="header">
      <?php
        echo '<a href="home.php?id=' . $_SESSION['user']['id'] . '">';
        echo '<img src="img/home.jpg" class="home_pic"></a>';
      ?>
      <a href="logout.php" class="header_word">登出</a>
    </div> 
    <div class="main_photo_edge">
      <?php
      if (file_exists($mainPhotoPath)) {
        echo '<img src="upload/' . $_GET['id'] . '/mainPhoto.jpg" class="main_photo">' ;      
      } else {
        if ($_GET['id'] == $_SESSION['user']['id']) {
          echo '<div class="upload_photo">';
          echo '<a href="editmainphoto.php" class="upload_word">上傳大頭照</a>';
          echo '</div>';
        } else {
          echo '<div class="upload_photo">';
          echo '<spanl>無大頭照</spanl>';
          echo '</div>';
        }     
      }     
      ?>
    </div>
    <p class="main_photo_name"><?php echo getNameById($_GET['id']);?></p>
    <div class="album_edge">
      <?php
      foreach (getUserAlbum($user['name']) as $albums) {
        echo '<div class="block">';
        echo '<div class="album">';
        echo '<a href="photo.php?id=' . $albums['id'] . '"><img src="' . $albums['path'] . '" class="album_cover"></a>';
        echo '</div>';
        echo '<div class="title_word">';
        echo '<a href="photo.php?id=' . $albums['id'] . '" class="album_word">' . $albums['title'] .'</a>';
        echo '</div>';
        echo '</div>';
      }        
      ?>
      <?php
      if ($_GET['id'] == $_SESSION['user']['id']) {
        echo '<div class="new_photo">';
        echo '<a href="editalbum.php" class="edit_album">+ 建立相簿</a>';
        echo '</div>';
      }           
      ?>
    </div>
  </body>  
</html>


