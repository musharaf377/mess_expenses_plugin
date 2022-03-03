<?php 

// namespace Root\public;

class Member_menegment_public{
  
   // Frontend enqueue styles and scripts
   public function frontend_enqueue(){

    wp_enqueue_style('public_main-style', PLUGIN_DIR_URL.'public/assets/css/style.css', array(), '1.0.0', 'all');

    wp_enqueue_script('jquery');
    wp_enqueue_script('public_jquery_validation', PLUGIN_DIR_URL.'public/assets/js/jquery_form_validation.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('public_main_js', PLUGIN_DIR_URL.'public/assets/js/script.js', array('jquery'), '1.0.0', true);


    wp_localize_script('public_main_js', 'ajaxurl',[admin_url('admin-ajax.php')]);

  }

}