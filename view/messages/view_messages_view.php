<?php
    //require_once('/util/secure_conn.php');  // require a secure connection
   // require_once('/util/valid_user.php');  // require a valid user

    include 'view/uniform/header.php';
?> 

<main>
   <html>
<head>
<title>Choose box</title>
</head>
<body>
     <form action="." method="post" id="search_group" class="aligned">
                <input type="hidden" name="action" value="viewmessages">

<p>
Choose the Box?
<select name="option">
  <option value="">Select...</option>
  <option value="inbox">Inbox</option>
  <option value="outbox">Outbox</option>
</select>
</p>
<label>&nbsp;</label>
                <input type="submit" value="search">
         
     <table>
            <tr>
                <th> Message Number </th>
                <th> Message Status</th>
                <th> Sender Number </th>
                <th> Receiver Number </th>
                <th> Content </th>
                <th> Message Cost </th>
                <th> Date Sent </th>
                <th> Date Recieved </th>
                <th>&nbsp;</th>
                <!--Add Role, Manager, split first and last name -->
            </tr>
           
                <!-- Add an option to delete row -->
        </table>


    
    </form>
</main>

<?php include 'view/uniform/footer.php';?>

