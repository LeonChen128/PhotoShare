<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Language" content="zh-tw">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <title>照片小站-會員註冊</title>
  </head>
  <body class="backgroundColor">
    <script src="js/register.js"></script>
    <div class="header">
      <a href="index.php"><img src="img/home.jpg" class="home_pic"></a>
      <a href="login.php" class="header_word">登入</a>
    </div>  
    <div class="login_table">
      <p class="title">會員註冊</p>
      <form action="register2.php" method="post">
        <input type="text" name="name" id="_name" placeholder="字數10以內之名稱" class="name"> 
        <input type="text" name="account" id="_account" placeholder="字數12以內之帳號" class="account">        
        <input type="password" name="password" id="_password" placeholder="字數12以內之密碼" class="password"> 
        <input type="password" name="repassword" id="_repassword" placeholder="請再次輸入密碼..." class="repassword">  
        <tr>
          <button type="submit" class="button" onclick="return checkRegister();"><spanl style="color: white">註冊</spanl></button>
          <a href="index.php" class="cancel">取消</a>
        </tr> 
      </form>
    </div>
  </body>  
</html>