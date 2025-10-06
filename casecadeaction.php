    <option value="">Select SubCategory</option> 

    <?php
    $catname=$_GET['category'];
    include_once "connection.php";

    $selectDept = "select * from subcategory where categories='$catname'";
    $catData = mysqli_query($con, $selectDept);
    while ($rowcourse = mysqli_fetch_array($catData)) {
        echo "<option value='$rowcourse[0]'>$rowcourse[1]</option>";
    }

    ?>
