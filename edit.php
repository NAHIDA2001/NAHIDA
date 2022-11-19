<?php
session_start();
include 'env.php';

$id = $_GET['id'];
$query="SELECT * FROM users WHERE id='$id'";
$data=mysqli_query($connect,$query);

$result=mysqli_fetch_assoc($data);
?>
<header>
<?php
include_once 'header.php';
?>
</header>
<section>
<div class="card">
  <form  action="../controller/update.php" method="post" enctype="multipart/form-data" class="login">
    <div class="container1">
    <div class="row">
        <div class="col-md-6">
            <input type="hidden" name="id" value="<?=$result['id']?>">
        <div class="mb-3">
        <label class="form-label" >Name</label>
    <input type="text" class="form-control" value="<?=$result['name']?>" placeholder="Enter Your Name" name="name">
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
    <input type="type" class="form-control" placeholder="Enter Your Email" name="email" value="<?=$result['email']?>">
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
  <button type="submit" name="submit" class="button">Update</button>
</form>
</div>
</div>
</div>
</div>
</section>
<?php
include 'footer.php';
?>
</footer>
<?php
SESSION_unset();
?>

  </body>
</html>
