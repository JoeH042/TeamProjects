

<?php
//this document will connect to database and creating tables.
$connect = mysql_connect("127.0.0.1", "root", "")OR die("could not connect to database");

echo "CEG4981 is Connected!";
$db = mysql_select_db("CEG4981");
mysql_query("CREATE TABLE Employee (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Firstname VARCHAR(30) NOT NULL,
Middlename VARCHAR(30) NOT NULL,
Lastname VARCHAR(30) NOT NULL,
Email VARCHAR(50),
Phone VARCHAR(50),
Status VARCHAR(15),
Department VARCHAR(15),
Group_ID VARCHAR(15),
reg_date DATE
)");

mysql_query("CREATE TABLE TM_Member_Of_Grp (
Member_ID VARCHAR(30)  PRIMARY KEY,
Group_ID VARCHAR(30) NOT NULL,
Member_StartingDate DATE ,
Member_EndingDate DATE  
)");

mysql_query("CREATE TABLE Department (
Dept_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Dept_Name VARCHAR(30) NOT NULL,
Dept_Description VARCHAR(30) NOT NULL,
Manager_Num VARCHAR(30) NOT NULL

)");
mysql_query("CREATE TABLE Role (
Member_id VARCHAR(30) PRIMARY KEY,
Role_Name VARCHAR(30) NOT NULL,
Role_Description VARCHAR(50) NOT NULL,
Group_Number VARCHAR(30) NOT NULL
)");


mysql_query("CREATE TABLE Text (
Sender_Num VARCHAR(30) NOT NULL,
Recieve_Num VARCHAR(30) NOT NULL,
Text VARCHAR(200) NOT NULL,
Status VARCHAR(30) NOT NULL,
Date_sent DATE,
Date_recieved DATE
)");
mysql_query("CREATE TABLE Word_Filter (
Word VARCHAR(30) NOT NULL,
Status VARCHAR(30) NOT NULL
)");

mysql_query("CREATE TABLE Groups (
Group_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Group_Name VARCHAR(30) NOT NULL,
Group_Description VARCHAR(30) NOT NULL
)");
?>
