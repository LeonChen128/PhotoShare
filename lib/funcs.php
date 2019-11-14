<?php

function newPDO() {
  try {
    return new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PSWD);
  } catch (PDOException $e) {
    return [];
  }
}