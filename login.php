<?php
$sTitle = 'Login';
$sCss = 'login.css';
require_once './components/top.php';
?>

<form class="form-signin">
  <!-- <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
  <h1 class="h3 mb-3 font-weight-normal text-center">Please sign in</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" name="txtEmail" id="inputEmail" class="form-control" placeholder="Email address" value="av@kea.dk" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="txtPassword" id="inputPassword" class="form-control" placeholder="Password 6-20 characters" value="123456" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2019</p>
</form>


<?php
$sScript = 'login.js';
require_once './components/bottom.php';