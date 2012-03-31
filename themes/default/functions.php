<?php defined('IN_CMS') or die('No direct access allowed.');

/**
	Custom theme functions
	
	Note: we recommend you prefix all your functions to avoid any naming 
	collisions or wrap your functions with if function_exists braces.
*/

function numeral($number) {
	$test = abs($number) % 10;
	$ext = ((abs($number) % 100 < 21 and abs($number) % 100 > 2) ? 'e' : (($test < 2) ? ($test < 1) ? 'e' : 'er' : 'e'));
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
		return 'À l’instant';
	}
	
	$times = array(
		31104000 => 'an',
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
			echo'il y a '; return  $rounded . ' ' . pluralise($rounded, $title) . '';
		}
	}
}


/**
	Binding custom functions
	This is just an example of what can be done

	bind('about', function() {
		return 'about page';
	});
*/
