<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

if($_SERVER['REQUEST_METHOD'] == "POST")
{
   //something was posted
  $item = $_POST['item_name']; 
  $quantity =  $_POST['quantity'];
  $exp =  $_POST['exp_date'];
  $user_id = $_SESSION['user_id'];
  
  
  if(!empty($item) && !empty($quantity) && !empty($exp))
  {
    //save to database
    $query = "DELETE from pantry where user_id = '$user_id' and item_name = '$item'";
    
    
    mysqli_query($con,$query);
  
   
    echo "item successfully removed!";
    header("location: /php/pantrysite.php");
    die;
  }
  else
  {
        echo "Please enter valid information!";
  }
}