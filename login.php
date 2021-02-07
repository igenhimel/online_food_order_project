<?php

require_once('loginbackend.php');
?>
  <div class="left">
          <div>
              <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">

                  <table>
                      <tr>
                      <td class="s"><p class="t">Log In</p></td>
                      <tr>
                          <td><label>Username</label></td>
                          <td><input type="text" placeholder="username" name="username"></td>
                      </tr>
                      <tr>
                          <td><label>Password</label></td>
                          <td><input type="password" placeholder="password" name="password"></td>
                      </tr>
                      <tr>
                          <td><input type="submit" value="Log In" name="login"></td>
                          <td><a href="forgot_pass.php" class="forgot">Forgot Password?</a></td>

                      </tr>

                  </table>
              </form>
          </div>
          <br>
          <div class="errmsglog"> <?php echo $errmsglog;
                    ?></div>

                    <div class="errmsglog3">
                    <?php
                    echo $errmsglog3;
                    ?></div>

      </div>
