<?php 

if(isset($_POST['login_button']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $connection=mysqli_connect("localhost","root","","project");
    $username=mysqli_real_escape_string($connection,$username);
    $password=mysqli_real_escape_string($connection,$password);
    
    $q="SELECT email FROM signup WHERE username='$username'";
    $re=mysqli_query($connection,$q);
    while($row=mysqli_fetch_assoc($re))
    {   global $email;
        $email=$row['email'];
        
    }
    
    $hashformat="$2y$10$";
    $salt="thisisthesaltof22char22";
    $hashf_salt=$hashformat.$salt;
    $password=crypt($password,$hashf_salt);
    
    if(!$connection)
    {
        echo'CONNECTION NOT AVALIABLE'.mysqli_error();
    }
    
    $query="Select * FROM signup WHERE username='$username' and password='$password'";
    $result=mysqli_query($connection,$query);
    if(mysqli_num_rows($result)==1)
    {   session_start();
        $_SESSION['username']=$username;
        $_SESSION['email']=$email;
         header("location:mail.php");
       
    }
    else
    {
        echo 'Enter proper values';
    }
    
}

?>
<!doctype html>
<html>
    <head>

        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="loginstyle.php">
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
        <form method="post" action="login.php">
            <center><b style="font-family:monospace;color:blue;"><h1>LOGIN</h1></b></center><br><br>
            <label for="usernam">
                Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
            </label>
                <input type="text" name="username" placeholder="Name" id="usernam" required><br><br>
            <label for="passuser">
               Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
            </label>
                
                <input type="password" name="password" placeholder="password" id="passuser" required>
                <br><br>
            <input type="submit" name="login_button" >
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="" style="text-decoration: none;color:"> forgot password?</a>
        </form>
        <br><br><br><br>
    <hr width="50%">
    
    <center><h4>OR</h4></center>
        <center><a href="signup.php"><h1 style="color:blue">Sign Up</h1></a></center>
     
        
        </div>
        
        
    </div>
</body>
    
</html>