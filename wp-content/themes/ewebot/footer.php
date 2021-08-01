        </div><!-- .main_wrapper -->
	</div><!-- .site_wrapper -->
	<?php
		/* Back2Top */
		if (gt3_option('back_to_top') == '1'){
			echo "<div class='back_to_top_container'><a href='" . esc_js("javascript:void(0)") . "' class='gt3_back2top' id='back_to_top'></a></div>";
		}
		if (!is_404()) {
			$footer = apply_filters('theme/print_footer', false);

			if (false === $footer) {
				gt3_get_default_footer();
			}
		}
		if (class_exists('Woocommerce') && is_product()) do_action( 'gt3_footer_action' );

	wp_footer();
	if ((gt3_option('modern_shop') == '1') && function_exists('gt3_has_shop_on_page') && gt3_has_shop_on_page()) {
		echo '<div class="gt3-mobile__burger_shop_sidebar"><div class="gt3-mobile__burger_shop_sidebar_close"></div><div class="gt3-mobile_shop_burger_container"></div></div>';
	}
    ?>
</body>
</html>
