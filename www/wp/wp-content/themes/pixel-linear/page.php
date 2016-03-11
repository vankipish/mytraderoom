<?php
/**
 * Pages Template
 * @file           page.php
 * @package        Pixel-Linear 
 * @author         Pixel Theme Studio 
 * @copyright      2014 - 2015 Pixel Theme Studio Themes
 * @license        license.txt
 * @version        Release: 1.0.0
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0

 */
?>



<?php get_header(); ?>

<div id="wrapper">
  <div class="container">
   <div class="row">
    <div class="col-sm-12">
      <?php if (have_posts()) : ?>

      <?php while (have_posts()) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php if ( has_post_thumbnail()) : ?>
        <?php the_post_thumbnail(); ?>
      <?php endif; ?>

      <header>
        <h1><?php the_title(); ?></h1>
      </header>

      <section class="post-entry">
        <?php the_content(); ?>
        <?php custom_link_pages(array(
          'before' => '<nav class="pagination"><ul>',
          'after' => '</ul></nav>',
                            'next_or_number' => 'next_and_number', # activate parameter overloading
                            'nextpagelink' => __('&rarr;',''),
                            'previouspagelink' => __('&larr;',''),
                            'pagelink' => '%',
                            'echo' => 1 )
                            ); ?>
                          </section><!-- end of .post-entry -->
                          
                          <footer class="article-footer">           
                            <div class="post-edit"><?php edit_post_link(__('Edit', 'pixlin')); ?></div> 
                          </footer>
                        </article><!-- end of #post-<?php the_ID(); ?> -->
                        
                      <?php endwhile; ?> 
                      
                      <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                      <nav class="navigation">
                       <div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'pixlin' ) ); ?></div>
                       <div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'pixlin' ) ); ?></div>
                     </nav><!-- end of .navigation -->
                   <?php endif; ?>

                 <?php else : ?>

                 <article id="post-not-found" class="hentry clearfix">
                  <header>
                   <h1 class="title-404"><?php _e('404 &#8212; Fancy meeting you here!', 'pixlin'); ?></h1>
                 </header>
                 <section>
                   <p><?php _e('Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'pixlin'); ?></p>
                 </section>
                 <footer>
                   <h6><?php _e( 'You can return', 'pixlin' ); ?> <a href="<?php echo home_url(); ?>/" title="<?php esc_attr_e( 'Home', 'pixlin' ); ?>"><?php _e( '&#9166; Home', 'pixlin' ); ?></a> <?php _e( 'or search for the page you were looking for', 'pixlin' ); ?></h6>
                   <?php get_search_form(); ?>
                 </footer>

               </article>

             <?php endif; ?>  
           </div><!-- /col-lg-8 -->
         </div><!-- /row -->
       </div> <!-- /container -->
     </div><!-- /ww -->

     

     <?php get_footer(); ?>