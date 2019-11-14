<!DOCTYPE html>
<html lang="zh-hant">
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>照片小站-登入會員</title>
  </head>
  <body class="backgroundColor">
    <script src="js/login.js"></script>
    <div class="header">
      <a href="index.php"><img src="img/home.jpg" class="home_pic"></a>
      <a href="login.php" class="header_word" id="_login" onmouseover="overHeader('_login')" onmouseout="outHeader('_login')">登入</a>
    </div>  
    <div class="login_table">
      <p class="title">會員登入</p>
      <form action="home.php" method="post">
        <input type="text" name="account" id="_account" placeholder="請輸入帳號..." class="account"> 
        <input type="password" name="password" id="_password" placeholder="請輸入密碼..." class="password">  
        <tr>
          <button type="submit" id="_button" class="button" onclick="return checkLogin();" onmouseover="overButton('_button')" onmouseout="outButton('_button');"><spanl style="color: white">登入</spanl></button>
          <a href="index.php" id="_cancel" class="cancel" onmouseover="overCancel('_cancel');" onmouseout="outCancel('_cancel');">取消</a>
        </tr> 
      </form>
      <p class="word_concern">還不是會員？</p>
      <a href="register.php" class="register">立刻加入會員</a>
    </div>
  </body>  
</html>