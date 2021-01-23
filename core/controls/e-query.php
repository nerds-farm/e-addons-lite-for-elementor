<?php

namespace EAddonsLiteForElementor\Core\Controls;

use \Elementor\Control_Text;
use \Elementor\Modules\DynamicTags\Module as TagsModule;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Control Query
 */
class E_Query extends Control_Text {
    
    const CONTROL_TYPE = 'e-query';

    /**
     * Get control type.
     *
     * @since 1.0.1
     * @access public
     *
     * @return string Control type.
     */
    public function get_type() {
        return self::CONTROL_TYPE;
    }

    /**
     * Get e-query control default settings.
     *
     * Retrieve the default settings of the text control. Used to return the
     * default settings while initializing the text control.
     *
     * @since 1.0.1
     * @access public
     *
     * @return array Control default settings.
     */
    public function get_default_settings() {
        return [
            'dynamic' => [
                'active' => true,
                'categories' => [
                    TagsModule::BASE_GROUP,
                    TagsModule::TEXT_CATEGORY,
                    TagsModule::NUMBER_CATEGORY,
                ],
            ],
        ];
    }

}