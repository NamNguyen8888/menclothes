<?php
// ket noi mysql
  // require_once('./database/config.php');
  // require_once('../database/config.php');
  // require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'../database/config.php');
  require_once(realpath(dirname(__FILE__) . './config.php'));
  function execute($sql) {
    $conn = mysqli_connect(host, username, password, database);
    mysqli_query($conn, $sql);
    mysqli_close($conn);

  }
  function executeResult($sql) {
    $conn = mysqli_connect(host, username, password, database);
    $result = mysqli_query($conn, $sql);
    $data = [];
    if($result != null) {
      while($row = mysqli_fetch_array($result, 1)) {
        $data[] = $row;
      }
    }
    mysqli_close($conn);
    return $data;
  }
  function executeResultSingle($sql) {
    $conn = mysqli_connect(host, username, password, database);
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, 1);
    mysqli_close($conn);
    return $row;
  }
