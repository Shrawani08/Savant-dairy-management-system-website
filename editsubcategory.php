<?php
session_start();
?>
<?php
include_once "connection.php";

if (isset($_GET['subcategoryid'])) {
    $subcategoryid = $_GET['subcategoryid'];
    $selectid = "select * from subcategory where subcategoryid='$subcategoryid'";
    $idData = mysqli_query($con, $selectid);
    $rowid = mysqli_fetch_assoc($idData);

} else {
    header('location:subcategory.php');
}

?>
    <!doctype html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Subcategory</title>
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
    <h2 class="text-center"><b>Edit SubCategories</b></h2>
    <form action="manage_subcategories.php" method="post">
        <div>
            <input type="hidden" name="subcatID" value="<?php echo $_GET['subcategoryid'] ?>">
        </div>
    <div class="form-group">
            <label for="categories"></label>
            <select required name="categories" id="categories" class="form-control">
                <option value="">Select Category</option>
                <?php
                $selectcat = "select * from categories";
                $catData = mysqli_query($con, $selectcat);
                while ($rowcat = mysqli_fetch_assoc($catData)) {

                    ?>
                    <option <?php if ($rowcat['categories'] == $rowid['categories']) {
                        echo 'selected';
                    } ?> value="<?php echo $rowcat['categories'] ?>"><?php echo $rowcat['categories'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
		<label for="subcategories" class=" form-control-label">Subcategory Name</label>
			<input type="text" name="subcategoryname" value="<?php echo $rowid['subcategoryname'] ?>" placeholder="Enter Subcategory name" class="form-control">
		</div>
					
        <!-- <div class="form-group">
		<label for="brand" class=" form-control-label">Brand Name</label>
			<input type="text" name="brand" value="<?php echo $rowid['Brands'] ?>" placeholder="Enter Brand name" class="form-control">
		</div> -->

		<div class="form-group">
		<label for="subcategories" class=" form-control-label">Description</label>
			<input type="text" name="description" value="<?php echo $rowid['description'] ?>" placeholder="Enter Description" class="form-control">
		</div>

        <div class="form-group">
            <input type="hidden" name="action" value="update" id="action">
            <input type="submit" value="UPDATE" class="btn btn-lg btn-info btn-block">
        </div>

    </form>
</div>
<?php
include_once "footerfiles.php";
?>
</body>
    </html><?php
