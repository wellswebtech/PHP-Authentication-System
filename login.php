<?php require "includes/header.php"; ?>
<?php require "config.php"; ?>

<?php

// Check for submit
if(isset($_POST['submit'])) {
  if($_POST['email'] == '' OR $_POST['password'] == '') {
    echo "Either the username or password is empty";
  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Take the data and perform the query
    $login = $conn->query("SELECT * FROM users WHERE email = '$email'");
    // Execute the query
    $login->execute();
    // Fetch the data
    $data = $login->fetch(PDO::FETCH_ASSOC);
    // Check for the row count
    if($login->rowCount() > 0) {
      //echo $login->rowCount();
      // Make use of the password_verify function
      if(password_verify($password, $data['thepassword'])) {
        //echo "You are now logged in";

        // Creating a session and its respective variables
        $_SESSION['username'] = $data['username'];
        $_SESSION['email'] = $data['email'];
        // redirect to index.php
        header("location: index.php");
      } else {
        echo "The username or password entered is incorrect";
      }
    } else {
      echo "The username or password entered does not exist";
    }
  }
}

?>

<main class="form-signin w-50 m-auto">
  <form method="POST" action="login.php">
    <!-- <img class="mb-4 text-center" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
    <h1 class="h3 mt-5 fw-normal text-center">Please sign in</h1>

    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <!-- <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="user.name">
      <label for="floatingInput">Username</label>
    </div> -->
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <h6 class="mt-3">Don't have an account  <a href="register.php">Create your account</a></h6>
  </form>
</main>
<?php require "includes/footer.php"; ?>
