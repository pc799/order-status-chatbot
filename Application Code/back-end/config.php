<?php
define("DB_HOST", "35.244.54.64");
define("DB_USER", "pc799");
define("DB_PASS", "9003980039");
define("DB_NAME", "botdb");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Connection to database failed!");

?>