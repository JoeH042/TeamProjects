<?php
$number = $_POST['From'];
$body = $_POST['Body'];

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "CEG4981";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$SQL  = "SELECT EM_ID FROM employees WHERE EM_Phone = '$number'";
$result = $conn->query($SQL);
$row = $result->fetch_assoc();
$EM_ID = $row["EM_ID"];



$INSERT = "insert into texts (Msg_SID,Direction,Sender_Num,Text_Content,Cost, Msg_Status, Date_sent)
VALUES ('$EM_ID','Incomming','$number','$body','1','RECIEVED',NOW())";

if ($conn->query($INSERT) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$INSERT = "";
if ($conn->query($INSERT) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


$URL="http://www.rbscenter.com/teamProjects/newSMS.php?ToPhone=$number&Message=THANKS%20YOUR%20MESSAGE%20HAS%20BEEN%20RECEIVED&Contact_Submit=Submit";  

    header( 'Location: ' . $URL );

?>
