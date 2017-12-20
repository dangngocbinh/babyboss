<?php 
	
	include 'inc/theme-customizer.php';
	include 'inc/theme-options-config.php';
	include_once get_theme_file_path( 'inc/class-kirki-installer-section.php' );

	function mytheme_customize_register( $wp_customize ) {
	   

		
	}
	add_filter( 'siteorigin_unwind_settings_array', 'uwbb_siteorigin_unwind_settings_array');
	function uwbb_siteorigin_unwind_settings_array($settings){
		unset($settings["icons"]);
		unset($settings["masthead"]["fields"]["padding"]);
		unset($settings["fonts"]);
		
		return $settings;
	}

	add_action( 'customize_register', 'mytheme_customize_register' );

	

	add_filter('siteorigin_unwind_footer_credits', 'uwbb_siteorigin_unwind_footer_credits');
	function uwbb_siteorigin_unwind_footer_credits($text){
		if(!UWBB_Customize::get_option("footer_credit_visibility")) return ""; 
		
		$text = sprintf(" - Power by: <a href='%s'>Site Origin</a>/<a href='%s'>TKWeb Siêu Tốc</a>", "https://siteorigin.com/", "http://thietkewebsieutoc.net");
		return $text;

	}
	function wpb_mce_buttons_2($buttons) {
		array_unshift($buttons, 'styleselect');
		return $buttons;
	}
	add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

	function my_mce_before_init_insert_formats( $init_array ) {  

// Define the style_formats array

	$style_formats = array(  
		array(  
			'title' => 'Khung Viền Đỏ',  
			'block' => 'div',  
			'classes' => 'sp-redbox',
			'wrapper' => true
		),
		array(  
			'title' => 'Khung 2 Viền',  
			'block' => 'div',  
			'classes' => 'sp-box-double',
			'wrapper' => true,
		),
		array(  
			'title' => 'Khung Nền Xám',  
			'block' => 'div',  
			'classes' => 'sp-brownbox',
			'wrapper' => true,
		),
		array(  
			'title' => 'Solid Box',  
			'block' => 'div',  
			'classes' => 'sp-solidbox',
			'wrapper' => true,
		),
		array(  
			'title' => 'Account box',  
			'block' => 'div',  
			'classes' => 'sp-accountbox',
			'wrapper' => true,
		),
		array(  
			'title' => 'Red dash box',  
			'block' => 'div',  
			'classes' => 'sp-reddashbox',
			'wrapper' => true,
		),
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 

// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );  

function my_theme_add_editor_styles() {
    add_editor_style(  get_stylesheet_directory_uri(  ) . '/assets/css/sale-page-style.css');
}
add_action( 'admin_init', 'my_theme_add_editor_styles' );

function theme_name_scripts() {
	wp_enqueue_style( 'style-salepage', get_stylesheet_directory_uri(  ) . '/assets/css/sale-page-style.css' );
	
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

add_action( 'wp_enqueue_scripts', 'unwind_baby_boss_enqueue_styles',999 );
function unwind_baby_boss_enqueue_styles() {
	wp_deregister_style( 'siteorigin-unwind-style');
	wp_register_style( 'siteorigin-unwind-style', get_template_directory_uri() . '/style.min.css');
	//wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.min.css' );
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() .'/style.css', array('siteorigin-unwind-style') );  	 
  	
} 



add_action( 'after_setup_theme', 'uwbb_remove_featured_images_from_child_theme', 11 ); 

function uwbb_remove_featured_images_from_child_theme() {

    remove_theme_support( 'custom-background');
}

add_filter('body_class', array( 'UWBB_Customize' , 'body_class' ));
/*add_filter( 'siteorigin_unwind_settings_array', 'uwbb_modify_theme_setting', 10, 1);
function uwbb_modify_theme_setting($settings){
	$settings['masthead']['fields']['background2'] = array(
		'type'	=> 'uwbb-background-image',
		'label'	=> esc_html__( 'Header Padding 2', 'siteorigin-unwind' ),
		'description' => esc_html__( 'Top and bottom header padding 2.', 'siteorigin-unwind' ),
		'live'	=> true,
	);
	return $settings;
}*/

//remove_action( 'admin_menu', array( 'SiteOrigin_Settings_About_Page', 'add_theme_page' ), 5 );

function uwbb_siteorigin_unwind_woocommerce_enqueue_styles( $styles ) {
	$styles['unwind-woocommerce1'] = array(
		'src' => get_template_directory_uri() . '/woocommerce.css',
		'deps' => array( 'woocommerce-layout', 'style' ),
		'version' => SITEORIGIN_THEME_VERSION,
		'media' => 'all'
	);

	return $styles;
}
//add_filter( 'woocommerce_enqueue_styles', 'uwbb_siteorigin_unwind_woocommerce_enqueue_styles' );
 ?>