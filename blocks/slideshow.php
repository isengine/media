<?php

namespace is\Masters\Modules\Isengine\Media;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Parser;

$instance = $this -> get('instance');
$sets = $this -> settings;

if ($sets['slider']['enable']) {
	$sets['slideshow']['settings']['asNavFor'] = '.' . $sets['slider']['classes']['container'];
}

?>

<div class="<?= $sets['slideshow']['classes']['container']; ?>">

<?php
$this -> list -> iterate(function($item, $key, $position) use ($sets) {
	$name = $item -> getEntryKey('name');
	$data = $item -> getData();
	//echo print_r($key, 1) . '<br>';
	//echo print_r($data, 1) . '<br>';
	
	$slider = $sets['slider']['enable'];
	$slideshow = $sets['slideshow']['enable'];
	$gallery = $sets['gallery']['enable'];
	
	if ($gallery && !$slider) {
?>
	<a class="<?= $sets['slideshow']['classes']['item'] . ' ' . $sets['gallery']['classes']['item']; ?>" href="<?= $data['url']; ?>">
		<img <?= $sets['slideshow']['lazy'] ? 'data-lazy' : 'src'; ?>="<?= $data['url']; ?>" class="<?= $sets['slideshow']['classes']['image']; ?>" />
	</a>
<?php
	} else {
?>
<div class="<?= $sets['slideshow']['classes']['item']; ?>">
	<img <?= $sets['slideshow']['lazy'] ? 'data-lazy' : 'src'; ?>="<?= $data['url']; ?>" class="<?= $sets['slideshow']['classes']['image']; ?>" />
</div>
<?php
	}
});
?>

</div>