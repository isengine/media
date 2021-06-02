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

if (!$slideshow && !$slider) {

?>

<div class="<?= $sets['gallery']['classes']['container']; ?>">

<?php
$object -> list -> iterate(function($item, $key, $position) use ($object) {
	$name = $item -> getEntryKey('name');
	$data = $item -> getData();
	//echo print_r($key, 1) . '<br>';
	//echo print_r($data, 1) . '<br>';
	$sets = &$object -> settings;
	
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

<script>
$().fancybox(
<?= Parser::toJson($sets['gallery']['settings']); ?>
);
</script>
