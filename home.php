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
      echo '<title>照片小站-' . getNameById($_GET['id']) . '的頁面</title>'
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
    <div class="main_photo_edge">
      <?php
      if (file_exists($mainPhotoPath)) {
        echo '<img src="upload/' . $_GET['id'] . '/mainPhoto.jpg" class="main_photo">' ;      
      } else {
        echo '<div class="upload_photo"><spanl class="upload_word">尚未建立頭像</spanl></div>';  
      }     
      ?>
    </div>
    <?php
    if ($_SESSION['user']['id'] == $user['id']) {
      echo '<div class="editmainphoto"><a href="editmainphoto.php" class="editmainphoto_word">編輯頭像</a></div>';
    }   
    ?>
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


