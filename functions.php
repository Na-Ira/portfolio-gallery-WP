<?php

add_action('wp_enqueue_scripts', 'portfolio_gallery_script');
 
function portfolio_gallery_script() {

      // glightbox css
      wp_register_style( 
         'glightbox', 
         plugins_url('css/glightbox.min.css', __FILE__), 
         array(),
         "1.0" 
      );
      wp_enqueue_style( 'glightbox' );

      // gallery css
      wp_register_style( 
         'portfolio-gallery', 
         plugins_url('css/portfolio-gallery.css', __FILE__), 
         array(),
         time() 
      );
      wp_enqueue_style( 'portfolio-gallery' );

      // glightbox js
      wp_enqueue_script(
         'glightbox', 
         plugins_url('js/glightbox.min.js', __FILE__),
         array(),
         "1.0",
         true
         );

      // glightbox js
      wp_enqueue_script(
         'portfolio-gallery', 
         plugins_url('js/portfolio-gallery.js', __FILE__),
         array(),
         time(),
         true
         );

}


// Register Plugin
add_action( 'init', 'portfolio_gallery' );
function portfolio_gallery() {
	$labels = array(
		'name'                  => _x( 'Portfolio Gallery', 'gallery' ),
		'singular_name'         => _x( 'Portfolio Gallery', 'gallery' ),
		'menu_name'             => _x( 'Portfolio Gallery', 'gallery' ),
		'name_admin_bar'        => _x( 'Portfolio Gallery', 'gallery' ),
		'add_new'               => __( 'New Gallery', 'gallery' ),
		'add_new_item'          => __( 'Add New Gallery', 'gallery' ),
		'new_item'              => __( 'New Gallery', 'gallery' ),
		'edit_item'             => __( 'Edit Gallery', 'gallery' ),
		'view_item'             => __( 'View Gallery', 'gallery' ),
		'all_items'             => __( 'All Galleries', 'gallery' ),
		'parent_item_colon'     => __( 'Parent Gallery:', 'gallery' ),
		'not_found'             => __( 'No gallery found.', 'gallery' ),
		'not_found_in_trash'    => __( 'No gallery found in Trash.', 'gallery' ),
		'insert_into_item'      => _x( 'Insert into Gallery', 'gallery' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Gallery', 'gallery' ),
	);

	$args = array(
		'labels'             => $labels,
		'label'              => __( 'Portfolio Gallery', 'gallery' ),
		'description'        => __( 'Portfolio Gallery', 'gallery' ),
		'taxonomies'         => array( 'portfolio_category' ),
		'public'             => true,
		'publicly_queryable' => true,
		'menu_icon'          => 'dashicons-format-gallery',
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio-gallery' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'thumbnail'),
		'show_in_rest'       => true,
	);

	register_post_type( 'portfolio-gallery', $args );

	// Register Taxonomy
	register_taxonomy( 
		'portfolio_category', 
		'folio_gallery', 
		array(
		'label'        => __( 'Portfolio name', 'gallery' ),
		'rewrite'      => array( 'slug' => 'folio_gallery/portfolio_category' ),
		'hierarchical' => true
  ) );
}

