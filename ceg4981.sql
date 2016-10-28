
DROP DATABASE IF EXISTS CEG4981;
CREATE DATABASE CEG4981;
USE CEG4981;  -- MySQL command




-- create the tables

CREATE TABLE Groups (
  Group_ID INT(9) UNSIGNED NOT NULL AUTO_INCREMENT,
  Group_Name         VARCHAR(80)    NOT NULL,
  Group_Description  VARCHAR(500),   
  Group_Status set('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (Group_ID)
);


CREATE TABLE Employees (
  EM_ID INT(9) UNSIGNED NOT NULL AUTO_INCREMENT,
  EM_Firstname VARCHAR(30) NOT NULL,
  EM_Middlename VARCHAR(30) NOT NULL,
  EM_Lastname VARCHAR(30) NOT NULL,
  EM_Email VARCHAR(50) DEFAULT NULL,
  EM_Phone INT(20) UNSIGNED DEFAULT NULL,
  EM_Status set('Active','Inactive') DEFAULT 'Active',
  EM_Department_ID int(9) UNSIGNED DEFAULT NULL,
  EM_Group_ID int(9) UNSIGNED DEFAULT NULL,
  EM_Date_Start datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (EM_ID)
  );
CREATE TABLE Departments (
  Dept_ID 	int(9) 	UNSIGNED 	NOT NULL 	AUTO_INCREMENT,
  Dept_Name 	varchar(30) 	NOT NULL,
  Dept_Description 	text 	NOT NULL,
  Manager_ID int(9) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (Dept_ID),
  CONSTRAINT FOREIGN KEY (Manager_ID) references Employees (EM_ID)
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
  Group_Leader_ID int(9) UNSIGNED DEFAULT NULL,
  Role_Status set('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (Role_ID),
  
  CONSTRAINT FOREIGN KEY (Dept_ID) references Groups (Group_ID),
  CONSTRAINT FOREIGN KEY (EM_ID) references Employees (EM_ID),
  CONSTRAINT FOREIGN KEY (Group_Leader_ID) references Employees (EM_ID)
   );

CREATE TABLE Logins (

  User_ID int(9) UNSIGNED NOT NULL AUTO_INCREMENT,
  User_name varchar(30) NOT NULL,
  User_Password varchar(50) NOT NULL,
  User_Role set('admin','user','view_only') NOT NULL,
  EM_ID int(9) UNSIGNED NOT NULL,
  Last_login datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (User_ID),
  CONSTRAINT FOREIGN KEY (EM_ID) references Employees (EM_ID)
);
CREATE TABLE Texts (
  Text_ID int(9) UNSIGNED NOT NULL AUTO_INCREMENT,
  Msg_SID int(9) UNSIGNED NOT NULL,
  Direction set('OutgingAPI','Outgoing','Incoming','Reply') DEFAULT NULL,
  Sender_Num int(11) UNSIGNED NOT NULL,
  Recieve_Num int(11) UNSIGNED NOT NULL,
  Text_Content text NOT NULL,
  View_Status set('Read','Unread') DEFAULT NULL,
  Cost int(9) UNSIGNED NOT NULL,
  Msg_Status set('Unsent','Sent','Delievered') DEFAULT NULL,
  Date_sent datetime DEFAULT NULL,
  Date_recieved datetime DEFAULT NULL,
  PRIMARY KEY (Text_ID),
  CONSTRAINT FOREIGN KEY (Msg_SID) references Employees (EM_ID)
);

CREATE TABLE TM_Members_Of_Grps (
  EM_ID int(9) UNSIGNED NOT NULL,
  Group_ID int(9) UNSIGNED NOT NULL,
  
  Group_Status set('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (EM_ID,Group_ID)
) ;

CREATE TABLE Word_Filters (
  Word_ID int(9) UNSIGNED NOT NULL AUTO_INCREMENT,
  Word varchar(30) NOT NULL,
  Word_Status set('Active','Inactive') DEFAULT 'Active',
  PRIMARY KEY (Word_ID)
);
-- populate the database
INSERT INTO Employees VALUES
(1, 'Mary', 'M', 'Brown', 'm.123@wright.edu', 937123456, 'Active', 1, 12, '2016-09-29 23:29:31'),
(2, 'Anna', '', 'Lee', 'A321@wright.edu', 937654321, 'Inactive', 1, 3, '2016-09-29 23:30:04'),
(3, 'Wendy', '', 'Meyer', 'W.156@wright.edu', 4294967295, 'Active', 1, 2, '2016-09-29 23:30:46'),
(5, 'Yipeng', '', 'Wang', 'wang.161@wright.edu', 93723123, 'Active', 1, 2, '2016-10-12 08:23:46');
INSERT INTO Departments VALUES
(1, 'CEG', 'Computer Engineering', 3),
(2, 'CS', 'COMPUTER SCIENCE', 2),
(3, 'Mth', 'Mathmatics', 1);
INSERT INTO Groups VALUES
(1, 'Fire', 'first responder of fire scene','active'),
(2, 'Chemecial', 'First responder of chemical scene','active');
INSERT INTO Roles VALUES
(1, 'account', 'founding management', 1,3,5,'active'),
(2, 'Customer Service', 'Front end customer issue addressing',2, 2,3,'active');


INSERT INTO Logins VALUES
(1, 'w079yxw', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'admin', 5, '2016-10-12 08:23:46'),
(2, 'w123', '637d1f5c6e6d1be22ed907eb3d223d858ca396d8', 'admin', 3, '2016-10-12 08:23:46'), 
(3, 'user', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'admin', 1, '2016-10-12 08:23:46'); 


-- User 1 password is pass
-- 2 password is haha
-- 3 password is password

INSERT INTO texts VALUES
(9, '1', 'Reply', 9378441234, 9377751000, 'House fire on 3rd street in Dayton by the gas station', 'Read', 0.10, 'Unsent', '2016-10-12 08:23:46', '2016-10-12 08:33:13'),
(8, '2', 'Outgoing', 5134257894, 9378441234, 'Active shooter at the shooting range in Vandalia', 'Unread', 0.02, 'Sent', '2016-10-12 08:50:40', '2016-10-12 09:02:01'), 
(6, '3', 'Reply', 9378441201, 9377751000, 'House on fire on 3rd street in Dayton', 'Read', 0.10, 'sent', '2016-10-12 7:23:46', '2016-10-12 07:33:13'),
(3, '5', 'Reply', 5138441234, 9377715600, 'Gas fire in Beavercreek', 'Read', 0.10, 'Delievered', '2016-10-12 10:23:26', '2016-10-12 10:03:53'); 


INSERT INTO TM_Members_Of_Grps VALUES
(3, 7, 'active'),
(8, 3, 'inactive');
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

--


    
