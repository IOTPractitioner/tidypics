<?php
/**
 * Photo navigation
 *
 * @uses $vars['entity']
 */

$photo = $vars['entity'];

$album = $photo->getContainerEntity();
$previous_photo = $album->getPreviousImage($photo->getGUID());
$next_photo = $album->getNextImage($photo->getGUID());
$size = $album->getSize();
$index = $album->getIndex($photo->getGUID());

if ($previous_photo && $next_photo) {
	echo '<ul class="elgg-menu elgg-menu-hz tidypics-album-nav">';
	echo '<li>';
	echo elgg_view('output/url', array(
		'text' => elgg_view_icon('arrow-left'),
		'href' => $previous_photo->getURL(),
		'is_trusted' => true,
	));
	echo '</li>';

	echo '<li>';
	echo '<span>' . elgg_echo('image:index', array($index, $size)) . '</span>';
	echo '</li>';

	echo '<li>';
	echo elgg_view('output/url', array(
		'text' => elgg_view_icon('arrow-right'),
		'href' => $next_photo->getURL(),
		'is_trusted' => true,
	));
	echo '</li>';
	echo '</ul>';
}