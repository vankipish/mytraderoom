<?php
/**
 * The template for displaying search forms in Rendition
 *
 * @package Rendition
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'rendition' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search - Type & Hit Enter &hellip;', 'placeholder', 'rendition' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'rendition' ); ?>">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'rendition' ); ?>">
</form>
