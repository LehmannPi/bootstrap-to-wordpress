<?php

namespace WPC\Widgets;

// Custom Elementor Widget with Subtitle and Title

if (!defined('ABSPATH')) exit;

class Call_To_Action	extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'b2w_cta';
	}

	public function get_title()
	{
		// return 'Custom Button';
		return __('Call to Action', 'plugin-b2w');
	}

	public function get_icon()
	{
		return 'eicon-call-to-action';
	}

	public function get_categories()
	{
		return ['b2w'];
	}

	public function get_keywords()
	{
		return ['b2w', 'action', 'call', 'cta'];
	}

	protected function register_controls()
	{
		global $plugin_images;

		$this->start_controls_section(

			'b2w_cta',
			[
				'label' => __('Call to Action', 'plugin-b2w'),
				'tab'	=>	\Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'sub_title_text',
			[
				'label'	=>	__('Sub Title Text', 'plugin-b2w'),
				'label_block' => true,
				'type'	=>	\Elementor\Controls_Manager::TEXT,
				'placeholder'	=>	__('Sub title goes here', 'plugin-b2w'),
				'default'	=>	__('Show the internet what you are about!', 'plugin-b2w'),
			]
		);

		$this->add_control(
			'sub_title_color',
			[
				'label'	=>	__('Sub Title Color', 'plugin-b2w'),
				'type'	=>	\Elementor\Controls_Manager::COLOR,
				'default'	=>	'#ffffff',
				'selectors'	=>	[
					'{{WRAPPER}} .sub-title'	=>	'color:	{{VALUE}}',
				]
			]
		);

		$this->add_control(
			'title_text',
			[
				'label'	=>	__('Title Text', 'plugin-b2w'),
				'label_block' => true,
				'type'	=>	\Elementor\Controls_Manager::TEXT,
				'placeholder'	=>	__('Add your title here', 'plugin-b2w'),
				'default'	=>	__('Your custom made, creative, WordPress website.', 'plugin-b2w'),
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'	=>	__('Title Color', 'plugin-b2w'),
				'type'	=>	\Elementor\Controls_Manager::COLOR,
				'default'	=>	'#fff',
				'selectors'	=>	[
					'{{WRAPPER}} h2'	=>	'color:	{{VALUE}}',
				]
			]
		);

		$this->add_control(
			'cta_desc',
			[
				'label'	=>	__('Description', 'plugin-b2w'),
				'label_block'	=>	true,
				'type'	=>	\Elementor\Controls_Manager::TEXTAREA,
				'placeholder'	=>	__('Description', 'plugin-b2w'),
				'default'	=>	__('Direct trade vexillologist thundercats normcore, dreamcatcher vaporware velit green juice dolor mumblecore beard.', 'plugin-b2w'),
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label'	=>	__('Description Color', 'plugin-b2w'),
				'type'	=>	\Elementor\Controls_Manager::COLOR,
				'default'	=>	'#fff',
				'selectors'	=>	[
					'{{WRAPPER}} .cta-desc'	=>	'color:	{{VALUE}}',
				]
			]
		);

		$this->add_control(
			'overlay_image',
			[
				'label'	=>	__('Choose Image', 'plugin-b2w'),
				'type'	=>	\Elementor\Controls_Manager::MEDIA,
				'default'	=>	[
					'url'	=>	$plugin_images . '/card-date.png'
				]
			]
		);

		$this->add_control(
			'button_text',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block'	=>	true,
				'label' => __('Button Text', 'plugin-b2w'),
				'placeholder'	=> __('Btn Text.', 'plugin-b2w'),
				'default'	=> __('Learn More', 'plugin-b2w'),
			]
		);

		$this->add_control(
			'button_link',
			[
				'type' => \Elementor\Controls_Manager::URL,
				'label' => __('Button Link', 'plugin-b2w'),
				'show_external'	=>	true,
				'default'	=> array(
					'url'	=>	'#',
					'is_external'	=>	true,
					'nofollow'	=>	false
				),
			]
		);

		$this->add_control(
			'button_style',
			[
				'type' => \Elementor\Controls_Manager::SELECT,
				'label' => __('Button Style', 'plugin-b2w'),
				'default'	=> 'btn-primary',
				'options'	=>	array(
					'btn-primary'	=>	__('Primary', 'plugin-b2w'),
					'btn-secondary'	=>	__('Secondary', 'plugin-b2w'),
					'btn-invert'	=>	__('Invert', 'plugin-b2w'),
				)
			]
		);

		$this->add_control(
			'btn_align',
			[
				'type'	=>	\Elementor\Controls_Manager::CHOOSE,
				'label'	=>	__('Alignment', 'plugin-b2w'),
				'options'	=>	array(

					'text-start'	=>	[
						'title'	=>	__('Left', 'plugin-b2w'),
						'icon'	=>	'eicon-text-align-left',
					],

					'text-center'	=>	[
						'title'	=>	__('Center', 'plugin-b2w'),
						'icon'	=>	'eicon-text-align-center',
					],

					'text-end'	=>	[
						'title'	=>	__('Right', 'plugin-b2w'),
						'icon'	=>	'eicon-text-align-right',
					],
				),
				'default'	=>	'text-start',
				'toggle'	=>	true,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'	=>	'background',
				'label'	=>	__('Background', 'plugin-b2w'),
				'types'	=>	['classic', 'gradient'],
				'selector'	=>	'{{WRAPPER}} .section-call-to-action	 .overlay',
			]
		);


		$this->end_controls_section();
	}

	protected function render()
	{
		global $plugin_image;
		$settings = $this->get_settings_for_display();
		$target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';

		echo '
		<div class="section-call-to-action">
			<div class="overlay">
				<div class="overlay-image">
					<img src="' . esc_url($settings['overlay_image']['url']) . '" alt="illustration">
				</div>
			</div>

			<div class="underlay-bg"></div>

			<p class="sub-title">' . $settings['sub_title_text'] . '</p>
			<h2> ' . $settings['title_text'] . '</h2>
			<p class="cta-desc">' . $settings['cta_desc'] . '</p>
			<div class="link-box ' . $settings['btn_align'] . '">
				<a href="' . $settings['button_link']['url'] . '" ' . $target . $nofollow . ' class="btn ' . $settings['button_style'] . ' mt-4">
				' . $settings['button_text'] . '</a>
			</div>
		</div>';
	}
}
