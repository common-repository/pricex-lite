<?php
/*
Plugin Name: Pricex Lite
Plugin URI:  http://themelooks.org/demo/pricex-lite
Description: pricex price table wordpress plugin
Version:     1.4.1
Author: 	 ThemeLooks
Author URI:  http://themelooks.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: pricex
*/

// Blocking direct access

if( ! function_exists( 'pricex_block_direct_access' ) ) {
	function pricex_block_direct_access() {
		if( ! defined( 'ABSPATH' ) ) {
			exit ( 'Direct access denied.' );
		}
	}
}

// load textdomain
load_plugin_textdomain( 'pricex', false, basename( dirname( __FILE__ ) ) . '/languages' );

require_once dirname( __FILE__ ) . '/inc/pricex-enqueue.php';
require_once dirname( __FILE__ ) . '/inc/cpt.php';

require_once dirname( __FILE__ ) . '/inc/cmb2/init.php';
require_once dirname( __FILE__ ) . '/inc/pricex-config.php';

require_once dirname( __FILE__ ) . '/inc/price-tables.php';
require_once dirname( __FILE__ ) . '/pricex-shortcode.php';
require_once dirname( __FILE__ ) . '/org-addons/Org_Addons.php';
require_once dirname( __FILE__ ) . '/admin/admin.php';
