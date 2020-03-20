<?php
header('Content-Type: application/json');

$url = filter_input(INPUT_POST, 'url');

if(!$url) {
	echo json_encode(array(
    'success' => false,
    'url' => $url,
  ), JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
  exit;
}

$command = '/home/samba/monobox/downloader.sh ' . $url;
$output = array();
$ret = null;
exec($command, $output, $ret);

echo json_encode(array(
  'success' => true,
  'url' => $url,
  'id' => uniqid(),
), JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

?>
