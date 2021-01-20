<?php

/**
 * Mediapool Addon.
 *
 * @author jan[dot]kristinus[at]redaxo[dot]de Jan Kristinus
 *
 * @package redaxo5
 */

$addon = rex_addon::get('mediapool');

$mypage = 'mediapool';

rex_complex_perm::register('media', rex_media_perm::class);

require_once __DIR__ . '/functions/function_rex_mediapool.php';

if (rex::isBackend() && rex::getUser()) {
    rex_view::addJsFile($addon->getAssetsUrl('lazysizes.min.js'), [rex_view::JS_IMMUTABLE => true, rex_view::JS_ASYNC => true]);
    rex_view::addJsFile($addon->getAssetsUrl('mediapool.js'), [rex_view::JS_IMMUTABLE]);
    rex_view::setJsProperty('imageExtensions', $addon->getProperty('image_extensions'));
    rex_view::addCssFile($addon->getAssetsUrl('styles.css'));
}
