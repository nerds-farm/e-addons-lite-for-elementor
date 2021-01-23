<?php

namespace EAddonsLiteForElementor\Base;

use EAddonsLiteForElementor\Core\Utils;
use Elementor\Element_Base;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

abstract class Base_Global extends Element_Base {

    use \EAddonsLiteForElementor\Base\Traits\Base;

    public function get_icon() {
        return 'eicon-globe';
    }

}
