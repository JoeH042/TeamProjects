<?php
session_start();
require_once('model/database.php');
require_once('model/member_db.php');
require_once('model/user_db.php');
require_once('view/print_db.php');
require_once('model/homepage_db.php');

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
    case 'man_profile_view':
        //only returns employees that don't already have login profiles
        $employees = get_employees_without_logins();
        //returns the type of logins currently available
        $privileges = get_employee_privileges();
        $new_user_login_message="";
        include('view/manage_directory/user_profiles.php');
        break;
    case 'man_department_view':
        include('view/manage_directory/departments.php');
        break;
    case 'man_employee_view':
        include('view/manage_directory/employees.php');
        break;
    case 'man_group_view':
        include('view/manage_directory/groups.php');
        break;
    case 'man_grp_member_view':
        include('view/manage_directory/group_members.php');
        break;
    case 'man_role_view':
        include('view/manage_directory/roles.php');
        break;
    case 'man_word_view':
        include('view/manage_directory/words.php');
        break;
    case 'new_user':
        $employees = get_employees_without_logins();
        $privileges = get_employee_privileges();
        $username = filter_input(INPUT_POST, 'username');
        $password1 = filter_input(INPUT_POST, 'password1');
        $password2 = filter_input(INPUT_POST, 'password2');
        if ($password1 != $password2){
            $new_user_login_message= "Passwords do not match, try again.";
            break;
        }
        $privilege = filter_input(INPUT_POST, 'user_privilege');
        $emp_id = filter_input(INPUT_POST, 'em_id');
        if(is_unique_username($username)){
            add_user($username, $password, $privilege, $emp_id);
        } else {
            $new_user_login_message="Username is taken. Please try another login name.";
            include('view/profiles/manage_user_profiles.php');
            break;
        }
        $new_user_login_message= 'New user successfully added.';
        include('view/profiles/manage_user_profiles.php');
        break;       
    case 'login':
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        if (is_valid_user_login($username, $password)) {
            $_SESSION['is_valid_user'] = true;
            $_SESSION['username']=$username;
            set_last_login('username');
            //only check for admin status if the user is valid
            if (!is_valid_admin($username)) {
                $_SESSION['is_valid_admin'] = true;
            }
            $userFirstName = get_user_first_name($username);
            $userLastName = get_user_last_name($username);
            $userRoles = get_user_roles($username);
            $userGroups = get_user_groups($username);
            $userLastLogin = get_last_login_time($username);
            $userReceivedMessages = get_received_messages($username);
            $userPendingMessages = get_pending_messages($username);
            include('view/home_view.php');
        } else {
            $login_message = 'You must login to continue';
            include ('view/login.php');
        }    
        break;
    case 'home_view':
        $userName=$_SESSION['username'];
        $userFirstName = get_user_first_name($userName);
        $userLastName = get_user_last_name($userName);
        $userRoles = get_user_roles($userName);
        $userGroups = get_user_groups($userName);
        $userLastLogin = get_last_login_time($userName);
        $userReceivedMessages = get_received_messages($userName);
        $userPendingMessages = get_pending_messages($userName);
        include('view/home_view.php');
       // echo get_member(1);
        break;
    case 'logout':
        $_SESSION = array();
        session_destroy();
        include('view/logout.php');
        break;
    case 'searchEmployee':
        $empid = filter_input(INPUT_POST, 'emid');
        printemployeeInfo($empid);

        break;
     case 'searchGroup':
        $grpid = filter_input(INPUT_POST, 'grpid');
        printgroupInfo($grpid);

        break;
}
?>

