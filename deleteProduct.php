<?php
session_start();

if(isset($_POST['id'])) {
    $productId = $_POST['id'];

    // Assuming you're using the session to store products
    if (isset($_SESSION['products'])) {
        foreach ($_SESSION['products'] as $key => $product) {
            if ($product->id == $productId) {
                unset($_SESSION['products'][$key]);
                echo 'success'; // Inform AJAX call of successful operation
                exit();
            }
        }
    }
}
echo 'error'; // Default error response
?>