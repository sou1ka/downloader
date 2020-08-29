<?php
header('Content-Type: application/json');

$source = filter_input(INPUT_POST, 'source');

if(!$source) {
	echo json_encode(array(
    'success' => false,
    'url' => $url,
  ), JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
  exit;
}

$command = 'rm ' . $source;
$output = array();
$ret = null;
exec($command, $output, $ret);

echo json_encode(array(
  'success' => true,
  'ret' => $ret,
), JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

?>
