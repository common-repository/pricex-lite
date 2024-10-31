<?php

function pricex_currency_convart(){
	$currencys = get_option('pricex_option_name');
	$cur = '';
	if( $currencys ){
		foreach( $currencys as $currencys ){
			if( $currencys == 'dollar'){
				$cur.= '&#36;';
			}elseif($currencys == 'pound'){
				$cur.= '&#163;';
			}elseif($currencys == 'euro'){
				$cur.= '&#128;';
			}
		}
	}
	return $cur;
}

// price table one
function pricex_table_one(){
	$time_period = get_option('pricex_option_name');
	$cur = pricex_currency_convart();
?>
<div class="col-md-<?php echo ( isset($time_period['pricex_colum']) && $time_period['pricex_colum'] ) ? $time_period['pricex_colum'] : '3'  ?> col-sm-6 mb-sm-30 mb-xs-30 margin-bottom">
	<!-- Pricing Table Item Start -->
	<div class="pricing-table-1">
		<div class="pt-1--header">
			<div class="pt-1-header--title"><?php the_title(); ?></div>
			<div class="pt-1-header--price">
				<span class="pt-1-header-price--sign"><?php echo ( !empty( $cur ) ) ? esc_html( $cur ) : '&#36;'; ?></span>
				<span class="pt-1-header-price--amount"><?php echo esc_html( get_post_meta( get_the_ID(), '_pricex_prce', true ) ); ?></span>
			</div>
		</div>
		<div class="pt-1--body">
			<ul class="list-unstyled" >
			<?php 
			$features = get_post_meta( get_the_ID(), '_pricex_product_feature', true );
			if( $features ):
				foreach( $features as $feature ):
			?>
				<li><?php echo esc_html( $feature ); ?></li>
			<?php 
				endforeach;
			endif;
			?>
			</ul>
		</div>
		<div class="pt-1--footer">
		<?php if( !empty( $time_period['pricex_buy_btn'] ) ): ?>
			<a href="<?php echo esc_url( get_post_meta( get_the_ID(), '_pricex_price_button_url', true ) ); ?>" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--accent"><?php echo esc_html( $time_period['pricex_buy_btn'] ); ?></a>
		<?php endif; ?>
		</div>
	</div>
	<!-- Pricing Table Item End -->
</div>
<?php
}

// price table two
function pricex_table_two( $i ){
	$time_period = get_option('pricex_option_name');
	$cur = pricex_currency_convart();
?>
<!-- Pricing Table 2 Start -->
<div class="col-md-<?php echo ( isset( $time_period['pricex_colum'] ) && $time_period['pricex_colum'] ) ? $time_period['pricex_colum'] : '4'  ?> mb-sm-80 mb-xs-80 margin-bottom">
	<!-- Pricing Table Item Start -->
	<div class="pricing-table-2 <?php echo ( $i == '2' )? 'active': ''; ?>">
		<div class="pt-2--header">
			<div class="pt-2-header--img">
				<figure>
					<img src="<?php echo esc_url( get_post_meta( get_the_ID(), '_pricex_pic', true ) ); ?>" alt="" class="img-responsive">
					<figcaption>
						<div class="pt-2-header-img--price"><?php echo (!empty($cur)) ? esc_html( $cur ) : '&#36;'; echo esc_html( get_post_meta( get_the_ID(), '_pricex_prce', true ) ); ?></div>
						<div class="pt-2-header-img--info">
							<i class="fa <?php echo esc_html( get_post_meta( get_the_ID(), '_pricex_icon', true ) ); ?>"></i>
							<span><?php the_title(); ?></span>
						</div>
					</figcaption>
				</figure>
			</div>
		</div>
		<div class="pt-2--body">
			<ul>
			<?php 
			$features = get_post_meta(get_the_ID(),'_pricex_product_feature',true);
			if( $features ):
				foreach( $features as $feature ):
			?>
				<li><?php echo esc_html( $feature ); ?></li>
			<?php 
				endforeach;
			endif;
			?>
			</ul>
		</div>
		<div class="pt-2--footer">
		<?php if( !empty( $time_period['pricex_buy_btn'] ) ): ?>
			<a href="<?php echo esc_url( get_post_meta( get_the_ID(), '_pricex_price_button_url', true) ); ?>" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--accent"><?php echo esc_html( $time_period['pricex_buy_btn'] ); ?></a>
		<?php endif; ?>
		</div>
	</div>
	<!-- Pricing Table Item End -->
</div>
<!-- Pricing Table 2 End -->
<?php
}

