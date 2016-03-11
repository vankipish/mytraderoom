<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package rendition
 */
global $post;
$rendition_widget_title = esc_html(get_post_meta( $post->ID, '_rendition_widget_title', true ));
$rendition_project_url = esc_url(get_post_meta( $post->ID, '_rendition_project_url', true ));
$rendition_project_type = esc_html(get_post_meta( $post->ID, '_rendition_project_type', true ));
$rendition_project_status = esc_html(get_post_meta( $post->ID, '_rendition_project_status', true ));
?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php do_action( 'rendition_before_sidebar' );
		if (get_post_meta( $post->ID, '_rendition_widget_title', true )) :  ?>
		<h3 class="widget-title">
		    <i class="fa fa-folder-open"></i>
		    <?php echo $rendition_widget_title ?>
		</h3>
		
		<p class="project-info">
		    <i class="fa fa-paint-brush"></i>
			<?php _e( 'Project Type: ', 'rendition'); ?>
		    <?php echo $rendition_project_type ?>
		</p>
		
		<p class="project-info">
		   <i class="fa fa-cogs"></i>
           <?php _e( 'Project Status: ', 'rendition'); ?>
		   <?php echo $rendition_project_status ?>
		</p>
		
		<a href="<?php echo $rendition_project_url ?>" target="_blank">		    
            <p class="project-info-url btn btn-success blue">
			     <i class="fa fa-external-link"></i>
				 <?php _e( 'View Project @ ', 'rendition'); ?>			 
				 <?php the_title(); ?>
			</p>
		</a>
		<?php endif; // end project widget area ?>
		<?php if ( ! dynamic_sidebar( 'portfolio' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
	<?php do_action( 'rendition_after_sidebar' ); ?>
	</div><!-- #secondary -->
