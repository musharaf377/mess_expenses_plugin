<?php 

namespace Root\includes;

class Mess_expens_shortcode{

  public function user_short_code()
  {
    // ob_start(); ?>

    <div class="wrap">
      <div class="user_login_from">
        <form action="javascript:void(0)" id="sing_up_form">
          <h2>Sign Up</h2>

          <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
          </div>
          
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
          </div>

          <div class="form-group">
            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Sign Up">
          </div>
        </form>
      </div>
    </div>
    
<?php
    // return ob_get_clean();

  }

}