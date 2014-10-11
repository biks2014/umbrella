

<?php
/*
 * Site : http:www.smarttutorials.net
 * Author :muni
 * 
 */
 
define('BASE_PATH','https://users.metropolia.fi/~bikilat/umbrella/');
define('DB_HOST', 'mysql.metropolia.fi');
define('DB_NAME', 'bikilat');
define('DB_USER','bikilat');
define('DB_PASSWORD','bikoye430');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

?>
