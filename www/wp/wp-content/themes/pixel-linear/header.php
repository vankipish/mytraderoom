<?php
/**
 * Header Template
 * @file           header.php
 * @package        Pixel-Linear 
 * @author         Pixel Theme Studio 
 * @copyright      2014 - 2015 Pixel Theme Studio Themes
 * @license        license.txt
 * @version        Release: 1.0.0
 * @link           http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29
 * @since          available since Release 1.0
 */
?>
<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<title><?php wp_title('&#124;', true, 'right'); ?></title>
<?php if( pts_get_data('custom_favicon') !== '' ) : ?>
        <link rel="icon" type="image/png" href="<?php echo pts_get_data('custom_favicon'); ?>" />
    <?php endif; ?>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php get_template_directory_uri();?>/js/html5shiv.js"></script>
      <script src="<?php get_template_directory_uri();?>/js/respond.min.js"></script>
    <![endif]-->

<!-- include fonts -->
<?php if( pts_get_data('custom_body_family') != 'Select Font' ) { ?>
	<link rel='stylesheet'  href='//fonts.googleapis.com/css?family=<?php echo pts_get_data('custom_body_family'); ?>%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.1' type='text/css' media='all' />
<?php } ?>
<?php if( pts_get_data('custom_heading_family') != 'Select Font' ) { ?>
	<link rel='stylesheet'  href='//fonts.googleapis.com/css?family=<?php echo pts_get_data('custom_heading_family'); ?>%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.1' type='text/css' media='all' />
<?php } ?>
<?php if( pts_get_data('custom_footer_family') != 'Select Font' ) { ?>
	<link rel='stylesheet'  href='//fonts.googleapis.com/css?family=<?php echo pts_get_data('custom_footer_family'); ?>%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.1' type='text/css' media='all' />
<?php } ?>



<?php wp_head(); ?> 


<!-- theme options css -->
<style type="text/css">
<?php if( pts_get_data('custom_main_layout') == 'Boxed' ) { ?>
body{ 
	max-width:1200px; margin-left:auto; margin-right:auto;
}
<?php } ?>


</style>


</head>

<body <?php body_class(); ?>>
          
<?php pixlin_container(); // before container hook ?>

         
    <?php pixlin_header(); // before header hook ?>
    <header>
   
    <?php pixlin_in_header(); // header hook ?>

<nav role="navigation">
    <div class="navbar navbar-inverse navbar-static-top">
        <div class="container">
           <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
           <div class="row">
           <div class="col-sm-12">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <?php if( pts_get_data('custom_logo') != '' ) { ?>
            <div id="logo"><a href="<?php echo home_url(); ?>/" title="<?php bloginfo( 'name' ); ?>" rel="home">
                <img src="<?php echo pts_get_data('custom_logo'); ?>" alt="<?php bloginfo( 'name' ) ?>" />
            </a></div>
            <?php } else { ?>
			<a href="<?php echo home_url(); ?>">
            <?php _e("<h2>Pixel Linear</h2>","pixlin");?>
			</a>
            <?php  } ?>
        </div>
          <div class="navbar-collapse collapse navbar-responsive-collapse">
			   <?php
			   $top_nav = get_nav_menu_locations();
	  		   if(!empty($top_nav['top-bar'])){
				  $args = array(
					  'theme_location' => 'top-bar',
					  'depth'      => 3,
					  'container'  => false,
					  'menu_class'     => 'nav navbar-nav navbar-right',
					  'walker'     => new Bootstrap_Walker_Nav_Menu()
				  );
  
				  wp_nav_menu($args);
				}
            ?>

          </div>
          </div>
          </div><!-- //row -->
        </div>
     </div>           
