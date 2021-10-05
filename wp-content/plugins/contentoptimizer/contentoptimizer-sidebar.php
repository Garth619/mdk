<?php

/**
 * Short description. (use period)
 *
 * Long description.
 *
 * @since x.x.x
 *
 */
class Content_Optimizer_Sidebar
{
    /**
     * Short description. (use period)
     *
     * @since x.x.x
     * @access private
     * @var type $var Description.
     */
    private $is_gutenberg;

    /**
     * Instantiates the plugin by setting up the core properties and loading
     * all necessary dependencies and defining the hooks.
     *
     * The constructor will define....
     */
    public function __construct()
    {
        add_action('current_screen', array($this, 'set_is_gutenberg'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_assets'));
        add_action('add_meta_boxes', array($this, 'meta_box_sidebar'));
    }

    private function is_loadable()
    {
        global $post;
        if ($post) {
            $post_type = get_post_type($post->ID);
            $public_post_types = get_post_types(array('public' => true));
            $loadable_post_types = array_keys(array_filter($public_post_types, 'is_post_type_viewable'));
            return in_array($post_type, $loadable_post_types);
        }
        return false;
    }

    /**
     * Lorem ipsum dolor sit amet, consectetur adipisicing elit.
     *
     * Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
     */
    public function meta_box_sidebar()
    {
        if (current_user_can('manage_options')) {
            $screens = ['post', 'page'];
            foreach ($screens as $screen) {
                add_meta_box(
                    'contop_box_id',
                    'Content Optimizer',
                    array($this, 'meta_box_sidebar_content'),
                    $screen,
                    'side',
                    'high'
                );
            }
        }
    }

    public function meta_box_sidebar_content()
    {
        ?>

<div id="contop-get-reports" class="contop-box">
  <div id="status"></div>
  <p>Add a Report</p>
  <button id="contop-get-reports-btn">Get Reports</button>
</div>
<?php
}

    public function set_is_gutenberg()
    {
        if (get_current_screen()->is_block_editor()) {
            $this->is_gutenberg = true;
        } else {
            $this->is_gutenberg = false;
        }
    }

    public function enqueue_assets()
    {
        if (!$this->is_loadable()) {
            return;
        }$dependencies = array(
            'wp-plugins',
            'wp-element',
            'wp-data',
            'wp-components',
            'wp-dom-ready',
            //'wp-tinymce',
        );
        wp_enqueue_style('contentoptimizer-styles', plugin_dir_url(__FILE__) . 'css/contentoptimizer.css', array(), 1, 'all');
        wp_enqueue_script('contentoptimizer-js', plugin_dir_url(__FILE__) . 'js/contentoptimizer.js', $dependencies);
        wp_localize_script('contentoptimizer-js', 'contentoptimizer_globals',
            array(
                'is_gutenberg' => $this->is_gutenberg ? "gutenberg true" : "gutenberg false",
                'post_url' => get_edit_post_link(null, 'not display'),
                'plugin_dir' => plugin_dir_url(__FILE__),
            )
        );
    }
}