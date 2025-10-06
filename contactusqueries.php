<?php
include_once "adminheader2.php";
?>
<div class="container">
    <div class="card-body">
    <br>
        <h2 class="text-center"><b>CUSTOMER'S QUERIES PANEL</b></h2>
        <br>
    </div>
<div>
<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "query answer sent") {
            ?>
            <div style="margin-top: 15px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-success">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>updated</strong>
                    </div>
            </div>
            </div>
            <?php
        }
    }
    ?>

<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "query answer not sent") {
            ?>
            <div style="margin-top: 10px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-danger">
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
        if($_GET['msg'] == "delsuccess") {
            ?>
            <div style="margin-top: 10px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-danger">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>Query Deleted Successfully</strong>
                    </div>
            </div>
            </div>
            <?php
        }
    }
    ?>

<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "delfailed") {
            ?>
            <div style="margin-top: 10px;">
                <!-- <h4 class="text-danger">this Category Can't be deleted ..Because Its Linked to a Sub Category..</h4> -->
                <div class="alert alert-danger">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                 <strong>Query Not Deleted</strong>
                    </div>
            </div>
            </div>
            <?php
        }
    }
    ?>
</div>
<div class="card-body">
   <div class="table table-bordered table-striped">
      <table class="table">
         <thead>
            <tr>
               <!-- <th class="serial">#</th> -->
               <th>No</th>
               <th>Query No.</th>
               <th>Email Id</th>
               <th>Query</th>
               <th>Replied By Admin</th>
               <th colspan="2">Controls</th>
            </tr>
         </thead>
         <tbody>
         <?php
         $nrt = "Not Replied Yet";
            include_once "connection.php";
            $srno = 1;
            $selectpro = "select * from contactus";
            $result = mysqli_query($con, $selectpro);
            while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
            <td><?php echo $srno;; ?></td>
            <td><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            
            <td>
                <?php 
                if($row[3]=='noooo'){
                    echo $nrt;
                }else{
                    echo $row[3];
                }
                ?></td>
            <td><a
            href='contactus_reply.php?queryid=<?php echo $row[0]; ?>&emailid=<?php echo $row[1]; ?>&query=<?php echo $row[2]; ?>' class='btn btn-warning'> <i class='fas fa-edit'></i> Reply</a>
            </td>
            <td>       
            <form onsubmit="return confirm('Are you Sure to Delete ?')" action="manage_contactus.php" method="post">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="queryid" value="<?php echo $row[0]; ?>" id="queryid">
                        <button type="submit" class="btn btn-danger">
                            <i class='fas fa-trash-alt'></i> Delete</button>
            </form>
        
        </td>
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