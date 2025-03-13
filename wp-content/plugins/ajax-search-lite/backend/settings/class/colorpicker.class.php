<?php
if (!class_exists("wpdreamsColorPicker")) {
    /**
     * Class wpdreamsColorPicker
     *
     * A simple color picker UI.
     *
     * @package  WPDreams/OptionsFramework/Classes
     * @category Class
     * @author Ernest Marcinko <ernest.marcinko@wp-dreams.com>
     * @link http://wp-dreams.com, http://codecanyon.net/user/anago/portfolio
     * @copyright Copyright (c) 2014, Ernest Marcinko
     */
    class wpdreamsColorPicker extends wpdreamsType {
        function getType() {
            parent::getType();
            $this->data = wpdreams_admin_hex2rgb($this->data);
            echo "<div class='wpdreamsColorPicker'>";
            if ($this->label != "")
                echo "<label for='wpdreamscolorpicker_" . self::$_instancenumber . "'>" . esc_attr($this->label) . "</label>";
            echo "<input isparam=1 type='text' 
                    class='color' 
                    name='" . $this->name . "' 
                    id='wpdreamscolorpicker_" . self::$_instancenumber . "' 
                    value='" . esc_attr($this->data) . "' />";
            echo "<div class='triggerer'></div>
      </div>";
        }
    }
}
