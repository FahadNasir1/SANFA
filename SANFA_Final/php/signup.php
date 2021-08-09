<?php

function random_number($length)
{
    $text="";
    if($length < 5 )
    {
        $length = 5;
    }

    $len= rand(4,$length);

    for ($i=0; $i < $len; $i++){
        $text.= rand(0,9);
    }

    return $text;
}

$user = 'root';
$pass = '';
$db = 'signup';

if(! $database = new mysqli('localhost', $user , $pass, $db ))
{
    die("failed to connect");
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Password = $_POST['pass'];
    $Re_Password = $_POST['re_pass'];

    if(!empty($Name) && !empty($Email) && !empty($Password) && !empty($Re_Password))
    {
        $Account_number = random_number(16);
        $query = "insert into users (Account_number, Name, Email, Password, Re_Password) values('$Account_number','$Name', '$Email', '$Password', '$Re_Password')";
        mysqli_query($database,$query);
        echo "Form Submission Successful, Your Account Number is =  ",$Account_number,"  And your chosen password is  ",$Password;
        
    }else
    {
        
    }
}

?>