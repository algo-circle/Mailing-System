<?php
session_start();

$connection=mysqli_connect("localhost","root","","project");
$username=$_SESSION['username'];


?>

<!doctype html>
<html>
    <head>

        <meta name="viewport" content="width=device-width,initial-scale=1.0">
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
  <center><table width="600" border="1" cellpadding="5" cellspacing="1">
   <tr>
   <th>SENT TO</th>
   <th>SUBJECT</th>
   <th>MESSAGE</th>
    </tr>
    <?php 
    
   $query="SELECT * FROM $username"."sent";
    $res=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($res))
    {   echo "<tr>";
        
        echo "<td>".$row['Reciever']."</td>";
        echo "<td>".$row['Subject']."</td>";
        echo "<td>".$row['Message']."</td>";
        echo "<tr>";
    }
    
    ?>
    </table>
    </center>
</body>
    
</html>