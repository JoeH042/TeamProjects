<?php
    //require_once('/util/secure_conn.php');  // require a secure connection
    require_once('/util/valid_user.php');  // require a valid user

    include 'view/uniform/header.php';
?> 

<main class="sendMess">
    <div class="wrapper">	

        <div class="form-con">

            <h1>Send A Message</h1>

            <form class="form row" name="form" method="POST" action="">
                    <div class="col-6">
                    <label>To: </label><input type="text" placeholder="Input Group Names (Separate by ,)" />
                    <textarea placeholder="Message Text"></textarea>
                </div>

                    <div class="col-6">
                    <label>Message will be sent To: (X Users)</label>
                    <label>Message will be sent To: (Time Stamp)</label>
                    <input type="submit" value="Submit" class="button" />
                </div>
            </form>

        </div>
    </div>

</main>

<?php include 'view/uniform/footer.php'; ?>