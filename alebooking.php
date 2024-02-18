<?php
/*
Plugin Name: AleBooking
Plugin URI: https://aletheme.com/
Description: Наш первый плагин по бронированию.
Version: 1.0
Author: CRIKOVA
Author URI: https://aletheme.com/
License: GPLv2 or later
Text Domain: alebooking
*/

if(!defined('ABSPATH')) {
  die;
}

// myFirstClass - это стиль кэмэл кэйс
// MyFirstClass - стиль паскаль кейс, когда все первые буквы большие

class AleBooking
{
  public function __construct()
  {
    add_action('init', [$this,'custom_post_type']);
  }

  static function activation() {
    // update rewrite rules
    flash_rewrite_rules();
  }

  static function deactivation() {
    // update rewrite rules
    flash_rewrite_rules();
  }

  public function custom_post_type() {
    register_post_type('room', 
      [
        'public' => true,
        'label'  => esc_html__('Room', 'alebooking'),
        'supports' => ['title', 'editor', 'thumbnail'],
      ]
    );
  }
}

if(class_exists('AleBooking')) {
  $aleBooking = new AleBooking();
}

register_activation_hook(__FILE__, array($aleBooking, 'activation'));
register_deactivation_hook(__FILE__, array($aleBooking, 'deactivation'));
