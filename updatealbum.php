<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (!isset($_SESSION['user'])) {
  echo wrongInput('通訊錯誤', 'index.php');
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  header('Location:home.php?id=' . $_SESSION['user']['id']);
  exit();
}

if (!getAlbumByIdAndUserName($_GET['id'], $_SESSION['user']['name'])) {
  header('Location:home.php?id=' . $_SESSION['user']['id']);
  exit();
}

foreach (getAlbumById($_GET['id']) as $album) {  
}

?>










<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/updatealbum.css">
    <title>照片小站-相簿編輯</title>
  </head>
  <body class="backgroundColor">
    <script src="js/updatealbum.js"></script>
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
      <?php
      echo '<form action="updatealbum2.php" method="post" enctype="multipart/form-data">';
      echo '<input type="hidden" name="action" value="update">';
      echo '<input type="hidden" name="id" value="' . $_GET['id'] . '">';
      echo '<input type="text" name="title" id="_title" value="' . $album['title'] . '" class="input_title">';
      echo '<br><label type="button" class="upload">';
      echo '<spanl class="upload_word">修改封面</spanl>';
      echo '<input type="file" name="file">';
      echo '</label>';
      echo '<br><button type="submit" class="button" onclick="return checkInput()"><spanl class="update_word">修改</spanl></button>';
      echo '<a href="photo.php?id=' . $album['id'] . '" class="cancel_word"><div class="cancel">取消</div></a>';
      echo '</form>';
      echo '<form action="updatealbum2.php" method="post">';
      echo '<input type="hidden" name="action" value="delete">';
      echo '<input type="hidden" name="id" value="' . $_GET['id'] . '">';
      echo '<button type="submit" class="delete"><spanl class="delete_word">刪除相簿</spanl></button>';
      echo '</form>';
      ?>
    </div>
    
    </div>     
  </body>  
</html>

