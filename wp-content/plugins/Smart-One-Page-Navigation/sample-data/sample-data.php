<?php
if(!function_exists('op_bete_sample_data') && !function_exists('op_bete_setSampleData')) {
	function op_bete_sample_data(){
		global $wpdb;
		
		require_once(ABSPATH.'wp-includes/pluggable.php');
		require_once(ABSPATH.'wp-admin/includes/image.php');
		
		$images_list = 	array(
						'0.png' 	=> OP_BETE_PLUGIN_PATH.'sample-data/images/black-logo.png', 
						'1.png' 	=> OP_BETE_PLUGIN_PATH.'sample-data/images/retina-black-logo.png', 
						'2.png' 	=> OP_BETE_PLUGIN_PATH.'sample-data/images/white-logo.png',
						'3.jpg' 	=> OP_BETE_PLUGIN_PATH.'sample-data/images/retina-white-logo.png',
						'4.png' 	=> OP_BETE_PLUGIN_PATH.'sample-data/images/green-logo.png',
						'5.png' 	=> OP_BETE_PLUGIN_PATH.'sample-data/images/retina-green-logo.png',
						'6.png' 	=> OP_BETE_PLUGIN_PATH.'sample-data/images/sticky-black-logo.png',
						'7.png' 	=> OP_BETE_PLUGIN_PATH.'sample-data/images/sticky-retina-black-logo.png',
						'8.jpg' 	=> OP_BETE_PLUGIN_PATH.'sample-data/images/sticky-white-logo.png',
						'9.jpg' 	=> OP_BETE_PLUGIN_PATH.'sample-data/images/sticky-retina-white-logo.png',						
						'10.png' 	=> OP_BETE_PLUGIN_PATH.'sample-data/images/sticky-green-logo.png',
						'11.png' 	=> OP_BETE_PLUGIN_PATH.'sample-data/images/sticky-retina-green-logo.png',
						'12.jpg' 	=> OP_BETE_PLUGIN_PATH.'sample-data/images/person.jpg',
						'13.jpg' 	=> OP_BETE_PLUGIN_PATH.'sample-data/images/cold-snow-mountains-nature.jpg',
						'14.jpg' 	=> OP_BETE_PLUGIN_PATH.'sample-data/images/background-video.jpg',
						'15.jpg' 	=> OP_BETE_PLUGIN_PATH.'sample-data/images/blue-uni.jpg',
						'16.jpg' 	=> OP_BETE_PLUGIN_PATH.'sample-data/images/sea-white.jpg',
						'17.png' 	=> OP_BETE_PLUGIN_PATH.'sample-data/images/fullPage.png',
						'18.jpg' 	=> OP_BETE_PLUGIN_PATH.'sample-data/images/cabin-1920.jpg',
						);	
									
		$parent_post_id	= 0;
		
		if(!is_array($images_list) && empty($images_list)){return;}
		$wp_upload_dir = wp_upload_dir();
		
		$image_list_upload = array();
		
		foreach($images_list as $name => $img_url){
			if(isset($img_url)&&$img_url!='' && isset($name)&&$name!='') {
				
				if(!file_exists($img_url)) {return;}
				//echo $img_url;die;
								
				$newFilePath = $wp_upload_dir['path'].'/'.rand(0,9999).time().$name;				
				
				copy($img_url, $newFilePath);
				
				$filetype = wp_check_filetype(basename($newFilePath), null);
				
				$attachment = 	array(
									'guid'           => $wp_upload_dir['url'].'/'.basename($newFilePath), 
									'post_mime_type' => $filetype['type'],
									'post_title'     => preg_replace('/\.[^.]+$/', '', basename($newFilePath)),
									'post_content'   => '',
									'post_status'    => 'inherit'
								);	
															
				$attach_id=wp_insert_attachment($attachment, $newFilePath, $parent_post_id);								
				$attach_data=wp_generate_attachment_metadata($attach_id, $newFilePath);
				wp_update_attachment_metadata($attach_id, $attach_data);	
				
				array_push($image_list_upload, $attach_id);
			}
		}
		
		//link youtube how to use
		$youtube_tutorial = 'https://www.youtube.com/watch?v=o65sQFFe2lI';
				
		$post_url = '';
		
		//1
		$data_sample_1 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container mnav_style="classic" mnav_sticky_behavior="2" snav_style="style-6" scroll_effect="easeOutExpo" nav_font_weight="normal" snav_font_weight="normal" loading_style="folding-cube" scroll_speed="1200" nav_bg="rgba(255,255,255,0.01)" nav_text_color="rgba(255,255,255,0.75)" nav_text_hover_color="#ffffff" nav_text_active_color="#ffffff" snav_tooltip_bg="#1abc9c" snav_item_color="#777777" snav_item_hover_color="#ffffff" snav_item_bg_hover_color="#1abc9c" snav_item_active_color="#ffffff" snav_item_bg_active_color="#1abc9c" mnav_sticky_height="60px" stnav_bg="#ffffff" stnav_shadow="rgba(0,0,0,0.25)" stnav_text_color="#111111" stnav_text_hover_color="#999999" stnav_text_active_color="#1abc9c" logo="'.$image_list_upload[2].'" logo_retina="'.$image_list_upload[3].'" st_logo="'.$image_list_upload[10].'" st_logo_retina="'.$image_list_upload[11].'" snav_bg="#111111" snav_tooltip_color="#ffffff" loading_color="#1abc9c" dd_nav_separator_color="#1abc9c" dd_nav_text_color="#111111" dd_nav_text_hover_color="#1abc9c" mobile_bg="#ffffff" mobile_text_color="#111111" mobile_text_hover_color="#999999" mobile_text_active_color="#1abc9c"][op_item item_icon="font" height="1" content_position="1" parallax="yes" downmore_button="yes" item_name="Home" item_name_alias="home-alias" icon_font="fa fa-home" background_color="#d8d8d8" background_img="'.$image_list_upload[12].'"][vc_column_text css=".vc_custom_1452358668800{margin-bottom: 0px !important;padding-top: 35px !important;padding-right: 20px !important;padding-bottom: 52px !important;padding-left: 20px !important;}"]
<h1 style="text-align: center; font-size: 42px;"><span style="color: #ffffff; letter-spacing: 0.05em;">HOME SELECTION</span></h1>
<p style="text-align: center; font-size: 20px;"><span style="color: #ffffff;">PARALLAX BACKGROUND</span></p>
[/vc_column_text][/op_item][op_item item_icon="font" height="1" content_position="1" parallax="yes" item_name="Selection A" item_name_alias="Selection A" icon_font="fa fa-heart" background_color="#d8d8d8" background_img="'.$image_list_upload[13].'"][vc_column_text css=".vc_custom_1452358691602{margin-bottom: 0px !important;padding-top: 35px !important;padding-right: 20px !important;padding-bottom: 52px !important;padding-left: 20px !important;background-color: rgba(255,255,255,0.5) !important;*background-color: rgb(255,255,255) !important;}"]
<h2 style="text-align: center; font-size: 42px;"><span style="color: #000000; letter-spacing: 0.05em;">SELECTION A</span></h2>
<p style="text-align: center; font-size: 20px;"><span style="color: #000000;">PARALLAX BACKGROUND</span></p>
[/vc_column_text][/op_item][op_item item_icon="font" height="1" content_position="1" bg_video_options="2" item_name="Selection B" item_name_alias="Selection B" icon_font="fa fa-play-circle" background_color="#d8d8d8" background_img="'.$image_list_upload[14].'" mp4="http://static.videezy.com/system/resources/previews/000/002/196/original/ferry-ride-timelapse-hd-stock-video.mp4" webm="http://static.videezy.com/system/resources/preview3s/000/002/196/original/ferry-ride-timelapse-hd-stock-video.webm" ogv="http://static.videezy.com/system/resources/preview2s/000/002/196/original/ferry-ride-timelapse-hd-stock-video.ogv" padding_tiny="60px 20px"][vc_column_text css=".vc_custom_1452358685060{margin-bottom: 0px !important;padding-top: 35px !important;padding-right: 20px !important;padding-bottom: 52px !important;padding-left: 20px !important;}"]
<h2 style="text-align: center; font-size: 42px;"><span style="color: #ffffff; letter-spacing: 0.05em;">SELECTION B</span></h2>
<p style="text-align: center; font-size: 20px;"><span style="color: #ffffff;">VIDEO BACKGROUND
SUPPORT HTML5 VIDEO &amp; YOUTUBE</span></p>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" parallax="yes" bg_video_options="3" curvedlines="yes" item_name="Selection C" item_name_alias="Selection C" icon_font="fa fa-cubes" background_color="#d8d8d8" background_img="'.$image_list_upload[15].'" linecolor="rgba(255,255,255,0.66)" particleradius="5" linewidth="0.5" proximity="110" dotcolor="rgba(255,255,255,0.6)" padding_tiny="60px 20px"][vc_column_text css=".vc_custom_1452358709931{margin-bottom: 0px !important;padding-top: 35px !important;padding-right: 20px !important;padding-bottom: 52px !important;padding-left: 20px !important;background-color: rgba(0,0,0,0.28) !important;*background-color: rgb(0,0,0) !important;border-radius: 10px !important;}"]
<h2 style="text-align: center; font-size: 42px;"><span style="color: #ffffff; letter-spacing: 0.05em;">SELECTION C</span></h2>
<p style="text-align: center; font-size: 20px;"><span style="color: #ffffff;">PARTICLE BACKGROUND CANVAS</span></p>
[/vc_column_text][/op_item][op_item item_icon="font" height="1" content_position="1" parallax="yes" item_name="Features" item_name_alias="Features" icon_font="fa fa-database" background_color="#d8d8d8" padding_tiny="0 20px" background_img="'.$image_list_upload[16].'" padding_large="0 60px"][vc_column_text css=".vc_custom_1452358721546{margin-bottom: 45px !important;padding-top: 74px !important;}"]
<h2 style="text-align: center; font-size: 42px; margin: 0;"><span style="color: #1abc9c; letter-spacing: 0.05em;">FEATURES</span></h2>
[/vc_column_text][vc_row_inner css=".vc_custom_1452267565894{padding-bottom: 20px !important;}"][vc_column_inner width="1/2" css=".vc_custom_1452267357325{margin-bottom: 50px !important;}"][vc_column_text css=".vc_custom_1452271193767{margin-bottom: 0px !important;}"]
<ul style="font-size: 16px; line-height: 2; padding-left: 18px;">
	<li><span style="color: #000000; font-weight: 600;">Support One Page Basic (Developed by Beeteam368) &amp; Fullscreen Scrolling (FullPage.js)</span></li>
	<li><span style="color: #000000; font-weight: 600;">One Click Import Full Sample Data (20+ demo).</span></li>
	<li><span style="color: #000000; font-weight: 600;">Main Navigation Menus &amp; Custom Menus (dropdown mode)</span>
<ul>
	<li><span style="color: #000000;">Support 700+ Google Fonts</span></li>
	<li><span style="color: #000000;">Unlimited Color (background color, separator, menu item hover, menu item active ...)</span></li>
	<li><span style="color: #000000;">Logo Image on Main Navigation (support Retina Logo)</span></li>
	<li><span style="color: #000000;">Support FontAwesome Icons &amp; Image Icons</span></li>
</ul>
</li>
	<li><span style="color: #000000; font-weight: 600;">Smart Sticky Navigation</span>
<ul>
	<li><span style="color: #000000;">Unlimited Color (background, separator, menu item hover, menu item active ...)</span></li>
	<li><span style="color: #000000;">Logo Image on Sticky Navigation (support Retina Logo)</span></li>
	<li><span style="color: #000000;">Support FontAwesome Icons &amp; Image Icons</span></li>
	<li><span style="color: #000000;">Behavior: Only Appears When Page Is Scrolled Down &amp; Past The First Page</span></li>
	<li><span style="color: #000000;">Behavior: Only Appears When Page Is Scrolled Up</span></li>
	<li><span style="color: #000000;">Behavior: Always Visible</span></li>
</ul>
</li>
	<li><span style="color: #000000; font-weight: 600;">Sub Navigation</span>
<ul>
	<li><span style="color: #000000;">6 styles x 3 Positions (Right, Left, Bottom)</span></li>
	<li><span style="color: #000000;">Unlimited Color (background color, item hover, item active ...)</span></li>
	<li><span style="color: #000000;">Support Tooltip (700+ Google Fonts)</span></li>
	<li><span style="color: #000000;">Support FontAwesome Icons &amp; Image Icons</span></li>
</ul>
</li>
</ul>
[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2" css=".vc_custom_1452267365184{margin-bottom: 50px !important;}"][vc_column_text css=".vc_custom_1452357990741{margin-bottom: 0px !important;}"]
<ul style="font-size: 16px; line-height: 2; padding-left: 18px;">
	<li><span style="color: #000000; font-weight: 600;">Fully HTML5 &amp; CSS3 Support</span></li>
	<li><span style="color: #000000; font-weight: 600;">100% Responsive Design</span></li>
	<li><span style="color: #000000; font-weight: 600;">Mobile Menu</span>
<ul>
	<li><span style="color: #000000;">Unlimited Color (background color, separator, item hover, item active ...)</span></li>
	<li><span style="color: #000000;">Compatible with all mobile devices (mobile, tablet)</span></li>
</ul>
</li>
	<li><span style="color: #000000; font-weight: 600;">Other</span>
<ul>
	<li><span style="color: #000000;">Support Full Screen Mode</span></li>
	<li><span style="color: #000000;">Support HTML5 Video Background (MP4, OGV, WEBM)</span></li>
	<li><span style="color: #000000;">Support Youtube Video Background</span></li>
	<li><span style="color: #000000;">Support Parallax Scroll (down) Image Background</span></li>
	<li><span style="color: #000000;">Support Particle Canvas Background (Full Options)</span></li>
	<li><span style="color: #000000;">Support Content Animation On Visibility (70+ Effect)</span></li>
	<li><span style="color: #000000;">Simple loading spinners animated with CSS (11 style - unlimited color &amp; background color)</span></li>
	<li><span style="color: #000000;">Scroll Next(Prev) Item Effect (jQuery Easing - Custom speed[in milisecond])</span></li>
	<li><span style="color: #000000;">Support Full Height Mode for Each Item</span></li>
	<li><span style="color: #000000;">Custom Content Width &amp; Bootstrap Container (mobile, tablet, desktop)</span></li>
	<li><span style="color: #000000;">Custom Content Padding (mobile, tablet, desktop)</span></li>
	<li>Scroll Down More Button</li>
	<li><span style="color: #000000;">And Much More ...</span></li>
</ul>
</li>
</ul>
[/vc_column_text][/vc_column_inner][/vc_row_inner][/op_item][op_item item_icon="font" content_width="2" height="1" content_position="1" item_name="How To Use" item_name_alias="How To Use" icon_font="fa fa-cogs" width_large="800px" width_small="100%" width_medium="970px" padding_tiny="54px 20px 60px 20px" background_color="#ffffff"][vc_column_text css=".vc_custom_1452358730932{padding-right: 20px !important;padding-left: 20px !important;}"]
<h2 style="text-align: center; font-size: 42px; margin: 0;"><span style="color: #000000; letter-spacing: 0.05em;">HOW TO USE</span></h2>
[/vc_column_text][vc_video link="'.$youtube_tutorial.'" css=".vc_custom_1452272153637{margin-bottom: 0px !important;}"][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_1 = __('Smart One Page - Main Demo', 'Smart-One-Page-Navigation');				
		$post_sample_1 = array(
			'post_content'   => $data_sample_1,
			'post_name' 	 => sanitize_title($page_name_1.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_1,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_1 = wp_insert_post($post_sample_1, false);		
		$post_url.='<a href="'.get_permalink($post_id_1).'" target="_blank">'.$page_name_1.'</a>';
		
		//2
		$data_sample_2 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container mnav_style="classic" content_width="1" mnav_sticky_behavior="2" snav_style="style-4" snav_behavior="1" scroll_effect="easeOutExpo" nav_font_weight="normal" snav_font_weight="normal" fullscreen_scroll="yes" fp_loopbottom="yes" loading_style="rotating-plane" loading_color="#1bbc9b" nav_bg="#111111" nav_text_color="#ffffff" nav_text_hover_color="#999999" nav_text_active_color="#ffffff" logo="'.$image_list_upload[4].'" logo_retina="'.$image_list_upload[5].'" mnav_sticky_height="60px" nav_active_bg="#333333" snav_item_color="#111111" snav_item_bg_hover_color="#111111" snav_item_active_color="#111111" snav_item_bg_active_color="#111111" snav_item_hover_color="#111111" scroll_speed="1200" st_logo="'.$image_list_upload[8].'" st_logo_retina="'.$image_list_upload[9].'" stnav_bg="#00557a" stnav_shadow="rgba(0,0,0,0.2)" stnav_active_bg="#00324c" stnav_text_hover_color="rgba(255,255,255,0.75)"][op_item item_icon="font" content_width="1" height="1" content_position="1" downmore_button="yes" item_name="FullPage.js" item_name_alias="fullpage-demo" background_color="#1bbc9b" icon_font="fa fa-home" downmore_button_color="#111111" icon_color="#1bbc9b"][vc_column_text css=".vc_custom_1452405013034{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 16px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #111111; letter-spacing: 0.1em; font-size: 42px;">FullPage.js Demo</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #111111; font-size: 20px; font-weight: 600;">Create Beautiful Fullscreen Scrolling Websites</span></p>
[/vc_column_text][vc_single_image image="'.$image_list_upload[17].'" img_size="full" alignment="center"][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection A" item_name_alias="Selection A" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)" icon_color="#dd3333"][vc_column_text css=".vc_custom_1452404745461{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION A</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection B" item_name_alias="Selection B" icon_font="fa fa-cogs" background_color="rgba(221,153,51,0.3)" icon_color="#dd9933"][vc_column_text css=".vc_custom_1452404751091{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION B</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection C" item_name_alias="Selection C" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" icon_color="#25a7e8"][vc_column_text css=".vc_custom_1452404757796{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION C</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection D" item_name_alias="Selection D" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)" icon_color="#9e5ae2"][vc_column_text css=".vc_custom_1452404763355{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION D</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_2 = __('Smart One Page - FullPage.js Demo', 'Smart-One-Page-Navigation');				
		$post_sample_2 = array(
			'post_content'   => $data_sample_2,
			'post_name' 	 => sanitize_title($page_name_2.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_2,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_2 = wp_insert_post($post_sample_2, false);		
		$post_url.='<a href="'.get_permalink($post_id_2).'" target="_blank">'.$page_name_2.'</a>';
		
		//3
		$data_sample_3 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}][vc_column][op_container loading_style="wave" loading_color="#1bbc9b" mnav_style="classic" content_width="1" snav_style="style-4" snav_behavior="1" scroll_effect="easeOutExpo" nav_font_weight="normal" snav_font_weight="normal" nav_bg="#ba2a2a" nav_text_color="#ffffff" nav_text_hover_color="rgba(255,255,255,0.85)" nav_text_active_color="#ffffff" logo="'.$image_list_upload[8].'" logo_retina="'.$image_list_upload[9].'" mnav_sticky_height="60px" nav_active_bg="#932222" snav_item_color="#111111" snav_item_bg_hover_color="#111111" snav_item_active_color="#111111" snav_item_bg_active_color="#111111" snav_item_hover_color="#111111" scroll_speed="1200" st_logo="'.$image_list_upload[8].'" st_logo_retina="'.$image_list_upload[9].'" nav_height="60px" stnav_shadow="rgba(0,0,0,0.2)"][op_item item_icon="font" content_width="1" height="1" content_position="1" downmore_button="yes" item_name="Home" item_name_alias="sticky-menu-demo" background_color="rgba(99,117,19,0.3)" icon_font="fa fa-home" downmore_button_color="#637513"][vc_column_text css=".vc_custom_1452418913599{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #637513; letter-spacing: 0.1em; font-size: 42px;">DEMO STICKY NAVIGATION</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #111111; font-size: 20px; font-weight: 600;">When Page Is Scrolled Down &amp; Past The First Page</span></p>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection A" item_name_alias="Selection A" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)"][vc_column_text css=".vc_custom_1452404745461{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION A</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection B" item_name_alias="Selection B" icon_font="fa fa-cogs" background_color="rgba(221,153,51,0.3)"][vc_column_text css=".vc_custom_1452404751091{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION B</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection C" item_name_alias="Selection C" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)"][vc_column_text css=".vc_custom_1452404757796{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION C</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection D" item_name_alias="Selection D" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)"][vc_column_text css=".vc_custom_1452404763355{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION D</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_3 = __('Smart One Page - Sticky Menu Behavior: When Page Is Scrolled Down & Past The First Page', 'Smart-One-Page-Navigation');				
		$post_sample_3 = array(
			'post_content'   => $data_sample_3,
			'post_name' 	 => sanitize_title($page_name_3.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_3,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_3 = wp_insert_post($post_sample_3, false);		
		$post_url.='<a href="'.get_permalink($post_id_3).'" target="_blank">'.$page_name_3.'</a>';
		
		//4
		$data_sample_4 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}][vc_column][op_container loading_style="double-bounce" loading_color="#1bbc9b" mnav_style="classic" mnav_sticky_behavior="1" snav_style="style-4" snav_behavior="1" scroll_effect="easeOutExpo" nav_font_weight="normal" snav_font_weight="normal" nav_bg="#333333" nav_text_color="#aaaaaa" nav_text_hover_color="rgba(255,255,255,0.85)" nav_text_active_color="#ffffff" logo="'.$image_list_upload[4].'" logo_retina="'.$image_list_upload[5].'" mnav_sticky_height="60px" nav_active_bg="#222222" snav_item_color="#111111" snav_item_bg_hover_color="#111111" snav_item_active_color="#111111" snav_item_bg_active_color="#111111" snav_item_hover_color="#111111" scroll_speed="1200" st_logo="'.$image_list_upload[8].'" st_logo_retina="'.$image_list_upload[9].'" stnav_bg="rgba(0,0,0,0.8)" snav_bg="#ffffff" snav_tooltip_bg="#ffffff" snav_tooltip_color="#111111"][op_item item_icon="font" content_width="1" height="1" content_position="1" downmore_button="yes" item_name="Home" item_name_alias="sticky-menu-demo" background_color="#111111" icon_font="fa fa-home" icon_color="#ffffff"][vc_column_text css=".vc_custom_1452419802687{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #ffffff; letter-spacing: 0.1em; font-size: 42px;">DEMO STICKY NAVIGATION</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #999999; font-size: 20px; font-weight: 600;">Only Appears When Page Is Scrolled Up</span></p>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection A" item_name_alias="Selection A" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)" icon_color="#dd3333"][vc_column_text css=".vc_custom_1452404745461{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION A</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection B" item_name_alias="Selection B" icon_font="fa fa-cogs" background_color="rgba(221,153,51,0.3)" icon_color="#dd9933"][vc_column_text css=".vc_custom_1452404751091{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION B</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection C" item_name_alias="Selection C" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" icon_color="#1d90ba"][vc_column_text css=".vc_custom_1452404757796{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION C</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection D" item_name_alias="Selection D" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)" icon_color="#a466e2"][vc_column_text css=".vc_custom_1452404763355{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION D</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_4 = __('Smart One Page -  Sticky Menu Behavior: Only Appears When Page Is Scrolled Up', 'Smart-One-Page-Navigation');				
		$post_sample_4 = array(
			'post_content'   => $data_sample_4,
			'post_name' 	 => sanitize_title($page_name_4.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_4,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_4 = wp_insert_post($post_sample_4, false);		
		$post_url.='<a href="'.get_permalink($post_id_4).'" target="_blank">'.$page_name_4.'</a>';
		
		//5
		$data_sample_5 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container nav_separator_color="rgba(255,255,255,0.05)" loading_style="rotating-plane" loading_color="#dd3333" mnav_style="classic" content_width="1" snav_style="style-1" snav_behavior="1" nav_font_weight="normal" snav_font_weight="normal" nav_bg="#111111" nav_text_color="#ffffff" nav_text_hover_color="#999999" nav_text_active_color="#ffffff" logo="'.$image_list_upload[8].'" logo_retina="'.$image_list_upload[9].'" nav_height="60px" mnav_sticky_height="60px" nav_active_bg="#333333"][op_item item_icon="font" content_width="1" height="1" content_position="1" downmore_button="yes" item_name="Selection 1" item_name_alias="Selection 1" background_color="rgba(221,153,51,0.3)" icon_font="fa fa-home" downmore_button_color="#111111" icon_color="#dd9933"][vc_column_text css=".vc_custom_1452396915999{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION 1</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #111111; font-size: 20px; font-weight: 600;">Sub Navigation Style 1 - Position: Right</span></p>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 2" item_name_alias="Selection 2" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)" icon_color="#dd3333"][vc_column_text css=".vc_custom_1452396111427{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION 2</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 3" item_name_alias="Selection 3" icon_font="fa fa-cogs" background_color="rgba(129,215,66,0.3)" icon_color="#36af48"][vc_column_text css=".vc_custom_1452396135287{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #36af48; letter-spacing: 0.1em; font-size: 42px;">SELECTION 3</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 4" item_name_alias="Selection 4" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" icon_color="#25a7e8"][vc_column_text css=".vc_custom_1452396158237{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION 4</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 5" item_name_alias="Selection 5" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)" icon_color="#9e5ae2"][vc_column_text css=".vc_custom_1452396183514{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION 5</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_5 = __('Smart One Page - Sub Navigation Style 1 - Position: Right', 'Smart-One-Page-Navigation');				
		$post_sample_5 = array(
			'post_content'   => $data_sample_5,
			'post_name' 	 => sanitize_title($page_name_5.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_5,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_5 = wp_insert_post($post_sample_5, false);		
		$post_url.='<a href="'.get_permalink($post_id_5).'" target="_blank">'.$page_name_5.'</a>';
		
		//6
		$data_sample_6 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container nav_separator_color="rgba(255,255,255,0.05)" loading_style="double-bounce" loading_color="#dd3333" mnav_style="classic" content_width="1" snav_style="style-1" snav_behavior="1" snav_position="style-bottom" nav_font_weight="normal" snav_font_weight="normal" nav_bg="#111111" nav_text_color="#ffffff" nav_text_hover_color="#999999" nav_text_active_color="#ffffff" logo="'.$image_list_upload[8].'" logo_retina="'.$image_list_upload[9].'" nav_height="60px" mnav_sticky_height="60px" nav_active_bg="#333333"][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 1" item_name_alias="Selection 1" background_color="rgba(221,153,51,0.3)" icon_font="fa fa-home" icon_color="#dd9933"][vc_column_text css=".vc_custom_1452396915999{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION 1</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #111111; font-size: 20px; font-weight: 600;">Sub Navigation Style 1 - Position: Bottom</span></p>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 2" item_name_alias="Selection 2" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)" icon_color="#dd3333"][vc_column_text css=".vc_custom_1452396111427{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION 2</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 3" item_name_alias="Selection 3" icon_font="fa fa-cogs" background_color="rgba(129,215,66,0.3)" icon_color="#36af48"][vc_column_text css=".vc_custom_1452396135287{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #36af48; letter-spacing: 0.1em; font-size: 42px;">SELECTION 3</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 4" item_name_alias="Selection 4" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" icon_color="#25a7e8"][vc_column_text css=".vc_custom_1452396158237{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION 4</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 5" item_name_alias="Selection 5" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)" icon_color="#9e5ae2"][vc_column_text css=".vc_custom_1452396183514{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION 5</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_6 = __('Smart One Page - Sub Navigation Style 1 - Position: Bottom', 'Smart-One-Page-Navigation');				
		$post_sample_6 = array(
			'post_content'   => $data_sample_6,
			'post_name' 	 => sanitize_title($page_name_6.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_6,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_6 = wp_insert_post($post_sample_6, false);		
		$post_url.='<a href="'.get_permalink($post_id_6).'" target="_blank">'.$page_name_6.'</a>';		
		
		//7
		$data_sample_7 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container nav_separator_color="rgba(255,255,255,0.05)" loading_style="wave" loading_color="#dd3333" mnav_style="classic" content_width="1" snav_style="style-1" snav_behavior="1" snav_position="style-left" nav_font_weight="normal" snav_font_weight="normal" nav_bg="#111111" nav_text_color="#ffffff" nav_text_hover_color="#999999" nav_text_active_color="#ffffff" logo="'.$image_list_upload[8].'" logo_retina="'.$image_list_upload[9].'" nav_height="60px" mnav_sticky_height="60px" nav_active_bg="#333333"][op_item item_icon="font" content_width="1" height="1" content_position="1" downmore_button="yes" item_name="Selection 1" item_name_alias="Selection 1" background_color="rgba(221,153,51,0.3)" icon_font="fa fa-home" downmore_button_color="#111111" icon_color="#dd9933"][vc_column_text css=".vc_custom_1452396915999{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION 1</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #111111; font-size: 20px; font-weight: 600;">Sub Navigation Style 1 - Position: Left</span></p>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 2" item_name_alias="Selection 2" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)" icon_color="#dd3333"][vc_column_text css=".vc_custom_1452396111427{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION 2</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 3" item_name_alias="Selection 3" icon_font="fa fa-cogs" background_color="rgba(129,215,66,0.3)" icon_color="#36af48"][vc_column_text css=".vc_custom_1452396135287{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #36af48; letter-spacing: 0.1em; font-size: 42px;">SELECTION 3</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 4" item_name_alias="Selection 4" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" icon_color="#25a7e8"][vc_column_text css=".vc_custom_1452396158237{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION 4</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 5" item_name_alias="Selection 5" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)" icon_color="#9e5ae2"][vc_column_text css=".vc_custom_1452396183514{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION 5</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_7 = __('Smart One Page - Sub Navigation Style 1 - Position: Left', 'Smart-One-Page-Navigation');				
		$post_sample_7 = array(
			'post_content'   => $data_sample_7,
			'post_name' 	 => sanitize_title($page_name_7.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_7,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_7 = wp_insert_post($post_sample_7, false);		
		$post_url.='<a href="'.get_permalink($post_id_7).'" target="_blank">'.$page_name_7.'</a>';
		
		//8
		$data_sample_8 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container nav_separator_color="rgba(255,255,255,0.05)" loading_style="wandering-cubes" loading_color="#dd3333" mnav_style="classic" content_width="1" snav_style="style-2" snav_behavior="1" nav_font_weight="normal" snav_font_weight="normal" nav_bg="#111111" nav_text_color="#ffffff" nav_text_hover_color="#999999" nav_text_active_color="#ffffff" logo="'.$image_list_upload[8].'" logo_retina="'.$image_list_upload[9].'" nav_height="60px" mnav_sticky_height="60px" nav_active_bg="#333333" snav_bg="#111111" snav_tooltip_bg="#1abc9c" snav_tooltip_color="#ffffff" snav_item_color="#777777" snav_item_hover_color="#ffffff" snav_item_bg_hover_color="#1abc9c" snav_item_active_color="#ffffff" snav_item_bg_active_color="#1abc9c"][op_item item_icon="font" content_width="1" height="1" content_position="1" downmore_button="yes" item_name="Selection 1" item_name_alias="Selection 1" background_color="rgba(221,153,51,0.3)" icon_font="fa fa-home" downmore_button_color="#111111" icon_color="#dd9933"][vc_column_text css=".vc_custom_1452396915999{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION 1</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #111111; font-size: 20px; font-weight: 600;">Sub Navigation Style 2 - Position: Right</span></p>

[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 2" item_name_alias="Selection 2" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)" icon_color="#dd3333"][vc_column_text css=".vc_custom_1452396111427{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION 2</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 3" item_name_alias="Selection 3" icon_font="fa fa-cogs" background_color="rgba(129,215,66,0.3)" icon_color="#36af48"][vc_column_text css=".vc_custom_1452396135287{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #36af48; letter-spacing: 0.1em; font-size: 42px;">SELECTION 3</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 4" item_name_alias="Selection 4" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" icon_color="#25a7e8"][vc_column_text css=".vc_custom_1452396158237{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION 4</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 5" item_name_alias="Selection 5" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)" icon_color="#9e5ae2"][vc_column_text css=".vc_custom_1452396183514{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION 5</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_8 = __('Smart One Page - Sub Navigation Style 2 - Position: Right', 'Smart-One-Page-Navigation');				
		$post_sample_8 = array(
			'post_content'   => $data_sample_8,
			'post_name' 	 => sanitize_title($page_name_8.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_8,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_8 = wp_insert_post($post_sample_8, false);		
		$post_url.='<a href="'.get_permalink($post_id_8).'" target="_blank">'.$page_name_8.'</a>';
		
		//9
		$data_sample_9 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container nav_separator_color="rgba(255,255,255,0.05)" loading_style="spinner-pulse" loading_color="#dd3333" mnav_style="classic" content_width="1" snav_style="style-2" snav_behavior="1" snav_position="style-bottom" nav_font_weight="normal" snav_font_weight="normal" nav_bg="#111111" nav_text_color="#ffffff" nav_text_hover_color="#999999" nav_text_active_color="#ffffff" logo="'.$image_list_upload[8].'" logo_retina="'.$image_list_upload[9].'" nav_height="60px" mnav_sticky_height="60px" nav_active_bg="#333333" snav_bg="#111111" snav_tooltip_bg="#1abc9c" snav_tooltip_color="#ffffff" snav_item_color="#777777" snav_item_hover_color="#ffffff" snav_item_bg_hover_color="#1abc9c" snav_item_active_color="#ffffff" snav_item_bg_active_color="#1abc9c"][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 1" item_name_alias="Selection 1" background_color="rgba(221,153,51,0.3)" icon_font="fa fa-home" icon_color="#dd9933"][vc_column_text css=".vc_custom_1452396915999{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION 1</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #111111; font-size: 20px; font-weight: 600;">Sub Navigation Style 2 - Position: Bottom</span></p>

[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 2" item_name_alias="Selection 2" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)" icon_color="#dd3333"][vc_column_text css=".vc_custom_1452396111427{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION 2</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 3" item_name_alias="Selection 3" icon_font="fa fa-cogs" background_color="rgba(129,215,66,0.3)" icon_color="#36af48"][vc_column_text css=".vc_custom_1452396135287{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #36af48; letter-spacing: 0.1em; font-size: 42px;">SELECTION 3</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 4" item_name_alias="Selection 4" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" icon_color="#25a7e8"][vc_column_text css=".vc_custom_1452396158237{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION 4</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 5" item_name_alias="Selection 5" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)" icon_color="#9e5ae2"][vc_column_text css=".vc_custom_1452396183514{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION 5</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_9 = __('Smart One Page -  Sub Navigation Style 2 - Position: Bottom', 'Smart-One-Page-Navigation');				
		$post_sample_9 = array(
			'post_content'   => $data_sample_9,
			'post_name' 	 => sanitize_title($page_name_9.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_9,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_9 = wp_insert_post($post_sample_9, false);		
		$post_url.='<a href="'.get_permalink($post_id_9).'" target="_blank">'.$page_name_9.'</a>';
		
		//10
		$data_sample_10 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container nav_separator_color="rgba(255,255,255,0.05)" loading_style="chasing-dots" loading_color="#dd3333" mnav_style="classic" content_width="1" snav_style="style-2" snav_behavior="1" snav_position="style-left" nav_font_weight="normal" snav_font_weight="normal" nav_bg="#111111" nav_text_color="#ffffff" nav_text_hover_color="#999999" nav_text_active_color="#ffffff" logo="'.$image_list_upload[8].'" logo_retina="'.$image_list_upload[9].'" nav_height="60px" mnav_sticky_height="60px" nav_active_bg="#333333" snav_bg="#111111" snav_tooltip_bg="#1abc9c" snav_tooltip_color="#ffffff" snav_item_color="#777777" snav_item_hover_color="#ffffff" snav_item_bg_hover_color="#1abc9c" snav_item_active_color="#ffffff" snav_item_bg_active_color="#1abc9c"][op_item item_icon="font" content_width="1" height="1" content_position="1" downmore_button="yes" item_name="Selection 1" item_name_alias="Selection 1" background_color="rgba(221,153,51,0.3)" icon_font="fa fa-home" downmore_button_color="#111111" icon_color="#dd9933"][vc_column_text css=".vc_custom_1452396915999{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION 1</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #111111; font-size: 20px; font-weight: 600;">Sub Navigation Style 2 - Position: Left</span></p>

[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 2" item_name_alias="Selection 2" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)" icon_color="#dd3333"][vc_column_text css=".vc_custom_1452396111427{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION 2</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 3" item_name_alias="Selection 3" icon_font="fa fa-cogs" background_color="rgba(129,215,66,0.3)" icon_color="#36af48"][vc_column_text css=".vc_custom_1452396135287{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #36af48; letter-spacing: 0.1em; font-size: 42px;">SELECTION 3</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 4" item_name_alias="Selection 4" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" icon_color="#25a7e8"][vc_column_text css=".vc_custom_1452396158237{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION 4</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 5" item_name_alias="Selection 5" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)" icon_color="#9e5ae2"][vc_column_text css=".vc_custom_1452396183514{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION 5</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_10 = __('Smart One Page - Sub Navigation Style 2 - Position: Left', 'Smart-One-Page-Navigation');				
		$post_sample_10 = array(
			'post_content'   => $data_sample_10,
			'post_name' 	 => sanitize_title($page_name_10.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_10,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_10 = wp_insert_post($post_sample_10, false);		
		$post_url.='<a href="'.get_permalink($post_id_10).'" target="_blank">'.$page_name_10.'</a>';
		
		//11
		$data_sample_11 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container nav_separator_color="rgba(255,255,255,0.05)" loading_style="three-bounce" loading_color="#dd3333" mnav_style="classic" content_width="1" snav_style="style-3" snav_behavior="1" nav_font_weight="normal" snav_font_weight="normal" nav_bg="#111111" nav_text_color="#ffffff" nav_text_hover_color="#999999" nav_text_active_color="#ffffff" logo="'.$image_list_upload[8].'" logo_retina="'.$image_list_upload[9].'" nav_height="60px" mnav_sticky_height="60px" nav_active_bg="#333333" snav_bg="#111111" snav_tooltip_bg="#d13030" snav_tooltip_color="#ffffff" snav_item_color="#999999" snav_item_hover_color="#ff9191" snav_item_bg_hover_color="#d13030" snav_item_active_color="#ff9191" snav_item_bg_active_color="#d13030"][op_item item_icon="font" content_width="1" height="1" content_position="1" downmore_button="yes" item_name="Selection 1" item_name_alias="Selection 1" background_color="rgba(221,153,51,0.3)" icon_font="fa fa-home" downmore_button_color="#111111" icon_color="#dd9933"][vc_column_text css=".vc_custom_1452396915999{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION 1</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #111111; font-size: 20px; font-weight: 600;">Sub Navigation Style 3 - Position: Right</span></p>

[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 2" item_name_alias="Selection 2" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)" icon_color="#dd3333"][vc_column_text css=".vc_custom_1452396111427{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION 2</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 3" item_name_alias="Selection 3" icon_font="fa fa-cogs" background_color="rgba(129,215,66,0.3)" icon_color="#36af48"][vc_column_text css=".vc_custom_1452396135287{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #36af48; letter-spacing: 0.1em; font-size: 42px;">SELECTION 3</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 4" item_name_alias="Selection 4" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" icon_color="#25a7e8"][vc_column_text css=".vc_custom_1452396158237{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION 4</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 5" item_name_alias="Selection 5" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)" icon_color="#9e5ae2"][vc_column_text css=".vc_custom_1452396183514{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION 5</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_11 = __('Smart One Page - Sub Navigation Style 3 - Position: Right', 'Smart-One-Page-Navigation');				
		$post_sample_11 = array(
			'post_content'   => $data_sample_11,
			'post_name' 	 => sanitize_title($page_name_11.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_11,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_11 = wp_insert_post($post_sample_11, false);		
		$post_url.='<a href="'.get_permalink($post_id_11).'" target="_blank">'.$page_name_11.'</a>';
		
		//12
		$data_sample_12 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container nav_separator_color="rgba(255,255,255,0.05)" loading_style="circle" loading_color="#dd3333" mnav_style="classic" content_width="1" snav_style="style-3" snav_behavior="1" snav_position="style-bottom" nav_font_weight="normal" snav_font_weight="normal" nav_bg="#111111" nav_text_color="#ffffff" nav_text_hover_color="#999999" nav_text_active_color="#ffffff" logo="'.$image_list_upload[8].'" logo_retina="'.$image_list_upload[9].'" nav_height="60px" mnav_sticky_height="60px" nav_active_bg="#333333" snav_bg="#111111" snav_tooltip_bg="#d13030" snav_tooltip_color="#ffffff" snav_item_color="#999999" snav_item_hover_color="#ff9191" snav_item_bg_hover_color="#d13030" snav_item_active_color="#ff9191" snav_item_bg_active_color="#d13030"][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 1" item_name_alias="Selection 1" background_color="rgba(221,153,51,0.3)" icon_font="fa fa-home" icon_color="#dd9933"][vc_column_text css=".vc_custom_1452396915999{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION 1</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #111111; font-size: 20px; font-weight: 600;">Sub Navigation Style 3 - Position: Bottom</span></p>

[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 2" item_name_alias="Selection 2" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)" icon_color="#dd3333"][vc_column_text css=".vc_custom_1452396111427{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION 2</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 3" item_name_alias="Selection 3" icon_font="fa fa-cogs" background_color="rgba(129,215,66,0.3)" icon_color="#36af48"][vc_column_text css=".vc_custom_1452396135287{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #36af48; letter-spacing: 0.1em; font-size: 42px;">SELECTION 3</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 4" item_name_alias="Selection 4" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" icon_color="#25a7e8"][vc_column_text css=".vc_custom_1452396158237{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION 4</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 5" item_name_alias="Selection 5" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)" icon_color="#9e5ae2"][vc_column_text css=".vc_custom_1452396183514{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION 5</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_12 = __('Smart One Page - Sub Navigation Style 3 - Position: Bottom', 'Smart-One-Page-Navigation');				
		$post_sample_12 = array(
			'post_content'   => $data_sample_12,
			'post_name' 	 => sanitize_title($page_name_12.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_12,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_12 = wp_insert_post($post_sample_12, false);		
		$post_url.='<a href="'.get_permalink($post_id_12).'" target="_blank">'.$page_name_12.'</a>';
		
		//13
		$data_sample_13 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container nav_separator_color="rgba(255,255,255,0.05)" loading_style="cube-grid" loading_color="#dd3333" mnav_style="classic" content_width="1" snav_style="style-3" snav_behavior="1" snav_position="style-left" nav_font_weight="normal" snav_font_weight="normal" nav_bg="#111111" nav_text_color="#ffffff" nav_text_hover_color="#999999" nav_text_active_color="#ffffff" logo="'.$image_list_upload[8].'" logo_retina="'.$image_list_upload[9].'" nav_height="60px" mnav_sticky_height="60px" nav_active_bg="#333333" snav_bg="#111111" snav_tooltip_bg="#d13030" snav_tooltip_color="#ffffff" snav_item_color="#999999" snav_item_hover_color="#ff9191" snav_item_bg_hover_color="#d13030" snav_item_active_color="#ff9191" snav_item_bg_active_color="#d13030"][op_item item_icon="font" content_width="1" height="1" content_position="1" downmore_button="yes" item_name="Selection 1" item_name_alias="Selection 1" background_color="rgba(221,153,51,0.3)" icon_font="fa fa-home" downmore_button_color="#111111" icon_color="#dd9933"][vc_column_text css=".vc_custom_1452396915999{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION 1</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #111111; font-size: 20px; font-weight: 600;">Sub Navigation Style 3 - Position: Left</span></p>

[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 2" item_name_alias="Selection 2" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)" icon_color="#dd3333"][vc_column_text css=".vc_custom_1452396111427{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION 2</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 3" item_name_alias="Selection 3" icon_font="fa fa-cogs" background_color="rgba(129,215,66,0.3)" icon_color="#36af48"][vc_column_text css=".vc_custom_1452396135287{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #36af48; letter-spacing: 0.1em; font-size: 42px;">SELECTION 3</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 4" item_name_alias="Selection 4" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" icon_color="#25a7e8"][vc_column_text css=".vc_custom_1452396158237{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION 4</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 5" item_name_alias="Selection 5" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)" icon_color="#9e5ae2"][vc_column_text css=".vc_custom_1452396183514{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION 5</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_13 = __('Smart One Page - Sub Navigation Style 3 - Position: Left', 'Smart-One-Page-Navigation');				
		$post_sample_13 = array(
			'post_content'   => $data_sample_13,
			'post_name' 	 => sanitize_title($page_name_13.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_13,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_13 = wp_insert_post($post_sample_13, false);		
		$post_url.='<a href="'.get_permalink($post_id_13).'" target="_blank">'.$page_name_13.'</a>';
		
		//14
		$data_sample_14 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container nav_separator_color="rgba(255,255,255,0.05)" loading_style="fading-circle" loading_color="#dd3333" mnav_style="classic" content_width="1" snav_style="style-4" snav_behavior="1" nav_font_weight="normal" snav_font_weight="normal" nav_bg="#111111" nav_text_color="#ffffff" nav_text_hover_color="#999999" nav_text_active_color="#ffffff" logo="'.$image_list_upload[8].'" logo_retina="'.$image_list_upload[9].'" nav_height="60px" mnav_sticky_height="60px" nav_active_bg="#333333" snav_item_color="#111111" snav_item_bg_hover_color="#111111" snav_item_active_color="#111111" snav_item_bg_active_color="#111111" snav_item_hover_color="#111111"][op_item item_icon="font" content_width="1" height="1" content_position="1" downmore_button="yes" item_name="Selection 1" item_name_alias="Selection 1" background_color="rgba(221,153,51,0.3)" icon_font="fa fa-home" downmore_button_color="#111111" icon_color="#dd9933"][vc_column_text css=".vc_custom_1452396915999{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION 1</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #111111; font-size: 20px; font-weight: 600;">Sub Navigation Style 4 - Position: Right</span></p>

[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 2" item_name_alias="Selection 2" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)" icon_color="#dd3333"][vc_column_text css=".vc_custom_1452396111427{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION 2</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 3" item_name_alias="Selection 3" icon_font="fa fa-cogs" background_color="rgba(129,215,66,0.3)" icon_color="#36af48"][vc_column_text css=".vc_custom_1452396135287{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #36af48; letter-spacing: 0.1em; font-size: 42px;">SELECTION 3</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 4" item_name_alias="Selection 4" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" icon_color="#25a7e8"][vc_column_text css=".vc_custom_1452396158237{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION 4</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 5" item_name_alias="Selection 5" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)" icon_color="#9e5ae2"][vc_column_text css=".vc_custom_1452396183514{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION 5</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_14 = __('Smart One Page - Sub Navigation Style 4 - Position: Right', 'Smart-One-Page-Navigation');				
		$post_sample_14 = array(
			'post_content'   => $data_sample_14,
			'post_name' 	 => sanitize_title($page_name_14.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_14,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_14 = wp_insert_post($post_sample_14, false);		
		$post_url.='<a href="'.get_permalink($post_id_14).'" target="_blank">'.$page_name_14.'</a>';
		
		//15
		$data_sample_15 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container nav_separator_color="rgba(255,255,255,0.05)" loading_style="folding-cube" loading_color="#dd3333" mnav_style="classic" content_width="1" snav_style="style-4" snav_behavior="1" snav_position="style-bottom" nav_font_weight="normal" snav_font_weight="normal" nav_bg="#111111" nav_text_color="#ffffff" nav_text_hover_color="#999999" nav_text_active_color="#ffffff" logo="'.$image_list_upload[8].'" logo_retina="'.$image_list_upload[9].'" nav_height="60px" mnav_sticky_height="60px" nav_active_bg="#333333" snav_item_color="#111111" snav_item_bg_hover_color="#111111" snav_item_active_color="#111111" snav_item_bg_active_color="#111111" snav_item_hover_color="#111111"][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 1" item_name_alias="Selection 1" background_color="rgba(221,153,51,0.3)" icon_font="fa fa-home" icon_color="#dd9933"][vc_column_text css=".vc_custom_1452396915999{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION 1</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #111111; font-size: 20px; font-weight: 600;">Sub Navigation Style 4 - Position: Bottom</span></p>

[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 2" item_name_alias="Selection 2" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)" icon_color="#dd3333"][vc_column_text css=".vc_custom_1452396111427{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION 2</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 3" item_name_alias="Selection 3" icon_font="fa fa-cogs" background_color="rgba(129,215,66,0.3)" icon_color="#36af48"][vc_column_text css=".vc_custom_1452396135287{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #36af48; letter-spacing: 0.1em; font-size: 42px;">SELECTION 3</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 4" item_name_alias="Selection 4" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" icon_color="#25a7e8"][vc_column_text css=".vc_custom_1452396158237{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION 4</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 5" item_name_alias="Selection 5" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)" icon_color="#9e5ae2"][vc_column_text css=".vc_custom_1452396183514{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION 5</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_15 = __('Smart One Page - Sub Navigation Style 4 - Position: Bottom', 'Smart-One-Page-Navigation');				
		$post_sample_15 = array(
			'post_content'   => $data_sample_15,
			'post_name' 	 => sanitize_title($page_name_15.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_15,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_15 = wp_insert_post($post_sample_15, false);		
		$post_url.='<a href="'.get_permalink($post_id_15).'" target="_blank">'.$page_name_15.'</a>';
		
		//16
		$data_sample_16 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container nav_separator_color="rgba(255,255,255,0.05)" loading_style="rotating-plane" loading_color="#dd3333" mnav_style="classic" content_width="1" snav_style="style-4" snav_behavior="1" snav_position="style-left" nav_font_weight="normal" snav_font_weight="normal" nav_bg="#111111" nav_text_color="#ffffff" nav_text_hover_color="#999999" nav_text_active_color="#ffffff" logo="'.$image_list_upload[8].'" logo_retina="'.$image_list_upload[9].'" nav_height="60px" mnav_sticky_height="60px" nav_active_bg="#333333" snav_item_color="#111111" snav_item_bg_hover_color="#111111" snav_item_active_color="#111111" snav_item_bg_active_color="#111111" snav_item_hover_color="#111111"][op_item item_icon="font" content_width="1" height="1" content_position="1" downmore_button="yes" item_name="Selection 1" item_name_alias="Selection 1" background_color="rgba(221,153,51,0.3)" icon_font="fa fa-home" downmore_button_color="#111111" icon_color="#dd9933"][vc_column_text css=".vc_custom_1452396915999{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION 1</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #111111; font-size: 20px; font-weight: 600;">Sub Navigation Style 4 - Position: Left</span></p>

[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 2" item_name_alias="Selection 2" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)" icon_color="#dd3333"][vc_column_text css=".vc_custom_1452396111427{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION 2</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 3" item_name_alias="Selection 3" icon_font="fa fa-cogs" background_color="rgba(129,215,66,0.3)" icon_color="#36af48"][vc_column_text css=".vc_custom_1452396135287{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #36af48; letter-spacing: 0.1em; font-size: 42px;">SELECTION 3</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 4" item_name_alias="Selection 4" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" icon_color="#25a7e8"][vc_column_text css=".vc_custom_1452396158237{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION 4</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 5" item_name_alias="Selection 5" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)" icon_color="#9e5ae2"][vc_column_text css=".vc_custom_1452396183514{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION 5</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_16 = __('Smart One Page - Sub Navigation Style 4 - Position: Left', 'Smart-One-Page-Navigation');				
		$post_sample_16 = array(
			'post_content'   => $data_sample_16,
			'post_name' 	 => sanitize_title($page_name_16.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_16,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_16 = wp_insert_post($post_sample_16, false);		
		$post_url.='<a href="'.get_permalink($post_id_16).'" target="_blank">'.$page_name_16.'</a>';
		
		//17
		$data_sample_17 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container nav_separator_color="rgba(255,255,255,0.05)" loading_style="double-bounce" loading_color="#dd3333" mnav_style="classic" content_width="1" snav_style="style-5" snav_behavior="1" nav_font_weight="normal" snav_font_weight="normal" nav_bg="#111111" nav_text_color="#ffffff" nav_text_hover_color="#999999" nav_text_active_color="#ffffff" logo="'.$image_list_upload[8].'" logo_retina="'.$image_list_upload[9].'" nav_height="60px" mnav_sticky_height="60px" nav_active_bg="#333333" snav_item_color="#111111" snav_item_bg_hover_color="#111111" snav_item_active_color="#111111" snav_item_bg_active_color="#111111" snav_item_hover_color="#111111"][op_item item_icon="font" content_width="1" height="1" content_position="1" downmore_button="yes" item_name="Selection 1" item_name_alias="Selection 1" background_color="rgba(221,153,51,0.3)" icon_font="fa fa-home" downmore_button_color="#111111" icon_color="#dd9933"][vc_column_text css=".vc_custom_1452396915999{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION 1</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #111111; font-size: 20px; font-weight: 600;">Sub Navigation Style 5 - Position: Right</span></p>

[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 2" item_name_alias="Selection 2" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)" icon_color="#dd3333"][vc_column_text css=".vc_custom_1452396111427{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION 2</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 3" item_name_alias="Selection 3" icon_font="fa fa-cogs" background_color="rgba(129,215,66,0.3)" icon_color="#36af48"][vc_column_text css=".vc_custom_1452396135287{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #36af48; letter-spacing: 0.1em; font-size: 42px;">SELECTION 3</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 4" item_name_alias="Selection 4" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" icon_color="#25a7e8"][vc_column_text css=".vc_custom_1452396158237{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION 4</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 5" item_name_alias="Selection 5" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)" icon_color="#9e5ae2"][vc_column_text css=".vc_custom_1452396183514{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION 5</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_17 = __('Smart One Page - Sub Navigation Style 5 - Position: Right', 'Smart-One-Page-Navigation');				
		$post_sample_17 = array(
			'post_content'   => $data_sample_17,
			'post_name' 	 => sanitize_title($page_name_17.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_17,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_17 = wp_insert_post($post_sample_17, false);		
		$post_url.='<a href="'.get_permalink($post_id_17).'" target="_blank">'.$page_name_17.'</a>';
		
		//18
		$data_sample_18 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container nav_separator_color="rgba(255,255,255,0.05)" loading_style="wave" loading_color="#dd3333" mnav_style="classic" content_width="1" snav_style="style-5" snav_behavior="1" snav_position="style-bottom" nav_font_weight="normal" snav_font_weight="normal" nav_bg="#111111" nav_text_color="#ffffff" nav_text_hover_color="#999999" nav_text_active_color="#ffffff" logo="'.$image_list_upload[8].'" logo_retina="'.$image_list_upload[9].'" nav_height="60px" mnav_sticky_height="60px" nav_active_bg="#333333" snav_item_color="#111111" snav_item_bg_hover_color="#111111" snav_item_active_color="#111111" snav_item_bg_active_color="#111111" snav_item_hover_color="#111111"][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 1" item_name_alias="Selection 1" background_color="rgba(221,153,51,0.3)" icon_font="fa fa-home" icon_color="#dd9933"][vc_column_text css=".vc_custom_1452396915999{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION 1</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #111111; font-size: 20px; font-weight: 600;">Sub Navigation Style 5 - Position: Bottom</span></p>

[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 2" item_name_alias="Selection 2" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)" icon_color="#dd3333"][vc_column_text css=".vc_custom_1452396111427{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION 2</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 3" item_name_alias="Selection 3" icon_font="fa fa-cogs" background_color="rgba(129,215,66,0.3)" icon_color="#36af48"][vc_column_text css=".vc_custom_1452396135287{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #36af48; letter-spacing: 0.1em; font-size: 42px;">SELECTION 3</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 4" item_name_alias="Selection 4" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" icon_color="#25a7e8"][vc_column_text css=".vc_custom_1452396158237{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION 4</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 5" item_name_alias="Selection 5" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)" icon_color="#9e5ae2"][vc_column_text css=".vc_custom_1452396183514{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION 5</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_18 = __('Smart One Page - Sub Navigation Style 5 - Position: Bottom', 'Smart-One-Page-Navigation');				
		$post_sample_18 = array(
			'post_content'   => $data_sample_18,
			'post_name' 	 => sanitize_title($page_name_18.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_18,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_18 = wp_insert_post($post_sample_18, false);		
		$post_url.='<a href="'.get_permalink($post_id_18).'" target="_blank">'.$page_name_18.'</a>';
		
		//19
		$data_sample_19 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container nav_separator_color="rgba(255,255,255,0.05)" loading_style="wandering-cubes" loading_color="#dd3333" mnav_style="classic" content_width="1" snav_style="style-5" snav_behavior="1" snav_position="style-left" nav_font_weight="normal" snav_font_weight="normal" nav_bg="#111111" nav_text_color="#ffffff" nav_text_hover_color="#999999" nav_text_active_color="#ffffff" logo="'.$image_list_upload[8].'" logo_retina="'.$image_list_upload[9].'" nav_height="60px" mnav_sticky_height="60px" nav_active_bg="#333333" snav_item_color="#111111" snav_item_bg_hover_color="#111111" snav_item_active_color="#111111" snav_item_bg_active_color="#111111" snav_item_hover_color="#111111"][op_item item_icon="font" content_width="1" height="1" content_position="1" downmore_button="yes" item_name="Selection 1" item_name_alias="Selection 1" background_color="rgba(221,153,51,0.3)" icon_font="fa fa-home" downmore_button_color="#111111" icon_color="#dd9933"][vc_column_text css=".vc_custom_1452396915999{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION 1</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #111111; font-size: 20px; font-weight: 600;">Sub Navigation Style 5 - Position: Left</span></p>

[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 2" item_name_alias="Selection 2" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)" icon_color="#dd3333"][vc_column_text css=".vc_custom_1452396111427{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION 2</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 3" item_name_alias="Selection 3" icon_font="fa fa-cogs" background_color="rgba(129,215,66,0.3)" icon_color="#36af48"][vc_column_text css=".vc_custom_1452396135287{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #36af48; letter-spacing: 0.1em; font-size: 42px;">SELECTION 3</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 4" item_name_alias="Selection 4" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" icon_color="#25a7e8"][vc_column_text css=".vc_custom_1452396158237{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION 4</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 5" item_name_alias="Selection 5" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)" icon_color="#9e5ae2"][vc_column_text css=".vc_custom_1452396183514{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION 5</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_19 = __('Smart One Page - Sub Navigation Style 5 - Position: Left', 'Smart-One-Page-Navigation');				
		$post_sample_19 = array(
			'post_content'   => $data_sample_19,
			'post_name' 	 => sanitize_title($page_name_19.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_19,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_19 = wp_insert_post($post_sample_19, false);		
		$post_url.='<a href="'.get_permalink($post_id_19).'" target="_blank">'.$page_name_19.'</a>';
		
		//20
		$data_sample_20 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container nav_separator_color="rgba(255,255,255,0.05)" loading_style="spinner-pulse" loading_color="#dd3333" mnav_style="classic" content_width="1" snav_style="style-6" snav_behavior="1" nav_font_weight="normal" snav_font_weight="normal" nav_bg="#111111" nav_text_color="#ffffff" nav_text_hover_color="#999999" nav_text_active_color="#ffffff" logo="'.$image_list_upload[8].'" logo_retina="'.$image_list_upload[9].'" nav_height="60px" mnav_sticky_height="60px" nav_active_bg="#333333" snav_bg="#111111" snav_tooltip_bg="#1abc9c" snav_tooltip_color="#ffffff" snav_item_color="#777777" snav_item_hover_color="#ffffff" snav_item_bg_hover_color="#1abc9c" snav_item_active_color="#ffffff" snav_item_bg_active_color="#1abc9c"][op_item item_icon="font" content_width="1" height="1" content_position="1" downmore_button="yes" item_name="Selection 1" item_name_alias="Selection 1" background_color="rgba(221,153,51,0.3)" icon_font="fa fa-home" downmore_button_color="#111111" icon_color="#dd9933"][vc_column_text css=".vc_custom_1452396915999{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION 1</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #111111; font-size: 20px; font-weight: 600;">Sub Navigation Style 6 - Position: Right</span></p>

[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 2" item_name_alias="Selection 2" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)" icon_color="#dd3333"][vc_column_text css=".vc_custom_1452396111427{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION 2</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 3" item_name_alias="Selection 3" icon_font="fa fa-cogs" background_color="rgba(129,215,66,0.3)" icon_color="#36af48"][vc_column_text css=".vc_custom_1452396135287{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #36af48; letter-spacing: 0.1em; font-size: 42px;">SELECTION 3</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 4" item_name_alias="Selection 4" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" icon_color="#25a7e8"][vc_column_text css=".vc_custom_1452396158237{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION 4</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 5" item_name_alias="Selection 5" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)" icon_color="#9e5ae2"][vc_column_text css=".vc_custom_1452396183514{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION 5</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_20 = __('Smart One Page - Sub Navigation Style 6 - Position: Right', 'Smart-One-Page-Navigation');				
		$post_sample_20 = array(
			'post_content'   => $data_sample_20,
			'post_name' 	 => sanitize_title($page_name_20.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_20,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_20 = wp_insert_post($post_sample_20, false);		
		$post_url.='<a href="'.get_permalink($post_id_20).'" target="_blank">'.$page_name_20.'</a>';
		
		//21
		$data_sample_21 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container nav_separator_color="rgba(255,255,255,0.05)" loading_style="chasing-dots" loading_color="#dd3333" mnav_style="classic" content_width="1" snav_style="style-6" snav_behavior="1" snav_position="style-bottom" nav_font_weight="normal" snav_font_weight="normal" nav_bg="#111111" nav_text_color="#ffffff" nav_text_hover_color="#999999" nav_text_active_color="#ffffff" logo="'.$image_list_upload[8].'" logo_retina="'.$image_list_upload[9].'" nav_height="60px" mnav_sticky_height="60px" nav_active_bg="#333333" snav_bg="#111111" snav_tooltip_bg="#1abc9c" snav_tooltip_color="#ffffff" snav_item_color="#777777" snav_item_hover_color="#ffffff" snav_item_bg_hover_color="#1abc9c" snav_item_active_color="#ffffff" snav_item_bg_active_color="#1abc9c"][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 1" item_name_alias="Selection 1" background_color="rgba(221,153,51,0.3)" icon_font="fa fa-home" icon_color="#dd9933"][vc_column_text css=".vc_custom_1452396915999{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION 1</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #111111; font-size: 20px; font-weight: 600;">Sub Navigation Style 6 - Position: Bottom</span></p>

[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 2" item_name_alias="Selection 2" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)" icon_color="#dd3333"][vc_column_text css=".vc_custom_1452396111427{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION 2</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 3" item_name_alias="Selection 3" icon_font="fa fa-cogs" background_color="rgba(129,215,66,0.3)" icon_color="#36af48"][vc_column_text css=".vc_custom_1452396135287{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #36af48; letter-spacing: 0.1em; font-size: 42px;">SELECTION 3</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 4" item_name_alias="Selection 4" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" icon_color="#25a7e8"][vc_column_text css=".vc_custom_1452396158237{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION 4</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 5" item_name_alias="Selection 5" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)" icon_color="#9e5ae2"][vc_column_text css=".vc_custom_1452396183514{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION 5</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_21 = __('Smart One Page - Sub Navigation Style 6 - Position: Bottom', 'Smart-One-Page-Navigation');				
		$post_sample_21 = array(
			'post_content'   => $data_sample_21,
			'post_name' 	 => sanitize_title($page_name_21.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_21,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_21 = wp_insert_post($post_sample_21, false);		
		$post_url.='<a href="'.get_permalink($post_id_21).'" target="_blank">'.$page_name_21.'</a>';
		
		//22
		$data_sample_22 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container nav_separator_color="rgba(255,255,255,0.05)" loading_style="three-bounce" loading_color="#dd3333" mnav_style="classic" content_width="1" snav_style="style-6" snav_behavior="1" snav_position="style-left" nav_font_weight="normal" snav_font_weight="normal" nav_bg="#111111" nav_text_color="#ffffff" nav_text_hover_color="#999999" nav_text_active_color="#ffffff" logo="'.$image_list_upload[8].'" logo_retina="'.$image_list_upload[9].'" nav_height="60px" mnav_sticky_height="60px" nav_active_bg="#333333" snav_bg="#111111" snav_tooltip_bg="#1abc9c" snav_tooltip_color="#ffffff" snav_item_color="#777777" snav_item_hover_color="#ffffff" snav_item_bg_hover_color="#1abc9c" snav_item_active_color="#ffffff" snav_item_bg_active_color="#1abc9c"][op_item item_icon="font" content_width="1" height="1" content_position="1" downmore_button="yes" item_name="Selection 1" item_name_alias="Selection 1" background_color="rgba(221,153,51,0.3)" icon_font="fa fa-home" downmore_button_color="#111111" icon_color="#dd9933"][vc_column_text css=".vc_custom_1452396915999{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd9933; letter-spacing: 0.1em; font-size: 42px;">SELECTION 1</span></h2>
<p style="text-align: center; padding-top: 14px;"><span style="color: #111111; font-size: 20px; font-weight: 600;">Sub Navigation Style 6 - Position: Left</span></p>

[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 2" item_name_alias="Selection 2" icon_font="fa fa-heart" background_color="rgba(221,51,51,0.3)" icon_color="#dd3333"][vc_column_text css=".vc_custom_1452396111427{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #dd3333; letter-spacing: 0.1em; font-size: 42px;">SELECTION 2</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 3" item_name_alias="Selection 3" icon_font="fa fa-cogs" background_color="rgba(129,215,66,0.3)" icon_color="#36af48"][vc_column_text css=".vc_custom_1452396135287{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #36af48; letter-spacing: 0.1em; font-size: 42px;">SELECTION 3</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 4" item_name_alias="Selection 4" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" icon_color="#25a7e8"][vc_column_text css=".vc_custom_1452396158237{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #1e73be; letter-spacing: 0.1em; font-size: 42px;">SELECTION 4</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection 5" item_name_alias="Selection 5" icon_font="fa fa-cubes" background_color="rgba(130,36,227,0.3)" icon_color="#9e5ae2"][vc_column_text css=".vc_custom_1452396183514{margin-bottom: 0px !important;padding-top: 55px !important;padding-bottom: 56px !important;}"]
<h2 style="text-align: center; margin: 0;"><span style="color: #8224e3; letter-spacing: 0.1em; font-size: 42px;">SELECTION 5</span></h2>
[/vc_column_text][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_22 = __('Smart One Page - Sub Navigation Style 6 - Position: Left', 'Smart-One-Page-Navigation');				
		$post_sample_22 = array(
			'post_content'   => $data_sample_22,
			'post_name' 	 => sanitize_title($page_name_22.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_22,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_22 = wp_insert_post($post_sample_22, false);		
		$post_url.='<a href="'.get_permalink($post_id_22).'" target="_blank">'.$page_name_22.'</a>';
		
		//23
		$data_sample_23 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container mnav_style="hamburger-menu" mnav_sticky_behavior="2" snav_style="style-6" snav_behavior="1" scroll_effect="easeOutExpo" nav_font_weight="normal" snav_font_weight="normal" loading_style="folding-cube" scroll_speed="1200" nav_bg="rgba(0,0,0,0.8)" nav_text_color="rgba(255,255,255,0.75)" nav_text_hover_color="#ffffff" nav_text_active_color="#ffffff" snav_tooltip_bg="#1abc9c" snav_item_color="#777777" snav_item_hover_color="#ffffff" snav_item_bg_hover_color="#1abc9c" snav_item_active_color="#ffffff" snav_item_bg_active_color="#1abc9c" stnav_bg="#ffffff" stnav_shadow="rgba(0,0,0,0.25)" stnav_text_color="#111111" stnav_text_hover_color="#999999" stnav_text_active_color="#1abc9c" logo="'.$image_list_upload[2].'" logo_retina="'.$image_list_upload[3].'" st_logo="'.$image_list_upload[4].'" st_logo_retina="'.$image_list_upload[5].'" snav_bg="#111111" snav_tooltip_color="#ffffff" loading_color="#1abc9c" dd_nav_separator_color="#1abc9c" dd_nav_text_color="#111111" dd_nav_text_hover_color="#1abc9c" mobile_bg="#111111" mobile_text_color="#999999" mobile_text_hover_color="#ffffff" mobile_text_active_color="#1abc9c" mobile_separator_color="rgba(255,255,255,0.05)" mobile_hover_bg="#222222" mobile_active_bg="#222222"][op_item item_icon="font" height="1" content_position="1" downmore_button="yes" item_name="Home" item_name_alias="home-alias" icon_font="fa fa-home" background_color="#d8d8d8" background_img="'.$image_list_upload[18].'"][vc_column_text css=".vc_custom_1453342427305{margin-bottom: 0px !important;padding-top: 35px !important;padding-right: 20px !important;padding-bottom: 52px !important;padding-left: 20px !important;}"]
<h1 style="text-align: center; font-size: 42px;"><span style="color: #ffffff; letter-spacing: 0.05em;">HOME SELECTION</span></h1>
<p style="text-align: center; font-size: 20px;"><span style="color: #ffffff;">HAMBURGER MENU - POSITION: LEFT</span></p>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection A" item_name_alias="Selection A" icon_font="fa fa-cubes" background_color="rgba(221,51,51,0.3)" padding_tiny="60px 20px"][vc_column_text css=".vc_custom_1452608065540{margin-bottom: 0px !important;padding-top: 35px !important;padding-right: 20px !important;padding-bottom: 52px !important;padding-left: 20px !important;}"]
<h2 style="text-align: center; font-size: 42px;"><span style="color: #000000; letter-spacing: 0.05em;">SELECTION A</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" height="1" content_position="1" item_name="Selection B" item_name_alias="Selection B" icon_font="fa fa-heart" background_color="#d8d8d8" background_img="'.$image_list_upload[13].'"][vc_column_text css=".vc_custom_1453343212964{margin-bottom: 0px !important;padding-top: 35px !important;padding-right: 20px !important;padding-bottom: 52px !important;padding-left: 20px !important;background-color: rgba(255,255,255,0.5) !important;*background-color: rgb(255,255,255) !important;}"]
<h2 style="text-align: center; font-size: 42px;"><span style="color: #000000; letter-spacing: 0.05em;">SELECTION B</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" height="1" content_position="1" item_name="Selection C" item_name_alias="Selection C" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" padding_tiny="60px 20px"][vc_column_text css=".vc_custom_1452608234108{margin-bottom: 0px !important;padding-top: 35px !important;padding-right: 20px !important;padding-bottom: 52px !important;padding-left: 20px !important;}"]
<h2 style="text-align: center; font-size: 42px;"><span style="color: #000000; letter-spacing: 0.05em;">SELECTION C</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" height="1" content_position="1" item_name="Features" item_name_alias="Features" icon_font="fa fa-database" background_color="#d8d8d8" padding_tiny="0 20px" background_img="'.$image_list_upload[16].'" padding_large="0 60px"][vc_column_text css=".vc_custom_1452358721546{margin-bottom: 45px !important;padding-top: 74px !important;}"]
<h2 style="text-align: center; font-size: 42px; margin: 0;"><span style="color: #1abc9c; letter-spacing: 0.05em;">FEATURES</span></h2>
[/vc_column_text][vc_row_inner css=".vc_custom_1452267565894{padding-bottom: 20px !important;}"][vc_column_inner width="1/2" css=".vc_custom_1452267357325{margin-bottom: 50px !important;}"][vc_column_text css=".vc_custom_1452271193767{margin-bottom: 0px !important;}"]
<ul style="font-size: 16px; line-height: 2; padding-left: 18px;">
	<li><span style="color: #000000; font-weight: 600;">Support One Page Basic (Developed by Beeteam368) &amp; Fullscreen Scrolling (FullPage.js)</span></li>
	<li><span style="color: #000000; font-weight: 600;">One Click Import Full Sample Data (20+ demo).</span></li>
	<li><span style="color: #000000; font-weight: 600;">Main Navigation Menus &amp; Custom Menus (dropdown mode)</span>
<ul>
	<li><span style="color: #000000;">Support 700+ Google Fonts</span></li>
	<li><span style="color: #000000;">Unlimited Color (background color, separator, menu item hover, menu item active ...)</span></li>
	<li><span style="color: #000000;">Logo Image on Main Navigation (support Retina Logo)</span></li>
	<li><span style="color: #000000;">Support FontAwesome Icons &amp; Image Icons</span></li>
</ul>
</li>
	<li><span style="color: #000000; font-weight: 600;">Smart Sticky Navigation</span>
<ul>
	<li><span style="color: #000000;">Unlimited Color (background, separator, menu item hover, menu item active ...)</span></li>
	<li><span style="color: #000000;">Logo Image on Sticky Navigation (support Retina Logo)</span></li>
	<li><span style="color: #000000;">Support FontAwesome Icons &amp; Image Icons</span></li>
	<li><span style="color: #000000;">Behavior: Only Appears When Page Is Scrolled Down &amp; Past The First Page</span></li>
	<li><span style="color: #000000;">Behavior: Only Appears When Page Is Scrolled Up</span></li>
	<li><span style="color: #000000;">Behavior: Always Visible</span></li>
</ul>
</li>
	<li><span style="color: #000000; font-weight: 600;">Sub Navigation</span>
<ul>
	<li><span style="color: #000000;">6 styles x 3 Positions (Right, Left, Bottom)</span></li>
	<li><span style="color: #000000;">Unlimited Color (background color, item hover, item active ...)</span></li>
	<li><span style="color: #000000;">Support Tooltip (700+ Google Fonts)</span></li>
	<li><span style="color: #000000;">Support FontAwesome Icons &amp; Image Icons</span></li>
</ul>
</li>
</ul>
[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2" css=".vc_custom_1452267365184{margin-bottom: 50px !important;}"][vc_column_text css=".vc_custom_1452357990741{margin-bottom: 0px !important;}"]
<ul style="font-size: 16px; line-height: 2; padding-left: 18px;">
	<li><span style="color: #000000; font-weight: 600;">Fully HTML5 &amp; CSS3 Support</span></li>
	<li><span style="color: #000000; font-weight: 600;">100% Responsive Design</span></li>
	<li><span style="color: #000000; font-weight: 600;">Mobile Menu</span>
<ul>
	<li><span style="color: #000000;">Unlimited Color (background color, separator, item hover, item active ...)</span></li>
	<li><span style="color: #000000;">Compatible with all mobile devices (mobile, tablet)</span></li>
</ul>
</li>
	<li><span style="color: #000000; font-weight: 600;">Other</span>
<ul>
	<li><span style="color: #000000;">Support Full Screen Mode</span></li>
	<li><span style="color: #000000;">Support HTML5 Video Background (MP4, OGV, WEBM)</span></li>
	<li><span style="color: #000000;">Support Youtube Video Background</span></li>
	<li><span style="color: #000000;">Support Parallax Scroll (down) Image Background</span></li>
	<li><span style="color: #000000;">Support Particle Canvas Background (Full Options)</span></li>
	<li><span style="color: #000000;">Support Content Animation On Visibility (70+ Effect)</span></li>
	<li><span style="color: #000000;">Simple loading spinners animated with CSS (11 style - unlimited color &amp; background color)</span></li>
	<li><span style="color: #000000;">Scroll Next(Prev) Item Effect (jQuery Easing - Custom speed[in milisecond])</span></li>
	<li><span style="color: #000000;">Support Full Height Mode for Each Item</span></li>
	<li><span style="color: #000000;">Custom Content Width &amp; Bootstrap Container (mobile, tablet, desktop)</span></li>
	<li><span style="color: #000000;">Custom Content Padding (mobile, tablet, desktop)</span></li>
	<li>Scroll Down More Button</li>
	<li><span style="color: #000000;">And Much More ...</span></li>
</ul>
</li>
</ul>
[/vc_column_text][/vc_column_inner][/vc_row_inner][/op_item][op_item item_icon="font" content_width="2" height="1" content_position="1" item_name="How To Use" item_name_alias="How To Use" icon_font="fa fa-cogs" width_large="800px" width_small="100%" width_medium="970px" padding_tiny="54px 20px 60px 20px" background_color="#ffffff"][vc_column_text css=".vc_custom_1452358730932{padding-right: 20px !important;padding-left: 20px !important;}"]
<h2 style="text-align: center; font-size: 42px; margin: 0;"><span style="color: #000000; letter-spacing: 0.05em;">HOW TO USE</span></h2>
[/vc_column_text][vc_video link="'.$youtube_tutorial.'" css=".vc_custom_1452272153637{margin-bottom: 0px !important;}"][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_23 = __('Smart One Page - Hamburger Menu - Left', 'Smart-One-Page-Navigation');				
		$post_sample_23 = array(
			'post_content'   => $data_sample_23,
			'post_name' 	 => sanitize_title($page_name_23.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_23,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_23 = wp_insert_post($post_sample_23, false);		
		$post_url.='<a href="'.get_permalink($post_id_23).'" target="_blank">'.$page_name_23.'</a>';
		
		//24
		$data_sample_24 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container mnav_style="hamburger-menu" hamburger_icon_pos="1" hamburger_menu_style="1" mnav_sticky_behavior="2" snav_style="style-6" snav_behavior="1" scroll_effect="easeOutExpo" nav_font_weight="normal" snav_font_weight="normal" loading_style="folding-cube" scroll_speed="1200" nav_bg="rgba(0,0,0,0.8)" nav_text_color="rgba(255,255,255,0.75)" nav_text_hover_color="#ffffff" nav_text_active_color="#ffffff" snav_tooltip_bg="#1abc9c" snav_item_color="#777777" snav_item_hover_color="#ffffff" snav_item_bg_hover_color="#1abc9c" snav_item_active_color="#ffffff" snav_item_bg_active_color="#1abc9c" stnav_bg="#ffffff" stnav_shadow="rgba(0,0,0,0.25)" stnav_text_color="#111111" stnav_text_hover_color="#999999" stnav_text_active_color="#1abc9c" logo="'.$image_list_upload[2].'" logo_retina="'.$image_list_upload[3].'" st_logo="'.$image_list_upload[4].'" st_logo_retina="'.$image_list_upload[5].'" snav_bg="#111111" snav_tooltip_color="#ffffff" loading_color="#1abc9c" dd_nav_separator_color="#1abc9c" dd_nav_text_color="#111111" dd_nav_text_hover_color="#1abc9c" mobile_bg="#111111" mobile_text_color="#999999" mobile_text_hover_color="#ffffff" mobile_text_active_color="#1abc9c" mobile_separator_color="rgba(255,255,255,0.05)" mobile_hover_bg="#222222" mobile_active_bg="#222222"][op_item item_icon="font" height="1" content_position="1" downmore_button="yes" item_name="Home" item_name_alias="home-alias" icon_font="fa fa-home" background_color="#d8d8d8" background_img="'.$image_list_upload[18].'"][vc_column_text css=".vc_custom_1453342427305{margin-bottom: 0px !important;padding-top: 35px !important;padding-right: 20px !important;padding-bottom: 52px !important;padding-left: 20px !important;}"]
<h1 style="text-align: center; font-size: 42px;"><span style="color: #ffffff; letter-spacing: 0.05em;">HOME SELECTION</span></h1>
<p style="text-align: center; font-size: 20px;"><span style="color: #ffffff;">HAMBURGER MENU - POSITION: RIGHT</span></p>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection A" item_name_alias="Selection A" icon_font="fa fa-cubes" background_color="rgba(221,51,51,0.3)" padding_tiny="60px 20px"][vc_column_text css=".vc_custom_1452608065540{margin-bottom: 0px !important;padding-top: 35px !important;padding-right: 20px !important;padding-bottom: 52px !important;padding-left: 20px !important;}"]
<h2 style="text-align: center; font-size: 42px;"><span style="color: #000000; letter-spacing: 0.05em;">SELECTION A</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" height="1" content_position="1" item_name="Selection B" item_name_alias="Selection B" icon_font="fa fa-heart" background_color="#d8d8d8" background_img="'.$image_list_upload[13].'"][vc_column_text css=".vc_custom_1453343212964{margin-bottom: 0px !important;padding-top: 35px !important;padding-right: 20px !important;padding-bottom: 52px !important;padding-left: 20px !important;background-color: rgba(255,255,255,0.5) !important;*background-color: rgb(255,255,255) !important;}"]
<h2 style="text-align: center; font-size: 42px;"><span style="color: #000000; letter-spacing: 0.05em;">SELECTION B</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" height="1" content_position="1" item_name="Selection C" item_name_alias="Selection C" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" padding_tiny="60px 20px"][vc_column_text css=".vc_custom_1452608234108{margin-bottom: 0px !important;padding-top: 35px !important;padding-right: 20px !important;padding-bottom: 52px !important;padding-left: 20px !important;}"]
<h2 style="text-align: center; font-size: 42px;"><span style="color: #000000; letter-spacing: 0.05em;">SELECTION C</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" height="1" content_position="1" item_name="Features" item_name_alias="Features" icon_font="fa fa-database" background_color="#d8d8d8" padding_tiny="0 20px" background_img="'.$image_list_upload[16].'" padding_large="0 60px"][vc_column_text css=".vc_custom_1452358721546{margin-bottom: 45px !important;padding-top: 74px !important;}"]
<h2 style="text-align: center; font-size: 42px; margin: 0;"><span style="color: #1abc9c; letter-spacing: 0.05em;">FEATURES</span></h2>
[/vc_column_text][vc_row_inner css=".vc_custom_1452267565894{padding-bottom: 20px !important;}"][vc_column_inner width="1/2" css=".vc_custom_1452267357325{margin-bottom: 50px !important;}"][vc_column_text css=".vc_custom_1452271193767{margin-bottom: 0px !important;}"]
<ul style="font-size: 16px; line-height: 2; padding-left: 18px;">
	<li><span style="color: #000000; font-weight: 600;">Support One Page Basic (Developed by Beeteam368) &amp; Fullscreen Scrolling (FullPage.js)</span></li>
	<li><span style="color: #000000; font-weight: 600;">One Click Import Full Sample Data (20+ demo).</span></li>
	<li><span style="color: #000000; font-weight: 600;">Main Navigation Menus &amp; Custom Menus (dropdown mode)</span>
<ul>
	<li><span style="color: #000000;">Support 700+ Google Fonts</span></li>
	<li><span style="color: #000000;">Unlimited Color (background color, separator, menu item hover, menu item active ...)</span></li>
	<li><span style="color: #000000;">Logo Image on Main Navigation (support Retina Logo)</span></li>
	<li><span style="color: #000000;">Support FontAwesome Icons &amp; Image Icons</span></li>
</ul>
</li>
	<li><span style="color: #000000; font-weight: 600;">Smart Sticky Navigation</span>
<ul>
	<li><span style="color: #000000;">Unlimited Color (background, separator, menu item hover, menu item active ...)</span></li>
	<li><span style="color: #000000;">Logo Image on Sticky Navigation (support Retina Logo)</span></li>
	<li><span style="color: #000000;">Support FontAwesome Icons &amp; Image Icons</span></li>
	<li><span style="color: #000000;">Behavior: Only Appears When Page Is Scrolled Down &amp; Past The First Page</span></li>
	<li><span style="color: #000000;">Behavior: Only Appears When Page Is Scrolled Up</span></li>
	<li><span style="color: #000000;">Behavior: Always Visible</span></li>
</ul>
</li>
	<li><span style="color: #000000; font-weight: 600;">Sub Navigation</span>
<ul>
	<li><span style="color: #000000;">6 styles x 3 Positions (Right, Left, Bottom)</span></li>
	<li><span style="color: #000000;">Unlimited Color (background color, item hover, item active ...)</span></li>
	<li><span style="color: #000000;">Support Tooltip (700+ Google Fonts)</span></li>
	<li><span style="color: #000000;">Support FontAwesome Icons &amp; Image Icons</span></li>
</ul>
</li>
</ul>
[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2" css=".vc_custom_1452267365184{margin-bottom: 50px !important;}"][vc_column_text css=".vc_custom_1452357990741{margin-bottom: 0px !important;}"]
<ul style="font-size: 16px; line-height: 2; padding-left: 18px;">
	<li><span style="color: #000000; font-weight: 600;">Fully HTML5 &amp; CSS3 Support</span></li>
	<li><span style="color: #000000; font-weight: 600;">100% Responsive Design</span></li>
	<li><span style="color: #000000; font-weight: 600;">Mobile Menu</span>
<ul>
	<li><span style="color: #000000;">Unlimited Color (background color, separator, item hover, item active ...)</span></li>
	<li><span style="color: #000000;">Compatible with all mobile devices (mobile, tablet)</span></li>
</ul>
</li>
	<li><span style="color: #000000; font-weight: 600;">Other</span>
<ul>
	<li><span style="color: #000000;">Support Full Screen Mode</span></li>
	<li><span style="color: #000000;">Support HTML5 Video Background (MP4, OGV, WEBM)</span></li>
	<li><span style="color: #000000;">Support Youtube Video Background</span></li>
	<li><span style="color: #000000;">Support Parallax Scroll (down) Image Background</span></li>
	<li><span style="color: #000000;">Support Particle Canvas Background (Full Options)</span></li>
	<li><span style="color: #000000;">Support Content Animation On Visibility (70+ Effect)</span></li>
	<li><span style="color: #000000;">Simple loading spinners animated with CSS (11 style - unlimited color &amp; background color)</span></li>
	<li><span style="color: #000000;">Scroll Next(Prev) Item Effect (jQuery Easing - Custom speed[in milisecond])</span></li>
	<li><span style="color: #000000;">Support Full Height Mode for Each Item</span></li>
	<li><span style="color: #000000;">Custom Content Width &amp; Bootstrap Container (mobile, tablet, desktop)</span></li>
	<li><span style="color: #000000;">Custom Content Padding (mobile, tablet, desktop)</span></li>
	<li>Scroll Down More Button</li>
	<li><span style="color: #000000;">And Much More ...</span></li>
</ul>
</li>
</ul>
[/vc_column_text][/vc_column_inner][/vc_row_inner][/op_item][op_item item_icon="font" content_width="2" height="1" content_position="1" item_name="How To Use" item_name_alias="How To Use" icon_font="fa fa-cogs" width_large="800px" width_small="100%" width_medium="970px" padding_tiny="54px 20px 60px 20px" background_color="#ffffff"][vc_column_text css=".vc_custom_1452358730932{padding-right: 20px !important;padding-left: 20px !important;}"]
<h2 style="text-align: center; font-size: 42px; margin: 0;"><span style="color: #000000; letter-spacing: 0.05em;">HOW TO USE</span></h2>
[/vc_column_text][vc_video link="'.$youtube_tutorial.'" css=".vc_custom_1452272153637{margin-bottom: 0px !important;}"][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_24 = __('Smart One Page - Hamburger Menu - Right', 'Smart-One-Page-Navigation');				
		$post_sample_24 = array(
			'post_content'   => $data_sample_24,
			'post_name' 	 => sanitize_title($page_name_24.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_24,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_24 = wp_insert_post($post_sample_24, false);		
		$post_url.='<a href="'.get_permalink($post_id_24).'" target="_blank">'.$page_name_24.'</a>';
		
		//25
		$data_sample_25 = '[vc_row css=".vc_custom_1452402430418{margin-bottom: 0px !important;}"][vc_column][op_container fullscreen_scroll="yes" mnav_style="hamburger-menu" mnav_sticky_behavior="2" snav_style="style-6" snav_behavior="1" scroll_effect="easeOutExpo" nav_font_weight="normal" snav_font_weight="normal" loading_style="folding-cube" scroll_speed="1200" nav_bg="rgba(0,0,0,0.8)" nav_text_color="rgba(255,255,255,0.75)" nav_text_hover_color="#ffffff" nav_text_active_color="#ffffff" snav_tooltip_bg="#1abc9c" snav_item_color="#777777" snav_item_hover_color="#ffffff" snav_item_bg_hover_color="#1abc9c" snav_item_active_color="#ffffff" snav_item_bg_active_color="#1abc9c" stnav_bg="#ffffff" stnav_shadow="rgba(0,0,0,0.25)" stnav_text_color="#111111" stnav_text_hover_color="#999999" stnav_text_active_color="#1abc9c" logo="'.$image_list_upload[2].'" logo_retina="'.$image_list_upload[3].'" st_logo="'.$image_list_upload[4].'" st_logo_retina="'.$image_list_upload[5].'" snav_bg="#111111" snav_tooltip_color="#ffffff" loading_color="#1abc9c" dd_nav_separator_color="#1abc9c" dd_nav_text_color="#111111" dd_nav_text_hover_color="#1abc9c" mobile_bg="#111111" mobile_text_color="#999999" mobile_text_hover_color="#ffffff" mobile_text_active_color="#1abc9c" mobile_separator_color="rgba(255,255,255,0.05)" mobile_hover_bg="#222222" mobile_active_bg="#222222"][op_item item_icon="font" height="1" content_position="1" downmore_button="yes" item_name="Home" item_name_alias="home-alias" icon_font="fa fa-home" background_color="#d8d8d8" background_img="'.$image_list_upload[18].'"][vc_column_text css=".vc_custom_1453342427305{margin-bottom: 0px !important;padding-top: 35px !important;padding-right: 20px !important;padding-bottom: 52px !important;padding-left: 20px !important;}"]
<h1 style="text-align: center; font-size: 42px;"><span style="color: #ffffff; letter-spacing: 0.05em;">HOME SELECTION</span></h1>
<p style="text-align: center; font-size: 20px;"><span style="color: #ffffff;">HAMBURGER MENU - With FullPage.js</span></p>
[/vc_column_text][/op_item][op_item item_icon="font" content_width="1" height="1" content_position="1" item_name="Selection A" item_name_alias="Selection A" icon_font="fa fa-cubes" background_color="rgba(221,51,51,0.3)" padding_tiny="60px 20px"][vc_column_text css=".vc_custom_1452608065540{margin-bottom: 0px !important;padding-top: 35px !important;padding-right: 20px !important;padding-bottom: 52px !important;padding-left: 20px !important;}"]
<h2 style="text-align: center; font-size: 42px;"><span style="color: #000000; letter-spacing: 0.05em;">SELECTION A</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" height="1" content_position="1" item_name="Selection B" item_name_alias="Selection B" icon_font="fa fa-heart" background_color="#d8d8d8" background_img="'.$image_list_upload[13].'"][vc_column_text css=".vc_custom_1453343212964{margin-bottom: 0px !important;padding-top: 35px !important;padding-right: 20px !important;padding-bottom: 52px !important;padding-left: 20px !important;background-color: rgba(255,255,255,0.5) !important;*background-color: rgb(255,255,255) !important;}"]
<h2 style="text-align: center; font-size: 42px;"><span style="color: #000000; letter-spacing: 0.05em;">SELECTION B</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" height="1" content_position="1" item_name="Selection C" item_name_alias="Selection C" icon_font="fa fa-play-circle" background_color="rgba(30,115,190,0.3)" padding_tiny="60px 20px"][vc_column_text css=".vc_custom_1452608234108{margin-bottom: 0px !important;padding-top: 35px !important;padding-right: 20px !important;padding-bottom: 52px !important;padding-left: 20px !important;}"]
<h2 style="text-align: center; font-size: 42px;"><span style="color: #000000; letter-spacing: 0.05em;">SELECTION C</span></h2>
[/vc_column_text][/op_item][op_item item_icon="font" height="1" content_position="1" item_name="Features" item_name_alias="Features" icon_font="fa fa-database" background_color="#d8d8d8" padding_tiny="0 20px" background_img="'.$image_list_upload[16].'" padding_large="0 60px"][vc_column_text css=".vc_custom_1452358721546{margin-bottom: 45px !important;padding-top: 74px !important;}"]
<h2 style="text-align: center; font-size: 42px; margin: 0;"><span style="color: #1abc9c; letter-spacing: 0.05em;">FEATURES</span></h2>
[/vc_column_text][vc_row_inner css=".vc_custom_1452267565894{padding-bottom: 20px !important;}"][vc_column_inner width="1/2" css=".vc_custom_1452267357325{margin-bottom: 50px !important;}"][vc_column_text css=".vc_custom_1452271193767{margin-bottom: 0px !important;}"]
<ul style="font-size: 16px; line-height: 2; padding-left: 18px;">
	<li><span style="color: #000000; font-weight: 600;">Support One Page Basic (Developed by Beeteam368) &amp; Fullscreen Scrolling (FullPage.js)</span></li>
	<li><span style="color: #000000; font-weight: 600;">One Click Import Full Sample Data (20+ demo).</span></li>
	<li><span style="color: #000000; font-weight: 600;">Main Navigation Menus &amp; Custom Menus (dropdown mode)</span>
<ul>
	<li><span style="color: #000000;">Support 700+ Google Fonts</span></li>
	<li><span style="color: #000000;">Unlimited Color (background color, separator, menu item hover, menu item active ...)</span></li>
	<li><span style="color: #000000;">Logo Image on Main Navigation (support Retina Logo)</span></li>
	<li><span style="color: #000000;">Support FontAwesome Icons &amp; Image Icons</span></li>
</ul>
</li>
	<li><span style="color: #000000; font-weight: 600;">Smart Sticky Navigation</span>
<ul>
	<li><span style="color: #000000;">Unlimited Color (background, separator, menu item hover, menu item active ...)</span></li>
	<li><span style="color: #000000;">Logo Image on Sticky Navigation (support Retina Logo)</span></li>
	<li><span style="color: #000000;">Support FontAwesome Icons &amp; Image Icons</span></li>
	<li><span style="color: #000000;">Behavior: Only Appears When Page Is Scrolled Down &amp; Past The First Page</span></li>
	<li><span style="color: #000000;">Behavior: Only Appears When Page Is Scrolled Up</span></li>
	<li><span style="color: #000000;">Behavior: Always Visible</span></li>
</ul>
</li>
	<li><span style="color: #000000; font-weight: 600;">Sub Navigation</span>
<ul>
	<li><span style="color: #000000;">6 styles x 3 Positions (Right, Left, Bottom)</span></li>
	<li><span style="color: #000000;">Unlimited Color (background color, item hover, item active ...)</span></li>
	<li><span style="color: #000000;">Support Tooltip (700+ Google Fonts)</span></li>
	<li><span style="color: #000000;">Support FontAwesome Icons &amp; Image Icons</span></li>
</ul>
</li>
</ul>
[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2" css=".vc_custom_1452267365184{margin-bottom: 50px !important;}"][vc_column_text css=".vc_custom_1452357990741{margin-bottom: 0px !important;}"]
<ul style="font-size: 16px; line-height: 2; padding-left: 18px;">
	<li><span style="color: #000000; font-weight: 600;">Fully HTML5 &amp; CSS3 Support</span></li>
	<li><span style="color: #000000; font-weight: 600;">100% Responsive Design</span></li>
	<li><span style="color: #000000; font-weight: 600;">Mobile Menu</span>
<ul>
	<li><span style="color: #000000;">Unlimited Color (background color, separator, item hover, item active ...)</span></li>
	<li><span style="color: #000000;">Compatible with all mobile devices (mobile, tablet)</span></li>
</ul>
</li>
	<li><span style="color: #000000; font-weight: 600;">Other</span>
<ul>
	<li><span style="color: #000000;">Support Full Screen Mode</span></li>
	<li><span style="color: #000000;">Support HTML5 Video Background (MP4, OGV, WEBM)</span></li>
	<li><span style="color: #000000;">Support Youtube Video Background</span></li>
	<li><span style="color: #000000;">Support Parallax Scroll (down) Image Background</span></li>
	<li><span style="color: #000000;">Support Particle Canvas Background (Full Options)</span></li>
	<li><span style="color: #000000;">Support Content Animation On Visibility (70+ Effect)</span></li>
	<li><span style="color: #000000;">Simple loading spinners animated with CSS (11 style - unlimited color &amp; background color)</span></li>
	<li><span style="color: #000000;">Scroll Next(Prev) Item Effect (jQuery Easing - Custom speed[in milisecond])</span></li>
	<li><span style="color: #000000;">Support Full Height Mode for Each Item</span></li>
	<li><span style="color: #000000;">Custom Content Width &amp; Bootstrap Container (mobile, tablet, desktop)</span></li>
	<li><span style="color: #000000;">Custom Content Padding (mobile, tablet, desktop)</span></li>
	<li>Scroll Down More Button</li>
	<li><span style="color: #000000;">And Much More ...</span></li>
</ul>
</li>
</ul>
[/vc_column_text][/vc_column_inner][/vc_row_inner][/op_item][op_item item_icon="font" content_width="2" height="1" content_position="1" item_name="How To Use" item_name_alias="How To Use" icon_font="fa fa-cogs" width_large="800px" width_small="100%" width_medium="970px" padding_tiny="54px 20px 60px 20px" background_color="#ffffff"][vc_column_text css=".vc_custom_1452358730932{padding-right: 20px !important;padding-left: 20px !important;}"]
<h2 style="text-align: center; font-size: 42px; margin: 0;"><span style="color: #000000; letter-spacing: 0.05em;">HOW TO USE</span></h2>
[/vc_column_text][vc_video link="'.$youtube_tutorial.'" css=".vc_custom_1452272153637{margin-bottom: 0px !important;}"][/op_item][/op_container][/vc_column][/vc_row]';		
		$page_name_25 = __('Smart One Page - Hamburger Menu - With FullPage.js', 'Smart-One-Page-Navigation');				
		$post_sample_25 = array(
			'post_content'   => $data_sample_25,
			'post_name' 	 => sanitize_title($page_name_25.' - '.rand(0,9999).time()),
			'post_title'     => $page_name_25,
			'post_status'    => 'publish',
			'post_type'      => 'page',
			'page_template'	 => 'bt-one-page-page-builder.php',
		);
		$post_id_25 = wp_insert_post($post_sample_25, false);		
		$post_url.='<a href="'.get_permalink($post_id_25).'" target="_blank">'.$page_name_25.'</a>';
		
		echo $post_url;
		die;
	}
	
	function op_bete_setSampleData(){
		if(is_admin() && isset($_POST['addsample']) && $_POST['addsample']=='yes'){
			add_action('wp_ajax_op_bete_setupsampledata', 'op_bete_sample_data');
			add_action('wp_ajax_nopriv_op_bete_setupsampledata', 'op_bete_sample_data');	
		}
	}
		
	add_action('admin_init', 'op_bete_setSampleData');
}