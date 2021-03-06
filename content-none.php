<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package Apprise
 */
?>
<div class="clear"></div>
<div class="standard-posts-wrapper">
	<div class="posts-wrapper">	

		<header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Nothing Found', 'apprise' )); ?></h1>
		</header>

		<div class="sorry"><?php printf( __('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'apprise')); ?></div>
		<?php get_search_form(); ?>

	</div>
</div>
<div class="sidebar-frame">
	<div class="sidebar">
		<?php get_sidebar(); ?>
	</div>
</div>