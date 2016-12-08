DROP DATABASE IF EXISTS CEG4981;
CREATE DATABASE CEG4981;
USE CEG4981;  -- MySQL command




-- create the tables
CREATE TABLE Employees (
  EM_ID INT(9) UNSIGNED NOT NULL AUTO_INCREMENT,
  EM_Firstname VARCHAR(30) NOT NULL,
  EM_Middlename VARCHAR(30) NOT NULL,
  EM_Lastname VARCHAR(30) NOT NULL,
  EM_Email VARCHAR(50) DEFAULT NULL,
  EM_Phone INT(20) UNSIGNED DEFAULT NULL,
  EM_Status set('Active','Inactive') DEFAULT 'Active',
  EM_Department_ID int(9) UNSIGNED NOT NULL,
  PRIMARY KEY (EM_ID)

  );
CREATE TABLE Groups (
  Group_ID INT(9) UNSIGNED NOT NULL AUTO_INCREMENT,
  Group_Name         VARCHAR(80)    NOT NULL,
  Group_Description  VARCHAR(500),   
  Group_Leader_ID INT(9) UNSIGNED NOT NULL,
  Group_Status set('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (Group_ID),
  CONSTRAINT FOREIGN KEY (Group_Leader_ID) references Employees (EM_ID) ON UPDATE CASCADE
);
CREATE TABLE Departments (
  Dept_ID 	int(9) 	UNSIGNED 	NOT NULL 	AUTO_INCREMENT,
  Dept_Name 	varchar(30) 	NOT NULL,
  Dept_Description 	text 	NOT NULL,
  Manager_ID int(9) UNSIGNED DEFAULT NULL,
 Dept_Status set('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (Dept_ID),
  CONSTRAINT FOREIGN KEY (Manager_ID) references Employees (EM_ID)ON UPDATE CASCADE
);

-- ALTER TABLE Employees
-- ADD CONSTRAINT fk_grpID FOREIGN KEY (EM_Group_ID) references Groups (Group_ID),
-- ADD CONSTRAINT fk_emID FOREIGN KEY (EM_Department_ID) references Departments (Dept_ID);

CREATE TABLE Roles (
 
  Role_ID int(9) UNSIGNED NOT NULL AUTO_INCREMENT,
  Role_Name varchar(30) NOT NULL,
  Role_Description text,
  Dept_ID int(9) UNSIGNED DEFAULT NULL,
  EM_ID int(9) UNSIGNED DEFAULT NULL,
  Role_Status set('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (Role_ID),
  
  CONSTRAINT FOREIGN KEY (Dept_ID) references Departments (Dept_ID) ON UPDATE CASCADE,
  CONSTRAINT FOREIGN KEY (EM_ID) references Employees (EM_ID) ON UPDATE CASCADE
   );

CREATE TABLE Logins (

  User_ID int(9) UNSIGNED NOT NULL AUTO_INCREMENT,
  User_name varchar(30) NOT NULL,
  User_Password varchar(50) NOT NULL,
  User_Role set('admin','user','view_only') NOT NULL,
  EM_ID int(9) UNSIGNED NOT NULL,
  Last_login datetime DEFAULT NULL,
  PRIMARY KEY (User_ID),
  CONSTRAINT FOREIGN KEY (EM_ID) references Employees (EM_ID) ON UPDATE CASCADE
);
CREATE TABLE Texts (
  Text_ID int(9) UNSIGNED NOT NULL AUTO_INCREMENT,
  Msg_SID int(9) UNSIGNED NOT NULL,
  Direction set('OutgingAPI','Outgoing','Incomming','Reply') DEFAULT NULL,
  Sender_Num INT(20) UNSIGNED DEFAULT NULL,
  Text_Content text NOT NULL,
  View_Status set('Read','Unread') DEFAULT NULL,
  Cost int(9) UNSIGNED NOT NULL,
  Msg_Status set('Unsent','Sent','Delievered') DEFAULT NULL,
  Date_sent datetime DEFAULT NULL,
  PRIMARY KEY (Text_ID),
  CONSTRAINT FOREIGN KEY (Msg_SID) references Employees (EM_ID)ON UPDATE CASCADE
);
CREATE TABLE Recievers (

  
  Text_ID int(9) UNSIGNED NOT NULL ,
  Recv_EM_ID int(9) UNSIGNED NOT NULL,
Date_recieved datetime DEFAULT NULL,
  PRIMARY KEY (Text_ID,Recv_EM_ID),
  CONSTRAINT FOREIGN KEY (Recv_EM_ID) references Employees (EM_ID)  ON UPDATE CASCADE,
  CONSTRAINT FOREIGN KEY (Text_ID) references Texts (Text_ID)  ON UPDATE CASCADE
);

CREATE TABLE TM_Members_Of_Grps (
GrpMbr_ID int(9) UNSIGNED NOT NULL AUTO_INCREMENT,
  EM_ID int(9) UNSIGNED NOT NULL,
  Group_ID int(9) UNSIGNED NOT NULL,
  Group_Role  varchar(30) DEFAULT NULL,
  Group_Status set('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (GrpMbr_ID),
CONSTRAINT FOREIGN KEY (Group_ID) references Groups (Group_ID)ON UPDATE CASCADE,
CONSTRAINT FOREIGN KEY (EM_ID) references Employees (EM_ID) ON UPDATE CASCADE
) ;

CREATE TABLE Word_Filters (
  Word_ID int(9) UNSIGNED NOT NULL AUTO_INCREMENT,
  Word varchar(30) NOT NULL,
  Word_Status set('Active','Inactive') DEFAULT 'Active',
  PRIMARY KEY (Word_ID)
);
-- populate the database
INSERT INTO Employees VALUES
(1, 'Mary', 'M', 'Brown', 'm123@wright.edu', 1937123456, 'Active', 1),
(2, 'Anna', 'Gar', 'Lee', 'A321@wright.edu', 1937654321, 'Inactive', 1),
(3, 'Wendy', 'Rex', 'Meyer', 'W156@wright.edu', 4294967295, 'Active', 1),
(4, 'Nina', 'Matty', 'Perterson', 'W.12@wright.edu', 1144967295, 'Inactive', 2),
(5, 'Yipeng', 'Craig', 'Wang', 'wang.161@wright.edu', 9372312311, 'Active',  2),
(6, 'John', 'Billy', 'Johnson', 'W.@right.edu', 4294961111, 'Active', 4),
(7, 'XP', 'Carh', 'Windows', 'W12@gmail.edu', 4472951111, 'Inactive', 3),
(8, 'Tina', 'Shamwow', 'June', 'wa@wright.edu', 9372311111, 'Active',  2),
(9, 'Zuli', '', 'R', 'rhodes.68@wright.edu', '+18647065970', 'Active', 1),
(10, 'Joe', '', 'H', 'henning.20@wright.edu', '+15134357101', 'Active', 1);
INSERT INTO Departments VALUES
(1, 'CEG', 'Computer Engineering', 3,'active'),
(2, 'CS', 'COMPUTER SCIENCE', 2,'inactive'),
(3, 'Mth', 'Mathmatics', 1,'active'),

(4, 'ART', 'ART', 5,'active'),
(5, 'BIO', 'BIO SCIENCE', 7,'active'),
(6, 'CHE', 'Chemistry', 4,'inactive');
INSERT INTO Groups VALUES
(1, 'Fire', 'first responder of fire scene',2,'active'),
(2, 'Chemecial', 'First responder of chemical scene',3,'active'),
(3, 'water pipe', 'water managerment',3,'active'),
(4, 'Smoke', 'First responder of Somke',4,'active'),
(5, 'Earthquake', 'first responder of earthquake',4,'active'),
(6, 'Storm', 'First responder of Storm',3,'active');
INSERT INTO Roles VALUES
(1, 'account', 'founding management', 1,4,'active'),
(2, 'Customer Service', 'Front end customer issue addressing',2, 3,'active'),
(3, 'Manager', 'founding management', 2,2,'active'),
(4, 'Customer Service', 'Front end customer issue addressing',3, 5,'active'),
(5, 'account', 'founding management', 2,6,'active'),
(6, 'Customer Service', 'Front end customer issue addressing',3, 6,'active');


INSERT INTO Logins VALUES

(1, 'w079yxw', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'admin', 5, '2016-10-12 08:23:46'),
(2, 'w123', '637d1f5c6e6d1be22ed907eb3d223d858ca396d8', 'admin', 3, '2016-10-12 08:23:46'), 
(3, 'user', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'admin', 1, '2016-10-12 08:23:46'); 

INSERT INTO Texts VALUES 
(2, 2, 'OutgingAPI', '362', 'is washington the name of the cat','Read', 3, 'Sent', '2016-12-02 06:00:00'),
(3, 3, 'OutgingAPI', '12', 'washington street is where the fire is', 'UnRead',3, 'Sent', '2016-12-02 06:00:00'),
(4, 3, 'OutgingAPI', '1234', 'fire in the hole','UnRead', 3, 'Sent', '2016-12-02 06:00:00'),
(5, 1, 'OutgingAPI', '362', 'did you know there was a fire','UnRead', 3, 'Sent', '2016-12-02 06:00:00'),
(6, 2, 'OutgingAPI', '21256', 'the building is dangrouse','UnRead', 3, 'Sent', '2016-12-02 06:00:00'),
(7, 2, 'OutgingAPI', '1234', 'the house is on fire','UnRead', 3, 'Sent', '2016-12-02 06:00:00'),
(8, 2, 'OutgingAPI', '362', 'did you rescue the cat from the fire','UnRead', 3, 'Sent', '2016-12-02 06:00:00'),
(9, 3, 'OutgingAPI', '12', 'is the cat in a hole or on fire','Read', 3, 'Sent', '2016-12-02 06:00:00'),
(14, 10, 'Incomming', '+15134357101', 'This is a test on 12/7', 'Read',1, '', '2016-12-07 15:23:20'),
(15, 10, 'Incomming', '+15134357101', 'Hey this is another test','UnRead', 1, '', '2016-12-07 17:05:53'),
(17, 10, 'Incomming', '+15134357101', '123','Read', 1, '', '2016-12-07 17:12:47'),
(21, 1, '', '+19372034641', 'hi againagain', 'Read',1, '', '2016-12-07 17:39:22'),
(40, 1, '', '+19372034641', 'test', 'UnRead',1, '', '2016-12-07 18:10:32'),
(48, 1, '', '+19372034641', 'JOE123', 'Read',1, '', '2016-12-07 18:36:22'),
(50, 1, 'Outgoing', '+19372034641', 'JOE123','Read', 1, 'Sent', '2016-12-07 18:53:05'),
(51, 1, 'Outgoing', '+19372034641', 'JOE123','Unread', 1, 'Sent', '2016-12-07 18:53:32'),
(52, 1, 'Outgoing', '+19372034641', '6555','Read', 1, 'Sent', '2016-12-07 18:55:43'),
(53, 1, 'Outgoing', '+19372034641', 'asrwt','Read', 1, 'Sent', '2016-12-07 18:56:10'),
(54, 1, 'Outgoing', '+19372034641', '123', 'Read',1, 'Sent', '2016-12-07 18:57:00'),
(55, 1, 'Outgoing', '+19372034641', 'ferf', 'UnRead',1, 'Sent', '2016-12-07 19:01:56'),
(56, 1, '', '+19372034641', 'fun?','Read', 1, '', '2016-12-07 19:04:57'),
(57, 1, 'Outgoing', '+19372034641', '7:07pm','Read', 1, 'Sent', '2016-12-07 19:07:23'),
(1, 1, 'OutgingAPI', '1234', 'no washington is the street name, the cat is in the house, and the house is on fire. there is no hole.','Read', 3, 'Sent', '2016-12-02 06:00:00');


INSERT INTO  Recievers VALUES

(1,5,'2016-12-07 15:23:20'),
(2,6,'2016-10-03 12:23:20'),
(2,5,'2016-10-08 10:23:20'),
(2,7,'2016-11-07 4:23:20'),
(5,3,'2016-12-09 11:23:20'),
(5,4,'2016-12-21 12:13:20'),
(6,1,'2016-11-09 5:23:20'),
(6,4,'2016-11-07 15:23:20'),
(7,3,'2016-12-07 6:20:20'),
(7,4,'2016-1-07 5:03:20'),
(7,1,'2016-12-09 6:13:20'),
(50,1,'2016-12-09 6:13:20'),
(2,8,'2016-6-6 6:6:6');

-- User 1 password is pass
-- 2 password is haha
-- 3 password is password
INSERT INTO TM_Members_Of_Grps VALUES
(1,1, 1, 'Leader','active'),
(2,2, 1, '','active'),
(3,3, 3,'Leader','inactive'),
(4,4, 4,' ','active'),
(5,5, 4, 'Leader','inactive'),
(6,6, 2,'', 'active'),
(7,7, 5, '','inactive'),
(8,8, 6,'Leader', 'inactive'),
(9,6, 3,'', 'active');
INSERT INTO   Word_Filters VALUES
(1, 'a', 'Active'),
(2, 'the ', 'Active'),
(3, 'you', 'Active'),
(4, 'is', 'Active'),
(5, 'i', 'Active'),
(6, 'we', 'Inactive'),
(7, 'are', 'Active'),
(8, 'can', 'Active'),
(9, 'be', 'Active'),
(10, 'why', 'Active');
