<?php
    // connect to database
$server = 'localhost';
$db_user = 'root';
$db_pasword = '';
$db_name = 'blog_app';

$db = mysqli_connect($server, $db_user, $db_pasword, $db_name) or die("MySQL Error: " . mysql_error());
mysqli_select_db($db, $db_name) or die("MySQL Error: " . mysqli_error($db));

?>