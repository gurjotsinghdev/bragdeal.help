<?php
/**
 * Plugin Name: Seatbelt
 * Plugin URI: https://gurjotsinghdev.vercel.app/seatbelt
 * Description: A developer friendly plugin that makes your website robust.
 * Version: 1.0
 * Author: Gurjot Singh
 * Author URI: https://gurjotsinghdev.vercel.app/
 */



// Disable WordPress core updates
add_filter('automatic_updater_disabled', '__return_true');

// Disable WordPress plugin updates
remove_action('load-update-core.php', 'wp_update_plugins');
add_filter('pre_site_transient_update_plugins', '__return_null');

// Disable WordPress theme updates
remove_action('load-update-core.php', 'wp_update_themes');
add_filter('pre_site_transient_update_themes', '__return_null');

// Remove Plugins Menu for all users
function remove_plugins_menu() {
    remove_menu_page('plugins.php');
}

add_action('admin_menu', 'remove_plugins_menu');

// Remove plugin management capabilities for all users
function remove_plugin_management_capabilities() {
    // Get all roles
    $roles = wp_roles()->roles;

    // Iterate through each role
    foreach ($roles as $role_name => $role_info) {
        // Get the role
        $role = get_role($role_name);

        // Remove capabilities related to plugin management
        $role->remove_cap('install_plugins');
        $role->remove_cap('activate_plugins');
        $role->remove_cap('update_plugins');
        $role->remove_cap('delete_plugins');
        $role->remove_cap('edit_plugins');
    }
}

// Hook the function to WordPress 'init'
add_action('init', 'remove_plugin_management_capabilities');





function complete_user_management_restriction() {
    global $wp_roles;
    if (!isset($wp_roles)) $wp_roles = new WP_Roles();

    $all_roles = $wp_roles->get_names();
    foreach ($all_roles as $role_name => $display_name) {
        $role = get_role($role_name);

        // Remove capabilities related to user management.
        $role->remove_cap('list_users');
        $role->remove_cap('create_users');
        $role->remove_cap('add_users');
        $role->remove_cap('edit_users');
        $role->remove_cap('promote_users');
        $role->remove_cap('delete_users');
        $role->remove_cap('remove_users');
    }
}

add_action('admin_init', 'complete_user_management_restriction');

// Hide the Users menu from the WordPress dashboard for all users.
function hide_users_menu() {
    remove_menu_page('users.php');
}

add_action('admin_menu', 'hide_users_menu');

function complete_dashboard_restriction() {
    global $wp_roles;
    if (!isset($wp_roles)) {
        $wp_roles = new WP_Roles();
    }

    $all_roles = $wp_roles->get_names();
    foreach ($all_roles as $role_name => $display_name) {
        $role = get_role($role_name);

        // Remove capabilities related to user management.
        $role->remove_cap('list_users');
        $role->remove_cap('create_users');
        $role->remove_cap('add_users');
        $role->remove_cap('edit_users');
        $role->remove_cap('promote_users');
        $role->remove_cap('delete_users');
        $role->remove_cap('remove_users');
    }
}

add_action('admin_init', 'complete_dashboard_restriction');

function hide_menus() {
    // Hide the Users menu
    remove_menu_page('users.php');
    // Hide the Tools menu
    remove_menu_page('tools.php');
}

add_action('admin_menu', 'hide_menus');

// Redirect custom login URL to wp-login.php

//More improvements to improve speed

// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// Disable REST API for Unauthenticated Users
add_filter('rest_authentication_errors', function($result) {
    if (!empty($result)) {
        return $result;
    }
    if (!is_user_logged_in()) {
        return new WP_Error('rest_not_logged_in', 'API Requests are only supported for authenticated requests', array('status' => 401));
    }
    return $result;
});

// Remove jQuery Migrate
add_action('wp_default_scripts', function($scripts) {
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        if ($script->deps) { // Check whether the script has any dependencies
            $script->deps = array_diff($script->deps, ['jquery-migrate']);
        }
    }
});

// Disable Emojis
add_action('init', function() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');    
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');  
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', function($plugins) {
        return is_array($plugins) ? array_diff($plugins, ['wpemoji']) : [];
    });
    add_filter('wp_resource_hints', function($urls, $relation_type) {
        if ('dns-prefetch' == $relation_type) {
            $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');
            $urls = array_diff($urls, [$emoji_svg_url]);
        }
        return $urls;
    }, 10, 2);
});

// Limit Post Revisions
define('WP_POST_REVISIONS', 5);

// Disable or Limit Heartbeat API
add_action('init', function() {
    wp_deregister_script('heartbeat');
});
add_filter('heartbeat_settings', function($settings) {
    $settings['interval'] = 60; // Increase the heartbeat interval from 15 to 60 seconds
    return $settings;
});

// Clean Up WordPress Head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);