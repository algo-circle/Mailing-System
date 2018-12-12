<?php
session_start();
$connection=mysqli_connect("localhost","root","","project");
$username=$_SESSION['username'];
$email=$_SESSION['email'];
 if(isset($_POST['submit'])) 
{
$to=$_POST['to'];
$message=$_POST['message'];
$subject=$_POST['sub'];
$query="SELECT username FROM signup WHERE email='$to'";
     $result=mysqli_query($connection,$query);
    $row=mysqli_num_rows($result);
     if($row==1)
     {  
         $query2="INSERT INTO $username"."sent(Reciever,Subject,Message) VALUES('$to','$subject','$message')";
         
         $result2=mysqli_query($connection,$query2);
         $query3="SELECT * FROM signup WHERE email='$to'";
         $result3=mysqli_query($connection,$query3);
         while($roow=mysqli_fetch_assoc($result))
         {
             $reciever=$roow['username'];
         }
         $query4="INSERT INTO $reciever"."recieve(Sender,Subject,Message) VALUES('$email','$subject','$message')";
         $result4=mysqli_query($connection,$query4);
        
     }
     else
     {
         echo'please enter a valid email';
     }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="composestyle.php">
    <style type="text/css">
            
            body {
                background: linear-gradient(132deg, #ec5218, #1665c1);
                background-size: 400% 400%;
                animation: BackgroundGradient 30s ease infinite;
            }
            
            @keyframes BackgroundGradient {
                0% {background-position: 0% 50%;}
                50% {background-position: 100% 50%;}
                100% {background-position: 0% 50%;}
            }
          
            
        </style>
        
    
</head>
<body>
<br>
<hr>
<br>
<div id="form">
<center><form action="compose.php" method="post">
   
    <input name="to" type="email" placeholder="TO">
    <br><br>
    <input name="sub" type="text" placeholder="SUBJECT">
    <br><br>
    <textarea name="message" type="text" placeholder="ENTER YOUR MESSAGE" cols="70" rows="20"></textarea>
    <br><br>
    <input type="submit" value="SEND" name="submit">
    
    
    
    
    
    
    
    
    </form></center>
    </div>
    
</body>
</html>