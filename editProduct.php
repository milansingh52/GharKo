<?php
    session_start();

    include 'connection.php';
    $query = "SELECT * FROM cart_value WHERE id=1";
    $result = mysqli_query($con,$query);

    $name = $_POST['name0'];
    $price = $_POST['name1'];
    $qty = $_POST['name2'];
    $event = $_POST['event'];

    $product = array($name, $price, $qty);

    if($event == "update")
    {
        $_SESSION[$name] = $product;
        
        //increase cart value      
        $row = mysqli_fetch_assoc($result);
        $val = $row['value']+$qty-1;

        $query = "UPDATE cart_value SET value = $val WHERE id=1";
        mysqli_query($con,$query);
    }
    else if($event=="delete"){
        unset($_SESSION[$name]);
        
        //decrease cart value      
        $row = mysqli_fetch_assoc($result);
        $val = $row['value']-$qty;

        $query = "UPDATE cart_value SET value = $val WHERE id=1";
        mysqli_query($con,$query);
    }
    header('location:viewCart.php');
?>