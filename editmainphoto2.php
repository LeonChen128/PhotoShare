<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (!is_uploaded_file($_FILES['file']['tmp_name'])) {
  if (!isset($_SESSION['user'])) {
    echo wrongInput('通訊錯誤', 'index.php');
  } else {
    header('Location: editmainphoto.php');
    exit();
  }
}

$thisProjectPath = thisProjectPath();
$mainPhotoPath   = $thisProjectPath . '/upload/' . $_SESSION['user']['id'] . '/mainPhoto.jpg';

if (uploadMainPhoto($_FILES['file']['tmp_name'], $mainPhotoPath)) {
} else {
  echo wrongInput('照片上傳失敗', 'editmainphoto.php');
}

?>



<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/editmainphoto2.css">
    <title>照片小站-頭像編輯</title>
  </head>
  <body class="backgroundColor">
    <script src="js/editmainphoto2.js"></script>
    <div class="header">
      <?php
        echo '<a href="home.php?id=' . $_SESSION['user']['id'] . '">';
        echo '<img src="img/home.jpg" class="home_pic"></a>';
      ?>
      <a href="logout.php" class="header_word" id="_logout" onmouseover="overHeader('_logout')" onmouseout="outHeader('_logout')">登出</a>
    </div> 
    <div class="notice_table">
      <div class="title_block">
        <img src="img/notice.jpg" class="notice">
      </div> 
      <p class="success">頭像建立成功！</p> 
      <?php
        echo '<a href="home.php?id=' . $_SESSION['user']['id'] . '" class="home" id="_home" onmouseover="overHome(' . "'_home'" . ')" onmouseout="outHome(' . "'_home'" . ')">回我的首頁</a>';
      ?>
    </div> 
    
  </body>  
</html>



