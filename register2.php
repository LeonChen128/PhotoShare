<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (!isset($_POST['name'], $_POST['account'], $_POST['password'], $_POST['repassword'])) {
  echo '通訊錯誤';
  header('Refresh: 3 url=index.php');
  exit();
}

$name       = trim($_POST['name']);
$account    = trim($_POST['account']);
$password   = trim($_POST['password']);
$repassword = trim($_POST['repassword']);

if ($name == '' || $account == '' || $password == '') {
  echo wrongInput('欄位不可空白。', 'register.php');
}

if (mb_strlen($name) > 10) {
  echo wrongInput('名稱字數須小於10', 'register.php');
}

if (mb_strlen($account) > 12) {
  echo wrongInput('帳號字數須小於12', 'register.php');
}

if (mb_strlen($password) > 12) {
  echo wrongInput('密碼字數須小於12', 'register.php');
}

if ($password != $repassword) {
  echo wrongInput('密碼確認錯誤。', 'register.php');
}

$chk = new CheckUser();
if ($chk->checkName($name)) {
  echo wrongInput('名稱已被使用，請更換另一個。', 'register.php');
}
if ($chk->checkAccount($account)) {
  echo wrongInput('帳號已被使用，請更換另一個。', 'register.php'); 
}

if (register($name, $account, $password)) {

} else {
  echo wrongInput('註冊失敗。', 'register.php'); 
}

?>





<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/register2.css">
    <title>照片小站-會員註冊</title>
  </head>
  <body class="backgroundColor">
    <div class="header">
      <a href="index.php"><img src="img/home.jpg" class="home_pic"></a>
      <a href="login.php" class="header_word">登入</a>
    </div> 
    <div class="notice_table">
      <div class="title_block">
        <img src="img/notice.jpg" class="notice">
      </div> 
      <p class="success">註冊成功！</p> 
      <a href="login.php" class="login">馬上登入</a>
    </div> 
  </body>  
</html>