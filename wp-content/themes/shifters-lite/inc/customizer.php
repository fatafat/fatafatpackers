<?php    
/**
 *Shifters Lite Theme Customizer
 *
 * @package Shifters Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function shifters_lite_customize_register( $wp_customize ) {	
	
	function shifters_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function shifters_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	 //Panel for section & control
	$wp_customize->add_panel( 'shifters_lite_panel_section', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'shifters-lite' ),		
	) );
	
	//Layout Options
	$wp_customize->add_section('shifters_lite_layout_option',array(
		'title' => __('Site Layout Options','shifters-lite'),			
		'priority' => 1,
		'panel' => 	'shifters_lite_panel_section',          
	));		
	
	$wp_customize->add_setting('shifters_lite_boxlayout',array(
		'sanitize_callback' => 'shifters_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'shifters_lite_boxlayout', array(
    	'section'   => 'shifters_lite_layout_option',    	 
		'label' => __('Check to Box Layout','shifters-lite'),
		'description' => __('If you want to box layout please check the Box Layout Option.','shifters-lite'),
    	'type'      => 'checkbox'
     )); //Layout Section 
	
	$wp_customize->add_setting('shifters_lite_site_color_options',array(
		'default' => '#e32222',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'shifters_lite_site_color_options',array(
			'label' => __('Color Options','shifters-lite'),			
			'description' => __('More color options in PRO Version','shifters-lite'),
			'section' => 'colors',
			'settings' => 'shifters_lite_site_color_options'
		))
	);
	
	$wp_customize->add_setting('shifters_lite_site_hovercolor_options',array(
		'default' => '#ff9c00',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'shifters_lite_site_hovercolor_options',array(
			'label' => __('Hover Color Options','shifters-lite'),			
			'description' => __('More color options in PRO Version','shifters-lite'),
			'section' => 'colors',
			'settings' => 'shifters_lite_site_hovercolor_options'
		))
	);	
	
	 //Site Sticky Header
	$wp_customize->add_section('shifters_lite_sticky_header_sec',array(
			'title'	=> __('Sticky Header','shifters-lite'),			
			'priority' => null,
			'panel' => 	'shifters_lite_panel_section',
	));		
	
	$wp_customize->add_setting('shifters_lite_stickyheader',array(
			'default' => null,
			'sanitize_callback' => 'shifters_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'shifters_lite_stickyheader', array(
    	   'section'   => 'shifters_lite_sticky_header_sec',    	 
		   'label'	=> __('Check to show sticky header on scroll','shifters-lite'),
    	   'type'      => 'checkbox'
     )); //end sticky header Section 		 
	
	
	//Site Header Contact info
	$wp_customize->add_section('shifters_lite_site_hdr_contact_details',array(
		'title' => __('Header Contact info','shifters-lite'),				
		'priority' => null,
		'panel' => 	'shifters_lite_panel_section',
	));	
	
	$wp_customize->add_setting('shifters_lite_site_hdr_office_hours',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('shifters_lite_site_hdr_office_hours',array(	
		'type' => 'text',
		'label' => __('Add office time','shifters-lite'),
		'section' => 'shifters_lite_site_hdr_contact_details',
		'setting' => 'shifters_lite_site_hdr_office_hours'
	));	
	
	$wp_customize->add_setting('shifters_lite_site_calling_details',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('shifters_lite_site_calling_details',array(	
		'type' => 'text',
		'label' => __('Add phone number here','shifters-lite'),
		'section' => 'shifters_lite_site_hdr_contact_details',
		'setting' => 'shifters_lite_site_calling_details'
	));	
	
	
	$wp_customize->add_setting('shifters_lite_site_contactemail_information',array(
		'sanitize_callback' => 'sanitize_email'
	));
	
	$wp_customize->add_control('shifters_lite_site_contactemail_information',array(
		'type' => 'text',
		'label' => __('Add email address here.','shifters-lite'),
		'section' => 'shifters_lite_site_hdr_contact_details'
	));	
	
	
	$wp_customize->add_setting('shifters_lite_show_contactinfo_details_sec',array(
		'default' => false,
		'sanitize_callback' => 'shifters_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'shifters_lite_show_contactinfo_details_sec', array(
	   'settings' => 'shifters_lite_show_contactinfo_details_sec',
	   'section'   => 'shifters_lite_site_hdr_contact_details',
	   'label'     => __('Check To show This Section','shifters-lite'),
	   'type'      => 'checkbox'
	 ));//Show Header Contact Info
	 
	  //Get an Enquiry Button
	$wp_customize->add_section('shifters_lite_get_an_enquiry_section',array(
		'title' => __('Get an Enquiry Button','shifters-lite'),
		'description' => __( 'Add button text and link to show Get an Enquiry button', 'shifters-lite' ),			
		'priority' => null,
		'panel' => 	'shifters_lite_panel_section', 
	));
	 
	 $wp_customize->add_setting('shifters_lite_getanenquiry_btntext',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('shifters_lite_getanenquiry_btntext',array(	
		'type' => 'text',
		'label' => __('Add Get an Enquiry button text here','shifters-lite'),
		'section' => 'shifters_lite_get_an_enquiry_section',
		'setting' => 'shifters_lite_getanenquiry_btntext'
	)); // Get an Enquiry Button Text
	
	$wp_customize->add_setting('shifters_lite_getanenquiry_btnlink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('shifters_lite_getanenquiry_btnlink',array(
		'label' => __('Add link for Get an Enquiry button','shifters-lite'),
		'section' => 'shifters_lite_get_an_enquiry_section',
		'setting' => 'shifters_lite_getanenquiry_btnlink'
	));
	
	$wp_customize->add_setting('shifters_lite_show_getanenquiry_button',array(
		'default' => false,
		'sanitize_callback' => 'shifters_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'shifters_lite_show_getanenquiry_button', array(
	   'settings' => 'shifters_lite_show_getanenquiry_button',
	   'section'   => 'shifters_lite_get_an_enquiry_section',
	   'label'     => __('Check To show Enquiry button','shifters-lite'),
	   'type'      => 'checkbox'
	 ));//Show Get an Enquiry button
	
	
	 //Header Social icons
	$wp_customize->add_section('shifters_lite_hdr_social_area',array(
		'title' => __('Header social icons','shifters-lite'),
		'description' => __( 'Add social icons link here to display icons in header.', 'shifters-lite' ),			
		'priority' => null,
		'panel' => 	'shifters_lite_panel_section', 
	));
	
	$wp_customize->add_setting('shifters_lite_hdrfb_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('shifters_lite_hdrfb_link',array(
		'label' => __('Add facebook link here','shifters-lite'),
		'section' => 'shifters_lite_hdr_social_area',
		'setting' => 'shifters_lite_hdrfb_link'
	));	
	
	$wp_customize->add_setting('shifters_lite_hdrtwitt_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('shifters_lite_hdrtwitt_link',array(
		'label' => __('Add twitter link here','shifters-lite'),
		'section' => 'shifters_lite_hdr_social_area',
		'setting' => 'shifters_lite_hdrtwitt_link'
	));
	
	$wp_customize->add_setting('shifters_lite_hdrgplus_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('shifters_lite_hdrgplus_link',array(
		'label' => __('Add google plus link here','shifters-lite'),
		'section' => 'shifters_lite_hdr_social_area',
		'setting' => 'shifters_lite_hdrgplus_link'
	));
	
	$wp_customize->add_setting('shifters_lite_hdrlinked_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('shifters_lite_hdrlinked_link',array(
		'label' => __('Add linkedin link here','shifters-lite'),
		'section' => 'shifters_lite_hdr_social_area',
		'setting' => 'shifters_lite_hdrlinked_link'
	));
	
	$wp_customize->add_setting('shifters_lite_show_hdr_social_area',array(
		'default' => false,
		'sanitize_callback' => 'shifters_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'shifters_lite_show_hdr_social_area', array(
	   'settings' => 'shifters_lite_show_hdr_social_area',
	   'section'   => 'shifters_lite_hdr_social_area',
	   'label'     => __('Check To show This Section','shifters-lite'),
	   'type'      => 'checkbox'
	 ));//Show Header Social icons area
	
	
	// Header Slider Section		
	$wp_customize->add_section( 'shifters_lite_homeslider_sections', array(
		'title' => __('Slider Section', 'shifters-lite'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 730 pixel.','shifters-lite'), 
		'panel' => 	'shifters_lite_panel_section',           			
    ));
	
	$wp_customize->add_setting('shifters_lite_frontslider_pagearea1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'shifters_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('shifters_lite_frontslider_pagearea1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider first:','shifters-lite'),
		'section' => 'shifters_lite_homeslider_sections'
	));	
	
	$wp_customize->add_setting('shifters_lite_frontslider_pagearea2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'shifters_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('shifters_lite_frontslider_pagearea2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider second:','shifters-lite'),
		'section' => 'shifters_lite_homeslider_sections'
	));	
	
	$wp_customize->add_setting('shifters_lite_frontslider_pagearea3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'shifters_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('shifters_lite_frontslider_pagearea3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider third:','shifters-lite'),
		'section' => 'shifters_lite_homeslider_sections'
	));	// Slider Section Options	
	
	$wp_customize->add_setting('shifters_lite_frontslider_morebtntext',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('shifters_lite_frontslider_morebtntext',array(	
		'type' => 'text',
		'label' => __('Add slider Read more button name here','shifters-lite'),
		'section' => 'shifters_lite_homeslider_sections',
		'setting' => 'shifters_lite_frontslider_morebtntext'
	)); // Slider Read More Button Text
	
	$wp_customize->add_setting('shifters_lite_show_home_slider_section',array(
		'default' => false,
		'sanitize_callback' => 'shifters_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'shifters_lite_show_home_slider_section', array(
	    'settings' => 'shifters_lite_show_home_slider_section',
	    'section'   => 'shifters_lite_homeslider_sections',
	     'label'     => __('Check To Show This Section','shifters-lite'),
	   'type'      => 'checkbox'
	 ));//Show Home Slider Section	
	 
	 
	 // Services Section
	$wp_customize->add_section('shifters_lite_4column_services_sections', array(
		'title' => __('top 4 Column Sections','shifters-lite'),
		'description' => __('Select pages from the dropdown for services section','shifters-lite'),
		'priority' => null,
		'panel' => 	'shifters_lite_panel_section',          
	));	
	
	$wp_customize->add_setting('shifters_lite_fourpage_colorbox1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'shifters_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'shifters_lite_fourpage_colorbox1',array(
		'type' => 'dropdown-pages',			
		'section' => 'shifters_lite_4column_services_sections',
	));		
	
	$wp_customize->add_setting('shifters_lite_fourpage_colorbox2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'shifters_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'shifters_lite_fourpage_colorbox2',array(
		'type' => 'dropdown-pages',			
		'section' => 'shifters_lite_4column_services_sections',
	));
	
	$wp_customize->add_setting('shifters_lite_fourpage_colorbox3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'shifters_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'shifters_lite_fourpage_colorbox3',array(
		'type' => 'dropdown-pages',			
		'section' => 'shifters_lite_4column_services_sections',
	));
	
	$wp_customize->add_setting('shifters_lite_fourpage_colorbox4',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'shifters_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'shifters_lite_fourpage_colorbox4',array(
		'type' => 'dropdown-pages',			
		'section' => 'shifters_lite_4column_services_sections',
	));
	
	
	$wp_customize->add_setting('shifters_lite_show_fourcolumn_colorbox_sections',array(
		'default' => false,
		'sanitize_callback' => 'shifters_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'shifters_lite_show_fourcolumn_colorbox_sections', array(
	   'settings' => 'shifters_lite_show_fourcolumn_colorbox_sections',
	   'section'   => 'shifters_lite_4column_services_sections',
	   'label'     => __('Check To Show This Section','shifters-lite'),
	   'type'      => 'checkbox'
	 ));//Show four column Services Sections	 
	 
	 
	 // Welcome Page Section 
	$wp_customize->add_section('shifters_lite_site_welcomeinfo_sections', array(
		'title' => __('Welcome Section','shifters-lite'),
		'description' => __('Select Pages from the dropdown for welcome section','shifters-lite'),
		'priority' => null,
		'panel' => 	'shifters_lite_panel_section',          
	));		
	
	$wp_customize->add_setting('shifters_lite_sitewelcome_leftcolbx',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'shifters_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'shifters_lite_sitewelcome_leftcolbx',array(
		'type' => 'dropdown-pages',			
		'section' => 'shifters_lite_site_welcomeinfo_sections',
	));	
	
	
	$wp_customize->add_setting('shifters_lite_welcome_rightcolbx1',array(	
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'shifters_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'shifters_lite_welcome_rightcolbx1',array(
		'type' => 'dropdown-pages',			
		'section' => 'shifters_lite_site_welcomeinfo_sections',
	));	
	
	$wp_customize->add_setting('shifters_lite_welcome_rightcolbx2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'shifters_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'shifters_lite_welcome_rightcolbx2',array(
		'type' => 'dropdown-pages',			
		'section' => 'shifters_lite_site_welcomeinfo_sections',
	));	
		
	
	$wp_customize->add_setting('shifters_lite_show_second_welcome_pagebox_sections',array(
		'default' => false,
		'sanitize_callback' => 'shifters_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'shifters_lite_show_second_welcome_pagebox_sections', array(
	    'settings' => 'shifters_lite_show_second_welcome_pagebox_sections',
	    'section'   => 'shifters_lite_site_welcomeinfo_sections',
	    'label'     => __('Check To Show This Section','shifters-lite'),
	    'type'      => 'checkbox'
	));//Show Welcome Section 
	 
	//Sidebar Settings
	$wp_customize->add_section('shifters_lite_sidebar_options', array(
		'title' => __('Sidebar Options','shifters-lite'),		
		'priority' => null,
		'panel' => 	'shifters_lite_panel_section',          
	));	
	
	$wp_customize->add_setting('shifters_lite_hidesidebar_from_homepage',array(
		'default' => false,
		'sanitize_callback' => 'shifters_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'shifters_lite_hidesidebar_from_homepage', array(
	   'settings' => 'shifters_lite_hidesidebar_from_homepage',
	   'section'   => 'shifters_lite_sidebar_options',
	   'label'     => __('Check to hide sidebar from latest post page','shifters-lite'),
	   'type'      => 'checkbox'
	 ));// Hide sidebar from latest post page
	 
	 
	 $wp_customize->add_setting('shifters_lite_hidesidebar_singlepost',array(
		'default' => false,
		'sanitize_callback' => 'shifters_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'shifters_lite_hidesidebar_singlepost', array(
	   'settings' => 'shifters_lite_hidesidebar_singlepost',
	   'section'   => 'shifters_lite_sidebar_options',
	   'label'     => __('Check to hide sidebar from single post','shifters-lite'),
	   'type'      => 'checkbox'
	 ));// hide sidebar single post
	 
	 $wp_customize->add_setting('shifters_lite_hidesidebar_pages',array(
		'default' => false,
		'sanitize_callback' => 'shifters_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'shifters_lite_hidesidebar_pages', array(
	   'settings' => 'shifters_lite_hidesidebar_pages',
	   'section'   => 'shifters_lite_sidebar_options',
	   'label'     => __('Check to hide sidebar from all pages','shifters-lite'),
	   'type'      => 'checkbox'
	 ));//hide sidebar from all pages
		 
}
add_action( 'customize_register', 'shifters_lite_customize_register' );

function shifters_lite_custom_css(){ 
?>
	<style type="text/css"> 					
        a, .defaultpost_fulstyle h2 a:hover,
        #sidebar ul li a:hover,						
        .defaultpost_fulstyle h3 a:hover,       
		.hdr_social a:hover,       						
        .postmeta a:hover,			
        .button:hover,
		.infobox i,
		.blog_postmeta a:hover,
		.wel2column h4 a:hover,
		.site-footer ul li a:hover, 
		.site-footer ul li.current_page_item a
		
            { color:<?php echo esc_html( get_theme_mod('shifters_lite_site_color_options','#e32222')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,		
        .nivo-controlNav a.active,
		.navigation_bar,
		.site-navi ul li ul,		
		a.blogreadmore,
		.learnmore:hover,
		.infobox a.get_an_enquiry:hover,
		.welcome_contentwrap .btnstyle1,													
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,		
		.blogpostmorebtn:hover,
		.nivo-caption .slide_morebtn:hover,
		.navigation_bar:after,
		.column4_colorbox,		
        .toggle a	
            { background-color:<?php echo esc_html( get_theme_mod('shifters_lite_site_color_options','#e32222')); ?>;}
			
		
		.tagcloud a:hover,
		.hdr_social a:hover,
		.welcome_contentwrap p,
		h3.widget-title::after,		
		blockquote	        
            { border-color:<?php echo esc_html( get_theme_mod('shifters_lite_site_color_options','#e32222')); ?>;}
			
		.site-header			        
            { border-bottom: 2px solid <?php echo esc_html( get_theme_mod('shifters_lite_site_color_options','#e32222')); ?>;}
			
	/*Hover CSS Cover*/
	.header-top,
	.infobox a.get_an_enquiry,
	.header-top:after,
	.column4_colorbox.second_column,
	.nivo-caption .slide_morebtn,
	.nivo-caption h2:after,	
	.learnmore  
            { background-color:<?php echo esc_html( get_theme_mod('shifters_lite_site_hovercolor_options','#ff9c00')); ?>;}		
	
	.site-navi ul li a:hover, 
	.site-navi ul li.current-menu-item a,
	.site-navi ul li.current-menu-parent a.parent,
	.site-navi ul li.current-menu-item ul.sub-menu li a:hover        
            { color:<?php echo esc_html( get_theme_mod('shifters_lite_site_hovercolor_options','#ff9c00')); ?>;}	
			
	.site-header			        
            { border-top: 2px solid <?php echo esc_html( get_theme_mod('shifters_lite_site_hovercolor_options','#ff9c00')); ?>;}			
			
	    								
		
         	
    </style> 
<?php                                
}
         
add_action('wp_head','shifters_lite_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function shifters_lite_customize_preview_js() {
	wp_enqueue_script( 'shifters_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '19062019', true );
}
add_action( 'customize_preview_init', 'shifters_lite_customize_preview_js' );