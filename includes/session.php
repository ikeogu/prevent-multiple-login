<?php
	include_once 'includes/ses_check.php';
	class Session {

		 public  $userid;          //id of the user lgged in 
		 public $logged_in = false;	//true or false;
       
       
		public function __construct(){
			session_start();
			$this->check_login();
		}

		public function check_login(){
      if(isset($_SESSION['userid'])){
        $this->userid = $_SESSION['userid'];
        $this->logged_in = true;
      }else{
        unset($this->userid);
        $this->logged_in = false;
      }
    }

		public function is_logged_in(){
      return $this->logged_in;
		}

		public function login($user){
			if($user){
				$this->userid = $_SESSION['userid'] = $user->getUserId();
			  $this->logged_in = true;

        session_start();
        session_regenerate_id();
        $user_session_id = session_id();

        $user = User::findUserById($this->userid);
        // $user->user_session_id = $user_session_id;
        $user->updateUserToken($user_session_id);

        $_SESSION['user_session_id'] = $user_session_id;

        /*  $sess = SessCheck::instantiate($_SESSION);
        $sess->userid = $this->userid;
        $sess->token =  $_SESSION['token'] = session_id();
        $sess->logged_in = true;
        $sess->save_sess();   */

        // $user_logged = SessCheck::getAllUserById($this->userid);
      
       
        /* foreach ($user_logged as $value) {
            # code...
          
            if($value->token !== $_SESSION['token']){
              
                SessCheck::deleteOldToken($value->token, $value->userid);                           
            }else{
                $_SESSION['sessionid'] = $value->getId();
            }
          # code...
        } */
      }
		}

		public function logout(){
			$this->logged_in = false;
			session_destroy();
		}
	}

	$session = new Session();
