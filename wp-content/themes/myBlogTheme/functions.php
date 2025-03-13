<?php 
function mytheme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'mytheme_setup');

class Bootstrap_Navwalker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= '<ul class="dropdown-menu">';
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = implode(' ', $item->classes);
        $output .= '<li class="' . esc_attr($classes) . '">';
        $output .= '<a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
    }
}


function register_custom_menus() {
    register_nav_menus(array(
        'primary-menu'   => __('Primary Menu', 'your-theme-textdomain'),
        'secondary-menu' => __('Secondary Menu', 'your-theme-textdomain'),
        'footer-menu'    => __('Footer Menu', 'your-theme-textdomain'),
    ));
}
add_action('after_setup_theme', 'register_custom_menus');





function get_latest_posts_from_api() {
        
    }
    add_shortcode('latest_posts_api', 'get_latest_posts_from_api');

    function add_short_description_meta_box() {
        add_meta_box(
            'short_description_meta_box',  // Unique ID
            'Short Description',           // Box Title
            'short_description_meta_box_callback', // Callback function
            'post',                        // Post Type
            'normal',                      // Context
            'high'                         // Priority
        );
    }
    add_action('add_meta_boxes', 'add_short_description_meta_box');
    
    function short_description_meta_box_callback($post) {
        // Retrieve current meta value
        $short_description = get_post_meta($post->ID, '_short_description', true);
        
        // Security nonce
        wp_nonce_field('save_short_description_meta', 'short_description_nonce');
    
        // Input field
        echo '<textarea style="width:100%;height:100px;" name="short_description">' . esc_textarea($short_description) . '</textarea>';
    }
    

    function save_short_description_meta($post_id) {
        // Security check
        if (!isset($_POST['short_description_nonce']) || !wp_verify_nonce($_POST['short_description_nonce'], 'save_short_description_meta')) {
            return;
        }
    
        // Prevent auto-save and unauthorized updates
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
    
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    
        // Save or update the meta field
        if (isset($_POST['short_description'])) {
            update_post_meta($post_id, '_short_description', sanitize_textarea_field($_POST['short_description']));
        }
    }
    add_action('save_post', 'save_short_description_meta');
    
    
    
    
?>
