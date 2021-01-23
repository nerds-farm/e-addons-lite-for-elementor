<?php

namespace EAddonsLiteForElementor\Core\Dashboard;

use EAddonsLiteForElementor\Core\Utils;
use EAddonsLiteForElementor\Base\Module_Base;
use Elementor\Settings;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Dashboard {

    public function __construct() {
        add_action('admin_menu', array($this, 'e_addons_menu'), 200);
        add_action('admin_enqueue_scripts', [$this, 'add_admin_dash_assets']);

        add_action("elementor/admin/after_create_settings/elementor", array($this, 'e_addons_elementor'));
    }
    
   public function e_plugin_action_links_settings($links) {
        $links['settings'] = '<a title="Configure settings" href="' . admin_url() . 'admin.php?page=e_addons_settings"><b>' . __('Settings', 'e_addons') . '</b></a>';
        return $links;
    }

    public function add_admin_dash_assets() {
        if (!empty($_GET['page'])) {
            switch ($_GET['page']) {
                case 'e_addons':
                case 'e_addons_settings':
                    wp_enqueue_style('e-addons-admin-settings');
                    break;
            }
        }
        wp_enqueue_style('e-addons-admin');
        wp_enqueue_style('e-addons-icons');
    }

    public function e_addons_menu() {
        add_menu_page(
                __('e-addons Settings', 'e-addons-for-elementor'),
                __('Settings', 'e-addons-for-elementor'),
                'manage_options',
                'e_addons',
                [
                    $this,
                    'settings'
                ],
                'dashicons-admin-generic',
                '58.5'
        );

    }

    public function settings() {
        include_once(__DIR__ . '/pages/settings.php');
    }

}
