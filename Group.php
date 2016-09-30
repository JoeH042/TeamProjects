<html>
<head>
<title>Add Team</title>
</head>
<body>
    <form action="Group.php" method="post">

<b>Add a New Group</b>


<p>Group Name:
<input type="text" name="g_name" size="30" value="" />
</p>
<p>Group Description:
<input type="text" name="g_des" size="30" value="" />
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
    
    
   
    $GroupName = $_POST['g_name'];
    $GroupDes = $_POST['g_des'];
     //unset($id,$Firstname,$Middlename,$Lastname,$Email,$PhoneNumber,$Status,$Department,$TeamNumber);
   if(!empty($GroupName)&&!empty($GroupDes)){
        //check if value filled or not
       echo "hello";
       $connect = mysql_connect("127.0.0.1","root","");
        $db = mysql_select_db("CEG4981",$connect);
        echo "table  is  created!";
        //link form var value into database table
        
        $sql="INSERT INTO Groups (Group_Name,Group_Description) VALUES ('$GroupName','$GroupDes')";
        
        mysql_query($sql,$connect);
         header("Location: Group.php");
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
<td align="left"><b>Group ID</b></td>
<td align="left"><b>Group Name</b></td>
<td align="left"><b>Group Description</b></td>
</tr>';
$r = mysql_query("SELECT * FROM Groups"); 
if(isset($_GET['recordId'])){
    $id = mysql_real_escape_string($_GET['recordId']);
    
    $sql_delete="DELETE FROM Groups WHERE Group_ID={$id}";
    mysql_query($sql_delete) or die(mysql_error());
    header("Location: Group.php");
}
while($row = mysql_fetch_array($r)){
    //output value from database table
    echo  '<tr><td align="left">' .
           $row['Group_ID']. '</td><td align="left">' .
            $row['Group_Name']. '</td><td align="left">' .
            $row['Group_Description']. '</td><td align="left">'
             ;
    
   ?>
<div class="toolbar">
    <a href="Group.php?recordId=<?php echo $row['Group_ID'];?>">Delete</a>
</div>
       
        
<?php
 echo '</tr>';
}
echo '</table>';
?>
