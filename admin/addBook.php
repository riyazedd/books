<?php
require_once "header.php";

$catSql="SELECT * FROM category";
$catResult=mysqli_query($conn,$catSql);

if(!empty($_POST)){
    $category_id=$_POST["category_id"];
    $author_id=$loginUser['id'];
    $title=$_POST["title"];
    $price=$_POST["price"];
    $image="";
    if(!empty($_FILES['image']['name'])){
        $image=$_FILES['image']['name'];
        $tmp=$_FILES['image']['tmp_name'];
        $path='uploads/';
        move_uploaded_file($tmp,$path.$image);
    }
    $page_number=$_POST["page_number"];
    $sql="INSERT INTO books (author_id,category_id, title, price, image,page_number) VALUES ('$author_id','$category_id', '$title', '$price','$image','$page_number')";
    $result=mysqli_query($conn,$sql);
    if($result){
        $_SESSION['success']="Book Added Successfully";
    }else{
        $_SESSION['error']="Error Adding Book";
    }
}


?>

<div class="row">
    <div class="col-md-12">
        <h1>Add Book</h1>
        <?php if(isset($_SESSION['success'])) : ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success'] ?>
            </div>
        <?php 
            unset($_SESSION['success']);
            endif;
        ?>
    </div>
    <div class="col-md-12">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="category" required class="form-control">
                    <option value="">Select Category</option>
                    <?php foreach ($catResult as $cat) : ?>
                        <option value="<?=$cat['cid']?>"><?=$cat['cat_name']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" required class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" required class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" required class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="page_number">Page Number</label>
                <input type="number" name="page_number" id="page_number" required class="form-control">
            </div>
            <div class="form-group mb-2">
                <button class="btn btn-success">Add Book</button>
            </div>
        </form>
    </div>

    
</div>

