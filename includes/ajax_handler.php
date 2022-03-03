<?php 

namespace Root\includes;

use Root\includes\Tables;
use WP_User;

class Ajax_handler{

  public $table;

  public function __construct($table)
  {
    $this->table = $table;
  }

  public function add_membar()
  {
    if($_REQUEST['param'] == 'add_member'){

      $user_id = wp_create_user( $_REQUEST['username'], $_REQUEST['password'], $_REQUEST['email']);
      $user_id = new WP_User($user_id);
      $user_id->set_role('subscriber');


      global $wpdb;
      $wpdb->insert(
        $this->table->member_details(),
        array(
          'name'     => $_REQUEST['name'],
          'email'    => $_REQUEST['email'],
          'phone'    => $_REQUEST['phone'],
          'username' => $_REQUEST['username'],
          
        )
      );
    }
    wp_die();
  }
}