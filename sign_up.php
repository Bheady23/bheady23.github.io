<?php
if(isset($_POST['submit']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $user = $_POST['uname'];
        $pword = $_POST['password'];
 
        //database details. You have created these details in the third step. Use your own.
        $host = "localhost";
        $username = "cmb";
        $password = "fuckthis!";
        $dbname = "nwc_db";
 
        //create connection
        $con = mysqli_connect($host, $username, $password, $dbname);
        //check connection if it is working or not
        if ($con === false)
        {
            die("Connection failed!" . mysqli_connect_error());
        }

        echo "Connect Successfully. Host info: " . mysqli_get_host_info($con);
         
        //This below line is a code to Send form entries to database
        $sql = "INSERT INTO users (fname, lname, uname, password) VALUES ('$fname', '$lname', '$user', '$pword')";
       
        //fire query to save entries and check it with if statement
        
        if(mysqli_query($con, $sql))
        {
            echo "Sign up Complete!";
        }
      	else{
         	echo "Error, Sign Up didn't complete! Something's Wrong."; 
        }
      //connection closed.
        mysqli_close($con);
    }

    header('Location: //localhost/nwc_site/login_page.html')

?>