<?php 

$rendition_tab1_icon     = esc_html(get_theme_mod( 'rendition_tab1_icon' ));
$rendition_tab2_icon     = esc_html(get_theme_mod( 'rendition_tab2_icon' ));
$rendition_tab3_icon     = esc_html(get_theme_mod( 'rendition_tab3_icon' ));
$rendition_tab4_icon     = esc_html(get_theme_mod( 'rendition_tab4_icon' ));
$rendition_tab5_icon     = esc_html(get_theme_mod( 'rendition_tab5_icon' ));

$rendition_tab1_tooltip  = esc_html(get_theme_mod( 'rendition_tab1_tooltip' ));
$rendition_tab2_tooltip  = esc_html(get_theme_mod( 'rendition_tab2_tooltip' ));
$rendition_tab3_tooltip  = esc_html(get_theme_mod( 'rendition_tab3_tooltip' ));
$rendition_tab4_tooltip  = esc_html(get_theme_mod( 'rendition_tab4_tooltip' ));
$rendition_tab5_tooltip  = esc_html(get_theme_mod( 'rendition_tab5_tooltip' ));

$rendition_tab1_url      = esc_url(get_theme_mod( 'rendition_tab1_url' ));
$rendition_tab2_url      = esc_url(get_theme_mod( 'rendition_tab2_url' ));
$rendition_tab3_url      = esc_url(get_theme_mod( 'rendition_tab3_url' ));
$rendition_tab4_url      = esc_url(get_theme_mod( 'rendition_tab4_url' ));
$rendition_tab5_url      = esc_url(get_theme_mod( 'rendition_tab5_url' ));

$rendition_tab1_title    = esc_html(get_theme_mod( 'rendition_tab1_title' ));
$rendition_tab2_title    = esc_html(get_theme_mod( 'rendition_tab2_title' ));
$rendition_tab3_title    = esc_html(get_theme_mod( 'rendition_tab3_title' ));
$rendition_tab4_title    = esc_html(get_theme_mod( 'rendition_tab4_title' ));
$rendition_tab5_title    = esc_html(get_theme_mod( 'rendition_tab5_title' ));

$rendition_tab1_text     = esc_html(get_theme_mod( 'rendition_tab1_text' ));
$rendition_tab2_text     = esc_html(get_theme_mod( 'rendition_tab2_text' ));
$rendition_tab3_text     = esc_html(get_theme_mod( 'rendition_tab3_text' ));
$rendition_tab4_text     = esc_html(get_theme_mod( 'rendition_tab4_text' ));
$rendition_tab5_text     = esc_html(get_theme_mod( 'rendition_tab5_text' ));

$rendition_tab1_btext    = esc_html(get_theme_mod( 'rendition_tab1_button_text' ));
$rendition_tab2_btext    = esc_html(get_theme_mod( 'rendition_tab2_button_text' ));
$rendition_tab3_btext    = esc_html(get_theme_mod( 'rendition_tab3_button_text' ));
$rendition_tab4_btext    = esc_html(get_theme_mod( 'rendition_tab4_button_text' ));
$rendition_tab5_btext    = esc_html(get_theme_mod( 'rendition_tab5_button_text' ));

$rendition_tab4_email    = esc_html(get_theme_mod( 'rendition_tab4_email_address' ));
$rendition_tab4_landline = esc_html(get_theme_mod( 'rendition_tab4_landline_number' ));
$rendition_tab4_mobile   = esc_html(get_theme_mod( 'rendition_tab4_mobile_number' ));


?>

