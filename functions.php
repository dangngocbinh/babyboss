<?php 
	
	include 'inc/theme-customizer.php';
	include 'inc/theme-options-config.php';
	require_once get_theme_file_path( 'inc/class-kirki-installer-section.php' );
	require_once get_theme_file_path( '/inc/class-tgm-plugin-activation.php') ;
	add_action( 'tgmpa_register', 'bb_register_required_plugins' );

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
		$copyright = "";
		if(UWBB_Customize::get_option("footer_credit_visibility")) {
			$copyright = sprintf(" - Power by: <a href='%s'>Site Origin</a>/<a href='%s'>TKWeb Siêu Tốc</a>", "https://siteorigin.com/", "http://thietkewebsieutoc.net");	
		}
		
		ob_start();
		echo $copyright;
		
		wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_id' => 'footer-menu','container_class' => 'footer-menu-container' ) );
		
		return ob_get_clean();

	}
	


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
    remove_theme_support( 'siteorigin-premium-no-attribution');//custom-logo
    remove_theme_support( 'custom-logo');
}

remove_action( 'after_setup_theme', 'siteorigin_unwind_premium_setup' );
add_filter( 'siteorigin_about_page_show', 'bb_hide_about_page' );
function bb_hide_about_page($show){
	$show = false;
	return $show;
}

add_filter('body_class', array( 'UWBB_Customize' , 'body_class' ));

function uwbb_siteorigin_unwind_woocommerce_enqueue_styles( $styles ) {
	$styles['unwind-woocommerce1'] = array(
		'src' => get_template_directory_uri() . '/woocommerce.css',
		'deps' => array( 'woocommerce-layout', 'style' ),
		'version' => SITEORIGIN_THEME_VERSION,
		'media' => 'all'
	);

	return $styles;
}

function uw_bb_register_my_menu() {
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'uw_bb_register_my_menu' );

function bb_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Kirki Toolkit', // The plugin name.
			'slug'               => 'kirki', // The plugin slug (typically the folder name).
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.			
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),

		// This is an example of how to include a plugin from an arbitrary external source in your theme.
		array(
			'name'         => 'Page Builder by SiteOrigin', // The plugin name.
			'slug'         => 'siteorigin-panels', // The plugin slug (typically the folder name).
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => '', // If set, overrides default API URL and points to an external URL.
		),

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Smart Slider',
			'slug'      => 'smart-slider-3',
			'required'  => false,
		),

		array(
			'name'      => 'SiteOrigin Widgets Bundle',
			'slug'      => 'so-widgets-bundle',
			'required'  => false,
		),

		array(
			'name'      => 'Ultimate Addons for SiteOrigin',
			'slug'      => 'addon-so-widgets-bundle',
			'required'  => false,
		),

		array(
			'name'      => 'Yoast SEO',
			'slug'      => 'wordpress-seo',
			'required'  => false,
		),

		


	);

	
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
?>
