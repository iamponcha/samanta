<?php

namespace ElementorModal\Widgets;

if(!defined('ABSPATH')) {
	exit;
}

use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!class_exists('ElementorModal\Widgets\GT3_Core_Elementor_Widget_TestimonialsVerticalCarousel')) {
	class GT3_Core_Elementor_Widget_TestimonialsVerticalCarousel extends \ElementorModal\Widgets\GT3_Core_Widget_Base {

		public function get_main_script_depends(){
			return array_merge(
				parent::get_main_script_depends(),
				array( 'gt3-core/slick' )
			);
		}

		public function get_name(){
			return 'gt3-core-testimonialsverticalcarousel';
		}

		public function get_title(){
			return esc_html__('Testimonials Vertical Carousel', 'gt3_themes_core');
		}

		public function get_icon(){
			return 'gt3-core-elementor-icon eicon-testimonial-carousel';
		}

		public function get_repeater_fields() {
			$repeater = new Repeater();

			$repeater->add_control(
				'tstm_author',
				array(
					'label' => esc_html__('Author name', 'gt3_themes_core'),
					'type'  => Controls_Manager::TEXT,
				)
			);

			$repeater->add_control(
				'sub_name',
				array(
					'label' => esc_html__('Title', 'gt3_themes_core'),
					'type'  => Controls_Manager::TEXT,
				)
			);

			$repeater->add_control(
				'image',
				array(
					'label'   => esc_html__('Photo'),
					'type'    => Controls_Manager::MEDIA,
					'default' => array(
						'url' => Utils::get_placeholder_image_src(),
					),
				)
			);

			$repeater->add_control(
				'link',
				[
					'label' => __( 'Link', 'gt3_themes_core' ),
					'type' => Controls_Manager::URL,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'https://your-link.com', 'gt3_themes_core' ),
				]
			);

			$repeater->add_control(
				'content',
				array(
					'label' => esc_html__('Description', 'gt3_themes_core'),
					'type'  => Controls_Manager::WYSIWYG,
				)
			);

			return $repeater->get_controls();
		}

	}
}











