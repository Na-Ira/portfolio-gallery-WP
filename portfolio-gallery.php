<?php 
/**
 * Plugin Name: Portfolio Gallery Plugin
 * Plugin URI: https://folio-ira.nastmobile.com/contact-form/
 * Author: Iryna Nahorna
 * Author URI: https://folio-ira.nastmobile.com/
 * Text Domain: portfolio-gallery
 * Description: This plugin for "Portfolio Gallery" form
 * Version: 1.0
 **/

 /**
  * Initializing plugin
  */
  add_action('plugins_loaded', 'portfolio_gallery_plugin');

  function portfolio_gallery_plugin() {
      require_once plugin_dir_path( __FILE__ ) . 'functions.php';
  }
 
  /**
  *  plugin's Shortcode
  */
 add_shortcode("portfolio-gallery", "portfolio_gallery_activation");

 /**
  * Activation plugin
  */
 register_activation_hook( __FILE__, 'portfolio_gallery_activation' );
 
 function portfolio_gallery_activation() {

   // Start buffer
   ob_start();

   $args_array = array(
      'posts_per_page' => -1,
      'post_type'      => 'portfolio-gallery', // post type slug
      'post_status'    => 'publish',
      'orderby'        => 'date',
      'order'          => 'DESC'
   );
    $get_folio_gallery = new WP_Query( $args_array );

   if( $get_folio_gallery->have_posts() ) :
      while ( $get_folio_gallery->have_posts() ) : $get_folio_gallery->the_post();
   ?>

<section id="portfolio-section" class="sect py-0 px-0" data-section-name="portfolio-section">
   <div class="container wrap-container text-center who-i">
      <div class="row justify-content-center pb-5">
         <div class="col-lg-8">
            <div class="who-i text-center subtitle">
               <?php the_title( '<h3 class="page-title">', '</h3>' ); ?>
               <p data-aos="fade-up" data-aos-delay="300" data-aos-offset="0">
                  Some of my profesional work
               </p>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col container-folio px-0">
            <div class="porto-wrap text-left">

               <!-- .item-porto -->
               <?php if ($images_gallery = get_field("gallery")) : ?>
               <!-- <//?php  var_dump($images_gallery); ?> -->
               <?php foreach( $images_gallery as $image ): ?>
               <?php if ($image) : ?>
               <div class="item-porto">
                  <a class="gallery-link glightbox" data-glightbox="type: image"
                     href="<?php echo esc_url($image['url']); ?>">
                     <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" />
                     <div class="porto-description">
                        <div class="overlay-holder">
                           <h3><?php echo esc_attr($image['title']); ?></h3>
                           <div class="description-project">
                              <p>
                                 <?php echo esc_html($image['caption']); ?>
                              </p>
                           </div>
                        </div>
                     </div>
                  </a>
                  <div class="card my-works py-4">
                     <h4><?php echo esc_attr($image['alt']); ?></h4>
                     <div class="my-works__tools">
                        <?php echo esc_attr($image['description']); ?>
                     </div>
                  </div>
               </div>
               <?php endif; ?>
               <?php endforeach; ?>
               <?php endif; ?>
               <!-- end .item-porto -->
            </div>
         </div>
      </div>
   </div>
</section>

<?php endwhile;	
   wp_reset_postdata();	
endif; ?>

<?php

// Return & clean buffer contents
return ob_get_clean();

}
 ?>
