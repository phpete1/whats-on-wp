<?php
/**
 * Define custom post types
 *
 * Loads and defines cusstom post types & taxomities for whatson
 * 
 *
 * @link       https://phpete.com
 * @since      1.0.0
 *
 * @package    Phpete_Whatson
 * @subpackage Phpete_Whatson/includes
 */

/**
 * Define custom post types
 *
 * Loads and defines custom post types & taxomities for whatson
 *
 * @since      1.0.0
 * @package    Phpete_Whatson
 * @subpackage Phpete_Whatson/includes
 * @author     phpete <peter@phpete.com>
 */
class Phpete_Whatson_Custom_Post_Types {

    public function __construct() {

        add_action( 'init', array( $this, 'phpete_whatson' ) );

    }

    /**
     * Registers a post type call phpete_whatson
     *
     * @since 1.0.0
     */
    public function phpete_whatson() {

        register_post_type(
            'phpete_whatson',
            array(
                'public'        =>  true,
                'labels'        =>  array(
                    'name'          => "What's On",
                    'add_new_item'  => 'Add New Activity',
                    'edit_item'     => 'Edit Activity',
                    'all_items'     => 'All Activities',
                    'singular_name' => 'Activity'
                ),
                'menu_icon'     => 'dashicons-calendar-alt',
                'has_archive'   => true,
                'rewrite'       => array(
                    'slug'  => 'activities'
                ),
                'supports'      => array(
                    'title',
                    'editor',
                    'thumbnail'
                ),
                'show_in_rest'  => true
            )
        );

    }

}