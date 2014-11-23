<?php register_nav_menus(
	array(
		'primary' => 'Primary Navigation'
	));
?>
<?php register_sidebar(
	array(
		'name' => 'Home Sidebar',
		'before_widget' => '<div class="sub clearfix %2$s">',  
	    'after_widget' => '</div>',  
	    'before_title' => '<header><h4>',  
	    'after_title' => '</h4></header>',  
	));
?>
<?php register_sidebar(
	array(  
	    'name'=>'Footer Section 01', 
	    'before_widget' => '',
	    'after_widget' => '',
	    'before_title' => '',  
	    'after_title' => '',  
	));  
?>
<?php register_sidebar(
	array(  
	    'name'=>'Footer Section 02', 
	    'before_widget' => '',
	    'after_widget' => '',
	    'before_title' => '<header><h4>',  
	    'after_title' => '</h4></header>',  
	));  
?>
<?php register_sidebar(
	array(  
	    'name'=>'Footer Section 03', 
	    'before_widget' => '',
	    'after_widget' => '',
	    'before_title' => '<header><h4>',  
	    'after_title' => '</h4></header>',  
	));  
?>
<?php register_sidebar(
	array(  
	    'name'=>'Footer Section 04', 
	    'before_widget' => '',
	    'after_widget' => '',
	    'before_title' => '<header><h4>',  
	    'after_title' => '</h4></header>',  
	));  
?>
<?php add_theme_support( 'post-thumbnails' ); ?>