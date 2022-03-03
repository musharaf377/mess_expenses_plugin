<?php 

namespace Root\includes;

class Tables{

  public function member_details()
  {
    global $wpdb;
    return $wpdb->prefix . 'member_details';
    
  }

  public function user_profile()
  {
    global $wpdb;
    return $wpdb->prefix . 'user_profile';
  }

}