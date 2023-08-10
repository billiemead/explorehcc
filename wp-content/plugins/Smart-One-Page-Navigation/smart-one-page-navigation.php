<?php
/*
Plugin Name: Smart One Page Navigation
Plugin URI: http://beeteam368.com/
Description: Welcome to Smart One Page Navigation - Addons for WPBakery Page Builder. With this awesome plugin you can build your one page using WPBakery Page Builder.
Author: BeeTeam368
Author URI: http://beeteam368.com/
Version: 1.3.8
License: Commercial
*/

if(!defined('ABSPATH')){
	die('-1');
}

if(!defined('OP_BETE_VER')){
	define('OP_BETE_VER','1.3.8');
};

if(!defined('OP_BETE_PLUGIN_URL')){
    define('OP_BETE_PLUGIN_URL', plugin_dir_url(__FILE__));
};


if(!defined('OP_BETE_PLUGIN_PATH')){
    define('OP_BETE_PLUGIN_PATH', plugin_dir_path(__FILE__));
};

if(!defined('OP_BETE_PREFIX')){
    define('OP_BETE_PREFIX', 'op_bt_');
};

require_once('templates/page-template-add.php');
require_once('includes/shortcode.php');
require_once('sample-data/sample-data.php');
require_once('sample-data/sample-data-ajax.php');

