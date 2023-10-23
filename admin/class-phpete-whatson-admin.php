<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://phpete.com
 * @since      1.0.0
 *
 * @package    Phpete_Whatson
 * @subpackage Phpete_Whatson/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version & meta boxes for the plugin
 *
 * @package    Phpete_Whatson
 * @subpackage Phpete_Whatson/admin
 * @author     phpete <peter@phpete.com>
 */
class Phpete_Whatson_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		
		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->load_dependencies();

		$this->define_meta_boxes();

	}

    /**
     *
     * Load the required dependencies for the Admin facing functionality.
     *
     * Includes the following files that make up the plugin:
     *
     *  - Phpete_Whatson_Meta_Boxes. Adds a meta box to the following post type: phpete_whatson
     *  - Phpete_WhatsOn_Helper. A library of helper functions.
     *
     * @since    1.0.0
     * @access   private
     *
     */

	public function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-phpete-whatson-meta-boxes.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-phpete-whatson-helper.php';

	}

	/**
	 * Register the stylesheets for the admin area.
     *
     * This plugin calls on the following stylesheets:
     *
     *  There are no styles required for the admin area.
     *  I have kept this function for future releases.
     *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

	}

	/**
	 * Register the JavaScript for the admin area.
     *
     *  This plugin calls on the following scripts:
     *
     * There are no scripts required for the admin area.
     * I have kept this function for future releases.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

	}

    /**
     * Defines all the meta boxes used in the admin area
     *
     * @since   1.0.0
     */

	public function define_meta_boxes() {

        /**
         * The main meta box for the custom post type 'phpete_whatson'
         */
		new Phpete_Whatson_Meta_Boxes( $this->plugin_name, $this->version );
	}

}
