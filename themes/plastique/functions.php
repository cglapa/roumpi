<?php defined('IN_CMS') or die('No direct access allowed.');

/**
	Custom theme functions
	
	Note: we recommend you prefix all your functions to avoid any naming 
	collisions or wrap your functions with if function_exists braces.
*/

function my_last_tweet(){
	$json = file_get_contents("https://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name=". twitter_account() ."&count=1"); 
	$decode = json_decode($json, true);
	
	return '<blockquote id="tweet"><div class="wrap"><a href="http://twitter.com/'.twitter_account().'"><img src="./themes/plastique/img/twitter_black.png"/></a>« ' . $decode[0]['text'] . ' » − <a href="https://twitter.com/'.twitter_account().'" class="follow" data-show-count="false" data-lang="fr">Nous suivre</a></div></blockquote><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
}

function numeral($number) {
	$test = abs($number) % 10;
	$ext = ((abs($number) % 100 < 21 and abs($number) % 100 > 4) ? '<sup>e</sup>' : (($test < 4) ? ($test < 3) ? ($test < 2) ? ($test < 1) ? '<sup>e</sup>' : '<sup>er</sup>' : '<sup>e</sup>' : '<sup>e</sup>' : '<sup>e</sup>'));
	return $number . $ext; 
}

function count_words($str) {
	return count(preg_split('/\s+/', strip_tags($str), null, PREG_SPLIT_NO_EMPTY));
}

function pluralise($amount, $str, $alt = '') {
    return intval($amount) === 1 ? $str : $str . ($alt !== '' ? $alt : 's');
}

function relative_time($date) {
    $elapsed = time() - $date;
    
    if($elapsed <= 1) {
        return 'Just now';
    }
    
    $times = array(
        31104000 => 'année',
        2592000 => 'mois',
        604800 => 'semaine',
        86400 => 'jour',
        3600 => 'heure',
        60 => 'minute',
        1 => 'seconde'
    );
    
    foreach($times as $seconds => $title) {
        $rounded = $elapsed / $seconds;
        
        if($rounded > 1) {
            $rounded = round($rounded);
            return $rounded . ' ' . pluralise($rounded, $title) . '';
        }
    }
}

//function absolute_time($date) {
//date( "Y-m-d ", $date )
//}

function truncate($str, $limit = 10, $elipse = ' [...]') {
	$words = preg_split('/\s+/', $str);

	if(count($words) <= $limit) {
		return $str;
	}

	return implode(' ', array_slice($words, 0, $limit)) . $elipse;
}
