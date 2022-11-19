<?php
session_start();


?>
<header>
  <?php
  include_once 'header.php'
  ?>
</header>
<section>
<div class="card">
  <form  action="../controller/singup.php" method="post" enctype="multipart/form-data" class="login">
    <div class="container1">
    <div class="row">
        <div class="col-md-6">
        <div class="mb-3">
        <label class="form-label" >Name</label>
    <input type="text" class="form-control" placeholder="Enter Your Name" name="name"value="<?=isset($_SESSION['old_data']['name'])?
    $_SESSION['old_data']['name']:''?>">
   <?php
   if(isset( $_SESSION['errors']['name'])){
   ?>
    <p class="text-danger">
   <?php
     echo $_SESSION['errors']['name']
     ?>
     </p>
     <?php
    }
    ?>
  </div>
  <div class="mb-3">
    <label class="form-label" >Email address</label>
    <input type="type" class="form-control"  placeholder="Enter Your Email" name="email" value="<?=isset($_SESSION['old_data']['email'])?
    $_SESSION['old_data']['email']:''?>">
    <?php
    if(isset($_SESSION['errors']['email'])){
    ?>
    <p class="text-danger">
   <?php
     echo $_SESSION['errors']['email']
     ?>
     </p>
     <?php
    }
    ?>
  
  <div class="md-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="Password" name="password">
  </div>
  <?php
  if(isset($_SESSION['errors']['password'])){
  ?>
  <p class="text-danger">
   <?php
     echo $_SESSION['errors']['password']
     ?>
     </p>
     <?php
  }
  ?>
  <br>
  <button type="submit" name="submit" class="button">Submit</button>
</form>
</div>
</div>
</div>
</div>
<?php
 
 if(isset( $_SESSION['success'])){
  ?>
  <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" s>
  <div class="toast-header">
    <strong class="mr-auto">Sing_up</strong>

    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
  <?=$_SESSION['success']?>
  </div>
</div>
<?php
 }
?>
<br><br>
</section>
<footer>
<?php
include 'footer.php';
?>
</footer>

  </body>
</html>
<?php
SESSION_unset();
?>