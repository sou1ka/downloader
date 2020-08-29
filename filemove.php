<?php
header('Content-Type: application/json');

$source = filter_input(INPUT_POST, 'source');
$distination = filter_input(INPUT_POST, 'distination');

if(!$source || !$distination) {
	echo json_encode(array(
    'success' => false,
    'url' => $url,
  ), JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
  exit;
}

$command = 'mv -f ' . $source .' '. $distination;
$output = array();
$ret = null;
exec($command, $output, $ret);

echo json_encode(array(
  'success' => true,
  'ret' => $ret,
), JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

?>
