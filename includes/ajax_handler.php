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

      print_r($_REQUEST);
      $user_id = wp_create_user( $_REQUEST['username'], $_REQUEST['password'], $_REQUEST['email']);
      $member_id = new WP_User($user_id);
      $member_id->set_role('subscriber');


      global $wpdb;
      $wpdb->insert(
        $this->table->member_details(),
        array(
          'name'     => $_REQUEST['name'],
          'email'    => $_REQUEST['email'],
          'phone'    => $_REQUEST['phone'],
          'user_id'  => $user_id
           
        )
      );
    }
    wp_die();
  }
}