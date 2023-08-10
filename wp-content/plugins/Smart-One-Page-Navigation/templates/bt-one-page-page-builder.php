<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes();?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes();?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
    <head>    	
        <meta charset="<?php bloginfo('charset');?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title('|', true, 'right'); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url');?>">
        <?php wp_head();?>
        
        <?php 
			$smartOP_bodyClass='';
			$smartOP_bodyData='';
			$smartOP_bodyScriptInline='';
			$smartOP_bodyCSSInline='';
			$smartOP_theme_name = wp_get_theme();		
			if(!is_wp_error($smartOP_theme_name)&&!empty($smartOP_theme_name)&&strtolower($smartOP_theme_name)=='salient'){
				$smartOP_bodyData='data-smooth-scrolling="1"';
				$smartOP_bodyScriptInline='<script>;(function($){$.fn.niceScroll=function(){};}(jQuery));</script>';
				$smartOP_bodyCSSInline='<style type="text/css">body[data-smooth-scrolling="1"]{padding-right:0 !important;}</style>';
			}
			echo $smartOP_bodyCSSInline;
		?>
    </head>    
    <body <?php body_class('bt-one-page-body');?> <?php echo $smartOP_bodyData;?>>
    	<header style="display:none !important;" id="jaw-header-menu"><div class="bottom_header"></div></header>
    	<div id="content" class="container td-header-menu-wrap-full td-header-menu-wrap" style="height:0 !important; overflow:hidden; width:0 !important; max-width:0 !important; min-width:0 !important; padding:0 !important;">
        	<div class="container" style="height:0 !important; overflow:hidden; width:0 !important;">
        	</div>
        </div>
    	<div class="bt-one-page-wrapper">
        	<div class="bt-one-page-wrapper-content">
				<?php 
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile;
                ?>                
            </div>
        </div>
        <?php 
		wp_footer();
		echo $smartOP_bodyScriptInline;
		?>
    </body>
</html>