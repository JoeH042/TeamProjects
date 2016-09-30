<html>
<head>
<title>Add Element</title>
</head>
<body>
    <form action="TM_Member_Of_Grp.php" method="post">

<b>Add a New Member and Group relationship</b>

<p>Member ID:
<input type="text" name="m_id" size="30"  value="" />
</p>

<p>Group ID:
<input type="text" name="g_id" size="30" value="" />
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
    
    
    $M_id = $_POST['m_id'];
    $G_id = $_POST['g_id'];
    if(!empty($M_id)&&!empty($G_id)){
        //check if value filled or not
       echo "hello";
       $connect = mysql_connect("127.0.0.1","root","");
        $db = mysql_select_db("CEG4981",$connect);
        echo "table  is  created!";
        //link form var value into database table
        
       $sql="INSERT INTO TM_Member_Of_Grp (Member_ID,Group_ID) VALUES ('$M_id','$G_id')";
         
        mysql_query($sql,$connect);
         header("Location: TM_Member_Of_Grp.php");
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
<td align="left"><b>Member ID</b></td>
<td align="left"><b>Group ID</b></td>
<td align="left"><b>Member Starting Date</b></td>
<td align="left"><b>Member Ending Date</b></td>
</tr>';
$r = mysql_query("SELECT * FROM TM_Member_Of_Grp"); 
while($row = mysql_fetch_array($r)){
    
    echo  '<tr><td align="left">' .
           $row['Member_ID']. '</td><td align="left">' .
            $row['Group_ID']. '</td><td align="left">' .
            $row['Member_StartingDate']. '</td><td align="left">' .
            $row['Member_EndingDate']. '</td><td align="left">' 
             ;
    echo '</tr>';
}
echo '</table>';
?>
