<?php
/**
 * @package Rendition
 */
?>
<div class="col-md-3 col-sm-4 col-sm-12">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php rendition_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_front_page() || is_home() || is_search() || is_archive() || is_category() ) : // Display Excerpts for Searches, Archives & Categories ?>
	<div class="entry-summary">
	<?php if (has_post_thumbnail()) { ?>
	<div class="summary-thumbnail">
		<a href="<?php the_permalink(); ?>">
		   <?php the_post_thumbnail( 'rendition-post-feature' ); ?>
		</a>	
	</div>
	<?php }
		echo rendition_homefeed_excerpt(); ?>
	</div><!-- .entry-summary -->
	<div class="read-more">
	    <a href="<?php echo esc_url( get_permalink() ) ?>"><?php _e( 'Read The Full Article &raquo;', 'rendition'); ?></a>
	</div>
	<?php else : ?>
	<div class="entry-content">
	<?php if (has_post_thumbnail()) { ?>
	<div class="summary-thumbnail">
		<a href="<?php the_permalink(); ?>">
		   <?php the_post_thumbnail( 'rendition-post-feature' ); ?>
		</a>	
	</div>
	<?php } ?>
		<?php the_excerpt(); ?>
		<div class="read-more">
	         <a href="<?php echo esc_url( get_permalink() ) ?>"><?php _e( 'Read The Full Article &raquo;', 'rendition'); ?></a>
	    </div>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'rendition' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search
			
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'rendition' ) );
				if ( $categories_list && rendition_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'rendition' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories

			
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'rendition' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'rendition' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list
		endif; // End if 'post' == get_post_type()

		if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'rendition' ), __( '1 Comment', 'rendition' ), __( '% Comments', 'rendition' ) ); ?></span>
		<?php endif;

		edit_post_link( __( 'Edit', 'rendition' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
</div>	