  <div class="row">
  
  	<div class="col-sm-8 col-sm-offset-2 text-center">
        <?php if ( get_theme_mod( 'rendition_intro_title_visibility' ) != 1 ) : ?>
		<?php if (get_theme_mod( 'rendition_intro_title' )) { ?>		    
			<h1>
			    <?php echo esc_html(get_theme_mod( 'rendition_intro_title' )) ;?>
			</h1>
		<?php } else { ?>
		    <h1>
			    <?php printf( __( 'Who We Are!', 'rendition' ) ); ?>
			</h1>
		<?php } ?>
		<?php endif; ?>
        <br>
		<?php if (get_theme_mod( 'rendition_intro_text' )) { ?>
		    <p class="lead">
			    <?php echo esc_textarea(get_theme_mod( 'rendition_intro_text' )) ;?>
			</p>
		<?php } else { ?>
		    <p class="lead">
			    <?php printf( __( 'We are a small team of web development enthusiasts aiming to generate clean and functional theme using the Bootstrap toolkit together with WordPress...', 'rendition' ) ); ?>
			</p>
        <?php } ?>
		<br> 
      	<?php if ( get_theme_mod( 'rendition_intro_button_visibility' ) != 1 ) : ?>
		<div class="col-sm-6 col-sm-offset-3">
	        <div class="btn-group purchase_toggle_buttons">
			<?php $rendition_purch_lt_url     = esc_url(get_theme_mod( 'rendition_purchase_left_url' )); ?>
			<?php $rendition_purch_lt_text    = esc_html(get_theme_mod( 'rendition_purchase_left_text' )); ?>
			<?php $rendition_purch_lt_target  = esc_attr(get_theme_mod( 'rendition_purchase_left_url_target' )); ?>
			<?php $rendition_purch_rt_url    = esc_url(get_theme_mod( 'rendition_purchase_right_url' )); ?>
			<?php $rendition_purch_rt_text   = esc_html(get_theme_mod( 'rendition_purchase_right_text' )); ?>
			<?php $rendition_purch_rt_target = esc_attr(get_theme_mod( 'rendition_purchase_right_url_target' )); ?>			
			
			    <?php if (get_theme_mod( 'rendition_purchase_left_url' )) { ?>
				    <a href="<?php echo $rendition_purch_lt_url ?>" target="<?php echo $rendition_purch_lt_target ?>" type="button" class="btn btn-default purchase_toggle_button left">
				        <?php echo $rendition_purch_lt_text ?>
				    </a>
				<?php } else { ?>
                    <a href="#" type="button" class="btn btn-default purchase_toggle_button left">
					    <?php printf( __( 'Learn More', 'rendition' ) ); ?>
					</a>
				<?php } ?>
				
				<?php if (get_theme_mod( 'rendition_purchase_left_url' )) { ?>
				    <a href="<?php echo $rendition_purch_rt_url ?>" target="<?php echo $rendition_purch_rt_target ?>" type="button" class="btn btn-default purchase_toggle_button right">
				        <?php echo $rendition_purch_rt_text ?>
				    </a>
				<?php } else { ?>
                    <a href="#" type="button" class="btn btn-default purchase_toggle_button right">
					    <?php printf( __( 'View Themes', 'rendition' ) ); ?>
					</a>
				<?php } ?>
                <span class="or_text">or</span>
            </div>
	    </div>
		<?php endif; ?>
    </div>
  </div>