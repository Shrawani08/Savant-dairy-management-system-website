<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
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
<div class="content pb-0">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Product</strong><small> Form</small></div>
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
												<option value="<?php echo $rowcat['categories'] ?>"><?php echo $rowcat['categories'] ?></option>
											<?php
										}
										?>
										</select>
                					</div>
								
                					<div class="form-group">
                    				<label for="subcategory">Select Subcategory</label>
                    				<select name="subcategory" id="subcategory" class="form-control">
                        			<option value="">Select Subcategory</option>
                    			</select>
                				</div>
            		
								<div class="form-group">
									<label for="categories" class=" form-control-label">Product Name</label>
									<input type="text" name="productname" placeholder="Enter product name" class="form-control" required value="">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Enter Price</label>
									<input type="text" name="price" placeholder="Enter product price" class="form-control" required value="">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Enter Discount <small>(in %age)</small></label>
									<input type="text" name="discount" placeholder="Enter Discount" class="form-control" required value="">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Enter Quantity</label>
									<input type="text" name="stock" placeholder="Enter quantity" class="form-control" required value="">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Image</label>
									<input type="file" data-rule-required="true" name="photo" id="photo" class="form-control-file">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Description</label>
									<textarea name="description" placeholder="Enter product description" class="form-control" required></textarea>
								</div>
								<div class="form-group">
								<input type="hidden" name="action" value="add">
                                <input type="submit" value="Save" class="btn btn-lg btn-info btn-block">
                        
							   <div class="field_error"></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
									</div>
         <?php
require('footerfiles.php');
?>
<script>


// $(document).ready(function () {
// 	$('form').validate();

// })

</script>