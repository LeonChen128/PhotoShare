<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (!isset($_POST['title'])) {
  if (!isset($_SESSION['user'])) {
    echo wrongInput('通訊錯誤', 'index.php');
  } else {
    header('Refresh:0 url=home.php?id=' . $_SESSION['user']['id']);
    exit();
  }
}

if (!isset($_SESSION['user'])) {
  echo wrongInput('通訊錯誤', 'index.php');
}

if ($_POST['title'] == '') {
  echo wrongInput('名稱不可空白', 'editalbum.php');
} elseif (mb_strlen($_POST['title']) > 10) {
  echo wrongInput('名稱字數須小於10', 'editalbum.php');
}

if (is_uploaded_file($_FILES['file']['tmp_name'])) {  
} else {
  echo wrongInput('請上傳相簿封面', 'editalbum.php');
}

$title  = inputData($_POST['title']);
$author = $_SESSION['user']['name'];
$date   = getDateTime();

if (insertAlbum($title, $author, $date)) {
} else {
  echo wrongInput('新增失敗1', 'editalbum.php');
}

if (getAlbumOne($title, $author, $date)) {
  foreach (getAlbumOne($title, $author, $date) as $albumOne) {    
  }
} else {
  echo wrongInput('新增失敗2', 'editalbum.php');
}

$thisProjectPath = thisProjectPath();
$folder  = $thisProjectPath . '/upload/' . $_SESSION['user']['id'] . '/' . $albumOne['id'];
$newName = 'upload/' . $_SESSION['user']['id'] . '/' . $albumOne['id'] . '/1' . '.' . getFileExt($_FILES['file']['name']);

if (uploadFile($folder, 'file')) { 
} else {
  echo wrongInput('照片上傳失敗', 'editalbum.php'); 
}

if (insertAlbumPath($newName, $albumOne['id'])) {
} else {
  echo wrongInput('照片上傳失敗', 'editalbum.php');  
}


?>







<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/editalbum2.css">
    <title>照片小站-相簿編輯</title>
  </head>
  <body class="backgroundColor">
    <script src="js/editalbum2.js"></script>
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
      <p class="success">相簿建立成功！</p> 
      <?php
        echo '<a href="home.php?id=' . $_SESSION['user']['id'] . '" class="home" id="_home" onmouseover="overHome(' . "'_home'" . ')" onmouseout="outHome(' . "'_home'" . ')">回我的首頁</a>';
      ?>
    </div> 
    
  </body>  
</html>



