<?php 

namespace Root\includes;

class Activator{

  private $table_name;

  public function __construct($table)
  {
      $this->table_name = $table;
  }
  public function activate(){

    // dynamic create page
    $member_post_id = wp_insert_post(array(
      'post_title' => 'Mess Expenses',
      'post_type' => 'page',
      'post_status' => 'publish',
      'post_content' => '[member_list]'
    ));
   add_option('member_post_id', $member_post_id);

    // user list table
    $user_list = "CREATE TABLE `".$this->table_name->member_details()."` (
      `id` int(11) NOT NULL AUTO_INCREMENT,      
      `name` varchar(255) NOT NULL,
      `email` varchar(255) NOT NULL,
      `phone` varchar(255) NOT NULL,
      `username` varchar(255) NOT NULL,
      `join_date` timestamp NOT NULL DEFAULT current_timestamp(),
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $user_list );

    // user profile table
    $user_profile = "CREATE TABLE `".$this->table_name->user_profile()."` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `name` varchar(255) NOT NULL,
      `email` varchar(255) NOT NULL,
      `password` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $user_profile );
    
    
  }
  

  

}