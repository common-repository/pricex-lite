<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object
 *
 * @return bool             True if metabox should show
 */
function pricex_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template
	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function pricex_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters
 * @param  CMB2_Field object $field      Field object
 */
function pricex_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}


add_action( 'cmb2_admin_init', 'pricex_custom_meta_fields' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
 
function pricex_custom_meta_fields() {
	$prefix = '_pricex_';
	

	
	/**
	 * Price section metabox field type included
	*/
	$tl_meta = new_cmb2_box( array(
		'id'            => $prefix . 'price_section',
		'title'         => __( 'Price Meta', 'pricex' ),
		'object_types'  => array( 'pricex_pricing' ), // Post type price

	) );
	
	$tl_meta->add_field( array(
		'name' => __( 'Price', 'pricex' ),
		'id'   => $prefix . 'prce',
		'type' => 'text_small',
	) );
	
	$tl_meta->add_field( array(
		'name' => __( 'Button URL', 'pricex' ),
		'id'   => $prefix . 'price_button_url',
		'type' => 'text_url',
	) );
	
	$tl_meta->add_field( array(
		'name' => __( 'Product Feature', 'pricex' ),
		'id'   => $prefix . 'product_feature',
		'type' => 'text',
		'repeatable'=>true,
	) );
	
	$tl_meta->add_field( array(
		'name' => __( 'Image', 'pricex' ),
		'id'   => $prefix . 'pic',
		'type' => 'file',
		'desc' => __( 'If you use price set 2 and 3. Use all pictures same size height and width ', 'pricex' ),
	) );
	
	$tl_meta->add_field( array(
		'name' => __( 'Icon font', 'pricex' ),
		'id'   => $prefix . 'icon',
		'type' => 'text',
		'desc' => __( 'If you use price set 2. Use font awesome class like ( fa-bitbucket ) <a target="_blank" href="http://fontawesome.io/icons/">Click here</a>', 'pricex' ),
	) );
	
	$tl_meta->add_field( array(
		'name' => __( 'Subtitle', 'pricex' ),
		'id'   => $prefix . 'subtitle',
		'type' => 'text',
		'desc' => __( 'If you use price set 6 and 5', 'pricex' ),
	) );
	
	$tl_meta->add_field( array(
		'name' => __( 'Tagline', 'pricex' ),
		'id'   => $prefix . 'tagline',
		'type' => 'text',
		'desc' => __( 'If you use price set 3 and 5', 'pricex' ),
	) );
	$tl_meta->add_field( array(
		'name' => __( 'Feature Title', 'pricex' ),
		'id'   => $prefix . 'product_feature_title',
		'type' => 'text',
		'repeatable'=>true,
		'desc' => __( 'If you use price set 7. When post last price table then use this for show before', 'pricex' ),
	) );
		
}	
