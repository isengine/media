<?php

namespace is\Masters\Modules\Isengine\Media;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Parser;

$instance = $this -> get('instance');
$sets = &$this -> settings;

$slider = $sets['slider']['enable'];
$slideshow = $sets['slideshow']['enable'];
$gallery = $sets['gallery']['enable'];
//echo print_r($this, 1);

//$this -> eget('container') -> addClass('new');
//$this -> eget('container') -> open(true);
//$this -> eget('container') -> close(true);
//$this -> eget('container') -> print();

if ($slider) {
	if ($slideshow) {
		$sets['slider']['settings']['asNavFor'] = '.' . $sets['slideshow']['classes']['container'];
	}
	$this -> block('slider');
}

if ($slideshow) {
	if ($slider) {
		$sets['slideshow']['settings']['asNavFor'] = '.' . $sets['slider']['classes']['container'];
	}
	$this -> block('slideshow');
}

if ($gallery) {
	$sets['gallery']['settings']['selector'] = '.' . $sets['gallery']['classes']['item'];
	$this -> block('gallery');
}

?>
