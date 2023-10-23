<?php
/**
 * Define meta boxes for the plugin
 *
 * Loads and defines meta boxes for the plugin
 * 
 *
 * @link       https://phpete.com
 * @since      1.0.0
 *
 * @package    Phpete_Whatson
 * @subpackage Phpete_Whatson/admin
 *
 * @author     phpete <peter@phpete.com>
 */

class Phpete_Whatson_Meta_Boxes {

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->helper = new Phpete_Whatson_Helper;

        add_action('add_meta_boxes', array($this, 'add_whatson_form'));

        add_action('save_post', array( $this, 'save_whatson_meta_box' ) );

        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));

        add_action('admin_footer', array($this, 'initialize_scripts'));

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * This plugin uses the following stylesheets:
     *
     *  - Bootstrap Grid v5.3.2 - user to create grids in the meta box.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        wp_enqueue_style(
            'phpete-bootstrap-grid-css',
            plugin_dir_url(__FILE__) . 'css/bootstrap-grid.rtl.min.css',
            array(),
            $this->version,
            'all'
        );

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * This plugin calls on the following scripts:
     *
     * There are no scripts required for the admin area.
     * I have kept this function for future releases.
     *
     * @since    1.0.0
     */
    public function initialize_scripts() {

    }

    /**
     * Adds a new meta box to the following post type: phpete_whatson
     *
     * @since 1.0.0
     *
     */
    public function add_whatson_form() {

        add_meta_box(
            'whatson_meta_box',
            'Activity Frequency',
            array($this, 'render_whatson_form'),
            'phpete_whatson',
            'normal',
            'default'
        );

    }

    /**
     * Renders the content which is displayed within the meta box.
     *
     * @param object $post - The current post being edited. Values empty if a new post
     * @since 1.0.0
     */
    public function render_whatson_form($post) {

        $frequency = esc_attr(get_post_meta($post->ID, 'phpete_whatson_frequency', true));
        $start_time = esc_attr(get_post_meta($post->ID, 'phpete_whatson_start_time', true));
        $end_time = esc_attr(get_post_meta($post->ID, 'phpete_whatson_end_time', true));
        $all_post_meta = get_post_custom($post->ID);

        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/phpete-whatson-meta-boxes.php';

    }

    /**
     * Performs validation and proceeds to save the inputted data
     *
     * @param int $post_id
     * @since 1.0.0
     */
    public function save_whatson_meta_box($post_id) {

        $is_autosave = (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE);
        $has_permission = (current_user_can('edit_post', $post_id));
        $is_valid_nonce = isset($_POST['phpete_whatson_meta_box']) && wp_verify_nonce($_POST['phpete_whatson_meta_box'], 'save_whatson_meta_box');

        if ($is_autosave || !$has_permission || !$is_valid_nonce || !$_POST['phpete_whatson']) return;

        $this->save_inputs(
            $post_id,
            $this->validate_inputs()
        );

    }

    /**
     * Saves each input to the post_meta table using update_post_meta
     *
     * Note: the helper function deals with data sanitization.
     *
     * @param int $post_id
     * @param array $inputs
     * @since 1.0.0
     */
    public function save_inputs($post_id, $inputs) {

        update_post_meta($post_id, 'phpete_whatson_frequency', $this->helper->process_frequency($inputs['frequency']));
        update_post_meta($post_id, 'phpete_whatson_start_time', $this->helper->process_start_time($inputs['start_time']));
        update_post_meta($post_id, 'phpete_whatson_end_time', $this->helper->process_end_time($inputs['end_time']));

    }

    /**
     * Checks if all inputs are set and valid.
     * Returns an empty string for each invalid input
     *
     * "since 1.0.0
     */
    public function validate_inputs() {

        $inputs = $_POST['phpete_whatson'];

        if(!isset($inputs['frequency']) || !$this->helper->is_frequency_valid($inputs['frequency'])) {
            $inputs['frequency'] = '';
        }

        if(!isset($inputs['start_time']) || !$this->helper->is_start_time_valid($inputs['start_time'])) {
            $inputs['start_time'] = '';
        }

        if(!isset($inputs['end_time']) || !$this->helper->is_end_time_valid($inputs['end_time'])) {
            $inputs['end_time'] = '';
        }

        return $inputs;

    }

}