<?php
use Elementor\Controls_Manager;
use Elementor\Widget_Base;

class My_Custom_Widget extends Widget_Base {
    public function get_name() {
        return 'my-custom-widget';
    }

    public function get_title() {
        return __('My Custom Widget', 'my-elementor-widget');
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $message = !empty($settings['message']) ? esc_html($settings['message']) : 'Hello, World!';

        echo '<div class="hello-world-widget">';
        echo '<p>' . $message . '</p>';
        echo '</div>';
    
        // Output the custom CSS
        $custom_css = $settings['custom_css'];
        if (!empty($custom_css)) {
            echo '<style>' . esc_html($custom_css) . '</style>';
        }
    
        // Output the custom JS
        $custom_js = $settings['custom_js'];
        if (!empty($custom_js)) {
            echo '<script>' . esc_html($custom_js) . '</script>';
        }
    
        // Output other content here based on your controls
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'my-elementor-widget'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'message',
            [
                'type' => Controls_Manager::TEXT,
                'label' => __('Message', 'my-elementor-widget'),
                'default' => __('Hello, World!', 'my-elementor-widget'),
            ]
        );


        
        $this->add_control(
            'custom_css',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label' => __('Custom CSS', 'my-elementor-widget'),
                'placeholder' => __('Enter your custom CSS code', 'my-elementor-widget'),
                'default' => '',
            ]
        );
        
        $this->add_control(
            'custom_js',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label' => __('Custom JS', 'my-elementor-widget'),
                'placeholder' => __('Enter your custom JS code', 'my-elementor-widget'),
                'default' => '',
            ]
        );
        

        // Define other controls here (size, open_lightbox, alignment, etc.)

        $this->end_controls_section();
    }

  
}
function enqueue_custom_widget_assets() {
    // Enqueue custom CSS
    wp_enqueue_style('my-elementor-widget-css', plugin_dir_url(__FILE__) . 'custom-widget.css', [], '1.0.0', 'all');

    // Enqueue custom JS
    wp_enqueue_script('my-elementor-widget-js', plugin_dir_url(__FILE__) . 'custom-widget.js', ['jquery'], '1.0.0', true);
}

add_action('elementor/frontend/after_enqueue_styles', 'enqueue_custom_widget_assets');
add_action('elementor/frontend/after_enqueue_scripts', 'enqueue_custom_widget_assets');

