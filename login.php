<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $mysqli = require __DIR__ . "/database.php";

  $sql = sprintf("SELECT * FROM user
                  WHERE email = '%s'",
                  $mysqli->real_escape_string($_POST["email"]));

  $result = $mysqli->query($sql);

  $user = $result->fetch_assoc();

   if ($user) {

      if (password_verify($_POST["password"], $user["password_hash"])) {
        die("Login Successful!");
      }
   }

   $is_invalid = true;

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in & Sign up Form</title>
    <link rel="stylesheet" href="css/login.css" />
    <link href="img/irahlogo.png" rel="icon">
  </head>
  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">



            <form autocomplete="off" class="sign-in-form" method="post"> <!--LOGIN-->
              <div class="logo">
                <img src="./img/irahlogo.png" alt="easyclass" />
              </div>

              <div class="heading">
                <h2>Welcome to Irah</h2>
                <br>
                <h6>Not registered yet?</h6>
                <a href="#" class="toggle">Sign up</a>
              </div>
              
              <?php if ($is_invalid): ?>
               <em style="color: red;">Invalid Login <br></em>
              <?php endif; ?>
            
              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="email"
                    name="email"
                    id="email"
                    value="<?= htmlspecialchars($_POST["email"] ?? "") ?>"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label for="email">Email</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    name="password"
                    id="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label for="password">Password</label>
                </div>

                <input type="submit" value="Sign In" class="sign-btn" />

                <p class="text">
                  Forgotten your password or you login datails?
                  <a href="#">Get help</a> signing in
                </p>
              </div>
            </form>

            <form action="process-signup.php" autocomplete="off" class="sign-up-form" method="post" novalidate> <!--SIGN UP-->
              <div class="logo">
                <img src="./img/irahlogo.png" alt="easyclass" />
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input
                    type="text"
                    id="name"
                    name="name"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label for="name">Name</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="email"
                    id="email"
                    name="email"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label for="email">Email</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    id="password"
                    name="password"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label for="password">Password</label>
                </div>

                <div class="input-wrap">
                  <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    minlength="4"
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label for="password_confirmation">Repeat Password</label>
                </div>

                <input type="submit" value="Sign Up" class="sign-btn" />

                <p class="text">
                  By signing up, I agree to the
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="./img/image1.png" class="image img-1 show" alt="" />
              <img src="./img/image2.jpg" class="image img-2" alt="" />
              <img src="./img/image3.jpg" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>IRAH SOLUTIONS AND SERVICES INC.</h2>
                  <h2>ENGINEERING</h2>
                  <h2>"We do what we say"</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="js/app.js"></script>
  </body>
</html>
