<?php 

namespace Root\includes;

class Deactivator{

  public $table_name; 

  public function __construct($table)
  {
      $this->table_name = $table;
  }

  public function deactivate()
  {
    // Drop Database Table
    global $wpdb;
    $wpdb->query("DROP TABLE IF EXISTS ".$this->table_name->member_details());
    $wpdb->query("DROP TABLE IF EXISTS ".$this->table_name->user_profile());

    // Delete Dynamic Page
    if(!empty(get_option('member_post_id'))){
      $page_id = get_option('member_post_id');
      wp_delete_post($page_id,true);
      delete_option('member_post_id');
    }
  }

}