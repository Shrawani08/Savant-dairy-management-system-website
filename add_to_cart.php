<?php

class add_to_cart
{
    function addProduct($pid, $qty)
    {
        $_SESSION['cart'][$pid]['qty'] = $qty;
    }

    function updateProduct($pid, $qty)
    {
        if (isset($_SESSION['cart'][$pid])) {
            $_SESSION['cart'][$pid]['qty'] = $qty;
        }
    }

    function removeProduct($pid)
    {
        {
            if (isset($_SESSION['cart'][$pid])) {
                unset($_SESSION['cart'][$pid]);
            }
        }
        function empltyProduct()
        {
            {
                unset($_SESSION['cart']);
            }
        }
    }
}
?>