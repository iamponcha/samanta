<?php
defined('ABSPATH') OR exit;


function is_shop_wpda() {
	static  $is_shop = null;
	if (!is_null($is_shop)) return $is_shop;
	/*if (class_exists('Elementor\Plugin') && \Elementor\Plugin::instance()->preview->is_preview()) {
		$is_shop = true;
		return $is_shop;
	}*/

	if(!class_exists('WooCommerce')) {
		$is_shop = false;

		return $is_shop;
	}

	if (is_singular()) {
		global $post;
		$whitelist = apply_filters('wpda-builder/filter/allow-elementor/is_shop', array());
		if (is_array($whitelist) && count($whitelist)) {
			$meta = get_post_meta($post->ID, '_elementor_controls_usage', true);
			$meta = maybe_unserialize($meta);
			foreach($whitelist as $item) {
				if(is_array($meta) && key_exists($item, $meta)) {
					$is_shop = true;
					break;
				}
			}
		}
	}
	if (!$is_shop && (is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy() || is_product() || is_cart() || is_checkout() || is_checkout())) {
		$is_shop = true;
	}
	if (!$is_shop) $is_shop = false;

	return $is_shop;
}
