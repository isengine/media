<?php

namespace is\Masters\Modules\Isengine\Media;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Parser;

$instance = $this->get('instance');
$sets = $this->settings;

//echo print_r($this, 1);

//$this->eget('container')->addClass('new');
//$this->eget('container')->open(true);
//$this->eget('container')->close(true);
//$this->eget('container')->print();

if ($sets['slider']['enable']) {
    $this->block('slider');
}

if ($sets['slideshow']['enable']) {
    $this->block('slideshow');
}

if ($sets['gallery']['enable']) {
    $this->block('gallery');
}
