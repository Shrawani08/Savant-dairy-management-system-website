<?php
session_start();
?>
<?php
include_once "connection.php";
if (isset($_GET['productid'])) {
    $productid = $_GET['productid'];
    $selectid = "select * from product where `productid`='$productid'";
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


<script>
		
        function getcat(name) {
            let httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.response);
        
                  document.getElementById('subcategory').innerHTML=this.response;
        
                }
        
            }
            httpRequest.open('get', "casecadeaction.php?category=" + name, true);
            httpRequest.send();
        }
            </script>
</head>
<body>
<?php
include_once "adminheader2.php";
?>
<div class="container">
    
<br>
<br>
    <h2 class="text-center"><b>Edit Products</b></h2>

        <form method="post" action="manage_products.php" enctype="multipart/form-data">
			<div class="card-body card-block">
                <div class="form-group">
                    <label for="categories">Categories</label>
                    <select required name="categories" id="categories" class="form-control" onchange="getcat(this.value)">
                        <option value="">Select Categories</option>
                    <?php
                        include_once "connection.php";
                        $selectcategories = "select * from categories";
                        $categoriesData = mysqli_query($con, $selectcategories);
                        while ($rowcat = mysqli_fetch_assoc($categoriesData)) {
							?>

                            <option value="<?php echo $row['categories']; ?>"

                            <?php if (($rowcat['categories']) == $rowcat['categories']) { ?>selected<?php } ?>> <?php echo $rowcat['categories']; ?> </option>
							<?php
					     }
					?>
					</select>
                </div>		

                <div class="form-group">
                    <label for="subcategory">Select Subcategory</label>
                    <select name="subcategory" id="subcategory" class="form-control">
                        <option value="">Select Subcategory</option>
                        <?php
                        $qury = "select * from subcategory";
                        $res = mysqli_query($con,$qury);
                        while ($subcategory= mysqli_fetch_assoc($res)){
                            ?>
                            <option value="<?php echo $subcategory['subcategoryid']; ?>"
                            <?php if (($rowid['subcategoryid']) == $subcategory['subcategoryid']) { ?>selected<?php } ?>>
                             <?php echo $subcategory['subcategoryname']; ?> </option>
                            <?php
                            }
                            ?>
                    </select>
                    </div>
        
        <input type="hidden" name="productid" value="<?php echo $_GET['productid'] ?>">

        <div class="form-group">
		<label for="categories" class=" form-control-label">Product Name</label>
			<input type="text" name="productname" value="<?php echo $rowid['productname'] ?>" placeholder="Enter product name" class="form-control">
		</div>

		<div class="form-group">
			<label for="categories" class=" form-control-label">Price</label>
	    <input type="text" name="price" value="<?php echo $rowid['price'] ?>" placeholder="Enter product price" class="form-control">
	    </div>
		
        <div class="form-group">
			<label for="categories" class=" form-control-label">Discount</label>
	    <input type="text" name="discount" value="<?php echo $rowid['discount'] ?>" placeholder="Enter product discount" class="form-control">
	    </div>

	    <div class="form-group">
			<label for="categories" class=" form-control-label">stock</label>
		<input type="text" name="stock" value="<?php echo $rowid['stock'] ?>" placeholder="Enter qty" class="form-control">
		</div>
								
		<!-- <div class="form-group">
			<label for="categories" class=" form-control-label">Image</label>
		<input type="file" data-rule-required="true" name="photo" value=" <?php echo $rowid['$org_path'] ?>" id="photo" class="form-control-file">
		</div> -->

        <div class="form-group">
			<label for="categories" class=" form-control-label">Image</label>
		<input type="file" data-rule-required="true" name="photo" id="photo" class="form-control-file">
        <img src="<?php echo $rowid['photo'] ?>"  style="width:50px;height:50px"/>
		</div>
								
		<div class="form-group">
			<label for="categories" class=" form-control-label">Description</label>
		<textarea name="description" placeholder="Enter product description" class="form-control" required><?php echo $rowid['description'] ?></textarea>
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
