<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (!isset($_SESSION['user'])) {
  echo wrongInput('通訊錯誤', 'index.php');
}

if (!isset($_POST['action'], $_POST['id'])) {
  header('Location: home.php?id=' . $_SESSION['user']['id']);
  exit();
}

if (!getAlbumByIdAndUserName($_POST['id'], $_SESSION['user']['name'])) {
  header('Location:home.php?id=' . $_SESSION['user']['id']);
  exit();
}



foreach (getUserByName($_SESSION['user']['name']) as $user) {  
}

foreach (getAlbumById($_POST['id']) as $album) { 
}

switch ($_POST['action']) {
  case 'delete':
    if (deleteAlbumById($_POST['id'])) {
      echo wrongInput('刪除失敗', 'updatealbum.php?id=' . $_POST['id']);
    }
    break;
  case 'update':
    if (!isset($_POST['title'])) {
      header('Location: home.php?id=' . $_SESSION['user']['id']);
      exit();
    }

    $id    = $_POST['id'];
    $title = trim($_POST['title']);
    $date  = getDateTime();

    if (mb_strlen($title) > 10) {
      echo wrongInput('標題字數須小於10', 'updatealbum.php?id=' . $_POST['id']);
    }
  
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
      $path = 'upload/' . $user['id'] . '/' . $album['id'] . '/1' . '.' . getFileExt($_FILES['file']['name']);
      $thisProjectPath = thisProjectPath();
      $newFilePath = $thisProjectPath . '/' . $path;
      if (!move_uploaded_file($_FILES['file']['tmp_name'], $newFilePath)) {
        echo wrongInput('照片上傳失敗', 'updatealbum.php?id=' . $_POST['id']);    
      }
    } else {
      $path = $album['path'];
    }
  
    if (!updateAlbum($title, $date, $path, $id)) {
      echo wrongInput('更新失敗', 'updatealbum.php?id=' . $_POST['id']);
    }  
    break;
  default:
    echo wrongInput('更新失敗', 'updatealbum.php?id=' . $_POST['id']);   
    break;
}

  
?>








<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/updatealbum2.css">
    <title>照片小站-相簿編輯</title>
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
          echo '相簿刪除成功！';
        } else {
          echo '相簿更新成功';
        }
        ?>
      </p> 
      <?php
        echo '<a href="home.php?id=' . $_SESSION['user']['id'] . '" class="home">回我的首頁</a>';
      ?>
    </div> 
    
  </body>  
</html>









