<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Order</title>
    <style>
        .box{
            position:fixed;
            left:35%;
            right:35%;
            top:20%;
            margin:20px;
        }
        .box table, th, td {
            border: 1px solid gray;
            border-collapse: collapse;
            padding:6px;
            font-size:20px;  
        }
        .box th{
            background-color:lightblue;  
        }
        .box h2{
            background-color:orange;
            text-align:center;
        } 
        .box .box2{
            background-color:orange;
            margin-top:20px;
            padding:5px 95px;
        }
        .box .box2 .conbtn{
            background-color:blue;
            border:none;
            color:white;
            border-radius:2px;
            padding:5px;
            font-size:17px;
        }
        .box .box2 .closebtn{
            background-color:gray;
            border:none;
            color:white;
            border-radius:2px;
            padding:5px;
            font-size:17px;
        }
        
    </style>
</head>
<body>
    <div class="box">
        <h2>Order</h2>
        <?php
            include 'connection.php';
            $order_id = $_GET['id'];

            $query = "SELECT * FROM order_list WHERE order_id = '$order_id'";
            $result = mysqli_query($con,$query);

            echo "<table>
                        <tr>
                        <th>Order Name</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                </tr>";
            if($result){
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<tr>
                            <td>".$row['food_name']."</td>
                            <td>".$row['food_qty']."</td>
                            <td>".$row['food_price']."</td>                                          
                        </tr>"; 
                }
            }
        ?>        
        </table>
        <div class="box2">
            <form action="" method = "POST">
                <button class = "conbtn" name="conbtn">Confirm</button>
                <button class = "closebtn" name = "closebtn">Cancel</button>
            </form>
            <?php
                if(isset($_POST['conbtn']))
                {
                    include 'connection.php';
                    $query = "UPDATE orders SET status = 'conform' WHERE order_id = '$order_id'";
                    $result = mysqli_query($con,$query);
                    header('location:dashboard.php');
                }
                if(isset($_POST['closebtn']))
                {
                    header('location:dashboard.php');
                }
            ?>
    
        </div>
    </div>
</body>
</html>