// price table three
function pricex_table_three( $i ){
	$time_period = get_option('pricex_option_name');
	$cur = pricex_currency_convart();
?>
<div class="col-md-<?php echo ( isset( $time_period['pricex_colum'] ) && $time_period['pricex_colum'] ) ? $time_period['pricex_colum'] : '4'  ?> mb-sm-120 mb-xs-120 margin-bottom">
	<!-- Pricing Table Item Start -->
	<div class="pricing-table-3 <?php echo ( $i == '2' )? 'active': ''; ?>">
		<div class="pt-3--header">
			<div class="pt-3-header--img">
				<figure>
					<img src="<?php echo esc_url( get_post_meta( get_the_ID(), '_pricex_pic', true ) ); ?>" alt="" class="img-responsive">
					<figcaption>
						<div class="pt-3-header-img--price"><?php echo (!empty( $cur )) ? esc_html( $cur ) : '&#36;'; echo esc_html( get_post_meta( get_the_ID(), '_pricex_prce', true ) ); ?></div>
						<div class="pt-3-header-img--tag">
							<span><?php the_title(); ?></span>
							<p><?php echo esc_html( get_post_meta( get_the_ID(), '_pricex_tagline', true) ); ?></p>
						</div>
					</figcaption>
				</figure>
			</div>
		</div>
		<div class="pt-3--body">
			<ul>
			<?php 
			$features = get_post_meta( get_the_ID(), '_pricex_product_feature', true );
			if( $features ):
				foreach( $features as $feature ):
			?>
				<li><?php echo esc_html( $feature ); ?></li>
			<?php 
				endforeach;
			endif;
			?>
			</ul>
		</div>
		<div class="pt-3--footer">
		<?php if(!empty($time_period['pricex_buy_btn'])): ?>
			<a href="<?php echo esc_url( get_post_meta( get_the_ID(), '_pricex_price_button_url', true ) ); ?>" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--accent"><?php echo esc_html( $time_period['pricex_buy_btn'] ); ?></a>
		<?php endif; ?>
		</div>
	</div>
	<!-- Pricing Table Item End -->
</div>
<?php
}

// price table four
function pricex_table_four( $i ){
	$time_period = get_option('pricex_option_name');
	$cur = pricex_currency_convart();
?>
<div class="col-md-<?php echo ( isset( $time_period['pricex_colum'] ) && $time_period['pricex_colum'] ) ? $time_period['pricex_colum'] : '3'  ?> col-sm-6 mb-sm-30 mb-xs-30 no-padding margin-bottom">
	<!-- Pricing Table Item Start -->
	<div class="pricing-table-4 <?php echo ($i == '2')? 'active': ''; ?>">
		<div class="pt-4--header">
			<span class="pt-4-header--sign"><?php echo ( !empty( $cur ) ) ? esc_html( $cur ) : '&#36;'; ?></span>
			<span class="pt-4-header--amount"><?php echo esc_html( get_post_meta( get_the_ID(),'_pricex_prce', true ) ); ?></span>
			<div class="pt-4-header--desc"><span><?php the_title(); ?></span></div>
		</div>
		<div class="pt-4--body">
			<ul>
				<?php 
				$features = get_post_meta( get_the_ID(), '_pricex_product_feature', true );
				if( $features ):
					foreach( $features as $feature ):
				?>
					<li><?php echo esc_html( $feature ); ?></li>
				<?php 
					endforeach;
				endif;
				?>
			</ul>
		</div>
		<div class="pt-4--footer">
		<?php if(!empty($time_period['pricex_buy_btn'])): ?>
			<a href="<?php echo esc_url( get_post_meta( get_the_ID(), '_pricex_price_button_url', true ) ); ?>" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--accent"><?php echo esc_html( $time_period['pricex_buy_btn'] ); ?></a>
			<?php endif; ?>
		</div>
	</div>
	<!-- Pricing Table Item End -->
</div>
<?php 
}

// price table five
function pricex_table_five(){
	$time_period = get_option('pricex_option_name');
	$cur = pricex_currency_convart();
?>
<div class="col-md-<?php echo ( isset( $time_period['pricex_colum'] ) && $time_period['pricex_colum'] ) ? $time_period['pricex_colum'] : '4'  ?> mb-sm-30 mb-xs-30 margin-bottom">
	<!-- Pricing Table Item Start -->
	<div class="pricing-table-5">
		<div class="pt-5--header">
			<h3 class="pt-5-header--title"><?php the_title(); ?></h3>
			<p class="pt-5-header--desc"><?php echo esc_html( get_post_meta( get_the_ID(),'_pricex_tagline', true ) ); ?></p>
			<div class="pt-5-header--price">
				<span class="pt-5-header-price--title"><?php echo esc_html( get_post_meta( get_the_ID(),'_pricex_subtitle', true ) ); ?></span>
				<span class="pt-5-header-price--amount"><?php echo ( !empty( $cur ) ) ? esc_html( $cur ) : '&#36;'; echo esc_html( get_post_meta( get_the_ID(), '_pricex_prce', true ) ); ?></span><span class="pt-5-header-price--month"><?php echo esc_html( $time_period['time_period'] ); ?></span>
			</div>
		</div>
		<div class="pt-5--body">
			<ul>
				<?php 
				$features = get_post_meta( get_the_ID(), '_pricex_product_feature', true );
				if( $features ):
					foreach( $features as $feature ):
				?>
					<li><?php echo esc_html( $feature ); ?></li>
				<?php 
					endforeach;
				endif;
				?>
			</ul>
		</div>
		<div class="pt-5--footer">
		<?php if( !empty( $time_period['pricex_buy_btn'] ) ): ?>
			<a href="<?php echo esc_url( get_post_meta( get_the_ID(), '_pricex_price_button_url', true ) ); ?>" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--accent"><?php echo esc_html( $time_period['pricex_buy_btn'] ); ?></a>
		<?php endif; ?>
		</div>
	</div>
	<!-- Pricing Table Item End -->
</div>
<?php
}
