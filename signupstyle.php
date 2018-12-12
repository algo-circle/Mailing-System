<?php

header('Content-type:text/css');
?>

#container
{
    width:600px;
    margin:0px auto;
    border:8px solid grey;
    margin-top: 40px;
    box-shadow: 16px 16px 10px rgb(34,111,103);
    border-top-right-radius:30%;
}

#form
{
    text-align:center;
    padding: 40px;
}
a
{
    text-decoration: none;
}


 @media (max-width:720px)
 {
 
 
#container
{
    width:450px;
}
   #form
   {
   padding:10px;
   
   }


 }
 @media (max-width:520px)
 {
 
 
#container
{
    width:300px;
}
   #form
   {
   padding:0px;
   text-align:left;
  
   }
label
{
display:none;

}
#name
{
float:left;
}
#email
{
float:left;
}
#num
{
float:left;

}
#submit
{

float:left;

}

#form a
 {
 
font-size:10px;
}
 h7
 {
 
    margin-right:10px; 
 }
 h1
 {
    text-align:center; 
 }

 }