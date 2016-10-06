<?php

//Checks to see if the username is unique before creating a new user account
function is_unique_username($username){
    global $db;
    $query = 'SELECT userID FROM user_accounts WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username',$username);
    $statement->execute();   
    $matchingValues = ($statement->rowCount());   
    if( $matchingValues > 0){
        $unique = FALSE;
    } else {
        $unique = TRUE;
    }    
    $statement->closeCursor();

    return $unique;
}

//adds a new user to the account
function add_user($username, $password) {
    global $db;
    $defaultRole = 'user';
    $encrypted_password = sha1($password);   
    $query = 'INSERT INTO user_accounts (username, password, role)'
            . 'VALUES (:username, :password, :role)';
    $statement = $db->prepare($query);
    $statement->bindValue(':username',$username);
    $statement->bindValue(':password', $encrypted_password);
    $statement->bindValue(':role', $defaultRole);
    $statement->execute();
    $statement->closeCursor();
}

//checks to see if the user is valid
function is_valid_user_login($username, $password){
    global $db;
    $encrypted_password = sha1($password);
    $query = 'SELECT userID FROM user_accounts WHERE username = :username AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':username',$username);
    $statement->bindValue(':password', $encrypted_password);
    $statement->execute();  
    $matchingValues = ($statement->rowCount());  
    if( $matchingValues > 0){
        $valid = TRUE;
    } else {
        $valid = FALSE;
    }  
    $statement->closeCursor();
    return $valid;
}

function is_valid_admin_login($username){
    global $db;
    $valid = FALSE;
    $query = 'SELECT role FROM user_accounts WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username',$username);
    $statement->execute();
    $role = $statement->fetch();
    $statement->closeCursor();
    if ($role[0]=="admin"){
        $valid = TRUE;
    }
    return $valid;
}

