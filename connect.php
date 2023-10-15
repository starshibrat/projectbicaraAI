<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    die('You entered wrong email format');
}

$conn = new mysqli('localhost', 'root', '123456', 'test5');

if ($conn->connect_error){
    die('Connection Failed: '.$conn->connect_error);
} else{

    $stmt = $conn->prepare("insert into subscriber(firstName, lastName, email) values(?, ?, ?)");
    $stmt->bind_param("sss", $firstName, $lastName, $email);
    $stmt->execute();
   
    header("Location: /project1/welcome");

    $stmt->close();
    $conn->close();


}

?>