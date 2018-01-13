<?php
if ( class_exists( 'Kirki' ) ) {
	Kirki::add_config( 'unwind_child_config', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );
	Kirki::add_panel( 'unwind_child_panel_color', array(
	    'priority'    => 10,
	    'title'       => esc_attr__( 'Color', 'babyboss' ),
	    'description' => esc_attr__( 'color & background', 'babyboss' ),
	) );

	$color_panel = array(
		'color_topbar' => array(
			'title' => 'Topbar',
			'settings' => array(
				array(
					'type' => 'background',
					'name' => 'background_topbar',
					'title' => 'Background Topbar', 
					'selector' => '#masthead .top-bar',
					'default' => '#ffffff',
					'description' => 'chỉnh nền topbar',),
				array(
					'type' => 'color',
					'settings' => 'color_topbar',
					'default' => '#000000',
					'label' => 'Text color',
					'description' => '',
					'transport'   => 'auto',
					'choices'     => array(
						'alpha' => true,
					),
					'output' => array(
						array(
							'element'  => '#masthead .top-bar',
							'property' => 'color',
						),
					)
				)
			)
			
		),
		'color_header' => array(
			'title' => 'Header',
			'settings' => array(
				array(
					'type' => 'background',
					'name' => 'background_header',
					'default' => '#253764',
					'selector' => '#masthead, #masthead .main-navigation-bar',
					'description' => 'chỉnh nền header',
				),
				array(
					'type' => 'color',
					'settings' => 'color_menu',
					'default' => '#c0cdea',
					'label' => 'Menu color',
					'description' => '',
					'transport'   => 'auto',
					'choices'     => array(
						'alpha' => true,
					),
					'output' => array(
						array(
							'element'  => '.main-navigation>div li a',
							'property' => 'color',
						),
					)
				),
				array(
					'type' => 'color',
					'settings' => 'color_active_menu',
					'default' => '',
					'label' => 'Active Menu color',
					'description' => '#ffffff',
					'transport'   => 'auto',
					'choices'     => array(
						'alpha' => true,
					),
					'output' => array(
						array(
							'element'  => '.main-navigation>div li.focus>a, .main-navigation>div li:hover>a',
							'property' => 'color',
						),
					)
				),
				array(
					'type' => 'color',
					'settings' => 'color_border_active_menu',
					'default' => '#ffffff',
					'label' => 'Border line Menu color',
					'description' => 'dành cho kiểu menu có viền',
					'transport'   => 'auto',
					'choices'     => array(
						'alpha' => true,
					),
					'output' => array(
						array(
							'element'  => '.bottom-line-item .main-navigation > div > ul > li > a:after',
							'property' => 'background',
						),
					)
				),
				array(
					'type' => 'color',
					'settings' => 'sub_menu_color',
					'default' => '#c0cdea',
					'label' => 'Submenu Menu color',
					'description' => '#253764',
					'transport'   => 'auto',
					'choices'     => array(
						'alpha' => true,
					),
					'output' => array(
						array(
							'element'  => '.main-navigation>div ul ul a',
							'property' => 'color',
						),
					)
				),
				array(
					'type' => 'background',
					'title' => 'SubMenu Background',
					'name' => 'background_submenu',
					'default' => '#253764',
					'selector' => '.main-navigation>div ul ul',
					'description' => 'chỉnh nền submenu',
				),
				array(
					'type' => 'color',
					'settings' => 'mobile_nav_icon_color',
					'default' => '#ffffff',
					'label' => 'Mobile Icon Menu Color',
					'description' => '(Hamburger Icon)',
					'transport'   => 'auto',
					'choices'     => array(
						'alpha' => true,
					),
					'output' => array(
						array(
							'element'  => '.menu-toggle .svg-icon-menu path',
							'property' => 'fill',
						),
					)
				),
			)
			
		),
		'color_body' => array(
			'title' => 'Body',
			'settings' => array(
				array(
					'type' => 'background',
					'name' => 'background_body',
					'default' => '#ffffff',
					'title' => 'Background Body',
					'selector' => 'body',
					'description' => 'chỉnh nền body',
				)
			)			
		),
		'color_widget' => array(
			'title' => 'Widget Color',
			'settings' => array(
				array(
					'type' => 'color',
					'settings' => 'frame_color_widget',
					'default' => '#253764',
					'label' => 'Frame color',
					'description' => '',
					'transport'   => 'auto',
					'choices'     => array(
						'alpha' => true,
					),
					'output' => array(
						array(
							'element'  => '#colophon .widget .widget-title, #masthead-widgets .widget .widget-title, #secondary .widget .widget-title',
							'property' => 'background',
						),
						array(
							'element'  => '#content .widget, footer .widget',
							'property' => 'border-color',
						),
					)
				),
				array(
					'type' => 'color',
					'settings' => 'title_color_widget',
					'default' => '#c0cdea',
					'label' => 'Title Widget color',
					'description' => '',
					'transport'   => 'auto',
					'choices'     => array(
						'alpha' => true,
					),
					'output' => array(
						array(
							'element'  => '#colophon .widget .widget-title, #masthead-widgets .widget .widget-title, #secondary .widget .widget-title ',
							'property' => 'color',
						),
					)
				),
			),

			
		),
		'color_footer' => array(
			'title' => 'Footer',
			'settings' => array(
				array(
					'type' => 'background',
					'name' => 'background_footer',
					'default' => '#202d4c',
					'title' => 'Background Footer',
					'selector' => '#colophon',
					'description' => 'chỉnh nền footer',
				),
				array(
					'type' => 'color',
					'settings' => 'color_footer',
					'default' => '#ffffff',
					'label' => 'Footer color',
					'description' => '',
					'transport'   => 'auto',
					'choices'     => array(
						'alpha' => true,
					),
					'output' => array(
						array(
							'element'  => '#colophon',
							'property' => 'color',
						),
						array(
							'element'  => '#colophon .widget a',
							'property' => 'color',
						),//#colophon .widget a
					)
				)
			)				
		),
		'color_content' => array(
			
			'title' => 'Content',
			'settings' => array(
				array(
					'type' => 'background',
					'name' => 'background_content',
					'default' => '#ffffff',
					'title' => 'Background Content',
					'selector' => '.site-content',
					'description' => 'chỉnh nền khung chứa nội dung chính',
				),
			)
		),
		'color_copyright' => array(
			'title' => 'Copyright',
			'settings' => array(
				array(
					'type' => 'color',
					'settings' => 'color_content_copyright',
					'default' => '#848484',
					'label' => 'Copyright text color',
					'description' => '',
					'transport'   => 'auto',
					'choices'     => array(
						'alpha' => true,
					),
					'output' => array(
						array(
							'element'  => '#colophon .site-info',
							'property' => 'color',
						),
					)
				),
				array(
					'type' => 'background',
					'name' => 'background_copyright',
					'default' => '#202d4c',
					'title' => 'Background Copyright',
					'selector' => '#colophon .site-info',
					'description' => 'chỉnh nền copyright',
				)
			)
			
		),
		'color_text' => array(
			'title' => 'Text Color',
			'settings' => array(
				array(
					'type' => 'color',
					'settings' => 'body_content_text_color',
					'default' => '#828282',
					'label' => 'Content text',
					'description' => '',
					'transport'   => 'auto',
					'output' => array(
						array(
							'element'  => 'html body,body button,body input,body select,body textarea',
							'property' => 'color',
						),
					)
				),
				array(
					'type' => 'color',
					'settings' => 'big_heading_color',
					'default' => '#20366d',
					'label' => 'Big Heading Color',
					'description' => 'H1,H2,H3',
					'transport'   => 'auto',
					'output' => array(
						array(
							'element'  => 'h1,h2,h3',
							'property' => 'color',
						),
					)
				),
				array(
					'type' => 'color',
					'settings' => 'small_heading_color',
					'default' => '#848ba4',
					'label' => 'Small Heading Color',
					'description' => 'H4, H5, H6',
					'transport'   => 'auto',
					'output' => array(
						array(
							'element'  => 'h4,h5,h6',
							'property' => 'color',
						),
					)
				),
				array(
					'type' => 'color',
					'settings' => 'link_color',
					'default' => '#2b4996',
					'label' => 'Link Color',
					'transport'   => 'auto',
					'output' => array(
						array(
							'element'  => 'a,  #masthead-widgets .widget a, #secondary .widget a, .blog-layout-alternate .archive-entry .entry-content .more-link .more-text',
							'property' => 'color',
						),
					)
				),
				array(
					'type' => 'color',
					'settings' => 'link_color_hover',
					'default' => '#3860c6',
					'label' => 'Hover Link Color',
					'transport'   => 'auto',
					'output' => array(
						array(
							'element'  => 'a:hover, #secondary .widget a:hover, #colophon .widget a:hover, #masthead-widgets .widget a:hover, .post-navigation a:hover',
							'property' => 'color',
						),
					)
				),


			)
			
		),

	);

	foreach ($color_panel as $key => $value) {
		Kirki::add_section( $key . '_section', array(
	  	  'title'          => $value['title'],
		    'description'    => '',
		    'panel'          => 'unwind_child_panel_color',
		    'priority'       => 160,
		) );

		foreach ($value['settings'] as $setting) {
			if($setting['type'] == "background"){
				Kirki::add_field( 'unwind_child_config', array(
					'type'        => 'background',
					'description' => '<br>Ref: Free background <a target="blank" href="https://www.toptal.com/designers/subtlepatterns/">Get Now</a>',
					'settings'    => $setting["name"],
					'section'     => $key . '_section',
					'default'     => array(
						'background-color'      => $setting['default'],
						'background-image'      => '',
						'background-repeat'     => 'repeat',
						'background-position'   => 'center center',
						'background-size'       => 'cover',
						'background-attachment' => 'scroll',
					),
					'transport'   => 'auto',
					'output' => array(
						array(
							'element'  => $setting['selector'],
							'property' => 'background-color',
						),
						array(
							'element'  => $setting['selector'],
							'property' => 'background-image',
						),
						array(
							'element'  => $setting['selector'],
							'property' => 'background-repeat',
						),
						array(
							'element'  => $setting['selector'],
							'property' => 'background-position',
						),
						array(
							'element'  => $setting['selector'],
							'property' => 'background-size',
						),
						array(
							'element'  => $setting['selector'],
							'property' => 'background-attachment',
						),
					),
				) );
			}else{
				$section = $key . '_section';
				$setting['section'] = $section;
				Kirki::add_field( 'unwind_child_config',$setting);
			}
		}

		
	}

	Kirki::add_section( 'top_bar_section', array(
  	  'title'          => 'Top Bar',
	    'description'    => 'cấu hình hiện thị Topbar',
	    'panel'          => 'theme_settings',
	    'priority'       => 10,
	) );

	Kirki::add_field( 'unwind_child_config', array(
		'type'        => 'switch',
		'settings'    => 'topbar_visibility',
		'label'       => __( 'Show/Hide Topbar', 'babyboss' ),
		'section'     => 'top_bar_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_attr__( 'Show', 'babyboss' ),
			'off' => esc_attr__( 'Hide', 'babyboss' ),
		),
		'transport'   => 'postMessage',
	) );

	Kirki::add_field( 'unwind_child_config', array(
		'type'     => 'text',
		'settings' => 'topbar_sologan',
		'description' => 'Allow HTML',
		'label'    => __( 'Slogan', 'babyboss' ),
		'section'  => 'top_bar_section',
		'priority' => 10,
		'transport'   => 'postMessage',
		'default'     => '<strong>Hi!</strong> This is your sologan',
	) );

	Kirki::add_section( 'header_section', array(
  	  'title'          => 'Header',
	    'description'    => 'cấu hình hiện thị Header',
	    'panel'          => 'theme_settings_masthead',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'unwind_child_config', array(
		'type'        => 'dimensions',
		'settings'    => 'header_padding2',
		'label'       => esc_attr__( 'Header Padding', 'kirki' ),
		'description' => esc_attr__( '', 'kirki' ),
		'section'     => 'theme_settings_masthead',
		'default'     => array(
			'padding-top'    => '30px',
			'padding-bottom' => '30px',
			'padding-left'   => '0px',
			'padding-right'  => '0px',
		),
		'transport'   => 'auto',
		'output' => array(
			array(
				'element'  => '#site-navigation >ul>li',
			),
		),
	) );

	Kirki::add_field( 'unwind_child_config', array(
		'type'        => 'select',
		'settings'    => 'header_menu_style',
		'label'       => __( 'Style of Menu', 'babyboss' ),
		'section'     => 'theme_settings_masthead',
		'default'     => 'bottom-line-item',
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => array(
			'bottom-line-item' => esc_attr__( 'Bottom Line Item', 'babyboss' ),
			'change-color-item' => esc_attr__( 'Change Color Item', 'babyboss' ),
			'change-bg-item' => esc_attr__( 'Change Background Item', 'babyboss' ),
		),
		'transport'   => 'postMessage',
	) );

	Kirki::add_section( 'footer_section', array(
  	  'title'          => 'Footer',
	    'description'    => 'cấu hình hiện thị Footer',
	    'panel'          => 'bo_cuc_panel',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'unwind_child_config', array(
		'type'        => 'switch',
		'settings'    => 'footer_credit_visibility',
		'label'       => __( 'Credit Link Copyright', 'babyboss' ),
		'section'     => 'theme_settings_footer',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_attr__( 'Show', 'babyboss' ),
			'off' => esc_attr__( 'Hide', 'babyboss' ),
		),
	) );

	Kirki::add_field( 'unwind_child_config', array(
		'type'        => 'select',
		'settings'    => 'footer_copyright_align',
		'label'       => __( 'Copyright Text Align', 'babyboss' ),
		'section'     => 'theme_settings_footer',
		'default'     => 'left',
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => array(
			'left' => esc_attr__( 'Left', 'babyboss' ),
			'center' => esc_attr__( 'Center', 'babyboss' ),
			'right' => esc_attr__( 'Right', 'babyboss' ),
		),
		'transport'   => 'auto',
		'output' => array(
			array(
				'element'  => '#colophon .site-info',
				'property' => 'text-align',
			),
		),
	) );

	
	Kirki::add_section( 'fontsize_section', array(
  	  'title'          => 'Font',
	    'description'    => 'font style & size',
	    'panel'          => 'theme_settings',
	    'priority'       => 160,
	) );

	$font_default_setting = array(
			'type'        => 'typography',
			'section'     => 'fontsize_section',
			'default'	=> array(
				'letter-spacing' => '0',
				'subsets'        => array( 'latin-ext, vietnamese' ),
				'text-transform' => 'none',
				'text-align'     => 'left',
				'variant'        => 'regular',
			),
			'transport' => 'auto'
		);
	$list_font_settings = array(
		array(
			'settings'    => 'content_font',
			'label'       => esc_attr__( 'Content Font', 'babyboss' ),			
			'default'     => array(
				'font-family'    => 'Montserrat',
				'font-size'      => '14px',
				'line-height'    => '1.5',				
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => 'body, .breadcrumbs, .woocommerce .woocommerce-breadcrumb',					
				),
			),
		),
		array(
			'settings'    => 'main_menu_font',
			'label'       => esc_attr__( 'Main Menu Font', 'babyboss' ),			
			'default'     => array(
				'font-family'    => 'Quicksand',
				'font-size'      => '15px',
				'line-height'    => '1.5',				
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => '.babyboss .main-navigation > div li a',
				),
			),
		),
		array(
			'settings'    => 'page_title_font',
			'label'       => esc_attr__( 'Page Title Font', 'babyboss' ),			
			'default'     => array(
				'font-family'    => 'Quicksand',
				'font-size'      => '14px',
				'line-height'    => '1.5',				
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => '.entry-title a, .page-title',
				),
			),
		),
		array(
			'settings'    => 'post_title_listing_font',
			'label'       => esc_attr__( 'Post Title Listing Font', 'babyboss' ),			
			'default'     => array(
				'font-family'    => 'Quicksand',
				'font-size'      => '23px',
				'line-height'    => '1.5',				
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => '.entry-title a',
				),
			),
		),
		array(
			'settings'    => 'big_heading_font',
			'description' => 'H1, H2, H3, H4',
			'label'       => esc_attr__( 'Big Heading Font', 'babyboss' ),			
			'default'     => array(
				'font-family'    => 'Quicksand',			
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => 'h1,h2,h3,h4',
				),
			),
		),
		array(
			'settings'    => 'heading1_font_size',
			'description' => 'H1 font size',
			'label'       => esc_attr__( 'H1 Font Size', 'babyboss' ),			
			'default'     => array(
				'font-size'      => '32px',
				'line-height'    => '1.5',				
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => 'h1',
				),
			),
		),
		array(
			'settings'    => 'heading2_font_size',
			'description' => 'H2 font size',
			'label'       => esc_attr__( 'H2 Font Size', 'babyboss' ),			
			'default'     => array(
				'font-size'      => '27px',
				'line-height'    => '1.5',				
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => 'h2',
				),
			),
		),
		array(
			'settings'    => 'heading3_font_size',
			'description' => 'H3 font size',
			'label'       => esc_attr__( 'H3 Font Size', 'babyboss' ),			
			'default'     => array(
				'font-size'      => '22px',
				'line-height'    => '1.5',				
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => 'h3',
				),
			),
		),
		array(
			'settings'    => 'heading4_font_size',
			'description' => 'H4 font size',
			'label'       => esc_attr__( 'H4 Font Size', 'babyboss' ),			
			'default'     => array(
				'font-size'      => '18px',
				'line-height'    => '1.5',				
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => 'h4',
				),
			),
		),
		array(
			'settings'    => 'small_heading_font',
			'description' => 'H5, H6',
			'label'       => esc_attr__( 'small Heading Font', 'babyboss' ),			
			'default'     => array(
				'font-family'    => 'Roboto',
				'font-size'      => '18px',
				'line-height'    => '1.5',				
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => 'h5, h6',
				),
			),
		),
		array(
			'settings'    => 'blockquote_font',
			'label'       => esc_attr__( 'Blockquote Font', 'babyboss' ),			
			'default'     => array(
				'font-family'    => 'Quicksand',
				'font-size'      => '16px',
				'line-height'    => '1.5',				
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => 'blockquote',
				),
			),
		),
		
	);

	foreach ($list_font_settings as $font_setting) {
		Kirki::add_field( 'unwind_child_config', array_merge($font_default_setting, $font_setting));
	}
	
}
