<?php
/**
 * Blog Template
 *
   Template Name: Blog
 *
 * @file           blog.php
 * @package        Pixel-Linear 
 * @author         Pixel Theme Studio 
 * @copyright      2014 - 2015 Pixel Theme Studio Themes
 * @license        license.txt
 * @version        Release: 1.0.0
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */
   ?>
   <?php get_header(); ?>

  <?php if (have_posts()) : ?>

  <?php
  $c = 0; 
  $color_id = 'grey';
  ?>

  <?php while (have_posts()) : the_post(); ?>

  <?php
         $c++; // increment the counter
         if( $c % 2 != 0) {
          $color_id = 'white';
        } else {
          $color_id = 'gray'; }
          ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

           <div id="<?php echo $color_id ?>">
            <div class="container">
              <div class="row">
                <div class="col-sm-12">

                  <section class="post-meta">          
                      <p class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?><ba><?php the_author_meta( 'display_name' ); ?></ba></p>
                         <p><bd><time class="post-date"><?php the_date(); ?></time></bd></p>                
                  </section><!-- end of .post-meta -->

                   <a href="<?php the_permalink(); ?>" <header>
                   <h4 class="post-title"><?php the_title(); ?></h4>
                  </header>
				    </a>
                  <section class="post-entry">
                    <?php if ( has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                      <?php the_post_thumbnail(); ?>
                    </a>
                  <?php endif; ?>

                  


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

                        </div>

                      </div><!-- /row -->
                    </div> <!-- /container -->
                  </div> 


                </article><!-- end of #post-<?php the_ID(); ?> -->



              <?php endwhile; ?> 

              <?php if (  $wp_query->max_num_pages > 1 ) : ?>
              <div class="container">

              <div class="row">
                <div class="col-sm-12">
                  <hr>
              <nav>
                <ul class="pager">
                 <li class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'pixlin' ) ); ?></li>
                 <li class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'pixlin' ) ); ?></li>
               </ul><!-- end of .navigation -->
             </nav>
           </div>
         </div>
       </div>
           <?php endif; ?>

         <?php else : ?>

         <article id="post-not-found" class="hentry clearfix">
          <div class="container">
              <div class="row">
                <div class="col-sm-12">
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
         </div>
         </div>
       </div>
       </article>

     <?php endif; ?>  


   </div> <!-- /col-lg-8 -->

   <?php get_footer(); ?>