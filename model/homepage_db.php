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

/*
 * Returns the employee names of people in this department and sent messages sorted by sent messages.
 */
//Removed "//AND Texts.Date_sent > DATE_SUB(NOW(), INTERVAL 24 HOUR)" from line 117 to get all messages for testing purposes
function get_24_hr_messages_from_dept($userName){
    global $db;
    $query = 'SELECT COUNT(Msg_Status), Employees.EM_ID, Employees.EM_Firstname, Employees.EM_Lastname FROM Employees
              JOIN Texts ON Texts.Msg_SID = Employees.EM_ID
              JOIN Departments ON Departments.Dept_ID = Employees.EM_Department_ID
              JOIN Logins ON Logins.EM_ID = Texts.Msg_SID
              WHERE texts.Msg_Status = :sent AND Departments.Dept_ID = Departments.Dept_ID
              AND Logins.User_name = :user_name 
              ORDER by COUNT(Msg_Status) DESC';
              $statement = $db->prepare($query);
              $statement->bindValue(':user_name', $userName);
              $statement->bindValue(':sent', 'Sent');
              $statement->execute();
              $array = $statement->fetch();
              return $array;
    }
    
function get_24_hr_popular($userName){
    global $db;
    $query = 'SELECT COUNT(DISTINCT texts.Text_ID), EM.EM_ID, EM.EM_Firstname, EM.EM_Lastname FROM Employees EM
        JOIN Texts ON Texts.Msg_SID = EM.EM_ID
        JOIN employees ON EM.EM_Department_ID = employees.EM_Department_ID
        WHERE texts.Msg_Status = :sent
        AND employees.EM_Department_ID =
        (SELECT B.EM_Department_ID AS boss FROM employees B
        JOIN logins ON logins.User_ID = B.EM_ID
        WHERE logins.User_name = :user_name)
        AND Texts.Date_sent > DATE_SUB(NOW(), INTERVAL 150 HOUR)
        Group By EM.EM_ID
        ORDER by COUNT(Msg_Status) DESC';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $userName);
    $statement->bindValue(':sent', 'Sent');
    $statement->execute();
    $input = $statement->fetchAll(); //$array = array_slice($input, 0, 5, true);     //only send the top 5
    echo $input[2]['EM_ID'];
    return $input; 
    }    
    