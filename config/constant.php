<?php
session_start();
define("HOST","localhost");
define("USERNAME","super");
define("DB","cbtp");
define("PASSWORD","super");
define('HOMEURL',"http://localhost/hermi/");
define('homeServerLocation',realpath($_SERVER["DOCUMENT_ROOT"]));
$conn = mysqli_connect(HOST,USERNAME,PASSWORD,DB,'3333') or die(mysqli_error());
$db_select= mysqli_select_db($conn,DB) or die(mysqli_error());

?>
