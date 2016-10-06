<main>
    <h1>Add Member</h1>
    <form action="index.php" method="post" id="add_member_form">
        <input type="hidden" name="action" value="add_member">
        
        <label>Role:</label>
        <select name="role_name">
            <?php foreach ($roles as $role) : ?>
            <option value="<?php echo $role['roleName']; ?>">
                <?php echo $role['roleName']; ?>
            </option>
            <?php endforeach; ?>
        </select>
        <br><br>
        
        <label>First Name:</label>
        <input type="text" name="fname" pattern="^[-a-zA-Z]+$" title="Name input accepts alphabetic characters and dashes only." />
        <br><br>
        
        <label>Last Name:</label>
        <input type="text" name="lname" pattern="^[-a-zA-Z]+$" title="Name input accepts alphabetic characters and dashes only." />
        <br><br>
        
        <label>Phone Number:</label>
        <input type="text" name="phone" pattern="^\d{10}$" title="Phone number input must contain 10 digits. No extra characters allowed."/>
        <br><br>        
        
        <label>Active:</label>
          <input type="checkbox" name="Active" value="Y"><br>
        <br>
        
        <label>Skills:</label><br>
          <textarea rows="4" cols="50" name="skills" form="add_member_form"></textarea>
        <br>
                       
        <label>&nbsp;</label>
        <input type="submit" value="Add Member" />
        <br>        
    </form>
    
    <p class="last_paragraph">
        <a href="index.php?action=list_members">View Member Directory</a>
    </p>
    
</main>

