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
     $category = __get("category");
     if(!isset($category['pk_i_id']) ) {
         $category['pk_i_id'] = null;
     }

?>

<div class="col-sm-4 col-md-3">
  <div id="sidebar">
    <div class="filters">
      <form action="<?php echo osc_base_url(true); ?>" method="get" onsubmit="return doSearch()" class="nocsrf">
        <input type="hidden" name="page" value="search" />
        <input type="hidden" name="sOrder" value="<?php echo osc_esc_html(osc_search_order()); ?>" />
        <input type="hidden" name="iOrderType" value="<?php $allowedTypesForSorting = Search::getAllowedTypesForSorting(); echo osc_esc_html($allowedTypesForSorting[osc_search_order_type()]); ?>" />
        <?php foreach(osc_search_user() as $userId) { ?>
          <input type="hidden" name="sUser[]" value="<?php echo osc_esc_html($userId); ?>" />
        <?php } ?>
        <fieldset class="box location">
          <h3><strong><?php _e('Your search', 'modern'); ?></strong></h3>
          <div class="row one_input">
            <input type="text" name="sPattern" id="query" value="<?php echo osc_esc_html( osc_search_pattern() ); ?>" />
            <div id="search-example"></div>
          </div>
          <h3><strong><?php _e('Location', 'modern'); ?></strong></h3>
          <div class="row one_input">
            <h6><?php _e('City', 'modern'); ?></h6>
            <input type="text" id="sCity" name="sCity" value="<?php echo osc_esc_html( osc_search_city() ); ?>" />
            <input type="hidden" id="sRegion" name="sRegion" value="" />
          </div>
        </fieldset>

        <fieldset class="box show_only">
          <?php if( osc_images_enabled_at_items() ) { ?>
            <h3><strong><?php _e('Show only', 'modern'); ?></strong></h3>
            <div class="row checkboxes">
              <ul>
                <li>
                  <input type="checkbox" name="bPic" id="withPicture" value="1" <?php echo (osc_search_has_pic() ? 'checked="checked"' : ''); ?> />
                  <label for="withPicture"><?php _e('Show only listings with pictures', 'modern'); ?></label>
                </li>
              </ul>
            </div>
          <?php } ?>
          <?php if( osc_price_enabled_at_items() ) { ?>
            <div class="row two_input">
              <h6><?php _e('Price', 'modern'); ?></h6>
              <div><?php _e('Min', 'modern'); ?>.</div>
              <input type="text" id="priceMin" name="sPriceMin" value="<?php echo osc_esc_html(osc_search_price_min()); ?>" size="6" maxlength="6" />
              <div><?php _e('Max', 'modern'); ?>.</div>
              <input type="text" id="priceMax" name="sPriceMax" value="<?php echo osc_esc_html(osc_search_price_max()); ?>" size="6" maxlength="6" />
            </div>
          <?php } ?>
          <?php  osc_get_non_empty_categories(); ?>
          <?php  if ( osc_count_categories() ) { ?>
            <div class="row checkboxes">
              <h6><?php _e('Category', 'modern'); ?></h6>
              <ul>
                <?php // RESET CATEGORIES IF WE USED THEN IN THE HEADER ?>
                <?php osc_goto_first_category(); ?>
                <?php while(osc_has_categories()) { ?>
                  <li class="parent">
                    <input class="parent" type="checkbox" id="cat<?php echo osc_esc_html(osc_category_id()); ?>" name="sCategory[]" value="<?php echo osc_esc_html(osc_category_id()); ?>" <?php $parentSelected=false; if (in_array(osc_category_id(), osc_search_category()) || in_array(osc_category_slug()."/", osc_search_category()) || in_array(osc_category_slug(), osc_search_category()) || count(osc_search_category())==0 ){ echo 'checked="checked"'; $parentSelected=true;} ?> /> <label for="cat<?php echo osc_esc_html(osc_category_id()); ?>"><strong><?php echo osc_category_name(); ?></strong></label>
                    <?php if(osc_count_subcategories() > 0) { ?>
                      <ul class="sub">
                        <?php while(osc_has_subcategories()) { ?>
                          <li>
                            <input type="checkbox" id="cat<?php echo osc_esc_html(osc_category_id()); ?>" name="sCategory[]" value="<?php echo osc_esc_html(osc_category_id()); ?>"  <?php if( $parentSelected || in_array(osc_category_id(), osc_search_category()) || in_array(osc_category_slug()."/", osc_search_category()) || in_array(osc_category_slug(), osc_search_category()) || count(osc_search_category())==0 ){echo 'checked="checked"';} ?> />
                            <label for="cat<?php echo osc_esc_html(osc_category_id()); ?>"><strong><?php echo osc_category_name(); ?></strong></label>
                          </li>
                        <?php } ?>
                      </ul>
                    <?php } ?>
                  </li>
                <?php } ?>
              </ul>
            </div>
          <?php } osclasswizards_footer_js() ?> <!-- подключаю ihelper, который сидит в хуке footer-->
        </fieldset>
        <?php
        if(osc_search_category_id()) {
          osc_run_hook('search_form', osc_search_category_id());
        } else {
          osc_run_hook('search_form');
        }
        ?>
        <button type="submit"><?php _e('Apply', 'modern'); ?></button>
      </form>
      <?php osc_alert_form(); ?>
    </div>
  </div>
</div>
