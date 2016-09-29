<html>
<head>
<title>Add Text</title>
</head>
<body>
    <form action="Text.php" method="post">

<b>Add a New Text</b>

<p>Sender Number:
<input type="text" name="s_num" size="30"  value="" />
</p>

<p>Receive Number:
<input type="text" name="r_num" size="30" value="" />
</p>
<p>Text:
<input type="text" name="text" size="80" value="" />
</p>
<p>Status:
<input type="text" name="statues" size="80" value="" />
</p>
<p>Sending Date(d/m/y):
<input type="text" name="s_d" size="30" value="" />
</p>
<p>Receiving Date(d/m/y):
<input type="text" name="r_d" size="30" value="" />
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
    
   
    $SenderNum = $_POST['s_num'];
    $ReceiverNum = $_POST['r_num'];
     $Text = $_POST['text'];
     $TextStatus = $_POST['statues'];
     $SendD = $_POST['s_d'];
     $ReceiveD = $_POST['r_d'];
   
   if(!empty($SenderNum)&&!empty($ReceiverNum)&&!empty($Text)&&!empty($TextStatus)&&!empty($SendD)&&!empty($ReceiveD)){
        //check if value filled or not
       echo "hello";
       $connect = mysql_connect("127.0.0.1","root","");
        $db = mysql_select_db("CEG4981",$connect);
        echo "table  is  created!";
        //link form var value into database table
        
        $sql="INSERT INTO Text (Sender_Num,Recieve_Num,Text,Status,Date_sent,Date_recieved) VALUES ('$SenderNum','$ReceiverNum','$Text','$TextStatus','$SendD','$ReceiveD')";
        
        mysql_query($sql,$connect);
         header("Location: Text.php");
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
<td align="left"><b>Sender Number</b></td>
<td align="left"><b>Receive Number</b></td>
<td align="left"><b>Text</b></td>
<td align="left"><b>Text Status</b></td>
<td align="left"><b>Sending Date</b></td>
<td align="left"><b>Receiving Date</b></td>
</tr>';
$r = mysql_query("SELECT * FROM Text"); 
if(isset($_GET['recordId'])){
    $id = mysql_real_escape_string($_GET['recordId']);
    
    $sql_delete="DELETE FROM Text WHERE Text_ID={$id}";
    mysql_query($sql_delete) or die(mysql_error());
    header("Location: Text.php");
}
while($row = mysql_fetch_array($r)){
    //output value from database table
    echo  '<tr><td align="left">' .
           $row['Sender_Num']. '</td><td align="left">' .
            $row['Recieve_Num']. '</td><td align="left">'.
            $row['Text']. '</td><td align="left">' .
            $row['Status']. '</td><td align="left">' .
            $row['Date_sent']. '</td><td align="left">' .
            $row['Date_recieved']. '</td><td align="left">' 
             ;
              ;?>
  <div class="toolbar">
    <a href="Text.php?recordId=<?php echo $row['Text_ID'];?>">Delete</a>
</div>

<?php
    echo '</tr>';
}
echo '</table>';
?>
