<?php
include_once "usernavbar2.php";
?>

<?php 
    if(isset($_GET['msg'])) {
        if($_GET['msg'] == "query answer sent") {
            $email = $_GET['mail'];
            ?>
            <?php
        }
    }
    ?>

<div class="container">
    <div class="card-body">
    <br>
        <h3 class="text-center"><b>Query's Answers Replied To '<?php echo $email ?>' <?php  ?> : </b></h3>
    <br>
    
    </div>
</div>


<?php
       $srno = 1;
        $sql = "SELECT * FROM contactus where `email`='$email'";
        $result = mysqli_query($con, $sql);
        while ($detail = mysqli_fetch_array($result)) {
            ?>

<div class="container">
    <div class="card-body">
    <br>
        <h5 class="text-left"><b>'<?php echo $srno ?>'. <?php echo $detail[2] ?> <?php  ?> </b></h5>
    <br>
    <h6 class="text-left"><b>Replied By MilkyStore.com :-  <?php echo $detail[3] ?> <?php  ?> </b></h6>
    </div>
</div>

            <?php
            $srno++;
        }
        ?>


<div class="container">



<?php
include_once "footerfiles.php";
?>
