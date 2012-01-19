<?php
$config = array(
  /* db */
  'db_host' => 'localhost', /* optional, default is localhost */
  'db_name' => 'arc_triplestore',
  'db_user' => 'qrateme',
  'db_pwd' => '3kkdzoe#',

  /* store name */
  'store_name' => 'arc',

  /* endpoint */
  'endpoint_features' => array(
    'select', 'construct', 'ask', 'describe', 
    'load', 'insert', 'delete', 
    'dump' /* dump is a special command for streaming SPOG export */
  ),
  'endpoint_timeout' => 60, /* not implemented in ARC2 preview */
  'endpoint_read_key' => 'girlfromipanema', /* optional */
  'endpoint_write_key' => 'girlfromipanema', /* optional */
  'endpoint_max_limit' => 250, /* optional */
);

?>