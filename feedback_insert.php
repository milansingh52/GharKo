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
              echo "feedback submitted successfully";
          }
          else{
              echo "Error";
          }      
        
     }
 
?>