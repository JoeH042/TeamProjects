<?php
session_start();
require_once('model/database.php');
require_once('model/member_db.php');
require_once('model/user_db.php');

//get the action to be performed
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home_view';
    }    
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
    case 'logout':
        include('view/logout.php');
        break;
}
?>

