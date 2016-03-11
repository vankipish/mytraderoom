<?php $rendition_serv1_icon  = esc_html(get_theme_mod( 'rendition_service1_icon' )); ?>
<?php $rendition_serv2_icon  = esc_html(get_theme_mod( 'rendition_service2_icon' )); ?>
<?php $rendition_serv3_icon  = esc_html(get_theme_mod( 'rendition_service3_icon' )); ?>
<?php $rendition_serv1_url   = esc_url(get_theme_mod( 'rendition_service1_url' )); ?>
<?php $rendition_serv2_url   = esc_url(get_theme_mod( 'rendition_service2_url' )); ?>
<?php $rendition_serv3_url   = esc_url(get_theme_mod( 'rendition_service3_url' )); ?>
<?php $rendition_serv1_title = esc_html(get_theme_mod( 'rendition_service1_title' )); ?>
<?php $rendition_serv2_title = esc_html(get_theme_mod( 'rendition_service2_title' )); ?>
<?php $rendition_serv3_title = esc_html(get_theme_mod( 'rendition_service3_title' )); ?>
<?php $rendition_serv1_text  = esc_html(get_theme_mod( 'rendition_service1_text' )); ?>
<?php $rendition_serv2_text  = esc_html(get_theme_mod( 'rendition_service2_text' )); ?>
<?php $rendition_serv3_text  = esc_html(get_theme_mod( 'rendition_service3_text' )); ?>

<div class="container">
	<div class="row">
        <!-- Service Boxes -->
    	<div class="col-sm-4 col-sm-6 col-xs-12">
			<div class="box">							
				<div class="icon">
					<?php if (get_theme_mod( 'rendition_service1_icon' )) { ?>
					<div class="image"><i class="fa fa-<?php echo $rendition_serv1_icon ?>"></i></div>
					<?php } else { ?>
					<div class="image"><i class="fa fa-thumbs-o-up"></i></div>
					<?php } ?>
					<div class="info">
						<?php if (get_theme_mod( 'rendition_service1_title' )) { ?>
						<h3 class="title"><?php echo $rendition_serv1_title ?></h3>
						<?php } else { ?>
						<h3 class="title"><?php printf( __( 'Made with Bootstrap', 'rendition' ) ); ?></h3>
						<?php } ?>
						
						<?php if (get_theme_mod( 'rendition_service1_text' )) { ?>
						<p><?php echo $rendition_serv1_text ?></p>
						<?php } else { ?>
						<p>
							<?php printf( __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lobortis nisl, vitae iaculis sapien. Phasellus ultrices gravida massa luctus ornare. Suspendisse blandit quam elit, eu imperdiet neque semper.', 'rendition' ) ); ?>
						</p>
						<?php } ?>
						<div class="more">
							<?php if (get_theme_mod( 'rendition_service1_url' )) { ?>
							<a href="<?php echo $rendition_serv1_url ?>" title="<?php echo $rendition_serv1_title ?>">
								<?php printf( __( 'Read More', 'rendition' ) ); ?> <i class="fa fa-angle-double-right"></i>
							</a>
							<?php } else { ?>
							<a href="#" title="Service Title Link">
								<?php printf( __( 'Read More', 'rendition' ) ); ?> <i class="fa fa-angle-double-right"></i>
							</a>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>
			
        <div class="col-sm-4 col-sm-6 col-xs-12">
			<div class="box">							
				<div class="icon">
					<?php if (get_theme_mod( 'rendition_service2_icon' )) { ?>
					<div class="image"><i class="fa fa-<?php echo $rendition_serv2_icon ?>"></i></div>
					<?php } else { ?>
					<div class="image"><i class="fa fa-flag"></i></div>
					<?php } ?>
					
					<div class="info">
						<?php if (get_theme_mod( 'rendition_service2_title' )) { ?>
						<h3 class="title"><?php echo $rendition_serv2_title ?></h3>
						<?php } else { ?>
						<h3 class="title"><?php printf( __( 'Icons by Font Awesome', 'rendition' ) ); ?></h3>
						<?php } ?>
						
    					<?php if (get_theme_mod( 'rendition_service2_text' )) { ?>
						<p><?php echo $rendition_serv2_text ?></p>
						<?php } else { ?>
						<p>
							<?php printf( __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lobortis nisl, vitae iaculis sapien. Phasellus ultrices gravida massa luctus ornare. Suspendisse blandit quam elit, eu imperdiet neque semper.', 'rendition' ) ); ?>
						</p>
						<?php } ?>
						<div class="more">
							<?php if (get_theme_mod( 'rendition_service2_url' )) { ?>
							<a href="<?php echo $rendition_serv2_url ?>" title="<?php echo $rendition_serv2_title ?>">
								<?php printf( __( 'Read More', 'rendition' ) ); ?> <i class="fa fa-angle-double-right"></i>
							</a>
							<?php } else { ?>
							<a href="#" title="Service Title Link">
								<?php printf( __( 'Read More', 'rendition' ) ); ?> <i class="fa fa-angle-double-right"></i>
							</a>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>
			
        <div class="col-sm-4 col-sm-6 col-xs-12">
			<div class="box">							
				<div class="icon">
					<?php if (get_theme_mod( 'rendition_service3_icon' )) { ?>
					<div class="image"><i class="fa fa-<?php echo $rendition_serv3_icon ?>"></i></div>
					<?php } else { ?>
					<div class="image"><i class="fa fa-desktop"></i></div>
					<?php } ?>
					
					<div class="info">
						<?php if (get_theme_mod( 'rendition_service3_title' )) { ?>
						<h3 class="title"><?php echo $rendition_serv3_title ?></h3>
						<?php } else { ?>
						<h3 class="title"><?php printf( __( 'Mobile First & Desktop Friendly', 'rendition' ) ); ?></h3>
						<?php } ?>
						
    					<?php if (get_theme_mod( 'rendition_service3_text' )) { ?>
						<p><?php echo $rendition_serv3_text ?></p>
						<?php } else { ?>
						<p>
							<?php printf( __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lobortis nisl, vitae iaculis sapien. Phasellus ultrices gravida massa luctus ornare. Suspendisse blandit quam elit, eu imperdiet neque semper.', 'rendition' ) ); ?>
						</p>
						<?php } ?>
						<div class="more">
							<?php if (get_theme_mod( 'rendition_service3_url' )) { ?>							
							<a href="<?php echo $rendition_serv3_url ?>" title="<?php echo $rendition_serv3_title ?>">
								<?php printf( __( 'Read More', 'rendition' ) ); ?> <i class="fa fa-angle-double-right"></i>
							</a>
							<?php } else { ?>
							<a href="#" title="Service Title Link">
								<?php printf( __( 'Read More', 'rendition' ) ); ?> <i class="fa fa-angle-double-right"></i>
							</a>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>		    
		<!-- /Service Boxes -->
	</div>
</div>	