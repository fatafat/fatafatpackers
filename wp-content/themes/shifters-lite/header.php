<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Shifters Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$shifters_lite_show_contactinfo_details_sec 	= get_theme_mod('shifters_lite_show_contactinfo_details_sec', false);
$shifters_lite_show_home_slider_section 	  	= get_theme_mod('shifters_lite_show_home_slider_section', false);
$shifters_lite_show_getanenquiry_button        = get_theme_mod('shifters_lite_show_getanenquiry_button', false);
$shifters_lite_show_hdr_social_area        = get_theme_mod('shifters_lite_show_hdr_social_area', false);
$shifters_lite_show_fourcolumn_colorbox_sections 	= get_theme_mod('shifters_lite_show_fourcolumn_colorbox_sections', false);
$shifters_lite_show_second_welcome_pagebox_sections	 = get_theme_mod('shifters_lite_show_second_welcome_pagebox_sections', false);
?>
<div id="sitelayout" <?php if( get_theme_mod( 'shifters_lite_boxlayout' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($shifters_lite_show_home_slider_section)) {
	 	$inner_cls = '';
	}
	else {
		$inner_cls = 'siteinner';
	}
}
else {
$inner_cls = 'siteinner';
}
?>

<div class="site-header <?php echo esc_attr($inner_cls); ?> <?php if( get_theme_mod('shifters_lite_stickyheader',false) == false ) { ?>no-sticky<?php } ?>"> 
  <div class="container">       
       <div class="header-top">          
            <div class="left">
            <?php 
            $shifters_lite_site_hdr_office_hours = get_theme_mod('shifters_lite_site_hdr_office_hours');
               if( !empty($shifters_lite_site_hdr_office_hours) ){ ?> 
               <i class="far fa-clock"></i>               
			       <?php esc_html_e('We are Open:','shifters-lite'); ?>
                   <?php echo esc_html($shifters_lite_site_hdr_office_hours); ?>              
            <?php } ?>          
         </div>
         <?php if( $shifters_lite_show_hdr_social_area != ''){ ?> 
          <div class="right">
             <div class="hdr_social">                                                
               <?php $shifters_lite_hdrfb_link = get_theme_mod('shifters_lite_hdrfb_link');
                if( !empty($shifters_lite_hdrfb_link) ){ ?>
                <a title="facebook" class="fab fa-facebook-f" target="_blank" href="<?php echo esc_url($shifters_lite_hdrfb_link); ?>"></a>
               <?php } ?>
            
               <?php $shifters_lite_hdrtwitt_link = get_theme_mod('shifters_lite_hdrtwitt_link');
                if( !empty($shifters_lite_hdrtwitt_link) ){ ?>
                <a title="twitter" class="fab fa-twitter" target="_blank" href="<?php echo esc_url($shifters_lite_hdrtwitt_link); ?>"></a>
               <?php } ?>
        
              <?php $shifters_lite_hdrgplus_link = get_theme_mod('shifters_lite_hdrgplus_link');
                if( !empty($shifters_lite_hdrgplus_link) ){ ?>
                <a title="google-plus" class="fab fa-google-plus" target="_blank" href="<?php echo esc_url($shifters_lite_hdrgplus_link); ?>"></a>
              <?php }?>
        
              <?php $shifters_lite_hdrlinked_link = get_theme_mod('shifters_lite_hdrlinked_link');
                if( !empty($shifters_lite_hdrlinked_link) ){ ?>
                <a title="linkedin" class="fab fa-linkedin" target="_blank" href="<?php echo esc_url($shifters_lite_hdrlinked_link); ?>"></a>
              <?php } ?>                  
           </div><!--end .hdr_social--> 
            </div><!--.right -->
          <?php } ?>
        <div class="clear"></div>
      </div><!--end header-top-->
     
   
      <div class="logo">
        <?php shifters_lite_the_custom_logo(); ?>
           <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p><?php echo esc_html($description); ?></p>
            <?php endif; ?>
      </div><!-- logo -->
      
      
    <?php if( $shifters_lite_show_contactinfo_details_sec != ''){ ?> 
      <div class="cotact_info_area">            
         <?php 
            $shifters_lite_site_calling_details = get_theme_mod('shifters_lite_site_calling_details');
               if( !empty($shifters_lite_site_calling_details) ){ ?> 
               <div class="infobox">
                 <i class="fas fa-phone-volume"></i>
                 <span>
			       <strong><?php esc_html_e('Call Us','shifters-lite'); ?></strong>
                   <?php echo esc_html($shifters_lite_site_calling_details); ?>
                </span>
              </div>
         <?php } ?>          
         
         <?php 
            $shifters_lite_site_contactemail_information = get_theme_mod('shifters_lite_site_contactemail_information');
               if( !empty($shifters_lite_site_contactemail_information) ){ ?> 
               <div class="infobox">
                 <i class="fas fa-envelope-open-text"></i>
                 <span>
			       <strong><?php esc_html_e('Send us mail','shifters-lite'); ?></strong>
                   <a href="<?php echo esc_url('mailto:'.get_theme_mod('shifters_lite_site_contactemail_information')); ?>">
				   <?php echo esc_html($shifters_lite_site_contactemail_information); ?></a>
                </span>
              </div>
         <?php } ?>
         
        
        <?php if( $shifters_lite_show_getanenquiry_button != ''){ ?> 
             <?php
             $shifters_lite_getanenquiry_btntext = get_theme_mod('shifters_lite_getanenquiry_btntext');
             if( !empty($shifters_lite_getanenquiry_btntext) ){ ?>
                 <?php $shifters_lite_getanenquiry_btnlink = get_theme_mod('shifters_lite_getanenquiry_btnlink');
                   if( !empty($shifters_lite_getanenquiry_btnlink) ){ ?>
                      <div class="infobox">
                        <span>
                           <a class="get_an_enquiry" href="<?php echo esc_url($shifters_lite_getanenquiry_btnlink); ?>">
						     <?php echo esc_html($shifters_lite_getanenquiry_btntext); ?>
                           </a>
                        </span>
                       </div> 
                <?php } ?> 
             <?php } ?> 
           <?php } ?>  
         
         
    </div>
 <?php } ?>  
     

 <div class="clear"></div> 
    <div class="navigation_bar">
         <div class="toggle">
           <a class="toggleMenu" href="#"><?php esc_html_e('Menu','shifters-lite'); ?></a>
         </div><!-- toggle --> 
         <div class="site-navi">                   
            <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
         </div><!--.site-navi -->
         <div class="clear"></div>  
   </div><!--.navigation_bar -->
  <div class="clear"></div> 
  </div><!-- .container --> 
