<?php
$servername = getenv('SERVERNAME');      
$username   = getenv('USERNAME');     
$password   = getenv('PASSWORD');  
$dbname     = getenv('DATABASENAME');      


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("<div style='color:red; text-align:center; padding:20px;'>
            ❌ Database connection failed. Please try again later.
         </div>");
}
?>
