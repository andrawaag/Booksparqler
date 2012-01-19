<?php
///* ARC2 static class inclusion */ 
include_once('../ARC2.php');

/* MySQL and endpoint configuration */ 
include_once("config.inc.php");

/* instantiation */
$store = ARC2::getStore($config);
if (!$store->isSetUp()) {
  $store->setUp();
}

$q = 'LOAD <http://www.bigcat.unimaas.nl/~andra/qrateme/arc/mycode/all_qrate_me_20111015.ttl>';
$rs = $store->query($q);
if (!$store->getErrors()) {
  return ("Success!");
}
?>