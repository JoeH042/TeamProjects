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

//$sql = "INSERT INTO texts (Text_ID, Msg_SID, Direction, Sender_Num, Recieve_Num, Text_Content, View_Status, Cost, Msg_Status, Date_sent, Date_recieved)
//VALUES ('1','1','1','1','1','1','1','1','a','a','a')";

$sql = "INSERT INTO texts (Text_ID, Msg_SID, Direction)
VALUES ('131','1','IN')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


$URL="http://www.rbscenter.com/teamProjects/newSMS.php?ToPhone=$number&Message=THANKS%20YOUR%20MESSAGE%20HAS%20BEEN%20RECEIVED&Contact_Submit=Submit";  

    header( 'Location: ' . $URL );

?>
