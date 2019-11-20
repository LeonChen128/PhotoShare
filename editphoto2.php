<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (!isset($_POST['title'], $_POST['id'])) {
  if (!isset($_SESSION['user'])) {
    echo wrongInput('通訊錯誤', 'index.php');
  } else {
    header('Location: home.php?id='. $_SESSION['user']['id']);
    exit();
  }
}

if (!is_uploaded_file($_FILES['file']['tmp_name'])) {
    echo wrongInput('照片上傳失敗', 'editphoto.php');
}

$title = inputData($_POST['title']);
$album_id = $_POST['id'];
$date = getDateTime();

foreach (insertPhoto($title, $album_id, $date) as $photo) {
} 

foreach (getUserByName($_SESSION['user']['name']) as $user){ 
}

$thisProjectPath = thisProjectPath();
$path = 'upload/' . $user['id'] . '/' . $album_id . '/' . $photo['id'] . '.jpg';

if (insertPhotoPath($path, $photo['id'])) {
} else {
  echo wrongInput('照片上傳失敗', 'editphoto.php');
}

if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
} else {
  echo wrongInput('照片上傳失敗', 'editphoto.php');
}


?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/editphoto2.css">
    <title>照片小站-相片新增</title>
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
    <div class="notice_table">
      <div class="title_block">
        <img src="img/notice.jpg" class="notice">
      </div> 
      <p class="success">相片建立成功！</p> 
      <?php
        echo '<a href="home.php?id=' . $_SESSION['user']['id'] . '" class="home" id="_home" onmouseover="overHome(' . "'_home'" . ')" onmouseout="outHome(' . "'_home'" . ')">回我的首頁</a>';
      ?>
    </div> 
    
  </body>  
</html>







