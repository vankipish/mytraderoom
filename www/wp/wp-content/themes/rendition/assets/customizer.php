<?php
/**
 * rendition Theme Customizer
 *
 * @package rendition
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rendition_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// Rename the label to "Site Title & Tagline" To be extra clear of the options.
	$wp_customize->get_section( 'title_tagline' )->title = __( 'Site Title{logo} & Tagline', 'rendition' );
	// Rename the label to "Site Title Color" because this only affects the site title in this theme.
	$wp_customize->get_control( 'blogdescription' )->label = __( 'Site Description - Tagline', 'rendition' );

	// Rename the label to "Display Site Title & Tagline" in order to make this option extra clear.
	$wp_customize->get_control( 'display_header_text' )->label = __( 'Display Site Title', 'rendition' );

	// Setting group for social icons
    $wp_customize->add_section( 'rendition_theme_notes' , array(
		'title'      => __('Rendition Theme Notes','rendition'),
		'description' => sprintf( __( 'Welcome & thank you for choosing Rendition as your site theme. In this section you\'ll find some helpful hints and tips to help you configure your site quickly and easily.
		<br/><br/> <b>Social Icons</b> are configurable via a custom menu. To set up your social profile visit the Appearance >><a href="%1$s"> Menu section</a>, enter your profile urls and add them to the "Social" Menu Location.
		<br/><br/><a href="%2$s" target="_blank" />View Theme Demo</a> | <a href="%3$s" target="_blank" />Get Theme Support</a> ', 'rendition' ), admin_url( '/nav-menus.php' ), esc_url('http://www.wpstrapcode.com/rendition/'), esc_url('http://wordpress.org/support/theme/rendition') ),
		'priority'   => 30,
    ) );
	
	$wp_customize->add_section( 'rendition_header_tabs_options' , array(
       'title'      => __('Rendition Tabs Options','rendition'),
	   'description' => sprintf( __( 'Use the following settings to control the Front tabs section. A list of the available icons can be found here: <a href="%1$s" target="_blank" />FontAwesome Cheatsheet</a> - You need only insert the name of the icon i.e. home instead of fa-home', 'rendition' ), esc_url('http://fortawesome.github.io/Font-Awesome/cheatsheet/') ),
       'priority'   => 32,
    ) );
	
	$wp_customize->add_section( 'rendition_services_options' , array(
       'title'      => __('Rendition Services Options','rendition'),
	   'description' => sprintf( __( 'Use the following settings to control the Service Boxes section.', 'rendition' )),
       'priority'   => 34,
    ) );
	
	$wp_customize->add_section( 'rendition_intro_options' , array(
       'title'      => __('Rendition CTA Options','rendition'),
	   'description' => sprintf( __( 'Use the following settings to control the Intro section.', 'rendition' )),
       'priority'   => 36,
    ) );
			
	$wp_customize->add_section( 'rendition_blogfeed_options' , array(
       'title'      => __('Rendition Blog Feed Options','rendition'),
	   'description' => sprintf( __( 'Use the following settings to set Frontpage/Blog home feed layout.', 'rendition' )),
       'priority'   => 38,
    ) );
		
	/**
       * Adds textarea support to the theme customizer
    */
    class Rendition_Customize_Textarea_Control extends WP_Customize_Control {
        public $type = 'textarea';
 
            public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
        }
    }
	
	$wp_customize->add_setting(
        'rendition_desc_visibility', array (
		'sanitize_callback' => 'rendition_sanitize_checkbox',
    ));

    $wp_customize->add_control(
        'rendition_desc_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Hide Site Description?', 'rendition'),
        'section'  => 'title_tagline',
		'priority' => 10,
        )
    );
	
	// Tabs Section Settings
	$wp_customize->add_setting(
        'rendition_tabs_visibility', array (
		'sanitize_callback' => 'rendition_sanitize_checkbox',
    ));

    $wp_customize->add_control(
        'rendition_tabs_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Hide the front page Tabs section?', 'rendition'),
        'section'  => 'rendition_header_tabs_options',
		'priority' => 1,
        )
    );
	
	$wp_customize->add_setting(
        'rendition_tabs_sitewide', array (
		'sanitize_callback' => 'rendition_sanitize_checkbox',
    ));

    $wp_customize->add_control(
        'rendition_tabs_sitewide',
    array(
        'type'     => 'checkbox',
        'label'    => __('Show Tabs section sitewide? Only if tabs are not hidden above!', 'rendition'),
        'section'  => 'rendition_header_tabs_options',
		'priority' => 2,
        )
    );
	
	// == Begin Tab One Section == //
	// Tab 1 tooltip
	$wp_customize->add_setting(
    'rendition_tab1_tooltip',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_tab1_tooltip',
    array(
        'label'     => __('Tab1 Title', 'rendition'),
        'section'   => 'rendition_header_tabs_options',
		'priority'  => 3,
        'type'      => 'text',
    ));
	
	// Tab1 Title
	$wp_customize->add_setting(
    'rendition_tab1_title',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_tab1_title',
    array(
        'label'     => __('Tab1 Title', 'rendition'),
        'section'   => 'rendition_header_tabs_options',
		'priority'  => 4,
        'type'      => 'text',
    ));
	
	// Tab1 Icon
	$wp_customize->add_setting(
    'rendition_tab1_icon',
    array(
        'default' => 'home',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_tab1_icon',
    array(
        'label'     => __('Tab1 Icon name', 'rendition'),
        'section'   => 'rendition_header_tabs_options',
		'priority'  => 5,
        'type'      => 'text',
    ));
	
	// Service1 Readmore
	$wp_customize->add_setting(
    'rendition_tab1_button_text',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_tab1_button_text',
    array(
        'label'     => __('Tab1 Button Text', 'rendition'),
        'section'   => 'rendition_header_tabs_options',
		'priority'  => 6,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting(
        'rendition_tab1_url',
    array(
        'default' => '',
		'sanitize_callback' => 'esc_url_raw'
    ));
	
	$wp_customize->add_control(
        'rendition_tab1_url',
    array(
        'label'    => __('Tab1 Readmore Link', 'rendition'),
        'section'  => 'rendition_header_tabs_options',
		'priority' => 7,
        'type'     => 'text',
    ));
		
	// Main text
	$wp_customize->add_setting( 
	    'rendition_tab1_text',
    array(
        'default' => '',
		'sanitize_callback' => 'rendition_sanitize_textarea'
    ));		

    $wp_customize->add_control(
        new Rendition_Customize_Textarea_Control(
            $wp_customize,
            'rendition_tab1_text',
        array(
            'label'    => 'Tab1 Text',
            'section'  => 'rendition_header_tabs_options',
			'priority' => 8,
            'settings' => 'rendition_tab1_text',
        )
        )
    );

	// Tab2
	$wp_customize->add_setting(
    'rendition_tab2_tooltip',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_tab2_tooltip',
    array(
        'label'     => __('Tab2 Title', 'rendition'),
        'section'   => 'rendition_header_tabs_options',
		'priority'  => 9,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting(
    'rendition_tab2_title',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_tab2_title',
    array(
        'label'     => __('Tab2 Title', 'rendition'),
        'section'   => 'rendition_header_tabs_options',
		'priority'  => 10,
        'type'      => 'text',
    ));
	
	// Tab2 Icon
	$wp_customize->add_setting(
    'rendition_tab2_icon',
    array(
        'default' => 'user',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_tab2_icon',
    array(
        'label'     => __('Tab2 Icon name', 'rendition'),
        'section'   => 'rendition_header_tabs_options',
		'priority'  => 11,
        'type'      => 'text',
    ));
	
	// Tab2 Readmore
	$wp_customize->add_setting(
    'rendition_tab2_button_text',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_tab2_button_text',
    array(
        'label'     => __('Tab2 Button Text', 'rendition'),
        'section'   => 'rendition_header_tabs_options',
		'priority'  => 12,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting(
        'rendition_tab2_url',
    array(
        'default' => '',
		'sanitize_callback' => 'esc_url_raw'
    ));
	
	$wp_customize->add_control(
        'rendition_tab2_url',
    array(
        'label'    => __('Tab2 Readmore Link', 'rendition'),
        'section'  => 'rendition_header_tabs_options',
		'priority' => 13,
        'type'     => 'text',
    ));
		
	$wp_customize->add_setting( 
	    'rendition_tab2_text',
    array(
        'default' => '',
		'sanitize_callback' => 'rendition_sanitize_textarea'
    ));		

    $wp_customize->add_control(
        new Rendition_Customize_Textarea_Control(
            $wp_customize,
            'rendition_tab2_text',
        array(
            'label'    => 'Tab2 Text',
            'section'  => 'rendition_header_tabs_options',
			'priority' => 14,
            'settings' => 'rendition_tab2_text',
        )
        )
    );

	// Tab3 
	$wp_customize->add_setting(
    'rendition_tab3_tooltip',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_tab3_tooltip',
    array(
        'label'     => __('Tab3 Title', 'rendition'),
        'section'   => 'rendition_header_tabs_options',
		'priority'  => 15,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting(
    'rendition_tab3_title',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_tab3_title',
    array(
        'label'     => __('Tab3 Title', 'rendition'),
        'section'   => 'rendition_header_tabs_options',
		'priority'  => 16,
        'type'      => 'text',
    ));
	
	// Tab3 Icon
	$wp_customize->add_setting(
    'rendition_tab3_icon',
    array(
        'default' => 'download',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_tab3_icon',
    array(
        'label'     => __('Tab3 Icon name', 'rendition'),
        'section'   => 'rendition_header_tabs_options',
		'priority'  => 17,
        'type'      => 'text',
    ));
	
	// Tab3 Readmore
	$wp_customize->add_setting(
    'rendition_tab3_button_text',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_tab3_button_text',
    array(
        'label'     => __('Tab3 Button Text', 'rendition'),
        'section'   => 'rendition_header_tabs_options',
		'priority'  => 18,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting(
        'rendition_tab3_url',
    array(
        'default' => '',
		'sanitize_callback' => 'esc_url_raw'
    ));
	
	$wp_customize->add_control(
        'rendition_tab3_url',
    array(
        'label'    => __('Tab3 Readmore Link', 'rendition'),
        'section'  => 'rendition_header_tabs_options',
		'priority' => 19,
        'type'     => 'text',
    ));
		
	$wp_customize->add_setting( 
	    'rendition_tab3_text',
    array(
        'default' => '',
		'sanitize_callback' => 'rendition_sanitize_textarea'
    ));		

    $wp_customize->add_control(
        new Rendition_Customize_Textarea_Control(
            $wp_customize,
            'rendition_tab3_text',
        array(
            'label'    => 'Tab3 Text',
            'section'  => 'rendition_header_tabs_options',
			'priority' => 20,
            'settings' => 'rendition_tab3_text',
        )
        )
    );
	
	// Tab4 
	$wp_customize->add_setting(
    'rendition_tab4_tooltip',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_tab4_tooltip',
    array(
        'label'     => __('Tab4 Title', 'rendition'),
        'section'   => 'rendition_header_tabs_options',
		'priority'  => 21,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting(
    'rendition_tab4_title',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_tab4_title',
    array(
        'label'     => __('Tab4 Title', 'rendition'),
        'section'   => 'rendition_header_tabs_options',
		'priority'  => 22,
        'type'      => 'text',
    ));
	
	// Tab4 Icon
	$wp_customize->add_setting(
    'rendition_tab4_icon',
    array(
        'default' => 'envelope-o',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_tab4_icon',
    array(
        'label'     => __('Tab4 Icon name', 'rendition'),
        'section'   => 'rendition_header_tabs_options',
		'priority'  => 23,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting( 
	    'rendition_tab4_text',
    array(
        'default' => '',
		'sanitize_callback' => 'rendition_sanitize_textarea'
    ));		

    $wp_customize->add_control(
        new Rendition_Customize_Textarea_Control(
            $wp_customize,
            'rendition_tab4_text',
        array(
            'label'    => 'Tab4 Text',
            'section'  => 'rendition_header_tabs_options',
			'priority' => 24,
            'settings' => 'rendition_tab4_text',
        )
        )
    );
	
	// Tab4 Contact
	$wp_customize->add_setting(
    'rendition_tab4_email_address',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_tab4_email_address',
    array(
        'label'     => __('Tab4 Contact Email', 'rendition'),
        'section'   => 'rendition_header_tabs_options',
		'priority'  => 25,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting(
        'rendition_tab4_landline_number',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
        'rendition_tab4_landline_number',
    array(
        'label'    => __('Tab4 Landline number', 'rendition'),
        'section'  => 'rendition_header_tabs_options',
		'priority' => 26,
        'type'     => 'text',
    ));
	
	$wp_customize->add_setting(
        'rendition_tab4_mobile_number',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
        'rendition_tab4_mobile_number',
    array(
        'label'    => __('Tab4 Mobile number', 'rendition'),
        'section'  => 'rendition_header_tabs_options',
		'priority' => 27,
        'type'     => 'text',
    ));
		
	// Tab5 
	$wp_customize->add_setting(
    'rendition_tab5_tooltip',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_tab5_tooltip',
    array(
        'label'     => __('Tab5 Title', 'rendition'),
        'section'   => 'rendition_header_tabs_options',
		'priority'  => 28,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting(
    'rendition_tab5_title',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_tab5_title',
    array(
        'label'     => __('Tab5 Title', 'rendition'),
        'section'   => 'rendition_header_tabs_options',
		'priority'  => 29,
        'type'      => 'text',
    ));
	
	// Tab4 Icon
	$wp_customize->add_setting(
    'rendition_tab5_icon',
    array(
        'default' => 'info',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_tab5_icon',
    array(
        'label'     => __('Tab5 Icon name', 'rendition'),
        'section'   => 'rendition_header_tabs_options',
		'priority'  => 30,
        'type'      => 'text',
    ));
	
	// Tab3 Readmore
	$wp_customize->add_setting(
    'rendition_tab5_button_text',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_tab5_button_text',
    array(
        'label'     => __('Tab5 Button Text', 'rendition'),
        'section'   => 'rendition_header_tabs_options',
		'priority'  => 31,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting(
        'rendition_tab5_url',
    array(
        'default' => '',
		'sanitize_callback' => 'esc_url_raw'
    ));
	
	$wp_customize->add_control(
        'rendition_tab5_url',
    array(
        'label'    => __('Tab5 Readmore Link', 'rendition'),
        'section'  => 'rendition_header_tabs_options',
		'priority' => 32,
        'type'     => 'text',
    ));
		
	$wp_customize->add_setting( 
	    'rendition_tab5_text',
    array(
        'default' => '',
		'sanitize_callback' => 'rendition_sanitize_textarea'
    ));		

    $wp_customize->add_control(
        new Rendition_Customize_Textarea_Control(
            $wp_customize,
            'rendition_tab54_text',
        array(
            'label'    => 'Tab5 Text',
            'section'  => 'rendition_header_tabs_options',
			'priority' => 33,
            'settings' => 'rendition_tab5_text',
        )
        )
    );
	// End Of Tabs Section
	
	// Services Section Settings
	$wp_customize->add_setting(
        'rendition_services_visibility', array (
		'sanitize_callback' => 'rendition_sanitize_checkbox',
    ));

    $wp_customize->add_control(
        'rendition_services_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Hide the front page Services section?', 'rendition'),
        'section'  => 'rendition_services_options',
		'priority' => 1,
        )
    );
	
	// Service1 Title
	$wp_customize->add_setting(
    'rendition_service1_title',
    array(
        'default' => 'Made With Bootstrap',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_service1_title',
    array(
        'label'     => __('Service1 Title', 'rendition'),
        'section'   => 'rendition_services_options',
		'priority'  => 2,
        'type'      => 'text',
    ));
	
	// Service1 Icon
	$wp_customize->add_setting(
    'rendition_service1_icon',
    array(
        'default' => 'thumbs-o-up',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_service1_icon',
    array(
        'label'     => __('Service1 Icon name', 'rendition'),
        'section'   => 'rendition_services_options',
		'priority'  => 2,
        'type'      => 'text',
    ));
	
	// Service1 Readmore url
	$wp_customize->add_setting(
        'rendition_service1_url',
    array(
        'default' => '#',
		'sanitize_callback' => 'esc_url_raw'
    ));
	
	$wp_customize->add_control(
        'rendition_service1_url',
    array(
        'label'    => __('Service1 Readmore Link', 'rendition'),
        'section'  => 'rendition_services_options',
		'priority' => 3,
        'type'     => 'text',
    ));
		
	$wp_customize->add_setting( 
	    'rendition_service1_text',
    array(
        'default' => '',
		'sanitize_callback' => 'rendition_sanitize_textarea'
    ));		

    $wp_customize->add_control(
        new Rendition_Customize_Textarea_Control(
            $wp_customize,
            'rendition_service1_text',
        array(
            'label'    => 'Service1 Text',
            'section'  => 'rendition_services_options',
			'priority' => 4,
            'settings' => 'rendition_service1_text',
        )
        )
    );

	// Service2
	$wp_customize->add_setting(
    'rendition_service2_title',
    array(
        'default' => 'Icons by Font Awesome',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_service2_title',
    array(
        'label'     => __('Service2 Title', 'rendition'),
        'section'   => 'rendition_services_options',
		'priority'  => 5,
        'type'      => 'text',
    ));
	
	// Service2 Icon
	$wp_customize->add_setting(
    'rendition_service2_icon',
    array(
        'default' => 'flag',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_service2_icon',
    array(
        'label'     => __('Service2 Icon name', 'rendition'),
        'section'   => 'rendition_services_options',
		'priority'  => 6,
        'type'      => 'text',
    ));
	
	// Service2 Readmore url
	$wp_customize->add_setting(
        'rendition_service2_url',
    array(
        'default' => '#',
		'sanitize_callback' => 'esc_url_raw'
    ));
	
	$wp_customize->add_control(
        'rendition_service2_url',
    array(
        'label'    => __('Service2 Readmore Link', 'rendition'),
        'section'  => 'rendition_services_options',
		'priority' => 7,
        'type'     => 'text',
    ));
		
	$wp_customize->add_setting( 
	    'rendition_service2_text',
    array(
        'default' => '',
		'sanitize_callback' => 'rendition_sanitize_textarea'
    ));		

    $wp_customize->add_control(
        new Rendition_Customize_Textarea_Control(
            $wp_customize,
            'rendition_service2_text',
        array(
            'label'    => 'Service2 Text',
            'section'  => 'rendition_services_options',
			'priority' => 8,
            'settings' => 'rendition_service2_text',
        )
        )
    );

	// Service3 Title
	$wp_customize->add_setting(
    'rendition_service3_title',
    array(
        'default' => 'Mobile First & Desktop Friendly',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_service3_title',
    array(
        'label'     => __('Service3 Title', 'rendition'),
        'section'   => 'rendition_services_options',
		'priority'  => 9,
        'type'      => 'text',
    ));
	
	// Service3 Icon
	$wp_customize->add_setting(
    'rendition_service3_icon',
    array(
        'default' => 'desktop',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_service3_icon',
    array(
        'label'     => __('Service3 Icon name', 'rendition'),
        'section'   => 'rendition_services_options',
		'priority'  => 10,
        'type'      => 'text',
    ));
	
	// Service3 Readmore url
	$wp_customize->add_setting(
        'rendition_service3_url',
    array(
        'default' => '#',
		'sanitize_callback' => 'esc_url_raw'
    ));
	
	$wp_customize->add_control(
        'rendition_service3_url',
    array(
        'label'    => __('Service3 Readmore Link', 'rendition'),
        'section'  => 'rendition_services_options',
		'priority' => 11,
        'type'     => 'text',
    ));
		
	$wp_customize->add_setting( 
	    'rendition_service3_text',
    array(
        'default' => '',
		'sanitize_callback' => 'rendition_sanitize_textarea'
    ));		

    $wp_customize->add_control(
        new Rendition_Customize_Textarea_Control(
            $wp_customize,
            'rendition_service3_text',
        array(
            'label'    => 'Service3 Text',
            'section'  => 'rendition_services_options',
			'priority' => 12,
            'settings' => 'rendition_service3_text',
        )
        )
    );
	// End Of Service Section
	
	// Intro Section Settings
	$wp_customize->add_setting(
        'rendition_home_intro_visibility', array (
		'sanitize_callback' => 'rendition_sanitize_checkbox',
    ));

    $wp_customize->add_control(
        'rendition_home_intro_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Hide the home page intro section?', 'rendition'),
        'section'  => 'rendition_intro_options',
		'priority' => 1,
        )
    );
	
	$wp_customize->add_setting(
    'rendition_intro_title_visibility', array (
		'sanitize_callback' => 'rendition_sanitize_checkbox',
    ));

    $wp_customize->add_control(
    'rendition_intro_title_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Hide Intro Title?', 'rendition'),
        'section'  => 'rendition_intro_options',
		'priority' => 2,
        )
    );
	
	$wp_customize->add_setting(
    'rendition_intro_title',
    array(
        'default' => 'Who We Are!',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_intro_title',
    array(
        'label'     => __('Enter Intro Title here - make it short & catchy!', 'rendition'),
        'section'   => 'rendition_intro_options',
		'priority'  => 3,
        'type'      => 'text',
    ));
		
	$wp_customize->add_setting( 
	    'rendition_intro_text',
    array(
        'default' => '',
		'sanitize_callback' => 'rendition_sanitize_textarea'
    ));		

    $wp_customize->add_control(
        new Rendition_Customize_Textarea_Control(
            $wp_customize,
            'rendition_intro_text',
        array(
            'label'    => 'Home Intro Text',
            'section'  => 'rendition_intro_options',
			'priority' => 4,
            'settings' => 'rendition_intro_text',
        )
        )
    );
	
	$wp_customize->add_setting(
        'rendition_intro_button_visibility', array (
		'sanitize_callback' => 'rendition_sanitize_checkbox',
    ));

    $wp_customize->add_control(
        'rendition_intro_button_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Hide CTA Buttons?', 'rendition'),
        'section'  => 'rendition_intro_options',
		'priority' => 5,
        )
    );
		
	$wp_customize->add_setting(
        'rendition_purchase_left_text',
    array(
        'default' => __('Learn more', 'rendition'),
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
        'rendition_purchase_left_text',
    array(
        'label'     => __('Home Intro Left Button Text', 'rendition'),
        'section'   => 'rendition_intro_options',
		'priority'  => 6,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting(
        'rendition_purchase_left_url',
    array(
        'default' => '#',
		'sanitize_callback' => 'esc_url_raw'
    ));
	
	$wp_customize->add_control(
        'rendition_purchase_left_url',
    array(
        'label'    => __('Home Intro Learn Button Link', 'rendition'),
        'section'  => 'rendition_intro_options',
		'priority' => 7,
        'type'     => 'text',
    ));
	
	$wp_customize->add_setting( 'rendition_purchase_left_url_target', array(
		'default' => '_self',
		'sanitize_callback' => 'rendition_sanitize_url_target',
	) );
	
	$wp_customize->add_control( 'rendition_purchase_left_url_target', array(
        'label'   => __( 'Learn More Url Window Target', 'rendition' ),
        'section' => 'rendition_intro_options',
	    'priority' => 8,
        'type'    => 'radio',
        'choices' => array(
             '_self'   => __( 'Open Link In Same Tab', 'rendition' ),
			 '_blank'  => __( 'Open Link In New Tab', 'rendition' ),
        ),
    ));
	
	$wp_customize->add_setting(
        'rendition_purchase_right_text',
    array(
        'default' => __('Sign Up', 'rendition'),
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
        'rendition_purchase_right_text',
    array(
        'label'     => __('Home Intro Right Button Text', 'rendition'),
        'section'   => 'rendition_intro_options',
		'priority'  => 9,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting(
        'rendition_purchase_right_url',
    array(
        'default' => '#',
		'sanitize_callback' => 'esc_url_raw'
    ));
	
	$wp_customize->add_control(
        'rendition_purchase_right_url',
    array(
        'label'    => __('Home Intro Signup Button Link', 'rendition'),
        'section'  => 'rendition_intro_options',
		'priority' => 10,
        'type'     => 'text',
    ));
	
	$wp_customize->add_setting( 'rendition_purchase_right_url_target', array(
		'default' => '_self',
		'sanitize_callback' => 'rendition_sanitize_url_target',
	) );
	
	$wp_customize->add_control( 'rendition_purchase_right_url_target', array(
        'label'   => __( 'Sign Up Url Window Target', 'rendition' ),
        'section' => 'rendition_intro_options',
	    'priority' => 11,
        'type'    => 'radio',
        'choices' => array(
             '_self'   => __( 'Open Link In Same Tab', 'rendition' ),
			 '_blank'  => __( 'Open Link In New Tab', 'rendition' ),
        ),
    ));
	
	// End of intro section
	
	// Begin Blog Feed section
	$wp_customize->add_setting(
        'rendition_feed_header_visibility', array (
		'sanitize_callback' => 'rendition_sanitize_checkbox',
    ));

    $wp_customize->add_control(
        'rendition_feed_header_visibility',
    array(
        'type'     => 'checkbox',
        'label'    => __('Remove Blog Feed header?', 'rendition'),
        'section'  => 'rendition_blogfeed_options',
		'priority' => 1,
        )
    );
	
	$wp_customize->add_setting(
    'rendition_feed_header_title',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
    ));
	
	$wp_customize->add_control(
    'rendition_feed_header_title',
    array(
        'label'     => __('Blog Section Title', 'rendition'),
        'section'   => 'rendition_blogfeed_options',
		'priority'  => 2,
        'type'      => 'text',
    ));
	
	$wp_customize->add_setting( 'rendition_blogfeed_layout', array(
		'default' => '',
		'sanitize_callback' => 'rendition_sanitize_layout'
	) );

	
	$wp_customize->add_control( 'rendition_blogfeed_layout', array(
    'label'     => __( 'Blog Feed Layout', 'rendition' ),
    'section'   => 'rendition_blogfeed_options',
	'priority'  => 3,
    'type'      => 'select',
        'choices'          => array(
            'select'       => __( 'Select blog feed layout', 'rendition' ),
			'default'      => __( '4 in a row - title+meta+thumb top', 'rendition' ),
			'home'         => __( '4 in a row - thumb left', 'rendition' ),
			'home-alt'     => __( '4 in a row - thumb+title top', 'rendition' ),
			'home-alt-2'   => __( '4 in a row - title+thumb top', 'rendition' ),
            'home1'        => __( '3 in a row - thumb left', 'rendition' ),
			'home1-alt'    => __( '3 in a row - thumb+title top', 'rendition' ),
			'home1-alt-2'  => __( '3 in a row - title+thumb top', 'rendition' ),
			'home2'        => __( '2 in a row - thumb left', 'rendition' ),
			'home2-alt'    => __( '2 in a row - thumb+title top', 'rendition' ),
			'home2-alt-2'  => __( '2 in a row - title+thumb top', 'rendition' ),
        ),
    ));
	
	$wp_customize->add_setting(
        'rendition_homefeed_excerpt_length', array (
		'sanitize_callback' => 'rendition_sanitize_integer',
    ));

    $wp_customize->add_control(
    'rendition_homefeed_excerpt_length',
    array(
        'type' => 'text',
		'default' => '14',
		'sanitize_callback' => 'rendition_sanitize_integer',
        'label' => __('Blog Feed Excerpt Length', 'rendition'),
        'section' => 'rendition_blogfeed_options',
		'priority' => 4,
        )
    );
	// End blog feed options
	
	
}
add_action( 'customize_register', 'rendition_customize_register' );

function rendition_sanitize_layout( $layout ) {
	if ( ! in_array( 
	  $layout, 
	    array( 
	      'select',
		  'default',
		  'home',
          'home-alt',
          'home-alt-2',		  
		  'home1',
          'home1-alt',
          'home1-alt-2', 		  
		  'home2',
		  'home2-alt',
		  'home2-alt-2' 
		) 
	) 
	) {
		$layout = 'default';
	}

	return $layout;
}

/**
 * Sanitize the Integer Input values.
 *
 * @since Rendition 1.0.0
 *
 * @param string $input Integer type.
 */
function rendition_sanitize_integer( $input ) {
	return absint( $input );
}

if ( ! function_exists( 'rendition_sanitize_textarea' ) ) :
/**
* Sanitize a string to allow only tags in the allowedtags array.
*/

function rendition_sanitize_textarea( $string ) {
    global $allowedtags;
    return wp_kses( $string , $allowedtags );
}
endif;

/**
 * Sanitize checkbox
 */
if ( ! function_exists( 'rendition_sanitize_checkbox' ) ) :
	function rendition_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return 0;
		}
	}
endif;

/**
 * Sanitize url target
 */
if ( ! function_exists( 'rendition_sanitize_url_target' ) ) :
function rendition_sanitize_url_target( $url_target ) {
	if ( ! in_array( $url_target, array( '_self', '_blank' ) ) ) {
		$url_target = '_self';
	}
	return $url_target;
}
endif;
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rendition_customize_preview_js() {
	wp_enqueue_script( 'rendition_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'rendition_customize_preview_js' );

if ( get_theme_mod( 'rendition_tabs_sitewide' ) != 0 ) {
function rendition_tabs_adjust() {
?>
    <style>
		.singular .v-center {
            padding-top: 1.5%;
        }
	</style>
<?php }
add_action( 'wp_head', 'rendition_tabs_adjust', 210 );
}

if ( get_theme_mod( 'rendition_tabs_visibility' ) != 0 ) {
function rendition_no_tabs_adjust() {
?>
    <style>
		.v-center,
        .singular .v-center	{
            padding-top: 12%;
        }
	</style>
<?php }
add_action( 'wp_head', 'rendition_no_tabs_adjust', 210 );
}