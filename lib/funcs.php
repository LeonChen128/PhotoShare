<?php

date_default_timezone_set('Asia/Taipei');  

function newPDO() {
  try {
    return new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PSWD);
  } catch (PDOException $e) {
    return [];
  }
}

function inputData($data) {
  return htmlspecialchars(trim($data));
}

function wrongInput($message, $url) {
  echo $message;
  header('Refresh:3 url=' . $url);
  exit();
}

function getDateTime() { 
  $day = [
    'Saturday'  => '禮拜六',
    'Sunday'    => '禮拜日',
    'Monday'    => '禮拜一',
    'Tuesday'   => '禮拜二',
    'Wednesday' => '禮拜三',
    'Thursday'  => '禮拜四',
    'Friday'    => '禮拜五',    
  ];
  return date('Y/m/d ') . $day[date('l')] . date(' h:i a');
}

class CheckUser {
  public function checkName($name) {
    $pdo = newPDO();
    if (!$pdo) {
      return [];
    }
    try {
      $sql = $pdo->prepare('SELECT * FROM User WHERE name=?');
      $sql->execute([$name]);
      return $sql->fetchAll();
    } catch (PDOException $e) {
      return [];
    }
  }

  public function checkAccount($account) {
    $pdo = newPDO();
    if (!$pdo) {
      return [];
    }
    try {
      $sql = $pdo->prepare('SELECT * FROM User WHERE account=?');
      $sql->execute([$account]);
      return $sql->fetchAll();
    } catch (PDOException $e) {
      return [];
    }
  }
}

function register($name, $account, $password) {
  $pdo = newPDO();
  if (!$pdo) {
    return [];
  }
  try {
    $sql = $pdo->prepare('INSERT INTO User VALUES(null, ?, ?, ?)');
    $sql->execute([$name, $account, $password]);
    $sql = $pdo->prepare('SELECT * FROM User WHERE name=? AND account=? AND password=?');
    $sql->execute([$name, $account, $password]);
    return $sql->fetchAll();
  } catch (PDOException $e) {
      return [];
  }
}

function login($account, $password) {
  $pdo = newPDO();
  if (!$pdo) {
    return [];
  }
  try {
    $sql = $pdo->prepare('SELECT * FROM User WHERE account=? AND password=?');
    $sql->execute([$account, $password]);
    return $sql->fetchAll();
  } catch (PDOException $e) {
    return [];
  }
}

function checkId($id) {
  $pdo = newPDO();
  if (!$pdo) {
    return [];
  }
  try {
    $sql = $pdo->prepare('SELECT * FROM User WHERE id = ?');
    $sql->execute([$id]);
    return $sql->fetchAll();
  } catch (PDOCeption $e) {
    return [];
  }
}

function getNameById($id) {
  $pdo = newPDO();
  if (!$pdo) {
    return [];
  }
  try {
    $sql = $pdo->prepare('SELECT * FROM User WHERE id = ?');
    $sql->execute([$id]);
    foreach ($sql->fetchAll() as $row) {
      return $row['name'];
    }
  } catch (PDOCeption $e) {
    return [];
  }
}

function insertAlbum($title, $author, $date) {
  $pdo = newPDO();
  if (!$pdo) {
    return [];
  }
  try {
    $sql = $pdo->prepare('INSERT INTO Album VALUES(null, ?, ?, ?, null)');
    $sql->execute([$title, $author, $date]);
    $sql = $pdo->prepare('SELECT * FROM Album WHERE title=? AND author=? AND date=?');
    $sql->execute([$title, $author, $date]);
    return $sql->fetchAll();
  } catch (PDOException $e) {
    return [];
  }
}

function getAlbumOne ($title, $author, $date) {
  $pdo = newPDO();
  if (!$pdo) {
    return [];
  }
  try {
    $sql = $pdo->prepare('SELECT * FROM Album WHERE title=? AND author=? AND date=?');
    $sql->execute([$title, $author, $date]);
    return $sql->fetchAll();
  } catch (PDOException $e) {
    return [];
  }
}


function thisProjectPath() {
  $thisPhpPath = __File__;
  $pathArray = explode('/', $thisPhpPath);
  array_pop($pathArray);
  array_pop($pathArray);  
  $thisProjectPath = implode('/', $pathArray);
  return $thisProjectPath;
}

function getFileExt($file) {
  $fileArray = explode('.', $file);
  return end($fileArray);
}

function uploadFile($folder, $postName) {
  if (is_uploaded_file($_FILES[$postName]['tmp_name'])) {
    if (!file_exists($folder)) {
      mkdir($folder);
    }
    $newFilePath = $folder . '/1' . '.' . getFileExt($_FILES[$postName]['name']);
    if (move_uploaded_file($_FILES[$postName]['tmp_name'], $newFilePath)) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function getUserById($id) {
  $pdo = newPDO();
  if (!$pdo) {
    return [];
  }
  try {
    $sql = $pdo->prepare('SELECT * FROM User WHERE id=?');
    $sql->execute([$id]);
    return $sql->fetchAll();
  } catch (PDOException $e) {
    return [];
  }
}

function insertAlbumPath($newName, $id) {
  $pdo = newPDO();
  if (!$pdo) {
    return [];
  }
  try {
    $sql = $pdo->prepare('UPDATE Album SET path=? WHERE id=?');
    $sql->execute([$newName, $id]);
    $sql = $pdo->prepare('SELECT * FROM Album WHERE path=? AND id=?');
    $sql->execute([$newName, $id]);
    return $sql->fetchAll();
  } catch (PDOException $e) {
    return [];
  }
}

function getUserAlbum($name) {
  $pdo = newPDO();
  if (!$pdo) {
    return [];
  }
  try {
    $sql = $pdo->prepare('SELECT * FROM Album WHERE author=?');
    $sql->execute([$name]);
    return $sql->fetchAll();
  } catch (PDOException $e) {
    return [];
  }
}









