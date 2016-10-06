<?php
 ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Incident Command</title>
        <!--<link rel="stylesheet" type="text/css" href= "http://webdesign.cs.wright.edu/~rhodes/css/normalize.css"> -->
        <!--<link rel="stylesheet" type="text/css" href= "http://webdesign.cs.wright.edu/~rhodes/css/main.css"> -->
        <link rel="stylesheet" type="text/css" href= "css/normalize.css">
        <link rel="stylesheet" type="text/css" href= "css/main.css">
    </head>
    <body>
        <header>
            <!--logo here -->
            <a class="logo" href="index.php?action=home_view"><h1>Incident Command</h1></a>
            <a class="logout" href="index.php?action=logout">Logout</a>
            <!--Menu -->
            <ul class="nav_bar">
                <!-- dropdown menu from W3 schools http://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_dropdown_navbar -->
                <li class = "dropdown">
                    <a href="#" class="dropbtn">Directory</a>
                    <div class="dropdown-content">
                        <a href="index.php?action=member_view">Members</a>
                        <a href="index.php?action=group_view">Groups</a>
                    </div>
                </li>
                <li><a href="index.php?action=send_messages_view">Send Message</a></li>
                <li><a href="index.php?action=view_messages_view">View Messages</a></li>
                <li><a href="index.php?action=profile_view">Profile</a></li> <!--Allows Administrators to Create new Username/Passwords-->
            </ul>
        </header>