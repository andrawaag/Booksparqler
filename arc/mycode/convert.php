<?php
ini_set('max_input_nesting_level', 1000);
include_once("../ARC2.php");
$config = array(
  /* db */
  'db_host' => 'localhost', /* optional, default is localhost */
  'db_name' => 'arc',
  'db_user' => 'root',
  'db_pwd' => '',

  /* store name (= table prefix) */
  'store_name' => 'arc',
);

/* instantiation */
$store = ARC2::getStore($config);
if (!$store->isSetUp()) {
  $store->setUp();
}

$q = 'LOAD <gxa1.rdf>';


$rs = $store->query($q);
$parser = ARC2::getRDFParser();
$parser->parse('http://localhost/arc/mycode/gxa1.rdf');
$triples = $parser->getTriples();

$index = ARC2::getSimpleIndex($triples, false) ; /* false -> non-flat version */
$rdfxml_doc = $parser->toRDFXML($index);
file_put_contents("gxa11.rdf", $rdfxml_doc);
?>