<?php
/**
 * Error 404 Template
 *
 *
 * @file           404.php
 * @package        Pixel-Linear 
 * @author         Pixel Theme Studio 
 * @copyright      2015 Pixel Theme Studio Themes
 * @license        license.txt
 * @version        Release: 1.0.0
 * @link           http://codex.wordpress.org/Creating_an_Error_404_Page
 * @since          Available since Release 1.0
 */
?>
<?php get_header(); ?>

<!-- White Wrap Ver. 1 / Error -->
    <div id="w1">
        <div class="container">
            <br>
            <div class="col-lg-10 col-lg-offset-1 centered">
                <br>
                <img src="<?php echo get_template_directory_uri();?>/images/404.png" alt="">
                <br>
                <h1><b><?php _e('404', 'pixlin'); ?></b></h1>
                <h2><?php _e('OOOPS!<br/> you are not in the right place.', 'pixlin'); ?>
                </h2>
                <br>
                <hr>
                <br>
                <h4><?php _e('WE CAN HELP YOU FIND YOUR PATH.', 'pixlin'); ?></h4>
                <br>
                <p><b><a href="<?php echo home_url(); ?>/">Back to Home</a></b></p>
            </div>
        </div><!-- /container -->
    </div> <!-- /White Wrap 1 / Error -->

<?php get_footer(); ?>