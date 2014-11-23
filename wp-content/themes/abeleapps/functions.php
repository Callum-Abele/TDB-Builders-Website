<?php


add_action( 'init', 'abeleapps_init' );
function abeleapps_init() {
	register_post_type( 'Projects',
		array(
			'labels' => array(
				'name' => __( 'Projects' ),
				'singular_name' => __( 'Project' )
			),
		'public' => true,
		'has_archive' => true,
		)
	);
	
	register_nav_menus(
    array(
      'main_navigation' => __( 'Main Navigation' )
    )
  );
  
  
}

add_theme_support( 'post-thumbnails' );

add_image_size( 'mid-large', 400, 800 ); // Soft Crop Mode

add_theme_support( 'menus' );


add_editor_style( 'assets/css/bootstrap.min.css' );
add_editor_style( 'style.css' );

?>