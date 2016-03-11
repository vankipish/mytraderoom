<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 		
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
    <?php wp_head(); ?>
  </head>
<body <?php body_class(); ?>>

<?php get_template_part( 'top-nav' ); ?>

<?php if ( is_front_page() ) : ?>
<!--Video Section-->
<section class="content-section video-section" id="section0">
  <?php if ( get_header_image() ) : ?>
	<div id="header-image">
		<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
	</div>	
  <?php endif; ?>

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        <h1 class="text-center v-center">
            <?php if (get_theme_mod( 'rendition_logo_image' )) : ?>
			<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			    <img src="<?php echo esc_url(get_theme_mod( 'rendition_logo_image' )); ?>" alt="<?php echo esc_html(get_theme_mod( 'rendition_logo_alt_text' )); ?>" />
			</a>
		<?php else : ?>
            <a class="brand" href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        <?php endif; ?>
		</h1>  
        <?php if ( get_theme_mod( 'rendition_desc_visibility' ) != 1 ) { ?>
		    <h3 class="site-description"><?php bloginfo( 'description' ); ?></h3>
		<?php } ?>
	   </div>
      </div>
		
    </div>
    <?php if ( get_theme_mod( 'rendition_tabs_visibility' ) != 1 ) {
        get_template_part( 'parts/header-tabs' );
    } ?>
</section>
<!--Video Section Ends Here-->
<?php endif;
if ( !is_front_page() ) {	
    get_template_part( 'inner-header' );
} ?>