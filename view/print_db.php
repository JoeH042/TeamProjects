

<!DOCTYPE html>


<?php

function printemployeeInfo($employee_id) {
    include 'view/uniform/header.php';

    global $db;
    $query = 'SELECT * 
              FROM Employees 
              WHERE Employees.EM_ID = :employee_id
              ORDER BY EM_ID';
    $statement = $db->prepare($query);
    $statement->bindValue(":employee_id", $employee_id);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();
    //  $employee_name = $row['EM_Firstname'];
    $matchingValues = ($statement->rowCount());
    if ($matchingValues > 0) {
        echo '<table align="left"
cellspacing="5" cellpadding="8">
<tr>
<td align="left"><b>Employee ID   </b></td>
<td align="left"><b>First Name   </b></td>
<td align="left"><b>Middle Name   </b></td>
<td align="left"><b>Last Name   </b></td>
<td align="left"><b>Email     </b></td>
<td align="left"><b>Phone Number    </b></td>
<td align="left"><b>Status    </b></td>
<td align="left"><b>Department ID   </b></td>
<td align="left"><b>Group ID    </b></td>
<td align="left"><b>Register Date    </b></td>
</tr>';
        //add while loop here if print multiple
        echo '<tr><td align="right">' .
        $row['EM_ID'] . '</td><td align="middle">' .
        $row['EM_Firstname'] . '</td><td align="middle">' .
        $row['EM_Middlename'] . '</td><td align="middle">' .
        $row['EM_Lastname'] . '</td><td align="middle">' .
        $row['EM_Email'] . '</td><td align="middle">' .
        $row['EM_Phone'] . '</td><td align="middle">' .
        $row['EM_Statu'] . '</td><td align="middle">' .
        $row['EM_Department_ID'] . '</td><td align="middle">' .
        $row['EM_Group_ID'] . '</td><td align="middle">' .
        $row['EM_Date_Start'] . '</td><td align="middle">';
        echo '</tr>';
        echo '</table>';
    } else {
        echo "<tr>invalid employee id.</tr>";
    }
    ?>

    <p><a href=index.php?action=member_view>Return </a></p>


    <?php include 'view/uniform/footer.php';
} ?>

   <?php function printgroupInfo($grp_id) {
    include 'view/uniform/header.php'; 

    global $db;
    $query = 'SELECT * 
    FROM Groups 
    WHERE Groups.Group_ID = :grp_id
    ORDER BY Group_ID';
    $statement = $db->prepare($query);
    $statement-> bindValue(":grp_id", $grp_id);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();
    //  $employee_name = $row['EM_Firstname'];
    $matchingValues = ($statement->rowCount());
    if( $matchingValues > 0){
    echo '<table align="left"
                 cellspacing="5" cellpadding="8">
        <tr>
            <td align="left"><b>Group ID   </b></td>
            <td align="left"><b>Group Name   </b></td>
            <td align="left"><b>Group Description   </b></td>
            
        </tr>';
        //add while loop here if print multiple
        echo  '<tr><td align="right">' .
                $row['Group_ID']. '</td><td align="middle">'.
                $row['Group_Name']. '</td><td align="middle">' .
                $row['Group_Description']. '</td><td align="middle">' 
                ;
                echo '</tr>';   
        echo '</table>';

    }
    else  {
        echo "<tr>invalid Group id.</tr>";
    }
    ?>

    <p><a href=index.php?action=member_view>Return </a></p>


    <?php include 'view/uniform/footer.php';
} ?>