<table border="1">
<thead>
	<th>№</th>
	<th>E-mail</th>
	<th>Статус</th>
	<th>Начало подписки</th>
	<th>Окончание подписки</th>
	<th>Направления</th>
</thead>
<?php
  include_once 'config.php';

  $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

  if($mysqli->connect_errno) {
    printf("Connect failed: %s<br />", $mysqli->connect_error);
    exit();
  }

  echo '<h1>Подписчики</h1>';
  $res = $mysqli->query('SELECT * FROM `' . $tableName . '`');
  while ($row = $res->fetch_row()) {
	echo "<tr><td>";
	echo implode('</td><td>', $row);
	echo "</td></tr>";
  }

  $mysqli->close();
  // header('Content-Type: application/json; charset=utf-8');
  // echo json_encode($result);
?>
</table>