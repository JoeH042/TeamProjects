<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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


$ToPhone = $_POST['ToPhone'];
$Message = $_POST['Message'];
$Group = $_POST['Group'];
$IsGroup = FALSE;
$resultset = array();

if (isset($Group)) {



    $sql2 = "SELECT EM_Phone FROM Groups,
TM_Members_Of_Grps,
Employees WHERE Groups.Group_Name= '$Group'
AND Groups.Group_ID=TM_Members_Of_Grps.Group_ID 
AND TM_Members_Of_Grps.EM_ID=Employees.EM_ID";
    $numbers = $conn->query($sql2);

    if ($numbers->num_rows > 0) {
        // output data of each row
        while ($row = $numbers->fetch_assoc()) {
            $resultset[] = $row["EM_Phone"];
        }
    } else {
        echo "0 results";
    }

    $ToCALL = implode(",", $resultset);
    $ToPhone = $ToCALL;
    $IsGroup = TRUE;
}



if ($IsGroup) {
    foreach ($resultset as &$value) {

        $INSERT = "insert into texts (Msg_SID,Direction,Sender_Num,Text_Content,Cost, Msg_Status, Date_sent)
VALUES ('$EM_ID','Outgoing','$number','$body','1','Recieved',NOW())";
        $conn->query($INSERT);

        $INSERT = "INSERT INTO recievers(`Text_ID`, `Recv_EM_ID`, `View_Status`, `Date_recieved`) VALUES ('$Text_ID','$EM_ID','Unread',NOW())";
        $conn->query($INSERT);
    }
} else {

    $INSERT = "insert into texts (Msg_SID,Direction,Sender_Num,Text_Content,Cost, Msg_Status, Date_sent)
VALUES ('$EM_ID','Outgoing','$number','$body','1','Recieved',NOW())";
    $conn->query($INSERT);

    $INSERT = "INSERT INTO recievers(`Text_ID`, `Recv_EM_ID`, `View_Status`, `Date_recieved`) VALUES ('$Text_ID','$EM_ID','Unread',NOW())";
    $conn->query($INSERT);
}



$URL = "http://rbscenter.com/teamProjects/newSMS.php?ToPhone=$ToPhone&Message=$Message";



if (isset($ToPhone)) {
    //Process the call USER END
    header('Location: ' . $URL);
} else {
    echo "VALUE NOT SET";
}