</nav>
<div id="top-search">
<div class="container">
	<div class="row">
    	<?php
			$sr_class= "col-sm-4 col-sm-offset-8";
            $sec_nav = get_nav_menu_locations();
	  		if(!empty($sec_nav['secondary-nav-bar'])){ ?>
    		<div class="col-sm-8">
        	<?php
        	
                $args_snav = array(
                    'theme_location' => 'secondary-nav-bar',
                    'depth'      => 3,
                    'container'  => false,
                    'menu_class'     => 'nav navbar-nav navbar-left',
                    'walker'     => new Bootstrap_Walker_Nav_Menu()
                );
                wp_nav_menu($args_snav);
				$sr_class= "col-sm-4";
			?></div>
			<?php } ?>
        
    	<div class="<?php echo $sr_class; ?>">
        	<form role="search" method="get" id="searchform" class="input-group" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input class="form-control" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search for...">
                <span class="input-group-btn">
                    <input class="btn btn-default fa fa-input" type="submit"  id="searchsubmit" value="<?php echo esc_attr_x( '&#xf002;', 'submit button' ); ?>" />
              	</span>
            </form><!-- /input-group -->
            
        </div>
    </div>
</div>
</div> <!-- search end -->
           
 
    </header><!-- end of header -->
    
    <?php
	global $post;
	$enable_disable_slider = get_post_meta( $post->ID, '_cmb_enable_disable_slider', true );
	?>
    
    <?php if( pts_get_data('enable_disable_slider') == '1' || $enable_disable_slider == 'on'  ) { $pixslider = pts_get_data('custom_slider'); ?>
    <!-- slider -->
    <section id="pixi-slider" class="carousel slide">
            <!-- Indicators -->
				<?php if(sizeof($pixslider)>1){ ?>
            <ol class="carousel-indicators">
                <?php for($sCnt=0; $sCnt < sizeof($pixslider);  $sCnt++){ ?>
                	<li data-target="#pixi-slider" data-slide-to="<?php echo $sCnt; ?>" <?php if($sCnt==0){?> class="active" <?php } ?> ></li>
                <?php }?>
            </ol>
    <?php  } ?>
            <!-- Wrapper for Slides -->
			
             <div class="carousel-inner">
                <?php $iCnt=0; foreach( $pixslider as $slide ) { 
				 if($iCnt=='0'){ $addAct = "active"; }else{$addAct = "";}
				 if($slide['link']!=""){
                    echo (
                        "  <div class='item ". $addAct ."'>
                        	<a href='". $slide['link'] ."' target='_blank'><div class='fill' style='background-image:url(". $slide['url'] .");'></div>
                        	<div class='carousel-caption'>
								<h1>".$slide['title']."</h1>
                            	<p>".$slide['description']."</p>
                        	</div>
							</a>
                    	</div> "
                    );
					}else{
					 echo (
                        "<div class='item ". $addAct ."'>
                        	<div class='fill' style='background-image:url(". $slide['url'] .");'></div>
                        	<div class='carousel-caption'>
                            	<p>".$slide['description']."</p>
                        	</div>
                    	</div>"
                    );
					
					}
                $iCnt++; }?>
            </div>
			
    
            <!-- Controls -->
			<script language="">
			/*
			//jQuery( document ).ready(function($) {
            //alert( "ready!" );
			//$( ".icon-prev" ).trigger( "click" );
			jQuery(window).on('load', function ($) {
			setTimeout(function() {
              $('.icon-next').trigger('click');
               }, 500);
             });
			*/
			</script>
			<?php if(sizeof($pixslider)>1){ ?>
            <a class="left carousel-control" href="#pixi-slider" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#pixi-slider" data-slide="next">
                <span class="icon-next"></span>
            </a>
			<?php } ?>
    </section>
    <!-- slider ends -->
    <?php } ?>
    


<?php if( pts_get_data('enable_disable_3box') == '1' && is_front_page() ) { ?>
<!-- Three Box -->
<div id="box-wrap">
	<div class="container">
    	<div class="row pt"> 
        	<div class="col-sm-4 centered">
            	<?php dynamic_sidebar('box-1'); ?>
            </div>
            <div class="col-sm-4 centered">
            	<?php dynamic_sidebar('box-2'); ?>
            </div>
            <div class="col-sm-4 centered">
            	<?php dynamic_sidebar('box-3'); ?>
            </div>
        </div>
    </div>
</div>
<!-- Three Box End -->
 <?php } ?>
    


<?php pixlin_header_end(); // after header hook ?>


    <?php pixlin_header_end(); // after header hook ?>
    
	<?php pixlin_wrapper(); // before wrapper ?>
    
        <div id="wrapper" class="clearfix">
    
    <?php pixlin_in_wrapper(); // wrapper hook ?>
