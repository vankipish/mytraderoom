<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
<head>
    <style>
    ul.sub {
        padding-left: 20px;
    }
    

    .chbx{
        width:15px; height:15px;
        display: inline;
        padding:8px 3px;
        background-repeat:no-repeat;
        cursor: pointer;
    }
    .chbx span{
        width:15px; height:15px;
        display: inline-block;
        border:solid 1px #bababa;
        border-radius:2px;
        -moz-border-radius:2px;
        -webkit-border-radius:2px;
    }
    .chbx.checked{
        background-image:url('<?php echo osc_current_web_theme_url('images/checkmark.png'); ?>');
    }
    .chbx.semi-checked{
        background-image:url('<?php echo osc_current_web_theme_url('images/checkmark-partial.png'); ?>');
    }
</style>

<?php
    /*
     *      Osclass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2014 OSCLASS
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */


// meta tag robots
    if( osc_count_items() == 0 || stripos($_SERVER['REQUEST_URI'], 'search') ) {
        osc_add_hook('header','osclasswizards_nofollow_construct');
    } else {
        osc_add_hook('header','osclasswizards_follow_construct');
    }

    osclasswizards_add_body_class('category');

	if(osclasswizards_show_as() == 'gallery'){
        $loop_template	=	'loop-search-grid.php';
		$listClass = 'listing-grid';
        $buttonClass = 'active';
    }else{
		$loop_template	=	'loop-search-list.php';
		$listClass = '';
		$buttonClass = '';
	}

    osc_add_hook('before-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('search-sidebar.php');
    }
    osc_add_hook('footer','autocompleteCity');
    function autocompleteCity(){ ?>
        
<script type="text/javascript">
    $(function() {
                    function log( message ) {
                        $( "<div/>" ).text( message ).prependTo( "#log" );
                        $( "#log" ).attr( "scrollTop", 0 );
                    }

                    $( "#sCity" ).autocomplete({
                        source: "<?php echo osc_base_url(true); ?>?page=ajax&action=location",
                        minLength: 2,
                        select: function( event, ui ) {
                            $("#sRegion").attr("value", ui.item.region);
                            log( ui.item ?
                                "<?php echo osc_esc_html( __('Selected', OSCLASSWIZARDS_THEME_FOLDER) ); ?>: " + ui.item.value + " aka " + ui.item.id :
                                "<?php echo osc_esc_html( __('Nothing selected, input was', OSCLASSWIZARDS_THEME_FOLDER) ); ?> " + this.value );
                        }
                    });
                });
    </script>
<?php
    }
?>
<?php osc_current_web_theme_path('header.php') ; ?>
    </head>
<body>

<div class="row">
  <?php osc_current_web_theme_path('search-sidebar.php') ; ?>
  <div class="col-sm-8 col-md-9">
      <div class="ad_list">
      <div class="title">
      <h1><?php echo (search_title() != "")? search_title() : '&nbsp;'; ?></h1>
    </div>
    <div class="toolbar">
      <div class="sorting"> <a href="<?php echo osc_esc_html(osc_update_search_url(array('sShowAs'=> 'list'))); ?>" class="list-button <?php if(osclasswizards_show_as()=='list')echo "active"; ?>" data-class-toggle="listing-grid" data-destination="#listing-card-list"><span> <i class="fa fa-th-list"></i> </span></a> <a href="<?php echo osc_esc_html(osc_update_search_url(array('sShowAs'=> 'gallery'))); ?>" class="grid-button <?php if(osclasswizards_show_as()=='gallery')echo "active"; ?>" data-class-toggle="listing-grid" data-destination="#listing-card-list"><span> <i class="fa fa-th-large"></i> </span></a> </div>
      <?php osc_run_hook('search_ads_listing_top'); ?>
      <?php if(osc_count_items() == 0) { ?>
      <p class="empty" ><?php printf(__('There are no results matching "%s"', OSCLASSWIZARDS_THEME_FOLDER), osc_search_pattern()) ; ?></p>
      <?php } else { ?>
      <span class="counter-search">
      <?php
                $search_number = osclasswizards_search_number();
                printf(__('%1$d - %2$d of %3$d listings', OSCLASSWIZARDS_THEME_FOLDER), $search_number['from'], $search_number['to'], $search_number['of']);
            ?>
      </span>
      <div class="sort"> <p class="see_by">
              Сортировать по:
              <?php $i = 0; ?>
              <?php $orders = osc_list_orders();
              foreach($orders as $label => $params) {
                  $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1'; ?>
                  <?php if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) { ?>
                      <a class="current" href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a>
                  <?php } else { ?>
                      <a href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a>
                  <?php } ?>
                  <?php if ($i != count($orders)-1) { ?>
                      <span>|</span>
                  <?php } ?>
                  <?php $i++; ?>
              <?php } ?>
          </p> </div>
      <?php } ?>
    </div>   <!-- вроде премиум объявл-->
    <?php if( osc_get_preference('search-results-top-728x90', 'osclasswizards_theme') != ""){ ?>
    <div class="ads_search_top"> <?php echo osc_get_preference('search-results-top-728x90', 'osclasswizards_theme'); ?></div>
    <?php } ?>
    <?php
            $i = 0;
            osc_get_premiums(osclasswizards_premium_listings_shown());
            if(osc_count_premiums() > 0) {
            echo '<h5 class="title">'.__('Premium listings',OSCLASSWIZARDS_THEME_FOLDER).'</h5>';
			?>
    <?php

            View::newInstance()->_exportVariableToView("listType", 'premiums');
            View::newInstance()->_exportVariableToView("listClass",$listClass.' premium-list');
            osc_current_web_theme_path($loop_template);
            }
        ?>
    <?php if( osc_get_preference('search-results-top-728x90', 'osclasswizards_theme') != ""){ ?>
    <div class="ads_search_top"> <?php echo osc_get_preference('search-results-top-728x90', 'osclasswizards_theme'); ?></div>
    <?php } ?>
    <?php if(osc_count_items() > 0) {
        echo '<h5 class="title titles">'.__('Listings',OSCLASSWIZARDS_THEME_FOLDER).'</h5>';
		?>
    <?php
        View::newInstance()->_exportVariableToView("listType", 'items');
        View::newInstance()->_exportVariableToView("listClass",$listClass);
            osc_current_web_theme_path($loop_template);
    ?>
    <?php
      if(osc_rewrite_enabled()){
      $footerLinks = osc_search_footer_links();
      if(count($footerLinks)>0) {
      ?>
    <div id="related-searches">
      <h5>
        <?php _e('Other searches that may interest you',OSCLASSWIZARDS_THEME_FOLDER); ?>
      </h5>
      <ul class="footer-links">
        <?php foreach($footerLinks as $f) { View::newInstance()->_exportVariableToView('footer_link', $f); ?>
        <?php if($f['total'] < 3) continue; ?>
        <li><a href="<?php echo osc_footer_link_url(); ?>"><?php echo osc_footer_link_title(); ?></a></li>
        <?php } ?>
      </ul>
    </div>
    <?php }
      } ?>
    <div class="pagination"><?php echo osc_search_pagination(); ?> </div>
    <?php } ?>
    <?php if( osc_get_preference('search-results-middle-728x90', 'osclasswizards_theme') != "" ){ ?>
    <div class="ads_search_bottom"> <?php echo osc_get_preference('search-results-middle-728x90', 'osclasswizards_theme'); ?></div>
    <?php } ?>
  </div>
  </div>
</div>
<?php //osc_current_web_theme_path('footer.php') ; ?>
</body>
</html>
