<?php

require_once "header.php";

if(!isset($_SESSION['is_login'])){
  $_SESSION['error']="Email and Password are required";
  header("Location: login.php");
}

$sql="SELECT * FROM books";
$result=mysqli_query($conn,$sql);

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Books List</h1>
        </div>
    </div>
    <div class="row">
      <?php foreach ($result as $book) : ?>
        <div class="col-md-3">
          <div class="card" style="width: 18rem;">
            <img src="admin/uploads/<?=$book['image']?>" width="16rem" height="50px" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?=$book['title']?></h5>
              <p>Price: <?=$book['price']?></p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>

<?php

require_once "footer.php";

?>