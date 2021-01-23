<?php

namespace EAddonsLiteForElementor\Modules\Proto\Widgets;

use Elementor\Group_Control_Typography;
use Elementor\Controls_Manager;
use EAddonsLiteForElementor\Base\Base_Widget;
use EAddonsLiteForElementor\Core\Utils;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Hello World
 *
 * Elementor widget for e-addons
 *
 */
class Hello extends Base_Widget {

    public function get_name() {
        return 'e-hello-world';
    }

    public function get_title() {
        return __('Hello World', 'e-addons');
    }

    public function get_description() {
        return __('A simple Hello World!', 'e-addons');
    }

    public function get_docs() {
        return 'https://e-addons.com';
    }

    public function get_icon() {
        return 'eicon-hypster';
    }

    public function get_categories() {
		return [ 'Prototype' ];
    }

    public function get_style_depends() {
        return ['e-addons-hello-world'];
    }
    
    public function get_script_depends() {
        return ['e-addons-hello-world'];
    }

    protected function _register_controls() {

        $this->start_controls_section(
                'section_content', [
            'label' => __('Hello World', 'e-addons')
                ]
        );
        $this->add_control(
                'text', [
            'label' => __('Text', 'e-addons'),
            'type' => Controls_Manager::TEXT,
            'default' => 'Hello World',
                ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
                'section_style', [
            'label' => __('Text', 'e-addons'),
            'tab' => Controls_Manager::TAB_STYLE,
                ]
        );
        $this->add_responsive_control(
                'align',
                [
                    'label' => __('Alignment', 'elementor'),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __('Left', 'elementor'),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => __('Center', 'elementor'),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => __('Right', 'elementor'),
                            'icon' => 'eicon-text-align-right',
                        ],
                        'justify' => [
                            'title' => __('Justified', 'elementor'),
                            'icon' => 'eicon-text-align-justify',
                        ],
                    ],
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                    ],
                ]
        );
        $this->add_group_control(
                Group_Control_Typography::get_type(), [
            'name' => 'text_typography',
            'label' => __('Typography', 'e-addons'),
            'selector' => '{{WRAPPER}}',
                ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        if (empty($settings))
            return;

        echo $settings['text'];
    }

}
