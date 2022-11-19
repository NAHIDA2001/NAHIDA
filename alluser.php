
<?php
session_start();
include 'env.php';
$query="SELECT * FROM users";
$result=mysqli_query($connect,$query);
 
$data=mysqli_fetch_all($result,1);


?>
<header>
  <?php
include_once 'header.php';
?>
</header>
<section>
<div class="card">
 <?php
if(isset( $_SESSION['success'])){
  ?>
  <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" style="position:absolute; bottom: 20px;right: 20px;">
  <div class="toast-header">
    <strong class="mr-auto">Sing_up</strong>

    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
    <div class="toast-body">
  <?=$_SESSION['success']?>
  </div>
    </button>
  </div>
 
</div>
<?php
 }
 ?>


    <div class="container mt-5">
     <h2>All User</h2>
     <table class="table table-responsive">
     <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
        </tr>
        <tr>
      <?php
      foreach ($data as $key=> $datas) {
        ?>
       
            <td><?=++$key?></td>
            <td><?=strlen($datas['name'])>10?substr($datas['name'],0,10).'...':$datas['name']?></td>
            <td><?=$datas['email']?></td>
            <td>
                <div class="btn-groups">
                 <a href="./show.php?id=<?=$datas['id']?>" class="btn btn-primary">View</a>
                 <a href="./edit.php?id=<?=$datas['id']?>" class="btn btn-warning">Edit</a>
                 <a href="../controller/delet.php?id=<?=$datas['id']?>"class="btn btn-danger">Delete</a>
                 </div>
            </td>
       
          </tr>
          <?php
      }
      ?>
      <?php
      if(mysqli_num_rows($result)==0){
        ?>
        <tr class="text-center">
          <td colspan="s">No Data Found</td>
        </tr>
       <?php 
      }
      ?>


     </table>
     </div>
     </div>
     </section>
     <footer>
<?php
include 'footer.php';
?>
</footer>
 
<?php 
session_unset();
?>


</body>
</html>