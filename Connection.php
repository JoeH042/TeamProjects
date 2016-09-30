<?php
//this document will connect to database and creating tables.
$connect = mysql_connect("127.0.0.1", "root", "")OR die("could not connect to database");
echo "CEG4981 is Connected!";
$db = mysql_select_db("CEG4981");
mysql_query("CREATE TABLE Employee (
id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Firstname VARCHAR(30) NOT NULL,
Middlename VARCHAR(30) NOT NULL,
Lastname VARCHAR(30) NOT NULL,
Email VARCHAR(50),
Phone INT(10) UNSIGNED,
Status set('Active','Inactive'),
Department INT(9) UNSIGNED,
Group_ID INT(9) UNSIGNED,
Date_Start DATETIME DEFAULT NOW()
)");
mysql_query("CREATE TABLE TM_Member_Of_Grp (
Member_ID INT(9) UNSIGNED ,
Group_ID INT(9) UNSIGNED ,
PRIMARY KEY(Member_ID,Group_ID),
Member_StartingDate DATETIME DEFAULT NOW(),
Member_EndingDate DATETIME
)");
mysql_query("CREATE TABLE Department (
Dept_ID INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Dept_Name VARCHAR(30) NOT NULL,
Dept_Description TEXT NOT NULL,
Manager_Num INT(9) UNSIGNED 
)");
mysql_query("CREATE TABLE Role (
Role_ID INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Role_Name VARCHAR(30) NOT NULL,
Role_Description TEXT ,
Group_Number INT(9) UNSIGNED,
Member_id INT(9) UNSIGNED,
Role_Report_To INT(9) UNSIGNED
)");
mysql_query("CREATE TABLE Text (
Text_ID INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Sender_Num INT(10) UNSIGNED  NOT NULL,
Recieve_Num INT(10) UNSIGNED  NOT NULL,
Text TEXT NOT NULL,
Status set('Active','Inactive'),
Date_sent DATETIME,
Date_recieved DATETIME
)");
mysql_query("CREATE TABLE Word_Filter (
Word_ID INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Word VARCHAR(30) NOT NULL,
Status set('Active','Inactive')
)");
mysql_query("CREATE TABLE Groups (
Group_ID INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Group_Name VARCHAR(30) NOT NULL,
Group_Description TEXT NOT NULL
)");
?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

