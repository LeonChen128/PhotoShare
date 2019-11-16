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
    <link rel="stylesheet" type="text/css" href="css/editalbum.css">
    <title>照片小站-相簿編輯</title>
  </head>
  <body class="backgroundColor">
    <script src="js/editalbum.js"></script>
    <div class="header">
      <?php
        echo '<a href="home.php?id=' . $_SESSION['user']['id'] . '">';
        echo '<img src="img/home.jpg" class="home_pic"></a>';
      ?>
      <a href="logout.php" class="header_word" id="_logout" onmouseover="overHeader('_logout')" onmouseout="outHeader('_logout')">登出</a>
    </div> 
    <div class="edit_table">
      <p class="edit_word">相簿新建</p>
      <form action="editalbum2.php" method="post">
        <input type="text" name="title" placeholder="字數10以內之名稱" class="input_title" id="_title">
        <button type="submit" class="button" id="_button" onmouseover="overButton('_button')" onmouseout="outButton('_button')" onclick="return checkTitle();"><spanl class="button_word">建立</spanl></button>
      </form>
    </div>
  </body>  
</html>


