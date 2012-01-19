<?php
include 'config.inc';

  if (!(isset($_POST["username"]))) die("You need to access this script from a form");
   $link = mysql_connect($dbhost, $dbuser, $dbpasswd);
   if (!mysql_select_db($database)) {
    die('Could not select database: ' . mysql_error());
}
$username = mysql_real_escape_string($_POST['username']);
$category = mysql_real_escape_string($_POST['category']);
$description = mysql_real_escape_string($_POST['description']);
$sparql = mysql_real_escape_string($_POST['sparql']);
$endpoint = mysql_real_escape_string($_POST['endpoint']);

$result = mysql_query("INSERT INTO entries (username, category, description, sparql, endpoint) VALUES ('$username', '$category', '$description', '$sparql', '$endpoint')");
if (!$result) {
    die('Could not query:' . mysql_error());
}
var_dump(array_keys(mysql_fetch_assoc($result)));

mysql_close($link);
?>
