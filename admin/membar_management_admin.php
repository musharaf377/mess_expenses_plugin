<?php 

namespace Root\admin;

class Membar_management_admin{

  // enqueue styles and scripts
  public function enqueue_scripts(){

    wp_enqueue_style('main-style', PLUGIN_DIR_URL.'admin/assets/css/style.css');

    wp_enqueue_script('jquery');
    wp_enqueue_script('main-js', PLUGIN_DIR_URL.'admin/assets/js/scrpt.js');

  }

  // admin menu create
  public $capability = 'manage_options';
  public $menu_slug = 'membar_management';

 public function menu_create()
 {
  add_menu_page( __('Mess expenses','mess-expenses'), __('Mess expenses','mess-expenses'), $this->capability, $this->menu_slug,array($this,'mess_expenses_home_page'),'dashicons-money-alt', 6 );

  add_submenu_page($this->menu_slug, __('Expenses Overview','mess-expenses'), __('Expenses Overview','mess-expenses'), $this->capability, $this->menu_slug, array($this,'mess_expenses_home_page'));

  add_submenu_page($this->menu_slug, __('Membars','mess-expenses'), __('Membars','mess-expenses'), $this->capability, 'add_membar', [$this,'mess_expenses_add_membar']);

  add_submenu_page($this->menu_slug, __('Submission','mess-expenses'), __('Submission','mess-expenses'), $this->capability, 'add_expens', [$this,'mess_expenses_add_expens']);

 }

 public function mess_expenses_home_page(){
  require_once PLUGIN_DIR_PATH.'admin/partials/mess-expenses-home.php';
 }

  public function mess_expenses_add_membar(){
    require_once PLUGIN_DIR_PATH.'admin/partials/mess-expenses-membars.php';
  }
  
  function mess_expenses_add_expens(){
    require_once PLUGIN_DIR_PATH.'admin/partials/mess-expenses-submission.php';
  }
}