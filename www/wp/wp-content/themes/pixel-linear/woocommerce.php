<?php
/**
 * Pages Template
 *
 *
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
		<?php woocommerce_content(); ?>
    </div><!-- /col-sm-12 -->
   </div><!-- /row -->
 </div> <!-- /container -->
</div><!-- /ww -->

     

     <?php get_footer(); ?>