<?php
include_once "adminheader2.php";
?>
<div class="container">
    <div class="card-body">
    <br>
        <h3 class="text-center"><b>Reply to Customer's Query</b></h3>
        <br>
    </div>
</div>

<?php
$email = $_GET['emailid'];
$queryid = $_GET['queryid'];
$query = $_GET['query'];
// $querynum = $_GET['querynum'];
?>

<div class="container">
    
<br>

    <h2 class="text-center"><b></b></h2>
    <form method="post" action="manage_contactus.php" enctype="multipart/form-data">

    <div class="form-group">Customer's Email Id :
        <input type="text" name="email" value="<?php echo $email; ?>" readonly>
    </div>
    <div class="form-group">Query Id :
        <input type="text" name="querynum" value="<?php echo $queryid; ?>" readonly>
    </div>					
	<div class="form-group">
		<label for="query" class=" form-control-label">Query By Customer</label>
		<textarea name="query"  class="form-control" readonly><?php echo $query; ?></textarea>
	</div>

    <div class="form-group">
		<label for="solved" class=" form-control-label">Reply To <strong><?php echo $email; ?></strong></label>
		<textarea name="solved" class="form-control" placeholder="Reply To Customer"></textarea>
	</div>
        <div class="form-group">
            <input type="hidden" name="action" value="update" id="action">
        <input type="submit" value="UPDATE" class="btn btn-lg btn-info btn-block">
        </div>
        </form>

</div>
