<?php

//these functions include 

function get_user_last_name ($userName) {
    global $db;
    $query = 'SELECT EM_ID FROM Logins
              WHERE User_name = :user_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $userName);
    $statement->execute();
 //   $nameArray= $statement->fetch();
    $statement->closeCursor();
 //   $lastName = $nameArray['lastName'];
    //return $lastName;
    return 'FakeLastName';
}

function get_user_first_name ($userName) {
    global $db;
    $query = 'SELECT EM_ID FROM Logins
              WHERE User_name = :user_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $userName);
    $statement->execute();
 //   $nameArray= $statement->fetch();
    $statement->closeCursor();
//    $firstName = $nameArray['firstName'];
    //return $firstName;
    return 'FakeFirstName';
}

function get_user_roles ($userName) {
    global $db;
    $query = 'SELECT EM_ID FROM Logins
              WHERE User_name = :user_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $userName);
    $statement->execute();
    //$roleArray= $statement->fetchAll();
    $statement->closeCursor();
    //return $roleArray;
    return array("fakeRole1", "fakeRole2");
}

function get_user_groups ($userName) {
    global $db;
    $query = 'SELECT EM_ID FROM Logins
              WHERE User_name = :user_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $userName);
    $statement->execute();
    //$groupArray= $statement->fetchAll();
    $statement->closeCursor();
    //return $groupArray;
    return array("fakeTeam1", "fakeTeam2");
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
    //return 'fake time';
}

function get_received_messages($userName) {
    global $db;
    $query = 'SELECT EM_ID FROM Logins
              WHERE User_name = :user_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $userName);
    $statement->execute();
    //$receivedMessagesArray= $statement->fetch();
    //$receivedMessages = $receivedMessagesArray['thename'];
    $statement->closeCursor();
    //return $receivedMessages;
    return 'fake number';
}

function get_pending_messages ($userName) {
    global $db;
    $query = 'SELECT EM_ID FROM Logins
              WHERE User_name = :user_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_name', $userName);
    $statement->execute();
  //  $pendingMessagesArray= $statement->fetch();
    $statement->closeCursor();
  //  $pendingMessages = $pendingMessagesArray['theName'];
  //  return $pendingMessages;
    return 'fake number';
}