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
   
  //  $user_list = "CREATE TABLE `".$this->table_name->member_details()."` (
    // user list table
    $user_list = "CREATE TABLE `".$this->table_name->member_details()."` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `name` varchar(255) NOT NULL,
      `email` varchar(255) NOT NULL,
      `phone` varchar(255) NOT NULL,
      `join_date` timestamp NOT NULL DEFAULT current_timestamp(),
      `user_id` bigint(20) unsigned NOT NULL,
      PRIMARY KEY (`id`),
      UNIQUE KEY `user_id` (`user_id`),
      CONSTRAINT `wp_member_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `wp_users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8";


    // CREATE TABLE custom_table (
    //   custom_id bigint unsigned NOT NULL AUTO_INCREMENT,
    //   user_id bigint(20) unsigned NOT NULL,
    //   custom_data varchar(200) NULL,
    //   FOREIGN KEY (user_id) REFERENCES wp_users(ID) ON DELETE CASCADE,
    //   PRIMARY KEY (custom_id),
    //   UNIQUE (user_id)
    // )
  //   CREATE TABLE orders(
  //     id INT AUTO_INCREMENT PRIMARY KEY,
  //     order_date DATE,
  //     amount DECIMAL(8,2),
  //     customer_id INT,
  //     FOREIGN KEY(customer_id) REFERENCES customers(id)
  // );

  // CREATE TABLE membardetails (
  //   id INT AUTO_INCREMENT PRIMARY KEY,
  //   name varchar(255) NOT NULL,
  //   email varchar(255) NOT NULL,
  //   phone varchar(255) NOT NULL,
  //   user_id INT,
  //   FOREIGN KEY(user_id) REFERENCES wp_users(id)
  // );
  
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