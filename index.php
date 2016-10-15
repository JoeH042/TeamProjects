<?php
session_start();
require_once('model/database.php');
require_once('model/member_db.php');
require_once('model/user_db.php');

//get the action to be performed
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL ) {
        $action = 'home_view';
    } 
} 
if (!isset($_SESSION['is_valid_user'])) {
       $action = 'login';
    }
        
//The main switchboard for site navigation
switch ($action){
    //take the user to the main menu
    case 'home_view':
        include('view/home_view.php');
        echo get_member(1);
        break;
    case 'member_view':
        include('view/directory/members/member_view.php');
        break;
    case 'group_view':
        include('view/directory/groups/group_view.php');
        break;
    case 'view_messages_view':
        include('view/messages/view_messages_view.php');
        break;
    case 'send_messages_view':
        include('view/messages/send_messages_view.php');
        break;
    case 'profile_view':
        include('view/profiles/manage_user_profiles.php');
        break;
    case 'login':
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        if (is_valid_user_login($username, $password)) {
            $_SESSION['is_valid_user'] = true;
            $_SESSION['username'] = $username;
            include('view/home_view.php');
            //only check for admin status if the user is valid
            if (is_valid_admin($username)) {
                $_SESSION['is_valid_admin'] = true;
            }
            include('view/home_view.php');
        } else {
            $login_message = 'You must login to continue';
            include ('view/login.php');
        }
        break;
    case 'logout':
        $_SESSION = array();
        session_destroy();
        include('view/logout.php');
        break;
}
?>

