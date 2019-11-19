<?php

include 'lib/define.php';
include 'lib/funcs.php';


if (!isset($_SESSION['user'])) {
  echo wrongInput('通訊錯誤', 'index.php');
} 

if (!isset($_GET['id'])) {
  header('Location: home.php?id='. $_SESSION['user']['id']);
  exit();
}







?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/editphoto.css">
    <title>照片小站-相簿編輯</title>
  </head>
  <body class="backgroundColor">
    <script src="js/editphoto.js"></script>
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
      <p class="edit_word">照片新建</p>
      <form action="editphoto2.php" method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="字數10以內之名稱" class="input_title" id="_title">
        <br>
        <label type="button" class="upload">
          <spanl class="upload_word">+ 照片</spanl>
          <input type="file" id="_file" name="file">
        </label> 
        <?php
        echo '<input type="hidden" name="id" value="' . $_GET['id'] . '">';
        ?> 
        <button type="submit" class="button" id="_button" onclick="return checkTitle();"><spanl class="button_word">建立</spanl></button>
      </form>
    </div>
  </body>  
</html>


