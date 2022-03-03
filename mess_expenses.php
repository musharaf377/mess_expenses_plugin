<?php 
/**
 * Plugin Name: Mess Expenses
 * Plugin URI: http://www.wordpress.org/mess-expenses
 * Description: This is a plugin for managing mess expenses
 * Version: 1.0
 * Author: Musharaf Hossain
 * Author URI: http://www.mess-expenses.com/
 * License: GPL2
 * text-domain: mess-expenses
 * Domain Path: /languages
 */

 if(!defined('ABSPATH')){
   die;
  }

  // define constants
  define('PLUGIN_DIR_PATH',plugin_dir_path(__FILE__));
  define('PLUGIN_DIR_URL',plugin_dir_url(__FILE__));

  // include autoloader
  if(file_exists(PLUGIN_DIR_PATH.'/vendor/autoload.php')){
    require_once(PLUGIN_DIR_PATH.'/vendor/autoload.php');
  }

 // include classes
  use Root\includes\Activator;
  use Root\includes\Deactivator;
  use Root\includes\Tables;
  use Root\includes\Mess_expens_shortcode;
  use Root\admin\Membar_management_admin;
  use Root\includes\Ajax_handler;
  // use Root\public\Member_menegment_public;



 class Oop_plugin{

  public function __construct(){

    // register activation hook
    register_activation_hook(__FILE__, array($this, 'activation'));
    register_deactivation_hook(__FILE__, array($this, 'deactivation'));

    add_action('admin_menu', array($this, 'menu_create'));
    add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));

    add_shortcode('member_list', array($this, 'shortcode'));
    add_action('wp_enqueue_scripts', array($this, 'frontend_enqueue_scripts'));

    add_action('wp_ajax_mess_expenses', array($this, 'mess_expenses_add_member'));

  }

  // register activation hook
 public function activation()
 {  $tables = new Tables();

    $activator = new Activator($tables);
    $activator->activate();
   
    
 }

  // register deactivation hook
  public function deactivation()
  {
    $tables = new Tables();
    $deactivator = new Deactivator($tables);
    $deactivator->deactivate();
  }

  // admin menu create
  public function menu_create()
  {
    $admin = new Membar_management_admin();
    $admin->menu_create();
   
  }

  // enqueue styles and scripts
  public function enqueue_scripts(){
    $admin_enqueue = new Membar_management_admin();
    $admin_enqueue->enqueue_scripts();
  }

  // frontend enqueue scripts
   function frontend_enqueue_scripts(){
    require_once PLUGIN_DIR_PATH.'public/member_menegment_public.php';
    $public_enqueue = new Member_menegment_public();
    $public_enqueue->frontend_enqueue();
  }

  // shortcode
  public function shortcode(){
    $shortcode = new Mess_expens_shortcode();
    $shortcode->user_short_code();
    
  }

  // ajax handler
  public function mess_expenses_add_member()
  {
    $tables = new Tables();
    $ajax_handler = new Ajax_handler($tables);
    $ajax_handler->add_membar();
  }

}

new Oop_plugin();

