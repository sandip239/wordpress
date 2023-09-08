<?php
use Elementor\Widget_Base;
class Elementor_Custom_Button_Widget extends Widget_Base {

    public function get_name() {
        return 'custom-button-widget'; // Change the widget name to match the class name
    }

    public function get_title() {
        return esc_html__('Custom Button', 'elementor-addon');
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return ['basic'];
    }

    protected function render() {
        // Get widget settings
        $settings = $this->get_settings();

        // Get the selected button style
        $button_style = $settings['button_style'];

        // Output the button with the selected style
        echo '<a class="custom-button ' . esc_attr($button_style) . '">' . esc_html($settings['button_text']) . '</a>';
    }

    protected function _register_controls() {
        // Button Text Control
        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Click Me',
            ]
        );

        // Button Style Control (Dropdown)
        $this->add_control(
            'button_style',
            [
                'label' => __('Button Style', 'elementor-addon'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => __('Default', 'elementor-addon'),
                    'primary' => __('Primary', 'elementor-addon'),
                    'secondary' => __('Secondary', 'elementor-addon'),
                ],
            ]
        );
    }
}