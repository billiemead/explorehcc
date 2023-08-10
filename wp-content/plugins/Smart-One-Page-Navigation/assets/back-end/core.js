function opCustomCallbackColumns(){
	var $ = jQuery;
	$columns = $( '.wpb_vc_param_value[name=c_width]', this.$content );
	var sourceModelID = this.model.id;
	var $elementChangeWidth = $('[data-model-id="'+(sourceModelID)+'"][data-element_type="op_custom_column"]');
	
	var $buttonClose = this.$content.parents('.vc_ui-panel-window-inner').find('[data-vc-ui-element="button-close"]');
	var $buttonSave = this.$content.parents('.vc_ui-panel-window-inner').find('[data-vc-ui-element="button-save"]');
	
	var defaultValue = $columns.val();
	
	function setColumnsChange(objectElms, valDefault) {
		
		if($elementChangeWidth.length==0) {
			return;
		}
		
		$elementChangeWidth.removeClass(
			'col-extend col-extend-md-1 col-extend-md-2 col-extend-md-3 col-extend-md-4 col-extend-md-5 col-extend-md-6 col-extend-md-7 col-extend-md-8 col-extend-md-9 col-extend-md-10 col-extend-md-11 col-extend-md-12'
		);
		
		var $this = objectElms;
		var strVal = '';
		if($this!='') {
			strVal=$this.val();
		}else{
			strVal=valDefault;
		};		
		switch(strVal){
			case '1':
				$elementChangeWidth.addClass('col-extend col-extend-md-1');
				break;
			case '2':
				$elementChangeWidth.addClass('col-extend col-extend-md-2');
				break;
			case '3':
				$elementChangeWidth.addClass('col-extend col-extend-md-3');
				break;
			case '4':
				$elementChangeWidth.addClass('col-extend col-extend-md-4');
				break;
			case '5':
				$elementChangeWidth.addClass('col-extend col-extend-md-5');
				break;
			case '6':
				$elementChangeWidth.addClass('col-extend col-extend-md-6');
				break;
			case '7':
				$elementChangeWidth.addClass('col-extend col-extend-md-7');
				break;
			case '8':
				$elementChangeWidth.addClass('col-extend col-extend-md-8');
				break;
			case '9':
				$elementChangeWidth.addClass('col-extend col-extend-md-9');
				break;
			case '10':
				$elementChangeWidth.addClass('col-extend col-extend-md-10');
				break;
			case '11':
				$elementChangeWidth.addClass('col-extend col-extend-md-11');
				break;
			case '12':
				$elementChangeWidth.addClass('col-extend col-extend-md-12');
				break;							
			default:
				break;					
		}
	}
	
	$columns.change( function(){		
		setColumnsChange($(this),'');			
	})
	.trigger('change');
	
	$buttonClose.on('click', function(){
		if(defaultValue!=$columns.val()) {
			//check value, restore default
			setColumnsChange('', defaultValue);
		}
	});
	
	$buttonSave.on('click', function(){
		//check value, set new default
		defaultValue = $columns.val();
	});
};
(function($){	
	function initColumns_1(elems) {
		elems.each(function(index, element) {
			var $this = $(this);
			var dataModelID = $this.attr('data-model-id');
			var $elementChangeWidth = $('[data-model-id="'+(dataModelID)+'"][data-element_type="op_custom_column"]');
			
			var $itemWidth = $this.find('.admin_label_c_width');
			var itemWidthString = $itemWidth.text();
			
			if(itemWidthString!='') {
				if(itemWidthString.indexOf("01/12")>0) {
					$elementChangeWidth.addClass('col-extend col-extend-md-1');
				}else if(itemWidthString.indexOf("02/12")>0){
					$elementChangeWidth.addClass('col-extend col-extend-md-2');
				}else if(itemWidthString.indexOf("03/12")>0){
					$elementChangeWidth.addClass('col-extend col-extend-md-3');
				}else if(itemWidthString.indexOf("04/12")>0){
					$elementChangeWidth.addClass('col-extend col-extend-md-4');
				}else if(itemWidthString.indexOf("05/12")>0){
					$elementChangeWidth.addClass('col-extend col-extend-md-5');
				}else if(itemWidthString.indexOf("06/12")>0){
					$elementChangeWidth.addClass('col-extend col-extend-md-6');
				}else if(itemWidthString.indexOf("07/12")>0){
					$elementChangeWidth.addClass('col-extend col-extend-md-7');
				}else if(itemWidthString.indexOf("08/12")>0){
					$elementChangeWidth.addClass('col-extend col-extend-md-8');
				}else if(itemWidthString.indexOf("09/12")>0){
					$elementChangeWidth.addClass('col-extend col-extend-md-9');
				}else if(itemWidthString.indexOf("10/12")>0){
					$elementChangeWidth.addClass('col-extend col-extend-md-10');
				}else if(itemWidthString.indexOf("11/12")>0){
					$elementChangeWidth.addClass('col-extend col-extend-md-11');
				}else if(itemWidthString.indexOf("12/12")>0){
					$elementChangeWidth.addClass('col-extend col-extend-md-12');
				}
			};			
		});
	};
	$(document).ready(function(e) {
		/*$('[data-element_type="op_custom_row"] .vc_control.column_clone').live('click', function(){
			setTimeout(function() {
				initColumns_1($('[data-element_type="op_custom_column"]:not(.col-extend)'));
			},200);
		});*/
		$('body').on('click', '[data-element_type="ps_custom_row"] .vc_control.column_clone', function(){
			setTimeout(function() {
				initColumns($('[data-element_type="ps_custom_column"]:not(.col-extend)'));
			},200);
		});
        $(window).on('load', function(){
			setTimeout(function() {
				initColumns_1($('[data-element_type="op_custom_column"]'));
			},100);
		});
    });

	$('.sample-data-ins-op').off('.sample-data-click-op').on('click.sample-data-click-op', function(){
		var $this = $(this);
		$this.addClass('disable-button');
		$('#loading-import-sample-data').addClass('active-sample');	
		
		console.log('Process...');
		var $newParamsRequest = {'addsample':'yes', action:'op_bete_setupsampledata'};
		var $ajaxGetpost = $this.attr('data-url-ajax');
		$.ajax({
			url:		$ajaxGetpost,						
			type: 		'POST',
			data:		$newParamsRequest,
			dataType: 	'html',
			cache:		false,
			success: 	function(data){
				$('#link-to-newpageconfig .tc-information').append(data);
				console.log('Done...');
				setTimeout(function(){
					$('.tc-information').addClass('active-infor');
					$('#loading-import-sample-data').removeClass('active-sample');
				}, 5000);
			},
			error:		function(){
				$this.removeClass('disable-button');
				$('.tb-infor-error').addClass('active-infor');	
				$('#loading-import-sample-data').removeClass('active-sample');	
				console.log('Error...');												
			},
		});	
	});
}(jQuery));