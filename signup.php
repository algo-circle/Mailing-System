<?php
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $confirm_password=$_POST['cpassword'];
    $email=$_POST['mail'];
    $email.="@mymail.org";
    $mobile=$_POST['mobile'];
    
     $connection=mysqli_connect("localhost","root","","project");
    
    $username=mysqli_real_escape_string($connection,$username);
    $password=mysqli_real_escape_string($connection,$password);
    $confirm_password=mysqli_real_escape_string($connection,$confirm_password);
    $email=mysqli_real_escape_string($connection,$email);
    $mobile=mysqli_real_escape_string($connection,$mobile);
    
    $hashformat="$2y$10$";
    $salt="thisisthesaltof22char22";
    $hashf_salt=$hashformat.$salt;
    $password=crypt($password,$hashf_salt);
    $confirm_password=crypt($confirm_password,$hashf_salt);
    
   
   
    $querycheckusername="SELECT username FROM signup WHERE username='$username'";
    $querycheckemail="SELECT email FROM signup WHERE email='$email'";
    $fire=mysqli_query($connection,$querycheckusername);
    $fire_email=mysqli_query($connection,$querycheckemail);
    if($password==$confirm_password)
    {
    if(mysqli_num_rows($fire)>0)
    {

    echo '<p style="color:red">USERNAME ALREADY IN USE</p>';
    }
    elseif(mysqli_num_rows($fire_email)>0)
    {
          echo '<p style="color:red">EMAIL ALREADY IN USE</p>';
    }
    
    
    else
    {
    
    $query="INSERT INTO signup(username,password,cpassword,email,mobile) VALUES('$username','$password','$confirm_password','$email','$mobile')";
    $result=mysqli_query($connection,$query);
    
        header("location:login.php");
        
        $query1="CREATE TABLE $username";
        $query1.="sent(Reciever varchar(30),Subject varchar(20),Message varchar(2000))";
        $res=mysqli_query($connection,$query1);
        
        $query2="CREATE TABLE $username";
        $query2.="recieve(Sender varchar(30),Subject varchar(20),Message varchar(2000))";
        $res2=mysqli_query($connection,$query2);
        
    }
    }
    else
    {
            echo'PASSWORDS DOESN\'T MATCH'; 
            
    }
    
    
}



?>


<!doctype html>
<html>
    <head>

        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="signupstyle.php">
        <style type="text/css">
            
            body {
                background: linear-gradient(132deg, #ec5218, #1665c1,#fc7632,#46C9BB);
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
  




                
   
    <div id="container">
         <div id="form">
                    <form  action="signup.php" method="post">
                    <b style="margin:30%;font-family:monospace;color:black;"><h1>SIGN UP</h1></b><br><br>
                   
                    <label for="name">Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="username" id="name" placeholder="NAME"><br><br>
                   <label for="pass">Password:</label>
                    <input type="password" name="password" id="pass" placeholder="Password"><br><br>
                     <label for="pass1">Password:</label>
                    <input type="password" name="cpassword" id="pass1" placeholder="Confirm Password"><br><br>
                    <label for="email">Email:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input style="margin-right:-90px;" type="text" name="mail"id="email" placeholder="Email"> <h7 style="float:right;">@mymail.org</h7><br><br>
                     <label for="num">Mobile:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="tel" id="num" name="mobile" max="10" placeholder="Enter Mobile no"><br><br>
                    <input type="Submit" id="submit" name="submit" style="margin-left:0px">
                
                    
                </form>
             <br>
                <hr id="hr" width=50%>
                <br>
             OR<br><br>
             <a href="login.php"><h1 style="color:black">ALREADY HAVA AN ACCOUNT?</h1></a>
            
        </div>
           
    </div>
        
        
            
            
            
          
    </body>
</html>