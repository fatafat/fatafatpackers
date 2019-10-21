<?php
/**
 *Shifters Lite About Theme
 *
 * @package Shifters Lite
 */

//about theme info
add_action( 'admin_menu', 'shifters_lite_abouttheme' );
function shifters_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'shifters-lite'), __('About Theme Info', 'shifters-lite'), 'edit_theme_options', 'shifters_lite_guide', 'shifters_lite_mostrar_guide');   
} 

//Info of the theme
function shifters_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'shifters-lite'); ?></h3>
		   </div>
          <p><?php esc_html_e('Shifters Lite is a attractive, sleek, intuitive, responsive and multi-purpose logistics WordPress theme suitable for logistics, transportation and general moving services. If you are in the business which provides services like delivery and shipping, this theme will be a perfect platform to consider for a digital presence of your business that will keep your clients happy and engaged. It has a professional orientation with neat little features which makes it a brilliant choice for transportation business and services. This multi-purpose logistics WordPress theme is ideal for any transportation related industries like trucking, air cargo, air transport, movers and packers, warehousing, general logistics, and other related businesses. It can also be used for corporate, construction, architecture firm, yoga, gym, fitness club, NGO, travel, adventure, personal blog, digital agency, marketing and any other business website.', 'shifters-lite'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'shifters-lite'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'shifters-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'shifters-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'shifters-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'shifters-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'shifters-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'shifters-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'shifters-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'shifters-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">    
     <a href="<?php echo esc_url( shifters_lite_live_demo ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'shifters-lite'); ?></a> | 
    <a href="<?php echo esc_url( shifters_lite_theme_doc ); ?>" target="_blank"><?php esc_html_e('Documentation', 'shifters-lite'); ?></a>    
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>