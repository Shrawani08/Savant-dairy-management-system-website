<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("../connection/connect.php");


if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];

    $user = "select * from users where username='$username'";
    $user_result = mysqli_query($db, $user);
    $user_row = mysqli_fetch_array($user_result);
} 
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../AdditionalFiles/css/styledb.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
<style>
</style>

</head>
<body>
    <div class="container">
        <!-- aside section start -->
         <aside>
            <div class="top">
                <div class="logo">
                    <!-- whatever logo -->
                     SAVANT 
                </div>
                <div class="close">
                    <span class="material-icons">close</span>
                </div>
            </div>
            <!-- top end -->
             <div class="sidebar">
                <a href="#" class ="active">
                    <span class="material-icons" >
                        grid_on
                        </span>
                    <h3>Dashboard</h3>
                </a>
                <!-- <a href="#" >
                    <span class ="material-icons">person_outline</span>
                    <h3>Customers</h3> -->
                </a>
                <a href="analysis.php">
                    <span class ="material-icons">insights</span>
                    <h3>Analytics</h3>
                </a>
                <a href="../index.php">
                    <span class ="material-icons">home</span>
                    <h3>User Page</h3>
                </a>
                <?php
include("../connection/connect.php");

$query = "SELECT COUNT(*) AS total FROM contactus";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$totalMessages = $row['total'];
?>
                <a href="contactusqueries.php">
                    <span class ="material-icons">mail_outline</span>
                    <h3>Messages</h3>
                    <span class ="msg_count"><?php echo $totalMessages;?></span>
                </a>
                <a href="products.php">
                    <span class ="material-icons">receipt_long</span>
                    <h3>Products</h3>
                
                </a><a href="categories.php">
                    <span class ="material-icons">widgets</span>
                    <h3>Categories</h3>
                </a>
                <a href="userlogout.php">
                    <span class ="material-icons">logout</span>
                    <h3>Logout</h3>
                </a>
             </div>
         </aside>
        <!-- aside section end -->

         <!-- main section start-->
          <main>
            <h1>Dashboard</h1>
            <form action="" method="get">
                <div class="date">
                
                <input type="date" name="dateInput" id="dateInput" value="<?php echo htmlspecialchars($selected_date); ?>" onchange="this.form.submit()">
                </div>
                </form>
              <div class="insights">
                <!-- start selling -->
                 <div class="sales">
                    <span class ="material-icons">trending_up</span>
                    <div class="middle">
                        <div class="left">
                            <?php 
                            $result = mysqli_query($db, 'SELECT SUM(price) As value_sum FROM `bill_details`');
                            $row = mysqli_fetch_assoc($result);
                            $userdata1 = $row['value_sum'];
                            $max_sales_target = 5000; // Set your expected max sales
$sales_percentage = ($userdata1 / $max_sales_target) * 100;
$sales_percentage = min($sales_percentage, 100); // Cap at 100%

                                ?>
                            <h3>Total Sales</h3>
                            <h1>&#8377;<?php echo $userdata1; ?></h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle r ="30" cy = "40" cx ="40"></circle>
                            </svg>
                            <div class="number">60%</div>
                        </div>
                    </div>
                    <small>Last 24 hours</small>
                 </div>
                 <!-- end selling -->

                  <!-- start expenses -->
                  <div class="expenses">
                    <span class ="material-icons">local_mall</span>
                    <div class="middle">
                        <div class="left">
                            <?php
                             $result = mysqli_query($db, 'SELECT SUM(price) As value_sum FROM `bill_details`');
                             $row = mysqli_fetch_assoc($result);
                             $userdata1 = $row['value_sum'];
                             $percentage = 30;
                             $profit = ($percentage / 100) * $userdata1;
                             $profit_percentage = ($profit / $userdata1) * 100; // Calculate profit percentage
$profit_percentage = min($profit_percentage, 100); 
                                 ?>
                            <h3>Profit</h3>
                            
                            <h1>&#8377;<?php echo $profit; ?></h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle r ="30" cy = "40" cx ="40" style = "stroke: var(--clr-primary); stroke-width: 5; fill: none; 
                                stroke-dasharray: 188.4; /* Circumference of the circle (2 * π * r) */
            stroke-dashoffset: <?php echo 188.4 - (188.4 * ($profit_percentage / 100)); ?> ;transform:rotate(90deg);transform-origin:40px 40px;"></circle>
                            </svg>
                            <div class="number"><?php echo $profit_percentage;?>%</div>
                        </div>
                    </div>
                    <small>Last 24 hours</small>
                 </div>
                 <!-- end expenses -->

                   <!-- start income -->
                 <div class="income">
                    <span class ="material-icons">stacked_line_chart</span>
                    <div class="middle">
                        <div class="left">
                            <?php 
                            
        $result = mysqli_query($db, 'SELECT SUM(stock) As value_sum FROM `product`');
        $row = mysqli_fetch_assoc($result);
        $userdata1 = $row['value_sum'];
        $max_stock = 500;
        $percent = ($userdata1/$max_stock)*100;
        $percentage = min($percent,100);
            ?>
                        
                            <h3>Total Stock</h3>
                            <h1><?php echo $userdata1; ?></h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle r ="30" cy = "40" cx ="40" style="stroke: var(--clr-primary); stroke-width: 5; fill: none; 
            stroke-dasharray: 188.4; /* Circumference of the circle (2 * π * r) */
            stroke-dashoffset: <?php echo 188.4 - (188.4 * ($percentage / 100)); ?>;transform:rotate(90deg);transform-origin:40px 40px; "></circle>
                            </svg>
                            <div class="number"><?php echo $percentage;?>%</div>
                        </div>
                    </div>
                    <small>Last 24 hours</small>
                 </div>
                 <!-- end income -->
              </div>  

              <!-- end insight -->
               <!-- start orders -->
