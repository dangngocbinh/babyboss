<?php
if ( class_exists( 'Kirki' ) ) {
	Kirki::add_config( 'unwind_child_config', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );
	Kirki::add_panel( 'unwind_child_panel_color', array(
	    'priority'    => 10,
	    'title'       => esc_attr__( 'Color/Background', 'textdomain' ),
	    'description' => esc_attr__( 'màu chữ, màu nền', 'textdomain' ),
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
					'description' => 'chỉnh nền topbar',),
				array(
					'type' => 'color',
					'settings' => 'color_topbar',
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
					'selector' => '#masthead, #masthead .main-navigation-bar',
					'description' => 'chỉnh nền header',
				),
				array(
					'type' => 'color',
					'settings' => 'color_menu',
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
					'label' => 'Active Menu color',
					'description' => '',
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
					'label' => 'Submenu Menu color',
					'description' => '',
					'transport'   => 'auto',
					'choices'     => array(
						'alpha' => true,
					),
					'output' => array(
						/*array(
							'element'  => '.main-navigation>div li.focus>a, .main-navigation>div li:hover>a',
							'property' => 'color',
						),*/
						array(
							'element'  => '.main-navigation>div ul ul a',
							'property' => 'color',
						),
					)
				)
			)
			
		),
		'color_body' => array(
			'title' => 'Body',
			'settings' => array(
				array(
					'type' => 'background',
					'name' => 'background_body',
					'title' => 'Background Body',
					'selector' => 'body',
					'description' => 'chỉnh nền body',
				)
			)			
		),
		'color_footer' => array(
			'title' => 'Footer',
			'settings' => array(
				array(
					'type' => 'background',
					'name' => 'background_footer',
					'title' => 'Background Footer',
					'selector' => '#colophon',
					'description' => 'chỉnh nền footer',
				),
				array(
					'type' => 'color',
					'settings' => 'color_footer',
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
					'title' => 'Background Content',
					'selector' => '.site-content',
					'description' => 'chỉnh nền khung chứa nội dung chính',
				),
				array(
					'type' => 'color',
					'settings' => 'color_content_body',
					'label' => 'Body color',
					'description' => '',
					'transport'   => 'auto',
					'choices'     => array(
						'alpha' => true,
					),
					'output' => array(
						array(
							'element'  => 'html body,body button,body input,body select,body textarea',
							'property' => 'color',
						),
					)
				)
			)
		),
		'color_copyright' => array(
			'title' => 'Copyright',
			'settings' => array(
				array(
					'type' => 'color',
					'settings' => 'color_content_copyright',
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
					'title' => 'Background Copyright',
					'selector' => '#colophon .site-info',
					'description' => 'chỉnh nền copyright',
				)
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
						'background-color'      => 'rgba(20,20,20,.8)',
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

	Kirki::add_panel( 'bo_cuc_panel', array(
	    'priority'    => 10,
	    'title'       => esc_attr__( 'Bố Cục', 'textdomain' ),
	    'description' => esc_attr__( 'cấu hình hiển thị Topbar', 'textdomain' ),
	) );

	Kirki::add_section( 'top_bar_section', array(
  	  'title'          => 'Top Bar',
	    'description'    => 'cấu hình hiện thị Topbar',
	    'panel'          => 'bo_cuc_panel',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'unwind_child_config', array(
		'type'        => 'switch',
		'settings'    => 'topbar_visibility',
		'label'       => __( 'Ẩn / hiện Topbar', 'textdomain' ),
		'section'     => 'top_bar_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_attr__( 'Hiển', 'textdomain' ),
			'off' => esc_attr__( 'Ẩn', 'textdomain' ),
		),
		'transport'   => 'postMessage',
	) );

	Kirki::add_field( 'unwind_child_config', array(
		'type'     => 'text',
		'settings' => 'topbar_sologan',
		'description' => 'Allow HTML',
		'label'    => __( 'Slogan', 'textdomain' ),
		'section'  => 'top_bar_section',
		'priority' => 10,
		'transport'   => 'postMessage',
		'default'     => '<strong>Hi!</strong> This is notice',
	) );

	Kirki::add_section( 'header_section', array(
  	  'title'          => 'Header',
	    'description'    => 'cấu hình hiện thị Header',
	    'panel'          => 'bo_cuc_panel',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'unwind_child_config', array(
		'type'        => 'dimensions',
		'settings'    => 'header_padding2',
		'label'       => esc_attr__( 'Header Padding', 'kirki' ),
		'description' => esc_attr__( '', 'kirki' ),
		'section'     => 'header_section',
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
		'label'       => __( 'Style of Menu', 'textdomain' ),
		'section'     => 'header_section',
		'default'     => 'bottom-line-item',
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => array(
			'bottom-line-item' => esc_attr__( 'Bottom Line Item', 'textdomain' ),
			'change-color-item' => esc_attr__( 'Change Color Item', 'textdomain' ),
			'change-bg-item' => esc_attr__( 'Change Background Item', 'textdomain' ),
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
		'label'       => __( 'Hiện Credit Link Copyright', 'textdomain' ),
		'section'     => 'footer_section',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_attr__( 'Hiển', 'textdomain' ),
			'off' => esc_attr__( 'Ẩn', 'textdomain' ),
		),
	) );

	Kirki::add_section( 'fontsize_section', array(
  	  'title'          => 'Font Size',
	    'description'    => 'cấu hình font-size',
	    'panel'          => 'bo_cuc_panel',
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
			'label'       => esc_attr__( 'Content Font', 'textdomain' ),			
			'default'     => array(
				'font-family'    => 'Roboto',
				'font-size'      => '14px',
				'line-height'    => '1.5',				
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => 'body',
				),
			),
		),
		array(
			'settings'    => 'main_menu_font',
			'label'       => esc_attr__( 'Main Menu Font', 'textdomain' ),			
			'default'     => array(
				'font-family'    => 'Roboto',
				'font-size'      => '14px',
				'line-height'    => '1.5',				
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => '.main-navigation>div li a',
				),
			),
		),
		array(
			'settings'    => 'page_title_font',
			'label'       => esc_attr__( 'Page Title Font', 'textdomain' ),			
			'default'     => array(
				'font-family'    => 'Roboto',
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
			'label'       => esc_attr__( 'Post Title Listing Font', 'textdomain' ),			
			'default'     => array(
				'font-family'    => 'Roboto',
				'font-size'      => '14px',
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
			'label'       => esc_attr__( 'Big Heading Font', 'textdomain' ),			
			'default'     => array(
				'font-family'    => 'Roboto',			
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
			'label'       => esc_attr__( 'H1 Font Size', 'textdomain' ),			
			'default'     => array(
				'font-size'      => '30px',
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
			'label'       => esc_attr__( 'H2 Font Size', 'textdomain' ),			
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
			'label'       => esc_attr__( 'H3 Font Size', 'textdomain' ),			
			'default'     => array(
				'font-size'      => '23px',
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
			'label'       => esc_attr__( 'H4 Font Size', 'textdomain' ),			
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
			'label'       => esc_attr__( 'small Heading Font', 'textdomain' ),			
			'default'     => array(
				'font-family'    => 'Roboto',
				'font-size'      => '14px',
				'line-height'    => '1.5',				
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => 'h5, h6',
				),
			),
		),
		/*array(
			'settings'    => 'widget_title_font_size',
			'label'       => esc_attr__( 'Widget Title Font', 'textdomain' ),			
			'default'     => array(
				'font-family'    => 'Roboto',
				'font-size'      => '21px',
				'line-height'    => '1',
								
			),
			'priority'    => 10,
			'output'      => array(
				array(
					'element' => '#secondary .widget .widget-title',
				),
			),
		),*/
		array(
			'settings'    => 'blockquote_font',
			'label'       => esc_attr__( 'Blockquote Font', 'textdomain' ),			
			'default'     => array(
				'font-family'    => 'Roboto',
				'font-size'      => '14px',
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
