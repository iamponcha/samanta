<?php

if(!defined('ABSPATH')) {
	exit;
}

use Elementor\Utils;

/** @var \ElementorModal\Widgets\GT3_Core_Elementor_Widget_TestimonialsLite $widget */

$settings = array(
	'nav'           => 'none',
	'autoplay'      => true,
	'autoplay_time' => 4000,
	'author_position' => 'after',
	'round_imgs'    => false,
	'item_align'	=> 'left',
	'image_size'    => array(
		'size' => 60
	),
);

$settings = wp_parse_args($widget->get_settings(), $settings);

$css_class = array(
	'gt3_testimonial',
	'active-carousel',
);

if(!empty($settings['item_align'])) {
	$css_class[] = 'text_align-'.esc_attr($settings['item_align']);
}

if(!empty($settings['author_position'])) {
	$css_class[] = 'author_position-'.esc_attr($settings['author_position']);
}

if(!empty($settings['nav'])) {
	$css_class[] = 'nav-'.esc_attr($settings['nav']);
}

$widget->add_render_attribute('wrapper', 'class', $css_class);
$data = array(
	'fade'          => false,
	'autoplay'      => (bool) $settings['autoplay'],
	'autoplaySpeed' => intval($settings['autoplay_time']),
	'dots'          => ($settings['nav'] === 'dots') ? true : false,
	'arrows'        => ($settings['nav'] === 'arrows') ? true : false,
	'l10n'          => array(
		'prev' => esc_html__('Prev', 'gt3_themes_core'),
		'next' => esc_html__('Next', 'gt3_themes_core'),
	),
);

$widget->add_render_attribute('wrapper', 'data-settings', wp_json_encode($data));

if(is_array($settings['items']) && count($settings['items'])) {
	?>
	<div <?php $widget->print_render_attribute_string('wrapper') ?>>
		<div class="module_content testimonials_list">
			<?php ob_start(); ?>
			<div class="testimonials_rotator">
				<?php
				foreach($settings['items'] as $index => $item) {
					$link_id = 'linkid_'.$index;
					?>
                    <div class="testimonials_item">
						<div class="testimonial_item_wrapper" style="position: relative">
							<div class="testimonials_content">
								<?php
								$item_link = '';
								if(!empty($item['link']['url'])) {

									$widget->add_render_attribute($link_id, 'href', esc_url($item['link']['url']));

									if($item['link']['is_external']) {
										$widget->add_render_attribute($link_id, 'target', '_blank');
									}

									if(!empty($item['link']['nofollow'])) {
										$widget->add_render_attribute($link_id, 'rel', 'nofollow');
									}

									$item_link = '<a '.$widget->get_render_attribute_string($link_id).' style="position: absolute; left: 0; top: 0; width: 100%; height: 100%"></a>';
								}

								$text  = ( ! empty( $item['content'] ) ? '<div class="testimonials-text"><div class="testimonials-text-wrapper">'.$item['content'].'</div></div>' : '' );
								$photo = '';
								$title = ( ! empty( $item['tstm_author'] ) ? '<div class="testimonials_title">'.esc_html( $item['tstm_author'] ).'</div>' : '' );
								$title .= ( ! empty( $item['sub_name'] ) ? '<div class="testimonials-sub_name">'.esc_html( $item['sub_name'] ).'</div>' : '' );

								if(!empty($item['image']['id'])) {
									$repeater_key = $widget->get_repeater_key('image', 'items', $index);
									if($settings['round_imgs']) {
										$widget->add_render_attribute($repeater_key, 'class', 'rounded');
									}
									$src = Utils::get_placeholder_image_src();
									if(isset($item['image']['id']) && (bool) $item['image']['id']) {
										$image = wp_get_attachment_image_src($item['image']['id'], 'single-post-thumbnail');
										if($image) {
											if (!empty($settings['image_size']) && is_array($settings['image_size']) && !empty($settings['image_size']['size']) ) {
												$src = aq_resize($image[0], (int)$settings['image_size']['size']*2, (int)$settings['image_size']['size']*2, true, true, true);
											}else{
												$src = $image[0];
											}
										}
									}

									$widget->add_render_attribute($repeater_key, 'src', esc_url($src));
									$widget->add_render_attribute($repeater_key, 'style', 'width:'.esc_attr((int)$settings['image_size']['size']).'px;height:'.esc_attr((int)$settings['image_size']['size']).'px;');

									$image = wp_prepare_attachment_for_js($item['image']['id']);

									if (!empty($image['alt'])) {
										$widget->add_render_attribute($repeater_key, 'alt', $image['alt']);
									}

									$photo = '<div class="testimonials_photo"><img '.$widget->get_render_attribute_string($repeater_key).'/></div>';
								}

								if(!empty($settings['author_position']) && ($settings['author_position'] == 'after')) {
									echo $text;
								}



								echo '<div class="testimonials_author_wrapper">' . $photo . $title . $item_link . '</div>';



								if(!empty($settings['author_position']) && $settings['author_position'] == 'before') {
									echo $text;
								}

								?>
							</div>
						</div>
					</div>
				<?php
				} // end foreach
				?>
			</div>

		</div>
	</div>

<?php
	$widget->print_data_settings($data);
} // end if



