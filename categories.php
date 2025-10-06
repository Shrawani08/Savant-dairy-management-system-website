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
    <title>Categories</title>
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
    <h2 class="text-center"><b>Categories Panel</b></h2>
    <br>
    <h4 class="box-link"><a href="addcategories.php" class='btn btn-info btn-block' name="add" action="addcategories.php">Add Categories</a> </h4>
<div>

<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "NOTPNGJPG") {
            ?>
            <div style="margin-top: 15px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-success">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>iMAGE fORMAT IS WRONG</strong>
                    </div>
            </div>
            </div>
            <?php
        }
    }
    ?>
<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "failed") {
            ?>
            <div style="margin-top: 15px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-danger">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>Can't Delete This  Category Because Its Linked to a Sub Category</strong>
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
                 <strong>Category Deleted Sucessfully</strong>
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
                 <strong>Sorry, This Category Cant Be Added Due To Some Error...  Please Retry After SomeTime</strong>
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
                 <strong>Category Added Sucessfully</strong>
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
                 <strong>Category Successfully Updated</strong>
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
                 <strong>Sorry, This Category Cant Be Updated Due To Some Error...  Please Retry After SomeTime</strong>
                    </div>
            </div>
            </div>
            <?php
        }
    }
    ?>
</div>
</div>
<div class="container">
    <div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Category</th>
            <th>Description</th>
            <th>Image</th>
            <th colspan="2">Controls</th>
        </tr>
        </thead>
        <tbody>
        <?php
       include_once "connection.php";
        $selectcat = "select * from categories";
        $result = mysqli_query($con, $selectcat);
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td>
                    <img src="<?php echo $row[2]; ?>" style="width:50px;height:50px" >
                </td>
                <td><a
                href='editcategory.php?categories=<?php echo $row[0]; ?>' class='btn btn-warning'> <i class='fas fa-edit'></i> Edit</a></td>

				
                <td>
                    <form onsubmit="return confirm('Are you Sure to Delete ?')" action="manage_categories.php" method="post">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="categories" value="<?php echo $row[0]; ?>" categories="categories">
                        <button type="submit" class="btn btn-danger"><i class='fas fa-trash-alt'></i> Delete</button>
                    </form>
                </td>
            </tr>
            <?php

        }


        ?>

        </tbody>
    </table>
</div>
    </div>
    </div>
<?php
include_once "footerfiles.php";
?>

</body>
</html><?php
