<?php
session_start();

$connection=mysqli_connect("localhost","root","","project");
if($_SESSION['username']==NULL)
   {
       header('location:login.php');
       
   }
if(isset($_POST['logout']))
{   
    $_SESSION['username'] = NULL;
    $_SESSION['email'] = NULL;
    
    unset($_SESSION['username']);  
    unset($_SESSION['email']);
    
    $logoutGoTo = "index.php";

    if ($logoutGoTo) {
        header("Location: $logoutGoTo");
        exit;
}
}



?>


<!doctype html>
<html>
    <head>
    
      <link rel="stylesheet" type="text/css" href="mail.css">
    <script src="mail.js">
        
        
        
    </script>
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
     
 <marquee style="color:rgb(59,86,119);"behavior="alternate"  loop="5" direction="left" scrollamount="5" width="35%;"><h1>WELCOME
    <?php echo " ".$_SESSION['username'];?>
     
     
         </h1></marquee>
         <h4 style="float:right;margin:100px;">
             
             <form method="post" action="mail.php">
                 <input type="submit" name="logout" value="LOGOUT">
             </form>
             
             
             
             
             
         </h4>
      <br>
        <br>
      <center>      <div id="box">
    <ul>
   <center><li><button onclick="myinbox()">INBOX</button></li>        
        <li><button onclick="mysent()">SENT</button></li>        
        <li><button onclick="mydraft()">DRAFT</button></li>
        <li><button onclick="mycompose()">COMPOSE</button></li>
    </center>
        
        
    </ul>
       <div id="frame">
          <iframe id="iframes" src="inbox.php">
             
              
              
              
          </iframe>
           
           
       </div>
        </div>
        </center>
        
        
    </body>
    



</html>