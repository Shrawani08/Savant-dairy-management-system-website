<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Photo</title>
    <?php
   //  include_once "headerfiles.php";
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
                        <div class="card-header"><strong>Add</strong><small>Photo</small></div>
                        <form action="manage_photo.php" method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                           
                           <input type="hidden" name="pid" value="<?php echo $_GET['productid'] ?>">

                                <div class="form-group">
									      <label for="photo" class=" form-control-label">Select Image</label>
									      <input type="file" data-rule-required="true" name="photo" id="photo" class="form-control-file">
								   </div>
                                <div class="form-group">
                                <label for="caption" class=" form-control-label">Enter Caption</label>
                                <input type="text" name="caption"  class="form-control" placeholder="Enter Caption" id="caption">
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
