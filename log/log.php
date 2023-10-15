<?php

$conn = new mysqli('localhost', 'root', '123456', 'test5');

if ($conn->connect_error){
    die('Connection Failed: '.$conn->connect_error);
} else{

    $sql = "SELECT * FROM Subscriber";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){

            $fn = $row["firstName"];
            $ln = $row["lastName"];
            $date = $row["createdAt"];

            if ($fn == '' && $ln == ''){
                $fn = "anonymous";
            }
            

            echo $fn." ".$ln." has decided to pass IELTS at ".$date;
            echo "<br>";
        }
    } else {
        echo "No subscriber yet.";
    }

    $conn->close();


}
?>