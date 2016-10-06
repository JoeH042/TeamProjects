<?php
    //require_once('util/secure_conn.php');  // require a secure connection
    //require_once('util/valid_user.php');  // require a valid user
?>


<?php include 'view/uniform/header.php'; ?>
<section class="individual_statistics"> 
    <div class="left_side">
        <h2>You are logged in as . . .</h2>
        <h4>Role: . . .</h4>
        <h4>Team Memberships: . . .</h4>
        <h4>Last Login:. . .</h4>
        <h4>Unread Received Messages:. . .</h4>
        <h4>Pending Sent Messages:. . .</h4>
    </div>
    <div class="right-side">
        <h2>My Activity</h2>
        <!--Insert Plot or graph here -->
    </div>
</section>

<section class="team_statistics">
    <h1>Fancy Queries</h1>
    <div class="float-box">
        <h4>5 Hour, Trending Keywords</h4>
    </div>
    <div class="float-box">
        <h4>24 Hour, Trending Keywords</h4>
    </div>
    <div class="float-box">
        <h4>24 Hour, My Team Activity</h4>
    </div>    
</section>
<?php include 'view/uniform/footer.php'; ?>
