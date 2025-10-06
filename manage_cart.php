<?php
session_start();
    if(isset($_POST['add_to_cart']))
    {
        if(isset($_SESSION['cart']))
        {
            $myproduct = array_column($_SESSION['cart'],'productname');
            if(in_array($_POST['productname'],$myproduct))
            {
                echo"<script>alert('Item Already Excist');
                window.location.href='index.php'</script>";
            }
            else{
            $count=count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('productname'=>$_POST['productname'], 'price'=>$_POST['price'],'quantity'=>1);
            // print_r($_SESSION['cart']);
            echo"<script>alert('Item Added');
            window.location.href='index.php'</script>";
        }
    }
        else{
            $_SESSION['cart'][0]=array('productname'=>$_POST['productname'], 'price'=>$_POST['price'],'quantity'=>1);
            print_r($_SESSION['cart']);
            echo"<script>alert('Item Added');
            window.location.href='index.php'</script>";
        }

    }

    if(isset($_POST['remove_product']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['productname']==$_POST['productname'])
            {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values($_SESSION['cart']);
            echo"<script>
            alert('Item Removed');
            window.location.href='mycart.php'</script>";
            }
        }
    }


?>