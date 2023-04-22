<?php
session_start();

include("functions.php");
include("connection.php");

$query="SELECT user_name FROM users WHERE user_id = " . $_SESSION['user_id'] . ";";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
$_SESSION['user_name'] = $row['user_name'];
?>

<!DOCTYPE html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Now were Cooking! - Pantry</title>
<link href="css/reset.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="foundation.css">
<link rel="stylesheet" href="pstyle.css">

</head>

<body>
    <div id="header">
          <div id="pic"><img src="/img/pantrypic.jpg"></div>
           <div id="tag">
            <h1>Now Were Cooking!</h1> <br>
            <p>Welcome to your pantry <?php echo $_SESSION['user_name']; ?></p>
           </div>
          <div id="pic2"><img src="/img/pantrypic.jpg"></div>
    </div>

    <div id="container">

      <div id="addbox">
         <form action="/php/pantry_add.php" method="POST">
            <div style="font-size: 20px;margin: 10px;color: white;">Add items</div>
            <input id="text" type="text" name="item_name" placeholder="Item"><br>
            <input id="text" type="text" name="quantity" placeholder="Quantity/description"><br>
            <input id="text" type="text" name="exp_date" placeholder="Expiration Date ex: 05/23/2024"><br>
    
            <input id="button" type="submit" value="Add"><br><br>

          </form>
      </div>
     
    
      <div id="display_table">
        <table>
          <tr>
            <th>Item</th>
            <th>Quantity/Description</th>
            <th>Expiration Date</th>
          </tr>
      
          <?php
          $query2="SELECT item_name, quantity, exp_date FROM pantry WHERE user_id = " . $_SESSION['user_id'] . ";";
          $result2  = mysqli_query($con,$query2);
    
          if (mysqli_num_rows($result2) > 0) {
          while($row2 = mysqli_fetch_assoc($result2)) {
           echo"<tr><td>" . $row2['item_name']. "</td><td>" . $row2['quantity']. "</td><td>" . $row2['exp_date']. "</td></tr>";
           }
           echo"</table>";
           }
          else {
          echo "0 results";
          }
          ?>
        </table>
      </div>

      <div id="removebox">
         <form action="/php/pantry_remove.php" method="POST">
            <div style="font-size: 20px;margin: 10px;color: white;">Remove items</div>
            <input id="text" type="text" name="item_name" placeholder="Item"><br>
            <input id="text" type="text" name="quantity" placeholder="Quantity/description"><br>
            <input id="text" type="text" name="exp_date" placeholder="Expiration Date ex: 05/23/2024"><br>
    
            <input id="button" type="submit" value="Remove"><br><br>

          </form>
      </div>
    </div> 

      <div id="logout">
        <form action="/php/logout.php">
          <input id="button" type="submit" value ="Log out">
        </form>
      </div>
    
</body>


