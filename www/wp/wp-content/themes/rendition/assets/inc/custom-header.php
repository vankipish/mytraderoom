<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package EDDition
 * @since EDDition 1.0
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses rendition_header_style()
 * @uses rendition_admin_header_style()
 * @uses rendition_admin_header_image()
 *
 * @package rendition
 */
function rendition_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'rendition_custom_header_args', array(
		'default-image'          => '%s/assets/images/header.jpg',
		'default-text-color'     => '#168ccc',
		'width'                  => 3200,
		'height'                 => 560,
		'flex-width'			 => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'rendition_header_style',
		'admin-head-callback'    => 'rendition_admin_header_style',
		'admin-preview-callback' => 'rendition_admin_header_image',
	) ) );

	/*
	 * Default custom headers packaged with the theme.
	 * %s is a placeholder for the theme template directory URI.
	 */
	register_default_headers( array(
		'header-image' => array(
			'url'           => '%s/assets/images/header.jpg',
			'thumbnail_url' => '%s/assets/images/header-thumbnail.jpg',
			'description'   => __( 'Header Image', 'rendition' )
		)	
	) );
}
add_action( 'after_setup_theme', 'rendition_custom_header_setup' );

if ( ! function_exists( 'rendition_header_style' ) ) :

/**
 * Styles the header text displayed on the blog.
 *
 */
function rendition_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		h1.v-center a {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		h1.v-center a,
        h3.site-description {
			color: #<?php echo $header_text_color; ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // rendition_header_style

if ( ! function_exists( 'rendition_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see rendition_custom_header_setup().
 */
function rendition_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
		}
		#headimg h1 a {
			text-decoration: none;
		}
		#desc {
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // rendition_admin_header_style

if ( ! function_exists( 'rendition_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see rendition_custom_header_setup().
 */
function rendition_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // rendition_admin_header_image
