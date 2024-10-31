<?php 
/*
* @package pricex
* register price post type
*/

add_action( 'init', 'pricex_post_type' );

if(! function_exists( 'pricex_post_type' )):
	function pricex_post_type(){
		
		//Pricing post type register
		
		$tl_pular= __('PriceX', 'pricex' );
		$tl_singular = __('Price', 'pricex' );
		
		$labels = array(
			'name'               => sprintf( esc_html__( '%s','pricex' ), $tl_pular ),
			'singular_name'      => sprintf( esc_html__( '%s','pricex' ), $tl_singular ),
			'menu_name'          => sprintf( esc_html__( '%s','pricex' ), $tl_pular ),
			'name_admin_bar'     => sprintf( esc_html__( '%s','pricex' ), $tl_singular ),
			'new_item'           => sprintf( esc_html__( 'New %s', 'pricex' ), $tl_singular ),
			'edit_item'          => sprintf( esc_html__( 'Edit %s', 'pricex' ), $tl_singular ),
			'view_item'          => sprintf( esc_html__( 'View %s', 'pricex' ), $tl_singular ),
			'all_items'          => sprintf( esc_html__( 'All %s', 'pricex' ), $tl_pular ),
			'search_items'       => sprintf( esc_html__( 'Search %s', 'pricex' ), $tl_pular ),
			'parent_item_colon'  => esc_html_x( 'Parent '.$tl_pular.':', 'pricex' ),
			'not_found'          => esc_html_x( 'No '.$tl_pular.' found.', 'pricex' ),
			'not_found_in_trash' => esc_html_x( 'No '.$tl_pular.' found in Trash.', 'pricex' ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'menu_icon'			 => 'dashicons-chart-bar',
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'pricing' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'supports'           => array( 'title'),
		);
		
		register_post_type( 'pricex_pricing', $args );
		
		/*
		*Register price taxonomy categories	
		*/

		$tl_portfolio_pular = __( 'Categories', 'pricex' );
		$tl_portfolio_singular = __( 'Category', 'pricex' );

		$tl_labels= array(
			'name'                       => sprintf( esc_html__( '%s', 'pricex' ), $tl_portfolio_pular ),
			'singular_name'              => sprintf( esc_html__( '%s', 'pricex' ), $tl_portfolio_singular ),
			'search_items'               => sprintf( esc_html__( 'Search %s','pricex' ), $tl_portfolio_singular ),
			'potl_pular_items'           => sprintf( esc_html__( 'Potl_pular %s','pricex' ), $tl_portfolio_singular ),
			'all_items'                  => sprintf( esc_html__( 'All %s','pricex' ), $tl_portfolio_singular ),
			'edit_item'                  => sprintf( esc_html__( 'Edit %s','pricex' ), $tl_portfolio_singular ),
			'update_item'                => sprintf( esc_html__( 'Update %s','pricex' ), $tl_portfolio_singular ),
			'add_new_item'               => sprintf( esc_html__( 'Add New %s','pricex' ), $tl_portfolio_singular ),
			'new_item_name'              => esc_html_x( 'New '.$tl_portfolio_singular.' Name','pricex' ),
			'add_or_remove_items'        => sprintf( esc_html__( 'Add or remove %s','pricex' ), $tl_portfolio_singular ),
			'not_found'                  => esc_html_x( 'No '.$tl_portfolio_singular.' found.','pricex' ),
		);

		$args = array(
			'labels'            => $tl_labels,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'pricex_categories' ),
			'public'			=> true,
			'hierarchical' 		=> true,
		);
		
		register_taxonomy( 'pricex_categories', 'pricex_pricing', $args );
			
	}
endif;