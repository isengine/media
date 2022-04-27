<?php

namespace is\Masters\Modules\Isengine\Media;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Parser;

$instance = $this->get('instance');
$sets = $this->settings;

if ($sets['slideshow']['enable']) {
    $sets['slider']['settings']['asNavFor'] = '.' . $sets['slideshow']['classes']['container'];
}

?>

<div class="<?= $sets['slider']['classes']['container']; ?>">

<?php
$this->list->iterate(function($item, $key, $position) use ($sets) {
    $name = $item->getEntryKey('name');
    $data = $item->getData();
    //echo print_r($key, 1) . '<br>';
    //echo print_r($data, 1) . '<br>';

    $slider = $sets['slider']['enable'];
    $slideshow = $sets['slideshow']['enable'];
    $gallery = $sets['gallery']['enable'];

    if ($gallery) {
?>
    <a class="<?= $sets['slider']['classes']['item'] . ' ' . $sets['gallery']['classes']['item']; ?>" href="<?= $data['url']; ?>">
        <img data-lazy="<?= $data['url']; ?>" class="<?= $sets['slider']['classes']['image']; ?>" />
    </a>
<?php
    } else {
?>
    <div class="<?= $sets['slider']['classes']['item']; ?>">
        <img data-lazy="<?= $data['url']; ?>" class="<?= $sets['slider']['classes']['image']; ?>" />
    </div>
<?php
    }
});
?>

</div>