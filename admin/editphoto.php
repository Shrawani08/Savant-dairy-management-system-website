<?php
session_start();
?>
<?php
include_once "connection.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $selectid = "select * from productphoto where `id`='$id'";
    $idData = mysqli_query($con, $selectid);
    $rowid = mysqli_fetch_assoc($idData);

} else {
    header('location:products.php');
}

?>

<!doctype html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Products</title>
    <?php
    // include_once "headerfiles.php";
    ?>
</head>
<body>
<?php
include_once "adminheader2.php";
?>
<div class="container">
    
<br>

    <h2 class="text-center"><b>Edit Photo</b></h2>
    <form method="post" action="manage_photo.php" enctype="multipart/form-data">
    <!-- <div class="card-body card-block"> -->
<div class="form-group">
    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
</div>
    <div class="form-group">
			<label for="categories" class=" form-control-label">Image</label>
            <br>
		<input type="file" data-rule-required="true" name="photo" id="photo" class="form-control-file"><br>
        <img src="<?php echo $rowid['photo'] ?>"  style="width:50px;height:50px"/>
		</div>
								
		<div class="form-group">
			<label for="categories" class=" form-control-label">Caption</label>
		<textarea name="caption" placeholder="Enter product caption" class="form-control" required><?php echo $rowid['caption'] ?></textarea>
	    </div>

        <div class="form-group">
            <input type="hidden" name="action" value="update" id="action">
        <input type="submit" value="UPDATE" class="btn btn-lg btn-info btn-block">
        </div>
        </form>

</div>

<!-- <div class="container">
        <br>
        <h2 class="text-center"><b>Edit Category</b></h2>
        <form action="manage_categories.php" method="post">

        <div class="form-group">
        <label for="subcategories" class=" form-control-label">Category Name</label>
            <input type="text" name="categories" value="<?php echo $catcategories;?>" readonly class="form-control" categories="categories" placeholder="Enter Category" id="categories">
</div>

<div class="form-group">
        <label for="description" class=" form-control-label">Description</label>
            <input type="text" name="description" value="<?php echo $catrow[1];?>" class="form-control" placeholder="Enter Description" description="description">
</div>

<div class="form-group">
            <input type="hidden" name="action" value="update">
            <input type="submit" class="btn btn-primary btn-block" value="UPDATE">
        </form>
    </div> -->

<?php
include_once "footerfiles.php";
?>
</body>
    </html><?php
