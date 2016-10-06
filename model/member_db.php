<?php

function get_members_by_roles($role_id) {
    global $db;
    $query = 'SELECT * 
              FROM individuals 
              WHERE individuals.roleID = :role_id
              ORDER BY memberID';
    $statement = $db->prepare($query);
    $statement-> bindValue(":role_id", $role_id);
    $statement->execute();
    $members = $statement->fetchAll();
    $statement->closeCursor();
    return $members;           
}

function get_member($employee_id) {
    global $db;
    $query = 'SELECT * 
              FROM Employee 
              WHERE Employee.id = :employee_id
              ORDER BY id';
    $statement = $db->prepare($query);
    $statement-> bindValue(":employee_id", $employee_id);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();
    $employee_name = $row['Firstname'];
    return $employee_name;           
}

function get_members($member_id) {
    global $db;
    $query = 'SELECT * 
              FROM individuals 
              ORDER BY memberID';
    $statement = $db->prepare($query);
    $statement-> bindValue(":member_id", $member_id);
    $statement->execute();
    $members = $statement->fetchAll();
    $statement->closeCursor();
    return $members;       
}

function delete_member($member_id) {
    global $db;
    $query = 'DELETE FROM individuals
              WHERE memberID = :member_id';
    $statement = $db-> prepare($query);
    $statement->bindValue(':member_id', $member_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_member( $name, $role_id, $phone_number, $clearances, $usernameRequired, $skills) {
    global $db;
    $query = 'INSERT INTO individuals
                (memberName,roleID, memberPhoneNum, clearances, usernameRequired, skills)
            VALUES
                (:name, :role_id, :phone_number, :clearances, :usernameRequired, :skills)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':role_id', $role_id);
    $statement->bindValue(':phone_number', $phone_number);
    $statement->bindValue(':clearances', $clearances);
    $statement->bindValue(':usernameRequired', $usernameRequired);
    $statement->bindValue(':skills', $skills);
    $statement->execute();
    $statement->closeCursor();       
}

function get_next_memberID() {
    global $db;
    $query = 'SELECT MAX(memberID) from individuals';
    $statement = $db->prepare($query);
    $statement->execute();
    $row = $statement->fetch(); 
    $next_id = $row['memberID'] + 1;
    return $next_id;
}
    
function get_member_roleID ($role_name) {
    global $db;
    $query = 'SELECT roleID FROM roles
              WHERE roleName = :role_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':role_name', $role_name);
    $statement->execute();
    $role= $statement->fetch();
    $statement->closeCursor();
    $role_id = $role['roleID'];
    echo $role_id;
    return $role_id;
}

