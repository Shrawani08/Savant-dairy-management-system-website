<?php
include("connection/connect.php");
include "cart.php";
session_start();

error_reporting(0);
$arr = array();
//echo $arr;
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];

    $user = "select * from users where username='$username'";
    $user_result = mysqli_query($db, $user);
    $user_row = mysqli_fetch_array($user_result);
} 

if (isset($_SESSION['username'])) {
    if (isset($_SESSION['products'])) {
        $arr = $_SESSION['products'];
        if (count($arr) == 0) {
            header("Location: index.php");
        }
    } else {
        ?>
        <script>
            alert("Cart is empty..!");
            window.location.href = "index.php";
        </script>
        <?php
//        header("Location: index.php");
    }
} else {
    
//    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="AdditionalFiles/css/bootstrap.css">
    <link rel="stylesheet" href="AdditionalFiles/js/bootstrap.js"><link rel="stylesheet" href="AdditionalFiles/fontawesome/css/all.css">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <style>
        textarea {
            resize: none !important;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body onload="getCartCount()">

<!-- user navbar goes here -->
<?php
$Cart = $_SESSION['products'];

if (isset($_SESSION['username'])) {
    $email = $_SESSION['username'];

    $seletUser = "SELECT * FROM users WHERE username='$username'";
    $run = mysqli_query($db, $seletUser);
    $user_row = mysqli_fetch_assoc($run);
}
?>
<body onload="getCartCount()">



<?php
$Cart = $_SESSION['products'];

if (isset($_SESSION['username'])) {
    $email = $_SESSION['username'];

    $seletUser = "SELECT * FROM `users` WHERE username='$email'";
    $run = mysqli_query($db, $seletUser);
    $user_row = mysqli_fetch_assoc($run);
}
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center border rounded bg-light my-5">
            <h1>My Cart</h1>
        </div>

        <div class="col-lg-12">
            <h4 class="mb-4"><span class="text-danger">* </span>Your shopping cart contains: <span
                        class="text-danger"><?php echo count($arr) ?></span>
                Products.</h4>
        </div>

        <div class="col-lg-9">
            <table class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                    <th>Sr. No.</th>
                    <th colspan="2">Product</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Quantity</th>
                    <th>Net Price</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $srno = 1;
                $grandTotal = 0;
                foreach ($arr as $item) {
                    $discountedPrice = round($item->price - (($item->price * $item->discount) / 100));
//                    $discountedPrice = round($item->price - (($item->price * $item->discount) / 100), 2);
                    $netPrice = $discountedPrice * $item->qty;
                    $grandTotal += $netPrice;
                    ?>
                    <tr class="text-center">
                        <td><?php echo $srno; ?></td>
                        <td>
                            <img src="<?php echo $item->photo; ?>" alt="Product" style="height: 50px">
                        </td>
                        <td><?php echo $item->productname; ?></td>
                        <td>&#x20b9; <?php echo $item->price; ?></td>

                        <td>
                            <?php
                            if ($item->discount > 0) {
                                echo $item->discount;
                            } else {
                                echo "NA";
                            }
                            ?>
                        </td>

                        <td>
                            <!-- Change Qty -->
                            <div>
                                <button onclick="changeQty(<?php echo $item->id; ?>,'minus',<?php echo $item->stock; ?>)"
                                        title="Minus" type="button" class="btn btn-dark btn-sm">
                                    <i id="minusicon-<?php echo $item->id; ?>"
                                       class="fa fa-minus"
                                        <?php if ($item->qty <= 1) {
                                            echo "disabled";
                                        } ?>></i>
                                </button>

                                <input type="text" name="quantity-<?php echo $item->id; ?>"
                                       id="quantity-<?php echo $item->id; ?>"
                                       value="<?php echo $item->qty; ?>"
                                       readonly style="width: 25px;text-align: center;padding: 2px 0">

                                <button onclick="changeQty(<?php echo $item->id; ?>,'plus',<?php echo $item->stock; ?>)"
                                        title="Plus" type="button" class="btn btn-dark btn-sm">
                                    <i id="plusicon-<?php echo $item->id; ?>" class="fa fa-plus"
                                        <?php if ($item->qty >= $item->stock) {
                                            echo "disabled";
                                        } ?>></i>
                                </button>
                            </div>
                            <!-- //Change Qty -->
                        </td>

                        <td>&#x20b9; <?php echo $discountedPrice; ?></td>

                        <td id="netprice-<?php echo $item->id; ?>">&#x20b9; <?php echo $netPrice; ?></td>

                        <td>
                            <a href="" title="Remove" onclick="return confirm('Are you sure you want to delete?')">
                                <i class="fas fa-trash-alt text-danger"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                    $srno++;
                }
                ?>
                </tbody>
            </table>
        </div>

        <div class="col-lg-3">
            <div class="border bg-light rounded p-4">
                <h5>Grand Total: &#x20b9;<span class="text-danger" id="grandTotal2"> <?php echo $grandTotal; ?></span>
                </h5>

                <input type="hidden" id="grandTotal" value="<?php echo $grandTotal; ?>">
                <input type="hidden" id="emailid" value="<?php echo $user_row['email']; ?>" >
                <input type="hidden" id="mobile" value="<?php echo $user_row['mobile']; ?>" >
            </div>
        </div>

    </div>
    <div class="checkout-left">
            <div class="address_form_agile mt-sm-5 mt-4">
                <h4 class="mb-sm-4 mb-3">Add a new Details</h4>
                <form action="insertPayment.php" method="post" id="checkoutForm"
                      class="creditly-card-form agileinfo_form">
                    <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                        <div class="information-wrapper">
                            <div class="first-row">
                                <div class="w3_agileits_card_number_grids">
                                    <div class="w3_agileits_card_number_grid_left form-group">
                                        <div class="controls">
                                            <textarea id="address" data-rule-required="true" class="form-control"
                                                      data-msg-required="Enter a valid address so that we can reach you"
                                                      cols="10" rows="5" name="address" placeholder="Enter full address"
                                            ></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="w3_agileits_card_number_grid_right form-group">
                                    <div class="controls">
                                        <select name="city" data-rule-required="true" class="option-w3ls" style ="color:black;"
                                                data-msg-required="City must be selected" id="town">
                                            <option value="">--Choose City--</option>
                                            <option value="Ahmednagar">Ahmednagar</option>
                                            <option value="Akola">Akola</option>
                                            <option value="Amravati">Amravati</option>
                                            <option value="Aurangabad">Aurangabad</option>
                                            <option value="Beed">Beed</option>
                                            <option value="Bhandara">Bhandara</option>
                                            <option value="Buldhana">Buldhana</option>
                                            <option value="Chandrapur">Chandrapur</option>
                                            <option value="Dhule">Dhule</option>
                                            <option value="Gadchiroli">Gadchiroli</option>
                                            <option value="Gondia">Gondia</option>
                                            <option value="Hingoli">Hingoli</option>
                                            <option value="Jalgaon">Jalgaon</option>
                                            <option value="Jalna">Jalna</option>
                                            <option value="Kolhapur">Kolhapur</option>
                                            <option value="Latur">Latur</option>
                                            <option value="Mumbai City">Mumbai City</option>
                                            <option value="Mumbai Suburban">Mumbai Suburban</option>
                                            <option value="Nagpur">Nagpur</option>
                                            <option value="Nanded">Nanded</option>
                                            <option value="Nandurbar">Nandurbar</option>
                                            <option value="Nashik">Nashik</option>
                                            <option value="Osmanabad">Osmanabad</option>
                                            <option value="Palghar">Palghar</option>
                                            <option value="Parbhani">Parbhani</option>
                                            <option value="Pune">Pune</option>
                                            <option value="Raigad">Raigad</option>
                                            <option value="Ratnagiri">Ratnagiri</option>
                                            <option value="Sangli">Sangli</option>
                                            <option value="Satara">Satara</option>
                                            <option value="Sindhudurg">Sindhudurg</option>
                                            <option value="Solapur">Solapur</option>
                                            <option value="Thane">Thane</option>
                                            <option value="Wardha">Wardha</option>
                                            <option value="Washim">Washim</option>
                                            <option value="Yavatmal">Yavatmal</option>
                                           
                                        </select>
                                    </div>
                                </div>

                                <div class="w3_agileits_card_number_grid_right form-group">
                                    <div class="controls">
                                        <input type="text" id="zipcode" class="form-control" name="zipcode"
                                               data-rule-required="true"
                                               data-msg-required="Please enter a valid zip code or postal code"
                                               placeholder="Postcode / ZIP" minlength="6" maxlength="6"
                                               data-rule-number="true">
                                    </div>
                                </div>
                                <div class="w3_agileits_card_number_grid_left form-group">
                                    <div class="controls">
                                        <textarea name="remarks" class="form-control" id="remarks" cols="10" rows="5"
                                                  placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="order-payment-method">
                                <div class="single-payment-method show">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cashon" name="paymentmethod" value="cash"
                                                   class="custom-control-input"/>
                                            <label class="custom-control-label" for="cashon">Cash On
                                                Delivery</label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="cash">
                                        <p>Pay with cash upon delivery.</p>
                                    </div>
                                </div>

                                <div class="single-payment-method">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="directbank" name="paymentmethod" value="Online"
                                                   class="custom-control-input" checked/>
                                            <label class="custom-control-label" for="directbank">Online</label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="bank">
                                        <p>Make your payment directly into our bank account. Please use your Order
                                            ID as the payment reference. Your order will not be shipped until the
                                            funds have cleared in our account..</p>
                                    </div>
                                </div>

                                <div class="summary-footer-area">
                                    <div class="custom-control custom-checkbox mb-20">
                                        <input type="checkbox" checked class="custom-control-input" id="terms"
                                        />
                                        <label class="custom-control-label" for="terms">I have read and agree to
                                            the website <a href="index.php">terms and conditions.</a></label>
                                    </div>
                                    <!--                                        <button type="submit" id="placeOrder" class="btn btn-sqr">Place Order</button>-->
                                    <br>
                                    <button class="submit check_out btn btn btn-warning" type="submit" id="placeOrder">Proceed to
                                        checkout
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

</div>

<script src="AdditionalFiles/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="AdditionalFiles/js/popper.min.js"></script>
<script src="AdditionalFiles/js/bootstrap.js"></script>

<script src="AdditionalFiles/js/script.js"></script>

</body>
</html>