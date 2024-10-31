<?php

add_shortcode( 'pricex-table', 'pricex_register_shortcode' );

function pricex_register_shortcode( $atts ){
    $table = shortcode_atts( array(
        'table' => 't1',
        'num' => '4',
        'cat' => '',
    ), $atts );
	
	ob_start();
?>
<!-- Pricing Table Start -->
<div class="peicex_section">
	<?php
	$script_load = get_option( 'pricex_option_name' );
	if( isset( $script_load['pricex_bts_fa']) && $script_load['pricex_bts_fa'] == 'on' ):
		if( isset( $script_load['pricex_boot_container']) && $script_load['pricex_boot_container'] == 'on' ):
	 ?>
	<div class="container-fluid">
	<?php 
		else:
	?>
	<div class="container">
	<?php
		endif;

	endif; 
	echo '<div class="row">';
	?>	
		<?php 
			if( !empty( $table['cat'] ) ):
				$args = array(
					'post_type' => 'pricex_pricing',
					'posts_per_page' => $table['num'],
						'tax_query' => array(
								array(
									'taxonomy' => 'pricex_categories',
									'field'    => 'id',
									'terms'    => $table['cat'],
								),
							),
				);
			else:
				$args = array(
					'post_type' => 'pricex_pricing',
					'posts_per_page' => $table['num'],
				);
			endif;
				$pricex_loop = new WP_Query( $args );
				if( $pricex_loop->have_posts() ):
					$i=1;
					while( $pricex_loop->have_posts() ) : $pricex_loop->the_post();
					
						switch( $table['table'] ){
							case 't1': pricex_table_one();
							break;
							case 't2': pricex_table_two($i);
							break;
							case 't3': pricex_table_three($i);
							break;
							case 't4': pricex_table_four($i);
							break;
							case 't5': pricex_table_five();
							break;
							case 't6': pricex_table_six();
							break;
							case 't7': pricex_table_seven($i);
							break;
						}

					$i++;
					endwhile;
				endif;
			?>
	<?php
	$script_load = get_option( 'pricex_option_name' );
	if( isset( $script_load['pricex_bts_fa']) && $script_load['pricex_bts_fa'] == 'on' ):
	 ?>
		</div>
	
	<?php 
	endif;
	?>
	</div>
</div>
<!-- Pricing Table 1 End -->

<?php
return ob_get_clean();
}
