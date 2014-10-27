<?php
/*
* Plugin Name:         AdSavvy Remarketing
* Plugin URI:          http://www.savvyads.com/wp-remarketing
* Description:         AdSavvy is a predictive remarketing platform for small and medium businesses
* Author:              nofearinc
* Author URI:          http://github.com/ramv https://airpair.me/ramvis
* Version: 			   1.0
*/

class WP_AdSavvy {

	public function WP_AdSavvy() {
		$this->init();
	}
	
	// initial point of action
	public function init() {
		add_action('admin_menu', array($this, 'register_page'));
		add_action('admin_init', array($this, 'register_settings'));
		add_action('wp_footer', array($this,'send_to_frontend'));
	}
	
	// register page call
	public function register_page() {
		add_options_page('AdSavvy', 'AdSavvy Retamarketing', 'manage_options', 'wp_adsavvy', array($this, 'adsavvy_page'));
	}
	
	// register settings group
	public function register_settings() {
		register_setting('adsavvy_setting', 'adsavvy_setting');
		
		add_settings_section(
			'adsavvy_settings_section',         // ID used to identify this section and with which to register options
			'AdSavvy Settings',                  // Title to be displayed on the administration page
			array($this, 'adsavvy_settings_callback'), // Callback used to render the description of the section
			'wp_adsavvy'                           // Page on which to add this section of options
		);
		
		add_settings_field(
			'adsavvy_org_id',                      // ID used to identify the field throughout the theme
			'AdSavvy Organization ID',                           // The label to the left of the option interface element
			array($this, 'adsavvy_org_id_callback'),   // The name of the function responsible for rendering the option interface
			'wp_adsavvy',                          // The page on which this option will be displayed
			'adsavvy_settings_section'         // The name of the section to which this field belongs
		);
		
		add_settings_field(
			'adsavvy_proj_id',                      // ID used to identify the field throughout the theme
			'AdSavvy Project ID',                           // The label to the left of the option interface element
			array($this, 'adsavvy_proj_id_callback'),   // The name of the function responsible for rendering the option interface
			'wp_adsavvy',                          // The page on which this option will be displayed
			'adsavvy_settings_section'         // The name of the section to which this field belongs
		);		
		
	}
	
	
	// general settings group callback
	public function adsavvy_settings_callback() {
		//$out = '<h3>AdSavvy Remarketing</h3>';
		$out = '';
		echo $out;
	}
	
	// define settings field org_id
	public function adsavvy_org_id_callback() {
		$val = get_option('adsavvy_setting', '');
		$val = $val['adsavvy_org_id'];
		
		echo '<div><input type="text" id="adsavvy_adv_id" name="adsavvy_setting[adsavvy_org_id]" value="'.$val.'" /></div>';
	}
	
	// define settings field proj_id
	public function adsavvy_proj_id_callback() {
		$val = get_option('adsavvy_setting', '');
		$val = $val['adsavvy_proj_id'];
		
		echo '<div><input type="text" id="adsavvy_proj_id" name="adsavvy_setting[adsavvy_proj_id]" value="'.$val.'" /></div>';
	}
	
	// call the page template here
	public function adsavvy_page() {
		include_once 'wp-adsavvy-admin-tpl.php';
	}

	// print the code based on the parameters
	public function send_to_frontend() {
		$adsavvy_setting = get_option('adsavvy_setting', '');
		if(!empty($adsavvy_setting) && !empty($adsavvy_setting['adsavvy_org_id']) && !empty($adsavvy_setting['adsavvy_proj_id'])) {
			$adsavvy_org_id = $adsavvy_setting['adsavvy_org_id'];
			$adsavvy_proj_id = $adsavvy_setting['adsavvy_proj_id'];
			
			include_once 'footer-script-code.php';			
		}
	}
}

$wp_adsavvy = new WP_AdSavvy();
