<?php

/**
 * Footer Template
 * @file           footer.php
 * @package        Pixel-Linear 
 * @author         Pixel Theme Studio 
 * @copyright      2014 - 2015 Pixel Theme Studio Themes
 * @license        license.txt
 * @version        Release: 1.0.0
 * @link           http://codex.wordpress.org/Theme_Development#Footer_.28footer.php.29
 * @since          available since Release 1.0
 */

?>

</div><!-- end of wrapper-->

<?php pixlin_wrapper_end(); // after wrapper hook ?>





<?php pixlin_container_end(); // after container hook ?>


<?php if( pts_get_data('enable_disable_sm') == '1' ) { ?>
<!-- +++++ Social Section +++++ -->
<div id="social-wrap">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12 centered">
            	<ul class="sm-ico">
                	<?php if( pts_get_data('custom_facebook_link') != '' ) { ?>
                      <li><a class="sm-facebook" target="_blank" href="<?php echo esc_attr(pts_get_data('custom_facebook_link')); ?>"></a></li>	
                    <?php } ?>
                    <?php if( pts_get_data('custom_twitter_link') != '' ) { ?>
                      <li><a class="sm-tweet" target="_blank" href="<?php echo esc_attr(pts_get_data('custom_twitter_link')); ?>"></a></li>
                    <?php } ?>
                    <?php if( pts_get_data('custom_Googlep_link') != '' ) { ?>	
                      <li><a class="sm-gplus" target="_blank" href="<?php echo esc_attr(pts_get_data('custom_Googlep_link')); ?>"></a></li>
                    <?php } ?>
                    <?php if( pts_get_data('custom_linkedin_link') != '' ) { ?>	
                      <li><a class="sm-in" target="_blank" href="<?php echo esc_attr(pts_get_data('custom_linkedin_link')); ?>"></a></li>	
                    <?php } ?>
                    <?php if( pts_get_data('custom_instagram_link') != '' ) { ?>                    
                      <li><a class="sm-insta" target="_blank" href="<?php echo esc_attr(pts_get_data('custom_instagram_link')); ?>"></a></li>	
                    <?php } ?>
                    <?php if( pts_get_data('custom_pinterest_link') != '' ) { ?>
                      <li><a class="sm-pin" target="_blank" href="<?php echo esc_attr(pts_get_data('custom_pinterest_link')); ?>"></a></li>	
                    <?php } ?>
					<?php if( pts_get_data('custom_reddit_link') != '' ) { ?>                   
                      <li><a class="sm-red" target="_blank" href="<?php echo esc_attr(pts_get_data('custom_reddit_link')); ?>"></a></li>	
                    <?php } ?>
                    <?php if( pts_get_data('custom_tumblr_link') != '' ) { ?>
                      <li><a class="sm-tumb" target="_blank" href="<?php echo esc_attr(pts_get_data('custom_tumblr_link')); ?>"></a></li>	
                    <?php } ?>                        
                    <?php if( pts_get_data('custom_stumbleupon_link') != '' ) { ?>
                      <li><a class="sm-stumble" target="_blank" href="<?php echo esc_attr(pts_get_data('custom_stumbleupon_link')); ?>"></a></li>		
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
	
</div>
<?php } ?>


<!-- +++++ Footer Section +++++ -->
<footer id="footer">

<div class="container">

      <div class="row">
      
      	<div class="col-sm-3">

          <?php dynamic_sidebar('footer-col1'); ?>

        </div>

        <div class="col-sm-3">

          <?php dynamic_sidebar('footer-col2'); ?>

        </div>

        <div class="col-sm-3">

          <?php dynamic_sidebar('footer-col3'); ?>

        </div>

        <div class="col-sm-3">

          <?php dynamic_sidebar('footer-col4'); ?>

        </div>

      

      </div><!-- /row -->

    </div><!-- /container -->

</footer><!-- end #footer -->

<!-- socket -->
<div id="socket">
<div class="container">
	<div class="row">
    	<div class="col-sm-6">
        	<?php if( pts_get_data('custom_footer_logo') !== '' ) { ?>
            	<a href="<?php echo home_url(); ?>">
            	<img src="<?php echo esc_attr(pts_get_data('custom_footer_logo')); ?>" alt="<?php bloginfo( 'name' ) ?>" />
                </a>
            <?php } else { ?>
            	<a href="<?php echo home_url(); ?>">
				
                <?php _e("<h2>Pixel Linear</h2>","pixlin");?>
                </a>
            <?php  } ?>
		</div>
        <div class="col-sm-6 text-right">
        	<?php if( pts_get_data('custom_copy_info') !== '' ) { ?>
            	<p><a href="http://pixelthemestudio.ca/"><?php echo strip_tags(pts_get_data('custom_copy_info')); ?></a></p>
            <?php } else { ?>
                <p><a href="http://pixelthemestudio.ca/">Copyright &copy; 2015 Pixel Theme Studio. All rights reserved.</a></p>
            <?php  } ?>
		</div>
    </div>
</div>
</div> <!-- end #socket -->






<?php wp_footer(); ?>



</body>

</html>