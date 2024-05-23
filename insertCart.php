<?php
    session_start();   
    include 'connection.php';
    $name = $_POST['fname'];
    $price = $_POST['fprice'];
    $qty   = 1;
    
    $product = array($name, $price, $qty);

    $_SESSION[$name] = $product;


    //increase cart value
    $query = "SELECT * FROM cart_value WHERE id=1";
    $result = mysqli_query($con,$query);

    $row = mysqli_fetch_assoc($result);
    $val = $row['value']+1;

    $query = "UPDATE cart_value SET value = $val WHERE id=1";
    mysqli_query($con,$query);

    header('location:userpanel.php');  
?>
