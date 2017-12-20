<?php
/**
 * Contains methods for customizing the theme customization screen.
 * 
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since MyTheme 1.0
 */
class UWBB_Customize {
   /**
    * This hooks into 'customize_register' (available as of WP 3.4) and allows
    * you to add new sections and controls to the Theme Customize screen.
    * 
    * Note: To enable instant preview, we have to actually write a bit of custom
    * javascript. See live_preview() for more.
    *  
    * @see add_action('customize_register',$func)
    * @param \WP_Customize_Manager $wp_customize
    * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
    * @since MyTheme 1.0
    */
   public static function register ( $wp_customize ) {      
   }

   /**
    * This will output the custom WordPress settings to the live theme's WP head.
    * 
    * Used by hook: 'wp_head'
    * 
    * @see add_action('wp_head',$func)
    * @since MyTheme 1.0
    */
   public static function body_class($classes){
      $menu_style = self::get_option( 'header_menu_style');
      if($menu_style) $classes[] = $menu_style;
      return $classes;
   }

   public static function header_output() {
      ?>
      <!--Customizer CSS--> 
      <style type="text/css" id="unwind-child-style">
           <?php 
            $display_topbar = self::get_option( 'topbar_visibility');
            if(!$display_topbar) echo '#masthead .top-bar {display: none;} ';

            

	          /* self::generate_css(
	           	'#masthead .main-navigation-bar', 
	           	'background-color', 
	           	'background_setting', 
	           	'background-color'); 

	           self::generate_css(
	           	'#masthead .main-navigation-bar', 
	           	'background-image', 
	           	'background_setting', 
	           	'background-image',
	           	'url(',
	           	')'); 

	           self::generate_css(
	           	'#masthead .main-navigation-bar', 
	           	'background-repeat', 
	           	'background_setting', 
	           	'background-repeat'); 
	           self::generate_css(
	           	'#masthead .main-navigation-bar', 
	           	'background-position', 
	           	'background_setting', 
	           	'background-position'); 
	           self::generate_css(
	           	'#masthead .main-navigation-bar', 
	           	'background-size', 
	           	'background_setting', 
	           	'background-size'); 

	           self::generate_css(
	           	'#masthead .main-navigation-bar', 
	           	'background-attachment', 
	           	'background_setting', 
	           	'background-attachment'); */

           	?> 
           
      </style> 
      <!--/Customizer CSS-->
      <?php
   }
   
   /**
    * This outputs the javascript needed to automate the live settings preview.
    * Also keep in mind that this function isn't necessary unless your settings 
    * are using 'transport'=>'postMessage' instead of the default 'transport'
    * => 'refresh'
    * 
    * Used by hook: 'customize_preview_init'
    * 
    * @see add_action('customize_preview_init',$func)
    * @since MyTheme 1.0
    */
   public static function live_preview() {
      wp_enqueue_script( 
           'mytheme-themecustomizer', // Give the script a unique ID
           get_stylesheet_directory_uri() . '/assets/js/theme-customizer.js', // Define the path to the JS file
           array(  'jquery', 'customize-preview' ), // Define dependencies
           '', // Define a version (optional) 
           true // Specify whether to put in footer (leave this true)
      );
   }

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     * 
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since MyTheme 1.0
     */
    public static function generate_css( $selector, $style, $mod_name, $attribute, $before='', $after='', $echo=true ) {
      $return = '';
      $mod = self::get_option( $mod_name);
      
      if(is_array($mod) && ! empty($attribute)) $mod = $mod[$attribute];

      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; } ',
            $selector,
            $style,
            $before. $mod . $after
         );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
    }

  public static function get_option($field_id = '' ) {
		// if Kirki exists, use it.
		if ( class_exists( 'Kirki' ) ) {
			return Kirki::get_option( 'unwind_child_config', $field_id );
		}
		
		return get_theme_mod( $field_id, '');
	}
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'UWBB_Customize' , 'register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'UWBB_Customize' , 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'UWBB_Customize' , 'live_preview' ) );
