<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;

if (!defined('ABSPATH')) exit;

class Link_Widget extends Widget_Base
{
	public function get_name()
	{
		return 'b2w_link';
	}

	public function get_title()
	{
		return __('Link', 'plugin-b2w');
	}

	public function get_icon()
	{
		return 'eicon-editor-link';
	}


	public function get_categories()
	{
		return ['b2w'];
	}

	public function get_keywords()
	{
		return ['b2w', 'link', 'site', 'l', 'ui', 'ref'];
	}

	protected function register_controls()
	{

		$this->start_controls_section(
			'b2w_buttons',
			[
				'label' => __('Link', 'plugin-b2w'),
				'tab'	=>	\Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'link_text',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block'	=>	true,
				'label' => __('Link Text', 'plugin-b2w'),
				'placeholder'	=> __('Type what you want to say.', 'plugin-b2w'),
				'default'	=> __('Learn More', 'plugin-b2w'),
			]
		);

		$this->add_control(
			'link_url',
			[
				'type' => \Elementor\Controls_Manager::URL,
				'label' => __('Link URL', 'plugin-b2w'),
				'show_external'	=>	true,
				'placeholder'	=> __('Type where you want to go.', 'plugin-b2w'),
				'default'	=> array(
					'url'	=>	'#',
					'is_external'	=>	true,
					'nofollow'	=>	false
				),
			]
		);

		$this->add_control(
			'link_color',
			[
				'label'	=>	__('Link Color', 'plugin-b2w'),
				'type'	=>	\Elementor\Controls_Manager::COLOR,
				// 'placeholder'	=>	__('Type Your Sub Title Here', 'plugin-b2w'),
				'default'	=>	'#FF3366',
				'selectors'	=>	[
					'{{WRAPPER}} .colored-link'	=>	'color:	{{VALUE}}',
				]
			]
		);

		$this->add_control(
			'link_hover_color',
			[
				'label'	=>	__('Hover Color', 'plugin-b2w'),
				'type'	=>	\Elementor\Controls_Manager::COLOR,
				// 'placeholder'	=>	__('Type Your Sub Title Here', 'plugin-b2w'),
				'default'	=>	'#333333',
				'selectors'	=>	[
					'{{WRAPPER}} .colored-link:hover'	=>	'color:	{{VALUE}}',
				]
			]
		);

		$this->add_control(
			// !!! Needs update with Bootstrap updates
			'link_align',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => __('Alignment', 'plugin-b2w'),
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

		$this->end_controls_section();
	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$target	=	$settings['link_url']['is_external'] ? ' target="_blank"' : '';
		$nofollow	=	$settings['link_url']['nofollow'] ? ' rel="nofollow"' : '';
		echo '<div class="link-box ' . $settings['link_align'] . ' ">';
		echo '<a class="colored-link font-weight-bold" href="' . $settings['link_url']['url'] . '" ' . $target . $nofollow . '>' .
		$settings['link_text'].'</a>';
		echo '</div>';
	}
}
