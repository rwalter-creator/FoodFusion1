

<header> <!-- Header Section -->
  <div id="hlogo"> <!-- Header logo Section -->
    <img src="pics/foodfusionlogo.png" alt="Food Fusion Logo"> <!-- Link to the Header logo location -->
  </div>
  <div id="caption"> <!-- Caption Section with the name Bean Boutique -->
    <span id="capsize"><strong>Food Fusion</strong></span>
  </div>
  <div id="login"> <!-- login button -->
    <?php
    if (!empty($_SESSION['email']) && $_SESSION['email'] != null) {
      echo 'Welcome Back ' . $_SESSION['first_name'] . ' ';
      echo '<a href="' . 'logout.php' . '">Log Out!</a>';
    } else {

      echo '<button class="btn btn-outline-secondary" type="button" onclick="window.location.href=\'' . 'login.php' . '\'">Login</button>';
    }
    ?>

    <!-- <button onclick="window.location.href='Registration.php'">Login</button> -->


  </div>
</header>

<div class="clearfloat"></div>




<script src="Java_Script/hamburger.js"></script>

<!-- Login modal Section -->
<!--     <div id="myModal2" class="modallogin" role="dialog" aria-modal="true" aria-labelledby="loginModal">
      <div class="modal-content">
        <button class="close" id="closelogin" type="button" aria-label="Close">&times;</button>

        <h2 id="loginModalTitle">Welcome Back to FoodFusion!</h2>
        <p>Login to access your community.</p>

        <form action="#" method="POST">
          <label for="loginemail">Email</label>
          <input name="loginemail" type="email" required><br>
          <label for="loginpassword">Password</label>
          <input name="loginpassword" type="password" required><br>
          <button name="login" type="submit">Login</button>
          <a href="#">Forgot password?</a>
        </form>
      </div>

    </div> -->


<!-- Login Button -->
<!-- <button id="myBtn2" type="button">Login</button> -->

<!-- Modal -->
<!-- <div id="myModal2" class="modal" role="dialog" aria-modal="true" aria-labelledby="loginModalTitle">
  <div class="modal-content">
    <button class="close" type="button" aria-label="Close">&times;</button>
    <h2 id="loginModalTitle">Welcome Back to FoodFusion!</h2>
    <p>Login to access your community.</p>
    <form>
      <label for="loginemail">Email</label>
      <input id="loginemail" name="loginemail" type="email" required><br>
      <label for="loginpassword">Password</label>
      <input id="loginpassword" name="loginpassword" type="password" required><br>
      <button type="submit" onclick="window.location.href='Registration.php'">Login</button>
      #Forgot password?</a>
    </form>
  </div>
</div> -->

<!-- <script src="Java_Script/loginmodal.js"></script> -->