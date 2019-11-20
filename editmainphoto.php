<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (!isset($_SESSION['user'])) {
  echo wrongInput('通訊錯誤', 'index.php');
} 

?>








<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/editmainphoto.css">
    <title>照片小站-頭像編輯</title>
  </head>
  <body class="backgroundColor">
    <script src="js/editmainphoto.js"></script>
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
    <div class="edit_table">
      <p class="edit_word">新建大頭照</p>
      <form action="editmainphoto2.php" method="post" enctype="multipart/form-data">
        <label type="button" class="upload">
          <spanl class="upload_word">+ 大頭照</spanl>
          <input type="file" id="_file" name="file">
        </label>  
        <button type="submit" class="button" id="_button" onclick="return checkTitle();"><spanl class="button_word">建立</spanl></button>
      </form>
    </div>
  </body>  
</html>


