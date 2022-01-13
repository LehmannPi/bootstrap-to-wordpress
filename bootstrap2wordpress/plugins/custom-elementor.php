<?php

// namespace WPC;

// use Elementor\Core\Page_Assets\Loader;
// use Elementor\Modules\Favorites\Types\Widgets;

class Widget_Loader
{

	private static $_instance = null;

	public static function instance()
	{
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	// ! Adding a widget category
	public function add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'b2w',
			[
				'title' => __('Bootstrap to Wordpress', 'plugin-b2w'),
				'icon' => 'eicon-carousel',
				// 'title' => esc_html__( 'First Category', 'plugin-name' ),
			]
		);	
	}
	// !

	private function include_widget_files()
	{
		require_once(__DIR__ . '/widgets/custom-button.php');
		require_once(__DIR__ . '/widgets/class-title.php');
		require_once(__DIR__ . '/widgets/class-link.php');
		require_once(__DIR__ . '/widgets/class-info-text-card.php');
		require_once(__DIR__ . '/widgets/class-cta.php');
		// require_once(__DIR__ . '/widgets/advertisement.php');
	}

	public function register_widget($widgets_manager)
	{

		$this->include_widget_files();

		$widgets_manager->register(new \WPC\Widgets\Custom_Button());
		$widgets_manager->register(new \WPC\Widgets\Section_Title());
		$widgets_manager->register(new \WPC\Widgets\Link_Widget());
		$widgets_manager->register(new \WPC\Widgets\Info_Card());
		$widgets_manager->register(new \WPC\Widgets\Call_To_Action());
		// \Elementor\Plugins::instance()->widgets_manager->register_widget_type(new Widgets\Advertisement());
		// \Elementor\Plugins::instance()->widgets_manager->register_widget_type(new Widgets\Advertisement());
	}

	public function __construct()
	{

		add_action('elementor/widgets/widgets_registered', [$this, 'register_widget'], 99);
		add_action( 'elementor/elements/categories_registered', [$this, 'add_elementor_widget_categories'] );
	}
};

Widget_Loader::instance();
