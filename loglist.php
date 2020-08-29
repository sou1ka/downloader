<?php
header('Content-Type: application/json');

$lists = glob('/tmp/*');
$files = array();

foreach($lists as $file){
	if(strpos($file, '.log') && is_file($file)) {
		$stat = stat($file);
		array_push($files,
			array(
				"filename" => htmlspecialchars($file),
				"filesize" => $stat["size"],
				"lastmodify" => intval($stat["mtime"].'000'),
			)
		);
	}
}

echo json_encode($files, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

?> 
