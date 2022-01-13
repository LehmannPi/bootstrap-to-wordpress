<?php

namespace WPC\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit;

class Custom_Button extends Widget_Base
{

	public function get_name()
	{
		return 'b2w_button';
	}

	public function get_title()
	{
		return __('Button', 'plugin-b2w');
	}

	public function get_icon()
	{
		return 'eicon-button';
	}

	
	public function get_categories()
	{
		return ['b2w'];
	}
	
	public function get_keywords()
	{
		return ['b2w', 'btn', 'button', 'link', 'ui', 'cta'];
	}
	
	// public function get_custom_help_url() {}
	
	// public function get_script_depends() {}

	// public function get_style_depends() {}

	protected function register_controls()
	{

		$this->start_controls_section(
			'b2w_buttons',
			[
				'label' => __('Button', 'plugin-b2w'),
				'tab'	=>	\Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		// All the controls that we will have (example: textfields & wysiwyg)

		$this->add_control(
			'button_text',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block'	=>	true,
				'label' => __('Button Text', 'plugin-b2w'),
				'placeholder'	=> __('Type something here friend.', 'plugin-b2w'),
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

		$this->add_responsive_control(
			// !!! Needs update with Bootstrap updates
			'button_align',
			[
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label' => __('Alignment', 'plugin-b2w'),
				'options'	=>	array(

					'left'	=>	[
						'title'	=>	__('Left', 'plugin-b2w'),
						'icon'	=>	'eicon-text-align-left',
					],

					'center'	=>	[
						'title'	=>	__('Center', 'plugin-b2w'),
						'icon'	=>	'eicon-text-align-center',
					],

					'right'	=>	[
						'title'	=>	__('Right', 'plugin-b2w'),
						'icon'	=>	'eicon-text-align-right',
					],
				),
				'default'	=>	'left',
				'devices'	=>	['desktop','tablet','mobile'],
				'selectors'	=>	[
					'{{WRAPPER}} .link-box'	=>	'text-align: {{VALUE}}'
				],
				'toggle'	=>	true,
			]
		);

		$this->end_controls_section();

		/** //! Would work this way ( e.g. with different names )
		$this->start_controls_section(
			'content_section2',
			[
				'label' => 'Settings2'
			]
		);

		// All the controls that we will have (example: textfields & wysiwyg)

		$this->add_control(
			'title2',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => 'Content Heading2',
				// 'label' => esc_html__('Title', 'plugin-name'),
				'default'	=> 'Example title',
				// 'placeholder' => esc_html__('Enter your title', 'plugin-name'),
			]
		);

		$this->add_control(
			'content2',
			[
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'label' => 'Content2',
				// 'label' => esc_html__('Title', 'plugin-name'),
				'default'	=> 'Some content. Start editing here.',
				// 'placeholder' => esc_html__('Enter your title', 'plugin-name'),
			]
		);

		$this->end_controls_section(); */
	}

	// PHP RENDERER

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$target = $settings['button_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow	= $settings['button_link']['nofollow'] ? ' rel="nofollow"' : '';

		// ? dot is a concatenation operator
		echo '<div class="link-box">';
		echo '<a href="' . $settings['button_link']['url'] . '" ' . $target . $nofollow . ' class="btn ' . $settings['button_style'] . ' ">' . $settings['button_text'] . '</a>';
		echo '</div>';

		// $this->add_inline_editing_attributes('content', 'basic');
		// ! This is necessary for adding attributes to inline editors
		// $this->add_render_attribute(
		// 	'content',
		// 	['class' => 'btn-primary']
		// )

		/** // * Earlier version with open html
?>
		<div>
			<a class="btn btn-primary"> <?php echo $settings['title'] ?> </a>
			<!-- <div <?php echo $this->get_render_attribute_string('content'); ?>><?php echo __($settings['content'], 'default text') ?></div> -->
		</div>
<?php
		 */
	}

	/** A TEMPLATE FOR EDITING INLINE USING JS 
	protected function content_template()
	{
	?>
		<# view.addInlineEditingAttributes('content', 'basic' ); #>
			<!--  ! Complementar code to inline editors
			view.addRenderAttribute( 'content' , { 'class' : ['btn-primary'], } ); -->

			<a class="btn btn-primary"> {{{ settings.title }}}</a>
			<!-- <div {{{ view.getRenderAttributeString('content')}}}>{{{settings.content}}}</div> -->
	<?php
		// echo '<h2>I work in JS</h2>';
	}	*/
}
