<?php

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








