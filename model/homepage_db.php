<?php

//these functions include 

function get_user_last_name ($userName) {
    global $db;
    $query = 'SELECT Employees.EM_Lastname 
              FROM Employees JOIN Logins 
                ON Logins.EM_ID = Employees.EM_ID 
              WHERE Logins.User_name =:user_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $userName);
    $statement->execute();
    $nameArray= $statement->fetch();
    $statement->closeCursor();
    $lastName = $nameArray['EM_Lastname'];
    return $lastName;
}

function get_user_first_name ($userName) {
    global $db;
    $query = 'SELECT Employees.EM_Firstname 
              FROM Employees JOIN Logins 
                ON Logins.EM_ID = Employees.EM_ID 
              WHERE Logins.User_name =:user_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $userName);
    $statement->execute();
    $firstNameArray= $statement->fetch();
    $statement->closeCursor();
    $first_name = $firstNameArray['EM_Firstname'];
    return $first_name;
}

function get_user_roles ($userName) {
    global $db;
    $query = 'SELECT Roles.Role_Name FROM Roles
             JOIN Logins ON Logins.EM_ID = Roles.EM_ID
             WHERE Logins.User_name = :user_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $userName);
    $statement->execute();
    $roleArray= $statement->fetchAll();
    $statement->closeCursor();
    return $roleArray;
    //return array("fakeRole1", "fakeRole2");
}

function get_user_groups ($userName) {
    global $db;
    $query = 'SELECT Groups.Group_Name FROM Groups
              JOIN Tm_members_of_grps ON Tm_members_of_grps.Group_ID = Groups.Group_ID 
              JOIN Logins ON Logins.EM_ID = Tm_members_of_grps.EM_ID 
              WHERE Logins.User_name = :user_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $userName);
    $statement->execute();
    $groupArray= $statement->fetchAll();
    $statement->closeCursor();
    return $groupArray;
    //return array("fakeTeam1", "fakeTeam2");
}

function get_last_login_time ($userName) {
    global $db;
    $query = 'SELECT Last_login AS "LastLogin" FROM Logins 
             WHERE User_name =:user_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $userName);
    $statement->execute();
    $timeArray= $statement->fetch();
    $statement->closeCursor();
    $login_time = $timeArray['LastLogin'];
    return $login_time;
}

function get_received_messages($userName) {
    global $db;
    $query = 'SELECT COUNT(View_Status) AS "Pending" FROM Texts
             JOIN Logins ON Logins.EM_ID = Texts.Msg_SID
             WHERE texts.View_Status = :unread AND Logins.User_name = :user_name;';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $userName);
    $statement->bindValue(':unread', 'Unread');    
    $statement->execute();
    $receivedMessagesArray= $statement->fetch();
    $receivedMessages = $receivedMessagesArray['Pending'];
    $statement->closeCursor();
    return $receivedMessages;
    //return 'fake number';
}

function get_pending_messages ($userName) {
    global $db;
    $query ='SELECT COUNT(View_Status) AS "Pending" FROM Texts
             JOIN Logins ON Logins.EM_ID = Texts.Msg_SID
             WHERE texts.View_Status = :unread AND Logins.User_name = :user_name;';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $userName);
    $statement->bindValue(':unread', 'Unread');
    $statement->execute();
    $pendingMessagesArray= $statement->fetch();
    $statement->closeCursor();
    $pendingMessages = $pendingMessagesArray['Pending'];
    return $pendingMessages;
    //return 'fake number';
}