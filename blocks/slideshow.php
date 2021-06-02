<?php

namespace is\Masters\Modules\Isengine\Media;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Parser;

$instance = $object -> get('instance');
$sets = &$object -> settings;

?>

<div class="<?= $sets['slideshow']['classes']['container']; ?>">

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
	
	if ($gallery && !$slider) {
?>
	<a class="<?= $sets['slideshow']['classes']['item'] . ' ' . $sets['gallery']['classes']['item']; ?>" href="<?= $data['url']; ?>">
		<img data-lazy="<?= $data['url']; ?>" class="<?= $sets['slideshow']['classes']['image']; ?>" />
	</a>
<?php
	} else {
?>
<div class="<?= $sets['slideshow']['classes']['item']; ?>">
	<img data-lazy="<?= $data['url']; ?>" class="<?= $sets['slideshow']['classes']['image']; ?>" />
</div>
<?php
	}
});
?>

</div>

<script>
$('.<?= $sets['slideshow']['classes']['container']; ?>').slick(
<?= Parser::toJson($sets['slideshow']['settings']); ?>
);
</script>