      <?php
        if(isset($_SESSION['id'])){
          echo '<input type="submit" name="logout" value="Log out">';
        }else{
          echo '
            <a class="nav-link" href="login.php">
              <span class="no-icon">Log in</span>
            </a>';
        }
      ?>
