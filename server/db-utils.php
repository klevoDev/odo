<?php
  function getData ($tableName1) {
    include_once 'config.php';
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    $mysqli->set_charset('utf8');

    if($mysqli->connect_errno) {
      printf("Connect failed: %s<br />", $mysqli->connect_error);
      exit();
    }

    $items = [];
    $res = $mysqli->query('SELECT * FROM `' . $tableName1 . '`');
    while ($row = $res->fetch_assoc()) {
      $items[] = $row;
    }

    $res->free_result();
    $mysqli->close();

    return $items;
  }

  function getDataByLeftJoin ($tbl1, $tbl2, $col1, $col2, $extColsList) {
    include_once 'config.php';
    $extColsSelect = [];
    foreach ($extColsList as $col) {
      $extColsSelect[] = "t2." . $col . " as 't2." . $col . "'";
    }

    $query = "SELECT t1.*, " . implode(', ', $extColsSelect) .
       " FROM " . $tbl1 . " t1 LEFT JOIN " . $tbl2 . " t2 ON t1." . $col1 . " = t2." . $col2;

    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    $mysqli->set_charset('utf8');

    if($mysqli->connect_errno) {
      printf("Connect failed: %s<br />", $mysqli->connect_error);
      exit();
    }

    $items = [];
    $res = $mysqli->query($query);
    while ($row = $res->fetch_assoc()) {
      $items[] = $row;
    }

    $res->free_result();
    $mysqli->close();

    return $items;
  }
?>
