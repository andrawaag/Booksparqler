<?php
///* ARC2 static class inclusion */ 
include_once('arc/ARC2.php');


/* configuration */
$config = array(
  /* remote endpoint */
  'remote_store_endpoint' => $_POST["endpoint"]
);

/* instantiation */
$store = ARC2::getRemoteStore($config);

/*$q = 'PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX dc: <http://purl.org/dc/elements/1.1/> 
PREFIX dcterms: <http://purl.org/dc/terms/>
SELECT DISTINCT  ?user ?pathwayRevision
WHERE { ?pathwayRevision dc:contributor ?user .?pathwayRevision rdfs:label "WP15"} 

'; */

$q=$_POST["query"];
$rows = $store->query($q, 'rows');
$resultsColnames = array_keys($rows[0]);
$resultsColmodel = array();
foreach ($resultsColnames as $column){
   array_push($resultsColmodel, array("id"=>$column, "label"=>$column, "type"=>"string")); 
}
$rowsArray = array();
$googleRowsData = array();
foreach ($rows as $row){
    $columnsArray = array();

    foreach ($resultsColnames as $column){
        array_push($columnsArray, array("v" => $row[$column]));
    }
    $tuple = array("c" => $columnsArray);
    array_push($tuple, $columnsArray);
    array_push($rowsArray, $tuple);
 
}
$returnArray = array("cols" => $resultsColmodel, "rows" => $rowsArray, );
print json_encode($returnArray);

/*print "<table class=\"sparqlResults\">
		<thead>
			<tr>";
foreach ($resultsColnames as $column){
    print "<th>$column</th>\n";
}
print "	</tr>
		</thead>
		<tbody>";
foreach ($rows as $row){
    print "<tr>\n";
    foreach (array_values($row) as $field){
       print "<td>$field</td>";
    }
    print "</tr>";
}
print "</tbody></table>\n"; */
?>
