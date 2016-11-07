
<?php
session_start();
require_once('model/database.php');
require_once('model/employee_db.php');
require_once('model/user_db.php');
require_once('view/print_db.php');
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
       // echo get_member(1);
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
            $_SESSION['username'] = $username;
            set_last_login('username');
            //include('view/home_view.php');
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
    case 'searchEmployee':

        include('view/directory/members/member_view.php');

        $emid = filter_input(INPUT_POST, 'emid');
        $emfname = filter_input(INPUT_POST, 'emfname');
        $emmname = filter_input(INPUT_POST, 'emmname');
        $emlsname = filter_input(INPUT_POST, 'emlsname');
        $ememail = filter_input(INPUT_POST, 'ememail');
        $emphone = filter_input(INPUT_POST, 'emphone');
        $emstatus = filter_input(INPUT_POST, 'emstatus');
        $emstdat = filter_input(INPUT_POST, 'emstdat');
        $grpid = filter_input(INPUT_POST, 'emdep');
        $depid = filter_input(INPUT_POST, 'emdep');
        $fiword = filter_input(INPUT_POST, 'Word');
        $wordstat = filter_input(INPUT_POST, 'wdstat');
        $ar = array($emid, $emfname, $emmname, $emlsname, $ememail, $emphone, $emstatus, $emstdat);
        $count = count($ar);



        if (!empty($emid) || !empty($emfname) || !empty($emmname) || !empty($emlsname) || !empty($ememail) || !empty($emphone) || !empty($emstatus) || !empty($emstdat) || !empty($depid)) {
            while ($count != 1) {
                if (empty($ar[$count - 1])) {
                    $ar[$count - 1] = " ";
                }
                $count--;
            }
            if (!empty($emid)) {

                printbyid($emid, 0);
            } else {


                printem($ar[1], $ar[2], $ar[3], $ar[4], $ar[5], $ar[6], $ar[7]);
            }
        } else
            printAll(1);
        break;


    case 'search_grp_dpt':
        
        include('view/directory/groups/group_view.php');
        $emid = filter_input(INPUT_POST, 'emid');
        $grpid = filter_input(INPUT_POST, 'grp');
        $grprolename = filter_input(INPUT_POST, 'gprolenm');
        $depid = filter_input(INPUT_POST, 'dep');
        $dptrolename = filter_input(INPUT_POST, 'dptrolenm');
        $ar = array($emid,$grpid,$grprolename, $depid, $dptrolename);
         $count = count($ar);
         $counts = $count;
         $num = 0;
         
        if (!empty($grpid) || !empty($depid) || !empty($grprolename) || !empty($emid) || !empty($dptrolename)) {
            
            while ($count != 1) {
                if (empty($ar[$count - 1])) {
                    $ar[$count - 1] = " ";
                     
                    $num++;
                }
              
                $count--;
            }
               
            search_gp_dpt($ar[0],$ar[1],$ar[2],$ar[3],$ar[4],$counts-$num);
        } 
        
        else 
        { printAll(2);}
        break;
    case 'searchword':
         include('view/directory/groups/group_view.php');
        
        $fiword = filter_input(INPUT_POST, 'word');

        $wordstat = filter_input(INPUT_POST, 'wdstat');
          $arw = array($fiword, $wordstat);
       
        $countw = count($arw);
        //search word
        if (!empty($fiword) || !empty($wordstat)) {
            while ($countw != 1) {
                if (empty($arw[$countw - 1])) {
                    $ar[$countw - 1] = " ";
                }
                $countw--;
            }
            searchw($arw[0], $arw[1]);
        }
        else
            printAll (3);
        break;
    
}


include 'view/uniform/footer.php';
?>

