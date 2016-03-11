<?php
/**
 * @package Rendition
 * File: Home Content 3 in a row thumb left layout
 */
?>
<div class="col-sm-4 col-sm-6">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h1>' ); ?>
	</header><!-- .entry-header -->
	
	<div class="entry-summary">
	<?php if (has_post_thumbnail()) { ?>
	<div class="summary-thumbnail">
		<a href="<?php the_permalink(); ?>">
		   <?php the_post_thumbnail(); ?>
		</a>	
	</div>
	<?php } ?>
	
		<?php //the_excerpt(); ?>
		<?php echo rendition_homefeed_excerpt(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages: ', 'rendition' ),
				'after'  => '</div>',
			) );
		?>
		<div class="read-more">
		    <a href="<?php echo esc_url( get_permalink() ) ?>"><?php _e( 'Continued &raquo;', 'rendition'); ?></a>
		</div>
										
		
	</div><!-- .entry-summary -->
	<div class="content-separator"></div>
	<div class="clearfix"></div>    
			
</article><!-- #post-## -->
</div>	