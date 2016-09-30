<html>
<head>
<title>Add Department</title>
</head>
<body>
    <form action="Department.php" method="post">

<b>Add a New Department</b>

<p>Department Name:
<input type="text" name="D_name" size="30"  value="" />
</p>

<p>Department Description:
<input type="text" name="D_des" size="30" value="" />
</p>
<p>Manager Number:
<input type="text" name="Manager_Num" size="30" value="" />
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
    
     unset($Depname,$Depdes,$MangNum);
    $Depname = $_POST['D_name'];
    $Depdes = $_POST['D_des'];
    $MangNum = $_POST['Manager_Num'];
     //unset($id,$Firstname,$Middlename,$Lastname,$Email,$PhoneNumber,$Status,$Department,$TeamNumber);
   if(!empty($Depname)&&!empty($Depdes)&&!empty($MangNum)){
        //check if value filled or not
       echo "hello";
       $connect = mysql_connect("127.0.0.1","root","");
        $db = mysql_select_db("CEG4981",$connect);
        echo "table  is  created!";
        //link form var value into database table
        
        $sql="INSERT INTO Department (Dept_Name,Dept_Description,Manager_Num) VALUES ('$Depname','$Depdes','$MangNum')";
        
        mysql_query($sql,$connect);
        
   header("Location: Department.php");
         }
    else {
        echo"Error: please fill all the values";
    }
   
    
    
    
}
else
{
    
    echo"Please complete the form";
    
}
?>

<?php
$connect = mysql_connect("127.0.0.1","root","");
$db = mysql_select_db("CEG4981",$connect);
echo '<table align="left"
cellspacing="5" cellpadding="8">
<tr>
<td align="left"><b>Department ID</b></td>
<td align="left"><b>Department Name</b></td>
<td align="left"><b>Department Description</b></td>
<td align="left"><b>Manager Number</b></td>
</tr>';
$r = mysql_query("SELECT * FROM Department"); 
if(isset($_GET['recordId'])){
    $id = mysql_real_escape_string($_GET['recordId']);
    
    $sql_delete="DELETE FROM Department WHERE Dept_ID={$id}";
    mysql_query($sql_delete) or die(mysql_error());
    header("Location: Department.php");
}
while($row = mysql_fetch_array($r)){
    //output value from database table
    echo  '<tr><td align="left">' .
           $row['Dept_ID']. '</td><td align="left">' .
            $row['Dept_Name']. '</td><td align="left">' .
            $row['Dept_Description']. '</td><td align="left">' .
            $row['Manager_Num']. '</td><td align="left">' 
             ;?>
  <div class="toolbar">
    <a href="Department.php?recordId=<?php echo $row['Dept_ID'];?>">Delete</a>
</div>

<?php
echo '</tr>';
}
echo '</table>';
?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

