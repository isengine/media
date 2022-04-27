<?php

namespace is\Masters\Modules\Isengine\Media;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Masters\View;

$sets = $this->settings;

$slider = $sets['slider']['enable'];
$slideshow = $sets['slideshow']['enable'];
$gallery = $sets['gallery']['enable'];

$slider_class = '.' . Strings::replace($sets['slider']['classes']['container'], ' ', '.');
$slideshow_class = '.' . Strings::replace($sets['slideshow']['classes']['container'], ' ', '.');

$code = null;

if ($slider) {
    if ($slideshow) {
        $sets['slider']['settings']['asNavFor'] = $slideshow_class;
    }
    $code .= '$("' . $slider_class . '").slick(' . Parser::toJson($sets['slider']['settings']) . ');';
}

if ($slideshow) {
    if ($slider) {
        $sets['slideshow']['settings']['asNavFor'] = $slider_class;
    }
    $code .= '$("' . $slideshow_class . '").slick(' . Parser::toJson($sets['slideshow']['settings']) . ');';
}

if ($gallery) {
    $sets['gallery']['settings']['selector'] = '.' . $sets['gallery']['classes']['item'];
    $code .= '$().fancybox(' . Parser::toJson($sets['gallery']['settings']) . ');';
}

if ($code) {
    $view = View::getInstance();
    $view->get('display')->addBuffer('<script>' . $code . '</script>');
}
