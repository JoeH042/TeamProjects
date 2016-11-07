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

        $employee_id = filter_input(INPUT_POST, 'em_id');
        $fname = filter_input(INPUT_POST, 'fname');
        $mname = filter_input(INPUT_POST, 'mname');
        $lname = filter_input(INPUT_POST, 'lname');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');
        $status = filter_input(INPUT_POST, 'status');
        $dept_id = filter_input(INPUT_POST, 'dept_id');

function add_employee( $employee_id, $fname, $mname, $lname, $email, $phone, $status, $dept_id) {
    global $db;
    $query = 'INSERT INTO individuals
                (EM_ID, EM_Firstname, EM_Middlename, EM_Lastname, EM_Email, EM_Phone, EM_Status, EM_Department_ID)
            VALUES
                (:em_id, :fname, :mname, :lname, :email, :phone, :status, :dept_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':em_id', $employee_id);
    $statement->bindValue(':fname', $fname);
    $statement->bindValue(':mname', $mname);
    $statement->bindValue(':lname', $lname);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':status', $status);
    $statement->bindValue(':dept_id', $dept_id);
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

function edit_employee( $employee_id, $fname, $mname, $lname, $email, $phone, $status, $dept_id) {
    global $db;
    $query = 'INSERT INTO individuals
                (EM_ID, EM_Firstname, EM_Middlename, EM_Lastname, EM_Email, EM_Phone, EM_Status, EM_Department_ID)
            VALUES
                (:em_id, :fname, :mname, :lname, :email, :phone, :status, :dept_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':em_id', $employee_id);
    $statement->bindValue(':fname', $fname);
    $statement->bindValue(':mname', $mname);
    $statement->bindValue(':lname', $lname);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':status', $status);
    $statement->bindValue(':dept_id', $dept_id);
    $statement->execute();
    $statement->closeCursor();          
}
