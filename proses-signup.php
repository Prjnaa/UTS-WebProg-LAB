<?php

if(empty($_POST['name'])){
    die("Name is Required");
}

/*
if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Valid email is required");
}
*/

if(strlen($_POST["password"]) < 8 ){
    die("Password must be 8 characters or more");
}

if(!preg_match("/[a-z]/i",$_POST["password"])){
    die("Password must be 1 letter");
}

if(!preg_match("/[0-9]/i",$_POST["password"])){
    die("Password must be 1 number");
}

/*
if($_POST["password"] !== $_POST["password_confirmation"]){
    die("Passwords must be the same");
}
*/

$hashing = password_hash($_POST["password"], PASSWORD_DEFAULT);


print_R($_POST);
var_dump($hashing);
