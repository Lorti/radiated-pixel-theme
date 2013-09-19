<?php
/**
 * The template for displaying search forms
 *
 * @package Radiated Pixel
 */
?>
	<form method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="search-form__screen-reader-text"><?php _ex( 'Search', 'assistive text', 'rp' ); ?></label>
		<input type="search" class="search-form__field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'Looking for something?', 'placeholder', 'rp' ); ?>" />
		<input type="submit" class="search_form__submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'rp' ); ?>" />
	</form>
