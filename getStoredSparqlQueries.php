<?php
include 'config.inc';

// if (!(isset($_POST["username"]))) die("You need to access this script from a form");
   $link = mysql_connect($dbhost, $dbuser, $dbpasswd);
   if (!mysql_select_db($database)) {

    die('Could not select database: ' . mysql_error());
}
$username = mysql_real_escape_string($_POST['username']);
$sql = "SELECT * FROM entries WHERE username = \"ALL\" OR username = \"$username\"";
$result = mysql_query($sql);
if (!$result) {
    die('Could not query:' . mysql_error());
}
$categoryArray = array();
$menuCategoryArray = array();
while ($row = mysql_fetch_assoc($result)){
     array_push($categoryArray, $row["category"]);
     if (!isset($items[$row["category"]])){
        $items[$row["category"]] = array();
     }
     array_push($items[$row["category"]], array("label" => $row["description"], "sparql" => $row["sparql"]));
};
foreach(array_unique($categoryArray) as $category){
  array_push($menuCategoryArray, array("header" => $category, "items" =>  $items[$category]));
}
$menuStructure = array("menu" => $menuCategoryArray);
print json_encode($menuStructure);
?>
