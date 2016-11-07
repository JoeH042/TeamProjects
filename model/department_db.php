<?php

//returns all departments
function get_departments() {
    global $db;
    $query = 'SELECT * 
              FROM Departments
              ORDER BY Dept_ID';
    $statement = $db->prepare($query);
    $statement->execute();
    $departments = $statement->fetchAll();
    $statement->closeCursor();
    return $departments;       
}


