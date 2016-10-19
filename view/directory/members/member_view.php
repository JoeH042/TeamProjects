<?php
    //require_once('/util/secure_conn.php');  // require a secure connection
   // require_once('/util/valid_user.php');  // require a valid user

    include 'view/uniform/header.php';
?> 

<main>
   <html>
<head>
<title>Search Employee</title>
</head>
<body>
     <form action="." method="post" id="member_view" class="aligned">
                <input type="hidden" name="action" value="search">

<p>Employee ID:
<input type="text" name="emid" size="30" value="" />
</p>
<label>&nbsp;</label>
                <input type="submit" value="search">
                <input type="submit" value="New User">
            </form>
</main>

<?php include 'view/uniform/footer.php'; ?>
