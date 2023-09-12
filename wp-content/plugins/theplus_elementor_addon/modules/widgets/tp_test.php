<?php 
/*
Widget Name: Blog Post Listing
Description: Different style of Blog Post listing layouts.
Author: Theplus
Author URI: https://posimyth.com
*/

namespace TheplusAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class ThePlus_test extends Widget_Base {

	public $TpDoc = THEPLUS_TPDOC;

	public function get_name() {
		return 'tp-test';
	}

    public function get_title() {
        return esc_html__('test', 'theplus');
    }

    public function get_icon() {
        return 'fa fa-newspaper-o theplus_backend_icon';
    }
	
	public function get_custom_help_url() {
		$DocUrl = $this->TpDoc . "blog-listing";

		return esc_url($DocUrl);
	}

    public function get_categories() {
        return array('plus-listing');
    }
	
    protected function register_controls(){

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'widget_title',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
			]
		);

		$this->add_control(
            'select_profile',
            [
                'label' => __('Select Profile', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'profile1' => __('Profile 1', 'your-text-domain'),
                    'profile2' => __('Profile 2', 'your-text-domain'),
                ],
                'default' => 'profile1', // Default selected profile.
            ]
        );

		$this->end_controls_section();
	}

	 protected function render() {
         $settings = $this->get_settings_for_display();

		 $selected_profile = $settings['select_profile'];

        // HTML markup for the profile cards.
        $profile1_html = '<div class="profile-card profile1">Profile 1 Content</div>';
        $profile2_html = '<div class="profile-card profile2">Profile 2 Content</div>';

        // Output the selected profile's HTML content.
        if ($selected_profile === 'profile1') {
            echo $profile1_html;
        } else {
            echo $profile2_html;
        }
	}

	
}