<?php

add_action(
	'woocommerce_before_add_to_cart_form',
	function () {
		global $product;
		global $root_product;

		$root_product = $product;
	}
);


if (! function_exists('blocksy_woo_output_cart_action_open')) {
	function blocksy_woo_output_cart_action_open() {
		$attr = [
			'class' => 'ct-cart-actions'
		];

		if (
			(is_product() || wp_doing_ajax())
			&&
			! blocksy_manager()->screen->uses_woo_default_template()
		) {
			$attr['class'] = 'ct-cart-actions-builder';
			return;
		}

		$attr = apply_filters('blocksy:woocommerce:cart-actions:attr', $attr);

		echo '<div ' . blocksy_attr_to_html($attr) . '>';
	}
}

add_action(
	'woocommerce_before_add_to_cart_quantity',
	function () {
		global $product;
		global $root_product;

		if (! $root_product) {
			return;
		}

		if (
			! $root_product->is_type('simple')
			&&
			! $root_product->is_type('variation')
			&&
			! $root_product->is_type('variable')
			&&
			! $root_product->is_type('subscription')
			&&
			! $root_product->is_type('variable-subscription')
		) {
			return;
		}

		blocksy_woo_output_cart_action_open();
	},
	PHP_INT_MAX
);

add_action(
	'woocommerce_before_add_to_cart_button',
	function () {
		global $product;
		global $root_product;

		if (! $root_product) {
			return;
		}

		if (
			! $root_product->is_type('grouped')
			&&
			! $root_product->is_type('external')
		) {
			return;
		}

		blocksy_woo_output_cart_action_open();
	},
	PHP_INT_MAX
);

add_action(
	'woocommerce_after_add_to_cart_button',
	function () {
		global $product;

		if (! $product) {
			return;
		}

		if (
			! $product->is_type('simple')
			&&
			! $product->is_type('variable')
			&&
			! $product->is_type('subscription')
			&&
			! $product->is_type('variable-subscription')
			&&
			! $product->is_type('grouped')
			&&
			! $product->is_type('external')
		) {
			return;
		}

		if (
			(
				$product->is_type('simple')
				||
				$product->is_type('variable')
				||
				$product->is_type('subscription')
				||
				$product->is_type('variable-subscription')
			)
			&&
			! did_action('woocommerce_before_add_to_cart_quantity')
		) {
			return;
		}

		if (
			(is_product() || wp_doing_ajax())
			&&
			! blocksy_manager()->screen->uses_woo_default_template()
		) {
			return;
		}

		echo '</div>';
	},
	100
);

add_action('woocommerce_post_class', function ($classes) {
	global $product;
	global $woocommerce_loop;

	$default_product_layout = blocksy_get_woo_single_layout_defaults();
	
	$layout = blocksy_get_theme_mod(
		'woo_single_layout',
		blocksy_get_woo_single_layout_defaults()
	);

	$layout = blocksy_normalize_layout(
		$layout,
		$default_product_layout
	);

	$product_view_type = blocksy_get_product_view_type();

	if (
		$product_view_type === 'top-gallery'
		||
		$product_view_type === 'columns-top-gallery'
	) {
		$woo_single_split_layout = blocksy_get_theme_mod(
			'woo_single_split_layout',
			[
				'left' => blocksy_get_woo_single_layout_defaults('left'),
				'right' => blocksy_get_woo_single_layout_defaults('right')
			]
		);

		$layout = array_merge(
			$woo_single_split_layout['left'],
			$woo_single_split_layout['right']
		);
	}

	$add_to_cart_layer = array_values(array_filter($layout, function($k) {
		return $k['id'] === 'product_add_to_cart';
	}));

	if (
		empty($add_to_cart_layer)
		||
		! $product
		||
		$product->is_type('external')
		||
		$woocommerce_loop['name'] === 'related'
		||
		(
			! is_product()
			&&
			! wp_doing_ajax()
		)
	) {
		return $classes;
	}

	$has_ajax_add_to_cart = blocksy_get_theme_mod(
		'has_ajax_add_to_cart',
		'no'
	);

	if (
		$has_ajax_add_to_cart === 'yes'
		&&
		get_option('woocommerce_cart_redirect_after_add', 'no') === 'no'
	) {
		$classes[] = 'ct-ajax-add-to-cart';
	}

	return $classes;
}, 10, 2);
