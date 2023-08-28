<?php
if(!function_exists('op_bete_settings_page')&&!function_exists('op_bete_create_menu')){
	function op_bete_settings_page(){
		ob_start();
		?>
            <div class="wrap">
            	<h2><strong><?php echo __('Smart One Page - Import Sample Data Config', 'Smart-One-Page-Navigation')?></strong></h2>
                <br><br>
                <input type="button" class="sample-data-ins-op" data-url-ajax="<?php echo admin_url('admin-ajax.php');?>" value="<?php echo __('Import Sampe Data Config ( Click Me )', 'Smart-One-Page-Navigation');?>">
                <br><br>
                <div id="link-to-newpageconfig">
                	<div class="tc-information">
                    	<div><strong><?php echo __('Congratulation! Process Input success.', 'Smart-One-Page-Navigation')?></strong><br><br></div>
                    </div>
                    <div class="tb-infor-error"><?php echo __('The process input data is corrupted, please redo!', 'Smart-One-Page-Navigation')?></div>
                </div>
                <div id="loading-import-sample-data">
                	<div><?php echo __('The process of data entry is underway. Please wait a few minutes and not close the browser...', 'Smart-One-Page-Navigation');?></div>
                </div>
            </div>
		<?php
		$output_string = ob_get_contents();
		ob_end_clean();
		echo $output_string;
	}
	
	function op_bete_create_menu(){
		add_menu_page(esc_html__('Smart One Page Plugin Settings', 'Smart-One-Page-Navigation'), esc_html__('Smart One Page Sample Data', 'Smart-One-Page-Navigation'), 'administrator', __FILE__, 'op_bete_settings_page', '');
	};
	
	add_action('admin_menu', 'op_bete_create_menu');
}