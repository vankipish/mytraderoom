<?php get_sidebar( 'footer' ); ?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<?php do_action( 'rendition_in_before_colophon' ); ?>
		<div class="site-info">
		<div class="container">
			<?php do_action( 'rendition_before_credits' );
			printf( __( 'Proudly Powered By', 'rendition' ) ); ?><a target="_Blank" href="<?php echo esc_url( __( 'http://wordpress.org/', 'rendition' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'rendition' ); ?>"><?php printf( __( ' %s', 'rendition' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme', 'rendition' ) ); ?><a target="_blank" href="<?php echo esc_url( __( 'http://www.wpstrapcode.com/blog/rendition', 'rendition' ) ); ?>" title="<?php esc_attr_e( 'Rendition WordPress Theme', 'rendition' ); ?>"><?php printf( __( ' %s', 'rendition' ), 'Rendition' ); ?></a><?php printf( __( ' By %s', 'rendition' ), 'WP Strap Code' );
		do_action( 'rendition_after_credits' ); ?>
	    </div>
	    </div><!-- .site-info -->
<?php do_action( 'rendition_in_after_colophon' ); ?>
</footer><!-- #colophon -->
<?php do_action( 'rendition_below_footer' );

wp_footer(); ?>
	</body>
</html>