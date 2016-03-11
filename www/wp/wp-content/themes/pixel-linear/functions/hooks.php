<?php
/**
 * Theme's Action Hooks
 *
 *
 * @file           hooks.php
 * @package        WordPress 
 * @author         Pixel Theme Studio 
 * @copyright      2015 Pixel Theme Studio Themes
 * @license        license.txt
 * @version        Release: 1.0.0
 * @link           http://codex.wordpress.org/Plugin_API/Hooks
 * @since          available since Release 1.0
 */
?>
<?php

/**
 * Just after opening <body> tag
 *
 * @see header.php
 */
function pixlin_container() {
    do_action('pixlin_container');
}

/**
 * Just after closing </div><!-- end of #container -->
 *
 * @see footer.php
 */
function pixlin_container_end() {
    do_action('pixlin_container_end');
}

/**
 * Just after opening <div id="container">
 *
 * @see header.php
 */
function pixlin_header() {
    do_action('pixlin_header');
}

/**
 * Just after opening <div id="header">
 *
 * @see header.php
 */
function pixlin_in_header() {
    do_action('pixlin_in_header');
}

/**
 * Just after closing </div><!-- end of #header -->
 *
 * @see header.php
 */
function pixlin_header_end() {
    do_action('pixlin_header_end');
}

/**
 * Just before opening <div id="wrapper">
 *
 * @see header.php
 */
function pixlin_wrapper() {
    do_action('pixlin_wrapper');
}

/**
 * Just after opening <div id="wrapper">
 *
 * @see header.php
 */
function pixlin_in_wrapper() {
    do_action('pixlin_in_wrapper');
}

/**
 * Just after closing </div><!-- end of #wrapper -->
 *
 * @see header.php
 */
function pixlin_wrapper_end() {
    do_action('pixlin_wrapper_end');
}

/**
 * Just before opening <div id="widgets">
 *
 * @see sidebar.php
 */
function pixlin_widgets() {
    do_action('pixlin_widgets');
}

/**
 * Just after closing </div><!-- end of #widgets -->
 *
 * @see sidebar.php
 */
function pixlin_widgets_end() {
    do_action('pixlin_widgets_end');
}

?>