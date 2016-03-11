<?php if ( get_theme_mod( 'rendition_tabs_sitewide' ) != 0 ) { ?>
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

<?php } else { ?>

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
</section>
<?php } ?>