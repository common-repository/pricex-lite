<?php
class pricexSettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_menu_page(
            'Settings Admin', 
            'Pricex Settings', 
            'manage_options', 
            'pricex-setting-admin', 
            array( $this, 'settings_page' )
        );
        add_submenu_page( 'pricex-setting-admin', esc_html__( 'Pricex Settings', 'pricex' ), esc_html__( 'Settings', 'pricex' ),'manage_options', 'pricex-setting-admin');
        add_submenu_page(
            'pricex-setting-admin',
            esc_html__( 'Recommended Plugins', 'pricex' ), //page title
            esc_html__( 'Recommended Plugins', 'pricex' ), //menu title
            'manage_options', //capability,
            'pricex-recommended-plugin', //menu slug
            [ $this, 'recommended_plugin_submenu_page' ] //callback function
            
        );
    }

    /**
     * Options page callback
     */
    public function settings_page()
    {
        // Set class property
        $this->options = get_option( 'pricex_option_name' );
        ?>
        <div class="wrap">
            <h2>Pricex Settings</h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'pricex_option_group' );   
                do_settings_sections( 'pricex-setting-admin' );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * [recommended_plugin_submenu_page description]
     * @return [type] [description]
     */
    public function recommended_plugin_submenu_page() {
    	echo '<div class="dl-main-wrapper" style="margin-top: 50px;">';
            \Pricex\Orgaddons\Org_Addons::getOrgItems();
        echo '</div>';
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'pricex_option_group', // Option group
            'pricex_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'Pricex Pricing Table Settings', // pricex_buy_btn
            array( $this, 'print_section_info' ), // Callback
            'pricex-setting-admin' // Page
        );  
		add_settings_field(
			'pricex_bts_fa',
			'Load Bootstrap and font awesome',
			array($this, 'pricex_load_pricex_bts_fa_callback'),
			'pricex-setting-admin',
			'setting_section_id'
		);
		add_settings_field(
			'pricex_boot_container',
			'Container fluid',
			array($this, 'pricex_container_fluid_callback'),
			'pricex-setting-admin',
			'setting_section_id'
		);
		add_settings_field(
			'pricex_colum',
			'colum',
			array($this, 'pricex_row_col_callback'),
			'pricex-setting-admin',
			'setting_section_id'
		);		
		add_settings_field(
			'pricex_currency',
			'Pricex Currency',
			array($this, 'pricex_currency_callback'),
			'pricex-setting-admin',
			'setting_section_id'
		);
		add_settings_field(
			'time_period',
			'Time Period',
			array( $this, 'pricex_time_period_callback' ),
			'pricex-setting-admin',
			'setting_section_id'
		); 
        add_settings_field(
            'pricex_buy_btn', 
            'Button Name', 
            array( $this, 'pricex_buy_button_callback' ), 
            'pricex-setting-admin', 
            'setting_section_id'
        );            
		add_settings_field(
            'pricex_background', 
            'Color', 
            array( $this, 'pricex_background_callback' ), 
            'pricex-setting-admin', 
            'setting_section_id'
        );      
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();

        if( isset( $input['pricex_buy_btn'] ) )
            $new_input['pricex_buy_btn'] = sanitize_text_field( $input['pricex_buy_btn'] );   

		if( isset( $input['pricex_bts_fa'] ) )
            $new_input['pricex_bts_fa'] = sanitize_text_field( $input['pricex_bts_fa'] );
		
		if( isset( $input['pricex_currency'] ) )
            $new_input['pricex_currency'] = sanitize_text_field( $input['pricex_currency'] );	
		
		if( isset( $input['pricex_colum'] ) )
            $new_input['pricex_colum'] = sanitize_text_field( $input['pricex_colum'] );
		
		if( isset( $input['time_period'] ) )
            $new_input['time_period'] = sanitize_text_field( $input['time_period'] );
		
		if( isset( $input['pricex_background'] ) )
            $new_input['pricex_background'] = sanitize_text_field( $input['pricex_background'] );
		
		if( isset( $input['pricex_boot_container'] ) )
            $new_input['pricex_boot_container'] = sanitize_text_field( $input['pricex_boot_container'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print '<p>Enter your settings below:</p>';
        print '<p>Use this short code <code>[pricex-table table="t1"]</code> or <code>[pricex-table table="t1" num="4" cat="2"]</code> </p>';
	?>
		
<div class="modal--window">
  <label for="openModal">
    <span class="modal-window--label-text button button-primary"><?php esc_html_e( 'user guide', 'pricex' ); ?></span>
    <a class="button button-primary" href="https://codecanyon.net/item/pricex-material-design-pricing-table-set/16436167?s_rank=7" target="_blank"><?php esc_html_e( 'Get The Pro Version', 'pricex' ); ?></a>
    <input type="checkbox" id="openModal" />
    
    <div class="modal-window--body">
      <div class="modal-window-body--close"><?php esc_html_e( 'x', 'pricex' ); ?></div>
      <div class="modal-window-body-content">

		<h5><?php esc_html_e( 'Pricx pricing table easy, flexible and user friendly. Use from editor using', 'pricex' ); ?> <code><?php esc_html_e( '[pricex-table table="t1"]', 'pricex' ); ?></code> <?php esc_html_e( 'or', 'pricex' ); ?> <code><?php esc_html_e( '[pricex-table table="t1" num="4" cat="2"]', 'pricex' ); ?></code>. <?php esc_html_e( 'Also you can use from code using', 'pricex' ); ?> <code>&lt;?php echo do_shortcode('[pricex-table table="t1"]'); ?></code> or <code>&lt;?php echo do_shortcode('[pricex-table table="t1" num="4" cat="2"]'); ?> </code> </h5>
		<p><?php esc_html_e( 'you can change pricing table set by using table="" attribute and change value like [pricex-table table="t2" num="6" cat="2"] . we provide 7 style of price table set you can use t1 - t7 .', 'pricex' ); ?></p>
		<p><?php esc_html_e( 'you can change number of table by using num="" attribute and change value like [pricex-table table="t1" num="6" cat="2"]', 'pricex' ); ?></p>

		<p><?php esc_html_e( 'you can show pricing table with diffrient category by using cat="" attribute and change value like', 'pricex' ); ?><code><?php esc_html_e( '[pricex-table table="t2" num="6" cat="2"]', 'pricex' ); ?></code> . <?php esc_html_e( 'you should must be use category id. If you have created a category and asigned a post then you can get the category id below.', 'pricex' ); ?></p>

		<p><?php esc_html_e( 'you can use pricing table default setting by this shortcode', 'pricex' ); ?><code><?php esc_html_e( '[pricex-table table="t1"]', 'pricex' ); ?></code> . <?php esc_html_e( 'if you want to change table set just change table="" attribute value like t1, t2, t3, t4 etc.', 'pricex' ); ?></p>
		<ul class="termid">
		<li class="cat-bg"> <?php esc_html_e( 'Pricing Category ID', 'pricex' ); ?></li>
		<table class="cat-table">
		<tr class="cat-tr-head">
			<td> <?php esc_html_e( 'Cat Name', 'pricex' ); ?></td>
			<td> <?php esc_html_e( 'Cat id', 'pricex' ); ?></td>
		</tr>
			<?php 
				$trem_ids= get_terms('pricex_categories');
				if($trem_ids){
					foreach( $trem_ids as $trem_id){
						echo '<tr class="td-id">';
							echo '<td>';
							echo $trem_id->name;
							echo '</td>';
							echo '<td>';
							echo $trem_id->term_id;
							echo '</td>';
						echo '</tr>';
					}
				}
			?>
		</table>
		</ul>
       </div>
    </div>
    
    <div class="modal-window--overlay"></div>
  </label>
</div>

<div class="shortcode-create">
<h3> <?php esc_html_e( 'Shortcode generator', 'pricex' ); ?></h3>
<p><strong> <?php esc_html_e( 'Please create your pricing table and set a category from', 'pricex' ); ?> <a href="<?php echo admin_url('/edit.php?post_type=pricex_pricing') ?>" target="_blank"> <?php esc_html_e( 'Pricex', 'pricex' ); ?> </a> <?php esc_html_e( 'before generate the shortcode.', 'pricex' ); ?></strong></p>
	<select id="tabl_select" name="tabl_select">
		<option value=""><?php esc_html_e( 'Select Table', 'pricex' ); ?></option>
		<option value="t1"><?php esc_html_e( 'Table 1', 'pricex' ); ?></option>
		<option value="t2"><?php esc_html_e( 'Table 2', 'pricex' ); ?></option>
		<option value="t3"><?php esc_html_e( 'Table 3', 'pricex' ); ?></option>
		<option value="t4"><?php esc_html_e( 'Table 4', 'pricex' ); ?></option>
		<option value="t5"><?php esc_html_e( 'Table 5', 'pricex' ); ?></option>
		<option value=""><?php esc_html_e( 'Table 6 (Pro)', 'pricex' ); ?></option>
		<option value=""><?php esc_html_e( 'Table 7 (Pro)', 'pricex' ); ?></option>
	</select>
	<input type="number" name="post_num" id="post_num" placeholder="Tables per page" />
	<select id="post_cat" name="post_cat">
			<option value=""><?php esc_html_e( 'Select Category', 'pricex' ); ?></option>
			<?php 
				$trem_ids = get_terms('pricex_categories');
				if( $trem_ids ){
					foreach( $trem_ids as $trem_id ){	
						echo '<option value="'.$trem_id->term_id.'">'.$trem_id->name.'</option>';
					}
				}		
			?>
	</select>
	<p class="button button-primary show_sc"><?php esc_html_e( 'Show shortcode', 'pricex' ); ?></p>
	<div id="show-shortcode">
	</div>
	
</div>
		
	<?php
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function pricex_buy_button_callback()
    {
        printf(
            '<input type="text" id="pricex_buy_btn" name="pricex_option_name[pricex_buy_btn]" value="%s" />',
            isset( $this->options['pricex_buy_btn'] ) ? esc_attr( $this->options['pricex_buy_btn']) : ''
        );
		
    }   
	public function pricex_background_callback()
    {
        printf(
            '<input type="text" name="pricex_option_name[pricex_background]" value="%s" class="cpa-color-picker" >',
            isset( $this->options['pricex_background'] ) ? esc_attr( $this->options['pricex_background'] ) : ''
        );		
    }  
	
	public function pricex_load_pricex_bts_fa_callback()
    {
        printf(
            '<input type="checkbox" id="pricex_bts_fa" name="pricex_option_name[pricex_bts_fa]" %s />',
            ( isset( $this->options['pricex_bts_fa'] ) && $this->options['pricex_bts_fa'] == 'on' ) ? 'checked' : ''
        );
    }
	
	public function pricex_container_fluid_callback()
    {
        printf(
            '<input type="checkbox" id="pricex_boot_container" name="pricex_option_name[pricex_boot_container]" %s />',
            (isset( $this->options['pricex_boot_container']) && $this->options['pricex_boot_container'] == 'on' ) ? 'checked' : ''
        );
    }

	public function pricex_currency_callback() 
	{
	ob_start();

	$currency = !empty( $this->options['pricex_currency'] ) ? $this->options['pricex_currency'] : '';
    ?>
	 
	<select id="pricex_currency" name="pricex_option_name[pricex_currency]">
		<option value="default">currency</option>
		<option value="dollar" <?php selected( $currency , 'dollar' ); ?>>&#36;</option>
		<option value="pound" <?php selected( $currency , 'pound' ); ?>>&#163;</option>
		<option value="euro" <?php selected( $currency , 'euro' ); ?>>&#128;</option>
	</select> 

	<?php

	$html = ob_get_clean();
	echo $html;
	} 
	public function pricex_time_period_callback() {
	ob_start();

	$period = !empty( $this->options['time_period'] ) ? $this->options['time_period'] : '';

    ?>
	<select id="time_period" name="pricex_option_name[time_period]">
		<option value="">one time</option>
		<option value="/day" <?php selected( $period , '/day' ); ?>>/day</option>
		<option value="/mo" <?php selected( $period , '/mo' ); ?>>/mo</option>
		<option value="/yr" <?php selected( $period , '/yr' ); ?>>/yr</option>
	</select>
     
	<?php
	$html = ob_get_clean();
	echo $html;
	} 
	public function pricex_row_col_callback() {
	ob_start();

	$colum = !empty( $this->options['pricex_colum'] ) ? $this->options['pricex_colum'] : '';
    ?>
	
	<select id="pricex_colum" name="pricex_option_name[pricex_colum]">
		<option value="">Select Colum</option>
		<option value="6" <?php selected( $colum , 6 ); ?>>2</option>
		<option value="4" <?php selected( $colum , 4 ); ?>>3</option>
		<option value="3" <?php selected( $colum , 3 ); ?>>4</option>
	</select>
   
	<?php
	$html = ob_get_clean();
	echo $html;
	} 	
	
}

if( is_admin() )
    $pricex_settings_page = new pricexSettingsPage();
