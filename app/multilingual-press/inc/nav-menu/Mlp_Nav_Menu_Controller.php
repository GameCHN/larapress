<?php
/**
 * Front controller for language menu items.
 *
 * @version 2014.10.10
 * @author  Inpsyde GmbH, toscho
 * @license GPL
 */
class Mlp_Nav_Menu_Controller {

	/**
	 * Basic identifier for all sort of operations.
	 *
	 * @type string
	 */
	private $handle   = 'mlp_nav_menu';

	/**
	 * Post meta key for nav items.
	 *
	 * @type string
	 */
	private $meta_key = '_blog_id';

	/**
	 * Backend model.
	 *
	 * @var Mlp_Language_Nav_Menu_Data
	 */
	private $data;

	/**
	 * Backend view.
	 *
	 * @type Mlp_Simple_Nav_Menu_Selectors
	 */
	private $view;

	/**
	 * @type Mlp_Language_Api_Interface
	 */
	private $language_api;

	/**
	 * @type Mlp_Assets_Interface
	 */
	private $assets;

	/**
	 * Constructor
	 *
	 * @param Mlp_Language_Api_Interface $language_api
	 * @param Mlp_Assets_Interface       $assets
	 */
	public function __construct(
		Mlp_Language_Api_Interface $language_api,
		Mlp_Assets_Interface       $assets
	) {

		$this->language_api = $language_api;
		$this->assets       = $assets;
	}

	/**
	 * Register filter for nav menu items.
	 *
	 * @wp-hook template_redirect
	 * @return  void
	 */
	public function frontend_setup() {

		$frontend = new Mlp_Nav_Menu_Frontend(
			$this->meta_key,
			$this->language_api
		);

		add_filter( 'wp_nav_menu_objects', array ( $frontend, 'filter_items' ) );
	}

	/**
	 * Set up backend management.
	 *
	 * @wp-hook inpsyde_mlp_loaded
	 * @param string $js_url
	 * @return  void
	 */
	public function backend_setup( $js_url ) {

		$this->create_instances( $js_url );
		$this->add_actions();
	}

	/**
	 * Adds the meta box to the menu page
	 *
	 * @wp-hook admin_init
	 * @return  void
	 */
	public function add_meta_box() {

		$title = esc_html__( 'Languages', 'multilingualpress' );

		add_meta_box(
			$this->handle,
			$title,
			array ( $this->view, 'show_available_languages' ),
			'nav-menus',
			'side',
			'low'
		);
	}

	/**
	 * Create nonce, view and data objects.
	 *
	 * @wp-hook inpsyde_mlp_loaded
	 * @return  void
	 */
	private function create_instances() {

		$nonce = new Inpsyde_Nonce_Validator(
			$this->handle
		);
		$this->data = new Mlp_Language_Nav_Menu_Data(
			$this->handle,
			$this->meta_key,
			$nonce,
			$this->assets
		);
		$this->view = new Mlp_Simple_Nav_Menu_Selectors(
			$this->data
		);
	}

	/**
	 * Register callbacks for our actions.
	 * @return void
	 */
	private function add_actions() {

		add_action(
			'wp_loaded',
			array ( $this->data, 'register_script' )
		);

		add_action(
			'admin_enqueue_scripts',
			array ( $this->data, 'load_script' )
		);

		add_action(
			"wp_ajax_$this->handle",
			array ( $this->view, 'show_selected_languages' )
		);

		add_action(
			'admin_init',
			array( $this, 'add_meta_box' )
		);
	}
}