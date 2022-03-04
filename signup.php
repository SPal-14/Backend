<?php
include_once('conn.php');

if($_SERVER['REQUEST_METHOD']=='POST'){

$email = $_POST['email'];
$name = $_POST['name'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

function validateCredentials($key,$data){
    if(empty($data)){
            header(`Location:http://localhost/php_program/register?error=$key is empty`);
            exit();
    }
    return;
}

function matchPassword($password,$confirmPassword){
    if($password != $confirmPassword){
        header(`Location:http://localhost/php_program/register?error=password and confirm password does not match`);
        exit();
    }
return;
}

function checkUserExit($email){

global $db;
$query = "select * from user where email = '$email'";
$sql = mysqli_query($db,$query);
$rows = mysqli_num_rows($sql);

if($rows==1){
    header("Location:http://localhost/php_program/register.php?error=Email Already Exist");
    exit();
}
return;
}


function registerUser($email,$name,$password,$confirmPassword){
    global $db;
    $query = "insert into user (email,name,password,confirmPassword) values('$email','$name','$password','$confirmPassword')";
    $sql = mysqli_query($db,$query);
    if($sql->error){
        header("Location:http://localhost/php_program/register?error=Please Try again");
        exit();
    }else{
        header("Location:http://localhost/php_program/login.php?message=User Successfully Registered");
        exit();
    }
    

}
    validateCredentials("email",$email);
    validateCredentials("password", $password);
    validateCredentials("name", $name);
    validateCredentials("confirmPassword", $confirmPassword);




matchPassword($password,$confirmPassword);
checkUserExit($email);
registerUser($email,$name,$password,$confirmPassword);


}

?>