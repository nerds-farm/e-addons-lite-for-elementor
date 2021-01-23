<?php

namespace EAddonsLiteForElementor\Core;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * e-addons Utils.
 *
 * @since 1.0.1
 */
class Utils {
    
    use \EAddonsLiteForElementor\Core\Traits\Data;

    public static function get_dynamic_data($value, $fields = array(), $var = '') {
        if (!empty($value)) {
            if (is_array($value)) {
                foreach ($value as $key => $setting) {
                    $value[$key] = self::get_dynamic_data($setting, $fields, $var);
                }
            } else if (is_string($value)) {
                $value = apply_filters('e_addons/dynamic', $value, $fields, $var);                
            }
        }
        return $value;
    }

    static public function get_plugin_path($file) {
        return Helper::get_plugin_path($file);
    }

    public static function camel_to_slug($title, $separator = '-') {
        return Helper::camel_to_slug($title, $separator);
    }

    public static function slug_to_camel($title, $separator = '') {
        return Helper::slug_to_camel($title, $separator);
    }

    public static function e_admin_notice($msg = '', $level = 'warning', $dismissible = true) {
        $msg = Utils::to_string($msg);
        ?>
        <div class="e-add-notiice <?php echo $level . ' notice-' . $level; ?> notice<?php echo $dismissible ? ' is-dismissible' : ''; ?>">
            <i class="eadd-logo-e-addons"></i>
            <p>
                <strong>e-addons:</strong> 
                <?php _e($msg, 'e-addons-for-elementor'); ?>
            </p>
        </div>
        <?php
    }
    
    public static function get_addons($core = false) {
        $all_addons = array();
        if (!$core) {
            unset($all_addons['e-addons-for-elementor']);
        }
        return $all_addons;
    }
}
