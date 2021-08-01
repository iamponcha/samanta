<?php
/*
	Plugin Name: GT3 Themes Core
	Plugin URI: https://gt3themes.com/
	Description: GT3 Themes Core
	Version: 1.5.1
	Author: GT3 Themes
	Author URI: https://gt3themes.com/
	Text Domain:  gt3_themes_core
	Domain Path:  /languages
*/

use GT3\ThemesCore\DashBoard;

$gt3_theme_check = wp_get_theme();
$gt3_is_child    = $gt3_theme_check->get('Template');
if(!empty($gt3_is_child)) {
	$gt3_theme_check = wp_get_theme($gt3_is_child);
}
if(strtolower($gt3_theme_check->get('Author')) !== strtolower('GT3themes')) {
	return;
}

if(!defined('ABSPATH')) {
	exit;
}

if(!defined('GT3_THEMES_CORE_PLUGIN_FILE')) {
	define('GT3_THEMES_CORE_PLUGIN_FILE', __FILE__);
}

class GT3_Core_Elementor {
	const NAME     = 'GT3 Themes Core';
	const _require = 'elementor/elementor.php';
	private static $instance = null;

	public static function instance(){
		if(!self::$instance instanceof self) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function __construct(){
		add_action('plugins_loaded', array( $this, 'plugins_loaded' ));
		add_action('after_setup_theme', array( $this, 'after_setup_theme' ));
		add_action('wp', array( $this, 'wp_load' ));
	}

	public function wp_load($_wp){
		global $wp_query;

		if($wp_query->is_main_query() && $wp_query->is_404() && function_exists('gt3_option')) {
			$post_404_page_id = intval(gt3_option('404_page_id'));
			$_post            = is_numeric($post_404_page_id) && $post_404_page_id > 0 ? get_post($post_404_page_id) : null;

			if(!is_null($_post)) {
				$_wp->main(array( 'p' => $_post->ID, 'post_type' => 'page', 'pagename' => '' ));
				add_filter('single_template', function(){ return locate_template('page.php'); });
			}
		}
	}

	function _is_elementor_installed(){
		$installed_plugins = get_plugins();

		return isset($installed_plugins[self::_require]);
	}

	function fail_php_version(){
		$message      = sprintf(esc_html__('%s requires PHP version %s+, plugin is currently NOT ACTIVE.', 'gt3_themes_core'), self::NAME, '5.4');
		$html_message = sprintf('<div class="error">%s</div>', wpautop($message));
		echo wp_kses_post($html_message);
	}

	function fail_load(){
		$screen = get_current_screen();
		if(isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) {
			return;
		}

		if($this->_is_elementor_installed()) {
			if(!current_user_can('activate_plugins')) {
				return;
			}

			$activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin='.self::_require.'&amp;plugin_status=all&amp;paged=1&amp;', 'activate-plugin_'.self::_require);

			$message = '<p>'.sprintf(esc_html__('%s is not working because you need to activate the Elementor plugin.', 'gt3_themes_core'), self::NAME).'</p>';
			$message .= sprintf('<p><a href="%s" class="button-primary">%s</a></p>', $activation_url, esc_html__('Activate Elementor Now', 'gt3_themes_core'));
		} else {
			if(!current_user_can('install_plugins')) {
				return;
			}

			$install_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=elementor'), 'install-plugin_elementor');

			$message = '<p>'.sprintf(esc_html__('%s is not working because you need to install the Elemenor plugin', 'gt3_themes_core'), self::NAME).'</p>';
			$message .= '<p>'.sprintf('<a href="%s" class="button-primary">%s</a>', $install_url, esc_html__('Install Elementor Now', 'gt3_themes_core')).'</p>';
		}

		echo '<div class="error"><p>'.$message.'</p></div>';
	}

	public function plugins_loaded(){
		if(!function_exists('get_plugin_data')) {
			require_once(ABSPATH.'wp-admin/includes/plugin.php');
		}
		$plugin_info = get_plugin_data(__FILE__);
		define('GT3_CORE_ELEMENTOR_VERSION', $plugin_info['Version']);

		if(!version_compare(PHP_VERSION, '5.4', '>=')) {
			add_action('admin_notices', array( $this, 'fail_php_version' ));
		} else {
			require_once __DIR__.'/init.php';
			load_plugin_textdomain('gt3_themes_core', false, __DIR__.'/languages/');
		}
	}

	public function after_setup_theme(){
		$builders = apply_filters('gt3/core/builder_support', array());
		if(!is_array($builders)) {
			$builders = array( $builders );
		}
		foreach($builders as $builder) {
			if($builder == 'elementor') {
				if(!did_action('elementor/loaded')) {
					add_action('admin_notices', array( $this, 'fail_load' ));
				} else {
					require_once __DIR__.'/core/elementor/init.php';
				}
			}
		}

		if(apply_filters('gt3/core/dashboard', false)) {
			DashBoard::instance();
		}
	}
}

if(!function_exists('gt3_themes_core_version')) {
	function gt3_themes_core_version(){
		$plugin_data    = get_plugin_data(__FILE__);
		$plugin_version = $plugin_data['Version'];

		return $plugin_version;
	}
}

GT3_Core_Elementor::instance();
//add_action('init', function() {
//	gt3_dump(1);
//});

function gt3_dump() {
			$btrc = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);

			foreach($btrc as $b) {
				echo $b['function'].' in '.$b['file'].':'.$b['line'].PHP_EOL;
			}
//			var_dump($btrc);
//	debug_print_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
//	echo PHP_EOL;
//	echo (new Exception())->getTraceAsString();



			return;
			$file = str_replace(WP_CONTENT_DIR, '', $btrc[1]['file']);
			$line = $btrc[1]['line'];
			echo '<div style="display: none" class="WP_debug" dir="ltr">'.PHP_EOL;
			{
				echo '<pre>'.PHP_EOL;
				echo $btrc[1]['function'] . '()<br/>' . $file . ':' . $line;
				echo '</pre>'.PHP_EOL;

				foreach (func_get_args() as $arg) {
					echo '<pre class="WP_debug_text" style="overflow: scroll">'.PHP_EOL;
					var_dump($arg);
					echo '</pre>'.PHP_EOL;
				}
				if (WP_DEBUG_BACKTRACE_SHOW) {
					echo '<pre class="WP_debug_text" style="overflow: scroll">'.PHP_EOL;
					foreach($btrc as $item) {
						$item = array_merge(array(
							'file' => '',
							'line' => '',
							'function' => '',
						), $item);
						echo $item['file'].':'.$item['line'].'<br/>'.PHP_EOL;
						echo $item['function'].'<br/>--------<br/>'.PHP_EOL;
					}
//							echo print_r($btrc, true);//debug_print_backtrace();
					echo '</pre>'.PHP_EOL;
				}
			}
			echo '</div>'.PHP_EOL;
}
