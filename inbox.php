<?php
session_start();

$connection=mysqli_connect("localhost","root","","project");
$username=$_SESSION['username'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
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
   <th>SENT BY</th>
   <th>SUBJECT</th>
   <th>MESSAGE</th>
    </tr>
    <?php 
    
   $query="SELECT * FROM $username"."recieve";
    $res=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($res))
    {   echo "<tr>";
        
        echo "<td>".$row['Sender']."</td>";
        echo "<td>".$row['Subject']."</td>";
        echo "<td>".$row['Message']."</td>";
        echo "<tr>";
    }
    
    ?>
    </table>
    </center>
   
   
    
</body>
</html>