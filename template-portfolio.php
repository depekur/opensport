<?php 
/**
Template Name: Portfolio
*
* @package Apprise
*/ 
?>

<?php get_header(); ?>
<div id="main" class="<?php echo of_get_option('portfolio_layout_settings');?>">
	<div id="content-box">
		<div id="post-body">
			<div <?php post_class('post-single'); ?>>
				<div id="portfolio">
				<?php
					$portfolio_category = get_terms('product_cat');
					if($portfolio_category):
					?>

					<?php endif; ?>	
					<div class="clear"></div>
					<div id="portfolio-wrapper" class="<?php echo of_get_option('portfolio_layout'); ?>">

						<?php $portfolio_items = of_get_option('portfolio_items'); ?>

						<?php query_posts('showposts='.$portfolio_items.'&post_type=product'); ?>	
						
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php
							$item_classes = '';
							$item_cats = get_the_terms($post->ID, 'product_cat');
							if($item_cats):
							foreach($item_cats as $item_cat) {
								$item_classes .= $item_cat->slug . ' ';
							}
							endif;
						?>
							<div class="portfolio-item outline-inward <?php echo $item_classes; ?> <?php echo of_get_option('portfolio_animation'); ?>">
								<?php if (of_get_option('pretty_photo') == '1') {?> 
									<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large'); ?>
									<a href="<?php echo $large_image_url[0]; ?>" rel="prettyPhoto">									
								<?php } else { ?>
									<a class="item_link" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
								<?php } ?>
									<div class="featured-img imgLiquidFill imgLiquid">
										<?php the_post_thumbnail('full'); ?>
									</div>
									<div class="featured-text">
										<h6><?php the_title(); ?></h6>
										<?php //the_excerpt();?>
									</div>
								</a>
							</div><!--portfolio-item-->
						<?php endwhile; ?>
						<?php endif; ?>
					</div>

					<ul class="portfolio-tabs clearfix">
						<li class="active"><a data-filter="*" href="#"><?php echo __('Все', 'framework'); ?></a></li>
						<?php foreach($portfolio_category as $portfolio_cat): ?>
							<li><a data-filter=".<?php echo $portfolio_cat->slug; ?>" href="#"><?php echo $portfolio_cat->name; ?></a></li>
						<?php endforeach; ?>
					</ul>
					
				</div><!--portfolio-->
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
</div><!--main-->
<div class="clear"></div>
<script type="text/javascript">
	var pretty=jQuery.noConflict();
		pretty(document).ready(function(){
		pretty("[rel^='prettyPhoto']").prettyPhoto();
	});
</script>	
<?php get_footer(); ?>