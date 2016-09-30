<html>
<head>
<title>Add Word_Filter</title>
</head>
<body>
    <form action="Word_Filter.php" method="post">

<b>Add a New Word_Filter</b>


<p>Word to be filter:
<input type="text" name="word" size="30" value="" />
</p>
<p>Status:
<input type="text" name="status" size="30" value="" />
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
    
    
   
    $filterword = $_POST['word'];
    $Status = $_POST['status'];
     //unset($id,$Firstname,$Middlename,$Lastname,$Email,$PhoneNumber,$Status,$Department,$TeamNumber);
   if(!empty($filterword)&&!empty($Status)){
        //check if value filled or not
       echo "hello";
       $connect = mysql_connect("127.0.0.1","root","");
        $db = mysql_select_db("CEG4981",$connect);
        echo "table  is  created!";
        //link form var value into database table
        
        $sql="INSERT INTO Word_Filter (Word,Status) VALUES ('$filterword','$Status')";
        
        mysql_query($sql,$connect);
         header("Location: Word_Filter.php");
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
<td align="left"><b>Word ID</b></td>
<td align="left"><b>Word</b></td>
<td align="left"><b>Status</b></td>
</tr>';
$r = mysql_query("SELECT * FROM Word_Filter"); 
while($row = mysql_fetch_array($r)){
    //output value from database table
    echo  '<tr><td align="left">' .
            $row['Word_ID']. '</td><td align="left">' .
           $row['Word']. '</td><td align="left">' .
            $row['Status']. '</td><td align="left">' 
             ;
    echo '</tr>';
}
echo '</table>';
?>
