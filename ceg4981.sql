-- create and select the database
DROP DATABASE IF EXISTS CEG4981;
CREATE DATABASE CEG4981;
USE CEG4981;  -- MySQL command




-- create the tables

CREATE TABLE Groups (
  Group_ID INT(9) UNSIGNED NOT NULL AUTO_INCREMENT,
  Group_Name         VARCHAR(80)    NOT NULL,
  Group_Description  VARCHAR(500),   
  PRIMARY KEY (Group_ID)
);


CREATE TABLE Employee (
  EM_ID INT(9) UNSIGNED NOT NULL AUTO_INCREMENT,
  EM_Firstname VARCHAR(30) NOT NULL,
  EM_Middlename VARCHAR(30) NOT NULL,
  EM_Lastname VARCHAR(30) NOT NULL,
  EM_Email VARCHAR(50) DEFAULT NULL,
  EM_Phone INT(10) UNSIGNED DEFAULT NULL,
  EM_Statu set('Active','Inactive') DEFAULT NULL,
  EM_Department_ID int(9) UNSIGNED DEFAULT NULL,
  EM_Group_ID int(9) UNSIGNED DEFAULT NULL,
  EM_Date_Start datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (EM_ID)
  );
CREATE TABLE Department (
  Dept_ID 	int(9) 	UNSIGNED 	NOT NULL 	AUTO_INCREMENT,
  Dept_Name 	varchar(30) 	NOT NULL,
  Dept_Description 	text 	NOT NULL,
  Manager_ID int(9) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (Dept_ID),
  CONSTRAINT FOREIGN KEY (Manager_ID) references Employee (EM_ID)
);

-- ALTER TABLE Employee
-- ADD CONSTRAINT fk_grpID FOREIGN KEY (EM_Group_ID) references Groups (Group_ID),
-- ADD CONSTRAINT fk_emID FOREIGN KEY (EM_Department_ID) references Department (Dept_ID);

CREATE TABLE Roles (
 
  Role_ID int(9) UNSIGNED NOT NULL AUTO_INCREMENT,
  Role_Name varchar(30) NOT NULL,
  Role_Description text,
  Group_ID int(9) UNSIGNED DEFAULT NULL,
  EM_ID int(9) UNSIGNED DEFAULT NULL,
  Group_Supervisor_ID int(9) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (Role_ID),
  CONSTRAINT FOREIGN KEY (Group_ID) references Groups (Group_ID),
  CONSTRAINT FOREIGN KEY (EM_ID) references Employee (EM_ID),
  CONSTRAINT FOREIGN KEY (Group_Supervisor_ID) references Employee (EM_ID)
   );

CREATE TABLE Login (

  User_ID int(9) UNSIGNED NOT NULL AUTO_INCREMENT,
  User_name varchar(30) NOT NULL,
  User_Password varchar(30) NOT NULL,
  User_Role varchar(30) NOT NULL,
  EM_ID int(9) UNSIGNED NOT NULL,
  PRIMARY KEY (User_ID),
  CONSTRAINT FOREIGN KEY (EM_ID) references Employee (EM_ID)
);
CREATE TABLE Texts (
  Text_ID int(9) UNSIGNED NOT NULL AUTO_INCREMENT,
  Msg_SID varchar(40) DEFAULT NULL,
  Direction set('OutgingAPI','Outgoing','Incomming','Reply') DEFAULT NULL,
  Sender_Num int(11) UNSIGNED NOT NULL,
  Recieve_Num int(11) UNSIGNED NOT NULL,
  Text_Content text NOT NULL,
  View_Status set('Read','Unread') DEFAULT NULL,
  Cost int(9) UNSIGNED NOT NULL,
  Msg_Status set('Unsent','Sent','Delievered') DEFAULT NULL,
  Date_sent datetime DEFAULT NULL,
  Date_recieved datetime DEFAULT NULL,
  PRIMARY KEY (Text_ID)
);

CREATE TABLE TM_Member_Of_Grp (
  EM_ID int(9) UNSIGNED NOT NULL,
  Group_ID int(9) UNSIGNED NOT NULL,
  Member_StartingDate datetime DEFAULT CURRENT_TIMESTAMP,
  Member_EndingDate datetime DEFAULT NULL,
  PRIMARY KEY (EM_ID,Group_ID)
) ;

CREATE TABLE Word_Filter (
  Word_ID int(9) UNSIGNED NOT NULL AUTO_INCREMENT,
  Word varchar(30) NOT NULL,
  Word_Status set('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (Word_ID)
);
-- populate the database
INSERT INTO Employee VALUES
(1, 'Mary', 'M', 'Brown', 'm.123@wright.edu', 937123456, 'Active', 1, 12, '2016-09-29 23:29:31'),
(2, 'Anna', '', 'Lee', 'A321@wright.edu', 937654321, 'Inactive', 1, 3, '2016-09-29 23:30:04'),
(3, 'Wendy', '', 'Meyer', 'W.156@wright.edu', 4294967295, 'Active', 1, 2, '2016-09-29 23:30:46');

INSERT INTO Department VALUES
(1, 'CEG', 'Computer Engineering', 3),
(2, 'CS', 'COMPUTER SCIENCE', 2),
(3, 'Mth', 'Mathmatics', 1);
INSERT INTO Groups VALUES
(1, 'Fire', 'first responder of fire scene'),
(2, 'Chemecial', 'First responder of chemical scene');
INSERT INTO Roles VALUES
(1, 'account', 'founding management', 1, 3, 2),
(2, 'Customer Service', 'Front end customer issue addressing', 2, 1, 3);

INSERT INTO Login VALUES
(1, 'Anna Lee', 'Password', 'Password', 2);

INSERT INTO TM_Member_Of_Grp VALUES
(3, 7, '2016-09-29 23:33:48', NULL),
(8, 3, '2016-09-29 23:33:54', NULL);
INSERT INTO   Word_Filter VALUES
(1, 'a', 'Active'),
(2, 'the ', 'Active'),
(3, 'copy', 'Active'),
(4, 'roger', 'Active'),
(5, 'fire', 'Active'),
(6, 'move', 'Inactive'),
(7, 'find', 'Active'),
(8, 'chemical', 'Active'),
(9, 'dangerous', ''),
(10, 'dangerous', 'Active');

--

