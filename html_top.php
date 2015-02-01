<?php

require_once('show.php');

$i = 1;
$content = file_get_contents("chaine.json");
$content = json_decode($content, true);
$top = get_top10($content['chaine']);
if (count($top) !== 0) {
	echo "<hr/>";
	foreach ($top as $key => $value) {
		echo "<a>".$i.". ".$key."</a><hr/>";
		$i++;
		}
}
else {
	echo "<div id='select'>";
	echo "<center><a>No Tweets</a></center>";
	echo "</div>";
}

?>