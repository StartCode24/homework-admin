<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <title>LogIn Form</title>
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Arimo" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Hind:300" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel='stylesheet' type='text/css'>
    <link href=<?php echo base_url("assets/css/bootstrap.min.css");?> rel="stylesheet" />
    <link href=<?php echo base_url("assets/css/signin.css");?> rel="stylesheet" />
    <style>
      #checkbox-remember-me {
        display: inline;  
      }
      p.copyright {
        margin: 1em;
      }
    </style>
  </head>
  <body class="text-center" cz-shortcut-listen="true">
    <?php echo form_open('Auth/cekLogin', array(
      'class' => 'form-signin'
      ));; ?>
    <img class="mb-4" src="<?php echo base_url("assets/img/");?>/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Email address">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>
    <p class="mt-5 mb-3 text-muted copyright">Homework Project © 2018</p>
    <div id="remember-container">
      <span id="remember"><input type="checkbox" id="checkbox-remember-me" class="checkbox" checked="checked"/>Remember me</span>
    </div>
    </form>
  </body>
</html>