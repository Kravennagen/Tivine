<?php

require_once('function.php');
require_once('twitteroauth.php');
require_once('programs.php');

function get_top10 ($chaine) {
	return (make_top(get_tweets($chaine)));
}

function connect_tweeter() {

	$consumer_key = 'AIudvhERTxFX7mZeULiQ9WzvJ';
	$consumer_secret = 'cSgxY9yJxHuMGXK5CVdj4E7pjaE5hZhFhAveM4ByYqfIMvCXrZ';
	$oauth_token = '3001453269-IihZv8BVnl8hJqi6pYDM0jsdGIaAb6WwLLAO1eC';
	$oauth_secret = 'uNMttCNO96Ww85lvm7bI9r4n2Vbjj4RnHdvGdfP0beHnw';
	$connection = new TwitterOAuth($consumer_key, $consumer_secret, $oauth_token, $oauth_secret);
	return ($connection);
}


function format_top($top) {
	$i = 1;
	$str = '';
	foreach ($top as $key => $value) {
		$str .= "<a>".$i.". ".$key."</a><hr/>";
		$i++;
	}
	return ($str);
}

function get_tweets($chaine) {
	date_default_timezone_set('Europe/Paris');
	$connection = connect_tweeter();
	$tags = find_hashtag(get_csv('showHashtags.csv'), get_program($chaine));

	if ($tags !== false) {
	$query = 'https://api.twitter.com/1.1/search/tweets.json?q=%23'.$tags[0]."&lang=fr";
	$content = $connection->get($query);
	$content = json_decode(json_encode($content), true);
	$date = intval(my_date());
	$tab = '';
	for ($k = 0; isset($content["statuses"][$k]); $k++) {
   		$tweet = $content["statuses"][$k]['text'];
    	$time = $content["statuses"][$k]["created_at"];
    	if (intval(format_date($time)) >= intval(last_minute($date))) {
    		if (intval(format_date($time)) <= $date) {
				if ($tweet[0] != "R" && $tweet[1] != "T")
      				$tab .= $tweet."  ";
 	  			}
 	  		}
		}
	}
	return ($tab);
}
?>