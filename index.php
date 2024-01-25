<?php
require_once "header.php";


$sql="SELECT users.id,users.name,category.*,books.* FROM books
JOIN users ON users.id=books.author_id
JOIN category ON category.cid=books.category_id";
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
        <div class="card">
          <img src="admin/uploads/<?= $book['image'] ?>" width="18rem" height="250px" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $book['title'] ?></h5>
            <p class="card-text">Author: <?= $book['name'] ?></p>
            <p class="card-text">Category: <?= $book['cat_name'] ?></p>
            <p class="card-text">Price: <?= $book['price'] ?></p>
            <a href="#" class="btn btn-primary">Buy Now</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
</div>

<?php

require_once "footer.php";

?>