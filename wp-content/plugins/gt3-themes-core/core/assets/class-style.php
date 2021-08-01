<?php

namespace GT3\ThemesCore\Assets;

use Elementor\Widget_Base;
use ElementorModal\Widgets\GT3_Core_Widget_Base;

class Style extends Asset {
	protected        $sub_folder  = 'css';
	protected        $ext         = 'css';
	protected        $option_name = 'optimize_css';
	protected static $instance    = null;

	/**
	 * @param Widget_Base $widget
	 *
	 * @return array
	 */
	protected static function get_depends($widget){
		$depts = array();
		if(is_object($widget) && ($widget instanceof GT3_Core_Widget_Base)) {
			if(method_exists($widget, 'get_main_script_depends')) {
				$depts = array_merge($depts, $widget->get_main_script_depends());
			} else if(method_exists($widget, 'get_style_depends')) {
				$depts = array_merge($depts, $widget->get_style_depends());
			}
		}

		return $depts;
	}

	protected static function enqueue_wp_asset($handle, $url = '', $deps = array(), $ver = false){
		wp_enqueue_style($handle, $url, $deps, $ver);
	}

	public function process_header(){
		parent::process_header();

		if(!$this->isMinimized) {
			return false;
		}

		$assets = $this->enqueued;
		if(!(is_array($assets) && count($assets))) {
			return false;
		}

		list($hash, $path) = $this->asset_get();

		if(false === $path) {
			$path = $this->upload_dir['path'].$hash.'.'.$this->ext;
			static::save_file($assets, $path, '', '');
		}
		$this->done();
		wp_enqueue_style('gt3-assets-header', $this->upload_dir['url'].$hash.'.'.$this->ext, array(), filemtime($path), 'all');

		return true;
	}

	public function process_footer(){
		parent::process_footer();
		if(!$this->isMinimized) {
			return false;
		}

		$assets = $this->enqueued;
		if(!(is_array($assets) && count($assets))) {
			return false;
		}

		list($hash, $path) = $this->asset_get('footer');

		if(false === $path) {
			$path = $this->upload_dir['path'].$hash.'.'.$this->ext;
			static::save_file($assets, $path, '', '');
		}

		wp_enqueue_style('gt3-assets-footer', $this->upload_dir['url'].$hash.'.'.$this->ext, array(), filemtime($path), 'all');
		$this->done();

		return true;
	}

	protected function process_file($content, $asset){
		$matches = array();
		preg_match_all("/url\(\s*['\"]?(?!data:)(?!http)(?![\/'\"])(.+?)['\"]?\s*\)/ui", $content, $matches);
		foreach($matches[1] as $a) {
			$content = str_replace(trim($a),$this->path_to_url($a,$asset),$content);
		}

		return $content;
	}

	protected function path_to_url($a,$asset){
		$path_asset = $this->register[$asset]['path'];
		$path_file = stream_resolve_include_path(str_replace(wp_normalize_path(ABSPATH),'',dirname($path_asset)).'/'.$a);
		return $this->abs_path_to_url($path_file);
	}

	function abs_path_to_url( $path = '' ) {
		$url = str_replace(
			wp_normalize_path( untrailingslashit( ABSPATH ) ),
			site_url(),
			wp_normalize_path( $path )
		);
		return esc_url_raw( $url );
	}
}
