<?php
$servername="localhost";
$username="root";
$password="";
$dbname="student";


//connection
$db= new mysqli($servername, $username, $password, $dbname);

//check conn
if($db==false){
    echo "connection failed";
}

else {
    echo "done";
}
error_reporting(0);

?>