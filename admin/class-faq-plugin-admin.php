<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @author     Yoan Marchal <marchalyoan@gmail.com>
 */
class faq_plugin_Admin
{
    /**
         * The ID of this plugin.
         *
         * @since    1.0.0
         *
         * @var string The ID of this plugin.
         */
        private $faq_plugin;

        /**
         * The version of this plugin.
         *
         * @since    1.0.0
         *
         * @var string The current version of this plugin.
         */
        private $version;

         /**
          * Initialize the class and set its properties.
          *
          * @since    1.0.0
          *
          * @param      string    $faq_plugin       The name of this plugin.
          * @param      string    $version    The version of this plugin.
          */

         /**
          * Holds the values to be used in the fields callbacks.
          */
         private $options;

    public function __construct($faq_plugin, $version)
    {
        $this->faq_plugin = $faq_plugin;
        $this->version = $version;
        add_action('init', [$this, 'init_cpt_faq']);
    }

        /**
         * Register the stylesheets for the admin area.
         *
         * @since    1.0.0
         */
        public function enqueue_styles()
        {

            /*
             * This function is provided for demonstration purposes only.
             *
             * An instance of this class should be passed to the run() function
             * defined in faq_plugin_Loader as all of the hooks are defined
             * in that particular class.
             *
             * The faq_plugin_Loader will then create the relationship
             * between the defined hooks and the functions defined in this
             * class.
             */

            wp_enqueue_style($this->faq_plugin, plugin_dir_url(__FILE__).'css/faq-plugin-admin.css', [], $this->version, 'all');
        }

        /**
         * Register the JavaScript for the admin area.
         *
         * @since    1.0.0
         */
        public function enqueue_scripts()
        {

            /*
             * This function is provided for demonstration purposes only.
             *
             * An instance of this class should be passed to the run() function
             * defined in faq_plugin_Loader as all of the hooks are defined
             * in that particular class.
             *
             * The faq_plugin_Loader will then create the relationship
             * between the defined hooks and the functions defined in this
             * class.
             */

            wp_enqueue_script($this->faq_plugin, plugin_dir_url(__FILE__).'js/faq-plugin-admin.js', ['jquery'], $this->version, false);
        }

    public function init_cpt_faq()
    {
        $labels = [
        'name'                => _x('faq', 'Post Type General Name', 'faq-plugin'),
        'singular_name'       => _x('Question', 'Post Type Singular Name', 'faq-plugin'),
        'menu_name'           => __('Question', 'faq-plugin'),
        'parent_item_colon'   => __('Parent Question:', 'faq-plugin'),
        'all_items'           => __('All faq', 'faq-plugin'),
        'view_item'           => __('View Question', 'faq-plugin'),
        'add_new_item'        => __('Add New Question', 'faq-plugin'),
        'add_new'             => __('New Question', 'faq-plugin'),
        'edit_item'           => __('Edit Question', 'faq-plugin'),
        'update_item'         => __('Update Question', 'faq-plugin'),
        'search_items'        => __('Search faq', 'faq-plugin'),
        'not_found'           => __('No faq found', 'faq-plugin'),
        'not_found_in_trash'  => __('No faq found in Trash', 'faq-plugin'),
    ];

        $args = [
        'label'               => __('faq', 'faq-plugin'),
        'description'         => __('faq', 'faq-plugin'),
        'labels'              => $labels,
        'supports'            => ['title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields'],
        'taxonomies'          => ['category', 'post_tag'],
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_admin_bar'   => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-megaphone',
        'can_export'          => false,
        'has_archive'         => 'faqs',
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    ];

        register_post_type('faq', $args);
    }
}