<div class="row">
       <div class="board">
           <div class="board-inner">
               <div class="row text-center">
			   <ul class="nav nav-tabs" id="myTab">				  
				  
				  <li class="col-sm-2 active">
                     <?php if (get_theme_mod( 'rendition_tab1_tooltip' )) { ?>
					      <a href="#home" data-toggle="tab" title="<?php echo $rendition_tab1_tooltip ?>">
					 <?php } else { ?>
					      <a href="#home" data-toggle="tab" title="Welcome">
					 <?php } ?>
                      <span class="round-tabs one">
                           <?php if (get_theme_mod( 'rendition_tab1_icon' )) { ?>
						        <i class="fa fa-<?php echo $rendition_tab1_icon ?>"></i>
						   <?php } else { ?>
						        <i class="fa fa-home"></i>
						   <?php } ?>
                      </span> 
                     </a>
				  </li>
				  
				  
				  <li class="col-sm-2">
				     <?php if (get_theme_mod( 'rendition_tab2_tooltip' )) { ?>
					      <a href="#profile" data-toggle="tab" title="<?php echo $rendition_tab2_title ?>">
					 <?php } else { ?>
					      <a href="#profile" data-toggle="tab" title="Profile">
					 <?php } ?>
                     <span class="round-tabs two">
                          <?php if (get_theme_mod( 'rendition_tab2_icon' )) { ?>
						       <i class="fa fa-<?php echo $rendition_tab2_icon ?>"></i>
						  <?php } else { ?>
						       <i class="fa fa-user"></i>
						  <?php } ?>
                     </span> 
                     </a>
				  </li>
				 
                  <li class="col-sm-2">
				     <?php if (get_theme_mod( 'rendition_tab3_tooltip' )) { ?>
					      <a href="#messages" data-toggle="tab" title="<?php echo $rendition_tab3_title ?>">
					 <?php } else { ?>
					      <a href="#messages" data-toggle="tab" title="Downloads">
					 <?php } ?>
                     <span class="round-tabs three">
                          <?php if (get_theme_mod( 'rendition_tab3_icon' )) { ?>
						       <i class="fa fa-<?php echo $rendition_tab3_icon ?>"></i>
						  <?php } else { ?>
						       <i class="fa fa-download"></i>
						  <?php } ?>
                     </span> 
					 </a>
                  </li>

                  <li class="col-sm-2">				      
					  <?php if (get_theme_mod( 'rendition_tab4_tooltip' )) { ?>
					       <a href="#settings" data-toggle="tab" title="<?php echo $rendition_tab4_title ?>">
					  <?php } else { ?>
					       <a href="#settings" data-toggle="tab" title="Contact">
					  <?php } ?>
                         <span class="round-tabs four">
                              <?php if (get_theme_mod( 'rendition_tab4_icon' )) { ?>
						           <i class="fa fa-<?php echo $rendition_tab4_icon ?>"></i>
						      <?php } else { ?>
							       <i class="fa fa-envelope-o"></i>
							  <?php } ?>
                         </span> 
                      </a>
				  </li>

                  <li class="col-sm-2">
				     <?php if (get_theme_mod( 'rendition_tab5_tooltip' )) { ?>
					       <a href="#done" data-toggle="tab" title="<?php echo $rendition_tab5_title ?>">
					 <?php } else { ?>
					       <a href="#done" data-toggle="tab" title="Information">
					 <?php } ?>
                         <span class="round-tabs five">
                              <?php if (get_theme_mod( 'rendition_tab5_icon' )) { ?>
						           <i class="fa fa-<?php echo $rendition_tab5_icon ?>"></i>
						      <?php } else { ?>
							       <i class="fa fa-info"></i>
							  <?php } ?>
                         </span> 
                      </a>
				 </li>
                     
               </ul>
			   </div>

               <div class="tab-content">
                     <div class="tab-pane active" id="home">
                          <?php if (get_theme_mod( 'rendition_tab1_title' )) { ?>
						       <h3 class="head text-center"><?php echo $rendition_tab1_title ?></h3>
						  <?php } else { ?>
						       <h3 class="head text-center"><?php printf( __('Welcome to', 'rendition' ));?> <?php bloginfo( 'name' ); ?><sup>™</sup> <span style="color:#f48260;">♥</span></h3>
                          <?php } ?>
						  <?php if (get_theme_mod( 'rendition_tab1_text' )) { ?>
						  <p class="narrow text-center">
                              <?php echo $rendition_tab1_text ?>
                          </p>
						  <?php } else { ?>
						  <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                          </p>
						  <?php } ?>
                          <?php if (get_theme_mod( 'rendition_tab1_url') || get_theme_mod( 'rendition_tab1_button_text')) { ?>
                          <p class="text-center">
                              <a href="<?php echo $rendition_tab1_url ?>" class="btn btn-success btn-outline-rounded blue"> <?php echo $rendition_tab1_btext ?> <span style="margin-left:10px;" class="fa fa-unlock"></span></a>
                          </p>
						  <?php } else { ?>
						  <p class="text-center">
                              <a href="#" class="btn btn-success btn-outline-rounded blue"> <?php printf( __('Read More About Us', 'rendition' )); ?> <span style="margin-left:10px;" class="fa fa-unlock"></span></a>
                          </p>
						  <?php } ?>
                      </div>
					  
                      <div class="tab-pane" id="profile">
                          <?php if (get_theme_mod( 'rendition_tab2_title')) { ?>
						       <h3 class="head text-center"><?php echo $rendition_tab2_title ?></h3>
						  <?php } else { ?>
						       <h3 class="head text-center"><?php printf( __('Join', 'rendition' )); ?> <?php bloginfo( 'name' ); ?><sup>™</sup> <?php printf( __('Today', 'rendition' )); ?></h3>
                          <?php } ?>
						  <?php if (get_theme_mod( 'rendition_tab1_text')) { ?>
						  <p class="narrow text-center">
                              <?php echo $rendition_tab2_text ?>
                          </p>
						  <?php } else { ?>
						  <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                          </p>
						  <?php } ?>
                          
						  <?php if (get_theme_mod( 'rendition_tab2_url' ) || get_theme_mod( 'rendition_tab2_button_text')) { ?>
                          <p class="text-center">
                              <a href="<?php echo $rendition_tab2_url ?>" class="btn btn-success btn-outline-rounded green"> <?php echo $rendition_tab2_btext ?> <span style="margin-left:10px;" class="fa fa-unlock"></span></a>
                          </p>
                          <?php } else { ?>
                          <p class="text-center">
                              <a href="#" class="btn btn-success btn-outline-rounded green"> <?php printf( __('Create Your Account', 'rendition')); ?> <span style="margin-left:10px;" class="fa fa-unlock"></span></a>
                          </p>
                          <?php } ?>                          
                      </div>
					  
                      <div class="tab-pane" id="messages">
                          <?php if (get_theme_mod( 'rendition_tab3_title' )) { ?>
						       <h3 class="head text-center"><?php echo $rendition_tab3_title ?></h3>
						  <?php } else { ?>
						       <h3 class="head text-center"><?php printf( __('Access Downloads', 'rendition' )); ?></h3>
						  <?php } ?>
                          <?php if (get_theme_mod( 'rendition_tab3_text' )) { ?>
						  <p class="narrow text-center">
                              <?php echo $rendition_tab3_text ?>
                          </p>
                          <?php } else { ?>
						  <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                          </p>
						  <?php } ?>
						  <?php if (get_theme_mod( 'rendition_tab3_url' )) { ?>
                          <p class="text-center">
                               <a href="<?php echo $rendition_tab3_url ?>" class="btn btn-success btn-outline-rounded green"> <?php echo $rendition_tab3_btext ?> <span style="margin-left:10px;" class="fa fa-unlock"></span></a>
                          </p>
						  <?php } else { ?>
						  <p class="text-center">
                               <a href="#" class="btn btn-success btn-outline-rounded green"> <?php printf( __('Start Using Our Products', 'rendition' )); ?> <span style="margin-left:10px;" class="fa fa-unlock"></span></a>
                          </p>
						  <?php } ?>
                      </div>
					  
                      <div class="tab-pane" id="settings">
                          <?php if (get_theme_mod( 'rendition_tab4_title' )) { ?>
						       <h3 class="head text-center"><?php echo $rendition_tab4_title ?></h3>
						  <?php } else { ?>
						  <h3 class="head text-center"><?php printf( __('Get In touch', 'rendition' )); ?></h3>
						  <?php } ?>
						  <?php if (get_theme_mod( 'rendition_tab4_text' )) { ?>
						  <p class="narrow text-center">
                              <?php echo $rendition_tab4_text ?>
                          </p>
						  <?php } else { ?>
						  <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                          </p>
						  <?php } ?>
						  
                          <p class="narrow text-center">
                             <?php if (get_theme_mod( 'rendition_tab4_email_address' )) { ?>
							 <h3><i class="fa fa-envelope"></i> <?php echo $rendition_tab4_email ?></h3>
							 <?php } else { ?>
							 <h3><i class="fa fa-envelope"></i> info@website.com</h3>
							 <?php } ?>
							 <?php if (get_theme_mod( 'rendition_tab4_landline_number' ) || get_theme_mod( 'rendition_tab4_mobile_number' )) { ?>
                             <h4><i class="fa fa-phone-square"></i> <?php echo $rendition_tab4_landline ?> | <i class="fa fa-mobile"></i> <?php echo $rendition_tab4_mobile ?></h4>
                             <?php } else { ?>
                             <h4><i class="fa fa-phone-square"></i> +123 456 7890 | <i class="fa fa-mobile"></i> +123 456 7890</h4>
                             <?php } ?>							 
						  </p>
                      </div>
					  
                      <div class="tab-pane" id="done">
                          <?php if (get_theme_mod( 'rendition_tab5_title' )) { ?>
						       <h3 class="head text-center"><?php echo $rendition_tab5_title ?></h3>
						  <?php } else { ?>
						  <h3 class="head text-center"><?php printf( __('Thanks for staying tuned!', 'rendition' )); ?> <span style="color:#f48260;">♥</span></h3>
                          <?php } ?>
						  <?php if (get_theme_mod( 'rendition_tab5_text' )) { ?>
						  <p class="narrow text-center">
                              <?php echo $rendition_tab5_text ?>
                          </p>
						  <?php } else { ?>
						  <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                          </p>
						  <?php } ?>
                          <?php if (get_theme_mod( 'rendition_tab5_url' ) || get_theme_mod( 'rendition_tab5_button_text') ) { ?>
                          <p class="text-center">
                              <a href="<?php echo $rendition_tab5_url ?>" class="btn btn-success btn-outline-rounded green"> <?php echo $rendition_tab5_btext ?> <span style="margin-left:10px;" class="fa fa-unlock"></span></a>
                          </p>
						  <?php } else { ?>
						  <p class="text-center">
                              <a href="" class="btn btn-success btn-outline-rounded green"> <?php printf( __('Join Us Today!', 'rendition' )) ; ?> <span style="margin-left:10px;" class="fa fa-unlock"></span></a>
                          </p>
						  <?php } ?>
                      </div>
					  
                  </div>

             </div>
        </div>
</div>