<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Shifters Lite
 */

get_header(); ?>

<div class="container">
     <div class="site_content_panel">
        <div class="left_panel_content <?php if( get_theme_mod( 'shifters_lite_hidesidebar_singlepost' ) ) { ?>fullwidth<?php } ?>">            
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content', 'single' ); ?>
                    <?php the_post_navigation(); ?>
                    <div class="clear"></div>
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                    	comments_template();
                    ?>
                <?php endwhile; // end of the loop. ?>                  
         </div>  <!-- .left_panel_content-->        
          <?php if( get_theme_mod( 'shifters_lite_hidesidebar_singlepost' ) == '') { ?> 
          	  <?php get_sidebar();?>
          <?php } ?>       
        <div class="clear"></div>
    </div><!-- site_content_panel -->
</div><!-- container -->	
<?php get_footer(); ?>