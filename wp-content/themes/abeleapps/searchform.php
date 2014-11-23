<?php
/**
 * The template for displaying search forms in AbeleApps
 *
 * @package AbeleApps
 */
?>
	<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<input type="hidden" name="post_type" value="projects" />
		<i class="icon-search"></i><input type="search" class="field ad-search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'abeleapps' ); ?>" />
		<input type="submit" class="submit ca-hidden" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'abeleapps' ); ?>" />
	</form>
