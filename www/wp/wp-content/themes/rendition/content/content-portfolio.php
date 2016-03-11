<?php
/**
 * @package Rendition
 */
?>

<div class="col-sm-3 col-sm-6">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="project-thumbnail">
			<a href="<?php the_permalink(); ?>" title="Project: <?php the_title(); ?> Click Image To View">
			    <?php the_post_thumbnail( 'rendition-frontpage' ); ?>
			</a>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
		if ( !is_front_page()) :
		    the_content();
		endif;
		
			wp_link_pages( array(
				'before' => '<div class="page-links btn special">' . __( 'Pages: ', 'rendition' ),
				'after'  => '</div>',
			) );
		?>		
	</div><!-- .entry-content -->

	
</article><!-- #post-## -->
</div>