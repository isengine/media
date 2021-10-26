<?php

namespace is\Masters\Modules\Isengine\Media;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Parser;

$instance = $this -> get('instance');
$sets = $this -> settings;

$sets['gallery']['settings']['selector'] = '.' . $sets['gallery']['classes']['item'];

if (
	!$sets['slideshow']['enable'] &&
	!$sets['slider']['enable']
) {

?>

<div class="<?= $sets['gallery']['classes']['container']; ?>">

<?php
$this -> list -> iterate(function($item, $key, $position) use ($this) {
	$name = $item -> getEntryKey('name');
	$data = $item -> getData();
	//echo print_r($key, 1) . '<br>';
	//echo print_r($data, 1) . '<br>';
	$sets = &$this -> settings;
	
/*
<a class="<?= $sets['gallery']['classes']['item']; ?>" data-fancybox="gallery" href="<?= $data['url']; ?>">
	<img src="<?= $data['url']; ?>" class="<?= $sets['gallery']['classes']['image']; ?>" />
	<!-- data-lazy="<?= $data['url']; ?>" -->
</a>
*/

?>
<a class="<?= $sets['gallery']['classes']['item']; ?>" href="<?= $data['url']; ?>">
	<img src="<?= $data['url']; ?>" class="<?= $sets['gallery']['classes']['image']; ?>" />
</a>

<?php
});
?>

</div>

<?php
}
?>