<?php
if(!class_exists('op_container_shortcode')){
	class op_shortcode_builder {
				
		private function startsWith($haystack, $needle){
			return !strncmp($haystack, $needle, strlen($needle));
		}

		private function get_google_font_name($family_name){
			$name = $family_name;
			if($this->startsWith($family_name, 'http')){
				$idx = strpos($name,'=');
				if($idx > -1){
					$name = substr($name, $idx);
				}
			}
			$idx = strpos($name,':');
			if($idx > -1){
				$name = substr($name, 0, $idx);
				$name = str_replace('+',' ', $name);
			}
			return $name;
		}
		
		//Container
		function op_container_shortcode($params, $contents){
			extract(
				shortcode_atts(
					array(						
						'mnav_style'						=>'', //done default
						'hamburger_logo_pos'				=>'', //done
						'hamburger_icon_pos'				=>'', //done
						'hamburger_menu_style'				=>'',
						'content_width'						=>'', //done
						'width_small'						=>'', //done
						'width_medium'						=>'', //done
						'width_large'						=>'', //done
						'nav_height'						=>'', //done
						'logo'								=>'', //done
						'logo_retina'						=>'', //done
						'mnav_sticky'						=>'', //done
						'mnav_sticky_height'				=>'', //done
						'mnav_sticky_behavior'				=>'', //done
						'st_logo'							=>'', //done
						'st_logo_retina'					=>'', //done
						'logo_link'							=>'', //done						
						'fullscreen'						=>'', //done
						'snav_style'						=>'', //done
						'snav_behavior'						=>'', //done
						'snav_position'						=>'', //done
						'ext_class'							=>'', //done
						'scroll_effect'						=>'', //done
						'scroll_speed'						=>'', //done
						'nav_bg'							=>'', //done
						'nav_shadow'						=>'', //done
						'nav_separator_color'				=>'', //done
						'nav_hover_bg'						=>'', //done
						'nav_active_bg'						=>'', //done
						'nav_text_color'					=>'', //done
						'nav_text_hover_color'				=>'', //done
						'nav_text_active_color'				=>'', //done
						
						'dd_nav_bg'							=>'', //done
						'dd_nav_separator_color'			=>'', //done
						'dd_nav_hover_bg'					=>'', //done
						'dd_nav_text_color'					=>'', //done
						'dd_nav_text_hover_color'			=>'', //done
						
						'stnav_bg'							=>'', //done
						'stnav_shadow'						=>'', //done
						'stnav_separator_color'				=>'', //done
						'stnav_hover_bg'					=>'', //done
						'stnav_active_bg'					=>'', //done
						'stnav_text_color'					=>'', //done
						'stnav_text_hover_color'			=>'', //done
						'stnav_text_active_color'			=>'', //done
						
						'dd_stnav_bg'						=>'', //done
						'dd_stnav_separator_color'			=>'', //done
						'dd_stnav_hover_bg'					=>'', //done
						'dd_stnav_text_color'				=>'', //done
						'dd_stnav_text_hover_color'			=>'', //done
						
						'mobile_bg'							=>'', //done
						'mobile_separator_color'			=>'', //done
						'mobile_hover_bg'					=>'', //done
						'mobile_active_bg'					=>'', //done
						'mobile_text_color'					=>'', //done
						'mobile_text_hover_color'			=>'', //done
						'mobile_text_active_color'			=>'', //done
						
						'snav_bg'							=>'', //done
						'snav_tooltip_bg'					=>'', //done
						'snav_tooltip_color'				=>'', //done
						'snav_item_color'					=>'', //done
						'snav_item_hover_color'				=>'', //done	
						'snav_item_bg_hover_color'			=>'', //done
						'snav_item_active_color'			=>'', //done
						'snav_item_bg_active_color'			=>'', //done	
						'nav_font'							=>'', //done	
						'nav_font_size'						=>'', //done	
						'nav_font_weight'					=>'', //done
						'nav_letter_spacing'				=>'', //done	
						'snav_font'							=>'', //done	
						'snav_font_size'					=>'', //done	
						'snav_font_weight'					=>'', //done
						'snav_letter_spacing'				=>'', //done
						'fullscreen_scroll'					=>'', //done	
						'fp_looptop'						=>'', //done
						'fp_loopbottom'						=>'', //done	
						'fp_scrollbar'						=>'', //done
						'loading_style'						=>'', //done
						'loading_bg_color'					=>'', //done
						'loading_color'						=>'', //done
						'facebook_link'						=>'', //done
						'instagram_link'					=>'', //done			
					), 
					$params
				)
			);
			
			$rand_ID					= rand(1, 9999);
			$id                     	= OP_BETE_PREFIX.$rand_ID;			
			
			$mnav_style					= (isset($params['mnav_style'])&&trim($params['mnav_style'])!='')?trim($params['mnav_style']):'hidden';
			$hamburger_logo_pos			= (isset($params['hamburger_logo_pos'])&&trim($params['hamburger_logo_pos'])!=''&&is_numeric(trim($params['hamburger_logo_pos'])))?trim($params['hamburger_logo_pos']):'0';
			$hamburger_icon_pos			= (isset($params['hamburger_icon_pos'])&&trim($params['hamburger_icon_pos'])!=''&&is_numeric(trim($params['hamburger_icon_pos'])))?trim($params['hamburger_icon_pos']):'0';
			$hamburger_menu_style		= (isset($params['hamburger_menu_style'])&&trim($params['hamburger_menu_style'])!=''&&is_numeric(trim($params['hamburger_menu_style'])))?trim($params['hamburger_menu_style']):'0';
			$content_width				= (isset($params['content_width'])&&trim($params['content_width'])!=''&&is_numeric(trim($params['content_width'])))?trim($params['content_width']):'0';
			$width_small				= (isset($params['width_small'])&&trim($params['width_small'])!='')?trim($params['width_small']):'750px';
			$width_medium				= (isset($params['width_medium'])&&trim($params['width_medium'])!='')?trim($params['width_medium']):'970px';
			$width_large				= (isset($params['width_large'])&&trim($params['width_large'])!='')?trim($params['width_large']):'1170px';
			$nav_height					= (isset($params['nav_height'])&&trim($params['nav_height'])!='')?trim($params['nav_height']):'';
			$logo						= (isset($params['logo'])&&trim($params['logo'])!=''&&is_numeric(trim($params['logo'])))?trim($params['logo']):'';
			$logo_retina				= (isset($params['logo_retina'])&&trim($params['logo_retina'])!=''&&is_numeric(trim($params['logo_retina'])))?trim($params['logo_retina']):'';
			$mnav_sticky				= (isset($params['mnav_sticky'])&&trim($params['mnav_sticky'])!='')?trim($params['mnav_sticky']):'yes';
			$mnav_sticky_height			= (isset($params['mnav_sticky_height'])&&trim($params['mnav_sticky_height'])!='')?trim($params['mnav_sticky_height']):'';
			$mnav_sticky_behavior		= (isset($params['mnav_sticky_behavior'])&&trim($params['mnav_sticky_behavior'])!=''&&is_numeric(trim($params['mnav_sticky_behavior'])))?trim($params['mnav_sticky_behavior']):'0';	
			$st_logo					= (isset($params['st_logo'])&&trim($params['st_logo'])!=''&&is_numeric(trim($params['st_logo'])))?trim($params['st_logo']):'';
			$st_logo_retina				= (isset($params['st_logo_retina'])&&trim($params['st_logo_retina'])!=''&&is_numeric(trim($params['st_logo_retina'])))?trim($params['st_logo_retina']):'';
			$logo_link					= (isset($params['logo_link'])&&trim($params['logo_link'])!='')?trim($params['logo_link']):'';		
			$fullscreen					= (isset($params['fullscreen'])&&trim($params['fullscreen'])!='')?trim($params['fullscreen']):'on';
			$snav_style					= (isset($params['snav_style'])&&trim($params['snav_style'])!='')?trim($params['snav_style']):'hidden';
			$snav_behavior				= (isset($params['snav_behavior'])&&trim($params['snav_behavior'])!=''&&is_numeric(trim($params['snav_behavior'])))?trim($params['snav_behavior']):'0';
			$snav_position				= (isset($params['snav_position'])&&trim($params['snav_position'])!='')?trim($params['snav_position']):'style-right';
			$ext_class					= (isset($params['ext_class'])&&trim($params['ext_class'])!='')?trim($params['ext_class']):'';			
			$scroll_effect				= (isset($params['scroll_effect'])&&trim($params['scroll_effect'])!='')?trim($params['scroll_effect']):'linear';
			$scroll_speed				= (isset($params['scroll_speed'])&&trim($params['scroll_speed'])!=''&&is_numeric(trim($params['scroll_speed'])))?trim($params['scroll_speed']):'';			
			$nav_bg						= (isset($params['nav_bg'])&&trim($params['nav_bg'])!='')?trim($params['nav_bg']):'';
			$nav_shadow					= (isset($params['nav_shadow'])&&trim($params['nav_shadow'])!='')?trim($params['nav_shadow']):'';
			$nav_separator_color		= (isset($params['nav_separator_color'])&&trim($params['nav_separator_color'])!='')?trim($params['nav_separator_color']):'';
			$nav_hover_bg				= (isset($params['nav_hover_bg'])&&trim($params['nav_hover_bg'])!='')?trim($params['nav_hover_bg']):'';
			$nav_active_bg				= (isset($params['nav_active_bg'])&&trim($params['nav_active_bg'])!='')?trim($params['nav_active_bg']):'';
			$nav_text_color				= (isset($params['nav_text_color'])&&trim($params['nav_text_color'])!='')?trim($params['nav_text_color']):'';
			$nav_text_hover_color		= (isset($params['nav_text_hover_color'])&&trim($params['nav_text_hover_color'])!='')?trim($params['nav_text_hover_color']):'';
			$nav_text_active_color		= (isset($params['nav_text_active_color'])&&trim($params['nav_text_active_color'])!='')?trim($params['nav_text_active_color']):'';
			
			$dd_nav_bg					= (isset($params['dd_nav_bg'])&&trim($params['dd_nav_bg'])!='')?trim($params['dd_nav_bg']):'';
			$dd_nav_separator_color		= (isset($params['dd_nav_separator_color'])&&trim($params['dd_nav_separator_color'])!='')?trim($params['dd_nav_separator_color']):'';
			$dd_nav_hover_bg			= (isset($params['dd_nav_hover_bg'])&&trim($params['dd_nav_hover_bg'])!='')?trim($params['dd_nav_hover_bg']):'';
			$dd_nav_text_color			= (isset($params['dd_nav_text_color'])&&trim($params['dd_nav_text_color'])!='')?trim($params['dd_nav_text_color']):'';
			$dd_nav_text_hover_color	= (isset($params['dd_nav_text_hover_color'])&&trim($params['dd_nav_text_hover_color'])!='')?trim($params['dd_nav_text_hover_color']):'';
			
			$stnav_bg					= (isset($params['stnav_bg'])&&trim($params['stnav_bg'])!='')?trim($params['stnav_bg']):'';
			$stnav_shadow				= (isset($params['stnav_shadow'])&&trim($params['stnav_shadow'])!='')?trim($params['stnav_shadow']):'';
			$stnav_separator_color		= (isset($params['stnav_separator_color'])&&trim($params['stnav_separator_color'])!='')?trim($params['stnav_separator_color']):'';
			$stnav_hover_bg				= (isset($params['stnav_hover_bg'])&&trim($params['stnav_hover_bg'])!='')?trim($params['stnav_hover_bg']):'';
			$stnav_active_bg			= (isset($params['stnav_active_bg'])&&trim($params['stnav_active_bg'])!='')?trim($params['stnav_active_bg']):'';
			$stnav_text_color			= (isset($params['stnav_text_color'])&&trim($params['stnav_text_color'])!='')?trim($params['stnav_text_color']):'';
			$stnav_text_hover_color		= (isset($params['stnav_text_hover_color'])&&trim($params['stnav_text_hover_color'])!='')?trim($params['stnav_text_hover_color']):'';
			$stnav_text_active_color	= (isset($params['stnav_text_active_color'])&&trim($params['stnav_text_active_color'])!='')?trim($params['stnav_text_active_color']):'';
			
			$dd_stnav_bg				= (isset($params['dd_stnav_bg'])&&trim($params['dd_stnav_bg'])!='')?trim($params['dd_stnav_bg']):'';
			$dd_stnav_separator_color	= (isset($params['dd_stnav_separator_color'])&&trim($params['dd_stnav_separator_color'])!='')?trim($params['dd_stnav_separator_color']):'';
			$dd_stnav_hover_bg			= (isset($params['dd_stnav_hover_bg'])&&trim($params['dd_stnav_hover_bg'])!='')?trim($params['dd_stnav_hover_bg']):'';
			$dd_stnav_text_color		= (isset($params['dd_stnav_text_color'])&&trim($params['dd_stnav_text_color'])!='')?trim($params['dd_stnav_text_color']):'';
			$dd_stnav_text_hover_color	= (isset($params['dd_stnav_text_hover_color'])&&trim($params['dd_stnav_text_hover_color'])!='')?trim($params['dd_stnav_text_hover_color']):'';
			
			$mobile_bg					= (isset($params['mobile_bg'])&&trim($params['mobile_bg'])!='')?trim($params['mobile_bg']):'';
			$mobile_separator_color		= (isset($params['mobile_separator_color'])&&trim($params['mobile_separator_color'])!='')?trim($params['mobile_separator_color']):'';
			$mobile_hover_bg			= (isset($params['mobile_hover_bg'])&&trim($params['mobile_hover_bg'])!='')?trim($params['mobile_hover_bg']):'';
			$mobile_active_bg			= (isset($params['mobile_active_bg'])&&trim($params['mobile_active_bg'])!='')?trim($params['mobile_active_bg']):'';
			$mobile_text_color			= (isset($params['mobile_text_color'])&&trim($params['mobile_text_color'])!='')?trim($params['mobile_text_color']):'';
			$mobile_text_hover_color	= (isset($params['mobile_text_hover_color'])&&trim($params['mobile_text_hover_color'])!='')?trim($params['mobile_text_hover_color']):'';
			$mobile_text_active_color	= (isset($params['mobile_text_active_color'])&&trim($params['mobile_text_active_color'])!='')?trim($params['mobile_text_active_color']):'';
			
			$snav_bg					= (isset($params['snav_bg'])&&trim($params['snav_bg'])!='')?trim($params['snav_bg']):'';
			$snav_tooltip_bg			= (isset($params['snav_tooltip_bg'])&&trim($params['snav_tooltip_bg'])!='')?trim($params['snav_tooltip_bg']):'';
			$snav_tooltip_color			= (isset($params['snav_tooltip_color'])&&trim($params['snav_tooltip_color'])!='')?trim($params['snav_tooltip_color']):'';
			$snav_item_color			= (isset($params['snav_item_color'])&&trim($params['snav_item_color'])!='')?trim($params['snav_item_color']):'';
			$snav_item_hover_color		= (isset($params['snav_item_hover_color'])&&trim($params['snav_item_hover_color'])!='')?trim($params['snav_item_hover_color']):'';
			$snav_item_bg_hover_color	= (isset($params['snav_item_bg_hover_color'])&&trim($params['snav_item_bg_hover_color'])!='')?trim($params['snav_item_bg_hover_color']):'';
			$snav_item_active_color		= (isset($params['snav_item_active_color'])&&trim($params['snav_item_active_color'])!='')?trim($params['snav_item_active_color']):'';
			$snav_item_bg_active_color	= (isset($params['snav_item_bg_active_color'])&&trim($params['snav_item_bg_active_color'])!='')?trim($params['snav_item_bg_active_color']):'';
			$nav_font					= (isset($params['nav_font'])&&trim($params['nav_font'])!='')?trim($params['nav_font']):'';
			$nav_font_size				= (isset($params['nav_font_size'])&&trim($params['nav_font_size'])!='')?trim($params['nav_font_size']):'';
			$nav_font_weight			= (isset($params['nav_font_weight'])&&trim($params['nav_font_weight'])!='')?trim($params['nav_font_weight']):'normal';
			$nav_letter_spacing			= (isset($params['nav_letter_spacing'])&&trim($params['nav_letter_spacing'])!='')?trim($params['nav_letter_spacing']):'';
			$snav_font					= (isset($params['snav_font'])&&trim($params['snav_font'])!='')?trim($params['snav_font']):'';
			$snav_font_size				= (isset($params['snav_font_size'])&&trim($params['snav_font_size'])!='')?trim($params['snav_font_size']):'';
			$snav_font_weight			= (isset($params['snav_font_weight'])&&trim($params['snav_font_weight'])!='')?trim($params['snav_font_weight']):'normal';
			$snav_letter_spacing		= (isset($params['snav_letter_spacing'])&&trim($params['snav_letter_spacing'])!='')?trim($params['snav_letter_spacing']):'';
			$fullscreen_scroll			= (isset($params['fullscreen_scroll'])&&trim($params['fullscreen_scroll'])!='')?trim($params['fullscreen_scroll']):'no';
			$fp_looptop					= (isset($params['fp_looptop'])&&trim($params['fp_looptop'])!='')?trim($params['fp_looptop']):'no';
			$fp_loopbottom				= (isset($params['fp_loopbottom'])&&trim($params['fp_loopbottom'])!='')?trim($params['fp_loopbottom']):'no';
			$fp_scrollbar				= (isset($params['fp_scrollbar'])&&trim($params['fp_scrollbar'])!='')?trim($params['fp_scrollbar']):'no';
			$fp_css3					= (isset($params['fp_css3'])&&trim($params['fp_css3'])!='')?trim($params['fp_css3']):'yes';
			
			$loading_style				= (isset($params['loading_style'])&&trim($params['loading_style'])!='')?trim($params['loading_style']):'hidden';
			$loading_bg_color			= (isset($params['loading_bg_color'])&&trim($params['loading_bg_color'])!='')?trim($params['loading_bg_color']):'';
			$loading_color				= (isset($params['loading_color'])&&trim($params['loading_color'])!='')?trim($params['loading_color']):'';
			
			$facebook_link				= (isset($params['facebook_link'])&&trim($params['facebook_link'])!='')?trim($params['facebook_link']):'';
			$instagram_link				= (isset($params['instagram_link'])&&trim($params['instagram_link'])!='')?trim($params['instagram_link']):'';
			
			global $bt_item_buildMenu;
			ob_start();	
			?>
            	
                <div id="header-outer" class="fix-salient" style="display:none !important;" data-header-resize="1"></div>
                
            	<?php if($loading_style!='hidden' && $loading_style!=''){?>
                	<style scoped>
						<?php 
						if($loading_bg_color!=''){
						?>
							.bt-op-loading.<?php echo 'loading-'.$id;?> { background-color:<?php echo $loading_bg_color;?>;}
						<?php 
						}
						if($loading_color!=''){
						?>
							.bt-op-loading.<?php echo 'loading-'.$id;?> .sk-rotating-plane,
							.bt-op-loading.<?php echo 'loading-'.$id;?> .sk-double-bounce .sk-child,
							.bt-op-loading.<?php echo 'loading-'.$id;?> .sk-wave .sk-rect,
							.bt-op-loading.<?php echo 'loading-'.$id;?> .sk-wandering-cubes .sk-cube,
							.bt-op-loading.<?php echo 'loading-'.$id;?> .sk-spinner-pulse,
							.bt-op-loading.<?php echo 'loading-'.$id;?> .sk-chasing-dots .sk-child,
							.bt-op-loading.<?php echo 'loading-'.$id;?> .sk-three-bounce .sk-child,
							.bt-op-loading.<?php echo 'loading-'.$id;?> .sk-circle .sk-child:before,
							.bt-op-loading.<?php echo 'loading-'.$id;?> .sk-cube-grid .sk-cube,
							.bt-op-loading.<?php echo 'loading-'.$id;?> .sk-fading-circle .sk-circle:before,
							.bt-op-loading.<?php echo 'loading-'.$id;?> .sk-folding-cube .sk-cube:before 
							{background-color:<?php echo $loading_color;?>;}
						<?php	
						}
						?>
					</style>
                    
                    <div class="bt-op-loading <?php echo 'loading-'.$id;?>">
                        
                        <div class="bt-op-loading-absolute">
                            <?php 
							switch($loading_style){
								case 'rotating-plane':
									?>
                                    <div class="sk-rotating-plane"></div>
                                    <?php
									break;
								case 'double-bounce':
									?>
                                    <div class="sk-double-bounce">
                                        <div class="sk-child sk-double-bounce1"></div>
                                        <div class="sk-child sk-double-bounce2"></div>
                                    </div>
                                    <?php
									break;
								case 'wave':
									?>
                                    <div class="sk-wave">
                                        <div class="sk-rect sk-rect1"></div>
                                        <div class="sk-rect sk-rect2"></div>
                                        <div class="sk-rect sk-rect3"></div>
                                        <div class="sk-rect sk-rect4"></div>
                                        <div class="sk-rect sk-rect5"></div>
                                    </div>
                                    <?php
									break;
								case 'wandering-cubes':
									?>
                                    <div class="sk-wandering-cubes">
                                        <div class="sk-cube sk-cube1"></div>
                                        <div class="sk-cube sk-cube2"></div>
                                    </div>
                                    <?php
									break;
								case 'spinner-pulse':
									?>
                                    <div class="sk-spinner sk-spinner-pulse"></div>
                                    <?php
									break;
								case 'chasing-dots':
									?>
                                    <div class="sk-chasing-dots">
                                        <div class="sk-child sk-dot1"></div>
                                        <div class="sk-child sk-dot2"></div>
                                    </div>
                                    <?php
									break;
								case 'three-bounce':
									?>
                                    <div class="sk-three-bounce">
                                        <div class="sk-child sk-bounce1"></div>
                                        <div class="sk-child sk-bounce2"></div>
                                        <div class="sk-child sk-bounce3"></div>
                                    </div>
                                    <?php
									break;
								case 'circle':
									?>
                                    <div class="sk-circle">
                                        <div class="sk-circle1 sk-child"></div>
                                        <div class="sk-circle2 sk-child"></div>
                                        <div class="sk-circle3 sk-child"></div>
                                        <div class="sk-circle4 sk-child"></div>
                                        <div class="sk-circle5 sk-child"></div>
                                        <div class="sk-circle6 sk-child"></div>
                                        <div class="sk-circle7 sk-child"></div>
                                        <div class="sk-circle8 sk-child"></div>
                                        <div class="sk-circle9 sk-child"></div>
                                        <div class="sk-circle10 sk-child"></div>
                                        <div class="sk-circle11 sk-child"></div>
                                        <div class="sk-circle12 sk-child"></div>
                                    </div>
                                    <?php
									break;
								case 'cube-grid':
									?>
                                    <div class="sk-cube-grid">
                                        <div class="sk-cube sk-cube1"></div>
                                        <div class="sk-cube sk-cube2"></div>
                                        <div class="sk-cube sk-cube3"></div>
                                        <div class="sk-cube sk-cube4"></div>
                                        <div class="sk-cube sk-cube5"></div>
                                        <div class="sk-cube sk-cube6"></div>
                                        <div class="sk-cube sk-cube7"></div>
                                        <div class="sk-cube sk-cube8"></div>
                                        <div class="sk-cube sk-cube9"></div>
                                    </div>
                                    <?php
									break;
								case 'fading-circle':
									?>
                                    <div class="sk-fading-circle">
                                        <div class="sk-circle1 sk-circle"></div>
                                        <div class="sk-circle2 sk-circle"></div>
                                        <div class="sk-circle3 sk-circle"></div>
                                        <div class="sk-circle4 sk-circle"></div>
                                        <div class="sk-circle5 sk-circle"></div>
                                        <div class="sk-circle6 sk-circle"></div>
                                        <div class="sk-circle7 sk-circle"></div>
                                        <div class="sk-circle8 sk-circle"></div>
                                        <div class="sk-circle9 sk-circle"></div>
                                        <div class="sk-circle10 sk-circle"></div>
                                        <div class="sk-circle11 sk-circle"></div>
                                        <div class="sk-circle12 sk-circle"></div>
                                    </div>
                                    <?php
									break;
								case 'folding-cube':
									?>
                                    <div class="sk-folding-cube">
                                        <div class="sk-cube1 sk-cube"></div>
                                        <div class="sk-cube2 sk-cube"></div>
                                        <div class="sk-cube4 sk-cube"></div>
                                        <div class="sk-cube3 sk-cube"></div>
                                    </div>
                                    <?php
									break;										
							}
							?>
                        </div>
                        
                    </div>
                <?php }?>
                
            	<div
                	class="smart-one-page btnav-container<?php echo ' '.$ext_class;?>"
                    id="<?php echo $id;?>"                    
                    data-mnav-style="<?php echo $mnav_style;?>"
                    data-content-width="<?php echo $content_width;?>"
                    data-mnav-sticky="<?php echo $mnav_sticky;?>"
                    data-mnav-sticky-behavior="<?php echo $mnav_sticky_behavior;?>"
                    data-snav-style	="<?php echo $snav_style;?>"
                    data-snav-behavior="<?php echo $snav_behavior;?>"
                    data-snav-position="<?php echo $snav_position;?>"
                    data-scroll-effect="<?php echo $scroll_effect;?>" 
                    data-scroll-speed="<?php echo $scroll_speed;?>" 
                    data-fullscreen-scroll="<?php echo $fullscreen_scroll;?>"
                    data-fp-looptop="<?php echo $fp_looptop;?>"
                    data-fp-loopbottom="<?php echo $fp_loopbottom;?>"    
                    data-fp-scrollbar="<?php echo $fp_scrollbar;?>"
                    data-fp-css3="<?php echo $fp_css3;?>"
                    
                    data-hamburger-logo-pos="<?php echo $hamburger_logo_pos;?>"
                    data-hamburger-icon-pos="<?php echo $hamburger_icon_pos;?>" 
                    data-hamburger-menu-style="<?php echo $hamburger_menu_style;?>"            
                >        	
                	<?php 
					if($mnav_style!='hidden'){
						$LogoRetinaURL='';
						if($logo_retina!=''){
							$pictureRetinaID = wp_get_attachment_image_src($logo_retina, "full");
							if(!is_wp_error($pictureRetinaID) && !empty($pictureRetinaID)) {
								$LogoRetinaURL = $pictureRetinaID[0];
							}
						}
						
						$st_LogoRetinaURL='';
						if($st_logo_retina!=''){
							$st_pictureRetinaID = wp_get_attachment_image_src($st_logo_retina, "full");
							if(!is_wp_error($st_pictureRetinaID) && !empty($st_pictureRetinaID)) {
								$st_LogoRetinaURL = $st_pictureRetinaID[0];
							}
						}
					?>
                    	<style scoped>
							<?php if($LogoRetinaURL!=''){?>
								@media only screen and (-webkit-min-device-pixel-ratio: 2),(min-resolution: 192dpi) {
									/* Retina Logo */
									#<?php echo $id;?>.btnav-container .bt-op-header .bt-op-logo > li > .bt-main-logo {background:url(<?php echo $LogoRetinaURL; ?>) no-repeat left center; background-size:contain;}
									#<?php echo $id;?>.btnav-container .bt-op-header .bt-op-logo > li > .bt-main-logo img {opacity:0; visibility:hidden;}
								}
							<?php }
							if($st_LogoRetinaURL!=''){
							?>
								@media only screen and (-webkit-min-device-pixel-ratio: 2),(min-resolution: 192dpi) {
									/* Sticky Retina Logo */
									#<?php echo $id;?>.btnav-container .bt-op-header .bt-op-logo > li > .bt-sticky-logo {background:url(<?php echo $st_LogoRetinaURL; ?>) no-repeat left center; background-size:contain;}
									#<?php echo $id;?>.btnav-container .bt-op-header .bt-op-logo > li > .bt-sticky-logo img {opacity:0; visibility:hidden;}
								}
							<?php
							}
							
							//Main Menu
							if($nav_bg!=''){
							?>
								#<?php echo $id;?>.btnav-container .bt-menu-control-sticky
								{background-color:<?php echo $nav_bg;?>;}
								
								@media(max-width:1024px) {
									#<?php echo $id;?>.btnav-container .bt-op-main-nav-wrap  {background-color:<?php echo $nav_bg;?>;}
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li {background-color:transparent;}
								}
							<?php		
							}
							if($nav_shadow!=''){
							?>
								#<?php echo $id;?>.btnav-container .bt-menu-control-sticky
								{box-shadow:0 0 3px 0 <?php echo $nav_shadow;?>; -webkit-box-shadow:0 0 3px 0 <?php echo $nav_shadow;?>;}								
							<?php		
							}
							if($nav_separator_color!=''){
							?>
								@media(max-width:1024px) {
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > a:after,
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > .op-menu-location > a:after,
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li a:after,
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li.menu-item-has-children>.op-menu-location.bt-menu-location-left > a:after
									{background-color:<?php echo $nav_separator_color;?>;}
									
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:first-child > a, 
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:first-child > .op-menu-location > a,
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li).menu-item-has-children .open-submenu-mobile
									{border-color:<?php echo $nav_separator_color;?>;}
								}
							<?php		
							}
							if($nav_hover_bg!=''){
							?>
								#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:hover > a						
								{background-color:<?php echo $nav_hover_bg;?>;}
								
								@media(min-width:1025px){
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li):hover > .op-menu-location > a 
									{background-color:<?php echo $nav_hover_bg;?>;}	
								}
								@media(max-width:1024px){
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > .op-menu-location > a:hover,
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li > .op-menu-location > a:hover 
									{background-color:<?php echo $nav_hover_bg;?>;}
								}	
							<?php		
							}
							if($nav_active_bg!=''){
							?>
								#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > a.bt-active
								{background-color:<?php echo $nav_active_bg;?>;}
							<?php		
							}
							if($nav_text_color!=''){
							?>
								#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > a, 
								#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > .op-menu-location > a								
								{color:<?php echo $nav_text_color;?>;}
								
								#<?php echo $id;?>.btnav-container .bt-op-main-nav-mobile > a > span,
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu-open > a > span
								{background-color:<?php echo $nav_text_color;?>;}
								
								@media(max-width:1024px){
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li a,
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li).menu-item-has-children .open-submenu-mobile {color:<?php echo $nav_text_color;?>;}
								}
							<?php		
							}
							if($nav_text_hover_color!=''){
							?>								
								#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:hover > a
								{color:<?php echo $nav_text_hover_color;?>;}	
								
								@media(min-width:1025px){
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li):hover > .op-menu-location > a 
									{color:<?php echo $nav_text_hover_color;?>;}	
								}
								@media(max-width:1024px){
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > .op-menu-location > a:hover,
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li > .op-menu-location > a:hover 
									{color:<?php echo $nav_text_hover_color;?>;}
								}							
							<?php		
							}
							if($nav_text_active_color!=''){
							?>
								#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > a.bt-active
								{color:<?php echo $nav_text_active_color;?>;}
							<?php		
							}
							//Main Menu
								//Dropdown main menu
									if($dd_nav_bg){
									?>
										@media(min-width:1025px){
											#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li 
											{background-color:<?php echo $dd_nav_bg;?>;}
										}
									<?php
									}
									if($dd_nav_separator_color){
									?>
										@media(min-width:1025px){
											#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul:before,
											#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li > ul:before 
											{background-color:<?php echo $dd_nav_separator_color;?>;}
										}
									<?php
									}
									if($dd_nav_hover_bg){
									?>		
										@media(min-width:1025px){								
											#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li:hover > .op-menu-location > a 
											{background-color:<?php echo $dd_nav_hover_bg;?>;}
										}
									<?php
									}
									if($dd_nav_text_color){
									?>
										@media(min-width:1025px){
											#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li > .op-menu-location > a 
											{color:<?php echo $dd_nav_text_color;?>;}
										}
									<?php
									}
									if($dd_nav_text_hover_color){
									?>
										@media(min-width:1025px){
											#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li:hover > .op-menu-location > a 
											{color:<?php echo $dd_nav_text_hover_color;?>;}
										}
									<?php
									}
								//Dropdown main menu
							
							//Sticky menu
							if($stnav_bg!=''){
							?>
								#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky .bt-menu-control-sticky
								{background-color:<?php echo $stnav_bg;?>;}
								
								@media(max-width:1024px) {
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky .bt-op-main-nav-wrap { background-color:<?php echo $stnav_bg;?>;}
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li { background-color:transparent;} 								
								}
							<?php	
							}
							if($stnav_shadow!=''){
							?>
								#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky .bt-menu-control-sticky
								{box-shadow:0 0 3px 0 <?php echo $stnav_shadow;?>; -webkit-box-shadow:0 0 3px 0 <?php echo $stnav_shadow;?>;}								
							<?php		
							}
							if($stnav_separator_color!=''){
							?>
								@media(max-width:1024px) {
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li > a:after,
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li > .op-menu-location > a:after,
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li a:after,
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li.menu-item-has-children>.op-menu-location.bt-menu-location-left > a:after
									{ background-color:<?php echo $stnav_separator_color;?>;}
									
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:first-child > a, 
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:first-child > .op-menu-location > a,
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li).menu-item-has-children .open-submenu-mobile 
									{border-color:<?php echo $stnav_separator_color;?>;}
								}
							<?php		
							}
							if($stnav_hover_bg!=''){
							?>
								#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:hover > a						
								{background-color:<?php echo $stnav_hover_bg;?>;}
								
								@media(min-width:1025px){
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li):hover > .op-menu-location > a
									{background-color:<?php echo $stnav_hover_bg;?>;}
								}
								
								@media(max-width:1024px){
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > .op-menu-location > a:hover,
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li > .op-menu-location > a:hover 
									{background-color:<?php echo $stnav_hover_bg;?>;}
								}								
							<?php		
							}
							if($stnav_active_bg!=''){
							?>
								#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li > a.bt-active
								{background-color:<?php echo $stnav_active_bg;?>;}
							<?php		
							}
							if($stnav_text_color!=''){
							?>
								#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li > a, 
								#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > .op-menu-location > a								
								{color:<?php echo $stnav_text_color;?>;}
								
								#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky .bt-op-main-nav-mobile > a > span,
								#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky .bt-hamburger-menu-open > a > span
								{background-color:<?php echo $stnav_text_color;?>;}
								
								@media(max-width:1024px){
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li a,									
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li).menu-item-has-children .open-submenu-mobile 
									{color:<?php echo $stnav_text_color;?>;}
								}
							<?php		
							}
							if($stnav_text_hover_color!=''){
							?>								
								#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:hover > a								
								{color:<?php echo $stnav_text_hover_color;?>;}	
								
								@media(min-width:1025px){
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li):hover > .op-menu-location > a
									{color:<?php echo $stnav_text_hover_color;?>;}
								}
								
								@media(max-width:1024px){
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > .op-menu-location > a:hover,
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li > .op-menu-location > a:hover 
									{color:<?php echo $stnav_text_hover_color;?>;}
								}							
							<?php		
							}
							if($stnav_text_active_color!=''){
							?>
								#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li > a.bt-active
								{color:<?php echo $stnav_text_active_color;?>;}
							<?php		
							}
							//Sticky menu
								//Dropdown sticky menu
									if($dd_stnav_bg){
									?>
										@media(min-width:1025px){
											#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li 
											{background-color:<?php echo $dd_stnav_bg;?>;}
										}
									<?php
									}
									if($dd_stnav_separator_color){
									?>
										@media(min-width:1025px){
											#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul:before,
											#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li > ul:before 
											{background-color:<?php echo $dd_stnav_separator_color;?>;}
										}
									<?php
									}
									if($dd_stnav_hover_bg){
									?>
										@media(min-width:1025px){
											#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li:hover > .op-menu-location > a 
											{background-color:<?php echo $dd_stnav_hover_bg;?>;}
										}
									<?php
									}
									if($dd_stnav_text_color){
									?>
										@media(min-width:1025px){
											#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li > .op-menu-location > a 
											{color:<?php echo $dd_stnav_text_color;?>;}
										}
									<?php
									}
									if($dd_stnav_text_hover_color){
									?>
										@media(min-width:1025px){
											#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li:hover > .op-menu-location > a 
											{color:<?php echo $dd_stnav_text_hover_color;?>;}
										}
									<?php
									}
								//Dropdown sticky menu
								
							//Mobile menu
							if($mobile_bg){
							?>
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu
								{background-color:<?php echo $mobile_bg;?>;}
								
								@media(max-width:1024px){
									#<?php echo $id;?>.btnav-container .bt-op-main-nav-wrap,
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky .bt-op-main-nav-wrap 
									{background-color:<?php echo $mobile_bg;?>;}
									
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li
									{background-color: transparent;}
								}
							<?php
							}
							if($mobile_separator_color){
							?>
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li > a:after,
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li > .op-menu-location > a:after,
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li:not(.bt-main-menu-item-li) > ul li a:after
								{background-color:<?php echo $mobile_separator_color;?>;}
								
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu-close,
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li:not(.bt-main-menu-item-li).menu-item-has-children .open-submenu-mobile
								{border-color:<?php echo $mobile_separator_color;?>;}
								
								@media(max-width:1024px){
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > a:after,
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > .op-menu-location > a:after,
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li a:after,
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li.menu-item-has-children>.op-menu-location.bt-menu-location-left > a:after,
									
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li > a:after,
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li > .op-menu-location > a:after,
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li a:after,
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li.menu-item-has-children>.op-menu-location.bt-menu-location-left > a:after
									{background-color:<?php echo $mobile_separator_color;?>;}
									
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:first-child > a, 
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:first-child > .op-menu-location > a,
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li).menu-item-has-children .open-submenu-mobile,
									
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:first-child > a, 
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:first-child > .op-menu-location > a,
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li).menu-item-has-children .open-submenu-mobile 
									{border-color:<?php echo $mobile_separator_color;?>;}
								}
							<?php
							}
							if($mobile_hover_bg){
							?>
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li:hover > a,
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li:not(.bt-main-menu-item-li) > .op-menu-location > a:hover,
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li:not(.bt-main-menu-item-li) > ul li > .op-menu-location > a:hover 								
								{background-color:<?php echo $mobile_hover_bg;?>;}
																
								@media(max-width:1024px){
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:hover > a,								
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:hover > a 
									{background-color:<?php echo $mobile_hover_bg;?>;}
									
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > .op-menu-location > a:hover,
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li > .op-menu-location > a:hover,
									
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > .op-menu-location > a:hover,
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li > .op-menu-location > a:hover 
									{background-color:<?php echo $mobile_hover_bg;?>;}
								}		
							<?php
							}
							if($mobile_active_bg!=''){
							?>
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li > a.bt-active
								{background-color:<?php echo $mobile_active_bg;?>;}
								
								@media(max-width:1024px){
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > a.bt-active,
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li > a.bt-active 
									{background-color:<?php echo $mobile_active_bg;?>;}
								}
							<?php		
							}
							if($mobile_text_color){
							?>
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li > a,
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li:not(.bt-main-menu-item-li) > .op-menu-location > a,
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li:not(.bt-main-menu-item-li) > ul li a,
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li:not(.bt-main-menu-item-li).menu-item-has-children .open-submenu-mobile								
								{color:<?php echo $mobile_text_color;?>;}
								
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu-close:before,
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu-close:after
								{background-color:<?php echo $mobile_text_color;?>;}
								
								@media(max-width:1024px){
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > a, 
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > .op-menu-location > a,
									
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li > a, 
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > .op-menu-location > a 
									{color:<?php echo $mobile_text_color;?>;}									
								
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li a,									
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li).menu-item-has-children .open-submenu-mobile,
									
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li a,									
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li).menu-item-has-children .open-submenu-mobile 
									{color:<?php echo $mobile_text_color;?>;}
								}
							<?php
							}
							if($mobile_text_hover_color){
							?>							
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li:hover > a,								
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li:not(.bt-main-menu-item-li) > .op-menu-location > a:hover,
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li:not(.bt-main-menu-item-li) > ul li > .op-menu-location > a:hover
								{color:<?php echo $mobile_text_hover_color;?>;}
								
								@media(max-width:1024px){
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:hover > a,								
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:hover > a
									{color:<?php echo $mobile_text_hover_color;?>;}	
									
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > .op-menu-location > a:hover,
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li > .op-menu-location > a:hover,
									
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > .op-menu-location > a:hover,
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li > .op-menu-location > a:hover 
									{color:<?php echo $mobile_text_hover_color;?>;}
								}	
							<?php
							}
							if($mobile_text_active_color!=''){
							?>
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li > a.bt-active
								{color:<?php echo $mobile_text_active_color;?>;}
								
								@media(max-width:1024px){
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > a.bt-active,
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li > a.bt-active 
									{color:<?php echo $mobile_text_active_color;?>;}
								}
							<?php		
							}
							//Mobile menu	
							
							if($nav_height!=''){
							?>
								#<?php echo $id;?>.btnav-container .bt-op-header,
								#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > a,
								#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > .op-menu-location > a, 
								#<?php echo $id;?>.btnav-container .bt-op-header .bt-op-logo > li,
								#<?php echo $id;?>.btnav-container .bt-op-main-nav-mobile,
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu-open {
									min-height: <?php echo $nav_height;?>;
								}
								
								#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > a,
								#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > .op-menu-location > a{
									line-height: <?php echo $nav_height;?>;
								}
								
								@media(max-width:1024px) {
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > a, 
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > .op-menu-location > a, 
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li a {
										min-height: 45px;
										line-height: 1.5;
									}
								}
								
								#<?php echo $id;?>.btnav-container .bt-op-header .bt-op-logo > li img {
									max-height:calc(<?php echo $nav_height;?> - 10px); 
									max-height:-webkit-calc(<?php echo $nav_height;?> - 10px); 
									max-height:-moz-calc(<?php echo $nav_height;?> - 10px); 
									max-height:-ms-calc(<?php echo $nav_height;?> - 10px); 
									max-height:-o-calc(<?php echo $nav_height;?> - 10px);
								}
								
								#<?php echo $id;?>.btnav-container.bt-open-true .bt-op-main-nav-wrap { 
									height:calc(100vh - <?php echo $nav_height;?>); 
									height:-webkit-calc(100vh - <?php echo $nav_height;?>); 
									height:-moz-calc(100vh - <?php echo $nav_height;?>); 
									height:-ms-calc(100vh - <?php echo $nav_height;?>); 
									height:-o-calc(100vh - <?php echo $nav_height;?>);
								}		
								body.admin-bar #<?php echo $id;?>.btnav-container.bt-open-true .bt-op-main-nav-wrap { 
									height:calc(100vh - <?php echo $nav_height;?> - 32px); 
									height:-webkit-calc(100vh - <?php echo $nav_height;?> - 32px); 
									height:-moz-calc(100vh - <?php echo $nav_height;?> - 32px); 
									height:-ms-calc(100vh - <?php echo $nav_height;?> - 32px); 
									height:-o-calc(100vh - <?php echo $nav_height;?> - 32px);
								}		
								@media(max-width:782px) {
									body.admin-bar #<?php echo $id;?>.btnav-container.bt-open-true .bt-op-main-nav-wrap { 
										height:calc(100vh - <?php echo $nav_height;?> - 46px); 
										height:-webkit-calc(100vh - <?php echo $nav_height;?> - 46px); 
										height:-moz-calc(100vh - <?php echo $nav_height;?> - 46px); 
										height:-ms-calc(100vh - <?php echo $nav_height;?> - 46px); 
										height:-o-calc(100vh - <?php echo $nav_height;?> - 46px);
									}
								}
								@media(max-width:600px) {
									body.admin-bar #<?php echo $id;?>.btnav-container.bt-open-true .bt-op-main-nav-wrap { 
										height:calc(100vh - <?php echo $nav_height;?>); 
										height:-webkit-calc(100vh - <?php echo $nav_height;?>); 
										height:-moz-calc(100vh - <?php echo $nav_height;?>); 
										height:-ms-calc(100vh - <?php echo $nav_height;?>); 
										height:-o-calc(100vh - <?php echo $nav_height;?>);
									}
								}
							<?php	
							}
							
							if($mnav_sticky_height!=''){
							?>
								#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky,
								#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li > a,
								#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li > .op-menu-location > a, 
								#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky .bt-op-logo > li,
								#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky .bt-op-main-nav-mobile,
								#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky .bt-hamburger-menu-open {
									min-height: <?php echo $mnav_sticky_height;?>;									
								}
								
								#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li > a,
								#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li > .op-menu-location > a{
									line-height: <?php echo $mnav_sticky_height;?>;									
								}
								
								@media(max-width:1024px) {
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li > a, 
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li > .op-menu-location > a, 
									#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li a {
										min-height: 45px;
										line-height: 1.5;										
									}
								}
								
								#<?php echo $id;?>.btnav-container .bt-op-header.bt-show-sticky .bt-op-logo > li img {
									max-height:calc(<?php echo $mnav_sticky_height;?> - 10px); 
									max-height:-webkit-calc(<?php echo $mnav_sticky_height;?> - 10px); 
									max-height:-moz-calc(<?php echo $mnav_sticky_height;?> - 10px); 
									max-height:-ms-calc(<?php echo $mnav_sticky_height;?> - 10px); 
									max-height:-o-calc(<?php echo $mnav_sticky_height;?> - 10px);
								}
								
								#<?php echo $id;?>.btnav-container.bt-open-true .bt-op-header.bt-show-sticky .bt-op-main-nav-wrap { 
									height:calc(100vh - <?php echo $mnav_sticky_height;?>); 
									height:-webkit-calc(100vh - <?php echo $mnav_sticky_height;?>); 
									height:-moz-calc(100vh - <?php echo $mnav_sticky_height;?>); 
									height:-ms-calc(100vh - <?php echo $mnav_sticky_height;?>); 
									height:-o-calc(100vh - <?php echo $mnav_sticky_height;?>);
								}		
								body.admin-bar #<?php echo $id;?>.btnav-container.bt-open-true .bt-op-header.bt-show-sticky .bt-op-main-nav-wrap { 
									height:calc(100vh - <?php echo $mnav_sticky_height;?> - 32px); 
									height:-webkit-calc(100vh - <?php echo $mnav_sticky_height;?> - 32px); 
									height:-moz-calc(100vh - <?php echo $mnav_sticky_height;?> - 32px); 
									height:-ms-calc(100vh - <?php echo $mnav_sticky_height;?> - 32px); 
									height:-o-calc(100vh - <?php echo $mnav_sticky_height;?> - 32px);
								}		
								@media(max-width:782px) {
									body.admin-bar #<?php echo $id;?>.btnav-container.bt-open-true .bt-op-header.bt-show-sticky .bt-op-main-nav-wrap { 
										height:calc(100vh - <?php echo $mnav_sticky_height;?> - 46px); 
										height:-webkit-calc(100vh - <?php echo $mnav_sticky_height;?> - 46px); 
										height:-moz-calc(100vh - <?php echo $mnav_sticky_height;?> - 46px); 
										height:-ms-calc(100vh - <?php echo $mnav_sticky_height;?> - 46px); 
										height:-o-calc(100vh - <?php echo $mnav_sticky_height;?> - 46px);
									}
								}
								@media(max-width:600px) {
									body.admin-bar #<?php echo $id;?>.btnav-container.bt-open-true .bt-op-header.bt-show-sticky .bt-op-main-nav-wrap { 
										height:calc(100vh - <?php echo $mnav_sticky_height;?>); 
										height:-webkit-calc(100vh - <?php echo $mnav_sticky_height;?>); 
										height:-moz-calc(100vh - <?php echo $mnav_sticky_height;?>); 
										height:-ms-calc(100vh - <?php echo $mnav_sticky_height;?>); 
										height:-o-calc(100vh - <?php echo $mnav_sticky_height;?>);										
									}
								}
							<?php	
							}
							
							if(($width_small!='' || $width_medium!='' || $width_large!='') && $content_width=='2'){
								?>	
															
								#<?php echo $id;?>.btnav-container .bt-menu-control-sticky .bt-op-nav { 
									width:100%;
								}
								
								<?php if($width_small!=''){?>
									@media(min-width:768px) {
										#<?php echo $id;?>.btnav-container .bt-menu-control-sticky .bt-op-nav {
											width:<?php echo $width_small;?>
										}
									}
								<?php }?>
								
								<?php if($width_medium!=''){?>
									@media(min-width:992px) {
										#<?php echo $id;?>.btnav-container .bt-menu-control-sticky .bt-op-nav {
											width:<?php echo $width_medium;?>
										}
									}
								<?php }?>
								
								<?php if($width_large!=''){?>
									@media(min-width:1200px) {
										#<?php echo $id;?>.btnav-container .bt-menu-control-sticky .bt-op-nav {
											width:<?php echo $width_large;?>
										}
									}
								<?php }?>
															
							<?php }
							
							$googleFontsEcho = array();
							$nav_font_family = '';
							$snav_font_family = '';
							
							if ($nav_font!='' || $nav_font_size!='' || ($nav_font_weight!='normal' && $nav_font_weight!='') || $nav_letter_spacing!=''){
								if(isset($nav_font) && $nav_font!=''){
									$nav_font_family = $this->get_google_font_name($nav_font);
									array_push($googleFontsEcho, $nav_font);
								}
							?>
								#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > a,
								#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) > ul li a,
								#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > .op-menu-location > a,
								
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li > a,
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li:not(.bt-main-menu-item-li) > .op-menu-location > a,
								#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li:not(.bt-main-menu-item-li) > ul li a {									
									<?php if($nav_font_family!=''){?>
									font-family:"<?php echo esc_html($nav_font_family);?>";
									<?php
									}
									if($nav_font_size!=''){
									?>
									font-size:<?php echo esc_html($nav_font_size);?>;									
									<?php
									}
									if($nav_font_weight!='normal' && $nav_font_weight!=''){
									?>
									font-weight:<?php echo esc_html($nav_font_weight);?>;
									<?php
									}
									if($nav_letter_spacing!=''){
									?>
									letter-spacing:<?php echo esc_html($nav_letter_spacing);?>;
									<?php }?>									
								}
								
								<?php if($nav_font_size!=''){?>
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > a > .bt-item-wrap > i.bt-menu-icon,
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li:not(.bt-main-menu-item-li) a > .bt-item-wrap > i,
									
									#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li > a > .bt-item-wrap > i.bt-menu-icon,
									#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li:not(.bt-main-menu-item-li) a > .bt-item-wrap > i {
										font-size:calc(<?php echo esc_html($nav_font_size);?> * 1.16);
										font-size:-webkit-calc(<?php echo esc_html($nav_font_size);?> * 1.16);
										font-size:-ms-calc(<?php echo esc_html($nav_font_size);?> * 1.16);
										font-size:-o-calc(<?php echo esc_html($nav_font_size);?> * 1.16);
										font-size:-moz-calc(<?php echo esc_html($nav_font_size);?> * 1.16);
									}
								<?php }?>		
								
								<?php if($nav_letter_spacing!=''){?>
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > a,
									#<?php echo $id;?>.btnav-container ul.bt-op-nav-items > li > .op-menu-location > a,
									
									#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li > a,
									#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li:not(.bt-main-menu-item-li) > .op-menu-location > a,
									#<?php echo $id;?>.btnav-container .bt-hamburger-menu ul.bt-hamburger-menu-items > li:not(.bt-main-menu-item-li) > ul li a {
										padding-right:calc(12px - <?php echo esc_html($nav_letter_spacing);?>);
										padding-right:-webkit-calc(12px - <?php echo esc_html($nav_letter_spacing);?>);
										padding-right:-ms-calc(12px - <?php echo esc_html($nav_letter_spacing);?>);
										padding-right:-moz-calc(12px - <?php echo esc_html($nav_letter_spacing);?>);
										padding-right:-o-calc(12px - <?php echo esc_html($nav_letter_spacing);?>);
									}
								<?php }?>								
							<?php
							}
							
							if ($snav_font!='' || $snav_font_size!='' || ($snav_font_weight!='normal' && $snav_font_weight!='') || $snav_letter_spacing!=''){								
								if(isset($snav_font) && $snav_font!=''){
									$snav_font_family = $this->get_google_font_name($snav_font);
									array_push($googleFontsEcho, $snav_font);
								}
							?>
								#<?php echo $id;?>.btnav-container .bt-sub-tooltip {
									<?php
									if($snav_font_family!=''){
									?>
									font-family:"<?php echo esc_html($snav_font_family);?>";
									<?php
									}
									if($nav_font_size!=''){
									?>
									font-size:<?php echo esc_html($snav_font_size);?>;
									<?php
									}
									if($snav_font_weight!='normal' && $snav_font_weight!=''){
									?>
									font-weight:<?php echo esc_html($snav_font_weight);?>;
									<?php
									}
									if($snav_letter_spacing!=''){
									?>
									letter-spacing:<?php echo esc_html($snav_letter_spacing);?>;
									padding-right:calc(10px - <?php echo esc_html($snav_letter_spacing);?>);
									padding-right:-webkit-calc(10px - <?php echo esc_html($snav_letter_spacing);?>);
									padding-right:-ms-calc(10px - <?php echo esc_html($snav_letter_spacing);?>);
									padding-right:-moz-calc(10px - <?php echo esc_html($snav_letter_spacing);?>);
									padding-right:-o-calc(10px - <?php echo esc_html($snav_letter_spacing);?>);
									<?php }?>
								}
							<?php }?>
						</style>
                        
                        <?php
							$newURLGoogleFonts = urlencode(implode('|', $googleFontsEcho));
							if($newURLGoogleFonts!=''){
								echo '<link rel="stylesheet" id="google-fonts-css" href="https://fonts.googleapis.com/css?family='.urlencode(implode('|', $googleFontsEcho)).'" type="text/css" media="all" />';
							}
							
							$stringHamburgerMenu = '';
						?>
                        
                        <div class="bt-op-header">
                        
                        	<div class="bt-menu-control-sticky">
                        
                                <div class="bt-op-nav">
                                    <!--logo-->
                                    <div class="bt-op-logo-wrap">                                                                        
                                        <ul class="bt-op-logo">
                                            <li>
                                            	
												<?php
                                                $LogoURL='';
                                                if($logo!=''){
                                                    $pictureID = wp_get_attachment_image_src($logo, "full");
                                                    if(!is_wp_error($pictureID) && !empty($pictureID)) {
                                                        $LogoURL = $pictureID[0];
                                                    }
                                                }
												
												$st_LogoURL='';
                                                if($st_logo!=''){
                                                    $st_pictureID = wp_get_attachment_image_src($st_logo, "full");
                                                    if(!is_wp_error($st_pictureID) && !empty($st_pictureID)) {
                                                        $st_LogoURL = $st_pictureID[0];
                                                    }
                                                }
												
                                                if($LogoURL!=''){
                                                    echo 	'<div class="bt-main-logo'.($st_LogoURL!=''?' hidden-sticky-logo':'').'">
																<a href="'.($logo_link!=''?$logo_link:'javascript:;').'" title="">
																	<img src="'.$LogoURL.'" alt=""></div>
																</a>
															';
                                                }	
                                                
                                                
                                                if($st_LogoURL!=''){
                                                    echo 	'<div class="bt-sticky-logo">
																<a href="'.($logo_link!=''?$logo_link:'javascript:;').'" title="">
																	<img src="'.$st_LogoURL.'" alt="">
																</a>																
															</div>';
                                                }	
                                                ?>
                                                
                                            </li>
                                        </ul>
                                    </div><!--logo-->
                                    
                                    <?php 
									switch($mnav_style){
										case 'hamburger-menu':
											$bt_item_buildMenu = 1;
											$bt_ham_fullScreen = '';
											if($fullscreen=='on'){
												$bt_ham_fullScreen = 	'
																		<li class="bt-wrap-fullscreen">
																			<a href="javascript:;" title="<?php '.__('FullScreen', 'Smart-One-Page-Navigation').'" class="bt_fullscreenmode">
																				<span class="bt_fullscreenmode_button">
																					<svg class="op-icon-fullscreen">
																						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#op-icon-fullscreen"></use>
																					</svg>
																					<svg class="op-icon-fullscreen-exit">
																						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#op-icon-fullscreen-exit"></use>
																					</svg>
																				</span>
																			</a>
																		</li>
																		';
											}
											
											$face_menu = '';
											$inst_menu = '';
											
											if($facebook_link!=''){
												$face_menu = '
												<li class="bt-social-share">
													<a href="'.$facebook_link.'" target="_blank" title="'.__('Facebook', 'Smart-One-Page-Navigation').'" class="bt_social_share_action">
														<span class="bt_socialshare_button">
															<i class="fa fa-facebook" aria-hidden="true"></i>
														</span>
													</a>
												</li>
												';
											};
											if($instagram_link!=''){
												$inst_menu = '
												<li class="bt-social-share">
													<a href="'.$instagram_link.'" target="_blank" title="'.__('Instagram', 'Smart-One-Page-Navigation').'" class="bt_social_share_action">
														<span class="bt_socialshare_button">
															<i class="fa fa-instagram" aria-hidden="true"></i>
														</span>
													</a>
												</li>
												';
											};
											
											$stringHamburgerMenu =	'	<div class="bt-hamburger-menu">
																		
																			<div class="bt-hamburger-menu-close"></div>
																			
																			<div class="bt-hamburger-menu-content">
																			
																				<ul class="bt-hamburger-menu-items">
																					'.do_shortcode($contents).$bt_ham_fullScreen.$face_menu.$inst_menu.'																					
																				</ul>
																					
																			</div>
																		</div>
																	';																	
									?>
                                    	<div class="bt-hamburger-menu-open">
                                        	<a href="javascript:;">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </a>
                                        </div>	
                                    <?php	
											break;
										default:										
									?>                                    
                                            <!--menu items-->
                                            <div class="bt-op-main-nav-wrap">
                                                <nav class="bt-op-main-nav">
                                                    <ul class="bt-op-nav-items">
                                                        <?php 
                                                            $bt_item_buildMenu = 1;
                                                            echo do_shortcode($contents);
                                                            
                                                            if($fullscreen=='on'){
                                                            ?>
                                                                <li class="bt-wrap-fullscreen">
                                                                    <a href="javascript:;" title="<?php echo __('FullScreen', 'Smart-One-Page-Navigation')?>" class="bt_fullscreenmode">
                                                                        <span class="bt_fullscreenmode_button">
                                                                            <svg class="op-icon-fullscreen">
                                                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#op-icon-fullscreen"></use>
                                                                            </svg>
                                                                            <svg class="op-icon-fullscreen-exit">
                                                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#op-icon-fullscreen-exit"></use>
                                                                            </svg>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                            <?php
                                                            };
															
															if($facebook_link!=''){
																echo '
																<li class="bt-social-share">
																	<a href="'.$facebook_link.'" target="_blank" title="'.__('Facebook', 'Smart-One-Page-Navigation').'" class="bt_social_share_action">
																		<span class="bt_socialshare_button">
																			<i class="fa fa-facebook" aria-hidden="true"></i>
																		</span>
																	</a>
																</li>
																';
															};
															if($instagram_link!=''){
																echo '
																<li class="bt-social-share">
																	<a href="'.$instagram_link.'" target="_blank" title="'.__('Instagram', 'Smart-One-Page-Navigation').'" class="bt_social_share_action">
																		<span class="bt_socialshare_button">
																			<i class="fa fa-instagram" aria-hidden="true"></i>
																		</span>
																	</a>
																</li>
																';
															};
                                                        ?>
                                                    </ul>
                                                </nav>
                                            </div><!--menu items-->
                                            
                                            <!--Button Mobile Menu-->
                                            <div class="bt-op-main-nav-mobile">
                                                <a href="javascript:;">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </a>
                                            </div><!--Button Mobile Menu-->                                    
                                    <?php 
											break;
									};
									?>
                                </div>
                        
                        	</div>
                            
                        </div>
                    <?php }?>
                    
                    <div class="bt-op-items">
                    	<?php 
							$bt_item_buildMenu = 0;
							echo do_shortcode($contents);
						?>
                    </div>
                    
                    <?php 
					if($snav_style!='hidden'){
						?>
                                                
                        <style scoped>
							<?php if($snav_bg!=''){?>
								#<?php echo $id;?>.btnav-container .bt-sub-navigation {background-color:<?php echo $snav_bg;?>;}
								#<?php echo $id;?>.btnav-container .bt-sub-navigation.style-3:before {border-bottom-color:<?php echo $snav_bg;?>;}
								#<?php echo $id;?>.btnav-container .bt-sub-navigation.style-3:after {border-top-color:<?php echo $snav_bg;?>;}
								#<?php echo $id;?>.btnav-container .bt-sub-navigation.style-bottom.style-3:before {border-bottom-color:rgba(0,0,0,0); border-right-color:<?php echo $snav_bg;?>;}
								#<?php echo $id;?>.btnav-container .bt-sub-navigation.style-bottom.style-3:after {border-top-color:rgba(0,0,0,0); border-left-color:<?php echo $snav_bg;?>;}
							<?php };?>
							
							<?php if($snav_tooltip_bg!=''){?>
								#<?php echo $id;?>.btnav-container .bt-sub-tooltip { background-color:<?php echo $snav_tooltip_bg;?>;}
								#<?php echo $id;?>.btnav-container .bt-sub-tooltip:after { border-left-color:<?php echo $snav_tooltip_bg;?>;}
								#<?php echo $id;?>.btnav-container .bt-sub-navigation.style-bottom .bt-sub-tooltip:after {border-left-color:rgba(0,0,0,0); border-top-color:<?php echo $snav_tooltip_bg;?>;}
								#<?php echo $id;?>.btnav-container .bt-sub-navigation.style-left .bt-sub-tooltip:after {border-left-color:rgba(0,0,0,0); border-right-color:<?php echo $snav_tooltip_bg;?>;}
							<?php };?>
							
							<?php if($snav_tooltip_color!=''){?>
								#<?php echo $id;?>.btnav-container .bt-sub-tooltip { color:<?php echo $snav_tooltip_color;?>;}
							<?php };?>
							
							<?php if($snav_item_color!=''){?>
								#<?php echo $id;?>.btnav-container .bt-sub-navigation-item:not(:hover):not(.bt-active),
								#<?php echo $id;?>.btnav-container .bt-sub-navigation-item:not(:hover):not(.bt-active):visited,
								#<?php echo $id;?>.btnav-container .bt-sub-navigation-item:not(:hover):not(.bt-active):active,
								#<?php echo $id;?>.btnav-container .bt-sub-navigation-item:not(:hover):not(.bt-active):focus {
									background-color:rgba(0,0,0,0); border-color:<?php echo $snav_item_color;?>; color:<?php echo $snav_item_color;?>;
								}
								#<?php echo $id;?>.btnav-container .bt-sub-navigation.style-3 .bt-sub-navigation-item:not(:hover):not(.bt-active):after {
									background-color:rgba(0,0,0,0); border-color:<?php echo $snav_item_color;?>;
								}
								#<?php echo $id;?>.btnav-container .bt-sub-navigation.style-5 .bt-sub-navigation-item:not(:hover):not(.bt-active):after {
									border-color:<?php echo $snav_item_color;?>;
								}
							<?php };?>
							
							<?php if($snav_item_hover_color!=''){?>
								#<?php echo $id;?>.btnav-container .bt-sub-navigation-item:hover {
									border-color:<?php echo $snav_item_hover_color;?>; color:<?php echo $snav_item_hover_color;?>;
								}
								#<?php echo $id;?>.btnav-container .bt-sub-navigation.style-3 .bt-sub-navigation-item:hover:after {
									border-color:<?php echo $snav_item_hover_color;?>;
								}
								#<?php echo $id;?>.btnav-container .bt-sub-navigation.style-5 .bt-sub-navigation-item:hover:after {
									border-color:<?php echo $snav_item_hover_color;?>;
								}		
							<?php };?>
							
							<?php if($snav_item_bg_hover_color!=''){?>
								#<?php echo $id;?>.btnav-container .bt-sub-navigation-item:hover {
									background-color:<?php echo $snav_item_bg_hover_color;?>;
								}
								
								#<?php echo $id;?>.btnav-container .bt-sub-navigation.style-3 .bt-sub-navigation-item:hover,
								#<?php echo $id;?>.btnav-container .bt-sub-navigation.style-5 .bt-sub-navigation-item:hover {
									background-color:rgba(0,0,0,0);
								}
								
								#<?php echo $id;?>.btnav-container .bt-sub-navigation.style-3 .bt-sub-navigation-item:hover:after,
								#<?php echo $id;?>.btnav-container .bt-sub-navigation.style-5 .bt-sub-navigation-item:hover:after {
									background-color:<?php echo $snav_item_bg_hover_color;?>;
								}										
							<?php };?>
							
							<?php if($snav_item_active_color!=''){?>
								#<?php echo $id;?>.btnav-container .bt-sub-navigation-item.bt-active {
									border-color:<?php echo $snav_item_active_color;?>; color:<?php echo $snav_item_active_color;?>;
								}
								#<?php echo $id;?>.btnav-container .bt-sub-navigation.style-3 .bt-sub-navigation-item.bt-active:after{
									border-color:<?php echo $snav_item_active_color;?>;
								}
								#<?php echo $id;?>.btnav-container .bt-sub-navigation.style-5 .bt-sub-navigation-item.bt-active:after {
									border-color:<?php echo $snav_item_active_color;?>;
								}	
							<?php };?>
							
							<?php if($snav_item_bg_active_color!=''){?>
								#<?php echo $id;?>.btnav-container .bt-sub-navigation-item.bt-active {
									background-color:<?php echo $snav_item_bg_active_color;?>;
								}
								
								#<?php echo $id;?>.btnav-container .bt-sub-navigation.style-3 .bt-sub-navigation-item.bt-active,
								#<?php echo $id;?>.btnav-container .bt-sub-navigation.style-5 .bt-sub-navigation-item.bt-active {
									background-color:rgba(0,0,0,0);
								}
								
								#<?php echo $id;?>.btnav-container .bt-sub-navigation.style-3 .bt-sub-navigation-item.bt-active:after,
								#<?php echo $id;?>.btnav-container .bt-sub-navigation.style-5 .bt-sub-navigation-item.bt-active:after {
									background-color:<?php echo $snav_item_bg_active_color;?>;
								}								
							<?php };?>
						</style>
                        
                        <div class="bt-sub-navigation<?php echo ' '.$snav_position.' '.$snav_style.' bt-sub-behavior-'.$snav_behavior;?>">
                            <?php 
                                $bt_item_buildMenu = 2;
                                echo do_shortcode($contents);
                            ?>
                        </div>
                    <?php } echo $stringHamburgerMenu;?>                    
                </div>
            <?php
				//echo $stringHamburgerMenu;
				
			$output_string = ob_get_contents();
			ob_end_clean();
			return $output_string;	
		}
		//Container
		
		//Item
		function op_item_shortcode($params, $contents){
			extract(
				shortcode_atts(
					array(
						'item_name'							=>'', //done
						'item_name_alias'					=>'', //done
						'item_icon'							=>'', //done
						'icon_font'							=>'', //done
						'icon_image'						=>'', //done
						'content_width'						=>'', //done
						'width_small'						=>'', //done
						'width_medium'						=>'', //done
						'width_large'						=>'', //done
						'height'							=>'', //done						
						'content_position'					=>'', //done
						'padding_tiny'						=>'', //done
						'padding_small'						=>'', //done
						'padding_medium'					=>'', //done
						'padding_large'						=>'', //done
						'background_color'					=>'', //done
						'icon_color'						=>'', //done
						'background_img'					=>'', //done	
						'parallax'							=>'', //done
						'bg_video_options'					=>'', //done
						'youtube_id'						=>'', //done
						'start'								=>'', //done
						'mp4'								=>'', //done
						'webm'								=>'', //done
						'ogv'								=>'', //done
						
						'minspeedx'							=>'', //done
						'maxspeedx'							=>'', //done
						'minspeedy'							=>'', //done
						'maxspeedy'							=>'', //done
						'directionx'						=>'', //done
						'directiony'						=>'', //done
						'density'							=>'', //done
						'dotcolor'							=>'', //done
						'linecolor'							=>'', //done
						'particleradius'					=>'', //done
						'linewidth'							=>'', //done
						'curvedlines'						=>'', //done
						'proximity'							=>'', //done
						
						'ext_class'							=>'', //done
						'downmore_button'					=>'', //done
						'downmore_button_color'				=>'', //done
						'animation_name'					=>'', //done
						'animation_duration'				=>'', //done
						'animation_timming_function'		=>'', //done
						'animation_delay'					=>'', //done								
					), 
					$params
				)
			);
			
			$rand_ID					= rand(1, 9999);
			$id                     	= OP_BETE_PREFIX.$rand_ID;	
			
			$item_name					= (isset($params['item_name'])&&trim($params['item_name'])!='')?trim($params['item_name']):'';
			$item_name_alias			= (isset($params['item_name_alias'])&&trim($params['item_name_alias'])!='')?sanitize_title(trim($params['item_name_alias'])):'';
			$item_icon					= (isset($params['item_icon'])&&trim($params['item_icon'])!='')?trim($params['item_icon']):'no';
			$icon_font					= (isset($params['icon_font'])&&trim($params['icon_font'])!='')?trim($params['icon_font']):'';
			$icon_image					= (isset($params['icon_image'])&&trim($params['icon_image'])!=''&&is_numeric(trim($params['icon_image'])))?trim($params['icon_image']):'';
			$content_width				= (isset($params['content_width'])&&trim($params['content_width'])!=''&&is_numeric(trim($params['content_width'])))?trim($params['content_width']):'0';
			$width_small				= (isset($params['width_small'])&&trim($params['width_small'])!='')?trim($params['width_small']):'750px';
			$width_medium				= (isset($params['width_medium'])&&trim($params['width_medium'])!='')?trim($params['width_medium']):'970px';
			$width_large				= (isset($params['width_large'])&&trim($params['width_large'])!='')?trim($params['width_large']):'1170px';
			$height						= (isset($params['height'])&&trim($params['height'])!=''&&is_numeric(trim($params['height'])))?trim($params['height']):'0';
			$content_position			= (isset($params['content_position'])&&trim($params['content_position'])!=''&&is_numeric(trim($params['content_position'])))?trim($params['content_position']):'0';
			
			$padding_tiny				= (isset($params['padding_tiny'])&&trim($params['padding_tiny'])!='')?trim($params['padding_tiny']):'';
			$padding_small				= (isset($params['padding_small'])&&trim($params['padding_small'])!='')?trim($params['padding_small']):'';
			$padding_medium				= (isset($params['padding_medium'])&&trim($params['padding_medium'])!='')?trim($params['padding_medium']):'';
			$padding_large				= (isset($params['padding_large'])&&trim($params['padding_large'])!='')?trim($params['padding_large']):'';
			
			$background_color			= (isset($params['background_color'])&&trim($params['background_color'])!='')?trim($params['background_color']):'';
			$icon_color					= (isset($params['icon_color'])&&trim($params['icon_color'])!='')?trim($params['icon_color']):'';
			$background_img				= (isset($params['background_img'])&&trim($params['background_img'])!=''&&is_numeric(trim($params['background_img'])))?trim($params['background_img']):'';
			$parallax					= (isset($params['parallax'])&&trim($params['parallax'])!='')?trim($params['parallax']):'no';			
			$bg_video_options			= (isset($params['bg_video_options'])&&trim($params['bg_video_options'])!=''&&is_numeric(trim($params['bg_video_options'])))?trim($params['bg_video_options']):'0';
			$youtube_id					= (isset($params['youtube_id'])&&trim($params['youtube_id'])!='')?trim($params['youtube_id']):'';
			$start						= (isset($params['start'])&&trim($params['start'])!=''&&is_numeric(trim($params['start'])))?trim($params['start']):'0';	
			$mp4						= (isset($params['mp4'])&&trim($params['mp4'])!='')?trim($params['mp4']):'';
			$webm						= (isset($params['webm'])&&trim($params['webm'])!='')?trim($params['webm']):'';
			$ogv						= (isset($params['ogv'])&&trim($params['ogv'])!='')?trim($params['ogv']):'';
			
			$minspeedx					= (isset($params['minspeedx'])&&trim($params['minspeedx'])!=''&&is_numeric(trim($params['minspeedx'])))?trim($params['minspeedx']):'0.1';
			$maxspeedx					= (isset($params['maxspeedx'])&&trim($params['maxspeedx'])!=''&&is_numeric(trim($params['maxspeedx'])))?trim($params['maxspeedx']):'0.7';
			$minspeedy					= (isset($params['minspeedy'])&&trim($params['minspeedy'])!=''&&is_numeric(trim($params['minspeedy'])))?trim($params['minspeedy']):'0.1';
			$maxspeedy					= (isset($params['maxspeedy'])&&trim($params['maxspeedy'])!=''&&is_numeric(trim($params['maxspeedy'])))?trim($params['maxspeedy']):'0.7';
			$directionx					= (isset($params['directionx'])&&trim($params['directionx'])!='')?trim($params['directionx']):'center';
			$directiony					= (isset($params['directiony'])&&trim($params['directiony'])!='')?trim($params['directiony']):'center';
			$density					= (isset($params['density'])&&trim($params['density'])!=''&&is_numeric(trim($params['density'])))?trim($params['density']):'10000';
			$dotcolor					= (isset($params['dotcolor'])&&trim($params['dotcolor'])!='')?trim($params['dotcolor']):'#666666';
			$linecolor					= (isset($params['linecolor'])&&trim($params['linecolor'])!='')?trim($params['linecolor']):'#666666';
			$particleradius				= (isset($params['particleradius'])&&trim($params['particleradius'])!=''&&is_numeric(trim($params['particleradius'])))?trim($params['particleradius']):'7';
			$linewidth					= (isset($params['linewidth'])&&trim($params['linewidth'])!=''&&is_numeric(trim($params['linewidth'])))?trim($params['linewidth']):'1';
			$curvedlines				= (isset($params['curvedlines'])&&trim($params['curvedlines'])!='')?trim($params['curvedlines']):'no';
			$proximity					= (isset($params['proximity'])&&trim($params['proximity'])!=''&&is_numeric(trim($params['proximity'])))?trim($params['proximity']):'100';
						
			$ext_class					= (isset($params['ext_class'])&&trim($params['ext_class'])!='')?trim($params['ext_class']):'';
			$downmore_button			= (isset($params['downmore_button'])&&trim($params['downmore_button'])!='')?trim($params['downmore_button']):'no';
			$downmore_button_color		= (isset($params['downmore_button_color'])&&trim($params['downmore_button_color'])!='')?trim($params['downmore_button_color']):'';
			$animation_name				= (isset($params['animation_name'])&&trim($params['animation_name'])!='')?trim($params['animation_name']):'';			
			$animation_duration			= (isset($params['animation_duration'])&&trim($params['animation_duration'])!='')?trim($params['animation_duration']):'2s';
			$animation_timming_function	= (isset($params['animation_timming_function'])&&trim($params['animation_timming_function'])!='')?trim($params['animation_timming_function']):'linear';
			$animation_delay			= (isset($params['animation_delay'])&&trim($params['animation_delay'])!='')?trim($params['animation_delay']):'0s';
			
			global $bt_item_buildMenu;
			ob_start();
				switch($bt_item_buildMenu){
					case '0': //Item
						$pictureBackgroundURL='';
						if($background_img!=''){
							$pictureID				= wp_get_attachment_image_src($background_img, "full");
							if(!is_wp_error($pictureID) && !empty($pictureID)) {
								$pictureBackgroundURL 	= $pictureID[0];
							}
						}	
						?>
                        <div 
                        	id="<?php echo $item_name_alias;?>-anchor" 
                            class="bt-op-item<?php echo ' '.$ext_class.' '.$id;?>"
                            data-height="<?php echo $height;?>"
                            data-content-position="<?php echo $content_position;?>"
                            data-animation-name="<?php echo $animation_name;?>"
                            data-content-width="<?php echo $content_width;?>"
                        >
                        	<div 
                            	class="bt-op-item-content"
                                style=" 
									<?php 
									echo $background_color!=''?'background-color:'.$background_color.';':'';
									echo ($parallax!='yes' && $pictureBackgroundURL!='')?'background-image:url('.$pictureBackgroundURL.');':'';
									?>                                    
                            	"
                                id="<?php echo 'video-'.$id;?>"
                            >
                            	<?php if($parallax=='yes' && $pictureBackgroundURL!=''){?>
                            		<div class="bt-background-parallax">
                                    	<div class="bt-background-parallax-content" style=" <?php echo ($parallax=='yes' && $pictureBackgroundURL!='')?'background-image:url('.$pictureBackgroundURL.');':''; ?> ">
                                        </div>
                                    </div>                                
                            	<?php 
									};
									
								if($bg_video_options=='1' && $youtube_id!=''){?>
                                    <div class="youtube-background-vd" data-property="{videoURL:'http://youtu.be/<?php echo $youtube_id;?>', showControls:false, autoPlay:true, mute:true, startAt:<?php echo $start;?>, opacity:1, loop:true, containment:'<?php echo '#video-'.$id;?>'}">                            	
                                    </div>							
                                <?php };
								
                                if($bg_video_options=='2'){
								?>
                                    <div 
                                        class="html5-background-vd"
                                        data-video-mp4="<?php if($mp4!=''){echo $mp4;}?>"
                                        data-video-webm="<?php if($webm!=''){echo $webm;}?>"
                                        data-video-ogv="<?php if($ogv!=''){echo $ogv;}?>"                             
                                    >
                                    </div>
                                <?php
                                }
								
								if($bg_video_options=='3'){
								?>
                                	<div 
                                    	class="canvas-particleground"
                                        id="<?php echo 'canvas-particleground-'.$id;?>"
                                        data-minspeedx="<?php echo $minspeedx;?>"
                                        data-maxspeedx="<?php echo $maxspeedx;?>"
                                        data-minspeedy="<?php echo $minspeedy;?>"
                                        data-maxspeedy="<?php echo $maxspeedy;?>"
                                        data-directionx="<?php echo $directionx;?>"
                                        data-directiony="<?php echo $directiony;?>"
                                        data-density="<?php echo $density;?>"
                                        data-dotcolor="<?php echo $dotcolor;?>"
                                        data-linecolor="<?php echo $linecolor;?>"
                                        data-particleradius="<?php echo $particleradius;?>"
                                        data-linewidth="<?php echo $linewidth;?>"
                                        data-curvedlines="<?php echo $curvedlines;?>"
                                        data-proximity="<?php echo $proximity;?>"
                                    >
                                    </div>
                                <?php	
								}
                                ?>
                                
                                <style scoped>
									<?php 
									if($animation_name!='' && $animation_name!='no_animation'){
									?>
									
										.bt-op-item-content <?php echo '.builder-custom-'.$id;?>.bt-op-item-builder .bt-op-item-builder-content {
											<?php if($animation_duration!=''){?>
												animation-duration:<?php echo $animation_duration;?>;
												-webkit-animation-duration:<?php echo $animation_duration;?>;
											<?php }?>
											
											<?php if($animation_timming_function!=''){?>
												animation-timing-function:<?php echo $animation_timming_function;?>;
												-webkit-animation-timing-function:<?php echo $animation_timming_function;?>;
											<?php }?>
											
											<?php if($animation_delay!=''){?>
												animation-delay:<?php echo $animation_delay;?>;
												-webkit-animation-delay:<?php echo $animation_delay;?>;
											<?php }?>
										}
										
									<?php 
									};
									
									if(($width_small!='' || $width_medium!='' || $width_large!='') && $content_width=='2'){
									?>
									
										.bt-op-item-content <?php echo '.builder-custom-'.$id;?>.bt-op-item-builder[data-content-width="2"] .bt-op-item-builder-content { 
											width:100%;
										}
										
										<?php if($width_small!=''){?>
											@media(min-width:768px) {
												.bt-op-item-content <?php echo '.builder-custom-'.$id;?>.bt-op-item-builder[data-content-width="2"] .bt-op-item-builder-content {
													width:<?php echo $width_small;?>
												}
											}
										<?php }?>
										
										<?php if($width_medium!=''){?>
											@media(min-width:992px) {
												.bt-op-item-content <?php echo '.builder-custom-'.$id;?>.bt-op-item-builder[data-content-width="2"] .bt-op-item-builder-content {
													width:<?php echo $width_medium;?>
												}
											}
										<?php }?>
										
										<?php if($width_large!=''){?>
											@media(min-width:1200px) {
												.bt-op-item-content <?php echo '.builder-custom-'.$id;?>.bt-op-item-builder[data-content-width="2"] .bt-op-item-builder-content {
													width:<?php echo $width_large;?>
												}
											}
										<?php }?>
									
									<?php	
									};
									
									if($padding_tiny!='' || $padding_small!='' || $padding_medium!='' || $padding_large!=''){
									?>												
										<?php if($padding_tiny!=''){?>
											.bt-op-item-content <?php echo '.builder-custom-'.$id;?>.bt-op-item-builder .bt-op-item-builder-content { 
												padding:<?php echo $padding_tiny;?>
											}
										<?php }?>
										
										<?php if($padding_small!=''){?>
											@media(min-width:768px) {
												.bt-op-item-content <?php echo '.builder-custom-'.$id;?>.bt-op-item-builder .bt-op-item-builder-content {
													padding:<?php echo $padding_small;?>
												}
											}
										<?php }?>
										
										<?php if($padding_medium!=''){?>
											@media(min-width:992px) {
												.bt-op-item-content <?php echo '.builder-custom-'.$id;?>.bt-op-item-builder .bt-op-item-builder-content {
													padding:<?php echo $padding_medium;?>
												}
											}
										<?php }?>
										
										<?php if($padding_large!=''){?>
											@media(min-width:1200px) {
												.bt-op-item-content <?php echo '.builder-custom-'.$id;?>.bt-op-item-builder .bt-op-item-builder-content {
													padding:<?php echo $padding_large;?>
												}
											}
										<?php }?>                                                    
									
									<?php	
									};
									?>
								</style>
                                        
                            	<div class="bt-op-item-builder<?php echo ' builder-custom-'.$id;?>" data-content-width="<?php echo $content_width;?>"> 
                                    
                                    <div class="bt-op-item-builder-content">                                                							
                                        <?php                                                                                         															
                                            echo do_shortcode($contents);
                                        ?>
                                    </div>
                                    		
                                </div>
                                
                                <?php 
								if($downmore_button=='yes'){
									if($downmore_button_color!=''){
										?>
                                        <style scoped>
											<?php echo '.scroll-down-'.$id;?>.bt-scroll-down-more > span:before,
											<?php echo '.scroll-down-'.$id;?>.bt-scroll-down-more > span:after {
												background-color:<?php echo $downmore_button_color;?>;
											}
										</style>
                                        <?php
									}
								?>
                                	<div class="bt-scroll-down-more<?php echo ' scroll-down-'.$id;?>">
                                    	<span></span>
                                    </div>
                                <?php }?>
                                
                            </div>	
                        </div>
                        <?php
						break;
					case '1': //Main Navigation
						$awsomeIcon = '';
						
						$fontIconColor = '';
						if($icon_color!=''){
							$fontIconColor = 'style="color:'.$icon_color.'"';
						}
						
						if($item_icon=='font' && $icon_font!='') {
							$awsomeIcon = '<i class="'.$icon_font.' bt-menu-icon" '.$fontIconColor.'></i>';
						}
						$ImgIcon='';
						if($item_icon=='image' && $icon_image!=''){
							$pictureID				= wp_get_attachment_image_src($icon_image, "full");
							if(!is_wp_error($pictureID) && !empty($pictureID)) {
								$ImgIcon 	= '<img src="'.$pictureID[0].'" alt="'.$item_name.'" class="bt-menu-icon">';
							}
						}
						?>
                        <li class="bt-main-menu-item-li">
                        	<a href="#<?php echo $item_name_alias;?>-anchor" data-anchor="#<?php echo $item_name_alias;?>" class="bt-main-navigation-item bt-click-control-navigation">
                            	<span class="bt-item-wrap">
									<?php echo $awsomeIcon;?>
                                    <?php echo $ImgIcon;?>
                                    <span class="bt-item-name"><?php echo $item_name;?></span>  
                                </span>                              
                            </a>
                        </li>
                        <?php
						break;
					case '2': // Subnavigation
						$awsomeIcon = '';
						if($item_icon=='font' && $icon_font!='') {
							$awsomeIcon = '<i class="'.$icon_font.' bt-menu-icon"></i>';
						}
						$ImgIcon='';
						if($item_icon=='image' && $icon_image!=''){
							$pictureID				= wp_get_attachment_image_src($icon_image, "full");
							if(!is_wp_error($pictureID) && !empty($pictureID)) {
								$ImgIcon 	= '<img src="'.$pictureID[0].'" alt="'.$item_name.'" class="bt-menu-icon">';
							}
						}	
						?>
                        <div class="bt-sub-navigation-item-cto">
                            <a href="#<?php echo $item_name_alias;?>-anchor" data-anchor="#<?php echo $item_name_alias;?>" class="bt-sub-navigation-item bt-click-control-navigation">
                            	<?php echo $awsomeIcon;?>
                                <?php echo $ImgIcon;?>
                                <div class="bt-sub-tooltip"> 
                                	<?php echo $awsomeIcon;?>
                                    <?php echo $ImgIcon;?>                                    
                                    <span><?php echo $item_name;?></span>
                                </div>
                            </a>
                        </div>
                        <?php
						break;
					default:
						break;		
				}
			$output_string = ob_get_contents();
			ob_end_clean();
			return $output_string;
		}
		//item
		
		//Custom Menu
		function op_custom_menu_shortcode($params){
			extract(
				shortcode_atts(
					array(
						'nav_menu'							=>'', //done
						'nav_menu_style'					=>'', //done
						'dropdown_location'					=>'', //done
						'ext_class'							=>'', //done											
					), 
					$params
				)
			);
			
			$nav_menu					= (isset($params['nav_menu'])&&trim($params['nav_menu'])!=''&&is_numeric(trim($params['nav_menu'])))?trim($params['nav_menu']):'';
			$nav_menu_style				= (isset($params['nav_menu_style'])&&trim($params['nav_menu_style'])!=''&&is_numeric(trim($params['nav_menu_style'])))?trim($params['nav_menu_style']):'0';
			$dropdown_location			= (isset($params['dropdown_location'])&&trim($params['dropdown_location'])!=''&&is_numeric(trim($params['dropdown_location'])))?trim($params['dropdown_location']):'0';
			$ext_class					= (isset($params['ext_class'])&&trim($params['ext_class'])!='')?trim($params['ext_class']):'';
			
			global $bt_item_buildMenu;
			ob_start();
				switch($bt_item_buildMenu){
					case '1': //Main Navigation
						$objectTermMenu = wp_get_nav_menu_object($nav_menu);
						if(!is_wp_error($objectTermMenu) && !empty($objectTermMenu)){
							switch($nav_menu_style){
								case '0':
									$classLocation = '';
									if($dropdown_location=='1'){
										$classLocation = 'bt-menu-location-left';
									}
									if(class_exists('JawMenuFrontend')){
										remove_filter('wp_nav_menu_args', array('JawMenuFrontend', 'editMenuArgs'));	
									}
									wp_nav_menu(
										array(
											'menu' 			=> $nav_menu,
											'menu_class'    => 'opmenu',
											'container' 	=> '',
											'items_wrap' 	=> '%3$s',
											'before'   		=> '<div class="op-menu-location '.$classLocation.'">',
											'after'    		=> '</div>',
											'link_before'   => '<span class="bt-item-wrap">',
											'link_after'    => '</span>',
										)
									);
									break;
								case '1':
									break;
								case '2':
									break;		
							}							
						};
					break;
					
					default:
						break;	
				}
			$output_string = ob_get_contents();
			ob_end_clean();
			return $output_string;
		}
		//Custom Menu
		
		/*ROW*/
		function op_row_shortcode($params, $contents=''){
			$css='';
			
			extract(
				shortcode_atts(
					array(			
						'mobile_mode_width'			=>'', //Done			
						'ext_class'					=>'', //Done
						'css'						=>'', //Done							
					), 
					$params
				)				
			);							
			
			$mobile_mode_width				= (isset($params['mobile_mode_width'])&&trim($params['mobile_mode_width'])!=''&&is_numeric(trim($params['mobile_mode_width'])))?trim($params['mobile_mode_width']):'';
			$ext_class						= (isset($params['ext_class'])&&trim($params['ext_class'])!='')?trim($params['ext_class']):'';				
			
			$css_class 						= apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '), 'op_custom_row', $params);
			
			$rand_ID						= rand(1, 9999);
			$id                     		= OP_BETE_PREFIX.$rand_ID;
			
			ob_start();
			?>
            	<?php
				if($mobile_mode_width!=''){
					echo '	<style scoped>
								@media(max-width:'.$mobile_mode_width.'px){
									#'.$id.' .op-custom-column[data-width="1"],
									#'.$id.' .op-custom-column[data-width="2"],
									#'.$id.' .op-custom-column[data-width="3"],
									#'.$id.' .op-custom-column[data-width="4"],
									#'.$id.' .op-custom-column[data-width="5"],
									#'.$id.' .op-custom-column[data-width="6"],
									#'.$id.' .op-custom-column[data-width="7"],
									#'.$id.' .op-custom-column[data-width="8"],
									#'.$id.' .op-custom-column[data-width="9"],
									#'.$id.' .op-custom-column[data-width="10"],
									#'.$id.' .op-custom-column[data-width="11"],
									#'.$id.' .op-custom-column[data-width="12"]{width:100%;}
								}
							</style>';
				};		
				?>
				<div class="op-custom-row<?php echo ' '.$ext_class.' '.$css_class;?>" id="<?php echo $id;?>">
					<?php echo do_shortcode($contents);?>
				</div>
			<?php	
			$output_string = ob_get_contents();
			ob_end_clean();
			return $output_string;				
		}
		/*ROW*/
		
		/*Colums*/
		function op_column_shortcode($params, $contents=''){
			$css='';
			
			extract(
				shortcode_atts(
					array(						
						'c_width'					=>'', //Done
						'css'						=>'', //Done							
					), 
					$params
				)				
			);							
			
			$c_width						= (isset($params['c_width'])&&trim($params['c_width'])!=''&&is_numeric(trim($params['c_width'])))?trim($params['c_width']):'1';
			$css_class 						= apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '), 'op_custom_column', $params);				
			
			ob_start();
			?>
				<div class="op-custom-column <?php echo $css_class;?>" data-width="<?php echo $c_width;?>">
					<?php echo do_shortcode($contents);?>
				</div>
			<?php	
			$output_string = ob_get_contents();
			ob_end_clean();
			return $output_string;				
		}
		/*Colums*/
		
		public function __construct() {	
			add_shortcode('op_container', array($this, 'op_container_shortcode'));
			add_shortcode('op_item', array($this, 'op_item_shortcode'));
			add_shortcode('op_custom_menu', array($this, 'op_custom_menu_shortcode'));
			add_shortcode('op_custom_row', array($this, 'op_row_shortcode'));
			add_shortcode('op_custom_column', array($this, 'op_column_shortcode'));
		}
	}
	
	global $op_shortcode_builder;
	if(!$op_shortcode_builder){
		$op_shortcode_builder = new op_shortcode_builder();
	}
}