if(!class_exists('bt_op_builder')) {
	class bt_op_builder {
		/*VC Builder*/
		public function bt_op_vc(){
			if(function_exists('vc_map')){
				$group_category				=	__('BeeTeam368', 'Smart-One-Page-Navigation');
				$group_navigation_settings 	= 	__('Navigation Settings', 'Smart-One-Page-Navigation');
				$group_color				= 	__('Color', 'Smart-One-Page-Navigation');
				$group_typography			= 	__('Typography', 'Smart-One-Page-Navigation');
				$group_fullpage_settings 	= 	__('FullPage.js Settings', 'Smart-One-Page-Navigation');
				$group_pageloading_settings = 	__('Page Loading...', 'Smart-One-Page-Navigation');
				$group_display_options 		= 	__('Display Options', 'Smart-One-Page-Navigation');
				$group_animation_builder 	= 	__('Content Animation On Visibility', 'Smart-One-Page-Navigation');
				
				$scroll_effect				=	array( // 32
													__('linear', 'Smart-One-Page-Navigation') 			=> 'linear',
													__('swing', 'Smart-One-Page-Navigation') 				=> 'swing',
													__('easeInQuad', 'Smart-One-Page-Navigation') 		=> 'easeInQuad',
													__('easeOutQuad', 'Smart-One-Page-Navigation') 		=> 'easeOutQuad',
													__('easeInOutQuad', 'Smart-One-Page-Navigation') 		=> 'easeInOutQuad',
													__('easeInCubic', 'Smart-One-Page-Navigation') 		=> 'easeInCubic',
													__('easeOutCubic', 'Smart-One-Page-Navigation') 		=> 'easeOutCubic',
													__('easeInOutCubic', 'Smart-One-Page-Navigation') 	=> 'easeInOutCubic',
													__('easeInQuart', 'Smart-One-Page-Navigation') 		=> 'easeInQuart',
													__('easeOutQuart', 'Smart-One-Page-Navigation') 		=> 'easeOutQuart',
													__('easeInOutQuart', 'Smart-One-Page-Navigation') 	=> 'easeInOutQuart',
													__('easeInQuint', 'Smart-One-Page-Navigation') 		=> 'easeInQuint',
													__('easeOutQuint', 'Smart-One-Page-Navigation') 		=> 'easeOutQuint',
													__('easeInOutQuint', 'Smart-One-Page-Navigation') 	=> 'easeInOutQuint',
													__('easeInExpo', 'Smart-One-Page-Navigation') 		=> 'easeInExpo',
													__('easeOutExpo', 'Smart-One-Page-Navigation') 		=> 'easeOutExpo',
													__('easeInOutExpo', 'Smart-One-Page-Navigation') 		=> 'easeInOutExpo',
													__('easeInSine', 'Smart-One-Page-Navigation') 		=> 'easeInSine',
													__('easeOutSine', 'Smart-One-Page-Navigation') 		=> 'easeOutSine',
													__('easeInOutSine', 'Smart-One-Page-Navigation') 		=> 'easeInOutSine',
													__('easeInCirc', 'Smart-One-Page-Navigation') 		=> 'easeInCirc',
													__('easeOutCirc', 'Smart-One-Page-Navigation') 		=> 'easeOutCirc',
													__('easeInOutCirc', 'Smart-One-Page-Navigation') 		=> 'easeInOutCirc',
													__('easeInElastic', 'Smart-One-Page-Navigation') 		=> 'easeInElastic',
													__('easeOutElastic', 'Smart-One-Page-Navigation') 	=> 'easeOutElastic',
													__('easeInOutElastic', 'Smart-One-Page-Navigation') 	=> 'easeInOutElastic',
													__('easeInBack', 'Smart-One-Page-Navigation') 		=> 'easeInBack',
													__('easeOutBack', 'Smart-One-Page-Navigation') 		=> 'easeOutBack',
													__('easeInOutBack', 'Smart-One-Page-Navigation') 		=> 'easeInOutBack',
													__('easeInBounce', 'Smart-One-Page-Navigation') 		=> 'easeInBounce',
													__('easeOutBounce', 'Smart-One-Page-Navigation') 		=> 'easeOutBounce',
													__('easeInOutBounce', 'Smart-One-Page-Navigation') 	=> 'easeInOutBounce',
												);
				
				$animation_listing			=	array(
													__('No Animation', 'Smart-One-Page-Navigation') => 		'no_animation',
													
													__('bounce', 'Smart-One-Page-Navigation') => 				'bounce',
													__('flash', 'Smart-One-Page-Navigation') => 				'flash',
													__('pulse', 'Smart-One-Page-Navigation') => 				'pulse',
													__('rubberBand', 'Smart-One-Page-Navigation') => 			'rubberBand',
													__('shake', 'Smart-One-Page-Navigation') => 				'shake',
													__('swing', 'Smart-One-Page-Navigation') => 				'swing',
													__('tada', 'Smart-One-Page-Navigation') => 				'tada',
													__('wobble', 'Smart-One-Page-Navigation') => 				'wobble',
													__('jello', 'Smart-One-Page-Navigation') => 				'jello',
													__('bounceIn', 'Smart-One-Page-Navigation') => 			'bounceIn',
													__('bounceInDown', 'Smart-One-Page-Navigation') => 		'bounceInDown',
													__('bounceInLeft', 'Smart-One-Page-Navigation') => 		'bounceInLeft',
													__('bounceInRight', 'Smart-One-Page-Navigation') => 		'bounceInRight',
													__('bounceInUp', 'Smart-One-Page-Navigation') => 			'bounceInUp',													
													__('fadeIn', 'Smart-One-Page-Navigation') => 				'fadeIn',
													__('fadeInDown', 'Smart-One-Page-Navigation') => 			'fadeInDown',
													__('fadeInDownBig', 'Smart-One-Page-Navigation') => 		'fadeInDownBig',
													__('fadeInLeft', 'Smart-One-Page-Navigation') => 			'fadeInLeft',
													__('fadeInLeftBig', 'Smart-One-Page-Navigation') => 		'fadeInLeftBig',
													__('fadeInRight', 'Smart-One-Page-Navigation') => 		'fadeInRight',
													__('fadeInRightBig', 'Smart-One-Page-Navigation') => 		'fadeInRightBig',
													__('fadeInUp', 'Smart-One-Page-Navigation') => 			'fadeInUp',
													__('fadeInUpBig', 'Smart-One-Page-Navigation') => 		'fadeInUpBig',													
													__('flipInX', 'Smart-One-Page-Navigation') => 			'flipInX',
													__('flipInY', 'Smart-One-Page-Navigation') => 			'flipInY',													
													__('lightSpeedIn', 'Smart-One-Page-Navigation') => 		'lightSpeedIn',
													__('rotateIn', 'Smart-One-Page-Navigation') => 			'rotateIn',
													__('rotateInDownLeft', 'Smart-One-Page-Navigation') => 	'rotateInDownLeft',
													__('rotateInDownRight', 'Smart-One-Page-Navigation') => 	'rotateInDownRight',
													__('rotateInUpLeft', 'Smart-One-Page-Navigation') => 		'rotateInUpLeft',
													__('rotateInUpRight', 'Smart-One-Page-Navigation') => 	'rotateInUpRight',													
													__('hinge', 'Smart-One-Page-Navigation') => 				'hinge',
													__('rollIn', 'Smart-One-Page-Navigation') => 				'rollIn',													
													__('zoomIn', 'Smart-One-Page-Navigation') => 				'zoomIn',
													__('zoomInDown', 'Smart-One-Page-Navigation') => 			'zoomInDown',
													__('zoomInLeft', 'Smart-One-Page-Navigation') => 			'zoomInLeft',
													__('zoomInRight', 'Smart-One-Page-Navigation') => 		'zoomInRight',
													__('zoomInUp', 'Smart-One-Page-Navigation') => 			'zoomInUp',													
													__('slideInDown', 'Smart-One-Page-Navigation') => 		'slideInDown',
													__('slideInLeft', 'Smart-One-Page-Navigation') => 		'slideInLeft',
													__('slideInRight', 'Smart-One-Page-Navigation') => 		'slideInRight',
													__('slideInUp', 'Smart-One-Page-Navigation') => 			'slideInUp',													
												);
				$animation_builder0 		=	array(
													'admin_label' 	=> true,
													'type' 			=> 'dropdown',
													'heading' 		=> __('Animation Name', 'Smart-One-Page-Navigation'),
													'param_name' 	=> 'animation_name',
													'description' 	=> __(	'CSS3 animations allows animation of most HTML elements without using JavaScript or Flash!
																			<a target="_blank" href="http://www.w3schools.com/css/css3_animations.asp">Example</a>', 'Smart-One-Page-Navigation'),
													'value' 		=> $animation_listing,
													'group'			=> $group_animation_builder,
												);									
				$animation_builder1 		=	array(
													'admin_label' 	=> true,
													'type' 			=> 'textfield',
													'heading' 		=> __('Animation Duration', 'Smart-One-Page-Navigation'),
													'param_name' 	=> 'animation_duration',
													'description' 	=> __(	'Make the animation complete in few seconds.
																			<a target="_blank" href="http://www.w3schools.com/cssref/css3_pr_animation-duration.asp">Example</a>.<br>
																			<strong>Example:</strong> <code>5s</code>, <code>1.5s</code>, <code>6s</code>.', 'Smart-One-Page-Navigation'),																								
													'dependency' 	=> 	array(
																			'element'			 	=> 'animation_name',
																			'value_not_equal_to' 	=> array('no_animation'),
																		),
													'group'			=> $group_animation_builder,					
												);
				$animation_builder2 		=	array(
													'admin_label' 	=> true,
													'type' 			=> 'textfield',
													'heading' 		=> __('Animation Timing Function', 'Smart-One-Page-Navigation'),
													'param_name' 	=> 'animation_timming_function',
													'description' 	=> __(	'The <code>animation-timing-function</code> specifies the speed curve of an animation.
																			<a target="_blank" href="http://www.w3schools.com/cssref/css3_pr_animation-timing-function.asp">Example</a>.<br>
																			<strong>Example:</strong> <code>linear</code>, <code>ease</code>, <code>ease-in</code>, <code>ease-out</code>, <code>ease-in-out</code>, 
																			<code>cubic-bezier(n,n,n,n)</code>.<br>If blank, defaults to <code>linear</code>', 'Smart-One-Page-Navigation'),
													'dependency' 	=> 	array(
																			'element'			 	=> 'animation_name',
																			'value_not_equal_to' 	=> array('no_animation'),
																		),
													'group'			=> $group_animation_builder,					
												);	
				$animation_builder3 		=	array(
													'admin_label' 	=> true,
													'type' 			=> 'textfield',
													'heading' 		=> __('Animation Delay', 'Smart-One-Page-Navigation'),
													'param_name' 	=> 'animation_delay',
													'description' 	=> __(	'The <code>animation-delay</code> property specifies a delay for the start of an animation.
																			<a target="_blank" href="http://www.w3schools.com/cssref/css3_pr_animation-delay.asp">Example</a>.
																			<strong>Example:</strong> <code>1s</code>, <code>2s</code>, <code>2.5s</code>. If blank, defaults to <code>0s</code>', 'Smart-One-Page-Navigation'),
													'dependency' 	=> 	array(
																			'element'			 	=> 'animation_name',
																			'value_not_equal_to' 	=> array('no_animation'),
																		),
													'group'			=> $group_animation_builder,					
												);								
				
				/*Container*/
				vc_map(
					array(
						'name' 				=> 	__('Smart One Page Navigation Container', 'Smart-One-Page-Navigation'),
						'base' 				=> 	'op_container',
						'content_element' 	=> 	true,
						'is_container' 		=> 	true,					
						'js_view' 			=> 	'VcColumnView',
						'as_parent' 		=> 	array('only' => 'op_item,op_custom_menu'), /*op_item, op_item*/
						'category' 			=> 	$group_category,
						'icon'				=> 	OP_BETE_PLUGIN_URL.'assets/back-end/images/op-shortcode.png',
						'params'			=> 	array(
													//nav contr
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Main Navigation Styles', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'mnav_style',
														'value' 		=> array(
																			__('Hidden', 'Smart-One-Page-Navigation') => 'hidden',
																			__('Classic', 'Smart-One-Page-Navigation') => 'classic',
																			__('Hamburger Menu', 'Smart-One-Page-Navigation') => 'hamburger-menu',																																																																							
																		),
														'group'			=> $group_navigation_settings,				
													),
													
													//Hamburger Menu
														array(
															'admin_label' 	=> true,
															'type' 			=> 'dropdown',
															'heading' 		=> __('Hamburger Menu - Logo Position', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'hamburger_logo_pos',
															'value' 		=> array(
																				__('Left', 'Smart-One-Page-Navigation') => '0',
																				__('Right', 'Smart-One-Page-Navigation') => '1',
																				__('Center', 'Smart-One-Page-Navigation') => '2',																																																																																									
																			),
															'dependency' 	=> 	array(
																				'element'			 	=> 'mnav_style',
																				'value' 				=> array('hamburger-menu'),
																			),
															'group'			=> $group_navigation_settings,		
														),
														array(
															'admin_label' 	=> true,
															'type' 			=> 'dropdown',
															'heading' 		=> __('Hamburger Menu - Icon Position', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'hamburger_icon_pos',
															'value' 		=> array(
																				__('Left', 'Smart-One-Page-Navigation') => '0',
																				__('Right', 'Smart-One-Page-Navigation') => '1',																																																																																																												
																			),
															'dependency' 	=> 	array(
																				'element'			 	=> 'mnav_style',
																				'value' 				=> array('hamburger-menu'),
																			),
															'group'			=> $group_navigation_settings,		
														),														
														array(
															'admin_label' 	=> true,
															'type' 			=> 'dropdown',
															'heading' 		=> __('Hamburger Menu Style', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'hamburger_menu_style',
															'value' 		=> array(
																				__('Side Menu - Left', 'Smart-One-Page-Navigation') => '0',
																				__('Side Menu - Right', 'Smart-One-Page-Navigation') => '1',																																																																																									
																			),
															'dependency' 	=> 	array(
																				'element'			 	=> 'mnav_style',
																				'value' 				=> array('hamburger-menu'),
																			),
															'group'			=> $group_navigation_settings,		
														),
													//Hamburger Menu
													
													//nav Width
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Main Navigation Width', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'content_width',
														'value' 		=> array(
																			__('Full Width', 'Smart-One-Page-Navigation') => '0',
																			__('Bootstrap Container', 'Smart-One-Page-Navigation') => '1',
																			__('Custom', 'Smart-One-Page-Navigation') => '2',																																																																																									
																		),
														'dependency' 	=> 	array(
																			'element'			 	=> 'mnav_style',
																			'value_not_equal_to' 	=> array('hidden'),
																		),
														'group'			=> $group_navigation_settings,		
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Main Navigation Width - Small devices (tablets, 768px and up)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'width_small',
														'description'	=> __('Example: <code>780px</code> ... If blank, defaults to <code>750px</code>', 'Smart-One-Page-Navigation'),
														'dependency' 	=> 	array(
																				'element' 	=> 'content_width',
																				'value'		=> array('2'),
																			),
														'group'			=> $group_navigation_settings,									
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Main Navigation Width - Medium devices (desktops, 992px and up)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'width_medium',
														'description'	=> __('Example: <code>1000px</code> ... If blank, defaults to <code>970px</code>', 'Smart-One-Page-Navigation'),
														'dependency' 	=> 	array(
																				'element' 	=> 'content_width',
																				'value'		=> array('2'),
																			),
														'group'			=> $group_navigation_settings,									
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Main Navigation Width - Large devices (large desktops, 1200px and up)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'width_large',
														'description'	=> __('Example: <code>1200px</code> ... If blank, defaults to <code>1170px</code>', 'Smart-One-Page-Navigation'),
														'dependency' 	=> 	array(
																				'element' 	=> 'content_width',
																				'value'		=> array('2'),
																			),
														'group'			=> $group_navigation_settings,									
													),
													
													//nav Width
													
													//nav height
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Main Navigation Height', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'nav_height',
														'description'	=> __('Example: <code>60px</code>, <code>70px</code> ... If blank, defaults to <code>80px</code>', 'Smart-One-Page-Navigation'),
														'dependency' 	=> 	array(
																			'element'			 	=> 'mnav_style',
																			'value_not_equal_to' 	=> array('hidden'),
																		),
														'group'			=> $group_navigation_settings,									
													),	
													//nav height
													
													array(
														'admin_label' 	=> true,
														'type' 			=> 'attach_image',
														'heading' 		=> __('Main Navigation - Logo Image', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'logo',
														'dependency' 	=> 	array(
																			'element'			 	=> 'mnav_style',
																			'value_not_equal_to' 	=> array('hidden'),
																		),
														'group'			=> $group_navigation_settings,				
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'attach_image',
														'heading' 		=> __('Main Navigation - Retina Logo (optional)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'logo_retina',
														'dependency' 	=> 	array(
																			'element'			 	=> 'mnav_style',
																			'value_not_equal_to' 	=> array('hidden'),
																		),
														'group'			=> $group_navigation_settings,				
													),
													
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Sticky Navigation', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'mnav_sticky',
														'description' 	=> __('Will always be activated when "FullPage" is enable.', 'Smart-One-Page-Navigation'),
														'value' 		=> array(
																			__('Yes', 'Smart-One-Page-Navigation') => 'yes',
																			__('No', 'Smart-One-Page-Navigation') => 'no',																																																				
																		),
														'dependency' 	=> 	array(
																			'element'			 	=> 'mnav_style',
																			'value_not_equal_to' 	=> array('hidden'),
																		),
														'group'			=> $group_navigation_settings,								
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Sticky Navigation Height', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'mnav_sticky_height',
														'description'	=> __('Example: <code>60px</code>, <code>70px</code> ... If blank, defaults to <code>80px</code>', 'Smart-One-Page-Navigation'),
														'dependency' 	=> 	array(
																			'element'			 	=> 'mnav_sticky',
																			'value' 				=> array('yes'),
																		),
														'group'			=> $group_navigation_settings,									
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Sticky Navigation Behavior', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'mnav_sticky_behavior',
														'value' 		=> array(
																			__('When Page Is Scrolled Down & Past The First Page', 'Smart-One-Page-Navigation') => '0',
																			__('Only Appears When Page Is Scrolled Up', 'Smart-One-Page-Navigation') => '1',
																			__('Always Visible', 'Smart-One-Page-Navigation') => '2',
																			__('When Page Is Scrolled Down & Past The Second Page', 'Smart-One-Page-Navigation') => '3',																																																				
																		),
														'dependency' 	=> 	array(
																			'element'			 	=> 'mnav_sticky',
																			'value' 				=> array('yes'),
																		),
														'group'			=> $group_navigation_settings,								
													),
													
													array(
														'admin_label' 	=> true,
														'type' 			=> 'attach_image',
														'heading' 		=> __('Sticky Navigation - Logo Image', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'st_logo',
														'dependency' 	=> 	array(
																			'element'			 	=> 'mnav_sticky',
																			'value' 				=> array('yes'),
																		),
														'group'			=> $group_navigation_settings,				
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'attach_image',
														'heading' 		=> __('Sticky Navigation - Retina Logo (optional)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'st_logo_retina',
														'dependency' 	=> 	array(
																			'element'			 	=> 'mnav_sticky',
																			'value' 				=> array('yes'),
																		),
														'group'			=> $group_navigation_settings,				
													),
													
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Logo Link', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'logo_link',
														'description'	=> __('Example: <code>http://themeforest.net</code>, <code>http://codecanyon.net/</code> ...', 'Smart-One-Page-Navigation'),
														'dependency' 	=> 	array(
																			'element'			 	=> 'mnav_style',
																			'value_not_equal_to' 	=> array('hidden'),
																		),
														'group'			=> $group_navigation_settings,									
													),
													
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Full Screen Mode Button', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'fullscreen',
														'value' 		=> array(
																			__('On', 'Smart-One-Page-Navigation') 	=> 'on',
																			__('Off', 'Smart-One-Page-Navigation') 	=> 'off',																																																																																									
																		),
														'dependency' 	=> 	array(
																			'element'			 	=> 'mnav_style',
																			'value_not_equal_to' 	=> array('hidden'),
																		),
														'group'			=> $group_navigation_settings,									
													),	
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Sub Navigation Styles', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'snav_style',
														'value' 		=> array(
																			__('Hidden', 'Smart-One-Page-Navigation') => 'hidden',
																			__('Style 1', 'Smart-One-Page-Navigation') => 'style-1',
																			__('Style 2', 'Smart-One-Page-Navigation') => 'style-2',
																			__('Style 3', 'Smart-One-Page-Navigation') => 'style-3',	
																			__('Style 4', 'Smart-One-Page-Navigation') => 'style-4',
																			__('Style 5', 'Smart-One-Page-Navigation') => 'style-5',
																			__('Style 6', 'Smart-One-Page-Navigation') => 'style-6',																																																																							
																		),
														'group'			=> $group_navigation_settings,				
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Sub Navigation Behavior', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'snav_behavior',
														'value' 		=> array(
																			__('Only Appears When Page Is Scrolled Down', 'Smart-One-Page-Navigation') => '0',
																			__('Always Visible', 'Smart-One-Page-Navigation') => '1',																																																				
																		),
														'dependency' 	=> 	array(
																			'element'			 	=> 'snav_style',
																			'value_not_equal_to' 	=> array('hidden'),
																		),
														'group'			=> $group_navigation_settings,								
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Sub Navigation Position', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'snav_position',
														'value' 		=> array(
																			__('Right', 'Smart-One-Page-Navigation') 	=> 'style-right',
																			//__('Top', 'Smart-One-Page-Navigation') 	=> 'top',
																			__('Bottom', 'Smart-One-Page-Navigation') => 'style-bottom',
																			__('Left', 'Smart-One-Page-Navigation') 	=> 'style-left',																																																																							
																		),
														'dependency' 	=> 	array(
																			'element'			 	=> 'snav_style',
																			'value_not_equal_to' 	=> array('hidden'),
																		),
														'group'			=> $group_navigation_settings,									
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Extra Class Name', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'ext_class',													
														'group'			=> $group_navigation_settings,									
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Scroll Next(Prev) Item Effect', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'scroll_effect',
														'description' 	=> __('Easing functions specify the speed at which an animation progresses at different points within the animation. <a target="_blank" href="http://api.jqueryui.com/easings/">Example</a>.', 'Smart-One-Page-Navigation'),
														'value' 		=> $scroll_effect,														
														'group'			=> $group_navigation_settings,									
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Scroll Next(Prev) Item Speed', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'scroll_speed',
														'description' 	=> __('Unit: milisecond (1000 milisecond = 1 second). If blank, defaults to <code>1000</code>', 'Smart-One-Page-Navigation'),
														'group'			=> $group_navigation_settings,									
													),														
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Facebook Link', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'facebook_link',
														'group'			=> $group_navigation_settings,									
													),	
													
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Instagram Link', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'instagram_link',
														'group'			=> $group_navigation_settings,									
													),														
													//nav contr
													
													//color
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Main Navigation Background', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'nav_bg',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>#FFFFFF</code>', 'Smart-One-Page-Navigation'),	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Main Navigation Shadow', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'nav_shadow',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>transparent</code>', 'Smart-One-Page-Navigation'),	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Main Navigation - Separator Color', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'nav_separator_color',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>rgba(0,0,0,0.05)</code>', 'Smart-One-Page-Navigation'),	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Main Navigation - Menu Item Background (HOVER)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'nav_hover_bg',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>transparent</code>', 'Smart-One-Page-Navigation'),	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Main Navigation - Menu Item Background (ACTIVE)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'nav_active_bg',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>transparent</code>', 'Smart-One-Page-Navigation'),	
													),													
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Main Navigation - Menu Item Color', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'nav_text_color',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>#000000</code>', 'Smart-One-Page-Navigation'),	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Main Navigation - Menu Item Color (HOVER)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'nav_text_hover_color',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>#999999</code>', 'Smart-One-Page-Navigation'),	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Main Navigation - Menu Item Color (ACTIVE)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'nav_text_active_color',
														'group'			=> $group_color,	
														'description' 	=> __('If blank, defaults to <code>#999999</code> <hr>', 'Smart-One-Page-Navigation'),
													),
														/*dropdown*/
														array(
															'admin_label' 	=> true,
															'type'			=> 'colorpicker',
															'heading' 		=> __('Main Navigation - Dropdown Menu Background', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'dd_nav_bg',
															'group'			=> $group_color,
															'description' 	=> __('If blank, defaults to <code>#FFFFFF</code>', 'Smart-One-Page-Navigation'),	
														),
														array(
															'admin_label' 	=> true,
															'type'			=> 'colorpicker',
															'heading' 		=> __('Main Navigation - Dropdown Menu - Separator Color', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'dd_nav_separator_color',
															'group'			=> $group_color,
															'description' 	=> __('If blank, defaults to <code>#000000</code>', 'Smart-One-Page-Navigation'),	
														),														
														array(
															'admin_label' 	=> true,
															'type'			=> 'colorpicker',
															'heading' 		=> __('Main Navigation - Dropdown Menu Item Background (HOVER)', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'dd_nav_hover_bg',
															'group'			=> $group_color,
															'description' 	=> __('If blank, defaults to <code>#FFFFFF</code>', 'Smart-One-Page-Navigation'),	
														),																									
														array(
															'admin_label' 	=> true,
															'type'			=> 'colorpicker',
															'heading' 		=> __('Main Navigation - Dropdown Menu Item Color', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'dd_nav_text_color',
															'group'			=> $group_color,
															'description' 	=> __('If blank, defaults to <code>#000000</code>', 'Smart-One-Page-Navigation'),	
														),
														array(
															'admin_label' 	=> true,
															'type'			=> 'colorpicker',
															'heading' 		=> __('Main Navigation - Dropdown Menu Item Color (HOVER)', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'dd_nav_text_hover_color',
															'group'			=> $group_color,
															'description' 	=> __('If blank, defaults to <code>#999999</code> <hr>', 'Smart-One-Page-Navigation'),	
														),														
														/*dropdown*/													
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Sticky Navigation Background', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'stnav_bg',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>inherit from main navigation</code>', 'Smart-One-Page-Navigation'),	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Sticky Navigation Shadow', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'stnav_shadow',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>inherit from main navigation</code>', 'Smart-One-Page-Navigation'),	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Sticky Navigation - Separator Color', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'stnav_separator_color',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>inherit from main navigation</code>', 'Smart-One-Page-Navigation'),	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Sticky Navigation - Menu Item Background (HOVER)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'stnav_hover_bg',
														'group'			=> $group_color,	
														'description' 	=> __('If blank, defaults to <code>inherit from main navigation</code>', 'Smart-One-Page-Navigation'),
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Sticky Navigation - Menu Item Background (ACTIVE)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'stnav_active_bg',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>inherit from main navigation</code>', 'Smart-One-Page-Navigation'),	
													),			
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Sticky Navigation - Menu Item Color', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'stnav_text_color',
														'group'			=> $group_color,	
														'description' 	=> __('If blank, defaults to <code>inherit from main navigation</code>', 'Smart-One-Page-Navigation'),
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Sticky Navigation - Menu Item Color (HOVER)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'stnav_text_hover_color',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>inherit from main navigation</code>', 'Smart-One-Page-Navigation'),	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Sticky Navigation - Menu Item Color (ACTIVE)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'stnav_text_active_color',
														'group'			=> $group_color,	
														'description' 	=> __('If blank, defaults to <code>inherit from main navigation</code> <hr>', 'Smart-One-Page-Navigation'),
													),
														/*dropdown*/
														array(
															'admin_label' 	=> true,
															'type'			=> 'colorpicker',
															'heading' 		=> __('Sticky Navigation - Dropdown Menu Background', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'dd_stnav_bg',
															'group'			=> $group_color,
															'description' 	=> __('If blank, defaults to <code>inherit from main navigation - dropdown menu</code>', 'Smart-One-Page-Navigation'),	
														),
														array(
															'admin_label' 	=> true,
															'type'			=> 'colorpicker',
															'heading' 		=> __('Sticky Navigation - Dropdown Menu - Separator Color', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'dd_stnav_separator_color',
															'group'			=> $group_color,
															'description' 	=> __('If blank, defaults to <code>inherit from main navigation - dropdown menu</code>', 'Smart-One-Page-Navigation'),	
														),															
														array(
															'admin_label' 	=> true,
															'type'			=> 'colorpicker',
															'heading' 		=> __('Sticky Navigation - Dropdown Menu Item Background (HOVER)', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'dd_stnav_hover_bg',
															'group'			=> $group_color,
															'description' 	=> __('If blank, defaults to <code>inherit from main navigation - dropdown menu</code>', 'Smart-One-Page-Navigation'),	
														),																									
														array(
															'admin_label' 	=> true,
															'type'			=> 'colorpicker',
															'heading' 		=> __('Sticky Navigation - Dropdown Menu Item Color', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'dd_stnav_text_color',
															'group'			=> $group_color,
															'description' 	=> __('If blank, defaults to <code>inherit from main navigation - dropdown menu</code>', 'Smart-One-Page-Navigation'),	
														),
														array(
															'admin_label' 	=> true,
															'type'			=> 'colorpicker',
															'heading' 		=> __('Sticky Navigation - Dropdown Menu Item Color (HOVER)', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'dd_stnav_text_hover_color',
															'group'			=> $group_color,
															'description' 	=> __('If blank, defaults to <code>inherit from main navigation - dropdown menu</code> <hr>', 'Smart-One-Page-Navigation'),	
														),														
														/*dropdown*/
														
													/*mobile menu*/	
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Mobile Menu Background (or Hamburger Menu)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'mobile_bg',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>inherit from main navigation & sticky navigation</code>', 'Smart-One-Page-Navigation'),	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Mobile Menu (or Hamburger Menu) - Separator Color', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'mobile_separator_color',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>inherit from main navigation & sticky navigation</code>', 'Smart-One-Page-Navigation'),	
													),															
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Mobile Menu (or Hamburger Menu) Item Background (HOVER)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'mobile_hover_bg',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>inherit from main navigation & sticky navigation</code>', 'Smart-One-Page-Navigation'),	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Mobile Menu (or Hamburger Menu) Item Background (ACTIVE)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'mobile_active_bg',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>inherit from main navigation & sticky navigation</code>', 'Smart-One-Page-Navigation'),	
													),																										
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Mobile Menu (or Hamburger Menu) Item Color', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'mobile_text_color',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>inherit from main navigation & sticky navigation</code>', 'Smart-One-Page-Navigation'),	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Mobile Menu (or Hamburger Menu) Item Color (HOVER)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'mobile_text_hover_color',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>inherit from main navigation & sticky navigation</code>', 'Smart-One-Page-Navigation'),	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Mobile Menu (or Hamburger Menu) Item Color (ACTIVE)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'mobile_text_active_color',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>inherit from main navigation & sticky navigation</code> <hr>', 'Smart-One-Page-Navigation'),	
													),		
													/*mobile menu*/	
													
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Sub Navigation Background', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'snav_bg',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>rgba(0,0,0,0.1)</code>', 'Smart-One-Page-Navigation'),	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Sub Navigation - Tooltip Background', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'snav_tooltip_bg',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>#000000</code>', 'Smart-One-Page-Navigation'),	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Sub Navigation - Tooltip Color', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'snav_tooltip_color',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>#FFFFFF</code>', 'Smart-One-Page-Navigation'),	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Sub Navigation - Item Color', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'snav_item_color',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>#000000</code>', 'Smart-One-Page-Navigation'),	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Sub Navigation - Item Color (HOVER)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'snav_item_hover_color',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>#999999</code>', 'Smart-One-Page-Navigation'),	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Sub Navigation - Item Background Color (HOVER)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'snav_item_bg_hover_color',
														'group'			=> $group_color,
														'description' 	=> __('If blank, defaults to <code>transparent</code>', 'Smart-One-Page-Navigation'),	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Sub Navigation - Item Color (ACTIVE)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'snav_item_active_color',
														'group'			=> $group_color,	
														'description' 	=> __('If blank, defaults to <code>#999999</code>', 'Smart-One-Page-Navigation'),
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Sub Navigation - Item Background Color (ACTIVE)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'snav_item_bg_active_color',
														'group'			=> $group_color,	
														'description' 	=> __('If blank, defaults to <code>transparent</code>', 'Smart-One-Page-Navigation'),
													),
													//color	
													
													//typography
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Main Navigation Font (Support Google font)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'nav_font',
														'description' 	=> __('	Enter font-family name here. Google Fonts are supported. 
																				For example, if you choose "Open Sans" <a href="http://www.google.com/fonts/" target="_blank">Google Font</a> 
																				with font-weight 400,500,600, enter <code>Open Sans:400,500,600</code>', 'Smart-One-Page-Navigation'),															
														'group'			=> $group_typography,					
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Main Navigation Font Size', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'nav_font_size',
														'description' 	=> __('<strong>Example:</strong> <code>14px</code>, <code>16px</code> ... If blank, defaults to <code>12px</code>', 'Smart-One-Page-Navigation'),															
														'group'			=> $group_typography,					
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Main Navigation Font Weight', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'nav_font_weight',
														'value' 		=> array(	
																			__('Normal', 'Smart-One-Page-Navigation') => 'normal',																		
																			__('Bold', 'Smart-One-Page-Navigation') => 'bold',																			
																			__('300', 'Smart-One-Page-Navigation') => '300',
																			__('400', 'Smart-One-Page-Navigation') => '400',	
																			__('500', 'Smart-One-Page-Navigation') => '500',	
																			__('600', 'Smart-One-Page-Navigation') => '600',																		
																			__('700', 'Smart-One-Page-Navigation') => '700',
																			__('800', 'Smart-One-Page-Navigation') => '800',
																			__('900', 'Smart-One-Page-Navigation') => '900',																																				
																		),
														'group'			=> $group_typography,					
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Main Navigation Letter Spacing', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'nav_letter_spacing',
														'description' 	=> __('<strong>Example:</strong> <code>2px</code>, <code>0.1em</code> ... If blank, defaults to <code>1px</code>', 'Smart-One-Page-Navigation'),															
														'group'			=> $group_typography,					
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Sub Navigation Font (Support Google font)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'snav_font',
														'description' 	=> __('	Enter font-family name here. Google Fonts are supported. 
																				For example, if you choose "Open Sans" <a href="http://www.google.com/fonts/" target="_blank">Google Font</a> 
																				with font-weight 400,500,600, enter <code>Open Sans:400,500,600</code>', 'Smart-One-Page-Navigation'),															
														'group'			=> $group_typography,					
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Sub Navigation Font Size', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'snav_font_size',
														'description' 	=> __('<strong>Example:</strong> <code>12px</code>, <code>15px</code> ... If blank, defaults to <code>14px</code>', 'Smart-One-Page-Navigation'),															
														'group'			=> $group_typography,					
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Sub Navigation Font Weight', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'snav_font_weight',
														'value' 		=> array(
																			__('Normal', 'Smart-One-Page-Navigation') => 'normal',
																			__('Bold', 'Smart-One-Page-Navigation') => 'bold',																			
																			__('300', 'Smart-One-Page-Navigation') => '300',
																			__('400', 'Smart-One-Page-Navigation') => '400',	
																			__('500', 'Smart-One-Page-Navigation') => '500',
																			__('600', 'Smart-One-Page-Navigation') => '600',
																			__('700', 'Smart-One-Page-Navigation') => '700',
																			__('800', 'Smart-One-Page-Navigation') => '800',
																			__('900', 'Smart-One-Page-Navigation') => '900',																																				
																		),
														'group'			=> $group_typography,					
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Sub Navigation Letter Spacing', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'snav_letter_spacing',
														'description' 	=> __('<strong>Example:</strong> <code>2px</code>, <code>0.1em</code> ... If blank, defaults to <code>0</code>', 'Smart-One-Page-Navigation'),															
														'group'			=> $group_typography,					
													),
													//typography
													
													//fullpage
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Fullscreen Scrolling - FullPage.js', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'fullscreen_scroll',
														'description' 	=> __('	It allows the creation of fullscreen scrolling websites - 
																				<a href="http://alvarotrigo.com/fullPage/" target="_blank">Example</a>', 'Smart-One-Page-Navigation'),
														'value' 		=> array(
																			__('No', 'Smart-One-Page-Navigation') => 'no',
																			__('Yes', 'Smart-One-Page-Navigation') => 'yes',																																																																							
																		),
														'group'			=> $group_fullpage_settings,				
													),	
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('FullPage - LoopTop', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'fp_looptop',
														'description' 	=> __('(default <code>no</code>) - Defines whether scrolling up in the first section should scroll to the last one or not.', 'Smart-One-Page-Navigation'),
														'value' 		=> array(
																			__('No', 'Smart-One-Page-Navigation') 	=> 'no',
																			__('Yes', 'Smart-One-Page-Navigation') 	=> 'yes',																																																																																										
																		),
														'dependency' 	=> 	array(
																			'element'			 	=> 'fullscreen_scroll',
																			'value' 				=> array('yes'),
																		),
														'group'			=> $group_fullpage_settings,									
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('FullPage - LoopBottom', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'fp_loopbottom',
														'description' 	=> __('(default <code>no</code>) - Defines whether scrolling down in the last section should scroll to the first one or not.', 'Smart-One-Page-Navigation'),
														'value' 		=> array(
																			__('No', 'Smart-One-Page-Navigation') 	=> 'no',
																			__('Yes', 'Smart-One-Page-Navigation') 	=> 'yes',																																																																																										
																		),
														'dependency' 	=> 	array(
																			'element'			 	=> 'fullscreen_scroll',
																			'value' 				=> array('yes'),
																		),
														'group'			=> $group_fullpage_settings,									
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('FullPage - Show Scrollbar', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'fp_scrollbar',
														'description' 	=> __('(default <code>no</code>) - Determines whether to use scrollbar for the site or not.', 'Smart-One-Page-Navigation'),
														'value' 		=> array(
																			__('No', 'Smart-One-Page-Navigation') 	=> 'no',
																			__('Yes', 'Smart-One-Page-Navigation') 	=> 'yes',																																																																																										
																		),
														'dependency' 	=> 	array(
																			'element'			 	=> 'fullscreen_scroll',
																			'value' 				=> array('yes'),
																		),
														'group'			=> $group_fullpage_settings,									
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('FullPage - CSS3', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'fp_css3',
														'description' 	=> __('(default <code>yes</code>) - Defines whether to use JavaScript or CSS3 transforms to scroll within sections and slides.', 'Smart-One-Page-Navigation'),
														'value' 		=> array(
																			__('Yes', 'Smart-One-Page-Navigation') 	=> 'yes',
																			__('No', 'Smart-One-Page-Navigation') 	=> 'no',																																																																																										
																		),
														'dependency' 	=> 	array(
																			'element'			 	=> 'fullscreen_scroll',
																			'value' 				=> array('yes'),
																		),
														'group'			=> $group_fullpage_settings,									
													),		
													
													//Page Loading...
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Page Loading...', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'loading_style',
														'description' 	=> __('	If this option is enabled, before your page loaded - will have a coating on the entire content. 
																				Simple loading spinners animated with CSS. See <a href="http://tobiasahlin.com/spinkit/" target="_blank">demo</a>', 'Smart-One-Page-Navigation'),
														'value' 		=> array(
																			__('Hidden', 'Smart-One-Page-Navigation') => 'hidden',
																			__('Enable - Style: rotating-plane', 'Smart-One-Page-Navigation') => 'rotating-plane',
																			__('Enable - Style: double-bounce', 'Smart-One-Page-Navigation') => 'double-bounce',
																			__('Enable - Style: wave', 'Smart-One-Page-Navigation') => 'wave',
																			__('Enable - Style: wandering-cubes', 'Smart-One-Page-Navigation') => 'wandering-cubes',
																			__('Enable - Style: spinner-pulse', 'Smart-One-Page-Navigation') => 'spinner-pulse',
																			__('Enable - Style: chasing-dots', 'Smart-One-Page-Navigation') => 'chasing-dots',
																			__('Enable - Style: three-bounce', 'Smart-One-Page-Navigation') => 'three-bounce',
																			__('Enable - Style: circle', 'Smart-One-Page-Navigation') => 'circle',
																			__('Enable - Style: cube-grid', 'Smart-One-Page-Navigation') => 'cube-grid',
																			__('Enable - Style: fading-circle', 'Smart-One-Page-Navigation') => 'fading-circle',
																			__('Enable - Style: folding-cube', 'Smart-One-Page-Navigation') => 'folding-cube',																																																																							
																		),
														'group'			=> $group_pageloading_settings,				
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Loading - Background Color', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'loading_bg_color',
														'group'			=> $group_pageloading_settings,	
														'description' 	=> __('If blank, defaults to <code>#FFFFFF</code>', 'Smart-One-Page-Navigation'),
													),	
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Loading - Color', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'loading_color',
														'group'			=> $group_pageloading_settings,	
														'description' 	=> __('If blank, defaults to <code>#111111</code>', 'Smart-One-Page-Navigation'),
													),																							
												),
					)
				);
				/*Container*/
				
				/*Item*/
				vc_map(
					array(
						'name' 				=> 	__('Smart One Page Navigation Item', 'Smart-One-Page-Navigation'),
						'base' 				=> 	'op_item',
						'content_element' 	=> 	true,
						'is_container' 		=> 	true,					
						'js_view' 			=> 'VcColumnView',
						'as_child' 			=> 	array('only' => 'op_container'),
						'category' 			=>	$group_category,
						'icon'				=> 	OP_BETE_PLUGIN_URL.'assets/back-end/images/op-shortcode-item.png',
						'params'			=> 	array(
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Menu Name', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'item_name',
														'description'	=> __('Example: <code>Business</code>', 'Smart-One-Page-Navigation'),
														'group'			=> $group_display_options,
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Menu Name Alias', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'item_name_alias',
														'description'	=> __('Example: <code>business-alias</code>', 'Smart-One-Page-Navigation'),
														'group'			=> $group_display_options,
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Menu Icon', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'item_icon',
														'value' 		=> array(
																			__('No Icon', 'Smart-One-Page-Navigation') 		=> 'no',
																			__('Font Awesome', 'Smart-One-Page-Navigation') 	=> 'font',
																			__('Image', 'Smart-One-Page-Navigation') 			=> 'image',																																																																							
																		),	
														'group'			=> $group_display_options,																					
													),		
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Icon (Font)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'icon_font',
														'description'	=> __(	'<strong>Example:</strong> <code>fa fa-home</code>, <code>fa fa-heart</code>, <code>fa fa-cogs</code> ...
																				<a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">Library</a>', 'Smart-One-Page-Navigation'),
														'dependency' 	=> 	array(
																				'element' 	=> 'item_icon',
																				'value'		=> array('font'),
																		),
														'group'			=> $group_display_options,					
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'attach_image',
														'heading' 		=> __('Icon (Image)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'icon_image',
														'description' 	=> __('The minimum size of the icon is (20px * 20px) - Recommended is (40px * 40px) to be able to look good on screen Retina.', 'Smart-One-Page-Navigation'),
														'dependency' 	=> 	array(
																				'element'	=> 'item_icon',
																				'value' 	=> array('image'),
																			),
														'group'			=> $group_display_options,					
													),
													
													//Content Width
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Content Width', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'content_width',
														'value' 		=> array(
																			__('Full Width', 'Smart-One-Page-Navigation') => '0',
																			__('Bootstrap Container', 'Smart-One-Page-Navigation') => '1',
																			__('Custom', 'Smart-One-Page-Navigation') => '2',																																																																																									
																		),
														'group'			=> $group_display_options,				
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Content Width - Small devices (tablets, 768px and up)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'width_small',
														'description'	=> __('Example: <code>780px</code> ... If blank, defaults to <code>750px</code>', 'Smart-One-Page-Navigation'),
														'dependency' 	=> 	array(
																				'element' 	=> 'content_width',
																				'value'		=> array('2'),
																			),
														'group'			=> $group_display_options,									
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Content Width - Medium devices (desktops, 992px and up)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'width_medium',
														'description'	=> __('Example: <code>1000px</code> ... If blank, defaults to <code>970px</code>', 'Smart-One-Page-Navigation'),
														'dependency' 	=> 	array(
																				'element' 	=> 'content_width',
																				'value'		=> array('2'),
																			),
														'group'			=> $group_display_options,									
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Content Width - Large devices (large desktops, 1200px and up)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'width_large',
														'description'	=> __('Example: <code>1200px</code> ... If blank, defaults to <code>1170px</code>', 'Smart-One-Page-Navigation'),
														'dependency' 	=> 	array(
																				'element' 	=> 'content_width',
																				'value'		=> array('2'),
																			),
														'group'			=> $group_display_options,									
													),
													//Content Width
													
													//Height
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Height', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'height',														
														'value' 		=> array(
																			__('Fit To Content', 'Smart-One-Page-Navigation') => '0',
																			__('Full Height', 'Smart-One-Page-Navigation') => '1',																																
																		),
														'description'	=> __('Will always be "Full Height" when "FullPage" is enable.', 'Smart-One-Page-Navigation'),				
														'group'			=> $group_display_options,				
													),													
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Content Position', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'content_position',
														'description'	=> __('Select content position within row.', 'Smart-One-Page-Navigation'),																												
														'value' 		=> array(
																			__('Top', 'Smart-One-Page-Navigation') => '0',
																			__('Middle', 'Smart-One-Page-Navigation') => '1',
																			__('Bottom', 'Smart-One-Page-Navigation') => '2',																		
																		),
														'dependency' 	=> 	array(
																				'element' 	=> 'height',
																				'value'		=> array('1', '2', '3'),
																			),
														'group'			=> $group_display_options,														
														
													),	
													//Height
													
													//padding
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Padding - Mobile devices (0px and up)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'padding_tiny',
														'description' 	=> __(	'Top Right Bottom Left. Ext: <code>15px 20px 15px 20px</code>.
																				If blank, defaults to <code>0px 0px 0px 0px</code>', 'Smart-One-Page-Navigation'),
														'group'			=> $group_display_options,
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Padding - Small devices (tablets, 768px and up)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'padding_small',
														'description' 	=> __(	'Top Right Bottom Left. Ext: <code>20px 40px 20px 40px</code>.
																				If blank, it will inherit the properties located on it.', 'Smart-One-Page-Navigation'),
														'group'			=> $group_display_options,
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Padding - Medium devices (desktops, 992px and up)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'padding_medium',
														'description' 	=> __(	'Top Right Bottom Left. Ext: <code>30px 60px 30px 60px</code>.
																				If blank, it will inherit the properties located on it.', 'Smart-One-Page-Navigation'),
														'group'			=> $group_display_options,
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Padding - Large devices (large desktops, 1200px and up)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'padding_large',
														'description' 	=> __(	'Top Right Bottom Left. Ext: <code>60px 80px 60px 80px</code>.
																				If blank, it will inherit the properties located on it.', 'Smart-One-Page-Navigation'),
														'group'			=> $group_display_options,
													),
													//padding												
													
													//Background Settings
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Icon Color', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'icon_color',
														'description' 	=> __('Only work with main navigation & font icon - Fixed color for icon.', 'Smart-One-Page-Navigation'),
														'group'			=> $group_display_options,	
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Background Color', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'background_color',
														'group'			=> $group_display_options,	
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'attach_image',
														'heading' 		=> __('Background Image', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'background_img',
														'group'			=> $group_display_options,
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Parallax Background Image (Scroll Down)', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'parallax',
														'value' 		=> array(
																			__('No', 'Smart-One-Page-Navigation') => 'no',
																			__('Yes', 'Smart-One-Page-Navigation') => 'yes',																																																																																					
																		),
														'dependency' 	=> array(
																				'element' 	=> 'bg_video_options',
																				'value'		=> array('0', '3'),
																			),
														'group'			=> $group_display_options,									
													),													
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Background - Video / Canvas - Options', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'bg_video_options',
														'value' 		=> array(
																			__('No Background Video / Canvas', 'Smart-One-Page-Navigation') => '0',
																			__('Youtube Video Background', 'Smart-One-Page-Navigation') => '1',
																			__('HTML5 Video Background', 'Smart-One-Page-Navigation') => '2',
																			__('Particleground Canvas', 'Smart-One-Page-Navigation') => '3',																																				
																		),
														'group'			=> $group_display_options,				
													),													
																										
														//youtube	
														array(
															'admin_label' 	=> true,
															'type' 			=> 'textfield',
															'heading' 		=> __('Youtube Video ID', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'youtube_id',
															'description' 	=> __(	'Paste "Video ID" of youtube into text box. <strong>Example:</strong> <code>ab0TSkLe-E0</code>
																					<br><img src="'.OP_BETE_PLUGIN_URL.'assets/back-end/images/y-id.jpg">', 'Smart-One-Page-Navigation'),
															'dependency' 	=> array(
																					'element' 	=> 'bg_video_options',
																					'value'		=> array('1'),
																				),
															'group'			=> $group_display_options,									
														),	
														array(
															'admin_label' 	=> true,
															'type' 			=> 'textfield',
															'heading' 		=> __('Start', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'start',
															'description' 	=> __('Starting Position in seconds. <strong>Example:</strong> <code>3</code>, <code>5</code> ...', 'Smart-One-Page-Navigation'),	
															'dependency' 	=> array(
																					'element' 	=> 'bg_video_options',
																					'value'		=> array('1'),
																				),
															'group'			=> $group_display_options,					
														),
														//youtube
													
														//HTML5
														array(
															'admin_label' 	=> true,
															'type' 			=> 'textfield',
															'heading' 		=> __('Video Source (MP4)', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'mp4',
															'description' 	=> __('Enter your link Video (.mp4).', 'Smart-One-Page-Navigation'),	
															'dependency' 	=> array(
																					'element' 	=> 'bg_video_options',
																					'value'		=> array('2'),
																				),
															'group'			=> $group_display_options,					
														),
														array(
															'admin_label' 	=> true,
															'type' 			=> 'textfield',
															'heading' 		=> __('Video Source (WEBM)', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'webm',
															'description' 	=> __('Enter your link Video (.webm).', 'Smart-One-Page-Navigation'),	
															'dependency' 	=> array(
																					'element' 	=> 'bg_video_options',
																					'value'		=> array('2'),
																				),
															'group'			=> $group_display_options,					
														),
														array(
															'admin_label' 	=> true,
															'type' 			=> 'textfield',
															'heading' 		=> __('Video Source (OGV)', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'ogv',
															'description' 	=> __('Enter your link Video (.ogv).', 'Smart-One-Page-Navigation'),	
															'dependency' 	=> array(
																					'element' 	=> 'bg_video_options',
																					'value'		=> array('2'),
																				),
															'group'			=> $group_display_options,					
														),	
														//HTML5	
														
														//Particleground Canvas
														array(
															'admin_label' 	=> true,
															'type' 			=> 'textfield',
															'heading' 		=> __('Particleground - minSpeedX', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'minspeedx',
															'description' 	=> __('If blank, defaults to <code>0.1</code>', 'Smart-One-Page-Navigation'),	
															'dependency' 	=> array(
																					'element' 	=> 'bg_video_options',
																					'value'		=> array('3'),
																				),
															'group'			=> $group_display_options,					
														),
														array(
															'admin_label' 	=> true,
															'type' 			=> 'textfield',
															'heading' 		=> __('Particleground - maxSpeedX', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'maxspeedx',
															'description' 	=> __('If blank, defaults to <code>0.7</code>', 'Smart-One-Page-Navigation'),	
															'dependency' 	=> array(
																					'element' 	=> 'bg_video_options',
																					'value'		=> array('3'),
																				),
															'group'			=> $group_display_options,					
														),
														array(
															'admin_label' 	=> true,
															'type' 			=> 'textfield',
															'heading' 		=> __('Particleground - minSpeedY', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'minspeedy',
															'description' 	=> __('If blank, defaults to <code>0.1</code>', 'Smart-One-Page-Navigation'),	
															'dependency' 	=> array(
																					'element' 	=> 'bg_video_options',
																					'value'		=> array('3'),
																				),
															'group'			=> $group_display_options,					
														),
														array(
															'admin_label' 	=> true,
															'type' 			=> 'textfield',
															'heading' 		=> __('Particleground - maxSpeedY', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'maxspeedy',
															'description' 	=> __('If blank, defaults to <code>0.7</code>', 'Smart-One-Page-Navigation'),	
															'dependency' 	=> array(
																					'element' 	=> 'bg_video_options',
																					'value'		=> array('3'),
																				),
															'group'			=> $group_display_options,					
														),
														array(
															'admin_label' 	=> true,
															'type' 			=> 'textfield',
															'heading' 		=> __('Particleground - directionX', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'directionx',
															'description' 	=> __(	'Can be one of <code>center</code>, <code>left</code> or <code>right</code>. 
																					<code>center</code> means that the dots will bounce off the edges of the canvas. 
																					If blank, defaults to <code>center</code>', 'Smart-One-Page-Navigation'),	
															'dependency' 	=> array(
																					'element' 	=> 'bg_video_options',
																					'value'		=> array('3'),
																				),
															'group'			=> $group_display_options,					
														),
														array(
															'admin_label' 	=> true,
															'type' 			=> 'textfield',
															'heading' 		=> __('Particleground - directionY', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'directiony',
															'description' 	=> __(	'Can be one of <code>center</code>, <code>up</code> or <code>down</code>. 
																					<code>center</code> means that the dots will bounce off the edges of the canvas. 
																					If blank, defaults to <code>center</code>', 'Smart-One-Page-Navigation'),	
															'dependency' 	=> array(
																					'element' 	=> 'bg_video_options',
																					'value'		=> array('3'),
																				),
															'group'			=> $group_display_options,					
														),
														array(
															'admin_label' 	=> true,
															'type' 			=> 'textfield',
															'heading' 		=> __('Particleground - density', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'density',
															'description' 	=> __(	'Determines how many particles will be generated: one particle every n pixels. If blank, defaults to <code>10000</code>', 'Smart-One-Page-Navigation'),	
															'dependency' 	=> array(
																					'element' 	=> 'bg_video_options',
																					'value'		=> array('3'),
																				),
															'group'			=> $group_display_options,					
														),
														array(
															'admin_label' 	=> true,
															'type'			=> 'colorpicker',
															'heading' 		=> __('Particleground - dotColor', 'Smart-One-Page-Navigation'),
															'description' 	=> __('If blank, defaults to <code>#666666</code>', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'dotcolor',
															'dependency' 	=> array(
																					'element' 	=> 'bg_video_options',
																					'value'		=> array('3'),
																				),
															'group'			=> $group_display_options,	
														),
														array(
															'admin_label' 	=> true,
															'type'			=> 'colorpicker',
															'heading' 		=> __('Particleground - lineColor', 'Smart-One-Page-Navigation'),
															'description' 	=> __('If blank, defaults to <code>#666666</code>', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'linecolor',
															'dependency' 	=> array(
																					'element' 	=> 'bg_video_options',
																					'value'		=> array('3'),
																				),
															'group'			=> $group_display_options,	
														),
														array(
															'admin_label' 	=> true,
															'type' 			=> 'textfield',
															'heading' 		=> __('Particleground - particleRadius', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'particleradius',
															'description' 	=> __('If blank, defaults to <code>7</code>', 'Smart-One-Page-Navigation'),	
															'dependency' 	=> array(
																					'element' 	=> 'bg_video_options',
																					'value'		=> array('3'),
																				),
															'group'			=> $group_display_options,					
														),
														array(
															'admin_label' 	=> true,
															'type' 			=> 'textfield',
															'heading' 		=> __('Particleground - lineWidth', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'linewidth',
															'description' 	=> __('If blank, defaults to <code>1</code>', 'Smart-One-Page-Navigation'),	
															'dependency' 	=> array(
																					'element' 	=> 'bg_video_options',
																					'value'		=> array('3'),
																				),
															'group'			=> $group_display_options,					
														),
														array(
															'admin_label' 	=> true,
															'type' 			=> 'dropdown',
															'heading' 		=> __('Particleground - curvedLines', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'curvedlines',																											
															'value' 		=> array(
																				__('No', 'Smart-One-Page-Navigation') => 'no',
																				__('Yes', 'Smart-One-Page-Navigation') => 'yes',																	
																			),
															'dependency' 	=> 	array(
																					'element' 	=> 'bg_video_options',
																					'value'		=> array('3'),
																				),
															'group'			=> $group_display_options,														
															
														),
														array(
															'admin_label' 	=> true,
															'type' 			=> 'textfield',
															'heading' 		=> __('Particleground - proximity', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'proximity',
															'description' 	=> __('How close two dots need to be, in pixels, before they join. If blank, defaults to <code>100</code>', 'Smart-One-Page-Navigation'),	
															'dependency' 	=> array(
																					'element' 	=> 'bg_video_options',
																					'value'		=> array('3'),
																				),
															'group'			=> $group_display_options,					
														),														
														//Particleground Canvas
													//Background Settings
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Scroll Down More Button', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'downmore_button',																											
														'value' 		=> array(
																			__('No', 'Smart-One-Page-Navigation') => 'no',
																			__('Yes', 'Smart-One-Page-Navigation') => 'yes',																	
																		),														
														'group'			=> $group_display_options,														
														
													),
													array(
														'admin_label' 	=> true,
														'type'			=> 'colorpicker',
														'heading' 		=> __('Scroll Down More Button - Color', 'Smart-One-Page-Navigation'),
														'description' 	=> __('If blank, defaults to <code>#FFFFFF</code>', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'downmore_button_color',
														'dependency' 	=> array(
																				'element' 	=> 'downmore_button',
																				'value'		=> array('yes'),
																			),
														'group'			=> $group_display_options,	
													),													
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Extra Class Name', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'ext_class',														
														'group'			=> $group_display_options,									
													),
													
													//Animation
													$animation_builder0,
													$animation_builder1,
													$animation_builder2,
													$animation_builder3
													//Animation										
												)
					)
				);
				/*Item*/
				
				$custom_menus = array();				
				$menus = get_terms('nav_menu', array('hide_empty' => false));
				if ( is_array($menus) && !empty($menus) ) {
					foreach ($menus as $single_menu) {
						if (is_object( $single_menu ) && isset($single_menu->name, $single_menu->term_id)){
							$custom_menus[ $single_menu->name ] = $single_menu->term_id;
						}
					}
				}
				
				
				/*custom menu*/
				vc_map(
					array(
						'name' 				=> 	__('Smart One Page Custom Menu', 'Smart-One-Page-Navigation'),
						'base' 				=> 	'op_custom_menu',
						//'content_element' 	=> 	true,
						//'is_container' 		=> 	true,					
						//'js_view' 			=> 'VcColumnView',
						'as_child' 			=> 	array('only' => 'op_container'),
						'category' 			=>	$group_category,
						'icon'				=> 	OP_BETE_PLUGIN_URL.'assets/back-end/images/op-shortcode-custom-menu.png',
						'params'			=> 	array(
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Menu', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'nav_menu',
														'value' 		=> $custom_menus,
														'description'	=> 	empty($custom_menus)
																			?__('Custom menus not found. Please visit <strong>Appearance > Menus</strong> page to create new menu.', 'Smart-One-Page-Navigation')
																			: __('Select menu to display.', 'Smart-One-Page-Navigation'),														
													),
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Menu Style', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'nav_menu_style',
														'value' 		=> array(
																			__('Dropdown Mode', 'Smart-One-Page-Navigation') => '0',
																			/*__('Columns Mode', 'Smart-One-Page-Navigation') => '1',
																			__('Preview Mode', 'Smart-One-Page-Navigation') => '2',*/																	
																		),
														'description'	=> 	__('Select menu style.', 'Smart-One-Page-Navigation'),														
													),
													array(
															'admin_label' 	=> true,
															'type' 			=> 'dropdown',
															'heading' 		=> __('Dropdown Mode - Location', 'Smart-One-Page-Navigation'),
															'param_name' 	=> 'dropdown_location',
															'value' 		=> array(
																				__('Right', 'Smart-One-Page-Navigation') => '0',
																				__('Left', 'Smart-One-Page-Navigation') => '1',																	
																			),
															'description' 	=> __('Select Location dropdown menu', 'Smart-One-Page-Navigation'),	
															'dependency' 	=> array(
																					'element' 	=> 'nav_menu_style',
																					'value'		=> array('0'),
																				),																	
													),			
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Extra Class Name', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'ext_class',							
													),																							
												)
					)
				);
				/*custom menu*/
				
				/*Custom Row*/
				vc_map(
					array(
						'name' 				=> 	__('One Page - Custom Row', 'Smart-One-Page-Navigation'),
						'base' 				=> 	'op_custom_row',
						'content_element' 	=> 	true,
						'is_container' 		=> 	true,					
						'js_view' 			=> 'VcColumnView',
						'as_child' 			=> 	array('only' => 'op_item'),
						'as_parent' 		=> 	array('only' => 'op_custom_column'),
						'category' 			=>	$group_category,
						'icon'				=> 	OP_BETE_PLUGIN_URL.'assets/back-end/images/op-row.png',
						'params'			=> 	array(	
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Minimum width to switch view on mobile devices', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'mobile_mode_width',
														'description'	=> __('If blank, defaults to <code>767</code>, unit: px', 'Smart-One-Page-Navigation'),														
														'group'			=> $group_display_options,																						
													),														
													array(
														'admin_label' 	=> true,
														'type' 			=> 'textfield',
														'heading' 		=> __('Extra Class Name', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'ext_class',													
														'group'			=> $group_display_options,									
													),
													array(
														'type' 			=> 'css_editor',
														'heading' 		=> __('Custom CSS', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'css',
														'group' 		=> $group_display_options,
													),														
						),
					)
				);
				/*Custom Row*/
				
				/*Custom Column*/
				vc_map(
					array(
						'name' 				=> 	__('One Page - Custom Column', 'Smart-One-Page-Navigation'),
						'base' 				=> 	'op_custom_column',
						'content_element' 	=> 	true,
						'is_container' 		=> 	true,					
						'js_view' 			=> 'VcColumnView',
						'as_child' 			=> 	array('only' => 'op_custom_row'),
						'category' 			=>	$group_category,
						'icon'				=> 	OP_BETE_PLUGIN_URL.'assets/back-end/images/op-col.png',
						'params'			=> 	array(														
													array(
														'admin_label' 	=> true,
														'type' 			=> 'dropdown',
														'heading' 		=> __('Column Width', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'c_width',																									
														'value' 		=> array(
																			__('01/12', 'Smart-One-Page-Navigation') => '1',
																			__('02/12', 'Smart-One-Page-Navigation') => '2',
																			__('03/12', 'Smart-One-Page-Navigation') => '3',
																			__('04/12', 'Smart-One-Page-Navigation') => '4',
																			__('05/12', 'Smart-One-Page-Navigation') => '5',
																			__('06/12', 'Smart-One-Page-Navigation') => '6',
																			__('07/12', 'Smart-One-Page-Navigation') => '7',
																			__('08/12', 'Smart-One-Page-Navigation') => '8',
																			__('09/12', 'Smart-One-Page-Navigation') => '9',
																			__('10/12', 'Smart-One-Page-Navigation') => '10',
																			__('11/12', 'Smart-One-Page-Navigation') => '11',
																			__('12/12', 'Smart-One-Page-Navigation') => '12',																																						
																		),															
														'group'			=> $group_display_options,	
														'dependency' => array(
															'callback' => 'opCustomCallbackColumns',
														),													
														
													),	
													array(
														'type' 			=> 'css_editor',
														'heading' 		=> __('Custom CSS', 'Smart-One-Page-Navigation'),
														'param_name' 	=> 'css',
														'group' 		=> $group_display_options,
													),															
						),
					)
				);
				/*Custom Column*/
			}
		}
		/*VC Builder*/
		
		/*enqueue*/
		function back_enqueue_scripts(){
			if(is_admin()){
				wp_enqueue_style('op_bete_admin_css', 				OP_BETE_PLUGIN_URL.'assets/back-end/core.css', array(), OP_BETE_VER);
				wp_enqueue_script('op_bete_admin_js', 				OP_BETE_PLUGIN_URL.'assets/back-end/core.js', array(), OP_BETE_VER, true);
			}
		}
		function front_enqueue_scripts(){
			wp_enqueue_style('beeteam_front_fontawsome_css', 		OP_BETE_PLUGIN_URL.'assets/front-end/fontawesome/css/font-awesome.min.css', array(), OP_BETE_VER);
			wp_enqueue_style('beeteam_front_ytplayer_css', 			OP_BETE_PLUGIN_URL.'assets/front-end/ytplayer/css/jquery.mb.YTPlayer.min.css', array(), OP_BETE_VER);
			wp_enqueue_style('beeteam_front_animate_css', 			OP_BETE_PLUGIN_URL.'assets/front-end/animate-css/animate.min.css', array(), OP_BETE_VER);
			wp_enqueue_style('beeteam_front_spinkit_css', 			OP_BETE_PLUGIN_URL.'assets/front-end/spinkit.css', array(), OP_BETE_VER);
			
			wp_enqueue_script('youtube_api', 						'//www.youtube.com/player_api', array(), '20150320', true);
			wp_enqueue_script('beeteam_init_js', 					OP_BETE_PLUGIN_URL.'assets/front-end/init.js', array('jquery'), '1.0', true);
			wp_enqueue_script('beeteam_front_ytplayer_js', 			OP_BETE_PLUGIN_URL.'assets/front-end/ytplayer/jquery.mb.YTPlayer.min.js', array('beeteam_init_js'), OP_BETE_VER, true);
			wp_enqueue_script('beeteam_front_vide_js', 				OP_BETE_PLUGIN_URL.'assets/front-end/vide/jquery.vide.min.js', array('beeteam_init_js'), OP_BETE_VER, true);
			wp_enqueue_script('beeteam_front_waypoints_js', 		OP_BETE_PLUGIN_URL.'assets/front-end/jquery.waypoints.min.js', array('beeteam_init_js'), OP_BETE_VER, true);	
			wp_enqueue_script('beeteam_front_easing_js', 			OP_BETE_PLUGIN_URL.'assets/front-end/jquery.easing.min.js', array('beeteam_init_js'), OP_BETE_VER, true);
			wp_enqueue_script('beeteam_front_transit_js', 			OP_BETE_PLUGIN_URL.'assets/front-end/jquery.transit.min.js', array('beeteam_init_js'), OP_BETE_VER, true);
			wp_enqueue_script('beeteam_front_particleground_js', 	OP_BETE_PLUGIN_URL.'assets/front-end/jquery.particleground.min.js', array('beeteam_init_js'), OP_BETE_VER, true);
			wp_enqueue_script('beeteam_front_fullscreen_js', 		OP_BETE_PLUGIN_URL.'assets/front-end/screenfull.min.js', array('beeteam_init_js'), OP_BETE_VER, true);
			//wp_enqueue_script('beeteam_front_slimscroll_js', 		OP_BETE_PLUGIN_URL.'assets/front-end/fullpage/jquery.slimscroll.min.js', array('beeteam_init_js'), OP_BETE_VER, true);
			wp_enqueue_script('beeteam_front_iscroll_js', 			OP_BETE_PLUGIN_URL.'assets/front-end/fullpage/iscroll.js', array('beeteam_init_js'), OP_BETE_VER, true);
			wp_enqueue_script('beeteam_front_fullpage_js', 			OP_BETE_PLUGIN_URL.'assets/front-end/fullpage/jquery.fullPage.min.js', array('beeteam_init_js'), OP_BETE_VER, true);	
		}
		
		function core_enqueue_scripts(){
			/*plugin custom core*/
				//wp_enqueue_style('op_bete_front_css', 				OP_BETE_PLUGIN_URL.'assets/front-end/core.css', array(), OP_BETE_VER);
				wp_enqueue_style('op_bete_front_css', 					OP_BETE_PLUGIN_URL.'assets/minify/core.css', array(), OP_BETE_VER);					
			/*plugin custom core*/	
		}
		
		function setFooterCore(){
			/*plugin custom core*/
				//wp_enqueue_script('op_bete_front_js', 				OP_BETE_PLUGIN_URL.'assets/front-end/core.js', array(), OP_BETE_VER, true);
				wp_enqueue_script('op_bete_front_js', 					OP_BETE_PLUGIN_URL.'assets/minify/core.js', array(), OP_BETE_VER, true);
			/*plugin custom core*/	
		}
		
		function setSVGicon(){
			echo 	'<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">  
						<symbol id="op-icon-fullscreen" viewBox="0 0 512 512">
							<path d="m439 393l-74-73l-45 45l73 74l-73 73l192 0l0-192z m-247-393l-192 0l0 192l73-73l73 72l45-45l-72-73z m0 
							365l-45-45l-74 73l-73-73l0 192l192 0l-73-73z m320-365l-192 0l73 73l-72 73l45 45l73-72l73 73z"/>
						</symbol>  
						<symbol id="op-icon-fullscreen-exit" viewBox="0 0 512 512">
							<path d="m393 439l74 73l45-45l-73-74l73-73l-192 0l0 192z m-393-247l192 0l0-192l-73 73l-73-72l-45 45l72 73z m0 275l45 45l74-73l73 73l0-192l-192 
							0l73 73z m320-275l192 0l-73-73l72-73l-45-45l-73 72l-73-73z"/>
						</symbol>  
					</svg>';
		}
		/*enqueue*/
		
		public function init(){
			$this->bt_op_vc();			
			$this->back_enqueue_scripts();
		}
		public function __construct() {				
			add_action('init', array($this, 'init'), 10, 1);
			add_action('wp_enqueue_scripts', array($this, 'front_enqueue_scripts'), 9998);	
			add_action('wp_enqueue_scripts', array($this, 'core_enqueue_scripts'), 9999);		
			add_action('wp_head', array($this, 'setSVGicon'));
			add_action('wp_footer', array($this, 'setFooterCore'), 14);
		}
	}
	
	if(!function_exists('op_container_extends')){
		function op_container_extends(){
			if(class_exists('WPBakeryShortCode') && class_exists('WPBakeryShortCodesContainer') && class_exists('WPBakeryShortCode')){
				class WPBakeryShortCode_op_container extends WPBakeryShortCodesContainer{} //container op_container shortcode
				class WPBakeryShortCode_op_item extends WPBakeryShortCodesContainer{} //container op_item shortcode
				class WPBakeryShortCode_op_custom_row extends WPBakeryShortCodesContainer{} //container op_custom_row shortcode
				class WPBakeryShortCode_op_custom_column extends WPBakeryShortCodesContainer{} //container op_custom_row shortcode
				class WPBakeryShortCode_op_custom_menu extends WPBakeryShortCode{} //only shortcode
			}
		}	
		add_action('init', 'op_container_extends', 20, 1);
	}
	
	global $bt_op_builder;
	if(!$bt_op_builder){
		$bt_op_builder = new bt_op_builder();
	}
	
}

add_action( 'plugins_loaded', function(){
	load_plugin_textdomain('Smart-One-Page-Navigation', false, basename(OP_BETE_PLUGIN_PATH).'/languages');
});