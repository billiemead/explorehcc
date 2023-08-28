;(function($){
		
	$.fn.parallaxBackgroundFinal = function (options){
		var $itemParallax = $(this);
		var param_speed = options.speed;
		
		function setUpdate() {
			
			$itemParallax.each(function(index, element) {				
				var $this=$(this);
				
				if(window.innerWidth<=1024){
					$this.addClass('removeParallax');
					return;
				}else{
					if($this.hasClass('removeParallax')){
						$this.removeClass('removeParallax');
					}
				}
				
				var speed = param_speed;
				var elmsPos = $(window).scrollTop();				
				
				var elmsTop, elmsHeight;
				//if(checkIeSafari()){ 
					elmsTop = $this.parent().offset().top;
					elmsHeight = $this.parent().outerHeight();
				//}else{
					//elmsTop = $this.parent().offset().top;
					//elmsHeight = $this.parent().outerHeight();
				//};
				
				var scrollPos;
				if($.browser.mozilla){
					scrollPos = Math.round((elmsPos-elmsTop)*speed);
				}else{
					scrollPos = Math.round((elmsTop-elmsPos)*speed);
				}
				
											
				if(elmsPos >= (elmsTop-window.innerHeight) && elmsPos<(elmsTop+elmsHeight)){
					if(checkIeSafari()) {
						$this.css({"background-position":"50% "+ scrollPos +"px"});
					}else{						
						$this.transition({ 'y':scrollPos+"px"},0);
					};
				};	
			});			
		};
		
		window.addEventListener('scroll', function(){ 
			requestAnimationFrame(setUpdate); 
		}, false);
		$(window).on('resize.parallaxBackground', function(){
			setUpdate();
		});
		
		setTimeout(setUpdate,100);
		
	};
		
	$.fn.elemVisible = function(partial) {
		var $t            	= $(this),
		$w            		= $(window),
		viewTop       		= $w.scrollTop(),
		viewBottom    		= viewTop + $w.height(),
		_top          		= $t.offset().top,
		_bottom       		= _top + $t.height(),
		compareTop    		= partial === true ? _bottom : _top,
		compareBottom 		= partial === true ? _top : _bottom;		
		return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
	};
	
	$.fn.smart_one_page = function(options){
		var $this = $(this);
		
		$('.bt-sub-navigation-item-cto', $this).each(function(index, element) {
           $('.bt-click-control-navigation', $(this)).attr('data-index', index+1);
        });
		$('.bt-main-menu-item-li', $this).each(function(index, element) {
            $('.bt-click-control-navigation', $(this)).attr('data-index', index+1);
        });
		$('.bt-op-item', $this).each(function(index, element) {
            $(this).attr('data-index-item', index+1);
        });
		
		var $op_item = $('.bt-op-item', $this);
		var $op_sub_nav = $('.bt-sub-navigation', $this);		
		var timeOutRemoveClass = null;
		var timeScroll = 1000;
		if(isNumber($this.attr('data-scroll-speed'))){
			timeScroll=parseFloat($this.attr('data-scroll-speed'));
		};
		
		var offsetActive = window.innerHeight / 10;
		
		var $snav_behavior = $this.attr('data-snav-behavior'),
			$scroll_effect = $this.attr('data-scroll-effect'),
			$checkFullPageJs = $this.attr('data-fullscreen-scroll');
			
		if(typeof $scroll_effect == 'undefined' || $scroll_effect=='' || $scroll_effect == null) {$scroll_effect='linear';};	
		
		//Set Last-child Main Menu Class
		$('.bt-main-menu-item-li', $this).each(function(index, element) {
            if(index==($('.bt-main-menu-item-li', $this).length-1)){
				$(this).addClass('bt-menu-last-child');
			};
        });
		
		//Set Class Active
		function setElementActive(sRemoveClass, sAddClass, addClick){
			sRemoveClass.removeClass('bt-active bt-visible bt-click');			
			if(addClick){
				sAddClass.addClass('bt-active bt-click');
			}else{
				sAddClass.addClass('bt-active bt-visible');
			};
		};
		
		//Check last-child element
		function checkBottomOPElem(){
			var $w = $(window);
			var $d = $(document);
			
			if($w.scrollTop() + $w.height() == $d.height() && $this.elemVisible(true)){
				return true;
			}else{
				return false;
			}
		}
		
		function setLastChildItemActive(){			
			if(checkBottomOPElem()){
				if($('.bt-op-item:last-child', $this).height()<window.innerHeight){
					setElementActive($('.bt-sub-navigation-item', $op_sub_nav), $('.bt-sub-navigation-item-cto:last-child .bt-sub-navigation-item', $op_sub_nav), false);
				}else{
					setElementActive($('.bt-sub-navigation-item', $op_sub_nav), $('.bt-sub-navigation-item-cto:last-child .bt-sub-navigation-item', $op_sub_nav), true);
				};				
				setElementActive($('.bt-main-navigation-item', $this), $('li.bt-menu-last-child .bt-main-navigation-item', $this), true);				
			};
		};
		
		//Fixed Sub Navigation
		function setFixedSubNAV(){			
			
			var $w = $(window);			
			if(($w.scrollTop() >= ($('.bt-op-items' ,$this).offset().top-offsetActive)) && ($w.scrollTop()<=($('.bt-op-items' ,$this).offset().top+$('.bt-op-items', $this).height()-offsetActive))){
				if($snav_behavior!='0'){return false;};
				$op_sub_nav.removeClass('bt-sub-behavior-0');				
			}else{
				if(!$this.hasClass('not-scroll-check')) {
					$('.bt-click-control-navigation', $this).removeClass('bt-active bt-visible bt-click');
				};
				
				if($snav_behavior!='0'){return false;};
				$op_sub_nav.addClass('bt-sub-behavior-0');				
			};
		};
		
		function setAnimation(elem, animation){
			if(elem.hasClass('animated')) {return false;};
			elem.addClass('animated '+animation);
		};
		
		function setHeightHeader(){
			if(window.innerWidth > 1024) {$this.removeClass('bt-open-true');};
			var $contentHeight = $('.bt-menu-control-sticky', $this).height();
			$('.bt-op-header', $this).height($contentHeight);
		};
		
		var	$mnav_sticky = $this.attr('data-mnav-sticky'),
			$mnav_sticky_behavior = $this.attr('data-mnav-sticky-behavior');
			
		
		/*scroll Up & down / Sticky Menu*/
		function scrollFunc(e) {
			
			var $navControl = $('.bt-op-header', $this),
				$hamburgerMenu = $('.bt-hamburger-menu', $this);
				
			var adminbarHeight = 0;				
			if($('#wpadminbar').length > 0){
				adminbarHeight = $('#wpadminbar').height();
			}
			
			if($(window).scrollTop() >= (adminbarHeight) && window.innerWidth<=600){
				$navControl.addClass('fix-adminbar');
				$hamburgerMenu.addClass('fix-adminbar');					
			}else{
				$navControl.removeClass('fix-adminbar');
				$hamburgerMenu.removeClass('fix-adminbar');
			};
			
			if($mnav_sticky!='yes'){ return; };
			
			if($mnav_sticky_behavior=='0'){
				var $itemFirstchild = $('.bt-op-items .bt-op-item:first-child', $this);
				if($(window).scrollTop() >= (($itemFirstchild.offset().top) + $itemFirstchild.height() - offsetActive)){
					$navControl.addClass('bt-show-sticky');
				}else{
					$navControl.removeClass('bt-show-sticky');
				}
			}
			
			if($mnav_sticky_behavior=='3'){
				var $itemSecondchild = $('.bt-op-items .bt-op-item:nth-child(2)', $this);
				if($(window).scrollTop() >= (($itemSecondchild.offset().top) + $itemSecondchild.height() - offsetActive)){
					$navControl.addClass('bt-show-sticky');
				}else{
					$navControl.removeClass('bt-show-sticky');
				}
			}
			
			if($mnav_sticky_behavior=='2'){
				if($(window).scrollTop() > ($navControl.offset().top + 5) ){
					$navControl.addClass('bt-show-sticky');
				}else{
					$navControl.removeClass('bt-show-sticky');
				}
				
			}
			
			if($mnav_sticky_behavior=='1'){
										
				if ( typeof scrollFunc.x == 'undefined' ) {
					scrollFunc.x=window.pageXOffset;
					scrollFunc.y=window.pageYOffset;
				};
				
				var diffX=scrollFunc.x-window.pageXOffset;
				var diffY=scrollFunc.y-window.pageYOffset;
			
				if(diffX<0) {
					// Scroll right
				}else if( diffX>0 ) {
					// Scroll left
				}else if( diffY<0 ) {
					// Scroll down				
					/*sticky menu*/
						$navControl.removeClass('bt-show-sticky');
						if($(window).scrollTop() >= (($navControl.offset().top) + $navControl.find('.bt-menu-control-sticky').height()) ) {
							$navControl.addClass('bt-set-sticky');
						}
					/*sticky menu*/
					
				}else if( diffY>0 ) {
					// Scroll up				
					/*sticky menu*/	
						if($(window).scrollTop() > $navControl.offset().top+2) {
							$navControl.addClass('bt-show-sticky bt-animate-sticky');
						}else{
							$navControl.removeClass('bt-set-sticky bt-show-sticky bt-animate-sticky');
						}
					/*sticky menu*/
					
				}else {
					// First scroll event
				}
				scrollFunc.x=window.pageXOffset;
				scrollFunc.y=window.pageYOffset;
				
				if(!$navControl.hasClass('bt-set-sticky') && ($(window).scrollTop() > $navControl.find('.bt-menu-control-sticky').height()) ){					
					$navControl.addClass('bt-set-sticky');
				}
			};
			
		};
		/*scroll Up & down*/
		
		//Waypoint Scroll		
		function createWaypoint(){
				
			$op_item.each(function(index, element) {
				var $this_item = $(this);
				var $this_item_id = $this_item.attr('id');
				
				var $animation_name = $this_item.attr('data-animation-name');
				var $itemAnimation = $('.bt-op-item-builder-content', $this_item);
				
				if(typeof $animation_name == 'undefined' || $animation_name=='' || $animation_name ==null){$animation_name='';};
				if($animation_name!=''){
					$(window).on('scroll', function(){
						if($this_item.elemVisible(true)){
							setAnimation($($itemAnimation), $animation_name);
						}
					});
				};
				
				$this_item.SOP_waypoint(
				
					function(direction){					
						if($this.hasClass('not-scroll-check') || checkBottomOPElem()) { return false;};					
						//var $this_item_id = this.element.id;
						
						if (direction === 'down') {
							setElementActive($('.bt-click-control-navigation', $this), $('a[href="#'+$this_item_id+'"].bt-click-control-navigation', $this), false);	
							//console.log(offsetActive);						
						}							
					},				
					{	
						offset:(offsetActive),
					}
					
				);
				
				$this_item.SOP_waypoint(
				
					function(direction){					
						if($this.hasClass('not-scroll-check') || checkBottomOPElem()) { return false;};					
						//var $this_item_id = this.element.id;
						
						if (direction === 'up') {
							setElementActive($('.bt-click-control-navigation', $this), $('a[href="#'+$this_item_id+'"].bt-click-control-navigation', $this), false);
							//console.log(offsetActive);
						}
					},
					{	
						//offset:'bottom-in-view', 
						offset:(-$(this).height()+offsetActive),
					}
					
				);
			});	
		
		};
		
		//Parallax
		$('.bt-background-parallax-content', $this).parallaxBackgroundFinal({speed:0.32});//0.32
		
		//HTML Background Video
		if(!navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){
			setTimeout(function(){	
				if($('.html5-background-vd', $this).length>0){					
					$('.html5-background-vd', $this).each(function(index, element) {
						$(this).extCallVide();
					});	
				};
				
				if($('.youtube-background-vd', $this).length>0){
					$('.youtube-background-vd', $this).each(function(index, element) {
						$(this).YTPlayer();
					});	
				};
			},368);
		};		
		
		//Particle background
		if($('.canvas-particleground', $this).length>0){
			$('.canvas-particleground', $this).each(function(index, element) {
				var $this = $(this);
				
				$minspeedx = $this.attr('data-minspeedx');
				$maxspeedx = $this.attr('data-maxspeedx');
				$minspeedy = $this.attr('data-minspeedy');
				$maxspeedy = $this.attr('data-maxspeedy');
				$directionx = $this.attr('data-directionx');
				$directiony = $this.attr('data-directiony');
				$density = $this.attr('data-density');
				$dotcolor = $this.attr('data-dotcolor');
				$linecolor = $this.attr('data-linecolor');
				$particleradius = $this.attr('data-particleradius');
				$linewidth = $this.attr('data-linewidth');
				$curvedlines = $this.attr('data-curvedlines');
				$proximity = $this.attr('data-proximity');
				
				$this.particleground({
					minSpeedX:(isNumber($minspeedx)?parseFloat($minspeedx):0.1),
					maxSpeedX:(isNumber($maxspeedx)?parseFloat($maxspeedx):0.7),
					minSpeedY:(isNumber($minspeedy)?parseFloat($minspeedy):0.1),
					maxSpeedY:(isNumber($maxspeedy)?parseFloat($maxspeedy):0.7),
					directionX:($directionx!=''?$directionx:'center'),
					directionY:($directiony!=''?$directiony:'center'),
					density:(isNumber($density)?parseFloat($density):10000),
					dotColor:($dotcolor!=''?$dotcolor:'#666666'),
					lineColor:($linecolor!=''?$linecolor:'#666666'),
					particleRadius:(isNumber($particleradius)?parseFloat($particleradius):7),
					lineWidth:(isNumber($linewidth)?parseFloat($linewidth):1),
					curvedLines:($curvedlines!='yes'?false:true),
					proximity:(isNumber($proximity)?parseFloat($proximity):100),				
					parallax:false,
				});
			});	
		};
		
		$('ul.bt-op-nav-items > li.menu-item-has-children:not(.bt-main-menu-item-li)', $this).append('<span class="open-submenu-mobile"><i class="fa fa-angle-down"></i></span>');
		$('ul.bt-op-nav-items > li.menu-item-has-children:not(.bt-main-menu-item-li) > .open-submenu-mobile', $this).on('click', function(){
			$(this).toggleClass('bt-rotate');
			$(this).parent().children('.sub-menu').slideToggle();
		});
		
		$('ul.bt-hamburger-menu-items > li.menu-item-has-children:not(.bt-main-menu-item-li)', $this).append('<span class="open-submenu-mobile"><i class="fa fa-angle-down"></i></span>');
		$('ul.bt-hamburger-menu-items > li.menu-item-has-children:not(.bt-main-menu-item-li) > .open-submenu-mobile', $this).on('click', function(){
			$(this).toggleClass('bt-rotate');
			$(this).parent().children('.sub-menu').slideToggle();
		});
		
		//Open Menu Mobile
		$('.bt-op-main-nav-mobile > a', $this).on('click', function(){
			$this.toggleClass('bt-open-true');			
		});
		
		//Open Hamburger Menu
		$('.bt-hamburger-menu-open > a', $this).on('click', function(){
			$this.toggleClass('bt-hamburger-open');			
		});
		
		$('.bt-hamburger-menu-close', $this).on('click', function(){
			$this.toggleClass('bt-hamburger-open');			
		});
		
		//Full Screen Mode
		$('.bt_fullscreenmode', $this).on('click', function(){
			
			var $this_fullscreen = $(this);
			if(screenfull.isEnabled){				
				screenfull.toggle();				
				document.addEventListener(screenfull.raw.fullscreenchange, function () {
					if(screenfull.isFullscreen){
						$this_fullscreen.addClass('bt_allowoverflowtrue');
					}else{
						$this_fullscreen.removeClass('bt_allowoverflowtrue');
					}
				});
			};
		});
		
		/*Create*/
			setHeightHeader();
			
			setFixedSubNAV();
			setLastChildItemActive();
			scrollFunc();			
			createWaypoint();
			
			$(window).scrollTop(0);
			
			//fullpage
				/*animation for full page*/
				function animationFullPage(index_item){
					var $this_fp_next_item = $('.bt-op-item[data-index-item="'+(index_item)+'"]', $this);							
					var $animation_name = $this_fp_next_item.attr('data-animation-name');
					var $itemAnimation = $('.bt-op-item-builder-content', $this_fp_next_item);							
					if(typeof $animation_name == 'undefined' || $animation_name=='' || $animation_name ==null){$animation_name='';};
					if($animation_name!=''){
						setAnimation($($itemAnimation), $animation_name);
					};
					
					//Fix animation for VC
					if($this_fp_next_item.find('.wpb_animate_when_almost_visible').length>0){
						$('.wpb_animate_when_almost_visible', $this_fp_next_item).each(function(index, element) {
                            if(!$(this).hasClass('wpb_start_animation')){
								$(this).addClass('wpb_start_animation');
							};	
                        });							
					} ;
					//Fix animation for VC
				};
				/*animation for full page*/
				
				var AnimationCheckFullPage = 0;
				if($checkFullPageJs=='yes'){
					$('.bt-op-items', $this).fullpage({
						sectionSelector: '.bt-op-item',
						scrollBar: ($this.attr('data-fp-scrollbar')=='yes')?true:false,
						easing: $scroll_effect,
						scrollingSpeed: (timeScroll+100),
						loopBottom: ($this.attr('data-fp-loopbottom')=='yes')?true:false,
						loopTop: ($this.attr('data-fp-looptop')=='yes')?true:false,
						scrollOverflow:true,
						css3:($this.attr('data-fp-css3')=='yes')?true:false,
						afterLoad: function(anchorLink, index){
							
							/*animation for full page*/
								animationFullPage(index);
							/*animation for full page*/
						
							if(AnimationCheckFullPage==1){return;}
							setElementActive($('.bt-click-control-navigation', $this), $('[data-index="'+(index)+'"].bt-click-control-navigation', $this), false);
							AnimationCheckFullPage=1;							
						},
						onLeave: function(index, nextIndex, direction){		
							
							/*animation for full page*/
								//animationFullPage(nextIndex);
							/*animation for full page*/
																
							setElementActive($('.bt-click-control-navigation', $this), $('[data-index="'+(nextIndex)+'"].bt-click-control-navigation', $this), false);
							
							var $navControl_full = $('.bt-op-header', $this);
							
							if($mnav_sticky_behavior=='0' && $this.attr('data-fp-scrollbar')!='yes'){								
								if(direction=='down' && (nextIndex-1)>0){
									$navControl_full.addClass('bt-show-sticky');
								}else{
									$navControl_full.removeClass('bt-show-sticky');
								}
							};
							
							if($mnav_sticky_behavior=='3' && $this.attr('data-fp-scrollbar')!='yes'){
								if(direction=='down' && (nextIndex-1)>1){
									$navControl_full.addClass('bt-show-sticky');
								}else if(direction=='up' && (nextIndex-1)<2){
									$navControl_full.removeClass('bt-show-sticky');
								}
							};
							
							if($mnav_sticky_behavior=='1' && $this.attr('data-fp-scrollbar')!='yes'){										
								if(direction=='down' && (nextIndex-1)>0){
									$navControl_full.removeClass('bt-show-sticky');										
									$navControl_full.addClass('bt-set-sticky');
								}else if(direction=='up'){									
									if((nextIndex-1)>0) {
										$navControl_full.addClass('bt-show-sticky bt-animate-sticky');
									}else{
										$navControl_full.removeClass('bt-set-sticky bt-show-sticky bt-animate-sticky');
									}
								};
							};
						},
					});				
				};				
			//fullpage
			
			//recalculator waypoint
			function waypointRecal(){
				SOP_Waypoint.destroyAll(); // fix basic function name
				createWaypoint();
				console.log('recal-waypoint');
			};		
			
			var $op_default_height = $this.height();
			var ___df_width = $(window).width();			
			
			$(window)
			
			.on('scroll', function(){
				setFixedSubNAV();			
				setLastChildItemActive();
				scrollFunc();
				
				if($op_default_height==$this.height()){
					return;
				};
				$op_default_height = $this.height();
				waypointRecal();
				if($checkFullPageJs=='yes'){
					$.fn.fullpage.reBuild();
				};
			})			
			
			.on('resize', function(){				
				if($(window).width()==___df_width){return};
				setHeightHeader();					
				offsetActive = window.innerHeight / 10;		
				setFixedSubNAV();			
				setLastChildItemActive();
				scrollFunc();
							
				waypointRecal();
				if($checkFullPageJs=='yes'){
					$.fn.fullpage.reBuild();
				};
				
				___df_width = $(window).width();
			})
			
			.on('load', function(){
				setHeightHeader();
				waypointRecal();
				if($checkFullPageJs=='yes'){
					$.fn.fullpage.reBuild();
				};
				
				if($('.bt-op-loading').length>0){
					$('.bt-op-loading').fadeOut(666);
				};
				
				if(window.location.hash){
					if($('[data-anchor="'+(window.location.hash)+'"]', $this).length>0){									
						$.fn.fullpage.moveTo($('[data-anchor="'+(window.location.hash)+'"]', $this).attr('data-index'));										
						setElementActive($('.bt-click-control-navigation', $this), $('[data-anchor="'+(window.location.hash)+'"].bt-click-control-navigation', $this), false);
					};
				};
			});				
			
		/*Create*/	
		
		$('.bt-click-control-navigation', $this).off('click.gotoElementIndex').on('click.gotoElementIndex', function(){			
			var $this_item_nav_dot = $(this);
			var $checkIDitem = $this_item_nav_dot.attr('href');
			var clickAnimate = true;
			if($this_item_nav_dot.hasClass('bt-main-navigation-item')){
				clickAnimate=false;
			};
			
			if($checkFullPageJs=='yes'){
				$.fn.fullpage.moveTo($this_item_nav_dot.attr('data-index'));
				setElementActive($('.bt-click-control-navigation', $this), $('a[href="'+$checkIDitem+'"].bt-click-control-navigation', $this), clickAnimate);
			}else{
								
				$this.addClass('not-scroll-check');				
				setElementActive($('.bt-click-control-navigation', $this), $('a[href="'+$checkIDitem+'"].bt-click-control-navigation', $this), clickAnimate);
				
				if($mnav_sticky=='yes' && $mnav_sticky_behavior!='1'){
					var adminbarHeight = 0;				
					if($('#wpadminbar').length > 0){
						adminbarHeight = $('#wpadminbar').height();
					}
					$('html, body').stop().animate({scrollTop:($($checkIDitem).offset().top-$('.bt-op-header .bt-menu-control-sticky', $this).height()-adminbarHeight)}, {duration:timeScroll, easing:$scroll_effect}, function(){});
				}else{
					$('html, body').stop().animate({scrollTop:$($checkIDitem).offset().top}, {duration:timeScroll, easing:$scroll_effect}, function(){});
				}
				
				if(timeOutRemoveClass!=null) {clearTimeout(timeOutRemoveClass);};
				timeOutRemoveClass = setTimeout(function(){
					$this.removeClass('not-scroll-check');
				}, (timeScroll+100));
			};
					
			$this.removeClass('bt-open-true bt-hamburger-open');
			return false;
		});
		
		//scroll down more
		$('.bt-scroll-down-more', $this).on('click', function(){
			var $__parent = $(this).parents('.bt-op-item');
			if($checkFullPageJs=='yes'){
				$.fn.fullpage.moveTo( (parseFloat($__parent.attr('data-index-item'))+1) );
			}else{	
				$('html, body').stop().animate({scrollTop:($__parent.offset().top+$__parent.height())}, {duration:timeScroll, easing:$scroll_effect}, function(){});
			}
		});
	};
		
	$(document).ready(function(e) {		
        $('.smart-one-page').each(function(index, element) {
            $(this).smart_one_page({op_index:index});
        });
    });
}(jQuery));