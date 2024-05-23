<html>
    <head>
        <title>Login page</title>
        <style>
                * {
                    margin:0px;
                }

                body
                {
                    background-position: center;
                    background-size: cover;
                    font-family: arial;
                    background: rgba(0,0,0,0.7) url("images/login.jpg");
                    background-repeat: no-repeat;
                    background-size:cover;
                    background-blend-mode: darken;
                }
                
                .loginBody
                {
                    position:fixed;
                    left:34%;
                    right:34%;
                    top:30%;
                    border:1px solid pink;
                    border-radius:2px;
                    padding:10px;
                    background-color:bisque;
                }
                input[type=text],input[type=password]
                {
                    width:100%;
                    padding:10px 12px;
                    margin-top:8px;
                    margin-bottom:8px;
                }
                .btn
                {
                    color:white;
                    background-color:green;
                    width:100%;
                    border:none;
                    padding:14px 20px;
                    margin:8px 0px;
                }
                .newuser
                {
                    float:right;
                    margin-top:15px;
                }                
        </style>

        </head>
         <body>

             <div class="loginBody">
                 <form action="" method = "POST">
                        <b>User Name</b><input type ="text" placeholder="Enter Username" name = "uname">
                        <b>Password</b> <input type="password" placeholder = "Enter Password" name = "pass">
                        <input type="submit" value="Login" class = "btn" name = "loginbtn">
                        <span class = "newuser"><a href="vregister.php">New-User?</a></span>
                </form>
            </div>

            <?php

                include 'connection.php';

                $name = $_GET['name'];
                $email = $_GET['email'];
                $mobile_no = $_GET['mobile_no'];
                $subject = $_GET['subject'];
                $message = $_GET['message'];

                if(isset($_POST['loginbtn']))
                {
                    $username1 = $_POST['uname'];
                    $password1 = $_POST['pass'];

                    echo $name;
                    $query2 = "SELECT * FROM user_tbl";
                    
                    $result2 = mysqli_query($con,$query2);

                    $flag = 0;
                    
                    if($result2)
                    {
                        while($row = mysqli_fetch_assoc($result2))
                        {
                            $username2 = $row['email'];
                            $password2 = $row['password'];
                            
                            if($username1==$username2 && $password1==$password2)
                            {
                                echo $name;
                                
                                // $query = "INSERT INTO feedback(name,email, phone_no, subject, message) VALUES ('$name','$email',$mobile_no,'$subject','$message')";
                                //    $result = mysqli_query($con,$query);
                           
                                //    if($result){
                                //          echo "feedback submitted successfully";
                                //      }
                                //      else{
                                //          echo "Error";
                                //      }

                                // header('location:userpanel.php');
                                $flag = 1;
                            }
                        }                      
                    
                    }
                    if($flag==0)
                    {
                        echo "<script>";
                        echo "alert('invalid user name & password');";
                        echo "</script>";
                    }
                }
            ?>
    </body>
</html>