<div class="recent_orders">
    <h1>Recent Orders</h1>
    <table>
        <thead><tr>
            <th>Bill Id</th>
            <th>Date</th>
            <th>Address</th>
            <th>Total</th>
            <th>Payments</th>
            <th>Status</th>
        </tr></thead>
        <tbody>
            <?php
$limit = isset($_GET['page']) ? (int)$_GET['page'] : 10; // Default to 10 if not set
$page = isset($_GET['current_page']) ? (int)$_GET['current_page'] : 1; // Current page number
$offset = ($page - 1) * $limit; 
$selected_date = isset($_GET['dateInput']) ? $_GET['dateInput'] : date('Y-m-d');
            $k =0;
            $today = date('Y-m-d');
            //where email='$username'
            $order = "SELECT * FROM `bill` WHERE DATE(datetime) = '$selected_date' ORDER BY datetime DESC LIMIT $limit OFFSET $offset";
            $result = mysqli_query($db,$order);
            while($bill = mysqli_fetch_array($result)){
                $k++;
            ?>
            <tr>
                <td><?php echo $bill['billid']?></td>
                <td><?php echo $bill['datetime']?></td>
                <td><?php echo $bill['address']?></td>
               <td><?php echo $bill['grandtotal']?></td>
               <td><?php echo $bill['paymentmethod']?></td>
                <td class ="warning"><?php echo $bill['status'];?></td>
                <td class ="primary">Details</td>

            </tr>
            <?php
        }
        ?>
       <form method="GET" action="search2go.php">
    <label for="page">Rows per page:</label>
    <select name="page" id="page" onchange="this.form.submit()">
        <option value="10" <?php echo (isset($_GET['page']) && $_GET['page'] == 10) ? 'selected' : ''; ?>>10</option>
        <option value="20" <?php echo (isset($_GET['page']) && $_GET['page'] == 20) ? 'selected' : ''; ?>>20</option>
        <option value="30" <?php echo (isset($_GET['page']) && $_GET['page'] == 30) ? 'selected' : ''; ?>>30</option>
    </select>
</form>

        
           
        </tbody>
    </table>
</div>



                <!-- end orders -->
          </main>
         <!-- main section end-->
<!-- right section start -->
<div class="right">
    <div class="top">

        <button id = "menu_bar">
            <span class ="material-icons">menu</span>
        </button>

        <div class="theme-toggler">
            <span class="material-icons active">light_mode</span>
            <span class="material-icons">dark_mode</span>
        
        </div>
        <div class="profile">
            <div class="info">
                <p><b>Admin</b></p>
                <small class="text-muted"></small>
            </div>
            <div class="profile-photo">
                <img src="../AdditionalFiles/css/imgs/images.png" alt="admin">
            </div>
        </div>
    </div>
    <!-- top end -->
     <!-- start recent updates -->
<div class="recent_updates">
    <h2>Recent Updates</h2>
<div class="updates">
    <div class="update">
        <div class="profile-photo">
            <img src="../AdditionalFiles/css/imgs/images.png" alt="admin">

        </div>
<div class="message">
    <p><b>Admin </b>recieved his order</p>
</div>
    </div>
</div>
</div>
<!-- end recent updates -->




</div>


<!-- right section end -->
    </div>
    <!-- <script>
   
     const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0'); 
        const day = String(today.getDate()).padStart(2, '0');

        const formattedDate = `${year}-${month}-${day}`;

        document.getElementById('dateInput').value = formattedDate;

    </script> -->
    <script>
    const dateInput = document.getElementById('dateInput');

    if (!dateInput.value) {
        // Only set today's date if no value exists
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0'); 
        const day = String(today.getDate()).padStart(2, '0');

        const formattedDate = `${year}-${month}-${day}`;
        dateInput.value = formattedDate;
    }
</script>

    <script src="./js/color.js"></script>
</body>
</html>