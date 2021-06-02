<?php

namespace is\Masters\Modules\Isengine\Media;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Parser;

$instance = $object -> get('instance');
$sets = &$object -> settings;

?>

<div class="<?= $sets['slider']['classes']['container']; ?>">

<?php
$object -> list -> iterate(function($item, $key, $position) use ($object) {
	
	$name = $item -> getEntryKey('name');
	$data = $item -> getData();
	//echo print_r($key, 1) . '<br>';
	//echo print_r($data, 1) . '<br>';
	
	$sets = &$object -> settings;
	
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

<script>
$('.<?= $sets['slider']['classes']['container']; ?>').slick(
<?= Parser::toJson($sets['slider']['settings']); ?>
);
</script>
