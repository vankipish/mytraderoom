<?php do_action( 'rendition_before_home_content' );

		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post();
			if (get_theme_mod( 'rendition_blogfeed_layout' )) {
	            $rendition_feed = get_theme_mod( 'rendition_blogfeed_layout' );
            			
			    get_template_part( 'content/content', $rendition_feed );
			
			} else {
			 
			    get_template_part( 'content/content', 'default' );
			
			}
			
			endwhile;
			do_action( 'rendition_before_home_pagination' );
			rendition_pagination();
			do_action( 'rendition_after_home_pagination' );

		else :
            
			get_template_part( 'no-results', 'index' );
			
		endif;
do_action( 'rendition_after_home_content' ); ?>