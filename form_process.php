<html>
    <head>
    <title>send</title>
        <style>
            h2{
                text-align: center;
                margin-top: 200px;
                
            }
        </style>
    </head>
    <body bgcolor="skyblue">
   
<?php 
if (isset($_POST["submit"]))
{
$username = $_POST["username"];
$password = $_POST["password"];
    
    echo "<h2>Your Query has been saved <br>Thank you !</h2>";
    
    
}


$connection = mysqli_connect('localhost', 'root', '', 'loginapp');

if($connection) {
    echo "";
}
else{
    die("Database connection failure");
}
$hashFormat = "$2y$10$";
$salt = "iusemycrazystringsuir22";
$hashF_and_salt = $hashFormat . $salt;

$password = crypt($password, $hashF_and_salt);

$query = "INSERT INTO user(username, password)";
$query .= "VALUES ('$username', '$password')";

$result = mysqli_query($connection, $query);

if(!$result){
    die('Query FAILED' . mysqli_error());
}


?>
        
 </body>
</html>