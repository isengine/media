<?php

namespace is\Masters\Modules\Isengine\Media;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Masters\View;

$sets = $this -> settings;

$slider = $sets['slider']['enable'];
$slideshow = $sets['slideshow']['enable'];
$gallery = $sets['gallery']['enable'];

$code = null;

if ($slider) {
	if ($slideshow) {
		$sets['slider']['settings']['asNavFor'] = '.' . $sets['slideshow']['classes']['container'];
	}
	$code .= '$(".' . $sets['slider']['classes']['container'] . '").slick(' . Parser::toJson($sets['slider']['settings']) . ');';
}

if ($slideshow) {
	if ($slider) {
		$sets['slideshow']['settings']['asNavFor'] = '.' . $sets['slider']['classes']['container'];
	}
	$code .= '$(".' . $sets['slideshow']['classes']['container'] . '").slick(' . Parser::toJson($sets['slideshow']['settings'] . ');';
}

if ($gallery) {
	$sets['gallery']['settings']['selector'] = '.' . $sets['gallery']['classes']['item'];
	$code .= '$().fancybox(' . Parser::toJson($sets['gallery']['settings']) . ');';
}

if ($code) {
	$view = View::getInstance();
	$view -> get('display') -> addBuffer('<script>' . $code . '</script>');
}

?>
