<html>
<head>
<title>Add Employee</title>
</head>
<body>
    <form action="Employee.php" method="post">

<b>Add a New Employee</b>



<p>First Name:
<input type="text" name="fname" size="30"  value="" />
</p>

<p>Middle Name:
<input type="text" name="mname" size="30" value="" />
</p>
<p>Last Name:
<input type="text" name="lname" size="30" value="" />
</p>

<p>Email:
<input type="text" name="email" size="30" value="" />
</p>

<p>Phone Number:
<input type="text" name="phone" size="30" value="" />
</p>

<p>Status:
<input type="text" name="status" size="30" value="" />
</p>

<p>Department:
<input type="text" name="department" size="30"  value="" />
</p>

<p>Group Number:
<input type="text" name="groupNum" size="30"  value="" />
</p>
<p>Member Starting Date(d/m/y):
<input type="text" name="m_startda" size="30" value="" />
</p>
<p>Member Ending Date(d/m/y):
<input type="text" name="m_endda" size="30" value="" />
</p>
<p>
<input type="submit" name="submit" value="Send" />
</p>


</form>
    
    
    
</body>
</html>




<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    if($_SERVER ['REQUEST_METHOD']=='POST')//check if user submit the form
{
    //link input to table
  
    
    
    $Firstname = $_POST['fname'];
    $Middlename = $_POST['mname'];
    $Lastname = $_POST['lname'];
    $Email = $_POST['email'];
    $PhoneNumber = $_POST['phone'];
    $Status= $_POST['status'];
    $Department= $_POST['department'];
    $GroupNumber= $_POST['groupNum'];
    $M_startD = $_POST['m_startda'];
    $M_endD = $_POST['m_endda'];

   if(!empty($Firstname)&&!empty($Middlename)&&!empty($Lastname)&&!empty($Email)&&!empty($PhoneNumber)&&!empty($Status)&&!empty($Department)&&!empty($GroupNumber)&&!empty($M_startD)&&!empty($M_endD)){
        //check if value filled or not
  echo "hello";
       $connect = mysql_connect("127.0.0.1","root","");
        $db = mysql_select_db("CEG4981",$connect);
        echo "table  a  created!";

        $sql="INSERT INTO Employee (Firstname,Middlename,Lastname,Email,Phone,Status,Group_ID,Department,Date_Start,Date_End) VALUES ('$Firstname','$Middlename','$Lastname','$Email','$PhoneNumber','$Status','$Department','$GroupNumber','$M_startD','$M_endD')";
        
        
        mysql_query($sql,$connect);
        header("Location: Employee.php");
         }
    else {
        echo"Error: please fill all the values";
    }
   
    
    
}
else
{
    
    echo"Please complete the form";
    
}

//header("refresh:2; url=Employee.php ");

?>


<?php

$connect = mysql_connect("127.0.0.1","root","");
$db = mysql_select_db("CEG4981",$connect);

echo '<table align="left"
cellspacing="5" cellpadding="8">
<tr>
<td align="left"><b>ID</b></td>
<td align="left"><b>First Name</b></td>
<td align="left"><b>Middle Name</b></td>
<td align="left"><b>Last Name</b></td>
<td align="left"><b>Email</b></td>
<td align="left"><b>Phone Number</b></td>
<td align="left"><b>Status</b></td>
<td align="left"><b>Department</b></td>
<td align="left"><b>Group ID</b></td>
<td align="left"><b>Register Date</b></td>
</tr>';
$r = mysql_query("SELECT * FROM Employee"); 
while($row = mysql_fetch_array($r)){
    
    echo  '<tr><td align="left">' .
           $row['id']. '</td><td align="left">' .
            $row['Firstname']. '</td><td align="left">' .
            $row['Middlename']. '</td><td align="left">' .
            $row['Lastname']. '</td><td align="left">' .
            $row['Email']. '</td><td align="left">' .
            $row['Phone']. '</td><td align="left">' .
            $row['Status']. '</td><td align="left">' .
            $row['Department']. '</td><td align="left">'.
            $row['Group_ID']. '</td><td align="left">' .
            $row['Date_Start']. '</td><td align="left">' .
            $row['Date_End']. '</td><td align="left">' ;
    echo '</tr>';
}
echo '</table>';
?>
