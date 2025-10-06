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
    <title>View Products</title>
    <?php
    // include_once "headerfiles.php";
    ?>
</head>
<body>
<?php
include_once "adminheader2.php";
?>
<div class="container">
<div class="card-body">
<br>
    <h2 class="text-center"><b>PRODUCTS PANEL</b></h2>
    <br>
            
    <h4 class="box-link"><a href="addproducts.php" class='btn btn-primary btn-block' name="add_subcategories" action="addproducts.php">ADD PRODUCTS</a> </h4>
</div>
<div>

<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "failed") {
            ?>
            <div style="margin-top: 15px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-danger">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>this Product Can't be deleted ..Because Its Linked to a Photo..or It is Currently Buyed by a Customer..</strong>
                    </div>
            </div>
            </div>
            <?php
        }
    }
    ?>

<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "success") {
            ?>
            <div style="margin-top: 10px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-success">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>Product Deleted Sucessfully</strong>
                    </div>
            </div>
            </div>
            <?php
        }
    }
    ?>

<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "photoadded") {
            ?>
            <div style="margin-top: 15px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-success">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>Photo Added Successfully</strong>
                    </div>
            </div>
            </div>
            <?php
        }
    }
    ?>

<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "photonotadded") {
            ?>
            <div style="margin-top: 15px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-danger">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>Sorry, This Photo Cant Be Added Due To Some Error...  Please Retry After SomeTime</strong>
                    </div>
            </div>
            </div>
            <?php
        }
    }
    ?>
<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "notadded") {
            ?>
            <div style="margin-top: 15px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-danger">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>Sorry, This Product Cant Be Added Due To Some Error...  Please Retry After SomeTime</strong>
                    </div>
            </div>
            </div>
            <?php
        }
    }
    ?>

<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "added") {
            ?>
            <div style="margin-top: 15px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-success">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>Product Added Sucessfully</strong>
                    </div>
            </div>
            </div>
            <?php
        }
    }
    ?>

<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "updated") {
            ?>
            <div style="margin-top: 15px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-success">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>Product Successfully Updated</strong>
                    </div>
            </div>
            </div>
            <?php
        }
    }
    ?>

<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "notupdated") {
            ?>
            <div style="margin-top: 15px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-danger">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>Sorry, This Product Cant Be Updated Due To Some Error...  Please Retry After SomeTime</strong>
                    </div>
            </div>
            </div>
            <?php
        }
    }
    ?>
</div>

				<div class="card-body">
				   <div class="table-stats order-table ov-h table-responsive">
					  <table class="table">
						 <thead>
							<tr>
							   <!-- <th class="serial">#</th> -->
							   <th>ProductID</th>
							   <th>Product Name</th>
							   <th>Price</th>
							   <th>Discount(%)</th>
							   <th>Stock</th>
							   <th>Photo</th>
                               <th>Description</th>
                               <th>Sub CategoryId</th>
                               <th colspan="4">Controls</th>
                               
							</tr>
						 </thead>
                         <tbody>
        <?php
        include_once "connection.php";
        $srno = 1;
        $selectpro = "select * from product";
        $result = mysqli_query($con, $selectpro);
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $srno;; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
                <td>
                    <img src="<?php echo $row[5]; ?>" style="width:50px;height:50px" >
                </td>
                <td><?php echo $row[6]; ?></td>
                <td><?php echo $row[7]; ?></td>
                <td><a href='editproducts.php?productid=<?php echo $row[0]; ?>' class='btn btn-warning'> <i class='fas fa-edit'></i> Edit</a></td>
                <td>
                    <form onsubmit="return confirm('Are you Sure to Delete ?')" action="manage_products.php" method="post">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="productid" value="<?php echo $row[0]; ?>" id="productid">
                        <button type="submit" class="btn btn-danger">
                            <i class='fas fa-trash-alt'></i> Delete</button>
                </td>

                <td><a href='addphoto.php?productid=<?php echo $row[0]; ?>' class='btn btn-info'>
                <i class='fas fa-picture-o'></i>Add Photo</a>
                </td>
                
                </td>
                <td>
                    </form>
                </td>
            </tr>
            <?php
$srno++;
        }

        ?>

    </tbody>			 
        </table>
        </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
include_once "footerfiles.php";
?>
</body>
</html><?php
?>