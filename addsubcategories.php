<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add SubCategory</title>
    <?php
    // include_once "headerfiles.php";
    ?>
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
                        <div class="card-header"><strong>Add</strong><small>Sub-Categories</small></div>
                        <form action="manage_subcategories.php" method="post">
                        <div class="card-body card-block">

                        <div class="form-group">
                                <label for="">Categories</label>
                                    <select required name="categories" id="categories" class="form-control">
                                    <option value="">Select Categories</option>
                                        <?php
               // $con='';
                                        include_once "connection.php";
                                        $selectcategories = "select * from categories";
                                        $categoriesData = mysqli_query($con, $selectcategories);
                                        while ($rowcat = mysqli_fetch_assoc($categoriesData)) {
                                        ?>
                                            <option value="<?php echo $rowcat['categories'] ?>"><?php echo $rowcat['categories'] ?></option>
                                        <?php }?>
                                    </select>
                                </div>
							   <div class="form-group">
                               <label for="subcategoryname" class=" form-control-label">Sub-Category Name</label>
                                <input type="text" name="subcategoryname"  class="form-control" placeholder="Enter SubCategory Name" id="subcategoryname">
                            </div>
                            <!-- <div class="form-group">
                                <label for="brand" class=" form-control-label">Brand</label>
                                <input type="text" name="brand"  class="form-control" placeholder="Enter Brand Name" id="brand">
                            </div> -->
                                <div class="form-group">
                                <label for="description" class=" form-control-label">Description</label>
                                <input type="text" name="description"  class="form-control" placeholder="Enter Description" id="description">
                            </div>
                                <input type="hidden" name="action" value="add">
                                <input type="submit" value="Save" class="btn btn-lg btn-info btn-block">
                            </form>
							   
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
include_once "footerfiles.php";
?>
</body>
</html>
