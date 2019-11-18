<?php

include 'lib/define.php';
include 'lib/funcs.php';

if (isset($_SESSION['user'])) {
  unset($_SESSION['user']);
} else {
  echo wrongInput('通訊錯誤', 'index.php');
}

header('Location: login.php');
 
?>
