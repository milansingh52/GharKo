<html>
    <head>
        <title>Contact-Us</title>
        <style>
            *
            {
                margin:0px;
            }
            .form
            {
                border:1px solid black;
                padding:7px;
                margin-left: 30%;
                margin-right:30%;
                margin-top:1%;
                background-color:lightblue;
            }
            .inputbox
            {
                width:100%;
                padding:7px;
                border-radius:2px;
                border:none;
            }
         
            .btn
            {
                padding:5px;
                width:80px;
                background:darkblue;
                color:white;
                border-radius:5px;
                border:none;
            }
            .messagebox
            {
                height:70px;
                width:100%
            }
      </style>
    </head>
    <body>
     <form action="" method="POST"  class="form">
            <div>
            <div><h2>Feedback</h2></div>
            <input type="text" placeholder="Name" class="inputbox" name="name"><br><br>
            <input type="text" placeholder="Email" class="inputbox" name="email"><br><br>
            <input type="text" placeholder="Mobile-No" class="inputbox" name="mobile_no"><br><br>
            <input type="text" placeholder="Subject" class="inputbox" name="subject"><br><br>
            <input type="text" placeholder="Message" class="messagebox" name="message"><br><br>
            <input type="submit" value="Submit" class="btn" name="submit">
            </div>
        </form>
        <?php
            include("connection.php");
            if(isset($_POST['submit'])){
                
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $mobile_no = $_POST['mobile_no'];
                    $subject = $_POST['subject'];
                    $message = $_POST['message'];

                    $query = "INSERT INTO feedback(name,email, phone_no, subject, message) VALUES ('$name','$email',$mobile_no,'$subject','$message')";
                    $result = mysqli_query($con,$query);

                    if($result){
                        echo "<script>
                        alert('feedback submitted successfully');
                        </script>";
                        header('location:userpanel.php');
                    }
                    else{
                        echo "Error";
                    }      
                    
                }
 
?>
    </body>
</html>