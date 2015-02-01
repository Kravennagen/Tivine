<?php


function get_program ($chaine) {
$curl = curl_init();
$client_key = '6a2d044f0d56d5dce04e747a519027c3';
$client_id = '10989849';
$url = "http://94.23.253.36:8080/TiVineWS_V1.0/GetAllContentForPartAndChannel";
$param = '0'.$chaine;
$data = $url.$param.$client_id;
$encoded = hash_hmac('sha512', $data, $client_key);

$postfields = http_build_query(array(
        	'part' => '0',
       		'channel' => $chaine,
       		'clientId' => $client_id,
      		'encodedKey' => $encoded
    		));

curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_POST => count($postfields),
    CURLOPT_POSTFIELDS => $postfields));

$resp = curl_exec($curl);
curl_close($curl);
return (get_info(json_decode($resp, true)));
}

function get_info($obj) {
	$info = ["Title" => $obj['programs'][0]['title'],
			"Start" => intval($obj['programs'][0]['startTime']),
			"End" => intval($obj['programs'][0]['endTime'])];
	return ($info);
}

function my_date () {
	$date = date('YmdHis');
	return intval($date);
}

function get_csv($file) {
	$csv = array_map('str_getcsv', file($file));
	return ($csv);
}

function find_hashtag ($csv, $program) {
	$tags = array();
	for ($i = 0; isset($csv[$i]); $i++){
		if ($csv[$i][1] == $program['Title'])
			$tags[] = trim($csv[$i][2], '#');
	}
	if ($tags)
		return ($tags);
	else
		return (false);
}

function last_minute($date) {
	$next = date('YmdHis', strtotime($date." - 1 minutes"));
	return($next);
}

function format_date($date){
	$date = date('YmdHis', strtotime($date));
	return $date;
}

?>