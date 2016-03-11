<?php

get_header();
$feed_header = esc_html(get_theme_mod( 'rendition_feed_header_title' ));

if ( get_theme_mod( 'rendition_services_visibility' ) != 1 ) { ?>
<section class="container-fluid" id="section2">
    <?php get_template_part( 'parts/boxes' ); ?>
	<div class="clearfix"></div>
</section>
<?php }

if ( get_theme_mod( 'rendition_home_intro_visibility' ) != 1 ) { ?>
<section class="container-fluid" id="section6">
    <?php get_template_part( 'parts/cta' ); ?>	
</section>
<?php } 
?>

<section class="container-fluid" id="section3">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="home-feed row">
		  <?php 
		     if ( 'posts' == get_option( 'show_on_front' ) ) { 
			     if ( get_theme_mod( 'rendition_feed_header_visibility' ) != 1 ) {
			         if (get_theme_mod( 'rendition_feed_header_title' )) { ?>
					 
					 <h3 class="feed head text-center"><?php echo $feed_header ?></h3>
                     <?php } else { ?>
                     <h3 class="feed head text-center"><?php _e('Latest News On ', 'rendition' ); ?><?php bloginfo( 'name' ); ?><sup>™</sup></h3>
					 
					 <?php } ?>
			     <?php } 
  			     get_template_part( 'content/feed' ); 
		     } else { ?>
			 <div class="col-sm-10 col-sm-offset-1">
			 <?php while ( have_posts() ) : the_post();
                 get_template_part( 'content/content', 'page' );
             endwhile; // end of the loop. ?>
			 </div>
			 <?php }
		 ?>
        </div>
      </div>
   </div>
</section>
<?php if ( class_exists( 'Jetpack' ) ) : ?>
<?php if ( get_theme_mod( 'rendition_home_projects_visibility' ) != 0 ) { 
$project_header = esc_html(get_theme_mod( 'rendition_project_header_title' )); ?>
<section class="container-fluid" id="section8">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="row">
		<?php if ( get_theme_mod( 'rendition_project_header_visibility' ) != 1 ) {
			  if (get_theme_mod( 'rendition_project_header_title' ) && is_front_page() && !is_paged() ) { ?>
				 <h3 class="project head text-center"><?php echo $project_header ?></h3>				 
			     <div class="project-title-separator"></div>
              <?php } elseif (is_front_page() && !is_paged()) { ?>
                  <h3 class="project head text-center"><?php _e( 'Latest Projects On ', 'rendition'); ?><?php bloginfo( 'name' ); ?><sup>™</sup></h3>				  
			      <div class="project-title-separator"></div>
			  <?php } ?>
			  <?php }
        get_template_part( 'content/content', 'portfolio-home' ); ?>
        </div>
    </div>	
</section>
<?php } 
endif;

get_footer(); ?>