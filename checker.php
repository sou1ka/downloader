<?php
header('Content-Type: text/event-stream; charset=utf-8');
header('Cache-Control: no-store');

$filename = filter_input(INPUT_GET, 'filename');

$lines = file('/tmp/' . $filename . '.log', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$log = $lines[count($lines) - 2];

preg_match('/([0-9]+%)|(saved)|(Omitting download)/', $log, $m);

//echo json_encode(array(
//  'data' => $m[0],
//), JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

echo "data: " . $m[0];
echo "\n\n";

ob_end_flush();
flush();

?>
