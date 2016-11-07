<?php

function get_members_by_department($department_id) {
    global $db;
    $query = 'SELECT * 
              FROM employees 
              WHERE employees.EM_Department_ID = :dept_id
              ORDER BY memberID';
    $statement = $db->prepare($query);
    $statement-> bindValue(":dept_id", $department_id);
    $statement->execute();
    $employees = $statement->fetchAll();
    $statement->closeCursor();
    return $employees;           
}

//returns employees based on employee ID
function get_employee($employee_id) {
    global $db;
    $query = 'SELECT * 
              FROM Employees 
              WHERE EM_ID = :employee_id';
    $statement = $db->prepare($query);
    $statement-> bindValue(":employee_id", $employee_id);
    $statement->execute();
    $employee = $statement->fetch();
    $statement->closeCursor();
    return $employee;           
}

//returns all employees
function get_employees() {
    global $db;
    $query = 'SELECT * 
              FROM Employees 
              ORDER BY EM_Lastname';
    $statement = $db->prepare($query);
    $statement->execute();
    $employees = $statement->fetchAll();
    $statement->closeCursor();
    return $employees;       
}

function add_employee( $name, $role_id, $phone_number, $clearances, $usernameRequired, $skills) {
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

function get_next_EM_ID() {
    global $db;
    $query = 'SELECT MAX(EM_ID) from Employees';
    $statement = $db->prepare($query);
    $statement->execute();
    $row = $statement->fetch(); 
    $next_id = $row['EM_ID'] + 1;
    return $next_id;
}

function edit_employee( $name, $role_id, $phone_number, $clearances, $usernameRequired, $skills) {
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
