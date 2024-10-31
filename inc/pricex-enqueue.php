<?php

add_action( 'wp_enqueue_scripts','pricex_enqueue_script' );

function pricex_enqueue_script()
{
	
	$script_load = get_option( 'pricex_option_name' );
	if( isset( $script_load['pricex_bts_fa'] ) && $script_load['pricex_bts_fa'] == 'on' ):
		wp_enqueue_style( 'bootstrap.min', plugins_url( '../css/bootstrap.min.css', __FILE__ ), array(), '4.4.1' );
		wp_enqueue_style( 'font-awesome', plugins_url( '../css/font-awesome.min.css', __FILE__ ), array(), '4.5.0' );
		wp_enqueue_script( 'bootstrap.min', plugins_url( '../js/bootstrap.min.js', __FILE__ ), array('jquery'), '4.4.1' , true );
	endif;

	wp_enqueue_style( 'material', plugins_url( '../css/material.min.css', __FILE__ ), array(), '1.1.1' );
	wp_enqueue_style( 'price-table-1', plugins_url( '../css/pricing-table-1.css', __FILE__ ), array(), '1.1.1' );
	wp_enqueue_style( 'price-table-2', plugins_url( '../css/pricing-table-2.css', __FILE__ ), array(), '1.1.1' );
	wp_enqueue_style( 'price-table-3', plugins_url( '../css/pricing-table-3.css', __FILE__ ), array(), '1.1.1' );
	wp_enqueue_style( 'price-table-4', plugins_url( '../css/pricing-table-4.css', __FILE__ ), array(), '1.1.1' );
	wp_enqueue_style( 'price-table-5', plugins_url( '../css/pricing-table-5.css', __FILE__ ), array(), '1.1.1' );
	wp_enqueue_style( 'price-table-6', plugins_url( '../css/pricing-table-6.css', __FILE__ ), array(), '1.1.1' );
	wp_enqueue_style( 'price-table-7', plugins_url( '../css/pricing-table-7.css', __FILE__ ), array(), '1.1.1' );

	wp_enqueue_script( 'material', plugins_url( '../js/material.min.js', __FILE__ ), array('jquery'), '1.1.1' , true );
	
}

add_action( 'admin_enqueue_scripts', 'pricex_admin_enqueue_script' );

function pricex_admin_enqueue_script()
{
	wp_enqueue_style( 'pricex-admin', plugins_url('../css/pricex-admin.css', __FILE__ ), array(), '1.1.1' );
	
 wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'jquery.custom', plugins_url( '../js/jquery.custom.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}


function pricex_unlimitaed_color() {
	$bg_color = get_option('pricex_option_name');
?>	
<style>
.pricing-table-4:hover .pt-4--footer a.mdl-button.mdl-button--accent,
.pricing-table-4.active .pt-4--footer a.mdl-button.mdl-button--accent,
#topNav2 .navbar-brand span,
#copyright a {
    color: <?php echo $bg_color['pricex_background']; ?>;
}


.pt-1-header--price,
.pt-1--footer a.mdl-button.mdl-button--accent,
.pt-2-header-img--price,
.pt-2--footer a.mdl-button.mdl-button--accent,
.pt-3-header-img--price,
.pt-3-header-img--tag span:before,
.pt-3--footer a.mdl-button.mdl-button--accent,
.pricing-table-4:hover,
.pricing-table-4.active,
.pt-4--footer a.mdl-button.mdl-button--accent,
.pricing-table-4:hover .pt-4--footer a .mdl-ripple,
.pricing-table-4.active .pt-4--footer a .mdl-ripple,
.pt-5-header--price,
.pt-5-header--title:before,
.pt-5--footer a.mdl-button.mdl-button--accent,
.pt-6-header--plan,
.pt-6--footer a.mdl-button.mdl-button--accent,
.pt-7-header--plan,
.pt-7--footer a.mdl-button.mdl-button--accent,
#pageHeader .section-title h2:before,
#openSwitcher,
#closeSwitcher {
    background-color: <?php echo $bg_color['pricex_background']; ?>;
}

.pt-5-header--price:before {
	background-color: <?php echo $bg_color['pricex_background']; ?>;
}

.pt-5--header,
.pt-6-header--caption,
.pt-7-header--caption,
#openSwitcher,
#closeSwitcher {
    border-color: <?php echo $bg_color['pricex_background']; ?>;
}
</style>
<?php
}
add_action( 'wp_head','pricex_unlimitaed_color' );
