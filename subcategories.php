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
    <!-- <style> 
    h2{
        color: red solid 3px;
    }
    </style> -->
</head>
<body>
<?php
include_once "adminheader2.php";
?>

<div class="container">
<div class="card-body">
    <br>
    <h2 class="text-center"><b>Sub-Categories Panel</b></h2>
    <br>
    <h4 class="box-link"><a href="addsubcategories.php" class='btn btn-primary btn-block' name="add_subcategories" action="addsubcategories.php">Add Sub-Categories</a> </h4>
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
                 <strong>Can't Delete This  Sub-Category Because Its Linked to a Product</strong>
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
                 <strong>Sub-Category Deleted Sucessfully</strong>
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
                 <strong>Sorry, This Sub-Category Cant Be Added Due To Some Error...  Please Retry After SomeTime</strong>
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
                 <strong>Sub-Category Added Sucessfully</strong>
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
                 <strong>Sub-Category Successfully Updated</strong>
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
                 <strong>Sorry, This Sub-Category Cant Be Updated Due To Some Error...  Please Retry After SomeTime</strong>
                    </div>
            </div>
            </div>
            <?php
        }
    }
    ?>
</div>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Subcategoryid</th>
            <th>Subcategoryname</th>
            <th>Description</th>
            <th>Categories</th>
            <th>Brand</th>
            <th colspan="2">Controls</th>
        </tr>
        </thead>

        <tbody>
        <?php
       include_once "connection.php";
       $srno = 1;
        $selectcat = "select * from subcategory ORDER BY `subcategoryname` ASC";
        $result = mysqli_query($con, $selectcat);
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $srno; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <!-- <td><?php echo $row[4]; ?></td> -->
                <td><a
                href='editsubcategory.php?subcategoryid=<?php echo $row[0]; ?>' class='btn btn-warning'> <i class='fas fa-edit'></i> Edit</a></td>

                <td>
                    <form onsubmit="return confirm('Are you Sure to Delete ?')" action="manage_subcategories.php" method="post">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="sub_categories" value="<?php echo $row[0]; ?>" subcategories="sub_categories">
                        <button type="submit" class="btn btn-danger"><i class='fas fa-trash-alt'></i> Delete</button>
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

<?php
include_once "footerfiles.php";
?>

</body>
</html><?php
