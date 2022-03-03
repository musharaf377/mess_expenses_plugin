<?php 

  use Root\includes\Tables;


  global $wpdb;
  $tables = new Tables();


?>

<div class="wrap">
  <h1 class="wp-heading-inline">Membars</h1>
  <a href="" class="page-title-action">Add</a>

  <div class="add_membar_body_area">
    <!-- search form -->
  <p class="search-box">
    <label class="screen-reader-text" for="post-search-input">Search Posts:</label>
    <input type="search" id="post-search-input" name="s" value="" autocomplete="off">
    <input type="submit" id="search-submit" class="button" value="Search Posts">
  </p>

  <!-- overview table -->
  <table class="widefat fixed striped overview_table">
    <thead>
      <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Username</th>
        <th>Total Submission</th>
        <th>Total Expense</th>
        <th>Total Meal</th>
        <th>Present Balance</th>
      </tr>
    </thead>
    <tbody>

    <?php

    $table_name = $tables->member_details();

    $member_details = $wpdb->get_results( "SELECT * FROM $table_name" );

    // echo '<pre>';
    // print_r($member_details);
    
    $i = 1;
    foreach ( $member_details as $key => $value ) {
      
      // print_r($value);
    
    
    ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $value->name; ?></td>
        <td><?php echo $value->email; ?></td>
        <td><?php echo $value->phone; ?></td>
        <td><?php echo $value->username; ?></td>
      </tr>
    <?php } ?> 

    </tbody>
  </div>
</div>


