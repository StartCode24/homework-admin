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

      <link rel="stylesheet" href=<?php echo base_url("assets/boxy-login/css/style.css");?>>


</head>

<body>

  <div id="login-button">
  <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
  </img>
</div>
<div id="container">
  <h1>Log In</h1>
  <span class="close-btn">
    <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
  </span>

  <?php echo form_open('Auth/cekLogin'); ?>
    <input type="text" name="username" placeholder="E-mail">
    <input type="password" name="password" placeholder="Password">
    <button style="margin-left:25px; padding: 4px 85px;" type="submit" class="btn btn-success">Log In</button>
    <div id="remember-container">
      <input type="checkbox" id="checkbox-2-1" class="checkbox" checked="checked"/>
      <span id="remember">Remember me</span>
      <span id="forgotten">Forgotten password</span>
    </div>
</form>
</div>
<?php if(isset($pesan)){
  echo $pesan;
} ?>

<!-- Forgotten Password Container -->
<div id="forgotten-container">
   <h1>Forgotten</h1>
  <span class="close-btn">
    <img src="https://cdn4.iconfinder.com/data/icons/miu/22/circle_close_delete_-128.png"></img>
  </span>

  <form>
    <input type="email" name="email" placeholder="E-mail">
    <a href="#" class="orange-btn">Get new password</a>
</form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



    <script  src=<?php echo base_url("assets/boxy-login/js/index.js");?>></script>




</body>

</html>
