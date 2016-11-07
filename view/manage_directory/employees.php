<?php
    //require_once('/util/secure_conn.php');  // require a secure connection
    //require_once('/util/valid_admin.php');  // require a valid user

    include 'view/uniform/header.php';
?> 

<main>
     <aside>
        <h2>Employee Directory</h2>
        <form>
            <!--a drop down for roles-->
            <label>Locate by role:</label>
            <select name="role_id">
                <?php foreach ($roles as $role) : ?>
                    <option value="<?php echo $role['Role_ID']; ?>">
                        <?php echo $employee['Role_ID'] ." ". $employee['Role_Name']; ?>
                    </option>
               <?php endforeach; ?>
            </select>
            <br>
            <label>&nbsp;</label>
            <input type="submit" value="Submit">
        </form>
        
        <form>
            <!--a drop down for departments-->
            <label>Locate by department:</label>
            <select name="dept_id">
                <?php foreach ($departments as $department) : ?>
                    <option value="<?php echo $department['Dept_ID']; ?>">
                        <?php echo $department['Dept_ID'] ." ". $department['Dept_Name']; ?>
                    </option>
               <?php endforeach; ?>
            </select>
            <br>
            <label>&nbsp;</label>
            <input type="submit" value="Submit">
        </form>    
        
        <form>
            <!--a drop down for employees-->
            <label>Locate by employee name:</label>
            <select name="em_id">
                <?php foreach ($employees as $employee) : ?>
                    <option value="<?php echo $employee['EM_ID']; ?>">
                        <?php echo $employee['EM_Firstname'] ." ". $employee['EM_Lastname']; ?>
                    </option>
               <?php endforeach; ?>
            </select>
            <br>
            <label>&nbsp;</label>
            <input type="submit" value="Submit">
        </form>   
    </aside>
    
    <section>
        <!--display a table of members -->
        <table>
            <tr>
                <th> Employee ID </th>
                <th> First Name </th>
                <th> Middle Name </th>
                <th> Last Name </th>
                <th> Email </th>
                <th> Phone Number </th>
                <th> Status </th>
                <th>&nbsp;</th>
                <!--Add Role, Manager, split first and last name -->
            </tr>
            <?php foreach ($employees as $employee) : ?>
            <tr>
                <td><?php echo $employee['EM_ID']; ?></td>
                <td><?php echo $employee['EM_Firstname']; ?></td>
                <td><?php echo $employee['EM_Middlename']; ?></td>
                <td><?php echo $employee['EM_Lastname']; ?></td>
                <td><?php echo $employee['EM_Email']; ?></td>
                <td><?php echo $employee['EM_Phone']; ?></td>
                <td><?php echo $employee['EM_Status']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="edit_employee">
                    <input type="hidden" name="em_id"
                           value="<?php echo $employee['EM_ID']; ?>">
                    <input type="submit" value="Edit">
                    </form></td>
            </tr>
            <?php endforeach; ?>
                <!-- Add an option to delete row -->
        </table>
        
        <p class="last_paragraph">
            <a href="index.php?action=show_add_member">Add New Employee</a>
        </p>
        
    </section>
    
    
</main>

<?php include 'view/uniform/footer.php'; ?>
