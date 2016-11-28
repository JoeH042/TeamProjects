
<?php

if(isset($_GET['Contact_Submit']))
{
	//print_r($_POST);
        
    $ToPhone = isset($_GET['ToPhone'])? trim($_GET['ToPhone']):"";
	$Message = isset($_GET['Message'])? trim($_GET['Message']):"";
	
}

    
    //require_once('/util/secure_conn.php');  // require a secure connection
    //require_once('/util/valid_user.php');  // require a valid user

    include 'view/uniform/header.php';
?> 

<style>

.wrapper
{
	margin:0px auto;
	max-width:768px;
	float:none;
}

.row
{
	float:left;
	width:100%;
}
.pull-left
{
	float:left;
}
.pull-right
{
	float:right;
}

.header
{
	border-bottom:3px #000 solid;
	padding:10PX 0;
}


.form-con {
    border: 1px solid #000;
    float: left;
    margin: 20px 0 0;
    padding: 20px;
	text-align:center;
    width: calc(100% - 42px);
	width: -webkit-calc(100% - 42px);
}

.col-6
{
	float:left;
	width:48%;
	margin-right:4%;
}

.col-6:last-child
{
	margin-right:0;
}

.form .col-6:last-child label {
    top: 0;
}

.form-con h1
{
	margin:0 0 20px 0;
}

.form input
{
	display:block;
	float:right;
	min-width:85%;
	font-size:14px;
	padding:5px;
}

.form input[type="submit"]
{
	float:left;
	cursor:pointer;
	margin:15px 0 0 0;
	width: 100%;
}

.form label
{
	float:left;
	position:relative;
	top:3px;
}

.form textarea
{
	float:right;
	width:calc(100% - 10px);
	width:-webkit-calc(100% - 20px);
	font-size:14px;
	padding:5px;
	margin:10px 0 0 0;
	resize:none;
	font-family:Arial, Helvetica, sans-serif;
}

</style>

<div class="wrapper">


<main>
    <h1>Send Messages To be implemented </h1>
</main>

	
    <div class="header row">
    	<span class="pull-left">Disaster Communication</span>
        <span class="pull-right"><a href="#">Logout</a></span>
    </div>
    
    <div class="form-con">
    	
        <h1>Send A Message</h1>
        
        <form class="form row" name="form" method="GET" action="http://www.rbscenter.com/teamProjects/newSMS.php">
        	<div class="col-6">
            	<label>To: </label><input name="ToPhone" type="text" placeholder="Input Group Names (Separate by ,)" />
                <textarea name="Message" placeholder="Message Text"></textarea>
            </div>
        
        	<div class="col-6">
            	<label>Message will be sent To: (X Users)</label>
                <label>Message will be sent To: (Time Stamp)</label>
                <input name="Contact_Submit" id="Contact_Submit" type="submit" value="Submit" class="button" />
            </div>
        </form>
        
    </div>

</div>

<?php include 'view/uniform/footer.php'; ?>
