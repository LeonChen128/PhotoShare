<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (!isset($_SESSION['user'])) {
  echo wrongInput('通訊錯誤', 'index.php');
}

if (!isset($_POST['id'], $_POST['action'])) {
  header('Location: home.php?id=' . $_SESSION['user']['id']);
  exit();
}

$id     = $_POST['id'];
$action = $_POST['action'];

switch ($action) {
  case 'delete':
    if (deletePhotoById($id)) {
      echo wrongInput('刪除失敗', 'updatephoto.php?id=' . $id);
    }
    break;
  case 'update':
    if (!isset($_POST['title'])) {
      echo wrongInput('通訊錯誤', 'home.php?id=' . $_SESSION['user']['id']);
    }
    $title = trim($_POST['title']);
    $date = getDateTime();
    if ($title == '') {
      echo wrongInput('標題不可空白', 'updatephoto.php?id=' . $id);
    }
    if (mb_strlen($title) > 10) {
      echo wrongInput('標題字數須小於10', 'updatephoto.php?id=' . $id);
    }
    if (!updatePhoto($title, $date, $id)) {
      echo wrongInput('修改失敗', 'updatephoto.php?id=' . $id);
    }  
    break;
  default:
    header('Location: home.php?id=' . $_SESSION['user']['id']);
    exit();
    break;
}


?>





<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/updatephoto2.css">
    <title>照片小站-相片編輯</title>
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
      <p class="success">
        <?php
        if ($_POST['action'] == 'delete') {
          echo '相片刪除成功！';
        } else {
          echo '相片更新成功';
        }
        ?>
      </p> 
      <?php
        echo '<a href="home.php?id=' . $_SESSION['user']['id'] . '" class="home">回我的首頁</a>';
      ?>
    </div> 
    
  </body>  
</html>









