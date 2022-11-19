<?php

include 'env.php';
$request=$_GET;

$id=$request['id'];
$query="SELECT * FROM users WHERE id='$id'";

$result= mysqli_query($connect,$query);
 $data=mysqli_fetch_assoc($result);

?>
<header>
<?php  
include 'header.php';
?>
</header>
<section>

    <div class="container mt-5">
     <h2>Show post</h2>
     <div class="car">
     <table class="table table-responsive">
     <tr>
                  <td>Name</td>
                  <td>:</td>
                  <td><?=$data['name']?></td>

                    </tr>
                    <tr>
                    <td>Email</td>
                  <td>:</td>
                  <td><?=$data['email']?> </td>
                    </tr>
  
     </table>

</div>

     </div>
 
     </div>
</section>
<footer>
<?php
include 'footer.php';
?>
</footer>
     
</body>
</html>