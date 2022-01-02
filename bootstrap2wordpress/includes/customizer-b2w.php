<?php

use function PHPSTORM_META\type;

if (!class_exists('Kirki')) {
	return;
}

// ! Add Kirki Config

Kirki::add_config(

	'b2w_customizer_config',
	array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	)
);


// ! Panels (Wrappers)

Kirki::add_panel(
	'b2w_theme_options_panel',
	array(
		'priority'    => 10,
		'title'       => esc_html__('B2W Theme Options', 'bootstrap2wordpress'),
		'description' => esc_html__('Use this to customize the B2W Theme', 'bootstrap2wordpress'),
	)
);

// ! Sections

Kirki::add_section(
	'b2w_subscribe_bar',
	array(
		'title'          => esc_html__('Subscribe Bar', 'bootstrap2wordpress'),
		// 'description'    => esc_html__('My section description.', 'bootstrap2wordpress'),
		'panel'          => 'b2w_theme_options_panel',
		'priority'       => 40,
	)
);

// ! Start Subscribe Bar Fields

Kirki::add_field(
	'b2w_customizer_config',
	array(
		'type'     => 'textarea',
		'settings' => 'subscribe_text',
		'label'    => esc_html__('Textarea Control', 'bootstrap2wordpress'),
		'section'  => 'b2w_subscribe_bar',
		'default'  => esc_html__('This is a default value: Quick web solutions to help you reach your goals!', 'bootstrap2wordpress'),
		'priority' => 10,
	)
);

Kirki::add_field(
	'b2w_customizer_config',
	[
		'type'        => 'code',
		'settings'    => 'subscribe_form',
		'label'       => esc_html__('Opt-in Form HTML', 'bootstrap2wordpress'),
		'description' => esc_html__('Embed HTML from your preferred email marketing tool', 'bootstrap2wordpress'),
		'section'     => 'b2w_subscribe_bar',
		'priority' 		=> 10,
	]
);

// ! Start Footer Section

Kirki::add_section(
	'b2w_footer_section',
	array(
		'title'          => esc_html__('Footer', 'bootstrap2wordpress'),
		'panel'          => 'b2w_theme_options_panel',
		'priority'       => 40,
	)
);

// ? Footer Section Fields

Kirki::add_field(
	'b2w_customizer_config',
	array(
		'type'			=> 'custom',
		'settings'	=> 'footes-form-placeholder-hr',
		'section'		=> 'b2w_footer_section',
		'default'		=> '<hr>',
		'priority'	=> 10,
	)
);

Kirki::add_field(
	'b2w_customizer_config',
	array(
		'type'						=> 'textarea',
		'settings'				=> 'footer_copyright',
		"label"						=> esc_html__('Footer Copywright Text', 'bootstrap2wordpress'),
		'section'					=> 'b2w_footer_section',
		'placeholder'			=> esc_html__('Enter copywirght text here', 'bootstrap2wordpress'),
		'default'					=> 'Copyright FLP Studios Inc.',
		'priority'				=> 10,
		'partial_refresh' => array(
			'footer-copyright' => array(
				'selector'				=> 'footer .copyright p',
				'render_callback'	=> function () {
					return get_theme_mod('footer_copyright');
				}
			)
		)
	)
);

Kirki::add_section(
	'footer_calltoaction_section',
	array(
		'priority'		=> 40,
		'title'				=> esc_html__('Call to Action', 'bootstrap2wordpress'),
		'section'			=> 'b2w_footer_section'
	)
);

// ! B2W Pre-Footer CTA Fields

Kirki::add_field(
	'b2w_customizer_config',
	array(
		'type'     => 'text',
		'settings' => 'footer_sub_heading',
		'label'    => esc_html__('Sub Heading', 'bootstrap2wordpress'),
		'tooltip'  => esc_html__('Call to Action Section', 'bootstrap2wordpress'),
		'section'  => 'footer_calltoaction_section',
		'default'  => esc_html__('Join the newsletter', 'bootstrap2wordpress'),
		'partial-refres' => array(
			'footer_sub_heading' => array(
				'selector'	=> '.footer-calltoaction p.sub-title',
				'render_callback'	=> function () {
					return get_theme_mod('footer_sub_heading');
				}
			)
		)
	)
);
