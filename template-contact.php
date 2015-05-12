<?php
/*
Template Name: Contact Page
*
* @package Apprise
*/
get_header(); ?>
	<div id="main" class="contact-form <?php echo of_get_option('contact_layout_settings');?>">
		<h1 id="post-title" <?php post_class('entry-title'); ?>><?php the_title(); ?> </h1>
		<?php if (of_get_option('enable_breadcrumbs') == '1') { ?>
			<div class="breadcrumbs">
				<div class="breadcrumbs-wrap"> 
					<?php get_template_part( 'breadcrumbs'); ?>
				</div><!--breadcrumbs-wrap-->
			</div><!--breadcrumbs-->
		<?php } ?>
		<div class="gmap" id="gmap">
		</div>
		<div class="contact-info">
			<div class="one_third">
				<div class="box-icon">
					<span>
						<i class="fa fa-map-marker"></i>
					</span>
				</div>
				<h4 class="box-title"><?php _e('Адрес производства','apprise'); ?></h4>
				<div class="box-content">
					<?php echo of_get_option('contact_address'); ?>
				</div>
			</div>
			<div class="one_third">
				<div class="box-icon">
					<span>
						<i class="fa fa-phone"></i>
					</span>
				</div>
				<h4 class="box-title"><?php _e('Телефон','apprise'); ?></h4>
				<div class="box-content">
					<?php echo of_get_option('contact_phone'); ?>
				</div>
			</div>
			<div class="one_third last">
				<div class="box-icon">
					<span>
						<i class="fa fa-envelope-o"></i>
					</span>
				</div>
				<h4 class="box-title"><?php _e('Почта','apprise'); ?></h4>
				<div class="box-content">
					<?php echo of_get_option('contact_email'); ?>
				</div>	
			</div>
		</div>
		<div class="clear"></div>
		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<div id="content-box">
				<div id="post-body">
					<div <?php post_class('post-single'); ?>>
						<?php
							$addresses = explode('|', of_get_option('gmap_address'));
							$markers = '';
							foreach($addresses as $address_string) {
								$markers .= "{
									address: '{$address_string}',
									html: {
										content: '{$address_string}',
										popup: true
									} 
								},";	
							}
						?>
						<script type='text/javascript'>
							jQuery(document).ready(function($) {
								jQuery('#gmap').goMap({
									address: '<?php echo $addresses[0]; ?>',
									maptype: '<?php echo of_get_option('gmap_type'); ?>',
									zoom: <?php echo of_get_option('map_zoom_level'); ?>,
									scrollwheel: <?php if(of_get_option('map_scrollwheel')): ?>true<?php else: ?>false<?php endif; ?>,
									scaleControl: <?php if(of_get_option('map_scale')): ?>true<?php else: ?>false<?php endif; ?>,
									navigationControl: <?php if(of_get_option('map_zoomcontrol')): ?>true<?php else: ?>false<?php endif; ?>,
	        						markers: [<?php echo $markers; ?>]
								});
							});
						</script>

						<div id="article">
			
							<?php the_content(); ?>
							
						</div><!--article-->
					</div><!--post-single-->
					<div class="post-sidebar">
						<div class="short-info">
							<div class="single-meta">
								<?php dynamic_sidebar('secondary-sidebar'); ?>
							</div><!--single-meta-->
						</div><!--short-info-->
					</div><!--post-sidebar-->
				</div><!--post-body-->
			</div><!--content-box-->
			<?php if ( of_get_option('page_sidebar_position') != 'none' ) { ?>
				<div class="sidebar-frame">
					<div class="sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			<?php } ?>
		<?php endwhile; ?>
	</div><!--main-->
<?php get_footer(); ?>
