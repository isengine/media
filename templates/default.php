<?php

namespace is\Masters\Modules\Isengine\Media;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Parser;

$instance = $object -> get('instance');
$sets = &$object -> settings;

$slider = $sets['slider']['enable'];
$slideshow = $sets['slideshow']['enable'];
$gallery = $sets['gallery']['enable'];
//echo print_r($object, 1);

//$object -> eget('container') -> addClass('new');
//$object -> eget('container') -> open(true);
//$object -> eget('container') -> close(true);
//$object -> eget('container') -> print();

if ($slider) {
	if ($slideshow) {
		$sets['slider']['settings']['asNavFor'] = '.' . $sets['slideshow']['classes']['container'];
	}
	$object -> blocks('slider');
}

if ($slideshow) {
	if ($slider) {
		$sets['slideshow']['settings']['asNavFor'] = '.' . $sets['slider']['classes']['container'];
	}
	$object -> blocks('slideshow');
}

if ($gallery) {
	$sets['gallery']['settings']['selector'] = '.' . $sets['gallery']['classes']['item'];
	$object -> blocks('gallery');
}

?>
