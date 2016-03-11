<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Rendition
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( !is_front_page() ) : ?>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
	<?php endif ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div id="pagination" class="btn-group>' . __( 'Pages:', 'rendition' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<div class="clearfix"></div>
</article><!-- #post-## -->
