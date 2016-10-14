<?php

//checks to see if the user is valid
function is_valid_user_login($username, $password){
    global $db;
    $encrypted_password = sha1($password);
    $query = 'SELECT User_ID 
             FROM login 
             WHERE User_name = :username AND 
                   User_Password = :password';
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