<?php 
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Engineering Company</title>
  </head>
  <body>

  <form action="includes/login_auth.php" method="POST">

    <h2>Engineering Company</h2>
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="example@email.com" name="email" required>
    <br>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <br><br>

    <button type="submit" class="loginbtn">Log in</button>
  </form>`

<?php
  if (isset ($_SESSION['incorrect_pass'])) {
?>
    <p>Account ID or Password Doesn't Match</p>
<?php
  } else if (isset ($_SESSION['logged_out'])) {
?>
    <p>Please log in to access the system</p>
<?php
  }
?>
  </body>
</html>