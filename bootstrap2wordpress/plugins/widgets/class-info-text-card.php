<?php

namespace WPC\Widgets;

// Custom Elementor Widget with Subtitle and Title

if (!defined('ABSPATH')) exit;

class Info_Card	extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'b2w_info_card';
	}

	public function get_title()
	{
		// return 'Custom Button';
		return __('Info Card', 'plugin-b2w');
	}

	public function get_icon()
	{
		return 'eicon-info-box';
	}

	public function get_categories()
	{
		return ['b2w'];
	}

	public function get_keywords()
	{
		return ['b2w', 'info', 'card'];
	}

	public function register_controls()
	{
		$this->start_controls_section(
			'b2w_info_text',
			[
				'label' => __('Info Text Card', 'plugin-b2w'),
				'tab'	=>	\Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'info_title_text',
			[
				'label'	=>	__('Title', 'plugin-b2w'),
				'label_block' => true,
				'type'	=>	\Elementor\Controls_Manager::TEXT,
				'placeholder'	=>	__('Enter your title here', 'plugin-b2w'),
				'default'	=>	__('Enter your title here', 'plugin-b2w'),
			]
		);

		$this->add_control(
			'info_desc',
			[
				'label'	=>	__('Title', 'plugin-b2w'),
				'label_block' => true,
				'type'	=>	\Elementor\Controls_Manager::TEXT,
				'placeholder'	=>	__('Enter your title here', 'plugin-b2w'),
				'default'	=>	__('Ex hashtag kogi voluptate brunch, anim jean shorts. Street art raclette coloring book, voluptate veniam hoodie hot chicken prism.', 'plugin-b2w'),
			]
		);

		$this->add_control(
			'card_image',
			[
				'label'	=>	__('Choose Image', 'plugin-b2w'),
				'type'	=>	\Elementor\Controls_Manager::MEDIA,
				'default'	=>
				[
					'url'	=>	\Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'	=>	'background',
				'label'	=>	__('Background', 'plugin-b2w'),
				'types'	=>	['classic', 'gradient'],
				'selector'	=>	'{{WRAPPER}} .text-card',
			]
		);


		$this->end_controls_section();
	}
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		echo '<div class="text-card style-1">
			<div class="overlay"></div>
			<h4> ' . $settings['info_title_text'] . '</h4>
			<p>' . $settings['info_desc'] . '</p>
				<div class="overlay-image">
					<img src="' . esc_url($settings['card_image']['url']) . '" alt="illustration">
				</div>
			</div>';
	}
}
