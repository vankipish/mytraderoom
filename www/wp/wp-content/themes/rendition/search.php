<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Rendition
 */

get_header(); ?>

<section class="container-fluid" id="section7">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="row">
          <div class="col-sm-8">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'rendition' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php rendition_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'search' ); ?>

		<?php endif; ?>

		</div>
		<div class="col-sm-4">
            <?php get_sidebar(); ?>
        </div>
		</div>
       </div>
	 </div>
</section><!-- #primary -->
<?php get_footer(); ?>