

<?php
session_start();
?>
<?php
include("../connection/connect.php");
if (isset($_POST['productid'])) {
    $productid = $_POST['productid'];
    $selectid = "select * from product where `productid`='$productid'";
    $idData = mysqli_query($db, $selectid);
    $rowid = mysqli_fetch_assoc($idData);

} else {
//     header('location:viewphoto.php');
}

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
    <h2 class="text-center"><b>PRODUCTS PHOTO PANEL</b></h2>
    <br>

    </div>
    <div>
<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "deletefailed") {
            ?>
            <div style="margin-top: 15px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-danger">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>this Photo Can't be deleted ..Because Its Linked to a something..</strong>
                    </div>
            </div>
            </div>
            <?php
        }
    }
    ?>

<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "deletesuccess") {
            ?>
            <div style="margin-top: 10px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-success">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>Photo Deleted Sucessfully</strong>
                    </div>
            </div>
            </div>
            <?php
        }
    }
    ?>

<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "photoupdated") {
            ?>
            <div style="margin-top: 15px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-success">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>Photo Successfully Updated</strong>
                    </div>
            </div>
            </div>
            <?php
        }
    }
    ?>

<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "photonotupdated") {
            ?>
            <div style="margin-top: 15px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-danger">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>Sorry, This Photo Cant Be Updated Due To Some Error...  Please Retry After SomeTime</strong>
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
               <th>PhotoID</th>
               <th>ProductId</th>
               <th>Photo</th>
               <th>Caption</th>
               <th colspan="3">Controls</th>
            </tr>
         </thead>
         <tbody>
<?php
include("../connection/connect.php");
$srno = 1;
$id = $_GET['productid'];
$selectpro = "select * from productphoto where productid='$id'";
$result = mysqli_query($db, $selectpro);
while ($row = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $srno;; ?></td>
<td><?php echo $row[3]; ?></td>
<td>
    <img src="<?php echo $row[1]; ?>" style="width:200px;height:100px">
</td>
<td><?php echo $row[2]; ?></td>

<td><a
href='editphoto.php?id=<?php echo $row[0]; ?>' class='btn btn-warning'> <i class='fas fa-edit'></i> Edit</a></td>
<td>
<td>
    <form onsubmit="return confirm('Are you Sure to Delete ?')" action="manage_photo.php" method="post">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?php echo $row[0]; ?>" id="id">
        <button type="submit" class="btn btn-danger">
            <i class='fas fa-trash-alt'></i> Delete</button>
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