</div><!--.site-header --> 
  
<?php 
if ( is_front_page() && !is_home() ) {
if($shifters_lite_show_home_slider_section != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('shifters_lite_frontslider_pagearea'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('shifters_lite_frontslider_pagearea'.$i,true));
	  }
	}
?> 
<div class="slider_wrapper">                
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php 
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo esc_attr( $j ); ?>" class="nivo-html-caption">         
    	<h2><?php the_title(); ?></h2>
    	<?php the_excerpt(); ?>
		<?php
        $shifters_lite_frontslider_morebtntext = get_theme_mod('shifters_lite_frontslider_morebtntext');
        if( !empty($shifters_lite_frontslider_morebtntext) ){ ?>
            <a class="slide_morebtn" href="<?php the_permalink(); ?>"><?php echo esc_html($shifters_lite_frontslider_morebtntext); ?></a>
        <?php } ?>                  
    </div>   
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>   
<?php } ?>
<?php } } ?>
       
        
<?php if ( is_front_page() && ! is_home() ) {
 if( $shifters_lite_show_fourcolumn_colorbox_sections != ''){ ?>  
  <div id="four_pagebox_sections">
     <div class="container">        
       <?php 
        for($n=1; $n<=4; $n++) {    
        if( get_theme_mod('shifters_lite_fourpage_colorbox'.$n,false)) {      
            $queryvar = new WP_Query('page_id='.absint(get_theme_mod('shifters_lite_fourpage_colorbox'.$n,true)) );		
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>     
            <div class="column4_colorbox <?php if($n % 2 == 0) { echo "second_column"; } ?>">                                       
                <?php if(has_post_thumbnail() ) { ?>
                <div class="page_img_box"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>        
                <?php } ?>
                <div class="page_content">              	
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <?php the_excerpt(); ?>
                </div>                      
            </div>
            <?php endwhile;
            wp_reset_postdata();                                  
        } } ?>                                 
    <div class="clear"></div>  
   </div><!-- .container -->
</div><!-- #four_pagebox_sections -->              
<?php } ?>



<?php if( $shifters_lite_show_second_welcome_pagebox_sections != ''){ ?>  
<section id="welcome_sections">
<div class="container"> 
<div class="welcome_left_column">                              
<?php 
	if( get_theme_mod('shifters_lite_sitewelcome_leftcolbx',false)) {     
	$queryvar = new WP_Query('page_id='.absint(get_theme_mod('shifters_lite_sitewelcome_leftcolbx',true)) );			
		while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>  
		 <div class="welcome_contentwrap">   
		 <h3><?php the_title(); ?></h3>   
		 <?php the_content(); ?>     
		</div>                                          
		<?php endwhile;
		 wp_reset_postdata(); ?>                                    
  <?php } ?>  
</div><!-- .welcome_left_column -->  
<div class="welcome_right_column">                              
 <?php 
        for($n=1; $n<=2; $n++) {    
        if( get_theme_mod('shifters_lite_welcome_rightcolbx'.$n,false)) {      
            $queryvar = new WP_Query('page_id='.absint(get_theme_mod('shifters_lite_welcome_rightcolbx'.$n,true)) );		
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>     
            <div class="wel2column <?php if($n % 2 == 0) { echo "last_column"; } ?>">                                       
                <?php if(has_post_thumbnail() ) { ?>
                <div class="welthumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>        
                <?php } ?>
                <div class="wel2column_content">              	
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                  <?php the_excerpt(); ?>
                  <a class="learnmore" href="<?php the_permalink(); ?>"><?php esc_html_e('View Details','shifters-lite'); ?></a>
                </div>                      
            </div>
            <?php endwhile;
            wp_reset_postdata();                                  
        } } ?>   
</div><!-- .welcome_right_column -->    
                                   
<div class="clear"></div>                       
</div><!-- container -->
</section><!-- #welcome_sections-->
<?php } ?>
<?php } ?>