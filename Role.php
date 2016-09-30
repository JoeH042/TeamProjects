<html>
<head>
<title>Add Role</title>
</head>
<body>
    <form action="Role.php" method="post">

<b>Add a New Role</b>

<p>Role Name:
<input type="text" name="role_name" size="30" value="" />
</p>
<p>Role Description:
<input type="text" name="role_des" size="30" value="" />
</p>
<p>Member ID:
<input type="text" name="m_id" size="30"  value="" />
</p>
<p>Group ID:
<input type="text" name="g_id" size="30" value="" />
</p>
<p>Report to:
<input type="text" name="mgr_id" size="30"  value="" />
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
    
    
   
    $Role_name = $_POST['role_name'];
    $Role_des = $_POST['role_des'];
     $Member_ID = $_POST['m_id'];
    $Group_ID= $_POST['g_id'];
     $Mgr_ID = $_POST['mgr_id'];
     //unset($id,$Firstname,$Middlename,$Lastname,$Email,$PhoneNumber,$Status,$Department,$TeamNumber);
   if(!empty($Member_ID)&&!empty($Role_name)&&!empty($Role_des)&&!empty($Group_ID)&&!empty($Mgr_ID)){
        //check if value filled or not
       echo "hello";
       $connect = mysql_connect("127.0.0.1","root","");
        $db = mysql_select_db("CEG4981",$connect);
        echo "table  is  created!";
        //link form var value into database table
        
      $sql="INSERT INTO Role (Member_id,Role_Name,Role_Description,Group_Number,Role_Report_To) VALUES ('$Member_ID','$Role_name','$Role_des','$Group_ID',$Mgr_ID)";
          mysql_query($sql,$connect);
        
   header("Location: Role.php");
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
<td align="left"><b>Role ID</b></td>
<td align="left"><b>Role Name</b></td>
<td align="left"><b>Role Description</b></td>
<td align="left"><b>Group Number</b></td>
<td align="left"><b>Member ID</b></td>
<td align="left"><b>Role Report To</b></td>
</tr>';
$r = mysql_query("SELECT * FROM Role"); 
while($row = mysql_fetch_array($r)){
    //output value from database table
    echo  '<tr><td align="left">' .
           $row['Role_ID']. '</td><td align="left">' .
            $row['Role_Name']. '</td><td align="left">' .
            $row['Role_Description']. '</td><td align="left">' .
            $row['Member_id']. '</td><td align="left">' .
            $row['Group_Number']. '</td><td align="left">'. 
            $row['Role_Report_To']. '</td><td align="left">' 
             ;
    echo '</tr>';
}
echo '</table>';
?>
