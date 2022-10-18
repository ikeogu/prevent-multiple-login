<?php 
   include_once 'includes/session.php';
    include_once 'includes/function.php';
    include_once 'includes/user.php';
      
    session_start() ;
     
    $user = User::findUserById($_SESSION['userid']);
   
    if ($_SESSION['user_session_id'] !== $user->user_session_id) {

        $data['output'] = '0';
    } else {
        $data['output'] = '1';
    }
   
    
    echo json_encode($data);
?>