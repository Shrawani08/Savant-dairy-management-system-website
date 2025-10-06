<?php
session_start();
?>
<?php
include_once "connection.php";
$catcategories = $catrow = '';
if (isset($_GET['categories'])) {

    $catcategories = $_GET['categories'];
    $selectcat = "select * from categories where categories='$catcategories'";
    $catdata = mysqli_query($con, $selectcat);
    $catrow = mysqli_fetch_array($catdata);
} else {
    header("location:adminhome.php");
}
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit Category</title>
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
        <h2 class="text-center"><b>Edit Category</b></h2>
        <form action="manage_categories.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
        <label for="subcategories" class=" form-control-label">Category Name</label>
            <input type="text" name="categories" value="<?php echo $catcategories;?>" readonly class="form-control" categories="categories" placeholder="Enter Category" id="categories">
</div>

<div class="form-group">
        <label for="description" class=" form-control-label">Description</label>
            <input type="text" name="description" value="<?php echo $catrow[1];?>" class="form-control" placeholder="Enter Description" description="description">
</div>
<div class="form-group">
			<label for="categories" class=" form-control-label">Image</label>
		<input type="file" data-rule-required="true" name="photo" id="photo" class="form-control-file">
        <img src="<?php echo $rowid['photo'] ?>"  style="width:50px;height:50px"/>
		</div>
<div class="form-group">
            <input type="hidden" name="action" value="update">
            <input type="submit" class="btn btn-primary btn-block" value="UPDATE">
        </form>
    </div>

    <?php
    include_once "footerfiles.php";
    ?>
    </body>
    </html>
